<?php
require_once(__DIR__.'/../model/DAO.class.php');


try{
  $db = new DAO();

  $liste = $db->getEmails();
  var_dump($liste);
  echo "</br>";
  $db->createUtilisateur("testing@gmail.com","PASSWORD");

  $liste = $db->getEmails();

  var_dump($liste);
  echo "</br>";
}catch (Exception $e) {
  print("\n*** Erreur ***\n");
  print("Erreur : ".$e->getMessage()."\n");
}


 ?>
