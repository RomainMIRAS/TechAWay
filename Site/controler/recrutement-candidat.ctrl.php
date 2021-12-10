<?php

include_once(__DIR__."/../framework/view.class.php");
include_once(__DIR__."/../model/Candidat.class.php");

// Ce controleur permet de sélectionner le bon controleur à utiliser selon
// L'état du recrutement du candidat



///////////////////////////////////////////////////////////////////////////////
// Partie Gestion
///////////////////////////////////////////////////////////////////////////////

session_start();
//Gestion Erreur si utilisateur pas connecté
if (!isset($_SESSION['utilisateur'])) header('Location: main.ctrl.php');

// Etape du formulaire
if ($_SESSION['utilisateur']->getEtape() == 0){ // Etape du formulaire
  header('Location: formulaire.ctrl.php');
} else if ($_SESSION['utilisateur']->getEtape() == 1) { // Etape Recherche d'entreprise
  header('Location: main.ctrl.php');
} else if ($_SESSION['utilisateur']->getEtape() == 2) { // Etape Coaching CV et Lettre
  header('Location: main.ctrl.php');
} else if ($_SESSION['utilisateur']->getEtape() == 3) { // Etape Coaching
  header('Location: main.ctrl.php');
}

session_write_close();




?>
