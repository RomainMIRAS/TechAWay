<!DOCTYPE html>
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

    <!-- FOOTER ---------------------------------------------------------------------------->
    <?php include_once('../view/design/footer.php'); ?>



  </body>
</html>

</body>
</html>
