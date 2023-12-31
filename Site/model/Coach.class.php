<?php

// Description d'un Coach
class Coach extends Utilisateur {
  private string $lienPhoto;    //Lien photo du coach
  private array $discussions;   //Discussion auquelle le coach participe

  // Contructeur
  function __construct(string $mail, string $password,string $nom='', string $prenom='', string $telephone='', int $age=0, string $lienPhoto='',string $dateCreation='') {
    parent::__construct($mail, $password, $nom, $prenom, $age, $telephone,$dateCreation);
    $this->lienPhoto = $lienPhoto;
  }


//Tout les getter pour recupérer les attributs
  function getLienPhoto() : string {
    return $this->lienPhoto;
  }

  function getDiscussions() : array {
    return $this->discussions;
  }


//Tout les setter pour recupérer les attributs
  function setLienPhoto(string $lienPhoto) : void {
    $this->lienPhoto = $lienPhoto;
  }

    function setDiscussions(array $discussions) : void {
    $this->discussions = $discussions;
  }

  function addDiscussions(array $discussion) : void {
    array_push($this->discussions,$discussion);
  }

}



?>
