<?php
require_once(__DIR__.'/../model/DAO.class.php');


try{
  $db = new DAO();

  $db->getEmails();
  

}catch (Exception $e) {
  print("\n*** Erreur ***\n");
  print("Erreur : ".$e->getMessage()."\n");
}


 ?>
