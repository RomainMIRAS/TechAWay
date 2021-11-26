
<?php

// Description d'une compétence  
class Competence {
  private int $id;                      //Identifiant compétence
  private string $nvEtude;              //Niveau étude
    private string $langeParle;         //Lange parlé
    private string $langageAcquis;      //Langage informatique parlé


  // Contructeur
  function __construct(string $nvEtude='', string $langeParle='', string $langageAcquis='') {
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

  function getLangeParle() : string {
    return $this->langeParle;
  }

  function getLangageAcquis() : string {
    return $this->langageAcquis;
  }
}



?>
