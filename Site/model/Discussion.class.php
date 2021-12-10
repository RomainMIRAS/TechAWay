

<?php

// Description d'une discussion  
class Discussion {
  private int $id;                      //id de la discussion
  private string $dateDiscussion;       //date de la Discussion
  private Candidat $correspondant1;     //Candidat de la discussion
  private Coach $correspondant2;        //Coach de la discussion
  private array $messages;              //Liste des messages envoyer dans la discussion

  // Contructeur
  function __construct(Candidat $correspodant1, Coach $correspodant2) {
    $this->correspondant1 = $correspondant1;
    $this->correspondant2 = $correspondant2;
    $this->messages = null;
  }

  function getId() : int {
    return $this->id;
  }

  function getDateDiscussion() : string {
    return $this->dateDiscussion;
  }

  function getCorrespondant1() : Candidat {
    return $this->correspondant1;
  }

  function getCorrespondant2() : Coach {
    return $this->correspondant2;
  }




  function setDateDiscussion(string $dateDiscussion) : void {
    $this->dateDiscussion = $dateDiscussion;
  }

  function setCorrespondant1(Candidat $correspondant1) : void {
    $this->correspondant1 = $correspondant1;
  }

  function setCorrespondant2(Coach $correspondant2) : void {
    $this->correspondant2 = $correspondant2;
  }

  function setMessages(array $messages) : void {
    $this->messages = $messages;
  }

  function addMessage(Message $message) : void {
    array_push($this->messages,$message);
  }

}



?>
