<?php

// Description d'un livre  
class Coach extends Utilisateur {
  private string lienPhoto;

  // Contructeur
  function __construct(string $nom='', string $prenom='', string $mail='', string $password='') {
    parent::__construct($nom, $prenom, $mail, $password);
  }

  function getLienPhoto() : string {
    return $this->lienPhoto;
  }

}



?>
