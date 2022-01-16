
<?php
require_once(__DIR__.'/../model/DAO.class.php');

try{
  $db = DAO::get();//138.68.96.182

}catch (Exception $e) {
  print("\n*** Erreur ***\n");
  print("Erreur : ".$e->getMessage()."\n");
}




try {


  //Test de la récupération d'un compétence
  print("Accès à une offre : <br>");
  
  $entre = $db->getEntreprise(2);
  $compet = $db->getCompetence(2);
  $rensei = $db->getRenseignement(2);
  $expected = new Offre(2, 'Front-End Developer', '2022-01-08', $entre, $compet, $rensei); // competence attendue
  $value = $db->getOffre(2); // On prend la competence d'id 4


              if ($expected->getId() == $value->getId()) {
                printf("Id compétence OK <br>");
                
                    } else {
                      printf("Id compétence not OK, otenue : %s; attendu : %s", $expected->getId(), $value->getId());
                      throw new Exception("Lecture Id compétence de la competence N°4 incorrecte");
                    }

                    if ($expected->getNomOffre() == $value->getNomOffre()) {
                    printf("Langue parler OK <br>");
                    
                        } else {
                          printf("Langue not OK, otenue : %s; attendu : %s", $expected->getNomOffre(), $value->getNomOffre());
                          throw new Exception("Lecture Langue de la competence N°4 incorrecte");
                        }

                        
if ($expected->getDateOffre() == $value->getDateOffre()) {
                  printf("Niveau d'étude OK <br>");
                  
                      } else {
                        printf("Niveau d'étude not OK, otenue : %s; attendu : %s", $expected->getDateOffre(), $value->getDateOffre());
                        throw new Exception("Lecture Niveau d'étude de la competence N°4 incorrecte");
                      }

if ($expected->getDetailOffre() == $value->getDetailOffre()) {
                      printf("Langage  OK <br>");
                        }else {
                            printf("Langage not OK, otenue : %s; attendu : %s", $expected->getDetailOffre(), $value->getDetailOffre());
                            throw new Exception("Lecture Langage de la competence N°4 incorrecte");
                          }

                          if ($expected->getCompetenceRecherche() == $value->getCompetenceRecherche()) {
                      printf("Langage  OK <br>");
                        }else {
                            printf("Langage not OK, otenue : %s; attendu : %s", $expected->getCompetenceRecherche(), $value->getCompetenceRecherche());
                            throw new Exception("Lecture Langage de la competence N°4 incorrecte");
                          }

                          if ($expected->getEntreprise() == $value->getEntreprise()) {
                      printf("Langage  OK <br>");
                        }else {
                            printf("Langage not OK, otenue : %s; attendu : %s", $expected->getEntreprise(), $value->getEntreprise());
                            throw new Exception("Lecture Langage de la competence N°4 incorrecte");
                          }

  } catch (Exception $e) {
  print("\n*** Erreur ***\n");
  print("Erreur : ".$e->getMessage()."\n");
}




 ?>

