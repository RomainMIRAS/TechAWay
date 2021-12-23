<?php

// Inclusion du framework
include_once(__DIR__."/../framework/view.class.php");

// Inclusion du modèle
include_once(__DIR__."/../model/DAO.class.php");
include_once(__DIR__."/../model/Utilisateur.class.php");
include_once(__DIR__."/../model/Candidat.class.php");
include_once(__DIR__."/../model/Coach.class.php");

$view = new View();

if (isset($_SESSION['email'])) {
    session_start();
    $candidat = DAO::get()->getCandidat($_SESSION["mail"]);
    $view->assign("candidat",$candidat);
}


// Charge la vue
$view->display("profil.view.php");
?>
