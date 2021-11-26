
<?php

// Description d'une compétence  
class Competence {
  private int $id;                      //Identifiant compétence
  private string $nvEtude;              //Niveau étude
  private array $langeParle;            //Lange parlé
  private array $langageAcquis;         //Langage informatique parlé

  // Contructeur
  function __construct(string $nvEtude, array $langeParle, array $langageAcquis) {
    $this->nvEtude = $nvEtude;
    $this->langeParle = $langeParle;
    $this->langageAcquis = $langageAcquis;
  }

  
  function getId() : int {
    return $this->id;
  }

  function getNvEtude() : string {
    return $this->nvEtude;
  }

  function getLangeParle() : array {
    return $this->langeParle;
  }

  function getLangageAcquis() : array {
    return $this->langageAcquis;
  }
}



?>
