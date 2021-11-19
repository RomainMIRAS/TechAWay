<?php

// Description d'un livre  
class Coach {
  private int $id;              //Identifiant du coach
  private string $nom;          //Nom
  private string $prenom;       //Prenom
  private string $mail;         //Mail

  // Contructeur
  function __construct(int $id=0, string $nom='', string $prenom='', string $mail='') {
    $this->idClient = $id;
    $this->nom = $nom;
    $this->prenom = $prenom;
    $this->mail = $mail;
  }

  function getId() : int {
    return $this->idClient;
  }

  function getNom() : string {
    return $this->nom;
  }

  function getPrenom() : string {
    return $this->prenom;
  }

  function getMail() : string {
    return $this->lienCV;
  }

}



?>
