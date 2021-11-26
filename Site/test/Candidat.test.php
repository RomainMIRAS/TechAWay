<?php

try{
  $dbconn3 = pg_connect("host=localhost port=5432 dbname=testdao user=testdao password=test");//138.68.96.182
  $req = pg_query($dbconn3,"SELECT * FROM article");

  
  $f = pg_fetch_all($req);

  var_dump($f);

}catch (Exception $e) {
  print("\n*** Erreur ***\n");
  print("Erreur : ".$e->getMessage()."\n");
}




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




















  } catch (Exception $e) {
  print("\n*** Erreur ***\n");
  print("Erreur : ".$e->getMessage()."\n");
}




 ?>
