
<?php

////////////////////////////////////////////////////////////////////
//Test de la classe Entreprise
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
  $expected = new Entreprise(2, 'DevCorp', 'devCorp@corp.com', '0721322542', 'France', 'Paris'); // Candidat attendue


  $value = $db->getEntreprise(2); // On prend le candidat

//On test toutes les fonctions en comparant les résultats obtenue de ceux attendue
if ($expected->getId() == $value->getId()) {
  printf("Pays OK <br>");
} else {
  printf("Pays not OK, otenue : %s; attendu : %s", $expected->getId(), $value->getId());
  throw new Exception("Lecture Id de l'entreprise d'id 2 incorrecte");
}


if ($expected->getNom() == $value->getNom()) {
    printf("Ville OK <br>");
    
  } else {
    printf("Ville not OK, otenue : %s; attendu : %s", $expected->getNom(), $value->getNom());
    throw new Exception("Lecture Id de l'entreprise d'id 2 incorrecte");
  }

if ($expected->getVille() == $value->getVille()) {
      printf("LienCv OK <br>");
      
    } else {
      printf("LienCv not OK, otenue : %s; attendu : %s", $expected->getVille(), $value->getVille());
      throw new Exception("Lecture Id de l'entreprise d'id 2 incorrecte");
    }


if ($expected->getPays() == $value->getPays()) {
          printf("LienLM OK <br>");
                
              } else {
          printf("LienLM not OK, otenue : %s; attendu : %s", $expected->getPays(), $value->getPays());
          throw new Exception("Lecture Id de l'entreprise d'id 2 incorrecte");
        }

if ($expected->getTelephone() == $value->getTelephone()) {
        printf("Etape OK <br>");
        
      } else {
        printf("Etape not OK, otenue : %s; attendu : %s", $expected->getTelephone(), $value->getTelephone());
        throw new Exception("Lecture Id de l'entreprise d'id 2 incorrecte");
      }

if ($expected->getMail() == $value->getMail()) {
                  printf("Nom OK <br>");
                  
                } else {
                  printf("Nom not OK, otenue : %s; attendu : %s", $expected->getMail(), $value->getMail());
                  throw new Exception("Lecture Id de l'entreprise d'id 2 incorrecte");
                }
printf("<br>Tout est OK ! ");

  } catch (Exception $e) {
  print("\n*** Erreur ***\n");
  print("Erreur : ".$e->getMessage()."\n");
}




 ?>
