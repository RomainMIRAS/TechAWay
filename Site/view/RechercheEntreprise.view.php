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

      <section id="tableau-bord">

        <h1>Offre(s) triée(s) selon vos préférences</h1>
        <table>  <!-- Tableau des offres -->
            <tr>
                <th>Nom de l'offre</th>
                <th>Date de l'offre</th>
                <th>Secteur</th>
                <th>Poste</th>
                <th>Pays de l'entreprise</th>
                <th>Accepte les étrangers</th>
                <th>Type de contrat</th>
                <th>Score de match</th>
                <th>Postuler</th>
            </tr>
            <?php krsort($listeOffreMatch) ?> <!-- On trie les offres par score décroissant -->
            <?php foreach (array_keys($listeOffreMatch) as $key) : ?> <!-- pour chaque offre -->
                <?php if ($key!=false): ?>
                    <tr> <!-- affichage du nom, date, secteur...etc de l'offre -->
                        <td><?= $listeOffreMatch[$key]->getNomOffre() ?></td>
                        <td><?= $listeOffreMatch[$key]->getDateOffre() ?></td>
                        <td><?= $listeOffreMatch[$key]->getDetailOffre()->getSecteur() ?></td>
                        <td><?= $listeOffreMatch[$key]->getDetailOffre()->getPoste() ?></td>
                        <td><?= $listeOffreMatch[$key]->getEntreprise()->getPays() ?></td>
                        <td><?php if ($listeOffreMatch[$key]->getDetailOffre()->getTravEtranger()) { echo "oui";} else { echo "non";} ?></td>
                        <td><?= $listeOffreMatch[$key]->getDetailOffre()->getTypeContrat() ?></td>
                        <td><?= round((($key+473)*100)/(616)) ?>%</td>
                        <td class="sup">
                          <form action="RechercheEntreprise.ctrl.php" method="POST">
                            <input type="hidden" class="action" name="action" value="ajouteN">
                            <input type="hidden" name="offreAAdd" value="<?= $listeOffreMatch[$key]->getId() ?>">
                            <button type="submit" class="postuler"><i class="fa fa-check-circle-o" aria-hidden="true"></i></button>
                          </form>
                        </td>
                    </tr>
                  
                <?php endif; ?>
            <?php endforeach; ?>
        </table>
        <span class="deleteMessage"><?= $message ?></span>
      </section>
    </main>

    <!-- FOOTER -------------------------------------------------------------------------------->
    <?php include_once('../view/design/footer.php'); ?>



  </body>

  <script src="../framework/jquery-3.6.0.min.js"></script>
  <script>
    $(window).ready(function() {

      $(".postuler").click(function() { /* Affichage d'une fenêtre de confirmation pour valider la postulation */
        if (confirm("Etes-vous sûr de vouloir ajouter cette offre ?")) {
          $(".action").val("ajouteY");
        } else {
          $(".action").val("ajouteN");
        }
      });

    });
  </script>
  

</html>
