<?php

// Inclusion du framework
include_once(__DIR__."/../framework/view.class.php");

// Inclusion du modèle
include_once(__DIR__."/../model/DAO.class.php");
include_once(__DIR__."/../model/Utilisateur.class.php");
include_once(__DIR__."/../model/Candidat.class.php");
include_once(__DIR__."/../model/Coach.class.php");


////////////////////////////////////////////////////////////////////////////
// Gestion de la session utilisateur
////////////////////////////////////////////////////////////////////////////
if (isset($_SESSION['utilisateur'])) {
    $utilisateur = $_SESSION["utilisateur"];
}


// Destruction de Session


////////////////////////////////////////////////////////////////////////////
// Construction de la vue
////////////////////////////////////////////////////////////////////////////
$view = new View();

// Passe les paramètres à la vue
$view->assign("utilisateur",$utilisateur);

// Charge la vue
$view->display("profil.view.php");
?>
