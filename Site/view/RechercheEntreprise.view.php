<?php
    include_once(__DIR__."/../model/Offre.class.php");
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

      <section id="tableau-bord"> <!-- Tous les candidats inscrits -->

        <h2><span style="font-size: 12px">Offre(s) triée selon vos préférences</span></h2>
        <table>  <!-- Tableau des candidats -->
            <tr>
                <th>Nom de l'offre</th>
                <th>Date de l'offre</th>
                <th>Secteur</th>
                <th>Poste</th>
                <th>Nom entreprise</th>
                <th>Telephone contact</th>
                <th>Score de match</th>
            </tr>
            <?php ksort($listeOffreMatch) ?>
            <?php foreach (array_keys($listeOffreMatch) as $key) : ?> <!-- pour chaque candidat -->
                <?php if ($key!=false): ?>
                    <tr> <!-- affichage du nom, prenom, mail...etc du candidat -->
                        <td><?= $listeOffreMatch[$key]->getNomOffre() ?></td>
                        <td><?= $listeOffreMatch[$key]->getDateOffre() ?></td>
                        <td><?= $listeOffreMatch[$key]->getDetailOffre()->getSecteur() ?></td>
                        <td><?= $listeOffreMatch[$key]->getDetailOffre()->getPoste() ?></td>
                        <td><?= $listeOffreMatch[$key]->getEntreprise()->getNom() ?></td>
                        <td><?= $listeOffreMatch[$key]->getEntreprise()->getTelephone() ?></td>
                        <td><?= round((($key+473)*100)/(616),2) ?>%</td>
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
