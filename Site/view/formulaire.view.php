
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
              <label for="nom">Nom</label>
              <input id="nom" type="text" name="nom" placeholder="Entrez votre nom" value="<?php $candidat->getNom(); ?>" >
              <label for="prenom">Prénom</label>
              <input id="prenom" type="text" name="prenom" placeholder="Entrez votre prénom" value="<?php $candidat->getPrenom(); ?>">
              <label for="age">Date de naissance</label>
              <input id="age" type="date" name="age" >
              <label for="tel">Téléphone</label>
              <!-- type tel -> seul les chiffres sont autorisé -->
              <input id="tel" type="tel" name="tel" placeholder="+33 6 01 02 03 04" <?php $candidat->getTelephone(); ?> >


              <!-- Section du pays parmis la liste des pays europeens -->
              <label for="pays">Pays</label>
              <select name="pays">
                  <?php foreach ($pays as $key): ?>
                    <?php if ($key=="France"): ?>
                      <option value="<?php echo"$key" ?>" selected><?php echo"$key" ?></option>
                    <?php else: ?>
                      <option value="<?php echo"$key" ?>"><?php echo"$key" ?></option>
                    <?php endif; ?>
                  <?php endforeach; ?>
              </select>

              <label for="ville">Ville</label>
              <input id="ville" type="text" name="ville" value="<?php $candidat->getVille(); ?>">

              <output><?=$erreur?></output>
              <button type="submit" name="action" value="suivant">Confirmation</button>
              <input type="hidden" name="etape" value="base">
              </form>
          </section>



      <?php elseif ($etape == "competences"): ?>
          <section class="section-formulaire">
            <form class="form" action="formulaire.ctrl.php" method="post">
              <h1>Formulaire</h1>
              <!-- Saisie des competences du candidat -->
              <label for="nvEtude">Niveau d'etudes</label>
              <input id="nvEtude" type="text" name="nvEtude" placeholder="Format : Bac+3" >
              <label for="langueParle">Langues parlé</label>
              <input id="langueParle" type="text" name="langueParle" placeholder="ex : francais, anglais" >
              <label for="languageAquis">Languages aquis</label>
              <input id="languageAquis" type="text" name="languageAquis" placeholder="ex : C++, Java, PHP" >
              <form action ="formulaire.ctrl.php" method="post">
              <output><?=$erreur?></output>
              <button type="submit" name="action" value="precedent">Precedent</button>
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
                  <option value="cdi">Secteur 1</option>
                  <option value="cdd">Secteur 2</option>
              </select>

              <label for="poste">Poste</label>
              <select name="poste" >
                  <option value="">--Veuillez choisir une option--</option>
                  <option value="cdi">Poste 1</option>
                  <option value="cdd">Poste 2</option>prefer
              </select>

              <label for="typeEntreprise">Type d'entreprise</label>
              <select name="typeEntreprise" >
                  <option value="">--Veuillez choisir une option--</option>
                  <option value="cdi">Start-Up</option>
                  <option value="cdd">Multinational</option>
              </select>
              <output><?=$erreur?></output>
              <form action ="formulaire.ctrl.php" method="post">
              <button type="submit" name="action" value="precedent">Precedent</button>
              <button type="submit" name="action" value="confirmation">Envoyer</button>
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
