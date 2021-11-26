<?php

include_once(__DIR__."/../framework/view.class.php");


//-------------------Affectation des variables

$action ;
$nom = '';
if (isset($_GET['nom'])) {
  $nom = $_GET['nom'];
}

$action = (isset($_GET['action'])) ? $_GET['action']: 'erreur';


$view = new View();
$view->assign('erreur','');
$view->assign('action',$action);
$view->display("formulaire.view.php");



?>

