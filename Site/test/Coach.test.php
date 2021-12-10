<?php
require_once(__DIR__.'/../model/DAO.class.php');

try{
  $db = DAO::get();//138.68.96.182

}catch (Exception $e) {
  print("\n*** Erreur ***\n");
  print("Erreur : ".$e->getMessage()."\n");
}




try {
  $dao = new DAO(); // Instancie l'objet DAO


  //Test de la récupération d'un coach
  print("Accès à un coach : <br>");
  $expected = new Coach('adresse-coach@gmail.com', 'motdepassecoach'); // Coach attendue
  $value = $dao->getCoach('adresse-coach@gmail.com'); // On prend le coach d'id 966





              if ($expected->getLienPhoto() == $value->getLienPhoto()) {
                printf("LienPhoto OK <br>");
                if ($expected->getNom() == $value->getNom()) {
                  printf("Nom OK <br>");
                  if ($expected->getPrenom() == $value->getPrenom()) {
                    printf("Prenom OK <br>");
                    if ($expected->getMail() == $value->getMail()) {
                      printf("Mail OK <br>");
                      if ($expected->getTelephone() == $value->getTelephone()) {
                        printf("Telephone OK <br>");
                        if ($expected->getAge() == $value->getAge()) {
                          printf("Age OK <br>");
                          if ($dao->verifierLogin('adresse-coach@gmail.com', 'motdepassecoach')) {
                            printf("Mot de passe OK <br>");
                            printf("Tout OK <br>");
                          } else {
                            printf("Age not OK, otenue : %s; attendu : %s", $expected->getAge(), $value->getAge());
                            throw new Exception("Lecture Age du coach N°966 incorrecte");
                          }
                        } else {
                          printf("Age not OK, otenue : %s; attendu : %s", $expected->getAge(), $value->getAge());
                          throw new Exception("Lecture Age du coach N°966 incorrecte");
                        }
                      } else {
                        printf("Telephone not OK, otenue : %s; attendu : %s", $expected->getTelephone(), $value->getTelephone());
                        throw new Exception("Lecture Telephone du coach N°966 incorrecte");
                      }
                    } else {
                      printf("Mail not OK, otenue : %s; attendu : %s", $expected->getMail(), $value->getMail());
                      throw new Exception("Lecture Mail du coach N°966 incorrecte");
                    }
                  } else {
                    printf("Prenom not OK, otenue : %s; attendu : %s", $expected->getPrenom(), $value->getPrenom());
                    throw new Exception("Lecture Prenom du coach N°966 incorrecte");
                  }
                } else {
                  printf("Nom not OK, otenue : %s; attendu : %s", $expected->getNom(), $value->getNom());
                  throw new Exception("Lecture Nom du coach N°966 incorrecte");
                }
              } else {
          printf("LienPhoto not OK, otenue : %s; attendu : %s", $expected->getLienPhoto(), $value->getLienPhoto());
          throw new Exception("Lecture LienPhoto du coach N°966 incorrecte");
        }






  } catch (Exception $e) {
  print("\n*** Erreur ***\n");
  print("Erreur : ".$e->getMessage()."\n");
}




 ?>
