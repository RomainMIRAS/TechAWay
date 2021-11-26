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
    
  </head>
  <body>

    <!-- NAVIGATION ---------------------------------------------------------------------------->
    <?php include_once('../view/design/navigation.php'); ?>

    <!-- MAIN ---------------------------------------------------------------------------------->
    <main>

      <section id="section-accueil"> <!-- section 1 -->
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

        <div>
          <img width="800px" src="../view/design/home.png">
        </div>
      </section>


	  </section>
      <section class="contenuAcceuil2">
        <div>
          <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempus augue sed purus venenatis, ut pharetra elit dignissim. Fusce vel ex ornare, vulputate dui non, blandit arcu. Aenean laoreet, nibh tempor aliquam hendrerit, dui mi efficitur diam, sit amet porttitor diam dolor ac odio. Donec non ullamcorper mauris. Quisque elementum tortor quis augue elementum iaculis. Vivamus sit amet ultricies ligula. Nam fringilla quam id orci aliquam imperdiet. Phasellus eget vehicula neque. Vestibulum hendrerit metus quis ex viverra, vitae pretium sem tincidunt. Phasellus in nisi sed dui efficitur eleifend vel ac orci. Nam commodo ipsum at facilisis tempus. Sed interdum est vitae odio tempus feugiat. Etiam viverra iaculis dictum. Suspendisse eget ex et neque scelerisque lobortis. Ut dignissim interdum orci.  </p>
        </div>
      </section>

      <section class="listePartenaires">
          <h1> Nos Partenaires </h1>
          
      <section>

    </main>

    <section class="contactAcceuil">
      
    </section>

    <!-- FOOTER ---------------------------------------------------------------------------->
    <?php include_once('../view/design/footer.php'); ?>


  </body>
</html>

</body>
</html>
