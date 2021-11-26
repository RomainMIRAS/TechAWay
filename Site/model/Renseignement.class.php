
<?php

// Description d'un renseignement  
class Renseignement {
  private int $id;                  //id renseignement
  private boolean $travEtranger;    //Travail à l'étranger ?
  private string $secteur;          //Secteur du métier
  private string $typeContrat;      //Type de contrat
  private string $poste;            //Poste concerné
  private string $typeEntreprise;   //Type d'entreprise



  // Contructeur
  function __construct(boolean $travEtranger, string $secteur, string $typeContrat, string $poste, string $typeEntreprise) {
    $this->id = $id;
    $this->travEtranger = $travEtranger;
    $this->secteur = $secteur;
    $this->typeContrat = $typeContrat;
    $this->poste = $poste;
    $this->typeEntreprise = $typeEntreprise;
  }

  function getId() : int {
    return $this->id;
  }

  function getTravEtranger() : boolean {
    return $this->travEtranger;
  }

  function getSecteur() : string {
    return $this->secteur;
  }

  function getTypeContrat() : string {
    return $this->typeContrat;
  }

  function getPoste() : string {
    return $this->poste;
  }

  function getTypeEntreprise() : string {
    return $this->typeEntreprise;
  }


}



?>
