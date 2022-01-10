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


foreach($offres as $o){
    $scoreMatch = 0;
    $competOffre = $o->getCompetenceRecherche();
    $renseiOffre = $o->getDetailOffre();
    $competCandid = $candidat->getCompetenceAcquis();
    $renseiCandid = $candidat->getRenseignement();


    //Langue parlé
    foreach ($competOffre->getLangeParle() as $lo) {
        $langeEstParler = false;
        foreach ($competCandid->getLangeParle() as $lc){
            if ($lo == $lc) {
                $scoreMatch = $scoreMatch + 10; // On ajoute 10 au score si la langue est parler
                $langeEstParler = true;
            }
        }
        if (!$langeEstParler) {
            $scoreMatch = $scoreMatch - 8; // On enlève 8 au score si la langue n'est pas parler
        }
        $langeEstParler = false;
    }


//Langage connue
    foreach ($competOffre->getLangageAcquis() as $lo) {
        $langeEstParler = false;
        foreach ($competCandid->getLangageAcquis() as $lc){
            if ($lo == $lc) {
                $scoreMatch = $scoreMatch + 8; // On ajoute 8 au score si le langage est connue
                $langeEstParler = true;
            }
        }
        if (!$langeEstParler) {
            $scoreMatch = $scoreMatch - 10; // On enlève 10 au score si le candidat ne connait pas le langage
        }
        $langeEstParler = false;
    }


    //Niveau d'étude
    if ($competCandid->getNvEtude() == $competOffre->getNvEtude()) {
        $scoreMatch = $scoreMatch + 6; // On ajoute 6 au score si le niveau d'étude est identique entre l'offre et le candidat
    } else {
        $scoreMatch = $scoreMatch - 6; // On enleve 8 au score si le niveau d'étude du candidat est inférieur à celui de l'offre
    }
    echo "$scoreMatch";
    array_push($scoresMatch,$scoreMatch);
}

///////////////////////////////////////////////////////////////////////////////
// Partie View
///////////////////////////////////////////////////////////////////////////////

$view = new View();

$view->assign('candidat',$candidat);
$view->display("RechercheEntreprise.view.php");


// Fin du code à ajouter ]]

?>

// mettre des commentaire + faire des scénario + faire une version papier du rapport
