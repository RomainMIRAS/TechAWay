<?php


include_once(__DIR__."/../framework/view.class.php");


//-------------------Affectation des variables


//$etape = (isset($_POST['etape'])) ? $_POST['etape']:"NPE";  //Declaration d'étapes

$nom = (isset($_POST['nom'])) ? $_POST['nom']:""; 
$prenom = (isset($_POST['prenom'])) ? $_POST['prenom']:"";  
$age = (isset($_POST['age'])) ? $_POST['age']:"";  
$tel = (isset($_POST['tel'])) ? $_POST['tel']:""; 
$etape = (isset($_POST['etape'])) ? $_POST['etape']:"non";

$nvEtude = (isset($_POST['nvEtude'])) ? $_POST['nvEtude']:"";  //Affectation du niveau d'etude
$langueParle = (isset($_POST['langueParle'])) ? $_POST['langueParle']:"";  //Affectation de la langue parlé
$languageAquis = (isset($_POST['languageAquis'])) ? $_POST['languageAquis']:"";  //Affectation des languages aquis


$travEtranger = (isset($_POST['travEtranger'])) ? $_POST['travEtranger']:"";
$typeContrat = (isset($_POST['typeContrat'])) ? $_POST['typeContrat']:"";
$secteur = (isset($_POST['secteur'])) ? $_POST['secteur']:"";
$poste = (isset($_POST['poste'])) ? $_POST['poste']:"";
$typeEntreprise = (isset($_POST['typeEntreprise'])) ? $_POST['typeEntreprise']:"";



/*
$nom = '';
if (isset($_POST['nom'])) {
  $nom = $_POST['nom'];
}
*/

$erreur = "";

$pays = array('Allemagne','Autriche','Andorre','Belgique','Boznie Herzegovine','Bulgarie','Chypre','Croatie','Danemark','Espagne','Estonie','Finlande','France','Gibraltar','Grece','Hongrie','Irlande','Islande','italie','Lettonie','Liechtenstein','Lituanie','Luxembourg','Malte','Monaco','Norvege','Pays Bas','Pays de Galle','Pologne','Portugal','Republique Tcheque','Roumanie','Royaume Uni','Russie','Slovaquie','Slovenie','Suede','Suisse','Ukraine','Vatican');

$action = (isset($_POST['action'])) ? $_POST['action']: 'formulaire';

  $etape = (isset($_POST['etape'])) ? $_POST['etape']: 'base';
$today = date("m-d-Y");


///////////////////////////////////////////////////////////////////////////////
// Partie Gestion des erreurs
///////////////////////////////////////////////////////////////////////////////

// Si le boutton enclenché est "envoyer" alors on passe une serie de test de validité des info

if($action== "suivant" && $etape == "base")  
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
  else if($age == "" && $age < $today)
  {
    $erreur = "L'age doit etre rempli et correct";
  }
  else if($tel == "" && is_numeric($tel) && strlen($tel) > 5)
  {
    $erreur = "Le telephone doit etre rempli et correct";
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
