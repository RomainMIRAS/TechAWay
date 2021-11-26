
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- TITLE -->
    <title>Tech A Way</title>

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="../view/design/style.css">

    <!-- GOOGLE FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"> 

  </head>
  <body>

    <!-- NAVIGATION ---------------------------------------------------------------------------->
    <?php include_once('../view/design/navigation.php'); ?>

    <!-------------------------------------- Main du Site -------------------------------------->
    <main>






      <!-- Section du formulaire -->


      <?php if ($etape == "base"): ?>
        <section class="formulaire">
            <form class="form" action="formulaire.ctrl.php" method="post">
              <h1>Formulaire</h1>
              <!-- Saisie des informations du candidat -->
              <label for="nom">Nom</label>
              <input id="nom" type="text" name="nom" placeholder="Entrer votre nom" required>
              <label for="prenom">Prenom</label>
              <input id="prenom" type="text" name="prenom" placeholder="Entrer votre prenom" required>
              <label for="age">Date de naissance</label>
              <input id="age" type="date" name="age" placeholder="Renseigner votre date de naissance" required>
              <label for="tel">Telephone</label>
              <!-- type tel -> seul les chiffres sont autorisé -->
              <input id="tel" type="tel" name="tel" required>


              <!-- Section du pays parmis la liste des pays europeens -->
              <label for="pays">Pays</label>
              <select name="pays">
                  <?php foreach ($pays as $key): ?>
                    <option value="<?php echo"$key" ?>"><?php echo"$key" ?> </option>
                  <?php endforeach; ?>
              </select>

              <label for="ville">Ville</label>
              <input id="ville" type="text" name="ville" placeholder="Entrer votre ville" required>


              <button type="submit" name="etape" value="competences">Suivant</button>
              </form>
          </section>



      <?php elseif ($etape == "competences"): ?>
          <section class="competences">
            <form class="form" action="formulaire.ctrl.php" method="post">
              <h1>Formulaire</h1>
              <!-- Saisie des competences du candidat -->
              <label for="nvEtude">Niveau d'etudes</label>
              <input id="nvEtude" type="text" name="nvEtude" placeholder="Format : Bac+3" required>
              <label for="langueParle">Langues parlé</label>
              <input id="langueParle" type="text" name="langueParle" placeholder="ex : francais, anglais" required>
              <label for="nvEtude">Niveau d'etudes</label>
              <input id="nvEtude" type="text" name="nvEtude" placeholder="Format : Bac+3" required>
              <form action ="formulaire.ctrl.php" method="post">
              <button type="submit" value="formulaire">Precedent</button>
              <input type="submit" name ="etape" value='Envoyer' >
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
