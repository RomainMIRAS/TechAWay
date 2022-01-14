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
    <main id = "mainRecruter">

      <section id="section1"> <!-- section Accueil -->

        <article id="article1">

          <div>
            <h1>Entreprises partenaires</h1>
            <h2>Trouvez LES candidats qu'il vous faut</h2>
            <p>Tech A Way vous donne accès à des candidats qui correspondent à 100% à vos attentes.
              Expliquez-nous toutes les spécificités du poste et on vous trouvera le ou la candidate dont vous avez besoin !</p>
          </div>

          <div id="svg1">
            <?php include_once("../view/design/svg/p5.svg") ?>
          </div>

        </article>

        <article id="article2">

          <div id="svg1">
            <?php include_once("../view/design/svg/p1 var 1.svg") ?>
          </div>

          <div>
            <h3>Candidatez avec NOUS</h3>
            <ul>
              <li>Une expertise dans le recrutement Tech</li>
              <li>Un gain de temps considérable</li>
              <li>Un accès à de nouveaux profils Tech</li>
            </ul>
          </div>

        </article>

      </section>

      <section id = "section2">

        <h2>Des besoins en recrutement tech ? Échangez avec nous !</h2>
        <form class="form" action="recruter.ctrl.php" method="post">
          <label for="nom">Nom</label>
          <input id="nom" type="text" name="nom" placeholder="Nom" >
          <label for="prenom">Prénom</label>
          <input id="prenom" type="text" name="prenom" placeholder="Prénom" >
          <label for="email">Adresse E-mail</label>
          <input id="email" type="text" name="email" placeholder="Entrez votre adresse e-mail" >
          <label for="nomEntreprise">Nom de l'entreprise</label>
          <input id="nomEntreprise" type="text" name="nomEntreprise" placeholder="Nom de l'entreprise" >
          <form action ="recruter.ctrl.php" method="post">
          <label for="">Message</label>
          <textarea name="message" id="message" cols="30" rows="10"></textarea>
          <output><?=$erreur?></output>
          <button type="submit" name="action" value="confirmation">Envoyer</button>
       </form>

      </section>

    </main>

    <!-- FOOTER -------------------------------------------------------------------------------->
    <?php include_once('../view/design/footer.php'); ?>


  </body>
</html>
