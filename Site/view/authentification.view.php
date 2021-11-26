<!DOCTYPE html>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../view/design/style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
              <label for="email">Adresse Email</label>
              <input id="email" type="text" name="email" placeholder="Entrer votre nom d'utilisateur" required>
              <label for="password">Mot de passe</label>
              <input id="password" type="password" name="password" placeholder="Mot de passe" required>
              <button type="submit" name="confirmation" value="oui">Confirmation</button>
              <input type="hidden" name="action" value="<?$action ?>">
          </form>
        </section>
      <?php elseif ($action == "signup"): ?>
        <section class="formulaireConnection">
          <form class="authen" action="authentification.ctrl.php" method="post">
              <h1>S'inscrire</h1>
              <output class="w3-pale-red"><?=$erreur?></output>
              <label for="email">Adresse Email</label>
              <input id="email" type="text" name="email" placeholder="Entrer votre nom d'utilisateur" required>
              <label for="password">Mot de passe</label>
              <input id="password" type="password" name="password" placeholder="Mot de passe" required>
              <label for="checkpassword">Confirmation du mot de passe</label>
              <input id="checkpassword" type="password" name="checkpassword" placeholder="Mot de passe" required>
              <button type="submit" name="confirmation" value="oui">Confirmation</button>
              <input type="hidden" name="action" value="signup">
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
