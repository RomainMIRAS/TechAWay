<?php
///////////////////////////////////////////////////////////////////////////////
// Declaration
///////////////////////////////////////////////////////////////////////////////

// Inclusion du framework
include_once(__DIR__."/../framework/view.class.php");

// Inclusion du modèle
include_once(__DIR__."/../model/DAO.class.php"); // Singleton
include_once(__DIR__."/../model/Competece.class.php");
include_once(__DIR__."/../model/Renseignement.class.php");
include_once(__DIR__."/../model/Offre.class.php");
include_once(__DIR__."/../model/Candidat.class.php");

// Déclaration
$email = (isset($_POST['email'])) ? $_POST['email']:"";
$password = (isset($_POST['password'])) ? $_POST['password']:"";
$checkpassword = (isset($_POST['checkpassword'])) ? $_POST['checkpassword']:"";
$confirmation = (isset($_POST['confirmation'])) ? $_POST['confirmation']:"non";
$erreur = "";

//Permet d'executer toute les actions de connection
function seConnecter($email,$password){
  session_start();
  // A testé si Candidat ou Coach ( Pour l'instant toujours Candidat)
  $_SESSION['utilisateur'] = DAO::get()->getCoachOuCandidat($email,$password);
  // Ferme la session
  session_write_close();
  header('Location: main.ctrl.php');
}


///////////////////////////////////////////////////////////////////////////////
// Partie Gestion des erreurs
///////////////////////////////////////////////////////////////////////////////

//Gestion sign up

if ($confirmation == "oui" && $action == "signup"){
  if (strlen($password) < 8){ //Test Mdp >= 8 caract
    $erreur = "Un mot de passe doit contenir au minimum 8 caractères.";
  } else if($password != $checkpassword){ // Mot de passe identique
    $erreur = "Les mots de passes entrés doivent être identiques.";
  } else if (in_array($email,DAO::get()->getEmails())){ // Si email déja enregistrée
    $erreur = "Cette adresse mail est déjà utilisé.";
  } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){ // Si email valide
    $erreur = "Adresse mail non valide.";
  } else if ($email == "" || $password == ""){ // Champ remplie
    $erreur = "Champ obligatoire manquant.";
  }
}

if ($confirmation == "oui" && $action == "login"){
  if ($email == "" || $password == ""){ // Champ remplie
    $erreur = "Champ(s) obligatoire(s) manquant(s).";
  } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){ // Mot de passe identique
    $erreur = "Adresse mail non valide.";
  }   else if (!DAO::get()->verifierLogin($email,$password)){  //Fonction si email pas dans asso au mdp
    $erreur = "Aucune adresse mail n'est associée à ce mot de passe.";
  }
}

///////////////////////////////////////////////////////////////////////////////
// Partie Modéle
///////////////////////////////////////////////////////////////////////////////


if ($erreur == "" && $confirmation == "oui"){
  if ($action == "signup") {// Inscription Possible de Candidat
    for($i=1;$i<15;$i++) {
      $key .= mt_rand(0,9);
    }
    $header="MIME-Version: 1.0\r\n";
	                     $header.='From:"[VOUS]"<support-techaway@gmail.com>'."\n";
	                     $header.='Content-Type:text/html; charset="uft-8"'."\n";
	                     $header.='Content-Transfer-Encoding: 8bit';
	                     $message='
	                     <html>
	                        <body>
	                           <div align="center">
	                              <a href="=138.68.96.182/Site/controler/confirmation.php?email='.urlencode($email).'&key='.$key.'">Confirmez votre compte !</a>
	                           </div>
	                        </body>
	                     </html>
	                     ';

                       mail($email, "Confirmation de compte", $message, $header);
                       session_start();
                       // A testé si Candidat ou Coach ( Pour l'instant toujours Candidat)
                       $_SESSION['key'] = $key;
                       $_SESSION['email'] = $email;
                       // Ferme la session
                       session_write_close();
                       $erreur = "Veuillez confirmez votre adresse email";
    DAO::get()->createUtilisateur($email, $password);
    //seConnecter($email,$password);
  } else if ($action == "login"){ // Connexion réussi
    //$erreur = "Vous êtes connecté avec email $email et mdp $password";
    seConnecter($email,$password);
  }
}

///////////////////////////////////////////////////////////////////////////////
// Partie View
///////////////////////////////////////////////////////////////////////////////

$view = new View();

$view->assign('erreur',$erreur);
$view->assign('action',$action);
$view->display("authentification.view.php");


// Fin du code à ajouter ]]

?>

