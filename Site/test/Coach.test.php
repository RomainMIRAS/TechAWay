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


  //Test de la récupération d'un coach
  print("Accès à un candidat : ");
  $expected = new Coach('ibm@ibm.com','azerty','Paul', 'Jean', '0621306065', 18); // Coach attendue

  $value = $dao->getCoach(2); // On prend le coach d'id 2
  if ( $value != $expected) { //On compare le coach récuperé et celui attendue
    print("\n");
    var_dump($value);
    print("\nAttendu : \n");
    var_dump($expected);
    throw new Exception("Lecture du candidat N°1 incorrecte");
  }
  print("OK\n");





  } catch (Exception $e) {
  print("\n*** Erreur ***\n");
  print("Erreur : ".$e->getMessage()."\n");
}




 ?>
