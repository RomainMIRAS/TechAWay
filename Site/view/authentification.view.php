<!DOCTYPE html>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../view/design/style.css">
    <title>Tech A Way</title>
  </head>
  <body>

    <!-------------------------------------- Header du site --------------------------------------->
    <?php require('header.php');  ?>


    <!-------------------------------------- Main du Site -------------------------------------->
    <main>

      <!-- Si l'utilisateur click sur Login -->
      <?php if ($action == "login"): ?>
        <section class="formulaireConnection">
          <form class="authen" action="authentification.ctrl.php" method="post">
              <h1>Connexion</h1>
              <output class="w3-pale-red"><?=$erreur?></output>
              <label for="username">Nom d'utilisateur</label>
              <input id="username" type="text" name="username" placeholder="Entrer votre nom d'utilisateur" required>
              <label for="password">Mot de passe</label>
              <input id="password" type="password" name="password" placeholder="Mot de passe" required>
              <input type="submit" id='submit' value='LOGIN' >
          </form>
        </section>
      <?php elseif ($action == "signup"): ?>
        <section class="formulaireConnection">
          <form class="authen" action="authentification.ctrl.php" method="post">
              <h1>S'inscrire</h1>
              <output class="w3-pale-red"><?=$erreur?></output>
              <label for="username">Nom d'utilisateur</label>
              <input id="username" type="text" name="username" placeholder="Entrer votre nom d'utilisateur" required>
              <label for="password">Mot de passe</label>
              <input id="password" type="password" name="password" placeholder="Mot de passe" required>
              <label for="checkpassword">Confirmation du mot de passe</label>
              <input id="checkpassword" type="password" name="checkpassword" placeholder="Mot de passe" required>
              <input type="submit" id='submit' value='Confirmation' >
          </form>
        </section>
      <?php endif; ?>

    </main>

    <!---------------------------------------- Footer du site ---------------------------------------->
    <?php require('footer.php');  ?>



  </body>
</html>

</body>
</html>
