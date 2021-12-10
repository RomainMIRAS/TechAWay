<?php

try{
  $db = DAO::get();//138.68.96.182

}catch (Exception $e) {
  print("\n*** Erreur ***\n");
  print("Erreur : ".$e->getMessage()."\n");
}




try {
  $dao = new DAO(); // Instancie l'objet DAO


  //Test de la récupération d'un candidat
  print("Accès à un candidat : ");
  $expected = new Candidat('adresse-candidat@gmail.com'); // Candidat attendue

//function __construct(string $mail, string $password,string $nom='', string $prenom='', int $age=0, string $telephone='', string $lienCV='', string $lienLM='') {

  $value = $dao->getCandidat('adresse-candidat@gmail.com'); // On prend le candidat d'id 966
  if ( $value != $expected) { //On compare le candidat récuperé et celui attendue
    print("\n");
    var_dump($value);
    print("\nAttendu : \n");
    var_dump($expected);
    throw new Exception("Lecture du candidat N°966 incorrecte");
  }
  print("OK\n");





  } catch (Exception $e) {
  print("\n*** Erreur ***\n");
  print("Erreur : ".$e->getMessage()."\n");
}




 ?>
