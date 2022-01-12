<?php


include_once(__DIR__."/../framework/view.class.php");
include_once(__DIR__."/../model/Utilisateur.class.php");
include_once(__DIR__."/../model/Candidat.class.php");
include_once(__DIR__."/../model/Renseignement.class.php");
include_once(__DIR__."/../model/DAO.class.php");

//-------------------Affectation des variables

//$etape = (isset($_POST['etape'])) ? $_POST['etape']:"NPE";  //Declaration d'étapes

$nom = (isset($_POST['nom'])) ? $_POST['nom']:"";
$prenom = (isset($_POST['prenom'])) ? $_POST['prenom']:"";

$age = (isset($_POST['age'])) ? $_POST['age']:"";

// Attribut de la première page ( BASE )
$telephone = (isset($_POST['tel'])) ? $_POST['tel']:"";
$tellength= strlen($telephone);
$ville = (isset($_POST['ville'])) ? $_POST['ville']:"";
$pays = (isset($_POST['pays'])) ? $_POST['pays']:"";
$etape = (isset($_POST['etape'])) ? $_POST['etape']:"non";

if(isset($_POST['langueParle'])){
  var_dump($_POST['langueParle']);
}

// Attribut de la deuxième page (Compétence)
$nvEtude = (isset($_POST['nvEtude'])) ? $_POST['nvEtude']:"";  //Affectation du niveau d'etude
$langueParle[] = $_REQUEST['checkboxvar'];  //Affectation de la langue parlé
$languageAquis[] = $_REQUEST['checkboxvar'];  //Affectation des languages aquis

// Attribut de la deuxième page (Préfèrence)
$travEtranger = (isset($_POST['travEtranger'])) ? $_POST['travEtranger']:"";
$typeContrat = (isset($_POST['typeContrat'])) ? $_POST['typeContrat']:"";
$secteur = (isset($_POST['secteur'])) ? $_POST['secteur']:"";
$poste = (isset($_POST['poste'])) ? $_POST['poste']:"";
$typeEntreprise = (isset($_POST['typeEntreprise'])) ? $_POST['typeEntreprise']:"";

$erreur = "";

$listepays = array('Allemagne','Autriche','Andorre','Belgique','Boznie Herzegovine','Bulgarie','Chypre','Croatie','Danemark','Espagne','Estonie','Finlande','France','Gibraltar','Grece','Hongrie','Irlande','Islande','italie','Lettonie','Liechtenstein','Lituanie','Luxembourg','Malte','Monaco','Norvege','Pays Bas','Pays de Galle','Pologne','Portugal','Republique Tcheque','Roumanie','Royaume Uni','Russie','Slovaquie','Slovenie','Suede','Suisse','Ukraine','Vatican');

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
  // else if(preg_match('/^[a-z]+$/i', $nom) == false)
  // {
  //   $erreur = "Le nom doit etre composé de lettres seulement"; // Si nom n'est pas en lettre --> erreur
  // }
  // Si aucune langue selectionné
  else if($prenom == "" )
  {
    $erreur = "Le prenom doit etre rempli";  // Si prenom est vide --> erreur
  }
  // else if(preg_match('/^[a-z]+$/i', $prenom) == false)
  // {
  //   $erreur = "Le prenom doit etre composé de lettres seulement"; // Si prenom n'est pas en lettre --> erreur
  // }
  // Si age incorrect
  else if($age == "")
  {
    $erreur = "L'age doit etre rempli";
  }
  // else if(strtotime($age) >= strtotime(getdate('today')))
  // {
  //   $erreur = "L'age ne doit pas être superieur à la date d'aujourd'hui";
  // }


  else if($telephone == "")
  {
    $erreur = "Le telephone doit etre rempli et correct";
  }
  else if($tellength !== 10)
  {
    $erreur = "Le telephone doit être au format indiqué";
  }
  else if(preg_match('/^[0-9]+$/i', $telephone) == false)
  {
    $erreur = "Le telephone doit etre composé de chiffre";
  }
  else if($ville == "" )
  {
    $erreur = "La ville doit etre rempli";  // Si ville est vide --> erreur
  }
  // else if(preg_match('/^[a-z]+$/i', $ville) == false)
  // {
  //   $erreur = "La ville doit etre composé de lettres seulement"; // Si ville n'est pas en lettre --> erreur
  // }
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

  // Push des donnés dans la session puis quand fini dans la base
  if ($etape == "base"){
    session_start();
    $_SESSION["utilisateur"]->setNom($nom);
    $_SESSION["utilisateur"]->setPrenom($prenom);
    // Cacul d'age
    $today   = new DateTime('today');
    $age = date_create($age)->diff($today)->y;

    // $dateOfBirth = "17-10-1985";
    // $today = date("Y-m-d");
    // $diff = date_diff(date_create($dateOfBirth), date_create($today));

    // A FAIRE
    //$_SESSION["utilisateur"]->setMail("changement de mail");
    $_SESSION["utilisateur"]->setAge($age);
    $_SESSION["utilisateur"]->setVille($ville);
    $_SESSION["utilisateur"]->setTelephone($telephone);
    $_SESSION["utilisateur"]->setPays($pays);
    echo '<pre>' . var_export($_SESSION["utilisateur"], true) . '</pre>';
    session_write_close();
  } else if ($etape == "competences") {
    session_start();
    $competence = $_SESSION["utilisateur"]->getCompetenceAcquis();

    $competence->setNvEtude($nvEtude);
    $competence->setLangeParle($langueParle);
    $competence->setLangageAcquis($languageAquis);
    $_SESSION["utilisateur"]->setCompetenceAcquis($competence);
    session_write_close();
    echo '<pre>' . var_export($_SESSION["utilisateur"], true) . '</pre>';

  } else if ($etape == "preferences") {
    session_start();
    var_dump($_SESSION["utilisateur"]);
    $renseignement = $_SESSION["utilisateur"]->getRenseignement();
    $renseignement->setTravEtranger($travEtranger);
    $renseignement->setTypeContrat($typeContrat);
    $renseignement->setSecteur($secteur);
    $renseignement->setPoste($poste);
    $renseignement->setTypeEntreprise($typeEntreprise);
    $_SESSION["utilisateur"]->setPreference($renseignement);
    $_SESSION["utilisateur"]->setEtape(1);

    session_write_close();

    // FAIRE LE PUSH DE DONNES EN BASE ICI
    DAO::get()->updateCandidat($_SESSION["utilisateur"]);

    // Redirection sur la page principale
    header('Location: main.ctrl.php');
    $erreur = "Marche pas ";
  }

  // Gestion du Statuts de l'étape
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
$view->assign('pays',$listepays );
$view->assign('action',$action);
$view->assign('etape',$etape);
//$view->assign('candidat',$_SESSION["utilisateur"]);
$view->display("formulaire.view.php");



?>
