<?php

// Inclusion du framework
include_once(__DIR__."/../framework/view.class.php");

// Inclusion du modèle
include_once(__DIR__."/../model/DAO.class.php");
include_once(__DIR__."/../model/Utilisateur.class.php");
include_once(__DIR__."/../model/Candidat.class.php");
include_once(__DIR__."/../model/Coach.class.php");

$view = new View();

$db = DAO::get();

/* Récupération de tous les candidats de la base */

$candidats = $db->getCandidats();
$nbCandidats = $db->nombreCandidats();

/* Récupération de toutes les entreprises de la base */

$entreprises = $db->getEntreprises();
$nbEntreprises = $db->nombreEntreprises();

/* Récupération de toutes les offres de la base */

$offres = $db->getOffres();
$nbOffres = $db->nombreOffres();

/* Passage des paramètres à la vue */

$view->assign("candidats",$candidats);
$view->assign("nbCandidats",$nbCandidats);

$view->assign("entreprises",$entreprises);
$view->assign("nbEntreprises",$nbEntreprises);

$view->assign("offres",$offres);
$view->assign("nbOffres",$nbOffres);

// Charger la vue
$view->display("tableau.view.php");
?>
