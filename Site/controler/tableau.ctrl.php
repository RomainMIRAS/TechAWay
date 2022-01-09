<?php

/* Inclusion du framework *********************************************************************/
include_once(__DIR__."/../framework/view.class.php");


/* Inclusion du modèle ************************************************************************/
include_once(__DIR__."/../model/DAO.class.php");
include_once(__DIR__."/../model/Utilisateur.class.php");
include_once(__DIR__."/../model/Candidat.class.php");
include_once(__DIR__."/../model/Coach.class.php");


/* Création de la vue *************************************************************************/
$view = new View();


/* Instance de la base de données *************************************************************/
$db = DAO::get(); // on récupère l'unique instance 


/* Listes des Candidats, Entreprises et Offres ************************************************/

$candidats = $db->getCandidats();      // liste des candidats
$nbCandidats = $db->nombreCandidats(); // nombre de candidats

$entreprises = $db->getEntreprises();
$nbEntreprises = $db->nombreEntreprises();

$offres = $db->getOffres();
$nbOffres = $db->nombreOffres();


/* Ajout Entreprises et Offres ****************************************************************/

$entrepriseName  = $_POST['entrepriseName'] ?? '';
$entrepriseMail  = $_POST['entrepriseMail'] ?? '';
$entrepriseTel   = $_POST['entrepriseTel']  ?? '';
$entrepriseVille = $_POST['entreprisePays'] ?? '';

if ($entrepriseMail!='') {
    $db->creeEntreprise($entrepriseMail,$entrepriseName,$entrepriseTel,$entrepriseVille);
}

/* Suppression Candidats, Entreprises et Offres ***********************************************/

$candidatToDelete = $_POST['candidatToDelete'] ?? '';
$candidatAction = $_POST['candidatAction'] ?? '';
$candidatMessage = '';

if ($candidatAction=='deleteY') {
    $db->deleteCandidat($candidatToDelete);
    $candidatMessage = "Le candidat $candidatToDelete a bien été supprimé.";
}

$entrepriseToDelete = $_POST['entrepriseToDelete'] ?? '';
/*if ($db->getEntreprise($entrepriseToDelete)!=false) {
    $entrepriseToDeleteName = $db->getEntreprise($entrepriseToDelete)->getNom();
} else {
    $entrepriseToDeleteName = $entrepriseToDelete;
}*/
$entrepriseAction = $_POST['entrepriseAction'] ?? '';
$entrepriseMessage = '';

if ($entrepriseAction=='deleteY') {
    $db->deleteEntreprise($entrepriseToDelete);
    $entrepriseMessage = "L'entreprise $entrepriseToDelete a bien été supprimée.";
}

$offreToDelete = $_POST['offreToDelete'] ?? '';
/*if ($db->getOffre($offreToDelete)!=false) {
    $offreToDeleteName = $db->getOffre($offreToDelete)->getNomOffre();
} else {
    $offreToDeleteName = $offreToDelete;
}*/
$offreAction = $_POST['offreAction'] ?? '';
$offreMessage = '';

if ($offreAction=='deleteY') {
    $db->deleteOffre($offreToDelete);
    $offreMessage = "L'offre $offreToDelete a bien été supprimée.";
}


/* Passage des paramètres à la vue ************************************************************/

$view->assign("candidats",$candidats);                     // liste des candidats
$view->assign("nbCandidats",$nbCandidats);                 // nombres de candidats

$view->assign("entreprises",$entreprises);                 // listes des entreprises
$view->assign("nbEntreprises",$nbEntreprises);             // nombres d'entreprises

$view->assign("offres",$offres);                           // listes des offres
$view->assign("nbOffres",$nbOffres);                       // nombres d'offres

$view->assign("candidatMessage",$candidatMessage);         // message Candidat
$view->assign("entrepriseMessage",$entrepriseMessage);     // message Entreprise
$view->assign("offreMessage",$offreMessage);               // message Offre


/* Chargement de la vue ***********************************************************************/
$view->display("tableau.view.php"); // on affiche la vue tableau.view.php

?>