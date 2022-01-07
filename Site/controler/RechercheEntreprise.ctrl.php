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

// Déclaration
$email = (isset($_POST['email'])) ? $_POST['email']:"";
$password = (isset($_POST['password'])) ? $_POST['password']:"";
$checkpassword = (isset($_POST['checkpassword'])) ? $_POST['checkpassword']:"";


session_start();
$competence = $_SESSION['utilisateur']->getCompetenceAcquis();
session_write_close();
///////////////////////////////////////////////////////////////////////////////
// Partie View
///////////////////////////////////////////////////////////////////////////////

$view = new View();

$view->assign('erreur',$competence);
$view->display("authentification.view.php");


// Fin du code à ajouter ]]

?>


