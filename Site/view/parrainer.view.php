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
          <section class="section-parrainer">
            <form class="form" action="parrainer.ctrl.php" method="post">
              <h1>Parrainer</h1>
              <p>Si vous connaissez quelqu'un qui pourrait être intéressé par l'offre, <br>
                n'hésitez pas à lui en parler !
              </p>
              <h2>Parrainer quelqu'un :</h2>
              <!-- Saisie des infos du candidat -->
              <div>
                <label for="nomCandidat">Nom/Prénom du candidat</label>
                <input id="nomCandidat" type="text" name="nomCandidat" placeholder="Entrez le nom et le prénom du candidat" >
                <label for="telCandidat">Téléphone du candidat</label>
                <!-- type tel -> seul les chiffres sont autorisé -->
                <input id="telCandidat" type="tel" name="telCandidat" placeholder="+33 6 01 02 03 04" >
              </div>

              <!-- Saisie des infos du parrain -->
              <div>
                <label for="nomParrain">Nom/prénom du parrain</label>
                <input id="nomParrain" type="text" name="nomParrain" placeholder="Entrez le nom et le prénom du parrain">
                <label for="telParrain">Téléphone du parrain</label>
                <!-- type tel -> seul les chiffres sont autorisé -->
                <input id="telParrain" type="tel" name="telParrain" placeholder="+33 6 01 02 03 04" >
              </div>


              <form action ="formulaire.ctrl.php" method="post">
              <button type="submit" name="etape" value="preferences">Envoyer</button>
              </form>
          </section>
    </main>

    <!-- FOOTER -------------------------------------------------------------------------------->
    <?php include_once('../view/design/footer.php'); ?>


  </body>
</html>