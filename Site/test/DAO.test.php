<?php
require_once(__DIR__.'/../model/DAO.class.php');


try{
  $dbconn3 = pg_connect("dbname=testdao user=test password=test");
  $req = $dao->pg_query($dbconn3,"SELECT * FROM article");

  
  $f = pg_fetch_all($req);

  var_dump($f);
  
}catch (Exception $e) {
  print("\n*** Erreur ***\n");
  print("Erreur : ".$e->getMessage()."\n");
}


/* 
try {
  $dao = new DAO(); // Instancie l'objet DAO

  //Test de la récupération d'un client
  print("Accès à un client : ");
  $expected = new Client(1,'IBM','17 avenue de Europe 92275 Bois-Colombes','0476624800', 'ibm@ibm.com');
  $value = $dao->getClient(1);
  if ( $value != $expected) {
    print("\n");
    var_dump($value);
    print("Attendu : \n");
    var_dump($expected);
    throw new Exception("Lecture du client N°1 incorrecte");
  }
  print("OK\n");

  //Test de la récupération d'un coach
  print("Accès à un coach : ");
  $expected = new Livre(1,"Slan",1940,1);
  $value = $dao->readLivre(1);
  if ( $value != $expected) {
    print("\n");
    var_dump($value);
    print("Attendu : \n");
    var_dump($expected);
    throw new Exception("Lecture du livre No 1 incorrect");
  }
  print("OK\n");

  // Test de l'existance des identifiant de livre
  print("Existance d'identifiants d'un livre : ");
  $expected = true;
  $value = $dao->idLivreExiste(1);
  if ($value != $expected) {
    print("\n");
    var_dump($value);
    print("Attendu : \n");
    var_dump($expected);
    throw new Exception("Le livre No 1 existe");
  }
  $expected = false;
  $value = $dao->idLivreExiste(-1);
  if ($value != $expected) {
    print("\n");
    var_dump($value);
    print("Attendu : \n");
    var_dump($expected);
    throw new Exception("Le livre No -1 n'existe pas");
  }
  print("OK\n");

  // Test de l'emprunt d'un livre
  print("Est-ce que le livre 1 est emprunté ? : ");
  $livre = $dao->readLivre(1);
  $value = $dao->emprunt($livre);
  $expected = false;
  if ( $value != $expected) {
    print("\n");
    var_dump($value);
    print("Attendu : \n");
    var_dump($expected);
    throw new Exception("Etat d'emprunt du livre No 1 incorrect");
  }
  print("OK\n");

  // Test de l'emprunt d'un livre
  print("Emprunt du livre 1 : ");
  $livre = $dao->readLivre(1);
  $dao->emprunter($livre);
  $value = $dao->emprunt($livre);
  $expected = true;
  if ( $value != $expected) {
    print("\n");
    var_dump($value);
    print("Attendu : \n");
    var_dump($expected);
    throw new Exception("Etat d'emprunt du livre No 1 incorrect");
  }
  print("OK\n");

  // Test du nombre d'emprunt d'un livre
  print("Retour du livre 1 : ");
  $livre = $dao->readLivre(1);
  $dao->retourner($livre);
  $value = $dao->emprunt($livre);
  $expected = false;
  if ( $value != $expected) {
    print("\n");
    var_dump($value);
    print("Attendu : \n");
    var_dump($expected);
    throw new Exception("Etat d'emprunt du livre No 1 incorrect");
  }
  print("OK\n");


} catch (Exception $e) {
  print("\n*** Erreur ***\n");
  print("Erreur : ".$e->getMessage()."\n");
}
 */

 ?>
