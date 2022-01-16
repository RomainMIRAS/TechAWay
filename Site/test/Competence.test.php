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
  //Test de la récupération d'un compétence
  print("Accès à un compétence : <br>");
  
  $expected = new Competence(26, 'bac+3', 'anglais, francais', 'c,c++,python'); // competence attendue
  $value = $db->getCompetence(4); // On prend la competence d'id 26 (ici 4 est le lien et non l'id)


              if ($expected->getId() == $value->getId()) {
                printf("Id compétence OK <br>");
                
                    } else {
                      printf("Id compétence not OK, otenue : %s; attendu : %s", $expected->getId(), $value->getId());
                      throw new Exception("<br>Lecture Id compétence de la competence N°4 incorrecte");
                    }

                    
                    if ($expected->getNvEtude() == $value->getNvEtude()) {
                  printf("Niveau d'étude OK <br>");
                  
                      } else {
                        printf("Niveau d'étude not OK, otenue : %s; attendu : %s", $expected->getNvEtude(), $value->getNvEtude());
                        throw new Exception("<br>Lecture Niveau d'étude de la competence N°4 incorrecte");
                      }



//conversionStringArray
//

if ($db->conversionArrayString($expected->getlangeParle()) == $db->conversionArrayString($value->getlangeParle())) {
                    printf("Langue parler OK <br>");
                    
                        } else {
                          printf("%s", $db->conversionArrayString($expected->getlangeParle()));
                          printf("%s", $db->conversionArrayString($value->getlangeParle()));
                          printf("Langue not OK : <br> otenue : ");
                            foreach($value->getlangeParle() as $ll) {
                              printf("- ");
                              printf("%s", $ll);
                            }
                            printf("<br>attendue : ");
                            foreach($expected->getlangeParle() as $ll) {
                              printf("- ");
                              printf("%s", $ll);
                            }
                          throw new Exception("<br>Lecture Langue de la competence N°4 incorrecte");
                        }


if ($expected->getLangageAcquis() == $value->getLangageAcquis()) {
                      printf("Langage  OK <br>");
                        }else {
                            printf("Langage not OK, otenue : ");
                            foreach($value->getLangageAcquis() as $ll) {
                              printf("- ");
                              printf("%s", $ll);
                            }
                            printf("<br>attendue : ");
                            foreach($expected->getLangageAcquis() as $ll) {
                              printf("- ");
                              printf("%s", $ll);
                            }
                            throw new Exception("<br>Lecture Langage de la competence N°4 incorrecte");
                          }

  } catch (Exception $e) {
  print("\n*** Erreur ***\n");
  print("Erreur : ".$e->getMessage()."\n");
}




 ?>
