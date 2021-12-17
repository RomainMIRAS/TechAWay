<!DOCTYPE html>
<html lang="fr" dir="ltr" style="height: 100vh;">
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
  <body style="height: 100vh;">

    <!-- NAVIGATION ---------------------------------------------------------------------------->
    <?php include_once('../view/design/navigation.php'); ?>

    <!-- MAIN ---------------------------------------------------------------------------------->
    <main style="max-height: 100vh;">
          <section class="section-accueil" id="section-parrainer">

            <form class="form" action="parrainer.ctrl.php" method="post">

              <h1>Parrainer</h1>
              <p>
                Une personne de ton entourage est à l’écoute d’opportunités ?<br>
                Tu souhaites nous mettre en relation ?<br>Cela nous semble normal de te remercier !<br><br>
                Touche 600€ si la personne parrainée est recrutée chez un de nos partenaires.
              </p>
              <h2>Parrainer quelqu'un</h2>

              <div id="coord-can-par">
                <!-- Saisie des infos du candidat -->

                <button id="btn-parrainer-can">Candidat</button>
                <button id="btn-parrainer-par">Parrain</button>

                <div id="coord-candidat">
                  <label for="nomCandidat">Nom / Prénom</label>
                  <input id="nomCandidat" type="text" name="nomCandidat" placeholder="Nom et prénom du candidat" >
                  <label for="mailCandidat">Adresse mail</label>
                  <input id="mailCandidat" type="mail" name="mailCandidat" placeholder="Adresse mail du candidat">
                  <label for="telCandidat">Téléphone</label>
                  <!-- type tel -> seul les chiffres sont autorisé -->
                  <input id="telCandidat" type="tel" name="telCandidat" placeholder="+33 6 01 02 03 04" >
                </div>

                <!-- Saisie des infos du parrain -->
                <div id="coord-parrain" style="display:none">
                  
                  <label for="nomParrain">Nom / Prénom</label>
                  <input id="nomParrain" type="text" name="nomParrain" placeholder="Nom et prénom du parrain">
                  <label for="mailParrain">Adresse mail</label>
                  <input id="mailParrain" type="mail" name="mailParrain" placeholder="Adresse mail du parrain">
                  <label for="telParrain">Téléphone</label>
                  <!-- type tel -> seul les chiffres sont autorisé -->
                  <input id="telParrain" type="tel" name="telParrain" placeholder="+33 6 01 02 03 04" >
                </div>
              </div>

              <script src=""></script>
              <script>
                $(document).ready(function(){
                  $("#btn-parrain-can").click(function(){
                    $("#coord-parrain").hide();
                    $("#coord-candidat").show();
                  });
                  $("#btn-parrain-par").click(function(){
                    $("#coord-candidat").hide();
                    $("#coord-parrain").show();
                  });
                });
              </script>
              <form action ="formulaire.ctrl.php" method="post">
              <button type="submit" name="etape" value="preferences">Envoyer</button>
              </form>

              <div>
                <?php include_once("../view/design/svg/p2.svg") ?>
              </div>

          </section>
    </main>

    <!-- FOOTER -------------------------------------------------------------------------------->
    <?php include_once('../view/design/footer.php'); ?>


  </body>
</html>