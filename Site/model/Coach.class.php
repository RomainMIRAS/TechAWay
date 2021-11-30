<?php

// Description d'un Coach
class Coach extends Utilisateur {
  private string $lienPhoto;    //Lien photo du coach
  private array $discussions;   //Discussion auquelle le coach participe

  // Contructeur
  function __construct(string $mail, string $password,string $nom='', string $prenom='', string $telephone='', string $lienPhoto='') {
    parent::__construct($mail, $password, $nom, $prenom, $telephone);
    $this->lienPhoto = $lienPhoto;
  }

  function getLienPhoto() : string {
    return $this->lienPhoto;
  }

  function getDiscussions() : array {
    return $this->discussions;
  }

}



?>
