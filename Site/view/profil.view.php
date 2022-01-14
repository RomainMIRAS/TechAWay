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

        <?php if (is_a($candidat,"Candidat")): ?> <!-- si l'utilisateur est un candidat -->
          <p>Vous êtes à l'étape n°<?= $candidat->getEtape() ?></p>
          <div id="btn-profil-container">
            <button id="btn-rens" class="btn-menu-profil">Mes renseignements</button>
            <button id="btn-comp" class="btn-menu-profil">Mes compétences</button>
            <button id="btn-pref" class="btn-menu-profil">Mes préférences</button>
            <!-- <?php if ($candidat->getEtape() >= 2): ?>
            <button id="btn-docs" class="btn-menu-profil">Mon offre</button>
            <?php endif; ?> -->
          </div>
        <?php endif; ?>
      </section>
      <section class="section-profil">
        <!-- Formulaire de renseignements -->
        <form action="" class="form" id="form-rens">
          <label for="">Nom *</label>
          <input type="text" value="<?= $candidat->getNom() ?>" disabled>
          <label for="">Prénom *</label>
          <input type="text" value="<?= $candidat->getPrenom() ?>" disabled>
          <label for="">Adresse mail *</label>
          <input type="text" value="<?= $candidat->getMail() ?>" disabled>
          <label for="">Téléphone *</label>
          <input type="text" value="<?= $candidat->getTelephone() ?>" disabled>
          <?php if (is_a($candidat,"Candidat")): ?>
            <label for="">Pays *</label>
            <input type="text" value="<?= $candidat->getPays() ?>" disabled>
          <?php endif; $tt = $candidat->getEtape(); echo "$tt";?>
          <?php if (is_a($candidat,"Candidat")): ?>
            <label for="">Ville *</label>
            <input type="text" value="<?= $candidat->getVille() ?>" disabled>
          <?php endif; ?>
          <?php if (is_a($candidat,"Candidat")): ?>
            <label for="">Date de création *</label>
            <input type="text" value="<?= $candidat->getDateCreation() ?>" disabled>
          <?php endif; ?>
          <button type="submit">Enregistrer</button>
          <span class="asterisque">* : ces entrées ne sont pas modifiable directement. Veuillez contacter l'équipe de Tech A Way.</span>
        </form>

        <!-- Formulaire de compétences -->
        <?php if (is_a($candidat,"Candidat")): ?> <!-- formulaire qui concerne uniquement le candidat -->
          <form action="profil.ctrl.php" method="POST" class="form" id="form-comp">

            <label for="">Niveau d'études *</label>
            <input type="text" value="<?= $candidat->getCompetenceAcquis()->getNvEtude() ?>" disabled>

            <label for="">Langue(s) parlée(s)</label>
            <div class="list-check"> <!-- Liste des langues -->
              <?php foreach($langues as $l): ?>
                <?php if (in_array(strtolower($l),$candidat->getCompetenceAcquis()->getLangeParle())): ?>
                  <input type="checkbox" name="langueParle[]" value="<?php echo strtolower($l) ?>" checked><?php echo ucfirst($l) ?></option>
                <?php else: ?> 
                  <input type="checkbox" name="langueParle[]" value="<?php echo strtolower($l) ?>"><?php echo ucfirst($l) ?></option>
                <?php endif; ?>
              <?php endforeach; ?>
            </div>

            <label for="">Langage(s) informatique(s)</label>
            <div class="list-check"> <!-- Liste des langages -->
              <?php foreach($langages as $la): ?>
                <?php if (in_array(strtolower($la),$candidat->getCompetenceAcquis()->getLangageAcquis())): ?>
                  <input type="checkbox" name="languageAquis[]" value="<?php echo strtolower($la) ?>" checked><?php echo ucfirst($la) ?></option>
                <?php else: ?> 
                  <input type="checkbox" name="languageAquis[]" value="<?php echo strtolower($la) ?>"><?php echo ucfirst($la) ?></option>
                <?php endif; ?>
              <?php endforeach; ?>
            </div>

            <button type="submit" name="btnComp" value="saveComp">Enregistrer</button>
            <span class="asterisque">* : ces entrées ne sont pas modifiable directement. Veuillez contacter l'équipe de Tech A Way.</span>
          </form>

          <!-- Formulaire de preferences -->
          <form action="profil.ctrl.php" method="POST" class="form" id="form-pref">

            <label for="">Travailler à l'étranger ?</label>
            <div class="list-radio">
              <?php if ($candidat->getRenseignement()->getTravEtranger()==true): ?>
                <input type="radio" name="travE" value=true checked>
              <?php else: ?>
                <input type="radio" name="travE" value=true>
              <?php endif; ?>
              <label for="oui">Oui</label>
              <?php if ($candidat->getRenseignement()->getTravEtranger()==false): ?>
                <input type="radio" name="travE" value=false checked>
              <?php else: ?>
                <input type="radio" name="travE" value=false>
              <?php endif; ?>
              <label for="non">Non</label>
            </div>

            <label for="">Secteur(s) d'activité(s)</label>
            <select name="secteur" >
              <?php foreach($secteurs as $s): ?>
                <?php if ($s==$candidat->getRenseignement()->getSecteur()): ?>
                <option value="<?= $s ?>" selected><?= $s ?></option>
                <?php else: ?>
                <option value="<?= $s ?>"><?= $s ?></option>
                <?php endif; ?>
              <?php endforeach; ?>
            </select>

            <label for="">Contrat recherché</label>
            <select name="typeContrat" >
            <?php foreach($contrats as $c): ?>
                <?php if ($c==$candidat->getRenseignement()->getTypeContrat()): ?>
                <option value="<?= $c ?>" selected><?php echo strtoupper($c) ?></option>
                <?php else: ?>
                <option value="<?= $c ?>"><?php echo strtoupper($c) ?></option>
                <?php endif; ?>
              <?php endforeach; ?>
            </select>

            <label for="">Poste recherché</label>
            <select name="poste" >
            <?php foreach($postes as $p): ?>
                <?php if ($p==$candidat->getRenseignement()->getPoste()): ?>
                <option value="<?= $p ?>" selected><?php echo ucfirst($p) ?></option>
                <?php else: ?>
                <option value="<?= $p ?>"><?php echo ucfirst($p) ?></option>
                <?php endif; ?>
              <?php endforeach; ?>
            </select>

            <label for="">Type d'entreprise recherché</label>
            <select name="typeEntreprise" >
            <?php foreach($entreprises as $e): ?>
                <?php if ($e==$candidat->getRenseignement()->getTypeEntreprise()): ?>
                <option value="<?= $e ?>" selected><?php echo ucfirst($e) ?></option>
                <?php else: ?>
                <option value="<?= $e ?>"><?php echo ucfirst($e) ?></option>
                <?php endif; ?>
              <?php endforeach; ?>
            </select>

            <button type="submit" name="btnPref" value="savePref">Enregistrer</button>
            <span class="asterisque">* : ces entrées ne sont pas modifiable directement. Veuillez contacter l'équipe de Tech A Way.</span>
          </form>

          <!-- Formulaire de documents -->
          <form action="" class="form" id="form-docs">
            <?= $candidat->getLienLM() ?>
            <button type="submit">Abandonner l'offre</button>
            
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

            /* si bouton 'mes documents' est cliqué  
            $("#btn-docs").click(function() {
              $("#form-rens").hide();
              $("#form-comp").hide();
              $("#form-docs").show();
              $("#form-pref").hide();
              $("#btn-docs").css("color","var(--color-grey)");
              $("#btn-docs").css("border", "1px solid var(--color-grey)");
            });*/

          });
        </script>

</html>
