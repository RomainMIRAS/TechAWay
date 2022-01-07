<?php
    include_once(__DIR__."/../model/Utilisateur.class.php");
    include_once(__DIR__."/../model/Candidat.class.php");
?>
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

      <section> <!-- Tous les candidats inscrits -->

        <h2>Candidats inscrits</h2>

        <table>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
            </tr>
            <?php foreach($candidats as $c): ?>
                <?php if ($c!=false): ?>
                    <tr>
                        <td><?= $c->getNom() ?></td>
                        <td><?= $c->getPrenom() ?></td>
                        <td><?= $c->getEmail() ?></td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </table>

      </section>

    </main>

    <!-- FOOTER -------------------------------------------------------------------------------->
    <?php include_once('../view/design/footer.php'); ?>



  </body>

</html>