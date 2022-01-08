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

if (is_uploaded_file($_FILES['link-photo']['tmp_name'])) {
    echo "File ". $_FILES['link-photo']['name'] ." téléchargé avec succès.\n";
} else {
    echo "Attaque possible par téléchargement de fichier : ";
    echo "Nom du fichier : '". $_FILES['link-photo']['tmp_name'] . "'.";
}

// Passage des paramètres

$view->assign("photoLink",$photoLink);

// Charge la vue
$view->display("profil.view.php");
?>
