<?php

include_once(__DIR__."/../framework/view.class.php");


$nom = (isset($_POST['nom'])) ? $_POST['nom']:"";
$prenom = (isset($_POST['prenom'])) ? $_POST['prenom']:"";
$mail = (isset($_POST['email'])) ? $_POST['email']:"";
$nomEntreprise = (isset($_POST['nomEntreprise'])) ? $_POST['nomEntreprise']:"";


$erreur = "";
$action = (isset($_POST['action'])) ? $_POST['action']: '';

if($action == "confirmation" )
{
  // Si niveau d'etude vide alors --> erreur
  if($nom == "")
  {
    $erreur = "Le nom doit etre rempli";
  }
  // Si aucune langue selectionné
  else if($prenom == "" )
  {
    $erreur = "Le prenom doit etre rempli";
  }
  // Si mail incorrect
  else if($mail == "" )
  {
    $erreur = "Le mail doit etre rempli";
  }
  else if (!filter_var($mail, FILTER_VALIDATE_EMAIL)){ // Si email valide
    $erreur = "Adresse mail non valide.";
  }
// Si nomEtreprise incorrect
else if($nomEntreprise == "" )
    {
      $erreur = "Le nom de l'entreprise doit etre rempli";
    }
}

if ($erreur == ""){
  $erreur = "Le mail se partenariat a été envoyé !";
  $message =
  "Vous avez reçu une demande de partenariat !\r\n
  \r\n----------------------
  Prénom : $prenom \r\n
  Nom : $nom \r\n
  Mail : $mail \r\n
  Nom de l'entreprise : $nomEntreprise \r\n
  ----------------------
  ";

  // Dans le cas où nos lignes comportent plus de 70 caractères, nous les coupons en utilisant wordwrap()
  $message = wordwrap($message, 70, "\r\n");
  $headers = "From: $mail" . "\r\n" .
       'X-Mailer: PHP/' . phpversion();
  // Envoi du mail
  mail('techawayteam13@gmail.com', "Demande de Partenariat - $nomEntreprise", $message,$headers);
}


$view = new View();

$view->assign('erreur',$erreur);
$view->assign('action',$action);
$view->display("recruter.view.php");

?>
