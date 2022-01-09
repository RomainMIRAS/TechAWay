<?php
    include_once(__DIR__."/../model/Utilisateur.class.php");
    include_once(__DIR__."/../model/Candidat.class.php");
    include_once(__DIR__."/../model/Entreprise.class.php");
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

        <h2>Candidats <span style="font-size: 12px"><?= $nbCandidats?> candidat(s) enregistré(s)</span></h2>
        <table>  <!-- Tableau des candidats -->
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Etape</th>
                <th>Ville</th>
                <th>Pays</th>
                <th>Lien CV</th>
                <th>Lien Lettre</th>
                <th>Supprimer</th>
            </tr>
            <?php foreach($candidats as $c): ?> <!-- pour chaque candidat -->
                <?php if ($c!=false): ?>
                    <tr> <!-- affichage du nom, prenom, mail...etc du candidat -->
                        <td><?= $c->getNom() ?></td>
                        <td><?= $c->getPrenom() ?></td>
                        <td><a href="mailto:<?= $c->getMail() ?>"><?= $c->getMail() ?></a></td>
                        <td><?= $c->getTelephone() ?></td>
                        <td><?= $c->getEtape() ?></td>
                        <td><?= $c->getVille() ?></td>
                        <td><?= $c->getPays() ?></td>
                        <td><?= $c->getLienCv() ?></td>
                        <td><?= $c->getLienLM() ?></td>
                        <td class="sup">
                          <form action="tableau.ctrl.php" method="POST">
                            <input type="hidden" name="candidatAction" value="deleteN">
                            <input type="hidden" name="candidatToDelete" value="<?= $c->getMail() ?>">
                            <button type="submit" id="candidatDeleteBtn"><i class="fa fa-times" aria-hidden="true"></i></button>
                          </form>
                        </td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </table>
        <span><?= $candidatMessage ?></span>

        <h2>Entreprises <span style="font-size: 12px"><?= $nbEntreprises ?> entreprise(s) enregistrée(s)</span></h2>
        <div class="nav-options-board">
          <button>Ajouter une entreprise</button>
        </div>
        <table>  <!-- Tableau des entreprises -->
            <tr>
                <th>Nom</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Ville</th>
                <th>Pays</th>
                <th>Supprimer</th>
            </tr>
            <?php foreach($entreprises as $e): ?> <!-- pour chaque candidat -->
                <?php if ($e!=false): ?>
                    <tr> <!-- affichage du nom, prenom, mail...etc du candidat -->
                        <td><?= $c->getNom() ?></td>
                        <td><a href="mailto:<?= $c->getMail() ?>"><?= $c->getMail() ?></a></td>
                        <td><?= $c->getTelephone() ?></td>
                        <td><?= $c->getVille() ?></td>
                        <td><?= $c->getPays() ?></td>
                        <td class="sup">
                          <form action="tableau.ctrl.php" method="POST">
                            <i class="fa fa-times" aria-hidden="true"></i>
                            <input type="hidden" name="entrepriseToDelete" value="<?= $e->getId() ?>">
                          </form>
                        </td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </table>

        <h2>Offres <span style="font-size: 12px"><?= $nbCandidats?> offre(s) enregistrée(s)</span></h2>
        <div class="nav-options-board">
          <button>Ajouter une offre</button>
        </div>
        <!--<div> Ajouter une entreprise 
          <form action="">
            <input type="text" placeholder="Nom">
            <select name="" id="">
              
            </select>
            <button>Ajouter</button>
          </form>
        </div>-->
        <table>  <!-- Tableau des offres -->
            <tr>
                <th>Nom</th>
                <th>Entreprise</th>
                <th>Date</th>
                <th>Supprimer</th>
            </tr>
            <?php foreach($offres as $o): ?> <!-- pour chaque candidat -->
                <?php if ($o!=false): ?>
                    <tr> <!-- affichage du nom, prenom, mail...etc du candidat -->
                        <td><?= $o->getNomOffre() ?></td>
                        <td><?= $o->getEntreprise()->getNom() ?></td>
                        <td><?= $o->getDateOffre() ?></td>
                        <td class="sup">
                          <form action="actionOffre">
                            <i class="fa fa-times" aria-hidden="true"></i>
                          </form>
                        </td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </table>

      </section>

    </main>

    <!-- FOOTER -------------------------------------------------------------------------------->
    <?php include_once('../view/design/footer.php'); ?>



  </body>

  <script src="../framework/jquery-3.6.0.min.js"></script>
  <script>
    $(window).ready(function() {
      $("#candidatDeleteBtn").click(function() {
        if (confirm("Etes-vous sûr de vouloir supprimer ce candidat ?")) {
          document.getElementsByName("candidatAction").value = "deleteY";
        } else {
          document.getElementsByName("candidatAction").value = "deleteN";
        }
      });

    });
  </script>

</html>
