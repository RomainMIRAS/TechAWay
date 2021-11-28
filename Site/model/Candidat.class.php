<?php

// Description d'un candidat
class Candidat extends Utilisateur {
  private string $pays;                 //pays du candidat
  private string $ville;                //ville du candidat
  private string $lienCV;               //lien CV
  private string $lienLM;               //lien lettre de motivation
  private string $etape;                //Etape du recrutement
  private Competence $competenceAcquis; //Les compétence du candidat
  private Renseignement $preference;     //Préférence concernant les offres
  private array $discussions;           //discussions auquelle participe le candidat

  // Contructeur
  function __construct(string $mail, string $password,string $nom='', string $prenom='', string $telephone='', string $lienCV='', string $lienLM='') {
    parent::__construct($nom, $prenom, $mail, $password, $telephone);
    $this->lienCV = $lienCV;
    $this->lienLM = $lienLM;
  }

  function getAdresse() : string {
    return $this->adresse;
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


}



?>
