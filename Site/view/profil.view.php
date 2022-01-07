<?php
  include_once(__DIR__."/../model/Candidat.class.php");
  include_once(__DIR__."/../model/Utilisateur.class.php");
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- TITLE -->
    <title>Tech A Way</title>

    <!-- ICON -->
    <link rel="icon" href="../view/design/img/logo-nav-bar.png">

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="../view/design/style.css">

    <!-- GOOGLE FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"> 

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      
  </head>
  <body>

    <!-- NAVIGATION ---------------------------------------------------------------------------->
    <?php include_once('../view/design/navigation.php'); ?>

    <!-- MAIN ---------------------------------------------------------------------------------->
    <main>

      <section class="section-profil">
        <img id="img-profil" src="../view/design/img/profil.jpg" alt="">
        <p>Vous êtes à l'étape n°<?= $_SESSION['utilisateur']->getEtape() ?></p>
        <div id="btn-profil-container">
          <button id="btn-rens">Mes renseignements</button>
          <button id="btn-comp">Mes compétences</button>
          <button id="btn-pref">Mes préférences</button>
          <button id="btn-docs">Mes documents</button>
        </div>
      </section>
      <section class="section-profil">
        <!-- Formulaire de renseignements -->
        <form action="" class="form" id="form-rens">
          <label for="">Nom</label>
          <input type="text" value="<?= $_SESSION['utilisateur']->getNom() ?>" disabled>
          <label for="">Prénom</label>
          <input type="text" value="<?= $_SESSION['utilisateur']->getPrenom() ?>" disabled>
          <label for="">Adresse mail</label>
          <input type="text" value="<?= $_SESSION['utilisateur']->getMail() ?>" disabled>
          <label for="">Téléphone</label>
          <input type="text" value="<?= $_SESSION['utilisateur']->getTelephone() ?>" disabled>
          <label for="">Pays</label>
          <input type="text" value="<?= $_SESSION['utilisateur']->getPays() ?>" disabled>
          <label for="">Ville</label>
          <input type="text" value="<?= $_SESSION['utilisateur']->getVille() ?>" disabled>
          <label for="">Date de création</label>
          <input type="text" value="<?= $_SESSION['utilisateur']->getDateCreation() ?>" disabled>
          <button type="submit">Enregistrer</button>
        </form>

        <!-- Formulaire de compétences
        <form action="" class="form" id="form-comp">
          <label for="">Niveau d'études</label>
          <input type="text" value="<?= $_SESSION['utilisateur']->getCompetenceAcquis()->getNvEtude() ?>">
          <label for="">Langue(s) parlée(s)</label>
          <input type="text" value="<?= $_SESSION['utilisateur']->getCompetenceAcquis()->getLangeParle() ?>" disabled>
          <label for="">Langage(s) informatique(s)</label>
          <input type="text" value="<?= $_SESSION['utilisateur']->getCompetenceAcquis()->getLangageAcquis() ?>" disabled>
          <button type="submit">Enregistrer</button>
        </form>-->

        <!-- Formulaire de preferences 
        <form action="" class="form" id="form-pref">
          <label for="">Travailler à l'étranger ?</label>
          <input type="text" value="<?= $_SESSION['utilisateur']->getRenseignement()->getTravEtranger() ?>">
          <label for="">Secteur(s) d'activité(s)</label>
          <input type="text" value="<?= $_SESSION['utilisateur']->getRenseignement()->getSecteur() ?>">
          <label for="">Contrat recherché</label>
          <input type="text" value="<?= $_SESSION['utilisateur']->getRenseignement()->getTypeContrat() ?>">
          <label for="">Poste recherché</label>
          <input type="text" value="<?= $_SESSION['utilisateur']->getRenseignement()->getPoste() ?>">
          <label for="">Type d'entreprise recherché</label>
          <input type="text" value="<?= $_SESSION['utilisateur']->getRenseignement()->getTypeEntreprise() ?>">
          <button type="submit">Enregistrer</button>
        </form>-->

        <!-- Formulaire de documents -->
        <form action="" class="form" id="form-docs">
          <label for="">Nom</label>
          <input type="text" value="<?= $_SESSION['utilisateur']->getNom() ?>" disabled>
          <label for="">Prénom</label>
          <input type="text" value="<?= $_SESSION['utilisateur']->getPrenom() ?>" disabled>
          <label for="">Adresse mail</label>
          <input type="text" value="<?= $_SESSION['utilisateur']->getMail() ?>" disabled>
          <button type="submit">Enregistrer</button>
        </form>

      </section>

    </main>

    <!-- FOOTER -------------------------------------------------------------------------------->
    <?php include_once('../view/design/footer.php'); ?>


  </body>

  <script src="../framework/jquery-3.6.0.min.js"></script>
        <script>
          $(window).ready(function() {
            /* on cache les formulaires */
            $("#form-rens").hide();
            /*$("#form-comp").hide();
            $("#form-pref").hide();*/
            $("#form-docs").hide();

            /* si bouton 'mes renseignements' est cliqué  */
            $("#btn-rens").click(function() {
              /*$("#form-pref").hide();
              $("#form-comp").hide();*/
              $("#form-docs").hide();
              $("#form-rens").toggle();
            });

            /* si bouton 'mes compétences' est cliqué  */
            /*$("#btn-comp").click(function() {
              $("#form-rens").hide();
              $("#form-pref").hide();
              $("#form-docs").hide();
              $("#form-comp").toggle();
            });

            /* si bouton 'mes préférences' est cliqué  
            $("#btn-pref").click(function() {
              $("#form-rens").hide();
              $("#form-comp").hide();
              $("#form-docs").hide();
              $("#form-pref").toggle();
            });*/

            /* si bouton 'mes documents' est cliqué  */
            $("#btn-docs").click(function() {
              $("#form-rens").hide();
              /*$("#form-comp").hide();
              $("#form-pref").hide();*/
              $("#form-docs").toggle();
            });

          });
        </script>

</html>