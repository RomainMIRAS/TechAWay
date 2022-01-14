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
            <!--<button id="btn-docs" class="btn-menu-profil">Mes documents</button> pas le temps de developper cette partie --> 
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
                <?php if (in_array($l,$_SESSION['utilisateur']->getCompetenceAcquis()->getLangeParle())): ?>
                  <input type="checkbox" name="langueParle[]" value="<?php echo strtolower($l) ?>" checked><?php echo ucfirst($l) ?></option>
                <?php else: ?> 
                  <input type="checkbox" name="langueParle[]" value="<?php echo strtolower($l) ?>"><?php echo ucfirst($l) ?></option>
                <?php endif; ?>
              <?php endforeach; ?>
            </div>
            <label for="">Langage(s) informatique(s)</label>
            <div class="list-check"> <!-- Liste des langages -->
              <?php foreach($langages as $l): ?>
                <?php if (in_array($l,$_SESSION['utilisateur']->getCompetenceAcquis()->getLangageAcquis())): ?>
                  <input type="checkbox" name="languageAquis[]" value="<?php echo strtolower($l) ?>" checked><?php echo ucfirst($l) ?></option>
                <?php else: ?> 
                  <input type="checkbox" name="languageAquis[]" value="<?php echo strtolower($l) ?>"><?php echo ucfirst($l) ?></option>
                <?php endif; ?>
              <?php endforeach; ?>
            </div>
            <button type="submit">Enregistrer</button>
            <span class="asterisque">* : ces entrées ne sont pas modifiable directement. Veuillez contacter l'équipe de Tech A Way.</span>
          </form>

          <!-- Formulaire de preferences -->
          <form action="" class="form" id="form-pref">
            <label for="">Travailler à l'étranger ?</label>
            <div class="list-radio">
              <?php if ($_SESSION['utilisateur']->getRenseignement()->getTravEtranger()==true): ?>
                <input type="radio" name="travEtranger" value=true checked>
              <?php else: ?>
                <input type="radio" name="travEtranger" value=true>
              <?php endif; ?>
              <label for="oui">Oui</label>
              <?php if ($_SESSION['utilisateur']->getRenseignement()->getTravEtranger()==false): ?>
                <input type="radio" name="travEtranger" value=false checked>
              <?php else: ?>
                <input type="radio" name="travEtranger" value=false>
              <?php endif; ?>
              <label for="oui">Non</label>
            </div>
            <label for="">Secteur(s) d'activité(s)</label>
            <select name="secteur" >
              <?php foreach($secteurs as $s): ?>
                <?php if ($s==$_SESSION['utilisateur']->getRenseignement()->getSecteur()): ?>
                <option value="<?= $s ?>" selected><?= $s ?></option>
                <?php else: ?>
                <option value="<?= $s ?>"><?= $s ?></option>
                <?php endif; ?>
              <?php endforeach; ?>
            </select>
            <label for="">Contrat recherché</label>
            <select name="typeContrat" >
            <?php foreach($contrats as $c): ?>
                <?php if ($c==$_SESSION['utilisateur']->getRenseignement()->getTypeContrat()): ?>
                <option value="<?= $c ?>" selected><?php echo strtoupper($c) ?></option>
                <?php else: ?>
                <option value="<?= $c ?>"><?php echo strtoupper($c) ?></option>
                <?php endif; ?>
              <?php endforeach; ?>
            </select>
            <label for="">Poste recherché</label>
            <select name="poste" >
            <?php foreach($postes as $p): ?>
                <?php if ($p==$_SESSION['utilisateur']->getRenseignement()->getPoste()): ?>
                <option value="<?= $p ?>" selected><?php echo ucfirst($p) ?></option>
                <?php else: ?>
                <option value="<?= $p ?>"><?php echo ucfirst($p) ?></option>
                <?php endif; ?>
              <?php endforeach; ?>
            </select>
            <label for="">Type d'entreprise recherché</label>
            <select name="poste" >
            <?php foreach($entreprises as $e): ?>
                <?php if ($e==$_SESSION['utilisateur']->getRenseignement()->getTypeEntreprise()): ?>
                <option value="<?= $e ?>" selected><?php echo ucfirst($e) ?></option>
                <?php else: ?>
                <option value="<?= $e ?>"><?php echo ucfirst($e) ?></option>
                <?php endif; ?>
              <?php endforeach; ?>
            </select>
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
            

          });
        </script>

</html>
