<?php
///////////////////////////////////////////////////////////////////////////////
// Declaration
///////////////////////////////////////////////////////////////////////////////

// Inclusion du framework
include_once(__DIR__."/../framework/view.class.php");

// Inclusion du modèle
include_once(__DIR__."/../model/DAO.class.php"); // Singleton
include_once(__DIR__."/../model/Competence.class.php");
include_once(__DIR__."/../model/Renseignement.class.php");
include_once(__DIR__."/../model/Offre.class.php");
include_once(__DIR__."/../model/Candidat.class.php");

$db = DAO::get(); // on récupère l'unique instance

session_start();
$candidat = $db->getCandidat($_SESSION['utilisateur']->getMail()); //On récupère le candidat
session_write_close();

///////////////////////////////////////////////////////////////////////////////
// Protection Contre Erreurs
///////////////////////////////////////////////////////////////////////////////

// Si l'étape et déjà passer ou qu'il est un coach!
session_start();

// Si pas connecter
if (!isset($_SESSION['utilisateur'])) header('Location: authentification.ctrl.php');

// Si utilisateur est un coach
if (!is_a($_SESSION['utilisateur'],"Candidat")) header('Location: main.ctrl.php');

// Si il a pas encore choissi une offre
if ($candidat->getEtape() != 2) header('Location: recrutement-candidat.ctrl.php');

session_write_close();


///////////////////////////////////////////////////////////////////////////////
// Déclaration de variable
///////////////////////////////////////////////////////////////////////////////


$offre = $db->getOffre($candidat->getLienLM()); //On récupère l'offre à laquelle le candidat à postuler

///////////////////////////////////////////////////////////////////////////////
// Partie View
///////////////////////////////////////////////////////////////////////////////

$view = new View();


//On gère l'abandon d'une offre
$action = $_POST['action'] ?? '';
$message = '';
if ($action=='supprY') { //Si il veut la supprimer
        $candidat->setLienLM("");
        
        $candidat->setEtape(1);
        $db->updateCandidat($candidat); //On supprime et on actualise le candidat
        header("Location: recrutement-candidat.ctrl.php"); // on redirige vers la selection d'une offre
}

// Charge la vue
$view->assign('offre',$offre);
$view->display("offre.view.php");


?>

