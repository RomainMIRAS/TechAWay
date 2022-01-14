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

///////////////////////////////////////////////////////////////////////////////
// Protection Contre Erreurs
///////////////////////////////////////////////////////////////////////////////

// Si l'étape et déjà passer ou qu'il est un coach!
session_start();

// Si pas connecter
if (!isset($_SESSION['utilisateur'])) header('Location: authentification.ctrl.php');

// Si utilisateur est un coach
if (!is_a($_SESSION['utilisateur'],"Candidat")) header('Location: main.ctrl.php');

// Si il a déjà rempli le formulaire
if ($_SESSION['utilisateur']->getEtape() != 2) header('Location: recrutement-candidat.ctrl.php');

session_write_close();


///////////////////////////////////////////////////////////////////////////////
// Déclaration de variable
///////////////////////////////////////////////////////////////////////////////

session_start();
$candidat = $_SESSION['utilisateur'];
session_write_close();

$offre = $db->getOffre($candidat->getLienLM());

$view = new View();


$action = $_POST['action'] ?? '';
$message = '';
if ($action=='supprY') {
        $candidat->setLienLM("");
        
        $candidat->setEtape(1);
        $db->updateCandidat($candidat);
        header("Location: recrutement-candidat.ctrl.php");
}

$view->assign('offre',$offre);
$view->display("offre.view.php");

// Fin du code à ajouter ]]

?>

