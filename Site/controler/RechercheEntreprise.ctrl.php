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








/*////////////////////////////////////////////////////////////////////////////

Mieu gerer niveau étude => si == +6 si inf -6 sinon +9

Mieu gerer type entreprise => si == +6 si inf -6 sinon +9

Poste pas gerer


////////////////////////////////////////////////////////////////////////////*/





session_start();
$candidat = $_SESSION['utilisateur'];
session_write_close();

$offres = $db->getOffres();
$nbOffres = $db->nombreOffres();

$scoresMatch = array();
$typeEntreprise = array(1 => "Microentreprise",2 => "Petite entreprise",3 => "Moyenne entreprise",4 => "Grande entreprise");


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



    //Etranger
    $paysOffre = $o->getEntreprise()->getPays();
    $paysCandid = $candidat->getPays();

    if ($renseiOffre->getTravEtranger()) {
        if ($paysOffre == $paysCandid) {
            if ($renseiCandid->getTravEtranger()) {
                $scoreMatch = $scoreMatch; 
            } else {
                $scoreMatch = $scoreMatch;
            }
        } else {
            if ($renseiCandid->getTravEtranger()) {
                $scoreMatch = $scoreMatch + 10;
            } else {
                $scoreMatch = $scoreMatch - 200;
            }
        }
    } else {
        if ($paysOffre == $paysCandid) {
            if ($renseiCandid->getTravEtranger()) {
                $scoreMatch = $scoreMatch + 5;
            } else {
                $scoreMatch = $scoreMatch + 15;
            }
        } else {
            if ($renseiCandid->getTravEtranger()) {
                $scoreMatch = $scoreMatch - 50;
            } else {
                $scoreMatch = $scoreMatch - 200;
            }
        }
    }

    //Type de contrat
    if ($renseiOffre->getTypeContrat() == $renseiCandid->getTypeContrat()) {
        $scoreMatch = $scoreMatch + 6;
    } else {
        $scoreMatch = $scoreMatch - 30;
    }

    
    //Secteur
    if ($renseiOffre->getSecteur() == $renseiCandid->getSecteur()) {
        $scoreMatch = $scoreMatch + 6;
    } else {
        $scoreMatch = $scoreMatch - 100;
    }

foreach ($typeEntreprise as $aa) {
    if ($aa == $renseiOffre->getTypeEntreprise()) {
        $typeOffre = $aa;
    }
    if ($aa == $renseiCandid->getTypeEntreprise()) {

    }
    $testtt = array_keys($typeEntreprise, $aa);
    echo "$testtt";
}
    //type entreprise
    if ($renseiOffre->getTypeEntreprise() == $renseiCandid->getTypeEntreprise()) {
        $scoreMatch = $scoreMatch + 6;
    } else {
        $scoreMatch = $scoreMatch - 5;
    }


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
