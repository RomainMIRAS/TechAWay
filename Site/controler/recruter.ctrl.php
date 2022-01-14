<?php
include_once(__DIR__."/connectionMail.php");
include_once(__DIR__."/../framework/view.class.php");



///////////////////////////////////////////////////////////////////////////////
// Partie Récupération des Variables
///////////////////////////////////////////////////////////////////////////////


$nom = (isset($_POST['nom'])) ? $_POST['nom']:"";
$prenom = (isset($_POST['prenom'])) ? $_POST['prenom']:"";
$mail = (isset($_POST['email'])) ? $_POST['email']:"";
$nomEntreprise = (isset($_POST['nomEntreprise'])) ? $_POST['nomEntreprise']:"";
$message = (isset($_POST['message'])) ? $_POST['message']:"";



$erreur = "";
$action = (isset($_POST['action'])) ? $_POST['action']: '';


///////////////////////////////////////////////////////////////////////////////
// Partie Gestion des erreurs
///////////////////////////////////////////////////////////////////////////////


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

else if($message == "" )
    {
      $erreur = "Le message ne doit pas être vide";
    }

}


///////////////////////////////////////////////////////////////////////////////
// Envoie du Mail
///////////////////////////////////////////////////////////////////////////////

if ($erreur == "" && $action == "confirmation"){

  $body =
  "Vous avez reçu une demande de partenariat !\r\n
  \r\n----------------------
  Prénom : $prenom \r\n
  Nom : $nom \r\n
  Mail : $mail \r\n
  Nom de l'entreprise : $nomEntreprise \r\n
  Message : $message
  ----------------------
  ";

//Send mail using gmail
$result = smtpmailer('techawayteam13@gmail.com', $mail, $nom,"Demande de Partenariat - $nomEntreprise",$body);


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
$view->assign('action',$action);
$view->display("recruter.view.php");

?>
