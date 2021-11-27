<?php
require_once(__DIR__.'/../model/DAO.class.php');


try{
  $db = new DAO();

  $liste = $db->getEmails();
  var_dump($liste);
  echo "</br>";
  $test = $db->createUtilisateur("testing2@gmail.com","PASSWORD");

  if ($test){
    echo "</br>Utilisateur Cree :</br>";
  }else{
    echo "</br>Erreur Utilisateur existe deja</br>";
  }

  $testLogin = $db->verifierLogin("testing2@gmail.com","PASSWORD");

  if ($testLogin){
    echo "</br>Login Correcte</br>";
  }else{
    echo "</br>Login incorrecte</br>";
  }

  $liste = $db->getEmails();

  var_dump($liste);
  echo "</br>";
}catch (Exception $e) {
  print("\n*** Erreur ***\n");
  print("Erreur : ".$e->getMessage()."\n");
}


 ?>
