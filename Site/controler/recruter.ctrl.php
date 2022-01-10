<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '/var/www/html/PHPMailer/src/Exception.php';
require '/var/www/html/PHPMailer/src/PHPMailer.php';
require '/var/www/html/PHPMailer/src/SMTP.php';

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

if ($erreur == "" && $action == "confirmation"){

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
  // $message = wordwrap($message, 70, "\r\n");

  // $mail = new PHPMailer(true);

//Send mail using gmail
// $mail = new PHPMailer();
//
//
//     $mail->IsSMTP(); // telling the class to use SMTP
//     $mail->SMTPAuth = true; // enable SMTP authentication
//     $mail->SMTPSecure = "ssl"; // sets the prefix to the servier
//     $mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
//     $mail->Port = 465; // set the SMTP port for the GMAIL server
//     $mail->Username = "techawayteam13@gmail.com"; // GMAIL username
//     $mail->Password = "projetteam13"; // GMAIL password
//
// $mail->From      = "test@gmail.com";
// $mail->FromName  = $nom.$prenom;
// $mail->Subject   = "Demande de Partenariat -".$nomEntreprise;
// $mail->Body      = $message;
// $mail->AddAddress( 'techawayteam13@gmail.com' );




// $mail->From = 'techawayteam13@gmail.com';
// $mail->FromName = 'Mailer';
// $mail->addAddress('techawayteam13@gmail.com');     // Add a recipient
// $mail->Subject = 'Here is the subject';
// $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
// $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
// $mail->send();


$mail = new PHPMailer;
$mail-> IsSMTP(); // Telling the class to use SMTP

$mail - > SMTPAuth = true;
$mail - > SMTPSecure = "ssl";
$mail - > Host = "smtp.gmail.com"; // SMTP server
$mail - > Username = "techawayteam13@gmail.com"; // "The account"
$mail - > Password = "projetteam13"; // "The password"
$mail - > Port = 465; // "The port"
$mail - > Subject = "My first email "; // "The subject"
$mail - > Body = "This is a test"; // "The message."
$mail - > WordWrap = 100; // "The lenght of the text."


if(!$mail->send()) {
  $erreur = "Le mail se partenariat a été envoyé !";
} else {
  $erreur = "Le mail n'a pas pu être envoyé - Erreur SMTP!";
}


}

$view = new View();

$view->assign('erreur',$erreur);
$view->assign('action',$action);
$view->display("recruter.view.php");

?>
