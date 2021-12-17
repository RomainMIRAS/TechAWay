
<?php

// Description d'une compétence  
class Competence {
  private int $id;                      //Identifiant compétence
  private string $nvEtude;              //Niveau étude
  private array $langeParle;            //Lange parlé
  private array $langageAcquis;         //Langage informatique parlé

  // Contructeur
  function __construct(int $id,string $nvEtude, array $langeParle, array $langageAcquis) {
    $this->id = $id;
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



  function setNvEtude(string $nvEtude) : void {
    $this->nvEtude = $nvEtude;
  }

  function setLangeParle(string $langeParle) : void {
    $this->langeParle = $langeParle;
  }

  function setLangageAcquis(string $langageAcquis) : void {
    $this->langageAcquis = $langageAcquis;
  }

}



?>
