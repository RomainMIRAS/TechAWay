git <?php
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
    $mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
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
    if(!$mail->send()) {
        $error = 'Mail error: '.$mail->ErrorInfo;
        return false;
    } else {
        return true;
    }
}


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
      $erreur = "Le nom de l'entreprise doit etre rempli";
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
