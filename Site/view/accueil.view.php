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

      <section class="section-accueil" id="section-accueil-1"> <!-- section Accueil -->
        <div>
            <h1 class="basicAnimation">Découvrez Tech A Way</h1>
            <h2 class="basicAnimation">L'expertise du recrutement dans le domaine de la tech avec des recruteurs qui vous accompagnent jusqu'à l'embauche</h2>
            <p class="basicAnimation">Tech a Way est un cabinet de recrutement spécialisé dans le domaine de la tech en full remote et partout en Europe.</p>
            <h3 class="basicAnimation">Commencez l'aventure !</h3>
            <h4 class="basicAnimation">Vous-êtes ?</h4>
            <section id="sectionBoutonsAccueil" class="basicAnimation">
              <form action="../controler/trouverUnJob.ctrl.php" method="post">
                  <button type="submit" name="action" value="signup">Candidat</button>
              </form>
              <form action="../controler/recruter.ctrl.php" method="post">
                <button type="submit" name="action" value="signup">Recruteur</button>
              </form>
            </section>
        </div>

        <div id="svg1">
          <?php include_once("../view/design/svg/p1 var 1.svg") ?>
        </div>

      </section>

    </main>

    <!-- NAVIGATION RESPONSIVE ----------------------------------------------------------------->
    <nav id="navResp">
      <ul>
        <?php if (!isset($_SESSION['utilisateur'])): //Si pas connecté?>
          <form action="../controler/authentification.ctrl.php" method="post">
            <li class="navbarAnimate"><button id="signup" type="submit" name="action" value="signup">S'inscrire</button></li>
            <li class="navbarAnimate"><button id="login" type="submit" name="action" value="login">S'identifier</button></li>
          </form>
        <?php endif; ?>
      </ul>
    </nav>

    <!-- FOOTER -------------------------------------------------------------------------------->
    <?php include_once('../view/design/footer.php'); ?>


  </body>
  <script src="../view/design/js/gsap.min.js"></script>
  <script src="../view/design/js/gsap-animations.js"></script>
</html>
