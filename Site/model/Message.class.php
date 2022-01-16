<?php

// Description d'un message  
class Message {
  private int $id;                  //Identifiant d'un message
  private string $contenuMessage;   //Le message en lui même
  private string $dateMessage;      //Date du message
  private Discussion $discussion    //Discussion du message

  // Contructeur
  function __construct(string $contenuMessage, Discussion $discussion) {
    $this->contenuMessage = $contenuMessage;
    $this->discussion = $discussion;
  }


//Tout les getter pour recupérer les attributs
  function getId() : int {
    return $this->id;
  }

  function getContenuMessage() : string {
    return $this->contenuMessage;
  }

  function getDateMessage() : string {
    return $this->dateMessage;
  }

  function getDiscussion() : Discussion {
    return $this->discussion;
  }



//Tout les setter pour recupérer les attributs
  function setContenuMessage(string $contenuMessage) : void {
    $this->contenuMessage = $contenuMessage;
  }

  function setDateMessage(string $dateMessage) : void {
    $this->dateMessage = $dateMessage;
  }

  function setDiscussion(Discussion $discussion) : void {
    $this->discussion = $discussion;
  }


}



?>
