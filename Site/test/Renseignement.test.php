

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
  print("Accès à une entreprise : <br>");


  $expected = new Renseignement(14, true, 'programmation', 'CDI', 'développeur', 'Corp'); // Candidat attendue
  $value = $db->getRenseignement(2); // On prend le candidat


//On test toutes les fonctions
if ($expected->getId() == $value->getId()) {
  printf("Pays OK <br>");
} else {
  printf("Pays not OK, otenue : %s; attendu : %s", $expected->getId(), $value->getId());
  throw new Exception("Lecture Pays du candidat N°966 incorrecte");
}


if ($expected->getTravEtranger() == $value->getTravEtranger()) {
    printf("Ville OK <br>");
    
  } else {
    printf("Ville not OK, otenue : %s; attendu : %s", $expected->getTravEtranger(), $value->getTravEtranger());
    throw new Exception("Lecture Ville du candidat N°966 incorrecte");
  }

if ($expected->getSecteur() == $value->getSecteur()) {
      printf("LienCv OK <br>");
      
    } else {
      printf("LienCv not OK, otenue : %s; attendu : %s", $expected->getSecteur(), $value->getSecteur());
      throw new Exception("Lecture LienCv du candidat N°966 incorrecte");
    }


if ($expected->getTypeContrat() == $value->getTypeContrat()) {
          printf("LienLM OK <br>");
                
              } else {
          printf("LienLM not OK, otenue : %s; attendu : %s", $expected->getTypeContrat(), $value->getTypeContrat());
          throw new Exception("Lecture LienLM du candidat N°966 incorrecte");
        }

if ($expected->getPoste() == $value->getPoste()) {
        printf("Etape OK <br>");
        
      } else {
        printf("Etape not OK, otenue : %s; attendu : %s", $expected->getPoste(), $value->getPoste());
        throw new Exception("Lecture Etape du candidat N°966 incorrecte");
      }

if ($expected->getTypeEntreprise() == $value->getTypeEntreprise()) {
                  printf("Nom OK <br>");
                  
                } else {
                  printf("Nom not OK, otenue : %s; attendu : %s", $expected->getTypeEntreprise(), $value->getTypeEntreprise());
                  throw new Exception("Lecture Nom du candidat N°966 incorrecte");
                }


  } catch (Exception $e) {
  print("\n*** Erreur ***\n");
  print("Erreur : ".$e->getMessage()."\n");
}




 ?>
