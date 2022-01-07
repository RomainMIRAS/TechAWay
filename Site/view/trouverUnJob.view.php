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
    <main id = "mainTrouverUnJob">

      <section id="section1"> <!-- section Accueil -->
        <div>
          <h1>Trouvez le métier qu'il vous faut</h1>
          <p>Tech a Way est un cabinet de recrutement spécialisé dans le domaine de la tech en full remote et partout en Europe</p>
          <h2>L'expertise du recrutment dans le domaine de la tech avec des recuteur qui vous accompagne jusqu'à l'embauche</h2>
        </div>

        <article id = "article1">
        <div id="svg1">
          <?php include_once("../view/design/svg/p5.svg") ?>
        </div>

        <div>
          <h2>CANDIDATS</h2>
          <h3>Trouvez LES recruteurs qu'il vous faut</h3>
          <p>Tech a Way vous permet de postuler chez les entreprises qui correspondent le mieux au job que vous rechercher. <br>
            Vous n'avez qu'à vous inscrire et nous spécifier ce que vous chercher, on s'occupe de vous mettre en lien avec l'employeur idéal !</p>
        </div>

        </article>
        
        <article id = "article2">
        <div>
          <h2>On vous aide àvous faire recruter</h2>
          <ul>
            <li>Une recherche d'emploi efficace</li>
            <li>Une aide à la création du CV et de la lettre de motivation</li>
            <li>Un accompagnement tout au long de votre recrutement</li>
          </ul>
          
          
        </div>

        <div id="svg1">
          <?php include_once("../view/design/svg/p1 var 1.svg") ?>
        </div>
        </article>
        
    </section>

    <section id = "sectionTUJ" >
        <section>
            <article>
                <h2>Rejoignez-nous !</h2>
                <form action="../controler/authentification.ctrl.php">                
                    <button id="signup" type="submit" name="action" value="signup">S'inscrire</button>
                </form>
            </article>
        </section>
        
    </section>

    </main>

    <!-- FOOTER -------------------------------------------------------------------------------->
    <?php include_once('../view/design/footer.php'); ?>


  </body>
</html>
