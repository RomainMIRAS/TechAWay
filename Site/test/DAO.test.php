<?php
require_once(__DIR__.'/../model/DAO.class.php');


try{
  $db = DAO::get();
  
  //Test de la methode getEmails de DAO
  $liste = $db->getEmails();
  echo '<pre>' . var_export($liste, true) . '</pre>';

  //Test de Creation d'utilisateur;
  echo "Creation d'utilisateur : adresse-candidat@gmail.com:motdepassecandidat:  (doit retourner un erreur car il existe deja)";
  $test = $db->createUtilisateur("adresse-candidat@gmail.com","motdepassecandidat");

  if ($test){
    echo "</br>Utilisateur Cree :</br>";
  }else{
    echo "</br>Erreur Utilisateur existe deja</br>";
  }

  echo "Creation d'utilisateur : adresse-candidat@gmail.com:motdepassecandidat:  (doit retourner un erreur car il existe deja)";
  $test = $db->createUtilisateur("adresse-candidat2@gmail.com","motdepassecandidat");

  if ($test){
    echo "</br>Utilisateur Cree :</br>";
  }else{
    echo "</br>Erreur Utilisateur existe deja</br>";
  }

  //Test de la methode VeriferLogin, C'est qui permet de se Login.
  echo "</br>Verification de Login : adresse-candidat@gmail.com:motdepassecandidat  : (doit etre correcte)";
  $testLogin = $db->verifierLogin("adresse-candidat@gmail.com","motdepassecandidat");
  if ($testLogin){
    echo "</br>Login Correcte</br>";
  }else{
    echo "</br>Login incorrecte</br>";
  }

  echo "</br>Verification de Login : adresse-candidat@gmail.com:motdepassecandidat2  : (doit etre incorrecte car mdp different)";
  $testLogin = $db->verifierLogin("adresse-candidat@gmail.com","motdepassecandidat2");
  if ($testLogin){
    echo "</br>Login Correcte</br>";
  }else{
    echo "</br>Login incorrecte</br>";
  }

  echo "</br>Verification de Login : adresse-candidat2@gmail.com:motdepassecandidat  : (doit etre incorrecte car email inexistant)";
  $testLogin = $db->verifierLogin("adresse-candidat2@gmail.com","motdepassecandidat");
  if ($testLogin){
    echo "</br>Login Correcte</br>";
  }else{
    echo "</br>Login incorrecte</br>";
  }

  
  //verification de la methode getCoach() il return un Coach s'il existe, faux sinon
  echo "</br>getCoach(adressemail) : adresse-coach@gmail.com  : (doit retourner type Coach)";
  $testLogin = $db->getCoach("adresse-coach@gmail.com");
  if ($testLogin){
    echo '<pre>' . var_export($testLogin, true) . '</pre>';
  }else{
    echo "</br>False ";
  }
  //verification de la methode getCandidat() il return un Candidat s'il existe, faux sinon
  echo "</br>getCandidat(adressemail) : adresse-candidat@gmail.com  : (doit retourner type Candidat)";
  $testLogin = $db->getCandidat("adresse-candidat@gmail.com");
  if ($testLogin){
    echo '<pre>' . var_export($testLogin, true) . '</pre>';
  }else{
    echo "</br>False ";
  }

  //Test de fonction getCoachOuCandidat qu il return un coach ou candidat dependant de son type automatiquement
  echo "</br>getCoachOuCandidat(adressemail) : adresse-candidat@gmail.com  : (doit retourner type Candidat)";
  $testLogin = $db->getCoachOuCandidat("adresse-candidat@gmail.com","motdepassecandidat");
  if ($testLogin){
    echo '<pre>' . var_export($testLogin, true) . '</pre>';
  }else{
    echo "</br>False ";
  }

/* 
  echo "</br>createCompetence('IUT 2', 'Anglais,Francais,Russian' , 'C++,Java,Css,HTML,Javascript') : (doit retourner true)";
  $testLogin = $db->createCompetence("IUT 2", "Anglais,Francais,Russian" , "C++,Java,Css,HTML,Javascript");
  if ($testLogin){
    echo '<pre>' . var_export($testLogin, true) . '</pre>';
  }else{
    echo "</br>False ";
  } */

  echo "</br>getCoachOuCandidat(adressemail) : adresse-coach@gmail.com  : (doit retourner type Coach)";
  $testLogin = $db->getCoachOuCandidat("adresse-coach@gmail.com","motdepassecoach");
  if ($testLogin){
    echo '<pre>' . var_export($testLogin, true) . '</pre>';
  }else{
    echo "</br>False ";
  }

  echo '<hr/>';

  echo "</br>getId(adressemail) : adresse-candidat@gmail.com : retourne id du candidat d'adressemail: adresse-candidat@gmail.com (doit etre = 966)";
  $testLogin = $db->getId("adresse-candidat@gmail.com");
  if ($testLogin){
    echo '<pre>' . var_export($testLogin, true) . '</pre>';
  }else{
    echo "</br>False ";
  }

  echo "</br>getCompetence(adressemail) : adresse-candidat@gmail.com doit retourner type Competence de l'utilisateur d'adressemail adresse-candidat@gmail.com";
  $testLogin = $db->getCompetence("adresse-candidat@gmail.com");
  if ($testLogin){
    echo '<pre>' . var_export($testLogin, true) . '</pre>';
  }else{
    echo "</br>False ";
  }

  echo "</br>getRenseignement(adressemail) : adresse-candidat@gmail.com doit retourner type Renseignement de l'utilisateur d'adressemail adresse-candidat@gmail.com";
  $testLogin = $db->getRenseignement("adresse-candidat@gmail.com");
  if ($testLogin){
    echo '<pre>' . var_export($testLogin, true) . '</pre>';
  }else{
    echo "</br>False ";
  }


  //Un echo de getEmails
  echo "</br></br> Liste de Mail :";
  $liste = $db->getEmails();

  echo '<pre>' . var_export($liste, true) . '</pre>';
  echo "</br>";
}catch (Exception $e) {
  print("\n*** Erreur ***\n");
  print("Erreur : ".$e->getMessage()."\n");
}


 ?>
