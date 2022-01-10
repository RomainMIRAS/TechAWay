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

$scoresMatch = array();


foreach($offres as $o):
    $scoreMatch = 0;
    $competOffre = $o->getCompetenceRecherche();
    $renseiOffre = $o->getDetailOffre();
    $competCandid = $candidat->getCompetenceAcquis;
    $renseiCandid = $candidat->getRenseignement;

    if ($competCandid->getNvEtude() == $competOffre->getNvEtude()) {
        $scoreMatch = $scoreMatch + 6;
    } else {
        $scoreMatch = $scoreMatch - 6;
    }

    echo "$competCandid->getLangeParle()"

    array_push($scoreMatch,$scoreMatch);
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
