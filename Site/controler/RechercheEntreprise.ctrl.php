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



session_start();
$competence = $_SESSION['utilisateur']->getRenseignement();
session_write_close();


//$nvEtude = $competence->getnvEtude();
///////////////////////////////////////////////////////////////////////////////
// Partie View
///////////////////////////////////////////////////////////////////////////////

$view = new View();

//$view->assign('competence',$competence);
//$view->assign('etude',$nvEtude);
$view->assign('competence',$competence);
$view->display("RechercheEntreprise.view.php");


// Fin du code à ajouter ]]

?>

// mettre des commentaire + faire des scénario + faire une version papier du rapport
