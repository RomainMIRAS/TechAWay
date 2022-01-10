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
$candidat = $_SESSION['utilisateur'];
session_write_close();


$offres = $db->getOffres();
$nbOffres = $db->nombreOffres();


foreach($offres as $o):
    $compet = $o->getCompetenceRecherche();
    $rensei = $o->getDetailOffre();
    $compet->getNvEtude(); //==> attente liste déroulante pour chaque niveau étude
    echo "$compet";
    //$compet->getLangeParle(); ==> attente liste déroulante à choix multiple (https://support.gainsight.com/SFDC_Edition/Data_Management/Managing_Data_In_Gainsight/Dropdown_List_and_Multi_Select_Dropdown_List)
    //$compet->getLangageAcquis(); ==> attente liste déroulante avec principaux langages
    
endforeach;

///////////////////////////////////////////////////////////////////////////////
// Partie View
///////////////////////////////////////////////////////////////////////////////

$view = new View();

$view->assign('candidat',$candidat);
$view->display("RechercheEntreprise.view.php");


// Fin du code à ajouter ]]

?>

// mettre des commentaire + faire des scénario + faire une version papier du rapport
