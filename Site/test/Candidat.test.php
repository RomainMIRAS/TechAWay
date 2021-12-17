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


  //Test de la récupération d'un candidat
  print("Accès à un candidat : <br>");
  $expected = new Candidat('adresse-candidat@gmail.com', 'motdepassecandidat'); // Candidat attendue


  $value = $dao->getCandidat('adresse-candidat@gmail.com'); // On prend le candidat d'id 966

if ($expected->getPays() == $value->getPays()) {
  printf("Pays OK <br>");
} else {
  printf("Pays not OK, otenue : %s; attendu : %s", $expected->getPays(), $value->getPays());
  throw new Exception("Lecture Pays du candidat N°966 incorrecte");
}


if ($expected->getVille() == $value->getVille()) {
    printf("Ville OK <br>");
    
  } else {
    printf("Ville not OK, otenue : %s; attendu : %s", $expected->getVille(), $value->getVille());
    throw new Exception("Lecture Ville du candidat N°966 incorrecte");
  }

if ($expected->getLienCv() == $value->getLienCv()) {
      printf("LienCv OK <br>");
      
    } else {
      printf("LienCv not OK, otenue : %s; attendu : %s", $expected->getLienCv(), $value->getLienCv());
      throw new Exception("Lecture LienCv du candidat N°966 incorrecte");
    }


if ($expected->getLienLM() == $value->getLienLM()) {
          printf("LienLM OK <br>");
                
              } else {
          printf("LienLM not OK, otenue : %s; attendu : %s", $expected->getLienLM(), $value->getLienLM());
          throw new Exception("Lecture LienLM du candidat N°966 incorrecte");
        }

if ($expected->getEtape() == $value->getEtape()) {
        printf("Etape OK <br>");
        
      } else {
        printf("Etape not OK, otenue : %s; attendu : %s", $expected->getEtape(), $value->getEtape());
        throw new Exception("Lecture Etape du candidat N°966 incorrecte");
      }

if ($expected->getNom() == $value->getNom()) {
                  printf("Nom OK <br>");
                  
                } else {
                  printf("Nom not OK, otenue : %s; attendu : %s", $expected->getNom(), $value->getNom());
                  throw new Exception("Lecture Nom du candidat N°966 incorrecte");
                }

if ($expected->getPrenom() == $value->getPrenom()) {
                    printf("Prenom OK <br>");
                    
                  } else {
                    printf("Prenom not OK, otenue : %s; attendu : %s", $expected->getPrenom(), $value->getPrenom());
                    throw new Exception("Lecture Prenom du candidat N°966 incorrecte");
                  }

if ($expected->getMail() == $value->getMail()) {
                      printf("Mail OK <br>");
                      
                    } else {
                      printf("Mail not OK, otenue : %s; attendu : %s", $expected->getMail(), $value->getMail());
                      throw new Exception("Lecture Mail du candidat N°966 incorrecte");
                    }

if ($expected->getTelephone() == $value->getTelephone()) {
                        printf("Telephone OK <br>");
                        
                      } else {
                        printf("Telephone not OK, otenue : %s; attendu : %s", $expected->getTelephone(), $value->getTelephone());
                        throw new Exception("Lecture Telephone du candidat N°966 incorrecte");
                      }


if ($expected->getAge() == $value->getAge()) {
                          printf("Age OK <br>");
                          
                        } else {
                          printf("Age not OK, otenue : %s; attendu : %s", $expected->getAge(), $value->getAge());
                          throw new Exception("Lecture Age du candidat N°966 incorrecte");
                        }


if ($dao->verifierLogin('adresse-candidat@gmail.com', 'motdepassecandidat')) {
                            printf("Mot de passe OK <br>");
                            printf("Tout OK <br>");
                          } else {
                            printf("Age not OK, otenue : %s; attendu : %s", $expected->getAge(), $value->getAge());
                            throw new Exception("Lecture Age du candidat N°966 incorrecte");
                          }

  } catch (Exception $e) {
  print("\n*** Erreur ***\n");
  print("Erreur : ".$e->getMessage()."\n");
}




 ?>
