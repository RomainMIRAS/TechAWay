<?php

include_once(__DIR__."/../framework/view.class.php");
include_once(__DIR__."/../model/Candidat.class.php");
include_once(__DIR__."/../model/Coach.class.php");


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


// Etape du formulaire
if ($_SESSION['utilisateur']->getEtape() == 0){ // Etape du formulaire
  header('Location: formulaire.ctrl.php');
} else if ($_SESSION['utilisateur']->getEtape() == 1) { // Etape Recherche d'entreprise
  header('Location: offre.ctrl.php');
} else if ($_SESSION['utilisateur']->getEtape() == 2) { // Etape Coaching CV et Lettre
  header('Location: offre.ctrl.php');
} else if ($_SESSION['utilisateur']->getEtape() == 3) { // Etape Coaching Entretien
  header('Location: main.ctrl.php');
}

session_write_close();




?>
