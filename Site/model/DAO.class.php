<?php
require_once(__DIR__.'/Competence.class.php');
require_once(__DIR__.'/Renseignement.class.php');
require_once(__DIR__.'/Candidat.class.php');
require_once(__DIR__.'/Coach.class.php');
require_once(__DIR__.'/Offre.class.php');
require_once(__DIR__.'/Entreprise.class.php');

// Le Data Access Objet
class DAO {
	private $db;

	private static $instance = null;

	// Constructeur qui permet l'application de se connecter a notre base de donnee
	function __construct() {
		try{
			include_once(__DIR__.'/connectionBD.php');
		
		}catch (Exception $e) {
			die("PSQL ERROR :".$e->getMessage());
		}

	}

	public static function get() : DAO {

		/*
			Méthode statique pour acceder a l'instence singleton de postgreSQL
		*/

		// Si l'objet n'a pas encore été crée, le crée
		if(is_null(self::$instance)) {
			self::$instance = new DAO();
		}
		return self::$instance;
	}


	/*
	------------------------------------------------------------
		Le DAO se constitue par des fonctions CRUD :
		FONCTIONS CRUD (Create, Read, Update, Delete)
		Cela nous permet d'interagir avec la base de donnees
		de l'aplication.

		Elle sont dans l'ordre : CREATE, READ, UPDATE, DELETE
		
		A la fin de ce fichier il y a quelques fonctions utile
		pour nous

	------------------------------------------------------------
	*/

	/*
	-------------------------------------------------------------------------------------------
		FONCTIONS CREATE : Fonctions qui nous permettent de inserer sur la base de donnees
	-------------------------------------------------------------------------------------------
	*/

	function createUtilisateur(string $mail, string $pass) : bool{ //returns boolean

		/*
			(SIGN UP)
			Fonction qui cree un utilisateur plus precisement il cree un Candidat
		*/

		try {

			$hashedPw = password_hash($pass,PASSWORD_ARGON2I);// mot de passe hache avec l'algo de hachage (ARGON2I) qui est tres securise

			$sel = "(SELECT idUtilisateur from utilisateur where adressemail='". $mail ."')";
			$comp = "(SELECT idcompetence from competence where link='". $mail ."')";
			$rens = "(SELECT idrenseignement from RENSEIGNEMENT where link='". $mail ."')";

			//Requette SQL pour cree un candidat
			$r = "
			INSERT INTO utilisateur VALUES(DEFAULT,'". $mail ."','". $hashedPw ."','','',0,'',now());
			INSERT INTO competence values(DEFAULT,'','','','".$mail."');
			INSERT INTO renseignement values(DEFAULT,DEFAULT,'','','','','".$mail."');
			INSERT INTO candidat values($sel,'','',0,'','',$comp,$rens);
			";

			$res = @pg_query($this->db, $r);

			if($res){
				return true;
			} //Returne vrais si il a marche faux sinon
		// Tests d'erreurs
		} catch (Exception $e) {
			die("PSQL ERROR createUtilisateur : ".$e->getMessage());
		}
		return false;

	}

	//Fonction qui cree une nouvelle offre dans la base de donnee
	function creeOffre(int $identreprise , Renseignement $rens, Competence $comp, $nom =''){

		/*
			Fonction qui cree une offre dans la base de donnee
		*/

		try {
			$langParle = $this->conversionArrayString($comp->getLangeParle());
			$langAcquis = $this->conversionArrayString($comp->getLangageAcquis());

			if ($rens->getTravEtranger()){
				$te = $rens->getTravEtranger();
			}else{
				$te = 0;
			}

			$r = "INSERT into competence values(DEFAULT,'{$comp->getnvEtude()}', '$langParle', '$langAcquis','-2');
			INSERT into renseignement values(DEFAULT,$te::boolean, '{$rens->getSecteur()}', '{$rens->getTypeContrat()}', '{$rens->getPoste()}', '{$rens->getTypeEntreprise()}','-2');
			INSERT into offre values(DEFAULT,'$nom',now(),$identreprise,
									(select idcompetence from competence where idcompetence = currval('competence_idcompetence_seq')),
									(select idrenseignement from renseignement where idrenseignement = currval('renseignement_idrenseignement_seq')));
			UPDATE competence set link = currval('offre_idoffre_seq')::varchar where link = '-2';
			UPDATE renseignement set link = currval('offre_idoffre_seq')::varchar where link = '-2';
			SELECT currval('offre_idoffre_seq');";

			$res = @pg_query($this->db, $r);

			$req = @pg_fetch_all($res);

			if($res){
				return intval($req[0]['currval']); //returne le id de l'offre cree
			}
		// Tests d'erreurs
		} catch (Exception $e) {
			die("PSQL ERROR createUtilisateur : ".$e->getMessage());
		}
		return false;
	}

	//Fonction qui cree une nouvelle Entreprise dans la base de donnee
	function creeEntreprise($mail,$nom ='',$telephone = '',$pays='', $ville ='') {

		/*
			Fonction qui cree une Entreprise dans la base de donnee
		*/

		try {
			$r = "INSERT INTO entreprise VALUES(DEFAULT,'$nom','$mail','$telephone','$pays','$ville');
			SELECT currval('entreprise_identreprise_seq');";

			$res = @pg_query($this->db, $r);

			$req = @pg_fetch_all($res);

			if($res){
				return intval($req[0]['currval']); //returne le id de l'entreprise qu'il cree
			}
			
		// Tests d'erreurs
		} catch (Exception $e) {
			die("PSQL ERROR createUtilisateur : ".$e->getMessage());
		}
		return false;
	}

	/*
	-------------------------------------------------------------------------------------
		FONCTIONS READ : Fonctions qui nous permettent de Lire sur la base de donnees
	-------------------------------------------------------------------------------------
	*/

	function getEmails() : array {

		/*
			Fonction qui returne toutes les emails dans la base de donnees
		*/

		try {
		$req = @pg_query($this->db,"SELECT adresseMail FROM UTILISATEUR");
		// Affiche en clair l'erreur PDO si la requête ne peut pas s'exécuter

		$table = @pg_fetch_all($req);

		$listeMail = array();
		foreach ($table as $mail) {
			array_push($listeMail,$mail['adressemail']);
		};
		// Tests d'erreurs
		if (count($table) == 0) {
			throw new Exception("Aucun Email trouvee\n");
		}
		} catch (Exception $e) {
			die("PSQL ERROR :".$e->getMessage());
		}
		return $listeMail;
	}

	function verifierLogin(string $mail, string $pass) : bool{ //returns boolean

		
		/*
			(LOGIN) 
			Fonction qui nous permet de se connecter sur l'application il prends en parametre le mail et le mot de passe
		*/

		try {
			
		//Requette SQL
		$r = "SELECT password FROM utilisateur where adressemail='$mail';";

		$q = @pg_query($this->db, $r);

		$res = pg_fetch_row($q);

		$check = @password_verify($pass,$res[0]);

		// retourne vrai si le mot de passe et l'adresse mail corrsepond, Faux sinon
		if($check){
			return true;
		}else{
			return false;
		}

		// Tests d'erreurs
		} catch (Exception $e) {
			die("PSQL ERROR verifierLogin : ".$e->getMessage());
		}
		return false;

	}


	function getCoach(string $mail){

		/*
			Fonction Qui retourne un Coach de adresse mail donnee ou false si il n'existe pas
		*/
		try {
			$req = @pg_query($this->db,"SELECT * from utilisateur where idutilisateur in (Select idCoach from coach) AND adressemail='$mail'");
		
			$coachbf = @pg_fetch_all($req);


			if (empty($coachbf)) {
				return false;
			}else{

				$req = @pg_query($this->db,"SELECT * FROM coach WHERE idcoach=". intVal($coachbf[0]['idutilisateur']) ."");

				$coachUti = @pg_fetch_all($req);

				$age = $coachbf[0]['age'];
				$coach = new Coach(
					$coachbf[0]['adressemail'],
					$coachbf[0]['password'],
					$coachbf[0]['nom'],
					$coachbf[0]['prenom'],
					$coachbf[0]['telephone'],
					intVal($age),
					$coachUti[0]['lienphoto'],
					$coachbf[0]['datecreation']
				);
			}

			
			// Tests d'erreurs
			} catch (Exception $e) {
				die("PSQL ERROR :".$e->getMessage());
			}
			return $coach;
	}


	function getCandidat(string $mail){

		/*
			Fonction Qui retourne un Candidat de adresse mail donnee ou false si il n'existe pas
		*/
		try {
			$req = @pg_query($this->db,"SELECT * from utilisateur where idutilisateur in (Select idcandidat from candidat) AND adressemail='$mail'");
		
			$candidatbf = @pg_fetch_all($req);


			if (empty($candidatbf)) {
				return false;
			}else{

				$req = @pg_query($this->db,"SELECT * FROM candidat WHERE idcandidat=". intVal($candidatbf[0]['idutilisateur']) ."");
				$candidatUti = @pg_fetch_all($req);

				$compCand = $this->getCompetence($mail);
				$rensCand = $this->getRenseignement($mail);

				if (empty($candidatUti)) {
					return false;
				}else{
					$age = $candidatbf[0]['age'];
					$etape = $candidatUti[0]['etape'];

					$candidat = new Candidat(
						$candidatbf[0]['adressemail'],
						$candidatbf[0]['password'],
						$candidatbf[0]['nom'],
						$candidatbf[0]['prenom'],
						intVal($age),
						$candidatbf[0]['telephone'],
						$candidatUti[0]['liencv'],
						$candidatUti[0]['lienlettremotivation'],
						intVal($etape),
						$candidatUti[0]['pays'],
						$candidatUti[0]['ville'],
						$candidatbf[0]['datecreation'],
						$compCand,
						$rensCand
					);
				}
			}
			
			// Tests d'erreurs
			} catch (Exception $e) {
				die("PSQL ERROR :".$e->getMessage());
			}
			return $candidat;
	}

	function getCandidats() : array{

		/*
			Fonction Qui retourne l'ensemble des Candidats sur la base de donnee
			Prise en compte que le numero des candidats n'est pas tres grand
		*/
		
		try {
			$req = @pg_query($this->db,"SELECT adressemail from utilisateur where idutilisateur in (select idcandidat from candidat)");
		
			$candidatsReq = @pg_fetch_all($req);

			if (empty($candidatsReq)) {
				return false;
			}else{

				$candidats = array();

				foreach ($candidatsReq as $c) {
					array_push($candidats,$this->getCandidat($c['adressemail']));
				}
			}
			
			// Tests d'erreurs
			} catch (Exception $e) {
				die("PSQL ERROR :".$e->getMessage());
			}
			return $candidats;
	}

	function getCompetence($link) : Competence{
		//parametre $link est le c'est qui lie le candidat a une competence ou offre a une competenceAcquise

		/*
			Fonction Qui retourne soit
				1) Les Cometences d'un Candidat
				2) Les Competences Acquise d'une offre
				3) False si elle n'existe pas
		*/

		try {
			$req = @pg_query($this->db,"SELECT * from competence where link='$link'");
		
			$competenceRes = @pg_fetch_all($req);

			if (empty($competenceRes)) {
				return false;
			}else{

				$idc = $competenceRes[0]['idcompetence'];

				$competence = new Competence(
					intval($idc),
					$competenceRes[0]['nvetude'],
					$competenceRes[0]['langueparle'],
					$competenceRes[0]['langagesacquis']
				);
				
			}
			
			// Tests d'erreurs
			} catch (Exception $e) {
				die("PSQL ERROR :".$e->getMessage());
			}
			return $competence;
	}

	function getRenseignement($link) : Renseignement{
		//parametre $link est le c'est qui lie le candidat a une competence ou offre a une competenceAcquise

		/*
			Fonction Qui retourne soit
				1) Les Rensegnements d'un candidat
				2) Les details d'offre (Rensegnements) d'une offre
				3) False si elle n'existe pas
		*/
		try {
			$req = @pg_query($this->db,"SELECT * from renseignement where link='$link'");
		
			$renseignementRes = @pg_fetch_all($req);

			if (empty($renseignementRes)) {
				return false;
			}else{

				$idr = intval($renseignementRes[0]['idrenseignement']);

				$renseignement = new Renseignement(
					intval($idr),
					$renseignementRes[0]['travetranger'],
					$renseignementRes[0]['secteur'],
					$renseignementRes[0]['typecontrat'],
					$renseignementRes[0]['poste'],
					$renseignementRes[0]['tyeentreprise']
				);
			}
			
			// Tests d'erreurs
			} catch (Exception $e) {
				die("PSQL ERROR :".$e->getMessage());
			}
			return $renseignement;
	}

	function getEntreprise(int $id) : Entreprise{

		/*
			Fonction Qui retourne une Entreprise de l'id donnee 
						 returne False sinon
		*/

		try {
			$req = @pg_query($this->db,"SELECT * from entreprise where identreprise=$id");
		
			$entrepriseRes = @pg_fetch_all($req);

			if (empty($entrepriseRes)) {
				return false;
			}else{

				$ide = $entrepriseRes[0]['identreprise'];

				$entreprise = new Entreprise(
					intval($ide),
					$entrepriseRes[0]['nomentreprise'],
					$entrepriseRes[0]['mailentreprise'],
					$entrepriseRes[0]['telephone'],
					$entrepriseRes[0]['pays'],
					$entrepriseRes[0]['ville']
				);
				
			}
			
			// Tests d'erreurs
			} catch (Exception $e) {
				die("PSQL ERROR :".$e->getMessage());
			}
			return $entreprise;
	}

	function getEntreprises() : array{

		/*
			Fonction Qui retourne l'ensemble des entreprises
		*/

		try {
			$req = @pg_query($this->db,"SELECT idEntreprise from entreprise");
		
			$entrepriseReq = @pg_fetch_all($req);

			if (empty($entrepriseReq)) {
				return false;
			}else{

				$entreprises = array();

				foreach ($entrepriseReq as $e) {
					$ide = intval($e['identreprise']);
					array_push($entreprises,$this->getEntreprise($ide));
				}
			}
			
			// Tests d'erreurs
			} catch (Exception $e) {
				die("PSQL ERROR :".$e->getMessage());
			}
			return $entreprises;
	}

	function getOffre(int $id) {

		/*
			Fonction Qui retourne une Offre de l'id donnee de type Offre 
						 returne False sinon
		*/
		try {
			$req = @pg_query($this->db,"SELECT * from offre where idoffre=$id");
		
			$offreRes = @pg_fetch_all($req);

			if (empty($offreRes)) {
				return false;
			}else{

				$ido = intval($offreRes[0]['idoffre']);
				$ide = intval($offreRes[0]['identreprise']);
				
				$entreprise = $this->getEntreprise($ide);
				$competence = $this->getCompetence($ido);
				$renseignement = $this->getRenseignement($ido);

				$offre = new Offre(
					intval($ido),
					$offreRes[0]['nomoffre'],
					$offreRes[0]['dateoffre'],
					$entreprise,
					$competence,
					$renseignement
				);
			}
			
			// Tests d'erreurs
			} catch (Exception $e) {
				die("PSQL ERROR :".$e->getMessage());
			}
			return $offre;
	}

	function getOffres() : array{

		/*
			Fonction Qui retourne l'ensemble des Offres
		*/
		try {
			$req = @pg_query($this->db,"SELECT idoffre from offre");
		
			$offresReq = @pg_fetch_all($req);

			if (empty($offresReq)) {
				return false;
			}else{

				$offres = array();

				foreach ($offresReq as $offre) {
					$ido = intval($offre['idoffre']);
					array_push($offres,$this->getOffre($ido));
				}
			}
			
			// Tests d'erreurs
			} catch (Exception $e) {
				die("PSQL ERROR :".$e->getMessage());
			}
			return $offres;
	}

	function nombreEntreprises() : int{
		/*
			Fonction Qui retourne les nombre d'entreprises dans la base de donnees
		*/
		try {
			$req = @pg_query($this->db,"SELECT count(*) from entreprise");
		
			$nombreReq = @pg_fetch_all($req);

			if (empty($nombreReq)) {
				return false;
			}else{

				$nombre = intval($nombreReq[0]['count']);
			}
			
			// Tests d'erreurs
			} catch (Exception $e) {
				die("PSQL ERROR :".$e->getMessage());
			}
			return $nombre;
	}
	function nombreCandidats() : int{

		/*
			Fonction Qui retourne les nombre des Candidats dans la base de donnees
		*/
		try {
			$req = @pg_query($this->db,"SELECT count(*) from candidat");
		
			$nombreReq = @pg_fetch_all($req);

			if (empty($nombreReq)) {
				return false;
			}else{

				$nombre = intval($nombreReq[0]['count']);
			}
			
			// Tests d'erreurs
			} catch (Exception $e) {
				die("PSQL ERROR :".$e->getMessage());
			}
			return $nombre;
	}
	function nombreOffres() : int{

		/*
			Fonction Qui retourne le nombre des Offres dans la base de donnees
		*/
		try {
			$req = @pg_query($this->db,"SELECT count(*) from offre");
		
			$nombreReq = @pg_fetch_all($req);

			if (empty($nombreReq)) {
				return false;
			}else{

				$nombre = intval($nombreReq[0]['count']);
			}
			
			// Tests d'erreurs
			} catch (Exception $e) {
				die("PSQL ERROR :".$e->getMessage());
			}
			return $nombre;
	}

	/*
	--------------------------------------------------------------------------------------------------------------
		FONCTIONS UPDATE : fonctions qui nous permettent de mettre à jour les informations la base de données
	--------------------------------------------------------------------------------------------------------------
	*/

	function updateCandidat(Candidat $candidat){

		/*
			Fonction qui met a jour les informations de candidat dans la base de donnee
			inclus ses rensegnements et competences

			si le candidat n'existe pas on retourne faux
		*/

		try {

			$lp = $this->conversionArrayString($candidat->getCompetenceAcquis()->getLangeParle());
			$la = $this->conversionArrayString($candidat->getCompetenceAcquis()->getLangageAcquis());

			if ($candidat->getRenseignement()->getTravEtranger()){
				$te = $candidat->getRenseignement()->getTravEtranger();
			}else{
				$te = 0;
			}

			$r = "UPDATE utilisateur 
			set nom = '{$candidat->getNom()}',
				prenom = '{$candidat->getPrenom()}',
				age = {$candidat->getAge()},
				telephone = '{$candidat->getTelephone()}'
			where adressemail= '{$candidat->getMail()}';
			
			update candidat
			set liencv = '{$candidat->getLienCv()}',
				lienlettremotivation = '{$candidat->getLienLM()}',
				etape = {$candidat->getEtape()},
				pays = '{$candidat->getPays()}',
				ville = '{$candidat->getVille()}'
			where idcandidat in (select idutilisateur from utilisateur where adressemail='{$candidat->getMail()}');
			
			update competence
			set	nvetude = '{$candidat->getCompetenceAcquis()->getNvEtude()}',
				langueparle = '$lp',
				langagesacquis = '$la'
			where idcompetence = {$candidat->getCompetenceAcquis()->getId()};
			
			update renseignement
			set travetranger = $te::boolean,
				secteur = '{$candidat->getRenseignement()->getSecteur()}',
				typecontrat = '{$candidat->getRenseignement()->getTypeContrat()}',
				poste = '{$candidat->getRenseignement()->getPoste()}',
				tyeentreprise = '{$candidat->getRenseignement()->getTypeEntreprise()}'
			where idrenseignement = {$candidat->getRenseignement()->getId()}";

			$res = @pg_query($this->db, $r);

			if($res){
				return true;
			}
		// Tests d'erreurs
		} catch (Exception $e) {
			die("PSQL ERROR createUtilisateur : ".$e->getMessage());
		}
		return false;
	}

	function updateOffre(Offre $offre){

		/*
			Fonction qui met a jour les informations d'une offre dans la base de donnee
			inclus les detail d'offre (rensegnement) et competences acquises

			si le offre n'existe pas on retourne faux
		*/

		try {

			$lp = $this->conversionArrayString($offre->getCompetenceRecherche()->getLangeParle());
			$la = $this->conversionArrayString($offre->getCompetenceRecherche()->getLangageAcquis());

			if ($offre->getDetailOffre()->getTravEtranger()){
				$te = $offre->getDetailOffre()->getTravEtranger();
			}else{
				$te = 0;
			}

			$r = "UPDATE offre
			set nomoffre = '{$offre->getNomOffre()}'
			where idoffre = {$offre->getId()};
			update competence
			set	nvetude = '{$offre->getCompetenceRecherche()->getNvEtude()}',
				langueparle = '$lp',
				langagesacquis = '$la'
			where idcompetence = {$offre->getCompetenceRecherche()->getId()};
			
			update renseignement
			set travetranger = $te::boolean,
				secteur = '{$offre->getDetailOffre()->getSecteur()}',
				typecontrat = '{$offre->getDetailOffre()->getTypeContrat()}',
				poste = '{$offre->getDetailOffre()->getPoste()}',
				tyeentreprise = '{$offre->getDetailOffre()->getTypeEntreprise()}'
			where idrenseignement = {$offre->getDetailOffre()->getId()}";

			$res = @pg_query($this->db, $r);

			if($res){
				return true;
			}
		// Tests d'erreurs
		} catch (Exception $e) {
			die("PSQL ERROR createUtilisateur : ".$e->getMessage());
		}
		return false;
	}

	function updateEntreprise(Entreprise $entreprise){

		/*
			Fonction qui met a jour les informations d'une entreprise dans la base de donnee

			si le entreprise n'existe pas on retourne faux
		*/

		try {
			$r = "UPDATE entreprise
			set mailentreprise = '{$entreprise->getMail()}',
				nomentreprise = '{$entreprise->getNom()}',
				telephone = '{$entreprise->getTelephone()}',
				pays = '{$entreprise->getPays()}',
				ville = '{$entreprise->getVille()}'
			where identreprise = {$entreprise->getId()}";

			$res = @pg_query($this->db, $r);

			if($res){
				return true;
			}
		// Tests d'erreurs
		} catch (Exception $e) {
			die("PSQL ERROR createUtilisateur : ".$e->getMessage());
		}
		return false;
	}

		/*
	----------------------------------------------------------------------------------------------------------
		FONCTIONS DELETE : Fonctions qui nous permettent de supprimer des elements sur la base de donnees
	----------------------------------------------------------------------------------------------------------
	*/

	function deleteCandidat($mail) : bool{

		/*
			Fonction qui supprime un candidat Existant dans la base de donnee
			returne false si candidat n'existe pas
		*/

		try {
			$r = "DELETE from candidat where idcandidat in (select idutilisateur from utilisateur where adressemail = '$mail');
			DELETE from competence where link='$mail';
			DELETE from renseignement where link='$mail';
			DELETE from utilisateur where adressemail='$mail';";

			$res = @pg_query($this->db, $r);

			if($res){
				return true;
			}
		// Tests d'erreurs
		} catch (Exception $e) {
			die("PSQL ERROR createUtilisateur : ".$e->getMessage());
		}
		return false;
	}

	function deleteOffre($idoffre) : bool{

		/*
			Fonction qui supprime une offre Existante dans la base de donnee
			returne false si offre n'existe pas
		*/

		try {
			$r = "DELETE from offre where idoffre='$idoffre';
			DELETE from competence where link='$idoffre';
			DELETE from renseignement where link='$idoffre';";

			$res = @pg_query($this->db, $r);

			if($res){
				return true;
			}
		// Tests d'erreurs
		} catch (Exception $e) {
			die("PSQL ERROR createUtilisateur : ".$e->getMessage());
		}
		return false;
	}

	function deleteEntreprise($idEntreprise) : bool{

		/*
			Fonction qui supprime une Entreprise Existant dans la base de donnee
			returne false si l'Entreprise n'existe pas
		*/
		try {
			$r = "DELETE from entreprise where identreprise='$idEntreprise';";

			$res = @pg_query($this->db, $r);

			if($res){
				return true;
			}
		// Tests d'erreurs
		} catch (Exception $e) {
			die("PSQL ERROR createUtilisateur : ".$e->getMessage());
		}
		return false;
	}

	/*
	--------------------------------------------------------------------------------------------------------------
		FONCTIONS Utile :
	--------------------------------------------------------------------------------------------------------------
	*/

	//Convertir String a un Array
	function conversionStringArray(string $chaine){
		$arrayChaine = explode(",",$chaine);
		return $arrayChaine;
	}

	//convertir Array a un String
	function conversionArrayString(array $array){
		$arrayChaine = implode(",",$array);
		return $arrayChaine;
	}
} 
?>
