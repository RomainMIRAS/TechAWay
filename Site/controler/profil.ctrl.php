<?php

// Inclusion du framework
include_once(__DIR__."/../framework/view.class.php");

// Inclusion du modèle
include_once(__DIR__."/../model/DAO.class.php");
include_once(__DIR__."/../model/Utilisateur.class.php");
include_once(__DIR__."/../model/Candidat.class.php");
include_once(__DIR__."/../model/Coach.class.php");

$view = new View();

if (isset($_SESSION['utilisateur'])) { /* Si la variable session 'utilisateur' existe */
    
    /* En fonction de l'étape */
    switch ($_SESSION['utilisateur']->getEtape()) {
        case 1:
            $etapeDetail = "Vous venez de definir votre profil, dès lors vous pouvez consulter les offres qui peuvent potentiellement vous intéresser.";
            break;
        
        case 2:
            $etapeDetail = "";
            break;
    }
    $view->assign("etapeDetail",$etapeDetail);

}


// Charge la vue
$view->display("profil.view.php");
?>
