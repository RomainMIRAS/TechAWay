<?php

include_once(__DIR__."/../framework/view.class.php");
include_once(__DIR__.'/../model/connectionMail.php');

///////////////////////////////////////////////////////////////////////////////
// Partie Récupération des Variables
///////////////////////////////////////////////////////////////////////////////

$nomCandidat = (isset($_POST['nomCandidat'])) ? $_POST['nomCandidat']:"";
$telCandidat = (isset($_POST['telCandidat'])) ? $_POST['telCandidat']:"";
$mailCandidat = (isset($_POST['mailCandidat'])) ? $_POST['mailCandidat']:"";



$nomParrain = (isset($_POST['nomParrain'])) ? $_POST['nomParrain']:"";
$telParrain = (isset($_POST['telParrain'])) ? $_POST['telParrain']:"";
$mailParrain = (isset($_POST['mailParrain'])) ? $_POST['mailParrain']:"";


$erreur = "";
$action = (isset($_POST['action'])) ? $_POST['action']: '';

///////////////////////////////////////////////////////////////////////////////
// Partie Gestion des erreurs
///////////////////////////////////////////////////////////////////////////////

if($action == "confirmation" )
{

  ////// POUR LE CANDIDAT //////
  // Si nom candidat pas remplie
  if($nomCandidat == "")
  {
    $erreur = "Le nom candidat doit etre rempli";
  }
  else if($mailCandidat == "" )
  {
    $erreur = "Le mail doit etre rempli";
  }
  else if (!filter_var($mailCandidat, FILTER_VALIDATE_EMAIL)){ // Si email valide
    $erreur = "Adresse mail non valide.";
  }
  // Si Tel candidat pas remplie
  else if($telCandidat == "" )
  {
    $erreur = "Le telephone candidat doit etre rempli";
  }
  else if(strlen($telCandidat) !== 10)
  {
    $erreur = "Le telephone candidat doit être au format indiqué (10 chiffres)";
  }
  else if(preg_match('/^[0-9]+$/i', $telCandidat) == false)
  {
    $erreur = "Le telephone candidat doit etre composé de chiffre";
  }

  ////// POUR LE PARRAIN //////
  // Si nom candidat pas remplie
  if($nomParrain == "")
  {
    $erreur = "Le nom parrain doit etre rempli";
  }
  else if($mailParrain == "" )
  {
    $erreur = "Le mail doit etre rempli";
  }
  else if (!filter_var($mailParrain, FILTER_VALIDATE_EMAIL)){ // Si email valide
    $erreur = "Adresse mail non valide.";
  }
  // Si Tel candidat pas remplie
  else if($telParrain == "" )
  {
    $erreur = "Le telephone parrain doit etre rempli";
  }
  else if(strlen($telParrain) !== 10)
  {
    $erreur = "Le telephone parrain doit être au format indiqué (10 chiffres)";
  }
  else if(preg_match('/^[0-9]+$/i', $telParrain) == false)
  {
    $erreur = "Le telephone parrain doit etre composé de chiffre";
  }

}

///////////////////////////////////////////////////////////////////////////////
// Envoie du Mail
///////////////////////////////////////////////////////////////////////////////

if ($erreur == "" && $action == "confirmation"){

  $body =
  "Vous avez reçu une demande de parrainage de $nomParrain !\r\n
  \r\n----------------------
  ------ Parrain ------
  Prénom/Nom : $nomParrain \r\n
  Mail : $mailParrain \r\n
  telephone : $telParrain
  ---------------------

  ------ Vous ------
  Prénom/Nom : $nomCandidat \r\n
  Mail : $mailCandidat \r\n
  telephone : $telCandidat
  ---------------------

  Aller nous voir sur
  techaway.tk/

  ----------------------
  ";

//Send mail using gmail
$result = smtpmailer($mailCandidat, $mailParrain, $nomCandidat,"TechAWay - Demande de Parrainage - $nomParrain",$body);

if (true != $result){
	// erreur -- traiter l'erreur
  $erreur = "Le mail n'a pas pu être envoyé - $error";
} else {
  $erreur = "Le mail se partenariat a été envoyé !";
}


}

///////////////////////////////////////////////////////////////////////////////
// Partie View
///////////////////////////////////////////////////////////////////////////////
$view = new View();
$view->assign('erreur',$erreur);
$view->display("parrainer.view.php");

?>
