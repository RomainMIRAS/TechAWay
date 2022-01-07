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

foreach($emails as $e) {
    array_push($candidats,$db->getCandidat($e));
    
}

var_dump($candidats);

$view->assign("candidats",$candidats);

// Charge la vue
$view->display("tableau.view.php");
?>
