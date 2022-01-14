<?php

include_once(__DIR__."/../framework/view.class.php");
include_once(__DIR__."/../model/Candidat.class.php");
include_once(__DIR__."/../model/Coach.class.php");
include_once(__DIR__."/../model/DAO.class.php"); // Singleton

$db = DAO::get();
// Ce controleur permet de sélectionner le bon controleur à utiliser selon
// L'état du recrutement du candidat

///////////////////////////////////////////////////////////////////////////////
// Protection Contre Erreurs
///////////////////////////////////////////////////////////////////////////////

session_start();
// Si pas déja connecté => Ne pas afficher cette page :D !
if (!isset($_SESSION['utilisateur'])) header('Location: main.ctrl.php');


// Si c'est un coach
if (is_a($_SESSION['utilisateur'],"Coach")) header('Location: tableau.ctrl.php');

session_write_close();


///////////////////////////////////////////////////////////////////////////////
// Partie Gestion
///////////////////////////////////////////////////////////////////////////////

session_start();

$candidat = $db->getCandidat($_SESSION['utilisateur']->getMail());
// Etape du formulaire
if ($candidat->getEtape() == 0){ // Etape du formulaire
  header('Location: formulaire.ctrl.php');
} else if ($candidat->getEtape() == 1) { // Etape Recherche d'entreprise
  header('Location: RechercheEntreprise.ctrl.php');
} else if ($candidat->getEtape() == 2) { // Etape Coaching CV et Lettre
  header('Location: offre.ctrl.php');
} else if ($candidat->getEtape() == 3) { // Etape Coaching Entretien
  header('Location: main.ctrl.php');
}

session_write_close();




?>
