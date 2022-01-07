<?php
include_once(__DIR__."/../model/Utilisateur.class.php");
include_once(__DIR__."/../model/Competence.class.php");
include_once(__DIR__."/../model/Renseignement.class.php");

// Description d'un candidat
class Candidat extends Utilisateur {
  private string $pays;                 //pays du candidat
  private string $ville;                //ville du candidat
  private string $lienCV;               //lien CV
  private string $lienLM;               //lien lettre de motivation
  private int $etape;                //Etape du recrutement
  private Competence $competenceAcquis; //Les compétence du candidat
  private Renseignement $preference;     //Préférence concernant les offres
  private array $discussions;           //discussions auquelle participe le candidat

  // Contructeur
  // Revoir Constructeur
function __construct(string $mail, string $password,string $nom='', string $prenom='', int $age=0, string $telephone='', string $lienCV='', string $lienLM='', int $etape = 0, string $pays ='' , string $ville = '', string $dateCreation = '' , Competence $competenceAcquis, Renseignement $preference  ) {
    parent::__construct($mail, $password, $nom, $prenom, $age, $telephone, $dateCreation);
    $this->lienCV = $lienCV;
    $this->lienLM = $lienLM;
    $this->etape = $etape;
    $this->pays = $pays;
    $this->ville = $ville;
    $this->competenceAcquis = $competenceAcquis;
    $this->preference = $competenceAcquis;
    // $this->discussions = null;
  }

  function getPays() : string {
    return $this->pays;
  }

  function getVille() : string {
    return $this->ville;
  }

  function getLienCv() : string {
    return $this->lienCV;
  }

  function getEtape() : string {
    return $this->etape;
  }

  function getLienLM() : string {
    return $this->lienLM;
  }

  function getCompetenceAcquis() : Competence {
    return $this->competenceAcquis;
  }

  function getRenseignement() : Renseignement {
    return $this->preference;
  }

  function getDiscussions() : array {
    return $this->discussions;
  }


  function setPays(string $pays) : void {
    $this->pays = $pays;
  }

  function setVille(string $ville) : void {
    $this->ville = $ville;
  }

  function setLienCV(string $lienCV) : void {
    $this->lienCV = $lienCV;
  }

  function setLienLM(string $lienLM) : void {
    $this->lienLM = $lienLM;
  }

  function setEtape(string $etape) : void {
    $this->etape = $etape;
  }

  function setCompetenceAcquis(Competence $competenceAcquis) : void {
    $this->competenceAcquis = $competenceAcquis;
  }

  function setPreference(Renseignement $preference) : void {
    $this->preference = $preference;
  }

  function setDiscussions(array $discussions) : void {
    $this->discussions = $discussions;
  }

  function addDiscussions(Discussion $discussions) : void {
    array_push($this->discussions,$discussions);
  }


}



?>
