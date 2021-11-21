<?php
require_once(__DIR__.'/Client.class.php');
require_once(__DIR__.'/Candidat.class.php');
require_once(__DIR__.'/Offre.class.php');

// Le Data Access Objet
class DAO {
  private $db;

  // Constructeur chargé d'ouvrir la BD
  function __construct() {
    $database = 'sqlite:'.dirname(__FILE__).'/../data/tech.db';
    $this->db = new PDO('sqlite:/users/info/etu-s3/delmedir/public_html/TP3/data/Jukebox_DB/Jukebox_DB/data/music.db');
  }

  /* //Accès à un client
  function getClient(int $idClient) : Client {
    try {
      $r = $this->db->query("SELECT * FROM Client WHERE idClient=$idClient");
      // Affiche en clair l'erreur PDO si la requête ne peut pas s'exécuter
      if ($r == false) {
        var_dump($this->db->errorInfo());
        exit(1);
      }
      $table = $r->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Client');
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
  } */
}
?>
