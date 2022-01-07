<?php

// Inclusion du framework
include_once(__DIR__."/../framework/view.class.php");

// Inclusion du modèle
include_once(__DIR__."/../model/DAO.class.php");
include_once(__DIR__."/../model/Utilisateur.class.php");
include_once(__DIR__."/../model/Candidat.class.php");
include_once(__DIR__."/../model/Coach.class.php");

$view = new View();

$db = DAO::get();

$emails = $db->getEmails();

$candidats = array();
$nbCandidats = 0;

foreach($emails as $e) {
    array_push($candidats,$db->getCandidat($e)); 
    if (db->getCandidat($e)) {
        $nbCandidats++;
    }
}

$view->assign("candidats",$candidats);
$view->assign("nbCandidats",$nbCandidats);

// Charge la vue
$view->display("tableau.view.php");
?>
