<?php

// Description d'un candidat  
class Candidat {
  private string $adresse;              //Adresse du candidat
  private string $lienCV;               //lien CV
  private string $lienLM;               //lien lettre de motivation
  private string $etape;                //Etape du recrutement
  private Competence $competenceAcquis; //Les compétence du candidat

  // Contructeur
  function __construct(string $nom, string $prenom, string $mail, string $password, string $lienCV="Non-renseigné") {
    parent::__construct($nom, $prenom, $mail, $password);
    $this->lienCV = $lienCV;
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


}



?>
