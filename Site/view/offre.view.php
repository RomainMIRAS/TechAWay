
<?php
    include_once(__DIR__."/../model/Offre.class.php");
    include_once(__DIR__."/../model/DAO.class.php");
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
    <h1>Voici les informations sur l'offre à laquelle vous avez postulé<h1/>


    <?php //On récupère toutes les infos sur l'offre

    //Info générale
    $date = $offre->getDateOffre(); 
    $nom = $offre->getNomOffre(); 

    //Info en lien avec les renseignement
    $pays = $offre->getEntreprise()->getPays();
    $travailleEtranger = $offre->getDetailOffre()->getTravEtranger();
    $secteur = $offre->getDetailOffre()->getSecteur();
    $typeContrat = $offre->getDetailOffre()->getTypeContrat();
    $poste = $offre->getDetailOffre()->getPoste();
    $typeEntreprise = $offre->getDetailOffre()->getTypeEntreprise();
    
    //Info en lien avec les competence
    $niveauEtude = $offre->getCompetenceRecherche()->getNvEtude();
    $langue = $offre->getCompetenceRecherche()->getlangeParle();
    $langage = $offre->getCompetenceRecherche()->getLangageAcquis();
    ?>
    

                          
                          <!-- On affiche toutes les infos sur l'offre -->
<h2>Information générale : </h2>
<p>L'offre se nomme <?php echo "$nom"; ?> et à été crée le <?php echo "$date"; ?>.</p>

<h2>Information sur les renseignement diverse : </h2>
     <ol style="list-style: inside;">
      <li>L'entreprise se situe en : <?php echo "$pays"; ?></li>
      <li>Accepte les candidat étranger ? : <?php if ($travailleEtranger) { echo "Oui";} else {echo "Non";} ?></li>
      <li>Secteur de l'emploie : <?php echo "$secteur"; ?></li>
      <li>Type de contrat : <?php echo "$typeContrat"; ?></li>
      <li>Poste visé : <?php echo "$poste"; ?></li>
     </ol>

<h2>Information sur les compétences attendue : </h2>
     <ol style="list-style: inside;">
      <li>Niveau d'étude attendue : <?php echo "$niveauEtude"; ?></li>
      <li>Langue à maitriser : 
      <ol style="list-style: inside;">
      <?php foreach ($langue as $la) {echo "<li>$la</li>";} ?>
      </ol></li>
      <li>Langage informatique à connaître : 
      <ol style="list-style: inside;">
      <?php foreach ($langage as $la) {echo "<li>$la</li>";} ?>
      </ol></li>
     </ol>
      
      <form action="offre.ctrl.php" method="POST">
         <input type="hidden" class="action" name="action" value="supprN">
         <button type="submit" class="candidatDeleteBtn">Abandonner l'offre</button>
      </form>
      
    </main>

    <!-- FOOTER -------------------------------------------------------------------------------->
    <?php include_once('../view/design/footer.php'); ?>



  </body>

  
  <script src="../framework/jquery-3.6.0.min.js"></script>
  <script>
    $(window).ready(function() {

      $(".candidatDeleteBtn").click(function() { /* Affichage d'une fenêtre de confirmation pour l'abandon d'une offre */
        if (confirm("Etes-vous sûr de vouloir abandonner cette offre ?")) {
          $(".action").val("supprY");
        } else {
          $(".action").val("supprN");
        }
      });
      });

  </script>
</html>
