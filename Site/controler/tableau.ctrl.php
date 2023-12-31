<?php

/* Inclusion du framework *********************************************************************/
include_once(__DIR__."/../framework/view.class.php");


/* Inclusion du modèle ************************************************************************/
include_once(__DIR__."/../model/DAO.class.php");
include_once(__DIR__."/../model/Utilisateur.class.php");
include_once(__DIR__."/../model/Candidat.class.php");
include_once(__DIR__."/../model/Coach.class.php");


///////////////////////////////////////////////////////////////////////////////
// Protection Contre Erreurs
///////////////////////////////////////////////////////////////////////////////

// Si l'étape et déjà passer ou qu'il est un coach!
session_start();

// Si pas connecter
if (!isset($_SESSION['utilisateur'])) header('Location: main.ctrl.php');

// Si utilisateur n'est pas un coach
if (!is_a($_SESSION['utilisateur'],"Coach")) header('Location: main.ctrl.php');

session_write_close();



/* Création de la vue *************************************************************************/
$view = new View();

/* Variable erreur ****************************************************************************/

$erreur = ''; // variable erreur initialisée à vide

/* Boutons 'Ajouter' **************************************************************************/

$ajouterEntrepriseBtn = $_POST['ajouterEntrepriseBtn'] ?? '';
$ajouterOffreBtn = $_POST['ajouterOffreBtn'] ?? '';

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

// Ajout entreprise

$entrepriseName  = $_POST['entrepriseName']  ?? '';
$entrepriseMail  = $_POST['entrepriseMail']  ?? '';
$entrepriseTel   = $_POST['entrepriseTel']   ?? '';
$entreprisePays  = $_POST['entreprisePays']  ?? '';
$entrepriseVille = $_POST['entrepriseVille'] ?? '';

if ($ajouterEntrepriseBtn=='ajouterEntreprise') {
    if ($entrepriseMail!='' && $entreprisePays!='' && $entrepriseName!='') {
        $db->creeEntreprise($entrepriseMail,$entrepriseName,$entrepriseTel,$entreprisePays,$entrepriseVille);
        header("Location: tableau.ctrl.php");
    } else {
        $erreur = "Les champs * sont obligatoires.";
    }
}

// Ajout offre

$offreName  = $_POST['offreName']  ?? '';
$idEntrepriseOffre  = $_POST['idEntrepriseOffre']  ?? '';

$niveauEtudes   = $_POST['nvEtude']   ?? '';
$languesParlee  = $_POST['langueParle']  ?? '';
$langagesInfo = $_POST['languageAquis'] ?? '';
$travEtranger = $_POST['travEtranger'] ?? '';
$typeContrat = $_POST['typeContrat'] ?? '';
$secteur = $_POST['secteur'] ?? '';
$poste = $_POST['poste'] ?? '';

if ($ajouterOffreBtn=='ajouterOffre') {
    if ($offreName!='' && $idEntrepriseOffre!='') {
        $lpp = $db->conversionArrayString($languesParlee);
        $lai = $db->conversionArrayString($langagesInfo);
        $theEntreprise = $db->getEntreprise($idEntrepriseOffre);
        $competenceOffre = new Competence(-2,$niveauEtudes,$lpp,$lai);
        $renseignementOffre = new Renseignement(-2,$travEtranger,$secteur,$typeContrat,$poste,'');
        $db->creeOffre($idEntrepriseOffre, $renseignementOffre, $competenceOffre, $offreName);
        header("Location: tableau.ctrl.php");
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
    header("Location: tableau.ctrl.php");
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
$offreAction = $_POST['offreAction'] ?? '';
$offreMessage = '';

if ($offreAction=='deleteY') {
    $db->deleteOffre($offreToDelete);
    $offreMessage = "L'offre a bien été supprimée.";
    header("Location: tableau.ctrl.php");
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
