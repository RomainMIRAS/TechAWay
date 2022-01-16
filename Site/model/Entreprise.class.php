<?php

// Description d'une entreprise  
class Entreprise {
  private int $id;              //Identifiant du client
  private string $mail;         //Mail
  private string $nom;          //Nom
  private string $telephone;    //Telephone
  private string $pays;      //Adresse du client
  private string $ville;      //Adresse du client
  //private array $offres;        //liste des offres faite par l'entreprise

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


//Tout les getter pour recupérer les attributs
  function getId() : int {
    return $this->id;
  }

  function getNom() : string {
    return $this->nom;
  }

  function getVille() : string {
    return $this->ville;
  }

  function getPays() : string {
    return $this->pays;
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


//Tout les setter pour recupérer les attributs
  function setNom(string $nom) : void {
    $this->nom = $nom;
  }

  function setVille(string $ville) : void {
    $this->ville = $ville;
  }

  function setPays(string $pays) : void {
    $this->pays = $pays;
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
