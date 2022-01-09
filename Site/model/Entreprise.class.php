<?php

// Description d'une entreprise  
class Entreprise {
  private int $id;              //Identifiant du client
  private string $mail;         //Mail
  private string $nom;          //Nom
  private string $telephone;    //Telephone
  private string $pays;      //Adresse du client
  private string $ville;      //Adresse du client
  //private Offre $offres;        //liste des offres faite par l'entreprise

  // Contructeur
  function __construct(int $id , string $nom = '',string $mail = '', string $telephone = '', string $pays = '', string $ville = '') {
    $this->id = $id;
    $this->mail = $mail;
    $this->nom = $nom;
    $this->pays = $pays;
    $this->ville = $ville;
    $this->telephone = $telephone;
    //$this->offres = null;
  }

  function getId() : int {
    return $this->id;
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
    return $this->mail;
  }

  function getOffres() : Offre {
    return $this->offres;
  }



  function setNom(string $nom) : void {
    $this->nom = $nom;
  }

  function setAdresse(string $adresse) : void {
    $this->adresse = $adresse;
  }

  function setTelephone(string $telephone) : void {
    $this->telephone = $telephone;
  }

  function setMail(string $mail) : void {
    $this->mail = $mail;
  }

  function setOffres(Offre $offres) : void {
    $this->offres = $offres;
  }

}



?>
