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
        <div>
          <h1>Rejoignez Tech A Way</h1>
          <p>Tech a Way est un cabinet de recrutement spécialisé dans le domaine de la tech en full remote et partout en Europe</p>
          <h2>L'expertise du recrutment dans le domaine de la tech avec des recuteur qui vous accompagne jusqu'à l'embauche</h2>
        </div>

        <article id = "article1">
        <div id="svg1">
          <?php include_once("../view/design/svg/p5.svg") ?>
        </div>

        <div>
          <h2>QUI SOMME NOUS?</h2>
          <h3>A propos de nous</h3>
          <p>Tech a Way est un cabinet de recrutement spécialisé dans le domaine de la tech en full remote et partout en Europe. 

De nos jours Tech A Way reçoit des demandes de partenariat d’entreprises cherchant à recruter un candidat. Suite à cela les coachs de l’agence exercent une chasse aux candidats sur des réseaux comme LinkedIn où ils leur proposent de s’entretenir via des messages électroniques. 

Tech A Way permet donc aux entreprises d’externaliser leur recrutement, et offre ainsi au candidat un meilleur équilibre entre vie professionnelle et vie personnelle, qui se voit passer ses entretiens chez lui. 
          </p>
        </div>

        </article>
        
        <article id = "article2">
        <div>
          <h2>WHO'S NEXT?</h2>
          <h3>Rejoignez l'équipe</h3>
          <p>Tech a Way est en pleine croissance ! Si tu veux rejoindre une belle aventure humaine et apprendre un job passionnant, n’hésites pas à nous contacter [Stage / Alternance / CDI] </p>
        </div>

        <div id="svg1">
          <?php include_once("../view/design/svg/p4.svg") ?>
        </div>
        </article>
        
</section>

      <section id = "section2" >
      <form class="form" action="authentification.ctrl.php" method="post" style="padding-bottom: 193px;">
            <h1>VOUS SOUHAITEZ REJOINDRE TECH A WAY? CONTACTEZ NOUS!</h1>
            <label for="nom">Nom</label>
            <input id="nom" type="text" name="nom" placeholder="Nom" required>
            <label for="prenom">Prenom</label>
            <input id="prenom" type="text" name="prenom" placeholder="Prenom" required>
            <label for="email">Adresse E-mail</label>
            <input id="email" type="text" name="email" placeholder="Entrez votre adresse e-mail" required>
            <label for="nomEntreprise">Nom de l'entreprise</label>
            <input id="postactu" type="text" name="postactu" placeholder="Votre Poste Actuel" required>
            
            <button type="submit" name="confirmation" value="oui">Confirmation</button>
          </form>

      </section>

    </main>

    <!-- FOOTER -------------------------------------------------------------------------------->
    <?php include_once('../view/design/footer.php'); ?>


  </body>
</html>
 
