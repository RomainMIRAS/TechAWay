<?php


include_once(__DIR__."/../framework/view.class.php");
include_once(__DIR__."/../framework/Competence.class.php");
include_once(__DIR__."/../framework/Renseignement.class.php");


//-------------------Affectation des variables


//$etape = (isset($_POST['etape'])) ? $_POST['etape']:"NPE";  //Declaration d'étapes

$nom = (isset($_POST['nom'])) ? $_POST['nom']:"";
$prenom = (isset($_POST['prenom'])) ? $_POST['prenom']:"";

$age = (isset($_POST['age'])) ? $_POST['age']:"";

/*
$ageDate = strtotime($age);
$date1 = date("m-d-Y");
$today = strtotime($date1);
$dateNull = 0;  //"00-00-0000";
*/

// Attribut de la première page ( BASE )
$tel = (isset($_POST['tel'])) ? $_POST['tel']:"";
$tellength= strlen($tel);
$ville = (isset($_POST['ville'])) ? $_POST['ville']:"";
$etape = (isset($_POST['etape'])) ? $_POST['etape']:"non";


// Attribut de la deuxième page (Compétence)
$nvEtude = (isset($_POST['nvEtude'])) ? $_POST['nvEtude']:"";  //Affectation du niveau d'etude
$langueParle = (isset($_POST['langueParle'])) ? $_POST['langueParle']:"";  //Affectation de la langue parlé
$languageAquis = (isset($_POST['languageAquis'])) ? $_POST['languageAquis']:"";  //Affectation des languages aquis

// Attribut de la deuxième page (Préfèrence)
$travEtranger = (isset($_POST['travEtranger'])) ? $_POST['travEtranger']:"";
$typeContrat = (isset($_POST['typeContrat'])) ? $_POST['typeContrat']:"";
$secteur = (isset($_POST['secteur'])) ? $_POST['secteur']:"";
$poste = (isset($_POST['poste'])) ? $_POST['poste']:"";
$typeEntreprise = (isset($_POST['typeEntreprise'])) ? $_POST['typeEntreprise']:"";

$erreur = "";

$pays = array('Allemagne','Autriche','Andorre','Belgique','Boznie Herzegovine','Bulgarie','Chypre','Croatie','Danemark','Espagne','Estonie','Finlande','France','Gibraltar','Grece','Hongrie','Irlande','Islande','italie','Lettonie','Liechtenstein','Lituanie','Luxembourg','Malte','Monaco','Norvege','Pays Bas','Pays de Galle','Pologne','Portugal','Republique Tcheque','Roumanie','Royaume Uni','Russie','Slovaquie','Slovenie','Suede','Suisse','Ukraine','Vatican');

$action = (isset($_POST['action'])) ? $_POST['action']: 'formulaire';

$etape = (isset($_POST['etape'])) ? $_POST['etape']: 'base';


///////////////////////////////////////////////////////////////////////////////
// Partie Gestion des erreurs
///////////////////////////////////////////////////////////////////////////////


// Si le boutton enclenché est "suivant" de la premiere page, alors on passe une serie de test de validité des info

if($action== "suivant" && $etape == "base")
{

  if($nom == "")
  {
    $erreur = "Le nom doit etre rempli";  // Si nom est vide --> erreur
  }
  else if(preg_match('/^[a-z]+$/i', $nom) == false)
  {
    $erreur = "Le nom doit etre composé de lettres seulement"; // Si nom n'est pas en lettre --> erreur
  }
  // Si aucune langue selectionné
  else if($prenom == "" )
  {
    $erreur = "Le prenom doit etre rempli";  // Si prenom est vide --> erreur
  }
  else if(preg_match('/^[a-z]+$/i', $prenom) == false)
  {
    $erreur = "Le prenom doit etre composé de lettres seulement"; // Si prenom n'est pas en lettre --> erreur
  }
  // Si age incorrect
  else if($age == "")
  {
    $erreur = "L'age doit etre rempli";
  }
  /*
  else if(strtotime($age) >= strtotime(date("m-d-Y"))   $today - $ageDate < $dateNull)
  {
    $erreur = "L'age ne doit pas être superieur à la date d'aujourd'hui";
  }
  */

  else if($tel == "")
  {
    $erreur = "Le telephone doit etre rempli et correct";
  }
  else if($tellength !== 10)
  {
    $erreur = "Le telephone doit être au format indiqué";
  }
  else if(preg_match('/^[0-9]+$/i', $tel) == false)
  {
    $erreur = "Le telephone doit etre composé de chiffre";
  }
  else if($ville == "" )
  {
    $erreur = "La ville doit etre rempli";  // Si ville est vide --> erreur
  }
  else if(preg_match('/^[a-z]+$/i', $ville) == false)
  {
    $erreur = "La ville doit etre composé de lettres seulement"; // Si ville n'est pas en lettre --> erreur
  }
  else{
    $etape = (isset($_POST['etape'])) ? $_POST['etape']: 'base';
  }
}


// Gestion des erreur de competences
if($action== "suivant" && $etape == "competences")
{
  // Si niveau d'etude vide alors --> erreur
  if($nvEtude == "")
  {
    $erreur = "Veuillez entrer votre niveau d'etude";
  }
  // Si aucune langue selectionné
  else if($langueParle == "" )
  {
    $erreur = "Veillez selectionner une langue que vous parlez";
  }
  // Si aucun language selectionné
  else if($languageAquis == "")
  {
    $erreur = "Veuillez selectionner un language que vous maitrisez";
  }

}

// Gestion des erreur de preferences
if($etape== "envoyer")
{
  // Si niveau d'etude vide alors --> erreur
  if($travEtranger == "")
  {
    $erreur = "Tu veut taff ailleur ou pas pelo";
  }
  // Si aucune langue selectionné
  else if($typeContrat == "" )
  {
    $erreur = "Veillez selectionner un type de contrat";
  }
  // Si aucun language selectionné
  else if($secteur == "")
  {
    $erreur = "Veuillez selectionner un secteur";
  }
  else if($poste == "")
  {
    $erreur = "Veuillez selectionner poste";
  }
  else if($typeEntreprise == "")
  {
    $erreur = "Veuillez selectionner un type d'entreprise";
  }

}

// Gestion suivant
if ($erreur == "" && $action == "suivant"){
  $etape = ($etape == "base") ? "competences": "preferences";

  // Push des donnés dans la session puis quand fini dans la base
  if ($etape == "base"){
    $_SESSION["utilisateur"]->setNom($nom);
    $_SESSION["utilisateur"]->setPrenom($prenom);

    // Cacul d'age
    // A FAIRE
    $_SESSION["utilisateur"]->setAge($age);
    $_SESSION["utilisateur"]->setTelephone($tel);
  } else if ($etape == "competences") {
    $competence = new Competence($nvEtude,$langueParle,$languageAquis);
    $_SESSION["utilisateur"]->setCompetenceAcquis($competence);
  } else if ($etape == "preferences") {

  }
}

//Gestion précédent
if ($action == "precedent"){
  $etape = ($etape == "competences") ? "base": "competences";
}

///////////////////////////////////////////////////////////////////////////////
// Partie Modéle
///////////////////////////////////////////////////////////////////////////////

/*
if ($erreur == "" && $etape == "preferences"){
  DAO::get()->createUtilisateur($email, $password);
  seConnecter($email,$password);
}
*/

///////////////////////////////////////////////////////////////////////////////
// Partie View
///////////////////////////////////////////////////////////////////////////////


$view = new View();
$view->assign('erreur',$erreur);
$view->assign('pays',$pays);
$view->assign('action',$action);
$view->assign('etape',$etape);
$view->display("formulaire.view.php");



?>
