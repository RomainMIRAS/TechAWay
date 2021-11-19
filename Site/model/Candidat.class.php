<?php

// Description d'un livre  
class Candidat {
  private int $id;              //Identifiant du candidat
  private string $nom;          //Nom
  private string $prenom;       //Prenom
  private int $age;             //Age
  private string $adresse;      //Adresse du candidat
  private string $telephone;    //Telephone
  private string $lienCV;       //lienCV

  // Contructeur
  function __construct(int $id=0, string $nom='', string $prenom='', int $age=0, string $adresse='', string $telephone='', string $lienCV='') {
    $this->id = $id;
    $this->nom = $nom;
    $this->prenom = $prenom;
    $this->age = $age;
    $this->adresse = $adresse;
    $this->telephone = $telephone;
    $this->lienCV = $lienCV;
  }

  function getId() : int {
    return $this->id;
  }

  function getNom() : string {
    return $this->nom;
  }

  function getPrenom() : string {
    return $this->prenom;
  }

  function getAge() : int {
    return $this->age;
  }

  function getAdresse() : string {
    return $this->adresse;
  }

  function getTelephone() : string {
    return $this->telephone;
  }

  function getLienCV() : string {
    return $this->lienCV;
  }

}



?>
