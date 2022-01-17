<?php
////////////////////////////////////////////////////////////////////
//Test des classes candidat et utilisateur
////////////////////////////////////////////////////////////////////



require_once(__DIR__ . '/../model/DAO.class.php');

try {
  $db = DAO::get(); //138.68.96.182

} catch (Exception $e) {
  print("\n*** Erreur ***\n");
  print("Erreur : " . $e->getMessage() . "\n");
}




try {


  //Test de la récupération d'un candidat
  print("Accès à un candidat : <br>");
  $compet = new Competence(0);
  $rensei = new Renseignement(0);
  $value = new Candidat('candidatParfait@gmail.com', 'candidatParfait', 'Juste', 'Parfait', 22, '0606060606', '', '', 1, 'France', 'Grenoble', '01-01-2022', $compet, $rensei); // Candidat attendue


  $expected = $db->getCandidat('candidatParfait@gmail.com'); // valeur témoins


  //On test toutes les fonctions en comparant les résultats obtenue de ceux attendue

  if ($expected->getPays() == $value->getPays()) { //Pays
    printf("Pays OK <br>");
  } else {
    printf("Pays not OK, otenue : %s; attendu : %s", $expected->getPays(), $value->getPays());
    throw new Exception("Lecture Pays du candidat d'id 1645 incorrecte");
  }


  if ($expected->getVille() == $value->getVille()) { //Ville
    printf("Ville OK <br>");
  } else {
    printf("Ville not OK, otenue : %s; attendu : %s", $expected->getVille(), $value->getVille());
    throw new Exception("Lecture Ville du candidat d'id 1645 incorrecte");
  }

  if ($expected->getLienCv() == $value->getLienCv()) { //LienCv
    printf("LienCv OK <br>");
  } else {
    printf("LienCv not OK, otenue : %s; attendu : %s", $expected->getLienCv(), $value->getLienCv());
    throw new Exception("Lecture LienCv du candidat d'id 1645 incorrecte");
  }


  if ($expected->getLienLM() == $value->getLienLM()) { //LienLM
    printf("LienLM OK <br>");
  } else {
    printf("LienLM not OK, otenue : %s; attendu : %s", $expected->getLienLM(), $value->getLienLM());
    throw new Exception("Lecture LienLM du candidat d'id 1645 incorrecte");
  }

  if ($expected->getEtape() == $value->getEtape()) { //Etape
    printf("Etape OK <br>");
  } else {
    printf("Etape not OK, otenue : %s; attendu : %s", $expected->getEtape(), $value->getEtape());
    throw new Exception("Lecture Etape du candidat d'id 1645 incorrecte");
  }

  if ($expected->getNom() == $value->getNom()) { //Nome
    printf("Nom OK <br>");
  } else {
    printf("Nom not OK, otenue : %s; attendu : %s", $expected->getNom(), $value->getNom());
    throw new Exception("Lecture Nom du candidat d'id 1645 incorrecte");
  }

  if ($expected->getPrenom() == $value->getPrenom()) { // Prenom
    printf("Prenom OK <br>");
  } else {
    printf("Prenom not OK, otenue : %s; attendu : %s", $expected->getPrenom(), $value->getPrenom());
    throw new Exception("Lecture Prenom du candidat d'id 1645 incorrecte");
  }

  if ($expected->getMail() == $value->getMail()) { //Mail
    printf("Mail OK <br>");
  } else {
    printf("Mail not OK, otenue : %s; attendu : %s", $expected->getMail(), $value->getMail());
    throw new Exception("Lecture Mail du candidat d'id 1645 incorrecte");
  }

  if ($expected->getTelephone() == $value->getTelephone()) { //Telephone
    printf("Telephone OK <br>");
  } else {
    printf("Telephone not OK, otenue : %s; attendu : %s", $expected->getTelephone(), $value->getTelephone());
    throw new Exception("Lecture Telephone du candidat d'id 1645 incorrecte");
  }


  if ($expected->getAge() == $value->getAge()) { //Age
    printf("Age OK <br>");
  } else {
    printf("Age not OK, otenue : %s; attendu : %s", $expected->getAge(), $value->getAge());
    throw new Exception("Lecture Age du candidat d'id 1645 incorrecte");
  }


  if ($db->verifierLogin('adresse-candidat@gmail.com', 'motdepassecandidat')) { //Mot de passe
    printf("Mot de passe OK <br>");
  } else {
    printf("Age not OK, otenue : %s; attendu : %s", $expected->getAge(), $value->getAge());
    throw new Exception("Lecture mot de passe du candidat d'id 1645 incorrecte");
  }

  printf("<br>Tout est OK ! ");
} catch (Exception $e) { //si il y a erreur on affiche le message d'erreur correspondant
  print("\n*** Erreur ***\n");
  print("Erreur : " . $e->getMessage() . "\n");
}
