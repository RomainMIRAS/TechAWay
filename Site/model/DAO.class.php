<?php
/* require_once(__DIR__.'/Client.class.php');
require_once(__DIR__.'/Candidat.class.php');
require_once(__DIR__.'/Offre.class.php'); */
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

// Constructeur chargé d'ouvrir la BD
function __construct() {
	try{
	$this->db = pg_connect("host=localhost port=5432 dbname=techawaydb user=pagman password=pagman");//138.68.96.182
	
	}catch (Exception $e) {
		die("PSQL ERROR :".$e->getMessage());
	}

}

// Méthode statique pour acceder au singleton
public static function get() : DAO {
	// Si l'objet n'a pas encore été crée, le crée
	if(is_null(self::$instance)) {
		self::$instance = new DAO();
	}
	return self::$instance;
}


function getEmails() : array {
	try {
	$req = pg_query($this->db,"SELECT adresseMail FROM UTILISATEUR");
	// Affiche en clair l'erreur PDO si la requête ne peut pas s'exécuter

	$table = pg_fetch_all($req);

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

function createUtilisateur(string $mail, string $pass) { //returns boolean
	//Cree un utilisateur Candidat par defaut avant de rensegnier le formulaire
	try {

		$hashedPw = password_hash($pass,PASSWORD_ARGON2I);

		$sel = "(SELECT idUtilisateur from utilisateur where adressemail='". $mail ."')";

		$comp = "(SELECT idcompetence from competence where link='". $mail ."')";
		$rens = "(SELECT idrenseignement from RENSEIGNEMENT where link='". $mail ."')";

		$r = "
		INSERT INTO utilisateur VALUES(DEFAULT,'". $mail ."','". $hashedPw ."','','',0,'',now());
		INSERT INTO competence values(DEFAULT,'','','','".$mail."');
		INSERT INTO renseignement values(DEFAULT,DEFAULT,'','','','','".$mail."');
		INSERT INTO candidat values($sel,'','',0,'','',$comp,$rens);
		";

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

function verifierLogin(string $mail, string $pass) { //returns boolean
	try {
	$r = "
	SELECT password FROM utilisateur where adressemail='$mail';";

	$q = pg_query($this->db, $r);

	$res = pg_fetch_row($q);

	$check = @password_verify($pass,$res[0]);
	if($check){
		return true;
	}else{
		return false;
	}


/* 
	$r = "SELECT EXISTS(SELECT * FROM utilisateur where adressemail='$mail' AND password='$pass')";

	$q = pg_query($this->db, $r);

	$res = pg_fetch_all($q);

	if($res[0]['exists'] == 't'){
		return true;
	}else{
		return false;
	} */


	// Tests d'erreurs
	} catch (Exception $e) {
		die("PSQL ERROR verifierLogin : ".$e->getMessage());
	}
	return false;

}

function getCoach(string $mail) {
	try {
		$req = pg_query($this->db,"SELECT * from utilisateur where idutilisateur in (Select idCoach from coach) AND adressemail='$mail'");
	
		$coachbf = pg_fetch_all($req);


		if (empty($coachbf)) {
			return false;
		}else{

			$req = pg_query($this->db,"SELECT * FROM coach WHERE idcoach=". intVal($coachbf[0]['idutilisateur']) ."");

			$coachUti = pg_fetch_all($req);

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

function getCandidat(string $mail) {
	try {
		$req = pg_query($this->db,"SELECT * from utilisateur where idutilisateur in (Select idcandidat from candidat) AND adressemail='$mail'");
	
		$candidatbf = pg_fetch_all($req);


		if (empty($candidatbf)) {
			return false;
		}else{

			$req = pg_query($this->db,"SELECT * FROM candidat WHERE idcandidat=". intVal($candidatbf[0]['idutilisateur']) ."");
			$candidatUti = pg_fetch_all($req);

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

function getCoachOuCandidat(string $mail, string $pass) {

	try {
		$res = $this->getCandidat($mail);
		if ($res){
			return $res;
		}

		$res = $this->getCoach($mail);
		if ($res){
			return $res;
		}
		//NOTE Removed here
		/* else{
			return new Candidat($mail, $pass,'','',0,'','','',0,'','','',NULL,NULL);
		} */
		
	} catch (Exception $e) {
		die("PSQL ERROR :".$e->getMessage());
	}
}

function getCompetence($link) {
	try {
		$req = pg_query($this->db,"SELECT * from competence where link='$link'");
	
		$competenceRes = pg_fetch_all($req);

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

function getRenseignement($link) {
	try {
		$req = pg_query($this->db,"SELECT * from renseignement where link='$link'");
	
		$renseignementRes = pg_fetch_all($req);

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


function getEntreprise(int $id) {
	try {
		$req = pg_query($this->db,"SELECT * from entreprise where identreprise=$id");
	
		$entrepriseRes = pg_fetch_all($req);

		if (empty($entrepriseRes)) {
			return false;
		}else{

			$ide = $entrepriseRes[0]['identreprise'];

			$adresse = $entrepriseRes[0]['pays'] . ",". $entrepriseRes[0]['ville'];

			$entreprise = new Entreprise(
				intval($ide),
				$entrepriseRes[0]['nomentreprise'],
				$entrepriseRes[0]['mailentreprise'],
				$entrepriseRes[0]['telephone'],
				$adresse
			);
			
		}
		
		// Tests d'erreurs
		} catch (Exception $e) {
			die("PSQL ERROR :".$e->getMessage());
		}
		return $entreprise;
}

function getEntreprises() {
	try {
		$req = pg_query($this->db,"SELECT idEntreprise from entreprise");
	
		$entrepriseReq = pg_fetch_all($req);

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
	try {
		$req = pg_query($this->db,"SELECT * from offre where idoffre=$id");
	
		$offreRes = pg_fetch_all($req);

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

function getOffres() {
	try {
		$req = pg_query($this->db,"SELECT idoffre from offre");
	
		$offresReq = pg_fetch_all($req);

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

function creeEntreprise($mail,$nom ='',$telephone = '',$pays='', $ville =''){
	try {
		$r = "INSERT INTO entreprise VALUES(DEFAULT,'$nom','$mail','$telephone','$pays','$ville');";

		$res = pg_query($this->db, $r);

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
//Accès à un client
function getEntreprise(int $idEntreprise) : Client {
	try {
	$req = pg_query($this->db,"SELECT * FROM Entreprise where idEntreprise=$idEntreprise");
	// Affiche en clair l'erreur PDO si la requête ne peut pas s'exécuter
	if ($r == false) {
		var_dump($this->db->pg_result_error());
		exit(1);
	}
	$table = pg_fetch_all($req);
	var_dump($f); 
	$client = new Client();

	while ($data = pg_fetch_object($req)) {
		echo $data->author . " (";
		echo $data->year . "): ";
		echo $data->title . "<br />";
	} 

	// Tests d'erreurs
	if (count($table) == 0) {
		throw new Exception("Client d'id $idClient non trouvé\n");
	}
	$client = $table[0];
	} catch (PDOException $e) {
	die("PDO Error :".$e->getMessage());
	}
	return $client;
}

function getCoach(int $idCoach) : Coach {
	try {
	$r = $this->db->query("SELECT * FROM Coach WHERE idCoach=$idCoach");
	// Affiche en clair l'erreur PDO si la requête ne peut pas s'exécuter
	if ($r == false) {
		var_dump($this->db->errorInfo());
		exit(1);
	}
	$table = $r->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Coach');
	// Tests d'erreurs
	if (count($table) == 0) {
		throw new Exception("Coach d'id $idCoach non trouvé\n");
	}
	$client = $table[0];
	} catch (PDOException $e) {
	die("PDO Error :".$e->getMessage());
	}
	return $client;
}

function getCandidat(int $idCandidat) : Candidat {
	try {
	$r = $this->db->query("SELECT * FROM Candidat WHERE idCandidat=$idCandidat");
	// Affiche en clair l'erreur PDO si la requête ne peut pas s'exécuter
	if ($r == false) {
		var_dump($this->db->errorInfo());
		exit(1);
	}
	$table = $r->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Candidat');
	// Tests d'erreurs
	if (count($table) == 0) {
		throw new Exception("Candidat d'id $idCandidat non trouvé\n");
	}
	$candidat = $table[0];
	} catch (PDOException $e) {
	die("PDO Error :".$e->getMessage());
	}
	return $candidat;
}

function getOffre(int $idOffre) : Offre {
	try {
	$r = $this->db->query("SELECT * FROM Offre WHERE idOffre=$idOffre");
	// Affiche en clair l'erreur PDO si la requête ne peut pas s'exécuter
	if ($r == false) {
		var_dump($this->db->errorInfo());
		exit(1);
	}
	$table = $r->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Offre');
	// Tests d'erreurs
	if (count($table) == 0) {
		throw new Exception("Offre d'id $idOffre non trouvé\n");
	}
	$offre = $table[0];
	} catch (PDOException $e) {
	die("PDO Error :".$e->getMessage());
	}
	return $offre;
}*/
} 
?>
