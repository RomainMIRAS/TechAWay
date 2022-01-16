

<?php
////////////////////////////////////////////////////////////////////
//Test de la classe Renseignement
////////////////////////////////////////////////////////////////////

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


//On test toutes les fonctions en comparant les résultats obtenue de ceux attendue
if ($expected->getId() == $value->getId()) {
  printf("Id OK <br>");
} else {
  printf("Id not OK, otenue : %s; attendu : %s", $expected->getId(), $value->getId());
  throw new Exception("Lecture Id du renseignement N°2 incorrecte");
}


if ($expected->getTravEtranger() == $value->getTravEtranger()) {
    printf("TravEtranger OK <br>");
    
  } else {
    printf("TravEtranger not OK, otenue : %s; attendu : %s", $expected->getTravEtranger(), $value->getTravEtranger());
    throw new Exception("Lecture TravEtranger du renseignement N°2 incorrecte");
  }

if ($expected->getSecteur() == $value->getSecteur()) {
      printf("Secteur OK <br>");
      
    } else {
      printf("Secteur not OK, otenue : %s; attendu : %s", $expected->getSecteur(), $value->getSecteur());
      throw new Exception("Lecture Secteur du renseignement N°2 incorrecte");
    }


if ($expected->getTypeContrat() == $value->getTypeContrat()) {
          printf("TypeContrat OK <br>");
                
              } else {
          printf("TypeContrat not OK, otenue : %s; attendu : %s", $expected->getTypeContrat(), $value->getTypeContrat());
          throw new Exception("Lecture TypeContrat du renseignement N°2 incorrecte");
        }

if ($expected->getPoste() == $value->getPoste()) {
        printf("Poste OK <br>");
        
      } else {
        printf("Poste not OK, otenue : %s; attendu : %s", $expected->getPoste(), $value->getPoste());
        throw new Exception("Poste Id du renseignement N°2 incorrecte");
      }

if ($expected->getTypeEntreprise() == $value->getTypeEntreprise()) {
                  printf("TypeEntreprise OK <br>");
                  
                } else {
                  printf("TypeEntreprise not OK, otenue : %s; attendu : %s", $expected->getTypeEntreprise(), $value->getTypeEntreprise());
                  throw new Exception("Lecture TypeEntreprise du renseignement N°2 incorrecte");
                }

printf("<br>Tout est OK ! ");
  } catch (Exception $e) {
  print("\n*** Erreur ***\n");
  print("Erreur : ".$e->getMessage()."\n");
}




 ?>
