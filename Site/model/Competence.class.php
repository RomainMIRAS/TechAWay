
<?php

// Description d'une compétence
class Competence {
  private int $id;                      //Identifiant compétence
  private string $nvEtude;              //Niveau étude
  private array $langueParle = array();            //Lange parlé
  private array $langageAcquis = array();         //Langage informatique parlé

  // Contructeur
  function __construct(int $id,string $nvEtude = '', string $langueParle = "", string $langageAcquis = "") {
    $this->id = $id;
    $this->nvEtude = $nvEtude;
    $this->langueParle = $this->conversionStringArray($langueParle);
    $this->langageAcquis = $this->conversionStringArray($langageAcquis);
  }

  function conversionStringArray(string $chaine){
    $arrayChaine = explode(",",$chaine);
    return $arrayChaine;
  }


  function getId() : int {
    return $this->id;
  }

  function getNvEtude() : string {
    return $this->nvEtude;
  }

  function getlangueParle() : array {
    return $this->langueParle;
  }

  function getLangageAcquis() : array {
    return $this->langageAcquis;
  }

  function setNvEtude(string $nvEtude) : void {
    $this->nvEtude = $nvEtude;
  }

  function setlangueParle(array $langueParle) : void {
    $this->langueParle = $langueParle;
  }

  function setLangageAcquis(array $langageAcquis) : void {
    $this->langageAcquis = $langageAcquis;
  }

}



?>
