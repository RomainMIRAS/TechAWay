<?php

include_once(__DIR__."/../framework/view.class.php");


//-------------------Affectation des variables


//$etape = (isset($_POST['etape'])) ? $_POST['etape']:"NPE";  //Declaration d'étapes

$nom = (isset($_POST['nom'])) ? $_POST['nom']:""; 
$prenom = (isset($_POST['prenom'])) ? $_POST['prenom']:"";  
$age = (isset($_POST['age'])) ? $_POST['age']:"";  
$tel = (isset($_POST['tel'])) ? $_POST['tel']:""; 

$nvEtude = (isset($_POST['nvEtude'])) ? $_POST['nvEtude']:"";  //Affectation du niveau d'etude
$langueParle = (isset($_POST['langueParle'])) ? $_POST['langueParle']:"";  //Affectation de la langue parlé
$languageAquis = (isset($_POST['languageAquis'])) ? $_POST['languageAquis']:"";  //Affectation des languages aquis


$travEtranger = (isset($_POST['travEtranger'])) ? $_POST['travEtranger']:""; 
$typeContrat = (isset($_POST['typeContrat'])) ? $_POST['typeContrat']:"";
$secteur = (isset($_POST['secteur'])) ? $_POST['secteur']:"";
$poste = (isset($_POST['poste'])) ? $_POST['poste']:"";
$typeEntreprise = (isset($_POST['typeEntreprise'])) ? $_POST['typeEntreprise']:"";

$erreur = "";

/*
$nom = '';
if (isset($_POST['nom'])) {
  $nom = $_POST['nom'];
}
*/

$pays = array('Allemagne','Autriche','Andorre','Belgique','Boznie Herzegovine','Bulgarie','Chypre','Croatie','Danemark','Espagne','Estonie','Finlande','France','Gibraltar','Grece','Hongrie','Irlande','Islande','italie','Lettonie','Liechtenstein','Lituanie','Luxembourg','Malte','Monaco','Norvege','Pays Bas','Pays de Galle','Pologne','Portugal','Republique Tcheque','Roumanie','Royaume Uni','Russie','Slovaquie','Slovenie','Suede','Suisse','Ukraine','Vatican');

$action = (isset($_POST['action'])) ? $_POST['action']: 'formulaire';
$etape = (isset($_POST['etape'])) ? $_POST['etape']: 'base';




///////////////////////////////////////////////////////////////////////////////
// Partie Gestion des erreurs
///////////////////////////////////////////////////////////////////////////////

// Si le boutton enclenché est "envoyer" alors on passe une serie de test de validité des info

if($etape== "competence")  
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
  // Si age incorrect
  else if($age == "" && is_numeric($age))
  {
    $erreur = "L'age doit etre rempli et correct";
  }
  else if($tel == "" && is_numeric($tel) && strlen($tel) > 5)
  {
    $erreur = "Le telephone doit etre rempli et correct";
  }

}


// Gestion des erreur de competences
if($etape== "preferences")  
{
  // Si niveau d'etude vide alors --> erreur 
  if($nvEtude == "") 
  {
    $erreur = "Le niveau d'etude doit etre rempli";
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
