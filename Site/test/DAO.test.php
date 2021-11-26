<?php
//require_once(__DIR__.'/../model/DAO.class.php');


try{
  $dbconn3 = pg_connect("host=localhost port=5432 dbname=bases3d23 user=users3d23 password=p23");//138.68.96.182
  $req = pg_query($dbconn3,"SELECT * FROM article");

  
  $f = pg_fetch_all($req);

  var_dump($f);

}catch (Exception $e) {
  print("\n*** Erreur ***\n");
  print("Erreur : ".$e->getMessage()."\n");
}


 ?>
