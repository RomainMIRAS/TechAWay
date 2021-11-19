<?php

// Description d'un livre  
class Client {
  private int $id;              //Identifiant du client
  private string $nom;          //Nom
  private string $adresse;      //Adresse du client
  private string $telephone;    //Telephone
  private string $mail;         //Mail

  // Contructeur
  function __construct(int $id=0, string $nom='', string $adresse='', string $telephone='', string $mail='') {
    $this->idClient = $id;
    $this->nom = $nom;
    $this->adresse = $adresse;
    $this->telephone = $telephone;
    $this->mail = $mail;
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

}



?>
