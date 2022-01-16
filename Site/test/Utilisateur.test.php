<?php
require_once(__DIR__.'/../model/DAO.class.php');

try{
  $db = DAO::get();//138.68.96.182

}catch (Exception $e) {
  print("\n*** Erreur ***\n");
  print("Erreur : ".$e->getMessage()."\n");
}




try {


  //Test de la récupération d'un candidat
  print("Accès à un candidat : <br>");
  $compet = new Competence(0);
  $rensei = new Renseignement(0);
  $expected = new Candidat('candidatTest@gmail.com', 'candidatTest', 'Test', 'Test', 0, '0606060606', '', '', 1, 'France', 'Grenoble', '01-01-2022', $compet, $rensei); // Candidat attendue


  $value = $db->getCandidat('candidatTest@gmail.com'); // On prend le candidat


//On test toutes les fonctions
if ($expected->getNom() == $value->getNom()) {
  printf("Pays OK <br>");
} else {
  printf("Pays not OK, otenue : %s; attendu : %s", $expected->getNom(), $value->getNom());
  throw new Exception("Lecture Pays du candidat N°966 incorrecte");
}


if ($expected->getPrenom() == $value->getPrenom()) {
    printf("Ville OK <br>");
    
  } else {
    printf("Ville not OK, otenue : %s; attendu : %s", $expected->getPrenom(), $value->getPrenom());
    throw new Exception("Lecture Ville du candidat N°966 incorrecte");
  }

if ($expected->getPassword() == $value->getPassword()) {
      printf("LienCv OK <br>");
      
    } else {
      printf("LienCv not OK, otenue : %s; attendu : %s", $expected->getPassword(), $value->getPassword());
      throw new Exception("Lecture LienCv du candidat N°966 incorrecte");
    }


if ($expected->getTelephone() == $value->getTelephone()) {
          printf("LienLM OK <br>");
                
              } else {
          printf("LienLM not OK, otenue : %s; attendu : %s", $expected->getTelephone(), $value->getTelephone());
          throw new Exception("Lecture LienLM du candidat N°966 incorrecte");
        }

if ($expected->getAge() == $value->getAge()) {
        printf("Etape OK <br>");
        
      } else {
        printf("Etape not OK, otenue : %s; attendu : %s", $expected->getAge(), $value->getAge());
        throw new Exception("Lecture Etape du candidat N°966 incorrecte");
      }

if ($expected->getDateCreation() == $value->getDateCreation()) {
                  printf("Nom OK <br>");
                  
                } else {
                  printf("Nom not OK, otenue : %s; attendu : %s", $expected->getDateCreation(), $value->getDateCreation());
                  throw new Exception("Lecture Nom du candidat N°966 incorrecte");
                }


  } catch (Exception $e) {
  print("\n*** Erreur ***\n");
  print("Erreur : ".$e->getMessage()."\n");
}




 ?>
