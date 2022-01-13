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

/* Variable erreur ****************************************************************************/

$erreur = ''; // variable erreur initialisée à vide

/* Boutons 'Ajouter' **************************************************************************/

$ajouterEntrepriseBtn = $_POST['ajouterEntrepriseBtn'] ?? '';

/* Liste de tous les pays européens (continent) ***********************************************/

$listePays = array('Allemagne','Autriche','Andorre','Belgique','Boznie Herzegovine','Bulgarie','Chypre','Croatie','Danemark','Espagne','Estonie','Finlande','France','Gibraltar','Grece','Hongrie','Irlande','Islande','italie','Lettonie','Liechtenstein','Lituanie','Luxembourg','Malte','Monaco','Norvege','Pays Bas','Pays de Galle','Pologne','Portugal','Republique Tcheque','Roumanie','Royaume Uni','Russie','Slovaquie','Slovenie','Suede','Suisse','Ukraine','Vatican');

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

$entrepriseName  = $_POST['entrepriseName']  ?? '';
$entrepriseMail  = $_POST['entrepriseMail']  ?? '';
$entrepriseTel   = $_POST['entrepriseTel']   ?? '';
$entreprisePays  = $_POST['entreprisePays']  ?? '';
$entrepriseVille = $_POST['entrepriseVille'] ?? '';

if ($ajouterEntrepriseBtn=='ajouterEntreprise') {
    if ($entrepriseMail!='' && $entreprisePays!='' && $entrepriseName!='') {
        $db->creeEntreprise($entrepriseMail,$entrepriseName,$entrepriseTel,$entreprisePays,$entrepriseVille);
    } else {
        $erreur = "Les champs * sont obligatoires.";
    }
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
$entrepriseAction = $_POST['entrepriseAction'] ?? '';
$entrepriseMessage = '';

if ($entrepriseAction=='deleteY') {
    $db->deleteEntreprise($entrepriseToDelete);
    $entrepriseMessage = "L'entreprise a bien été supprimée.";
    header("Location: tableau.ctrl.php");
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

$view->assign("candidats",$candidats);                                 // liste des candidats
$view->assign("nbCandidats",$nbCandidats);                             // nombres de candidats

$view->assign("entreprises",$entreprises);                             // listes des entreprises
$view->assign("nbEntreprises",$nbEntreprises);                         // nombres d'entreprises

$view->assign("offres",$offres);                                       // listes des offres
$view->assign("nbOffres",$nbOffres);                                   // nombres d'offres

$view->assign("candidatMessage",$candidatMessage);                     // message Candidat
$view->assign("entrepriseMessage",$entrepriseMessage);                 // message Entreprise
$view->assign("offreMessage",$offreMessage);                           // message Offre

$view->assign("erreur",$erreur);                                       // variable erreur
$view->assign("listePays",$listePays);                                 // liste des pays

/* Chargement de la vue ***********************************************************************/
$view->display("tableau.view.php"); // on affiche la vue tableau.view.php

?>
