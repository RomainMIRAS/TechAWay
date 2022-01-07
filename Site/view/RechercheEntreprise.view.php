
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
          <h1>Découvrez Tech A Way</h1>
          <p>Tech a Way est un cabinet de recrutement spécialisé dans le domaine de la tech en full remote et partout en Europe</p>
          <h2>L'expertise du recrutement dans le domaine de la tech avec des recuteurs qui vous accompagne jusqu'à l'embauche</h2>
        </div>

        <article id = "article1">
        <div id="svg1">
          <?php include_once("../view/design/svg/p5.svg") ?>
        </div>

        <div>
          <h2>ENTREPRISES PARTENAIRES</h2>
          <h3>Trouvez les candidats qu'il vous faut</h3>
          <p>Tech a Way vous donne accès à des candidats qui correspondent à 100% à vos attentes. 
            Expliquez-nous toutes les spécificités du poste et on vous trouvera le ou la candidate dont vous avez besoin !</p>
        </div>

        </article>
        
        <article id = "article2">
        <div>
          <h2>Candidater avec NOUS</h2>
          <ul>
            <li>Une expertise dans le recrutement Tech</li>
            <li>Un gain de temps considérable</li>
            <li>Un accès à de nouveaux profils Tech</li>
          </ul>
          
          
        </div>

        <div id="svg1">
          <?php include_once("../view/design/svg/p1 var 1.svg") ?>
        </div>
        </article>
        
</section>

      <section id = "section2" >
      <form class="form" action="recruter.ctrl.php" method="post" style="padding-bottom: 193px;">
            <h1>DES BESOINS EN RECRUTEMENT TECH ? ÉCHANGE AVEC NOUS !</h1>
            <label for="nom">Nom</label>
            <input id="nom" type="text" name="nom" placeholder="Nom" >
            <label for="prenom">Prenom</label>
            <input id="prenom" type="text" name="prenom" placeholder="Prenom" >
            <label for="email">Adresse E-mail</label>
            <input id="email" type="text" name="email" placeholder="Entrez votre adresse e-mail" >
            <label for="nomEntreprise">Nom de l'entreprise</label>
            <input id="postactu" type="text" name="postactu" placeholder="Votre Poste Actuel" >
            <form action ="recruter.ctrl.php" method="post">
            <output><?=$erreur?></output>
            
            <button type="submit" name="action" value="confirmation">Confirmation</button>
          </form>

      </section>

    </main>

    <!-- FOOTER -------------------------------------------------------------------------------->
    <?php include_once('../view/design/footer.php'); ?>


  </body>
</html>
