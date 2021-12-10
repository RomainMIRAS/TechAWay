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


  //Test de la récupération d'un candidat
  print("Accès à un candidat : ");
  $expected = new Candidat('IBM','17 avenue de Europe 92275 Bois-Colombes','0476624800', 'ibm@ibm.com'); // Candidat attendue
  $value = $dao->getCandidat(1); // On prend le candidat d'id 1
  if ( $value != $expected) { //On compare le candidat récuperé et celui attendue
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
