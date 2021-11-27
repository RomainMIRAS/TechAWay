 <?php
//

// Partie principale

// Inclusion du framework
include_once(__DIR__."/../framework/view.class.php");

// Inclusion du modèle
include_once(__DIR__."/../model/DAO.class.php");

$dao = new DAO();
// Déclaration
$email = (isset($_POST['email'])) ? $_POST['email']:"";
$password = (isset($_POST['password'])) ? $_POST['password']:"";
$checkpassword = (isset($_POST['checkpassword'])) ? $_POST['checkpassword']:"";
$confirmation = (isset($_POST['confirmation'])) ? $_POST['confirmation']:"non";
$erreur = "";

//Set le type d'action (SignUp ou Login). Par défaut login
$action = (isset($_POST['action'])) ? $_POST['action']:"login";

///////////////////////////////////////////////////////////////////////////////
// Partie Gestion des erreurs
///////////////////////////////////////////////////////////////////////////////

//Gestion sign up
if ($confirmation == "oui" && $action == "signup"){
  if (strlen($password) <= 8){ //Test Mdp > 8 caract
    $erreur = "Mot de passe doit avoir au minimum 8 caractères";
  } else if($password != $checkpassword){ // Mot de passe identique
    $erreur = "Les mots de passes doivent être identiques !";
  } else if (in_array($email,array_values($dao->getEmails()))){ // Si email déja enregistrée
    $erreur = "Email déjà enregistrée !";
  } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){ // Si email valide
    $erreur = "Email non valide !";
  } else if ($email == "" || $password == ""){ // Champ remplie
    $erreur = "Champ obligatoire manquant !";
  }
}

if ($confirmation == "oui" && $action == "login"){
  if ($email == "" || $password == ""){ // Champ remplie
    $erreur = "Champ obligatoire manquant !";
  } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){ // Mot de passe identique
    $erreur = "Email non valide !";
  } else if (false){  //Fonction si email pas dans asso au mdp

  }
}

///////////////////////////////////////////////////////////////////////////////
// Partie Modéle
///////////////////////////////////////////////////////////////////////////////

// Inscription
if ($erreur == "" && $confirmation == "oui"){
  if ($action == "signup") {

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
