<?php

include_once(__DIR__."/../framework/view.class.php");


//-------------------Affectation des variables


$nom = '';
if (isset($_GET['nom'])) {
  $nom = $_GET['nom'];
}

$pays = array('Allemagne','Autriche','Andorre','Belgique','Boznie_Herzegovine','Bulgarie','Chypre',
'Croatie',
'Danemark',
'Espagne',
'Estonie',
'Finlande',
'France',
'Gibraltar',
'Grece',
'Hongrie',
'Irlande',
'Islande',
'italie',
'Lettonie',
'Liechtenstein',
'Lituanie',
'Luxembourg',
'Malte',
'Monaco',
'Norvege',
'Pays Bas',
'Pays de Galle',
'Pologne',
'Portugal',
'Republique_Tcheque',
'Roumanie',
'Royaume_Uni',
'Russie',
'Slovaquie',
'Slovenie',
'Suede',
'Suisse',
'Ukraine',
'Vatican'
);
$action = (isset($_GET['action'])) ? $_GET['action']: 'formulaire';
$etape = (isset($_GET['etape'])) ? $_GET['etape']: 'base';


///////////////////////////////////////////////////////////////////////////////
// Partie Gestion des erreurs
///////////////////////////////////////////////////////////////////////////////


///////////////////////////////////////////////////////////////////////////////
// Partie Modéle
///////////////////////////////////////////////////////////////////////////////



///////////////////////////////////////////////////////////////////////////////
// Partie View
///////////////////////////////////////////////////////////////////////////////


$view = new View();
$view->assign('erreur','');
$view->assign('pays',$pays);
$view->assign('action',$action);
$view->assign('etape',$etape);
$view->display("formulaire.view.php");



?>
