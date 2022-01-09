<?php

// Inclusion du framework
include_once(__DIR__."/../framework/view.class.php");

// Inclusion du modèle
include_once(__DIR__."/../model/DAO.class.php");
include_once(__DIR__."/../model/Utilisateur.class.php");
include_once(__DIR__."/../model/Candidat.class.php");
include_once(__DIR__."/../model/Coach.class.php");

/* Création de la vue */
$view = new View();

/* Récupération de l'unique instance de la base de données */
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

/* Suppression d'un candidat */

$candidatToDelete = $_POST['candidatToDelete'] ?? '';
$candidatAction = $_POST['candidatAction'] ?? '';
$candidatMessage = '';

if ($candidatAction=='deleteY') {
    $db->deleteCandidat($candidatToDelete);
    $candidatMessage = "Le candidat $candidatToDelete a bien été supprimé.";
}

/* Suppression d'une entreprise */

$entrepriseToDelete = $_POST['entrepriseToDelete'] ?? '';
$entrepriseAction = $_POST['entrepriseAction'] ?? '';
$entrepriseMessage = '';

if ($entrepriseAction=='deleteY') {
    $db->deleteEntreprise($entrepriseToDelete);
    $entrepriseMessage = "L'entreprise $entrepriseToDelete a bien été supprimée.";
}

/* Suppression d'une offre */

$offreToDelete = $_POST['offreToDelete'] ?? '';
$offreAction = $_POST['offreAction'] ?? '';
$offreMessage = '';

if ($offreAction=='deleteY') {
    $db->deleteOffre($offreToDelete);
    $offreMessage = "L'offre $offreToDelete a bien été supprimée.";
}


/* Passage des paramètres à la vue */

$view->assign("candidats",$candidats);
$view->assign("nbCandidats",$nbCandidats);

$view->assign("entreprises",$entreprises);
$view->assign("nbEntreprises",$nbEntreprises);

$view->assign("offres",$offres);
$view->assign("nbOffres",$nbOffres);

$view->assign("candidatMessage",$candidatMessage);
$view->assign("entrepriseMessage",$entrepriseMessage);
$view->assign("offreMessage",$offreMessage);

/* Chargement de la vue */
$view->display("tableau.view.php");

?>