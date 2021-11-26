
<?php

// Description d'une offre  
class Offre {
  private int $idOffre;                     //Adresse du candidat
  private string $nomOffre;                 //lien CV
  private string $dateOffre;                //lien lettre de motivation
  private Renseignement $detailOffre;       //detail de l'offres
  private Competence $competenceRecherche;  //Competence souhaité par l'offre
  private array $candidats;                 //Tous les candidat potentiel
  private Entreprise $entreprise;           //L'entreprise à l'initiative de l'offre

  // Contructeur
  function __construct(string $nomOffre, string $dateOffre, Entreprise $entreprise) {
    $this->nomOffre = $nomOffre;
    $this->dateOffre = $dateOffre;
    $this->entreprise = $entreprise;
  }

  function getId() : int {
    return $this->id;
  }

  function getNomOffre() : string {
    return $this->nomOffre;
  }

  function getDateOffre() : string {
    return $this->dateOffre;
  }

  function getDetailOffre() : Renseignement {
    return $this->detailOffre;
  }

  function getCompetenceRecherche() : Competence {
    return $this->competenceRecherche;
  }

  function getCandidats() : array {
    return $this->candidats;
  }

  function getEntreprise() : Entreprise {
    return $this->entreprise;
  }


}



?>
