<?php

// Description d'un utilisateur
abstract class Utilisateur {
  //private int $id;              //Identifiant
  private string $nom;          //Nom
  private string $prenom;       //Prenom
  private string $mail;         //Mail
  private string $password;     //Mot de passe
  private string $telephone;    //Telephone
  private int $age;             //Age
  private string $dateCreation;  //Date création utilisateur

  // Contructeur
  function __construct(string $mail, string $password,string $nom ='', string $prenom='', int $age = 0, string $telephone='') {
    $this->nom = $nom;
    $this->prenom = $prenom;
    $this->mail = $mail;
    $this->password = $password;
    $this->telephone = $telephone;
    $this->age = $age;
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

  function getMail() : string {
    return $this->mail;
  }

  function getPassword() : string {
    return $this->password;
  }

  function getTelephone() : string {
    return $this->telephone;
  }

  function getAge() : int {
    return $this->age;
  }

  function getDateCreation() : string {
    return $this->dateCreation;
  }

}



?>
