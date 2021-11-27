<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">

    <!-- TITLE -->
    <title>Tech A Way</title>

    <!-- ICON -->
    <link rel="icon" href="../view/design/logo.png">

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

      <section id="section-accueil"> <!-- section Accueil -->
        <div>
          <h1>Découvrez Tech A Way</h1>
          <p>Tech a Way est un cabinet de recrutement spécialisé dans le domaine de la tech en full remote et partout en Europe</p>
          <h2>Commencez l'aventure</h2>
          <h4>Vous-êtes ?</h4>
          <form action="../controler/authentification.ctrl.php" method="post">
              <button type="submit" name="action" value="signup">Candidat</button>
              <button type="submit" name="action" value="signup">Recruteur</button>
          </form>
        </div>

        <div id="svg1">
          <?php include_once("../view/design/svg/p1 var 1.svg") ?>
        </div>

      </section>

    </main>

    <!-- FOOTER -------------------------------------------------------------------------------->
    <?php include_once('../view/design/footer.php'); ?>


  </body>
</html>