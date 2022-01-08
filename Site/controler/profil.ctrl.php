<?php

// Inclusion du framework
include_once(__DIR__."/../framework/view.class.php");

// Inclusion du modèle
include_once(__DIR__."/../model/DAO.class.php");
include_once(__DIR__."/../model/Utilisateur.class.php");
include_once(__DIR__."/../model/Candidat.class.php");
include_once(__DIR__."/../model/Coach.class.php");

$view = new View();

/* On récupère le lien photo */
$photoLink = $_POST['link-photo'] ?? '';

copy($photoLink,"../data/");

// Passage des paramètres

$view->assign("photoLink",$photoLink);

// Charge la vue
$view->display("profil.view.php");
?>
