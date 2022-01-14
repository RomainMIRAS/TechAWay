
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


    <?php $date = $offre->getDateOffre(); 
    $nom = $offre->getNomOffre(); 

    //Paramètre en lien avec l'entreprise
    $nomEntreprise = $offre->getEntreprise()->getNom(); 
    $mailEntreprise = $offre->getEntreprise()->getMail(); 
    $telephoneEntreprise = $offre->getEntreprise()->getTelephone();
    $villeEntreprise = $offre->getEntreprise()->getVille();
    $paysEntreprise = $offre->getEntreprise()->getPays();
    
    //Paramètre en lien avec les renseignement
    $travailleEtranger = $offre->getDetailOffre()->getTravEtranger();
    $secteur = $offre->getDetailOffre()->getSecteur();
    $typeContrat = $offre->getDetailOffre()->getTypeContrat();
    $poste = $offre->getDetailOffre()->getPoste();
    $typeEntreprise = $offre->getDetailOffre()->getTypeEntreprise();
    
    //Paramètre en lien avec les competence
    $niveauEtude = $offre->getCompetenceRecherche()->getNvEtude();
    $langue = $offre->getCompetenceRecherche()->getlangeParle();
    $langage = $offre->getCompetenceRecherche()->getLangageAcquis();
    
    
    ?>
     <h2>Information générale : </h2>
<p>L'offre se nomme <?php echo "$nom"; ?> et à été crée le <?php echo "$date"; ?>.</p>


<h2>Information sur l'entreprise qui à crée l'offre : </h2>
     <ol>
      <li>Nom : <?php echo "$nomEntreprise"; ?></li>
      <li>Mail : <?php echo "$mailEntreprise"; ?></li>
      <li>Telephone : <?php echo "$telephoneEntreprise"; ?></li>
      <li>Ville : <?php echo "$villeEntreprise"; ?></li>
      <li>Pays : <?php echo "$paysEntreprise"; ?></li>
      <li>Taille de l'entreprise : <?php echo "$typeEntreprise"; ?></li>
     </ol>

<h2>Information sur les renseignement diverse : </h2>
     <ol>
      <li>Accepte les candidat étranger ? : <?php echo "$travailleEtranger"; ?></li>
      <li>Secteur de l'emploie : <?php echo "$secteur"; ?></li>
      <li>Type de contrat : <?php echo "$typeContrat"; ?></li>
      <li>Poste visé : <?php echo "$poste"; ?></li>
     </ol>

<h2>Information sur les compétences attendue : </h2>
     <ol>
      <li>Niveau d'étude attendue : <?php echo "$niveauEtude"; ?></li>
      <li>Langue à maitriser : 
      <ol>
      <?php foreach ($langue as $la) {echo "<li>$la</li>";} ?>
      </ol></li>
      <li>Langage informatique à connaître : 
      <ol>
      <?php foreach ($langage as $la) {echo "<li>$la</li>";} ?>
      </ol></li>
     </ol>
      
      <button id="testtttttt" class="btn-menu-profil">Abandonner cette offre</button>
      
    </main>

    <!-- FOOTER -------------------------------------------------------------------------------->
    <?php include_once('../view/design/footer.php'); ?>



  </body>
</html>
