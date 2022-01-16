
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


  //Test de la récupération d'une entreprise
  print("Accès à une entreprise : <br>");
  $expected = new Entreprise(2, 'DevCorp', 'devCorp@corp.com', '0721322542', 'France', 'Paris'); // entreprise attendue


  $value = $db->getEntreprise(2); // entreprise témoin

//On test toutes les fonctions en comparant les résultats obtenue de ceux attendue
if ($expected->getId() == $value->getId()) {
  printf("Id OK <br>");
} else {
  printf("Id not OK, otenue : %s; attendu : %s", $expected->getId(), $value->getId());
  throw new Exception("Lecture Id de l'entreprise d'id 2 incorrecte");
}


if ($expected->getNom() == $value->getNom()) {
    printf("Nom OK <br>");
    
  } else {
    printf("Nom not OK, otenue : %s; attendu : %s", $expected->getNom(), $value->getNom());
    throw new Exception("Lecture Nom de l'entreprise d'id 2 incorrecte");
  }

if ($expected->getVille() == $value->getVille()) {
      printf("Ville OK <br>");
      
    } else {
      printf("Ville not OK, otenue : %s; attendu : %s", $expected->getVille(), $value->getVille());
      throw new Exception("Lecture Ville de l'entreprise d'id 2 incorrecte");
    }


if ($expected->getPays() == $value->getPays()) {
          printf("Pays OK <br>");
                
              } else {
          printf("Pays not OK, otenue : %s; attendu : %s", $expected->getPays(), $value->getPays());
          throw new Exception("Lecture Pays de l'entreprise d'id 2 incorrecte");
        }

if ($expected->getTelephone() == $value->getTelephone()) {
        printf("Telephone OK <br>");
        
      } else {
        printf("Telephone not OK, otenue : %s; attendu : %s", $expected->getTelephone(), $value->getTelephone());
        throw new Exception("Lecture Telephone de l'entreprise d'id 2 incorrecte");
      }

if ($expected->getMail() == $value->getMail()) {
                  printf("Mail OK <br>");
                  
                } else {
                  printf("Mail not OK, otenue : %s; attendu : %s", $expected->getMail(), $value->getMail());
                  throw new Exception("Lecture Mail de l'entreprise d'id 2 incorrecte");
                }
printf("<br>Tout est OK ! ");

  } catch (Exception $e) {//si il y a erreur on affiche le message d'erreur correspondant
  print("\n*** Erreur ***\n");
  print("Erreur : ".$e->getMessage()."\n");
}




 ?>
