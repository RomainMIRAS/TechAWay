<?php
require_once(__DIR__.'/../model/DAO.class.php');
require_once(__DIR__.'/../model/Competence.class.php');

try{
  $db = DAO::get();//138.68.96.182

}catch (Exception $e) {
  print("\n*** Erreur ***\n");
  print("Erreur : ".$e->getMessage()."\n");
}




try {
  $dao = new DAO(); // Instancie l'objet DAO


  //Test de la récupération d'un compétence
  print("Accès à un compétence : <br>");
  
  $expected = new Competence(4, 'IUT 2', 'Anglais, Francais, Russian', 'C++,Java,Css,HTML,Javascript'); // competence attendue
  printf("%S <br>", $expected->getNvEtude);
  $value = $dao->getCompetence(4); // On prend la competence d'id 4


              if ($expected->getId() == $value->getId()) {
                printf("Id compétence OK <br>");
                
                    } else {
                      printf("Id compétence not OK, otenue : %s; attendu : %s", $expected->getMail(), $value->getMail());
                      throw new Exception("Lecture Id compétence de la competence N°4 incorrecte");
                    }

                    
                    if ($expected->getNvEtude() == $value->getNvEtude()) {
                  printf("Niveau d'étude OK <br>");
                  
                      } else {
                        printf("Niveau d'étude not OK, otenue : %s; attendu : %s", $expected->getTelephone(), $value->getTelephone());
                        throw new Exception("Lecture Niveau d'étude de la competence N°4 incorrecte");
                      }


if ($expected->langeParle() == $value->langeParle()) {
                    printf("Langue parler OK <br>");
                    
                        } else {
                          printf("Langue not OK, otenue : %s; attendu : %s", $expected->getAge(), $value->getAge());
                          throw new Exception("Lecture Langue de la competence N°4 incorrecte");
                        }


if ($expected->getLangageAcquis() == $value->getLangageAcquis()) {
                      printf("Langage  OK <br>");
                        }else {
                            printf("Langage not OK, otenue : %s; attendu : %s", $expected->getLangageAcquis(), $value->getLangageAcquis());
                            throw new Exception("Lecture Langage de la competence N°4 incorrecte");
                          }

  } catch (Exception $e) {
  print("\n*** Erreur ***\n");
  print("Erreur : ".$e->getMessage()."\n");
}




 ?>
