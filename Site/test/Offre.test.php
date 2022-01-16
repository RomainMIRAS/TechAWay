
<?php
////////////////////////////////////////////////////////////////////
//Test de la classe Offre
////////////////////////////////////////////////////////////////////

require_once(__DIR__.'/../model/DAO.class.php');

try{
  $db = DAO::get();//138.68.96.182

}catch (Exception $e) {
  print("\n*** Erreur ***\n");
  print("Erreur : ".$e->getMessage()."\n");
}




try {


  //Test de la récupération d'une offre
  print("Accès à une offre : <br>");
  
  $entre = $db->getEntreprise(2);
  $compet = $db->getCompetence(2);
  $rensei = $db->getRenseignement(2);
  $expected = new Offre(2, 'Front-End Developer', '2022-01-08', $entre, $compet, $rensei); // offre attendue
  $value = $db->getOffre(2); // offre témoin


//On test toutes les fonctions en comparant les résultats obtenue de ceux attendue

              if ($expected->getId() == $value->getId()) {
                printf("Id offre OK <br>");
                
                    } else {
                      printf("Id offre not OK, otenue : %s; attendu : %s", $expected->getId(), $value->getId());
                      throw new Exception("Lecture Id de la offre N°2 incorrecte");
                    }

                    if ($expected->getNomOffre() == $value->getNomOffre()) {
                    printf("Nom OK <br>");
                    
                        } else {
                          printf("Nom not OK, otenue : %s; attendu : %s", $expected->getNomOffre(), $value->getNomOffre());
                          throw new Exception("Lecture Nom de la offre N°2 incorrecte");
                        }

                        
if ($expected->getDateOffre() == $value->getDateOffre()) {
                  printf("Date OK <br>");
                  
                      } else {
                        printf("Date not OK, otenue : %s; attendu : %s", $expected->getDateOffre(), $value->getDateOffre());
                        throw new Exception("Lecture Date de la offre N°2 incorrecte");
                      }

if ($expected->getDetailOffre() == $value->getDetailOffre()) {
                      printf("DetailOffre  OK <br>");
                        }else {
                            printf("DetailOffre not OK, otenue : %s; attendu : %s", $expected->getDetailOffre(), $value->getDetailOffre());
                            throw new Exception("Lecture DetailOffre de la offre N°2 incorrecte");
                          }

                          if ($expected->getCompetenceRecherche() == $value->getCompetenceRecherche()) {
                      printf("CompetenceRecherche  OK <br>");
                        }else {
                            printf("CompetenceRecherche not OK, otenue : %s; attendu : %s", $expected->getCompetenceRecherche(), $value->getCompetenceRecherche());
                            throw new Exception("Lecture CompetenceRecherche de la offre N°2 incorrecte");
                          }

                          if ($expected->getEntreprise() == $value->getEntreprise()) {
                      printf("Entreprise  OK <br>");
                        }else {
                            printf("Entreprise not OK, otenue : %s; attendu : %s", $expected->getEntreprise(), $value->getEntreprise());
                            throw new Exception("Lecture Entreprise de la offre N°2 incorrecte");
                          }
printf("<br>Tout est OK ! ");
  } catch (Exception $e) { //si il y a erreur on affiche le message d'erreur correspondant
  print("\n*** Erreur ***\n");
  print("Erreur : ".$e->getMessage()."\n");
}




 ?>

