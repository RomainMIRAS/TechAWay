<?php

// Description d'un utilisateur
abstract class Utilisateur {
  private string $nom;          //Nom
  private string $prenom;       //Prenom
  private string $mail;         //Mail Clee primaire
  private string $password;     //Mot de passe
  private string $telephone;    //Telephone
  private int $age;             //Age
  private string $dateCreation; //Date de création

  // Contructeur
  function __construct(string $mail, string $password,string $nom ='', string $prenom='', int $age = 0, string $telephone='', string $dateCreation = '') {
    $this->nom = $nom;
    $this->prenom = $prenom;
    $this->mail = $mail;
    $this->password = $password;
    $this->telephone = $telephone;
    $this->age = $age;
    $this->dateCreation = $dateCreation;
  }

  //Tout les getter pour recupérer les attributs
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



//Tout les setter pour recupérer les attributs
  function setNom(string $nom) : void {
    $this->nom = $nom;
  }

  function setPrenom(string $prenom) : void {
    $this->prenom = $prenom;
  }

  function setMail(string $mail) : void {
    $this->mail = $mail;
  }

  function setPassword(string $password) : void {
    $this->password = $password;
  }

  function setTelephone(string $telephone) : void {
    $this->telephone = $telephone;
  }

  function setAge(int $age) : void {
    $this->age = $age;
  }

  function setDateCreation(string $dateCreation) : void {
    $this->dateCreation = $dateCreation;
  }
}



?>
