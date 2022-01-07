<?php

include_once(__DIR__."/../framework/view.class.php");

$nom = (isset($_POST['nom'])) ? $_POST['nom']:"";
$prenom = (isset($_POST['prenom'])) ? $_POST['prenom']:"";
$email = (isset($_POST['email'])) ? $_POST['email']:"";
//$confirmation = (isset($_POST['confirmation'])) ? $_POST['confirmation']:"non";
$erreur = "";

//Set le type d'action (SignUp ou Login). Par défaut login
$action = (isset($_POST['action'])) ? $_POST['action']: '';

if ($action == "confirmation"){
    
    if($nom == "")
        {
            $erreur = "Le nom doit etre rempli";  // Si nom est vide --> erreur
        }
    else if(preg_match('/^[a-z]+$/i', $nom) == false)
        {
            $erreur = "Le nom doit etre composé de lettres seulement"; // Si nom n'est pas en lettre --> erreur
        }
    if($prenom == "")
        {
            $erreur = "Le prenom doit etre rempli";  // Si nom est vide --> erreur
        }
    else if(preg_match('/^[a-z]+$/i', $prenom) == false)
        {
            $erreur = "Le prenom doit etre composé de lettres seulement"; // Si nom n'est pas en lettre --> erreur
        }
    else if (in_array($email,DAO::get()->getEmails())){ // Si email déja enregistrée
      $erreur = "Cette adresse mail est déjà utilisé.";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){ // Si email invalide
      $erreur = "Adresse mail non valide.";
    } else if ($email == "" || $password == ""){ // Champ remplie
      $erreur = "Champ obligatoire manquant.";
    }

}
  


$view = new View();

$view->assign('erreur',$erreur);
$view->assign('action',$action);
$view->display("nousrejoindre.view.php");

?>
