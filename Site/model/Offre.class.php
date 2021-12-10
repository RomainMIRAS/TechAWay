
<?php

// Description d'une offre  
class Offre {
  private int $id;                     //Adresse du candidat
  private string $nomOffre;                 //lien CV
  private string $dateOffre;                //lien lettre de motivation
  private Renseignement $detailOffre;       //detail de l'offres
  private Competence $competenceRecherche;  //Competence souhaité par l'offre
  private array $candidats;                 //Tous les candidat potentiel
  private Entreprise $entreprise;           //L'entreprise à l'initiative de l'offre

  // Contructeur
  function __construct(string $nomOffre, Entreprise $entreprise) {
    $this->nomOffre = $nomOffre;
    $this->entreprise = $entreprise;
    $this->detailOffre = null;
    $this->competenceRecherche = null;
    $this->candidats = null;
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



  function setNomOffre(string $nomOffre) : void {
    $this->nomOffre = $nomOffre;
  }

  function setDateOffre(string $dateOffre) : void {
    $this->dateOffre = $dateOffre;
  }

  function setDetailOffre(Renseignement $detailOffre) : void {
    $this->detailOffre = $detailOffre;
  }

  function setCompetenceRecherche(Competence $competenceRecherche) : void {
    $this->competenceRecherche = $competenceRecherche;
  }

  function setEntreprise(Entreprise $entreprise) : void {
    $this->entreprise = $entreprise;
  }

  function setCandidats(array $candidats) : void {
    $this->candidats = $candidats;
  }

  function addCandidats(Candidat $candidat) : void {
    array_push($this->candidats,$candidat);
  }


}



?>
