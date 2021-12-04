<?php
require_once(__DIR__.'/../model/DAO.class.php');


try{
  $db = DAO::get();


  $test = "Mot de Passe";

  $hashed_pw = password_hash($test,PASSWORD_ARGON2I);

  $mdpFake = "fake";
  
  if (password_verify($mdpFake,$hashed_pw)){
    echo "</br>Good password</br>";
  }else{
    echo "</br>Incorrect password</br>";
  }
  if (password_verify($test,$hashed_pw)){
    echo "</br>Good password</br>";
  }else{
    echo "</br>Incorrect password</br>";
  }

  echo $hashed_pw;

  $liste = $db->getEmails();
  echo '<pre>' . var_export($liste, true) . '</pre>';

  echo "Creation d'utilisateur : adresse-candidat@gmail.com:motdepassecandidat  :";
  $test = $db->createUtilisateur("adresse-candidat@gmail.com","motdepassecandidat");

  if ($test){
    echo "</br>Utilisateur Cree :</br>";
  }else{
    echo "</br>Erreur Utilisateur existe deja</br>";
  }

  echo "</br>Verification de Login : adresse-candidat@gmail.com:motdepassecandidat  : (doit etre correcte)";
  $testLogin = $db->verifierLogin("adresse-candidat@gmail.com","motdepassecandidat");
  if ($testLogin){
    echo "</br>Login Correcte</br>";
  }else{
    echo "</br>Login incorrecte</br>";
  }

  echo "</br>Verification de Login : adresse-candidat@gmail.com:motdepassecandidat2  : (doit etre incorrecte mdp different)";
  $testLogin = $db->verifierLogin("adresse-candidat@gmail.com","motdepassecandidat2");
  if ($testLogin){
    echo "</br>Login Correcte</br>";
  }else{
    echo "</br>Login incorrecte</br>";
  }

  echo "</br>Verification de Login : adresse-candidat2@gmail.com:motdepassecandidat  : (doit etre incorrecte email inexistant)";
  $testLogin = $db->verifierLogin("adresse-candidat2@gmail.com","motdepassecandidat");
  if ($testLogin){
    echo "</br>Login Correcte</br>";
  }else{
    echo "</br>Login incorrecte</br>";
  }

  echo "</br>getCoach(adressemail) : adresse-coach@gmail.com  : (doit retourner type Coach)";
  $testLogin = $db->getCoach("adresse-coach@gmail.com");
  if ($testLogin){
    echo '<pre>' . var_export($testLogin, true) . '</pre>';
  }else{
    echo "</br>False ";
  }


  echo "</br>getCoachOuCandidat(adressemail) : adresse-candidat@gmail.com  : (doit retourner type Candidat)";
  $testLogin = $db->getCoachOuCandidat("adresse-candidat@gmail.com","motdepassecandidat");
  if ($testLogin){
    echo '<pre>' . var_export($testLogin, true) . '</pre>';
  }else{
    echo "</br>False ";
  }


  echo "</br>getCoachOuCandidat(adressemail) : adresse-coach@gmail.com  : (doit retourner type Coach)";
  $testLogin = $db->getCoachOuCandidat("adresse-coach@gmail.com","motdepassecoach");
  if ($testLogin){
    echo '<pre>' . var_export($testLogin, true) . '</pre>';
  }else{
    echo "</br>False ";
  }
  


  echo "</br></br> Liste de Mail :";
  $liste = $db->getEmails();

  echo '<pre>' . var_export($liste, true) . '</pre>';
  echo "</br>";
}catch (Exception $e) {
  print("\n*** Erreur ***\n");
  print("Erreur : ".$e->getMessage()."\n");
}


 ?>
