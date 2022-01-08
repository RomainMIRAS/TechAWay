<?php
require_once(__DIR__.'/../model/DAO.class.php');


try{
  $db = DAO::get();
  
  //Test de la methode getEmails de DAO
  $liste = $db->getEmails();
  echo '<pre>' . var_export($liste, true) . '</pre>';

  //Test de Creation d'utilisateur;
  echo "Creation d'utilisateur : adresse-candidat@gmail.com:motdepassecandidat:  (doit retourner un erreur car il existe deja)";
  $test = $db->createUtilisateur("adresse-11candidat@gmail.com","motdepassecandidat");

  if ($test){
    echo "</br>Utilisateur Cree :</br>";
  }else{
    echo "</br>Erreur Utilisateur existe deja";
  }

  echo '<hr>';

  echo "Creation d'utilisateur : adresse-candidat@gmail.com:motdepassecandidat:  (doit retourner un erreur car il existe deja)";
  $test = $db->createUtilisateur("adresse-candidat2@gmail.com","motdepassecandidat");

  if ($test){
    echo "</br>Utilisateur Cree :</br>";
  }else{
    echo "</br>Erreur Utilisateur existe deja";
  }

  echo '<hr>';

  //Test de la methode VeriferLogin, C'est qui permet de se Login.
  echo "</br>Verification de Login : adresse-candidat@gmail.com:motdepassecandidat  : (doit etre correcte)";
  $testLogin = $db->verifierLogin("adresse-candidat@gmail.com","motdepassecandidat");
  if ($testLogin){
    echo "</br>Login Correcte</br>";
  }else{
    echo "</br>Login incorrecte</br>";
  }

  echo '<hr>';

  echo "</br>Verification de Login : adresse-candidat@gmail.com:motdepassecandidat2  : (doit etre incorrecte car mdp different)";
  $testLogin = $db->verifierLogin("adresse-candidat@gmail.com","motdepassecandidat2");
  if ($testLogin){
    echo "</br>Login Correcte</br>";
  }else{
    echo "</br>Login incorrecte</br>";
  }

  echo '<hr>';

  echo "</br>Verification de Login : adresse-candidat2@gmail.com:motdepassecandidat  : (doit etre incorrecte car email inexistant)";
  $testLogin = $db->verifierLogin("adresse-candidat2@gmail.com","motdepassecandidat");
  if ($testLogin){
    echo "</br>Login Correcte</br>";
  }else{
    echo "</br>Login incorrecte</br>";
  }

  echo '<hr>';
  
  //verification de la methode getCoach() il return un Coach s'il existe, faux sinon
  echo "</br>getCoach(adressemail) : adresse-coach@gmail.com  : (doit retourner type Coach)";
  $testLogin = $db->getCoach("adresse-coach@gmail.com");
  if ($testLogin){
    echo '<pre>' . var_export($testLogin, true) . '</pre>';
  }else{
    echo "</br>False ";
  }

  echo '<hr>';

  //verification de la methode getCandidat() il return un Candidat s'il existe, faux sinon
  echo "</br>getCandidat(adressemail) : adresse-candidat@gmail.com  : (doit retourner type Candidat)";
  $testLogin = $db->getCandidat("adresse-candidat@gmail.com");
  if ($testLogin){
    echo '<pre>' . var_export($testLogin, true) . '</pre>';
  }else{
    echo "</br>False ";
  }

  echo '<hr>';

  //Test de fonction getCoachOuCandidat qu il return un coach ou candidat dependant de son type automatiquement
  echo "</br>getCoachOuCandidat(adressemail) : adresse-candidat@gmail.com  : (doit retourner type Candidat)";
  $testLogin = $db->getCoachOuCandidat("adresse-candidat@gmail.com","motdepassecandidat");
  if ($testLogin){
    echo '<pre>' . var_export($testLogin, true) . '</pre>';
  }else{
    echo "</br>False ";
  }

  echo '<hr>';

  echo "</br>getCoachOuCandidat(adressemail) : adresse-coach@gmail.com  : (doit retourner type Coach)";
  $testLogin = $db->getCoachOuCandidat("adresse-coach@gmail.com","motdepassecoach");
  if ($testLogin){
    echo '<pre>' . var_export($testLogin, true) . '</pre>';
  }else{
    echo "</br>False ";
  }

  echo '<hr>';

  echo "</br>getCompetence(adressemail) : adresse-candidat@gmail.com doit retourner type Competence de l'utilisateur d'adressemail adresse-candidat@gmail.com";
  $testLogin = $db->getCompetence("adresse-candidat@gmail.com");
  if ($testLogin){
    echo '<pre>' . var_export($testLogin, true) . '</pre>';
  }else{
    echo "</br>False ";
  }

  echo '<hr>';

  echo "</br>getRenseignement(adressemail) : adresse-candidat@gmail.com doit retourner type Renseignement de l'utilisateur d'adressemail adresse-candidat@gmail.com";
  $testLogin = $db->getRenseignement("adresse-candidat@gmail.com");
  if ($testLogin){
    echo '<pre>' . var_export($testLogin, true) . '</pre>';
  }else{
    echo "</br>False ";
  }

  echo '<hr>';

  echo "</br>getEntreprise(idEntreprise) :  1  : doit retourner type Entreprise de id 1";
  $testLogin = $db->getEntreprise(3);
  if ($testLogin){
    echo '<pre>' . var_export($testLogin, true) . '</pre>';
  }else{
    echo "</br>False ";
  }
  echo '<hr>';

  echo "</br>creeEntreprise('entreprise@mail.com')  : doit retourner true";
  $testLogin = $db->creeEntreprise('entreprise@mail.com');
  if ($testLogin){
    echo '<pre>' . var_export($testLogin, true) . '</pre>';
  }else{
    echo "</br>False ";
  }

  echo '<hr>';

  echo "</br>getEntreprises() :  doit retourner toutes les entreprises de type Offre ";
  $testLogin = $db->getEntreprises();
  if ($testLogin){
    echo '<pre>' . var_export($testLogin, true) . '</pre>';
  }else{
    echo "</br>False ";
  }

  echo '<hr>';

  echo "</br>getOffre(4) :  4  : doit retourner type Offre de id 4";
  $testLogin = $db->getOffre(4);
  if ($testLogin){
    echo '<pre>' . var_export($testLogin, true) . '</pre>';
  }else{
    echo "</br>False ";
  }

  echo '<hr>';
  $langP = array("anglais","francais");
  $langA = array("react","angular","scss","sass","javascript");  
  $rens = new Renseignement(-2,true, 'web-dev', 'CDI', 'Dynamic Websites,3d animations, fast', 'Grande');
  $comp = new Competence(-2,'bac+3', 'anglais,francais', 'react,angular,scss,sass');
  echo "</br>creeOffre(idEntreprise, Rensegnement,Competence,nomOffre)  : doit retourner true";
  $testLogin = $db->creeOffre(4,$rens,$comp,"Back-End - WebApp");
  if ($testLogin){
    echo '<pre>' . var_export($testLogin, true) . '</pre>';
  }else{
    echo "</br>False ";
  }

  echo '<hr>';

  echo '<hr>';

  echo "</br>getOffres() :  doit retourner toutes les offres de type Offre ";
  $testLogin = $db->getOffres();
  if ($testLogin){
    echo '<pre>' . var_export($testLogin, true) . '</pre>';
  }else{
    echo "</br>False ";
  }

  echo '<hr>';

  //Un echo de getEmails
  echo "</br></br> Liste de Mail :";
  $liste = $db->getEmails();

  echo '<pre>' . var_export($liste, true) . '</pre>';
  echo "</br>";
}catch (Exception $e) {
  print("\n*** Erreur ***\n");
  print("Erreur : ".$e->getMessage()."\n");
}


 ?>
