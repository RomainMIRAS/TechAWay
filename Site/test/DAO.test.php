<?php
require_once(__DIR__.'/../model/DAO.class.php');


try{
  $db = new DAO();

  $liste = $db->getEmails();
  echo '<pre>' . var_export($liste, true) . '</pre>';

  echo "Creation d'utilisateur : testing2@gmail.com:PASSWORD  :";
  $test = $db->createUtilisateur("testing2@gmail.com","PASSWORD");

  if ($test){
    echo "</br>Utilisateur Cree :</br>";
  }else{
    echo "</br>Erreur Utilisateur existe deja</br>";
  }

  echo "</br>Verification de Login : testing2@gmail.com:PASSWORD  :";
  $testLogin = $db->verifierLogin("testing2@gmail.com","PASSWORD");

  echo "</br>Verification de Login : testing2333@gmail.com:PASSWORD  :";
  $testLogin = $db->verifierLogin("testing2333@gmail.com","PASSWORD");

  if ($testLogin){
    echo "</br>Login Correcte</br>";
  }else{
    echo "</br>Login incorrecte</br>";
  }

  $liste = $db->getEmails();

  echo '<pre>' . var_export($liste, true) . '</pre>';
  echo "</br>";
}catch (Exception $e) {
  print("\n*** Erreur ***\n");
  print("Erreur : ".$e->getMessage()."\n");
}


 ?>
