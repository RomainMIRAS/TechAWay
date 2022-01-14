
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

      <?php if ($etape == "base"): ?> <!-- Si le candidat est à la première étape -->

        <section class="section-formulaire">
            <form class="form" action="formulaire.ctrl.php" method="post">
              <h1>Formulaire</h1>
              <!-- Saisie des informations du candidat -->
              <label for="nom">Nom *</label>
              <input id="nom" type="text" name="nom" placeholder="Entrez votre nom" >
              <label for="prenom">Prénom *</label>
              <input id="prenom" type="text" name="prenom" placeholder="Entrez votre prénom" >
              <label for="age">Date de naissance *</label>
              <input id="age" type="date" name="age" >
              <label for="tel">Téléphone *</label>
              <!-- type tel -> seul les chiffres sont autorisé -->
              <input id="tel" type="tel" name="tel" placeholder="+33 6 01 02 03 04" >


              <!-- Section du pays parmis la liste des pays europeens -->
              <label for="pays">Pays *</label>
              <select name="pays">
                  <?php foreach ($pays as $key): ?>
                    <?php if ($key=="France"): ?>
                      <option value="<?php echo"$key" ?>" selected><?php echo"$key" ?></option>
                    <?php else: ?>
                      <option value="<?php echo"$key" ?>"><?php echo"$key" ?></option>
                    <?php endif; ?>
                  <?php endforeach; ?>
              </select>

              <label for="ville">Ville *</label>
              <input id="ville" type="text" name="ville" >

              <output><?=$erreur?></output>
              <button type="submit" name="action" value="suivant">Confirmation</button>
              <input type="hidden" name="etape" value="base">
              <span class="asterisque">* : Champ obligatoire</span>
              </form>
          </section>



      <?php elseif ($etape == "competences"): ?>
          <section class="section-formulaire">
            <form class="form" action="formulaire.ctrl.php" method="post">
              <h1>Formulaire</h1>
              <!-- Saisie des competences du candidat -->
              <label for="nvEtude">Niveau d'etudes</label>
              <select name="nvEtude">
                      <option value="bac+1" selected>Bac</option>
                      <option value="bac+2" >Bac +1</option>
                      <option value="bac+2" >Bac +2</option>
                      <option value="bac+3" >Bac +3</option>
                      <option value="bac+4" >Bac +4</option>
                      <option value="bac+5" >Bac +5</option>
                      <option value="bac+6" >Bac +6</option>
                      <option value="bac+7" >Bac +7</option>
                      <option value="bac+8" >Bac +8</option>
              </select>
              <label for="langueParle[]">Langue(s) parlée(s)</label>
                <div class="list-check"> <!-- Liste des langues -->
                  <input type="checkbox" name="langueParle[]" value="francais" selected>Français</option>
                  <input type="checkbox" name="langueParle[]" value="anglais" >Anglais</option>
                  <input type="checkbox" name="langueParle[]" value="espagnole" >Espagnol</option>
                  <input type="checkbox" name="langueParle[]" value="italien" >Italien</option>
                  <input type="checkbox" name="langueParle[]" value="allemand">Allemand</option>
                  <input type="checkbox" name="langueParle[]" value="albanais">Albanais</option>
                </div>
              <label for="languageAquis[]">Language(s) infomatique connu(s)</label>
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
              <form action ="formulaire.ctrl.php" method="post">
              <output><?=$erreur?></output>
              <button type="submit" name="action" value="precedent">Précédent</button>
              <button type="submit" name="action" value="suivant">Suivant</button>
              <input type="hidden" name="etape" value="competences">
              </form>
          </section>


      <?php elseif ($etape == "preferences"): ?>
          <section class="section-formulaire">
            <form class="form" action="formulaire.ctrl.php" method="post">
              <h1>Formulaire</h1>
              <!-- Saisie des preferences du candidat -->

              <label for="travEtranger">Travail à l'etranger</label>
              <input type="radio" name="travEtranger" value=true>
              <label for="oui">Oui</label>
              <input type="radio" name="travEtranger" value=false>
              <label for="oui">Non</label>



              <label for="typeContrat">Type de contrat</label>
              <select name="typeContrat" >
                  <option value="">--Veuillez choisir une option--</option>
                  <option value="cdi">CDI</option>
                  <option value="cdd">CDD</option>
              </select>

              <label for="secteur">Secteur de travail</label>
              <select name="secteur" >
                  <option value="">--Veuillez choisir une option--</option>
                  <option value="Informatique">Informatique</option>
                  <option value="Autre">Autre</option>
              </select>

              <label for="poste">Poste</label>
              <select name="poste" >
                  <option value="">--Veuillez choisir une option--</option>
                  <option value="Développeur">Développeur</option>
                  <option value="Développeur de jeux video">Développeur de jeux video</option>
                  <option value="Front-end développeur">Front-end développeur</option>
                  <option value="Back-end développeur">Back-end développeur</option>
                  <option value="Full stack  développeur">Full stack  développeur</option>
              </select>

              <label for="typeEntreprise">Type d'entreprise</label>
              <select name="typeEntreprise" >
                  <option value="">--Veuillez choisir une option--</option>
                  <option value="Microentreprise">Microentreprise</option>
                  <option value="Petite entreprise">Petite entreprise</option>
                  <option value="Moyenne entreprise">Moyenne entreprise</option>
                  <option value="Grande entreprise">Grande entreprise</option>
              </select>
              <output><?=$erreur?></output>
              <form action ="formulaire.ctrl.php" method="post">
              <button type="submit" name="action" value="precedent">Precedent</button>
              <button type="submit" name="action" value="suivant">Envoyer</button>
              <input type="hidden" name="etape" value="preferences">
              </form>
          </section>

      <?php endif; ?>



    </main>

    <!-- FOOTER ---------------------------------------------------------------------------->
    <?php include_once('../view/design/footer.php'); ?>


  </body>
</html>

</body>
</html>
