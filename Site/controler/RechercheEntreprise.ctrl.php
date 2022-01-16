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
$candidat = $db->getCandidat($_SESSION['utilisateur']->getMail()); //On récupère le candidat connecter
session_write_close();

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
if ($candidat->getEtape() != 1) header('Location: recrutement-candidat.ctrl.php');

session_write_close();


///////////////////////////////////////////////////////////////////////////////
// Déclaration de variable
///////////////////////////////////////////////////////////////////////////////



$offres = $db->getOffres(); //On récupère les offres


$scoresMatch = array(); //Le tableau du score de match de chaque offre



foreach($offres as $o){ //On calcule le score de match pour chaque offre

    $scoreMatch = 0; // 0 par défaut pour le score

    //On récupère les compétence et renseignement 
    $competOffre = $o->getCompetenceRecherche();
    $renseiOffre = $o->getDetailOffre();
    $competCandid = $candidat->getCompetenceAcquis();
    $renseiCandid = $candidat->getRenseignement();



//On vas ajouter ou enlever des points au score de match pour chaque attributs

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
    $niveauEtude = array(1 => "bac",2 => "bac+1",3 => "bac+2",4 => "bac+3",5 => "bac+4",6 => "bac+5",7 => "bac+6",8 => "bac+7",9 => "bac+8");
    foreach (array_keys($niveauEtude) as $key) {
        if ($niveauEtude[$key] == $competCandid->getNvEtude()) {
            $nivCandid = $key;
        }
        if ($niveauEtude[$key] == $competOffre->getNvEtude()) {
            $nivOffre = $key;
        }
    }

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




    //Pays / travail étranger
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


    //Type d'entreprise
    $typeOffre = 0;
    $typeCandid = 0;
    $typeEntreprise = array(1 => "Microentreprise",2 => "Petite entreprise",3 => "Moyenne entreprise",4 => "Grande entreprise");
    foreach (array_keys($typeEntreprise) as $key) {

        if ($typeEntreprise[$key] == $renseiOffre->getTypeEntreprise()) {
            $typeOffre = $key;
        }
        if ($typeEntreprise[$key] == $renseiCandid->getTypeEntreprise()) {
            $typeCandid = $key;
        }
    }
    
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


//On associe chaque offre à son score de match avec le candidat
$it = 0;
$offresMatch = array();
foreach ($offres as $lo) {
$offresMatch += [$scoresMatch[$it] => $lo];
$it++;
}

//Quand on essaie de choissir une offre
$offreAAjouter = $_POST['offreAAdd'] ?? '';
$action = $_POST['action'] ?? '';
$message = '';

if ($action=='ajouteY') { //Si il choissi d'ajouter l'offre
    $nomOffre = $db->getOffre($offreAAjouter)->getNomOffre();
    if ($candidat->getLienLM() == '') { //Si il n'a encore aucune offre
        $candidat->setLienLM($offreAAjouter);
        $candidat->setEtape($candidat->getEtape() + 1);
        $db->updateCandidat($candidat); //On ajoute l'offre et on actualise son profile
        header("Location: recrutement-candidat.ctrl.php");
    } else { //Si il annule le choix
        $message = "Impossible d'ajouter l'offre $nomOffre car vous en avez déjà une.";
    }
}

// Charge la vue

$view->assign('message',$message);
$view->assign('listeOffreMatch',$offresMatch);
$view->display("RechercheEntreprise.view.php");



?>
