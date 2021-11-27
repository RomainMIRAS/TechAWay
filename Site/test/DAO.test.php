<?php
require_once(__DIR__.'/../model/DAO.class.php');


try{
  $db = new DAO();

  $liste = $db->getEmails();
  var_dump($liste);
  echo "</br>";
  $test = $db->createUtilisateur("testing@gmail.com","PASSWORD");

  if ($test){
    echo "</br>Utilisateur Cree :</br>";
  }else{
    echo "</br>Erreur Utilisateur existe deja</br>";
  }

  $liste = $db->getEmails();

  var_dump($liste);
  echo "</br>";
}catch (Exception $e) {
  print("\n*** Erreur ***\n");
  print("Erreur : ".$e->getMessage()."\n");
}


 ?>
