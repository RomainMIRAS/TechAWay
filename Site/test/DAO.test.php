<?php
require_once(__DIR__.'/../model/DAO.class.php');


try{
  $db = new DAO();

  $liste = $db->getEmails();
  var_dump($liste);
  $db->createUtilisateur("testing@gmail.com","PASSWORD");

  $liste = $db->getEmails();

  var_dump($liste);

}catch (Exception $e) {
  print("\n*** Erreur ***\n");
  print("Erreur : ".$e->getMessage()."\n");
}


 ?>
