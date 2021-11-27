<?php
/* require_once(__DIR__.'/Client.class.php');
require_once(__DIR__.'/Candidat.class.php');
require_once(__DIR__.'/Offre.class.php'); */

// Le Data Access Objet
class DAO {
private $db;

// Constructeur chargé d'ouvrir la BD
function __construct() {
	try{
	$this->db = pg_connect("host=localhost port=5432 dbname=techawaydb user=pagman password=pagman");//138.68.96.182
	
	}catch (Exception $e) {
	print("\n*** Erreur ***\n");
	print("Erreur : ".$e->getMessage()."\n");
	}

}

function getEmails() : array {
	try {
	$req = pg_query($this->db,"SELECT adresseMail FROM UTILISATEUR");
	// Affiche en clair l'erreur PDO si la requête ne peut pas s'exécuter
	/* if ($req == false) {
		var_dump($this->db->pg_result_error());
		exit(1);
	} */

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
	try {
	$r = "INSERT INTO utilisateur VALUES(DEFAULT,'". $mail ."','". $pass ."',NULL,NULL,NULL,NULL,now());";

	
	if(pg_query($this->db, $r)){
		return TRUE;
	} else{
		//echo "ERROR: Could not able to execute $r. \n" . pg_errormessage($this->db) . "\n";
		return FALSE;
	}
	// Tests d'erreurs
	} catch (Exception $e) {
		die("PSQL ERROR :".$e->getMessage());
	}

}

/* 
function verifEmailMdp(string $mail, string $pass) : array {
	try {
	$req = pg_query($this->db,"SELECT * FROM UTILISATEUR where adresseMail=$mail AND password=$pass");
	// Affiche en clair l'erreur PDO si la requête ne peut pas s'exécuter
	if ($r == false) {
		var_dump($this->db->pg_result_error());
		exit(1);
	}

	$table = pg_fetch_all($req);
	$listeMail = array();
	foreach ($table as $mail) {
		array_push($listeMail,$mail);
	};

	// Tests d'erreurs
	if (count($table) == 0) {
		throw new Exception("Aucun Email trouvee\n");
	}
	} catch (PDOException $e) {
	die("PDO Error :".$e->getMessage());
	}
	return $liste;
}


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
