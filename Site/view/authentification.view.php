<!DOCTYPE html>
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

      <section id="section-log">

        <!-- Si l'utilisateur clique sur "Se connecter" -->
        <?php if ($action == "login"): ?>

          <form class="form" action="authentification.ctrl.php" method="post" style="padding-bottom: 193px;">
            <h1>S'identifier</h1>
            <label for="email">Adresse E-mail</label>
            <input id="email" type="text" name="email" placeholder="Entrez votre adresse e-mail" required>
            <label for="password">Mot de passe</label>
            <input id="password" type="password" name="password" placeholder="Mot de passe" required>
            <output><?=$erreur?></output>
            <button type="submit" name="confirmation" value="oui">Confirmation</button>
            <input type="hidden" name="action" value="<?= $action ?>">
          </form>

        <!-- Si l'utilisateur clique sur "S'inscrire" -->
        <?php elseif ($action == "signup"): ?>

          <form class="form" action="authentification.ctrl.php" method="post" style="padding-bottom: 114px;">
            <h1>S'inscrire</h1>
            <label for="email">Adresse E-mail</label>
            <input id="email" type="text" name="email" placeholder="Entrez votre adresse e-mail" required>
            <label for="password">Mot de passe</label>
            <input id="password" type="password" name="password" placeholder="Mot de passe" required>
            <label for="checkpassword">Confirmation du mot de passe</label>
            <input id="checkpassword" type="password" name="checkpassword" placeholder="Mot de passe" required>
            <output><?=$erreur?></output>
            <button type="submit" name="confirmation" value="oui">Confirmation</button>
            <input type="hidden" name="action" value="<?= $action ?>">
          </form>

        <?php endif; ?>

        <div id="svg2">
          <?php include_once("../view/design/svg/p3.svg"); ?>
        </div>

      </section>

    </main>

    <!-- FOOTER ---------------------------------------------------------------------------->
    <?php include_once('../view/design/footer.php'); ?>



  </body>
</html>

</body>
</html>
