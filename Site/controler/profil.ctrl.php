<?php

// Inclusion du framework
include_once(__DIR__."/../framework/view.class.php");

// Inclusion du modèle
include_once(__DIR__."/../model/DAO.class.php");
include_once(__DIR__."/../model/Utilisateur.class.php");
include_once(__DIR__."/../model/Candidat.class.php");
include_once(__DIR__."/../model/Coach.class.php");


///////////////////////////////////////////////////////////////////////////////
// Protection Contre Erreurs
///////////////////////////////////////////////////////////////////////////////

// Si l'étape et déjà passer ou qu'il est un coach!
session_start();

// Si pas connecter
if (!isset($_SESSION['utilisateur'])) header('Location: authentification.ctrl.php');

// Si utilisateur est un cancdidat
if (is_a($_SESSION['utilisateur'],"Candidat")){
  // Si il a pas déjà rempli le formulaire
  if ($_SESSION['utilisateur']->getEtape() == 0) header('Location: main.ctrl.php');
}

session_write_close();

$view = new View();

$db = DAO::get();

/* On récupère le lien cv */
/*
$filename = $_FILES["fileToUpload"]["name"];
echo $filename."\n";
$tempname = $_FILES["fileToUpload"]["tmp_name"];
echo $tempname;
$folder = "/home/alexandre/Bureau/Informatique/Web/img/".$filename;

if (move_uploaded_file($tempname, $folder))  {
    $msg = "Image uploaded successfully";
}else{
    $msg = "Failed to upload image";
}
echo $msg;

HTML

<form action="upload.php" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>

*/

/* Changer mes compétences */

$languesParle = $_POST['langueParle[]'] ?? '';
$langagesAcquis = $_POST['languageAquis[]'] ?? '';


$btnComp = $_POST['btnComp'] ?? '';

if ($btnComp=='saveComp') { /* Ne fonctionne pas */
  echo "ok";
  $competence = $_SESSION["utilisateur"]->getCompetenceAcquis();
  $competence->setLangeParle($languesParle);
  $competence->setLangageAcquis($langagesAcquis);
  $_SESSION["utilisateur"]->setCompetenceAcquis($competence);
  $db->updateCandidat($_SESSION['utilisateur']);
  header("Location: profil.ctrl.php");
}

/*$btnPref = $_POST['btnPref'] ?? '';

if ($btnPref=='savePref') { /* Ne fonctionne pas
  $_SESSION['utilisateur']->setlangeParle($languesParle);
  $_SESSION['utilisateur']->setLangageAcquis($langagesAcquis);
  $db->updateCandidat($_SESSION['utilisateur']);
  header("Location: profil.ctrl.php");
}*/


$langues = array('français','anglais','espagnol','italien','allemand','albanais');
$langages = array('php','html/css','c','python','perl','java','ruby','swift','julia','scala');
$secteurs = array('Informatique',"Autre");
$contrats = array('cdi','cdd');
$postes = array('Développeur','Développeur de jeux video','Front-end développeur','Back-end développeur','Full stack  développeur');
$entreprises = array("Microentreprise","Petite entreprise","Moyenne entreprise","Grande entreprise");

// Passage des paramètres
$view->assign("langues",$langues);
$view->assign("langages",$langages);
$view->assign("secteurs",$secteurs);
$view->assign("contrats",$contrats);
$view->assign("postes",$postes);
$view->assign("entreprises",$entreprises);

// Charge la vue
$view->display("profil.view.php");
?>
