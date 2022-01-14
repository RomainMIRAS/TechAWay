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

///////////////////////////////////////////////////////////////////////////////
// Protection Contre Erreurs
///////////////////////////////////////////////////////////////////////////////

// Si l'étape et déjà passer ou qu'il est un coach!
session_start();

// Si pas connecter
if (!isset($_SESSION['utilisateur'])) header('Location: authentification.ctrl.php');

// Si utilisateur est un coach
if (!is_a($_SESSION['utilisateur'],"Candidat")) header('Location: main.ctrl.php');

// Si il a déjà rempli le formulaire
if ($_SESSION['utilisateur']->getEtape() != 1) header('Location: recrutement-candidat.ctrl.php');

session_write_close();


///////////////////////////////////////////////////////////////////////////////
// Déclaration de variable
///////////////////////////////////////////////////////////////////////////////

session_start();
$candidat = $_SESSION['utilisateur'];
session_write_close();

$offres = $db->getOffres();
$nbOffres = $db->nombreOffres();
$typeOffre = 0;
$typeCandid = 0;

$scoresMatch = array();
$typeEntreprise = array(1 => "Microentreprise",2 => "Petite entreprise",3 => "Moyenne entreprise",4 => "Grande entreprise");
$niveauEtude = array(1 => "bac",2 => "bac+1",3 => "bac+2",4 => "bac+3",5 => "bac+4",6 => "bac+5",7 => "bac+6",8 => "bac+7",9 => "bac+8");

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

foreach (array_keys($niveauEtude) as $key) {

    if ($niveauEtude[$key] == $competCandid->getNvEtude()) {
        $nivCandid = $key;
    }
    if ($niveauEtude[$key] == $competOffre->getNvEtude()) {
        $nivOffre = $key;
    }
}


    //Niveau d'étude
    if ($nivCandid == $nivOffre) {
        $scoreMatch = $scoreMatch + 6;
    } else if ($nivOffre < $nivCandid) {
        $scoreMatch = $scoreMatch + 10;
    } else {
        $scoreMatch = $scoreMatch - 6;
    }



//Poste
    if ($renseiOffre->getPoste() == $renseiCandid->getPoste()) {
        $scoreMatch = $scoreMatch + 6;
    } else {
        $scoreMatch = $scoreMatch - 50;
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

foreach (array_keys($typeEntreprise) as $key) {

    if ($typeEntreprise[$key] == $renseiOffre->getTypeEntreprise()) {
        $typeOffre = $key;
    }
    if ($typeEntreprise[$key] == $renseiCandid->getTypeEntreprise()) {
        $typeCandid = $key;
    }
}

    //type entreprise
    if ($typeOffre == $typeCandid) {
        $scoreMatch = $scoreMatch + 6;
    } else if ($typeOffre < $typeCandid) {
        $scoreMatch = $scoreMatch + 10;
    } else {
        $scoreMatch = $scoreMatch - 5;
    }


    array_push($scoresMatch,$scoreMatch);
}

///////////////////////////////////////////////////////////////////////////////
// Partie View
///////////////////////////////////////////////////////////////////////////////

$view = new View();

$it = 0;
$offresMatch = array();
foreach ($offres as $lo) {
$offresMatch += [$scoresMatch[$it] => $lo];
$it++;
}


$offreAAjouter = $_POST['offreAAdd'] ?? '';
$candidatAction = $_POST['candidatAction'] ?? '';
$message = '';

echo "$candidatAction";
if ($candidatAction=='ajouteY') {
    $message = "L'offre $offreAAjouter a bien été ajouté.";
    header("Location: RechercheEntreprise.ctrl.php");
}

$view->assign('message',$message);
$view->assign('listeOffreMatch',$offresMatch);
$view->display("RechercheEntreprise.view.php");


// Fin du code à ajouter ]]

?>
