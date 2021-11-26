 <?php
//

// Partie principale

// Inclusion du framework
include_once(__DIR__."/../framework/view.class.php");

// Inclusion du modèle
//include_once(__DIR__."/../model/DAO.class.php");


$nom = '';
if (isset($_GET['nom'])) {
  $nom = $_GET['nom'];
}

$username = (isset($_POST['username'])) ? $_POST['username']:"";
$password = (isset($_POST['password'])) ? $_POST['password']:"";
$checkpassword = (isset($_POST['checkpassword'])) ? $_POST['checkpassword']:"";


//Set le type d'action (SignUp ou Login). Par défaut login
$action = (isset($_POST['action'])) ? $_POST['action']:"login";

$pass = '';
if (isset($_GET['pass'])) {
  $pass = $_GET['pass'];
}


///////////////////////////////////////////////////////////////////////////////
// Partie calculs avec le modèle et choix de la vue
///////////////////////////////////////////////////////////////////////////////

$view = new View();
/*
if ($username != '' && $password != '') {
  // Verifie le mot de passe
  $titulaire = Titulaire::getFromNom($nom);
  // Si le nom n'est pas trouvé
  if ($titulaire == NULL) {
    $view->assign('erreur','Erreur : nom de login inconnu');
    $view->display("login.view.php");
  } elseif ($titulaire->getPass() != $pass) {
    $view->assign('erreur','Erreur : mot de passe incorrect');
    $view->display("login.view.php");
  } else {
    // Tout est OK on démmare la session
    session_start();
    // S'il y avait déjà une autre session c'est pas grave on change d'utilisateur
    $_SESSION["titulaire"] = $titulaire;
    // on affiche les comptes de la personne
    $view->assign('user',$titulaire->getNom());
    $view->assign('comptes',Compte::getFromTitulaire($titulaire));
    $view->display("compte.view.php");
  }
}*/// else {
  $view->assign('erreur','');
//}
$view->assign('action',$action);
$view->display("authentification.view.php");


// Fin du code à ajouter ]]

?>
