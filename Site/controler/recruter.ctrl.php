<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '/var/www/html/PHPMailer/src/Exception.php';
require '/var/www/html/PHPMailer/src/PHPMailer.php';
require '/var/www/html/PHPMailer/src/SMTP.php';

define('GMailUSER', 'techawayteam13@gmail.com'); // utilisateur Gmail
define('GMailPWD', 'projetteam13'); // Mot de passe Gmail


function smtpmailer($to, $from, $from_name, $subject, $body) {
    global $error;
    $mail = new PHPMailer();  // create a new object
    $mail->IsSMTP(); // enable SMTP
    $mail->SMTPDebug = 2;  // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth = true;  // authentication enabled
    $mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for GMail
    $mail->SMTPAutoTLS = false;
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;

    $mail->Username = GMailUSER;
    $mail->Password = GMailPWD;
    $mail->SetFrom($from, $from_name);
    $mail->Subject = $subject;
    $mail->Body = $body;
    $mail->AddAddress($to);
    if(!$mail->Send()) {
        $error = 'Mail error: '.$mail->ErrorInfo;
        return false;
    } else {
        $error = 'Message sent!';
        return true;
    }
}


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

//Send mail using gmail

$result = smtpmailer('techawayteam13@mail.com', $mail, $nom, $message, "Demande de Partenariat - $nomEntreprise");


if (true !== $result){
	// erreur -- traiter l'erreur
  $erreur = "Le mail n'a pas pu être envoyé - $result";
} else {
  $erreur = "Le mail se partenariat a été envoyé !";
}


}

$view = new View();

$view->assign('erreur',$erreur);
$view->assign('action',$action);
$view->display("recruter.view.php");

?>
