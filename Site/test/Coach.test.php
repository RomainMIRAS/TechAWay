<?php
////////////////////////////////////////////////////////////////////
//Test de la classe Coach
////////////////////////////////////////////////////////////////////

require_once(__DIR__ . '/../model/DAO.class.php');

try {
  $db = DAO::get(); //138.68.96.182

} catch (Exception $e) {
  print("\n*** Erreur ***\n");
  print("Erreur : " . $e->getMessage() . "\n");
}




try {


  //Test de la récupération d'un coach
  print("Accès à un coach : <br>");
  $expected = new Coach('adresse-coach@gmail.com', 'motdepassecoach', 'Michel', 'Jean', '0712131415', 35, ''); // Coach attendue
  $value = $db->getCoach('adresse-coach@gmail.com'); //Coach témoins


  //On test toutes les fonctions en comparant les résultats obtenue de ceux attendue

  if ($expected->getLienPhoto() == $value->getLienPhoto()) { //Lien photo
    printf("LienPhoto OK <br>");
  } else {
    printf("LienPhoto not OK, otenue : %s; attendu : %s", $expected->getLienPhoto(), $value->getLienPhoto());
    throw new Exception("Lecture LienPhoto du coach d'id 968 incorrecte");
  }

  if ($expected->getNom() == $value->getNom()) { //Nom
    printf("Nom OK <br>");
  } else {
    printf("Nom not OK, otenue : %s; attendu : %s", $expected->getNom(), $value->getNom());
    throw new Exception("Lecture Nom du coach d'id 968 incorrecte");
  }

  if ($expected->getPrenom() == $value->getPrenom()) { //Prenom
    printf("Prenom OK <br>");
  } else {
    printf("Prenom not OK, otenue : %s; attendu : %s", $expected->getPrenom(), $value->getPrenom());
    throw new Exception("Lecture Prenom du coach d'id 968 incorrecte");
  }

  if ($expected->getMail() == $value->getMail()) { //Mail
    printf("Mail OK <br>");
  } else {
    printf("Mail not OK, otenue : %s; attendu : %s", $expected->getMail(), $value->getMail());
    throw new Exception("Lecture Mail du coach d'id 968 incorrecte");
  }

  if ($expected->getTelephone() == $value->getTelephone()) { //Telephone
    printf("Telephone OK <br>");
  } else {
    printf("Telephone not OK, otenue : %s; attendu : %s", $expected->getTelephone(), $value->getTelephone());
    throw new Exception("Lecture Telephone du coach d'id 968 incorrecte");
  }

  if ($expected->getAge() == $value->getAge()) { //Age
    printf("Age OK <br>");
  } else {
    printf("Age not OK, otenue : %s; attendu : %s", $expected->getAge(), $value->getAge());
    throw new Exception("Lecture Age du coach d'id 968 incorrecte");
  }

  if ($db->verifierLogin('adresse-coach@gmail.com', 'motdepassecoach')) { //Mot de passe
    printf("Mot de passe OK <br>");
  } else {
    printf("Adresse mail not OK, otenue : %s; attendu : %s", $expected->getAge(), $value->getAge());
    throw new Exception("Lecture mot de passe du coach d'id 968 incorrecte");
  }

  printf("<br>Tout est OK ! ");
} catch (Exception $e) { //si il y a erreur on affiche le message d'erreur correspondant
  print("\n*** Erreur ***\n");
  print("Erreur : " . $e->getMessage() . "\n");
}
