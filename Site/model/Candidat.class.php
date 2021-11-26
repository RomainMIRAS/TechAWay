<?php

// Description d'un livre  
class Candidat {
  private string $adresse;      //Adresse du candidat
  private string $lienCV;       //lienCV
  private string $etape;        //Etape du recrutement

  // Contructeur
  function __construct(string $nom='', string $prenom='', string $mail='', string $password='') {
    parent::__construct($nom, $prenom, $mail, $password);
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


}



?>
