
<?php
require_once(__DIR__.'/../model/DAO.class.php');

try{
  $db = DAO::get();//138.68.96.182

}catch (Exception $e) {
  print("\n*** Erreur ***\n");
  print("Erreur : ".$e->getMessage()."\n");
}




try {


  //Test de la récupération d'un utilisateur
  print("Accès à un utilisateur : <br>");
  $expected = new Utilisateur('adresse-coach@gmail.com', 'motdepassecoach'); // Utilisateur attendue
  $value = $db->getUtilisateur('adresse-coach@gmail.com'); // On prend l'utilisateur d'id 968





              if ($expected->getLienPhoto() == $value->getLienPhoto()) {
                printf("LienPhoto OK <br>");
                
              } else {
          printf("LienPhoto not OK, otenue : %s; attendu : %s", $expected->getLienPhoto(), $value->getLienPhoto());
          throw new Exception("Lecture LienPhoto du coach N°966 incorrecte");
        }


if ($expected->getNom() == $value->getNom()) {
                  printf("Nom OK <br>");
                  
                } else {
                  printf("Nom not OK, otenue : %s; attendu : %s", $expected->getNom(), $value->getNom());
                  throw new Exception("Lecture Nom du coach N°966 incorrecte");
                }

if ($expected->getPrenom() == $value->getPrenom()) {
                    printf("Prenom OK <br>");
                    
                  } else {
                    printf("Prenom not OK, otenue : %s; attendu : %s", $expected->getPrenom(), $value->getPrenom());
                    throw new Exception("Lecture Prenom du coach N°966 incorrecte");
                  }



        if ($expected->getMail() == $value->getMail()) {
                      printf("Mail OK <br>");
                      
                    } else {
                      printf("Mail not OK, otenue : %s; attendu : %s", $expected->getMail(), $value->getMail());
                      throw new Exception("Lecture Mail du coach N°966 incorrecte");
                    }


if ($expected->getTelephone() == $value->getTelephone()) {
                        printf("Telephone OK <br>");
                        
                      } else {
                        printf("Telephone not OK, otenue : %s; attendu : %s", $expected->getTelephone(), $value->getTelephone());
                        throw new Exception("Lecture Telephone du coach N°966 incorrecte");
                      }


if ($expected->getAge() == $value->getAge()) {
                          printf("Age OK <br>");
                          
                        } else {
                          printf("Age not OK, otenue : %s; attendu : %s", $expected->getAge(), $value->getAge());
                          throw new Exception("Lecture Age du coach N°966 incorrecte");
                        }


if ($dao->verifierLogin('adresse-coach@gmail.com', 'motdepassecoach')) {
                            printf("Mot de passe OK <br>");
                            printf("Tout OK <br>");
                          } else {
                            printf("Adresse mail not OK, otenue : %s; attendu : %s", $expected->getAge(), $value->getAge());
                            throw new Exception("Lecture Age du coach N°966 incorrecte");
                          }


  } catch (Exception $e) {
  print("\n*** Erreur ***\n");
  print("Erreur : ".$e->getMessage()."\n");
}




 ?>
