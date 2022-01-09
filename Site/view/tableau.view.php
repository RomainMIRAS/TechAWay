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
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </table>

        <h2>Entreprises <span style="font-size: 12px"><?= $nbEntreprises ?> entreprise(s) enregistrée(s)</span></h2>
        <div>
          <button>Ajouter</button>
          <button>Effacer</button>
        </div>

        <h2>Offres <span style="font-size: 12px"><?= $nbCandidats?> offre(s) enregistrée(s)</span></h2>
        <div>
          <button>Ajouter</button>
          <button>Effacer</button>
        </div>
        <table>  <!-- Tableau des offres -->
            <tr>
                <th>Nom</th>
                <th>Entreprise</th>
                <th>Date</th>
                <th>Nombres de candidats</th>
            </tr>
            <?php foreach($offres as $o): ?> <!-- pour chaque candidat -->
                <?php if ($o!=false): ?>
                    <tr> <!-- affichage du nom, prenom, mail...etc du candidat -->
                        <td><?= $o->getNomOffre() ?></td>
                        <td><?= $o->getEntreprise()->getNom() ?></td>
                        <td><?= $o->getDateOffre() ?></td>
                        <td><?= $o->getDateOffre() ?></td>
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
