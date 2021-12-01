<?php

// Description d'une entreprise  
class Entreprise {
  private int $id;              //Identifiant du client
  private string $nom;          //Nom
  private string $adresse;      //Adresse du client
  private string $telephone;    //Telephone
  private string $mail;         //Mail
  private Offre $offres;        //liste des offres faite par l'entreprise

  // Contructeur
  function __construct(string $nom, string $adresse, string $telephone, string $mail) {
    $this->nom = $nom;
    $this->adresse = $adresse;
    $this->telephone = $telephone;
    $this->mail = $mail;
    $this->offres = null;
  }

  function getId() : int {
    return $this->idClient;
  }

  function getNom() : string {
    return $this->nom;
  }

  function getAdresse() : string {
    return $this->adresse;
  }

  function getTelephone() : string {
    return $this->telephone;
  }

  function getMail() : string {
    return $this->lienCV;
  }

  function getOffres() : Offre {
    return $this->offres;
  }

}



?>
