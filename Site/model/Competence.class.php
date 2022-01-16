
<?php

// Description d'une compétence
class Competence {
  private int $id;                      //Identifiant compétence
  private string $nvEtude;              //Niveau étude
  private array $langeParle = array();            //Lange parlé
  private array $langageAcquis = array();         //Langage informatique parlé

  // Contructeur
  function __construct(int $id,string $nvEtude = '', string $langeParle = "", string $langageAcquis = "") {
    $this->id = $id;
    $this->nvEtude = $nvEtude;
    $this->langeParle = $this->conversionStringArray($langeParle);
    $this->langageAcquis = $this->conversionStringArray($langageAcquis);
  }

//fonction utilitaire pour transformer une chaine de caractère en tableau en séparant à chaque virgule
  function conversionStringArray(string $chaine){
    $arrayChaine = explode(",",$chaine);
    return $arrayChaine;
  }

//Tout les getter pour recupérer les attributs
  function getId() : int {
    return $this->id;
  }

  function getNvEtude() : string {
    return $this->nvEtude;
  }

  function getlangeParle() : array {
    return $this->langeParle;
  }

  function getLangageAcquis() : array {
    return $this->langageAcquis;
  }


//Tout les setter pour recupérer les attributs
  function setNvEtude(string $nvEtude) : void {
    $this->nvEtude = $nvEtude;
  }

  function setlangeParle(array $langeParle) : void {
    $this->langeParle = $langeParle;
  }

  function setLangageAcquis(array $langageAcquis) : void {
    $this->langageAcquis = $langageAcquis;
  }

}



?>
