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

        <img id="img-profil" src="../view/design/img/profil.png" alt="">

        <?php if (is_a($_SESSION['utilisateur'],"Candidat")): ?> <!-- si l'utilisateur est un candidat -->
          <p>Vous êtes à l'étape n°<?= $_SESSION['utilisateur']->getEtape() ?></p>
          <div id="btn-profil-container">
            <button id="btn-rens" class="btn-menu-profil">Mes renseignements</button>
            <button id="btn-comp" class="btn-menu-profil">Mes compétences</button>
            <button id="btn-pref" class="btn-menu-profil">Mes préférences</button>
            <button id="btn-docs" class="btn-menu-profil">Mes documents</button>
          </div>
        <?php endif; ?>
      </section>
      <section class="section-profil">
        <!-- Formulaire de renseignements -->
        <form action="" class="form" id="form-rens">
          <label for="">Nom *</label>
          <input type="text" value="<?= $_SESSION['utilisateur']->getNom() ?>" disabled>
          <label for="">Prénom *</label>
          <input type="text" value="<?= $_SESSION['utilisateur']->getPrenom() ?>" disabled>
          <label for="">Adresse mail *</label>
          <input type="text" value="<?= $_SESSION['utilisateur']->getMail() ?>" disabled>
          <label for="">Téléphone *</label>
          <input type="text" value="<?= $_SESSION['utilisateur']->getTelephone() ?>" disabled>
          <?php if (is_a($_SESSION['utilisateur'],"Candidat")): ?>
            <label for="">Pays *</label>
            <input type="text" value="<?= $_SESSION['utilisateur']->getPays() ?>" disabled>
          <?php endif; ?>
          <?php if (is_a($_SESSION['utilisateur'],"Candidat")): ?>
            <label for="">Ville *</label>
            <input type="text" value="<?= $_SESSION['utilisateur']->getVille() ?>" disabled>
          <?php endif; ?>
          <?php if (is_a($_SESSION['utilisateur'],"Candidat")): ?>
            <label for="">Date de création *</label>
            <input type="text" value="<?= $_SESSION['utilisateur']->getDateCreation() ?>" disabled>
          <?php endif; ?>
          <button type="submit">Enregistrer</button>
          <span class="asterisque">* : ces entrées ne sont pas modifiable directement. Veuillez contacter l'équipe de Tech A Way.</span>
        </form>

        <!-- Formulaire de compétences -->
        <?php if (is_a($_SESSION['utilisateur'],"Candidat")): ?> <!-- formulaire qui concerne uniquement le candidat -->
          <form action="" class="form" id="form-comp">
            <label for="">Niveau d'études *</label>
            <input type="text" value="<?= $_SESSION['utilisateur']->getCompetenceAcquis()->getNvEtude() ?>" disabled>
            <label for="">Langue(s) parlée(s)</label>
            <div class="list-check"> <!-- Liste des langues -->
              <?php foreach($langues as $l): ?>
                <?php if ($l==$_SESSION['utilisateur']->getCompetenceAcquis()->getLangeParle()): ?>
                  <input type="checkbox" name="langueParle[]" value="<?php echo strtolower($l) ?>"><?= $l ?></option>
                <?php else: ?>
                  <input type="checkbox" name="langueParle[]" value="<?php echo strtolower($l) ?>"><?= $l ?></option>
                <?php endif; ?>
              <?php endforeach; ?>
            </div>
            <label for="">Langage(s) informatique(s)</label>
            <div class="list-check"> <!-- Liste des langages -->
              <input type="checkbox" name="languageAquis[]" value="php" selected>PHP</option>
              <input type="checkbox" name="languageAquis[]" value="hmtl/css" >HTML/CSS</option>
              <input type="checkbox" name="languageAquis[]" value="c" >C#, C ou C++</option>
              <input type="checkbox" name="languageAquis[]" value="python" >Python</option>
              <input type="checkbox" name="languageAquis[]" value="perl">PERL</option>
              <input type="checkbox" name="languageAquis[]" value="java">Java</option>
              <input type="checkbox" name="languageAquis[]" value="ruby">Ruby</option>
              <input type="checkbox" name="languageAquis[]" value="swift">Swift</option>
              <input type="checkbox" name="languageAquis[]" value="julia">Julia</option>
              <input type="checkbox" name="languageAquis[]" value="scala">Scala</option>
            </div>
            <button type="submit">Enregistrer</button>
            <span class="asterisque">* : ces entrées ne sont pas modifiable directement. Veuillez contacter l'équipe de Tech A Way.</span>
          </form>

          <!-- Formulaire de preferences -->
          <form action="" class="form" id="form-pref">
            <label for="">Travailler à l'étranger ?</label>
            <div class="list-radio">
              <input type="radio" name="travEtranger" value=true>
              <label for="oui">Oui</label>
              <input type="radio" name="travEtranger" value=false>
              <label for="oui">Non</label>
            </div>
            <label for="">Secteur(s) d'activité(s)</label>
            <select name="secteur" >
                <option value="">--Veuillez choisir une option--</option>
                <option value="Informatique">Informatique</option>
                <option value="Autre">Autre</option>
            </select>
            <label for="">Contrat recherché</label>
            <input type="text" value="<?= $_SESSION['utilisateur']->getRenseignement()->getTypeContrat() ?>">
            <label for="">Poste recherché</label>
            <input type="text" value="<?= $_SESSION['utilisateur']->getRenseignement()->getPoste() ?>">
            <label for="">Type d'entreprise recherché</label>
            <input type="text" value="<?= $_SESSION['utilisateur']->getRenseignement()->getTypeEntreprise() ?>">
            <button type="submit">Enregistrer</button>
            <span class="asterisque">* : ces entrées ne sont pas modifiable directement. Veuillez contacter l'équipe de Tech A Way.</span>
          </form>

          <!-- Formulaire de documents -->
          <form action="" class="form" id="form-docs">
            <label for="">Nom</label>
            <input type="text" value="<?= $_SESSION['utilisateur']->getNom() ?>" disabled>
            <label for="">Prénom</label>
            <input type="text" value="<?= $_SESSION['utilisateur']->getPrenom() ?>" disabled>
            <label for="">Adresse mail</label>
            <input type="text" value="<?= $_SESSION['utilisateur']->getMail() ?>" disabled>
            <button type="submit">Enregistrer</button>
            <span class="asterisque">* : ces entrées ne sont pas modifiable directement. Veuillez contacter l'équipe de Tech A Way.</span>
          </form>
        <?php endif; ?>

      </section>

    </main>

    <!-- FOOTER -------------------------------------------------------------------------------->
    <?php include_once('../view/design/footer.php'); ?>



  </body>

  <script src="../framework/jquery-3.6.0.min.js"></script>
        <script>
          $(window).ready(function() {
            /* on cache les formulaires */
            $("#form-rens").show();
            $("#btn-rens").css("color","var(--color-black)");
            $("#btn-rens").css("border", "1px solid var(--color-black)");
            $("#form-comp").hide();
            $("#form-pref").hide();
            $("#form-docs").hide();

            /* si bouton 'mes renseignements' est cliqué  */
            $("#btn-rens").click(function() {
              $("#form-pref").hide();
              $("#form-comp").hide();
              $("#form-docs").hide();
              $("#form-rens").show();
              $("#btn-rens").css("color","var(--color-black)");
              $("#btn-rens").css("border", "1px solid var(--color-black)");
            });

            /* si bouton 'mes compétences' est cliqué  */
            $("#btn-comp").click(function() {
              $("#form-rens").hide();
              $("#form-pref").hide();
              $("#form-docs").hide();
              $("#form-comp").show();
              $("#btn-rens").css("color","var(--color-grey)");
              $("#btn-rens").css("border", "1px solid var(--color-grey)");
            });

            /* si bouton 'mes préférences' est cliqué */
            $("#btn-pref").click(function() {
              $("#form-rens").hide();
              $("#form-comp").hide();
              $("#form-docs").hide();
              $("#form-pref").show();
              $("#btn-rens").css("color","var(--color-grey)");
              $("#btn-rens").css("border", "1px solid var(--color-grey)");
            });

            /* si bouton 'mes documents' est cliqué  */
            $("#btn-docs").click(function() {
              $("#form-rens").hide();
              $("#form-comp").hide();
              $("#form-pref").hide();
              $("#form-docs").show();
              $("#btn-rens").css("color","var(--color-grey)");
              $("#btn-rens").css("border", "1px solid var(--color-grey)");
            });

            /*$("#img-profil-config").hide();
            $("#img-profil").click(function() {
              $("#img-profil-config").toggle();
            });*/

          });
        </script>

</html>
