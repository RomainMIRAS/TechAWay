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
                <th>Date de création</th>
                <th>Modifier</th>
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
                        <td><?= $c->getDateCreation() ?></td>
                        <td class="sup">
                          <button class="editBtn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                        </td>
                        <td class="sup">
                          <form action="tableau.ctrl.php" method="POST">
                            <input type="hidden" class="candidatAction" name="candidatAction" value="deleteN">
                            <input type="hidden" name="candidatToDelete" value="<?= $c->getMail() ?>">
                            <button type="submit" class="candidatDeleteBtn"><i class="fa fa-times" aria-hidden="true"></i></button>
                          </form>
                        </td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </table>
        <span class="deleteMessage"><?= $candidatMessage ?></span>

        <h2>Entreprises <span style="font-size: 12px"><?= $nbEntreprises ?> entreprise(s) enregistrée(s)</span></h2>
        <div class="nav-options-board">
          <button id="addEntrepriseBtn">Ajouter une entreprise</button>
        </div>
        <table>  <!-- Tableau des entreprises -->
            <tr>
                <th>Nom</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Ville</th>
                <th>Pays</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
            <?php foreach($entreprises as $e): ?> <!-- pour chaque candidat -->
                <?php if ($e!=false): ?>
                    <tr> <!-- affichage du nom, prenom, mail...etc du candidat -->
                        <td><?= $e->getNom() ?></td>
                        <td><a href="mailto:<?= $e->getMail() ?>"><?= $e->getMail() ?></a></td>
                        <td><?= $e->getTelephone() ?></td>
                        <td><?= $e->getVille() ?></td>
                        <td><?= $e->getPays() ?></td>
                        <td class="sup">
                          <button class="editBtn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                        </td>
                        <td class="sup">
                          <form action="tableau.ctrl.php" method="POST">
                            <input type="hidden" class="entrepriseAction" name="entrepriseAction" value="deleteN">
                            <input type="hidden" name="entrepriseToDelete" value="<?= $e->getId() ?>">
                            <button type="submit" class="entrepriseDeleteBtn"><i class="fa fa-times" aria-hidden="true"></i></button>
                          </form>
                        </td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </table>
        <span class="deleteMessage"><?= $entrepriseMessage ?></span>

        <h2>Offres <span style="font-size: 12px"><?= $nbOffres ?> offre(s) enregistrée(s)</span></h2>
        <div class="nav-options-board">
          <button id="addOffreBtn">Ajouter une offre</button>
        </div>
        <table>  <!-- Tableau des offres -->
            <tr>
                <th>Nom</th>
                <th>Entreprise</th>
                <th>Date</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
            <?php foreach($offres as $o): ?> <!-- pour chaque candidat -->
                <?php if ($o!=false): ?>
                    <tr> <!-- affichage du nom, prenom, mail...etc du candidat -->
                        <td><?= $o->getNomOffre() ?></td>
                        <td><?= $o->getEntreprise()->getNom() ?></td>
                        <td><?= $o->getDateOffre() ?></td>
                        <td class="sup">
                          <button class="editBtn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                        </td>
                        <td class="sup">
                          <form action="tableau.ctrl.php" method="POST">
                            <input type="hidden" class="offreAction" name="offreAction" value="deleteN">
                            <input type="hidden" name="offreToDelete" value="<?= $o->getId() ?>">
                            <button type="submit" class="offreDeleteBtn"><i class="fa fa-times" aria-hidden="true"></i></button>
                          </form>
                        </td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </table>
        <span class="deleteMessage"><?= $offreMessage ?></span>

      </section>

    </main>
    <div id="addEntrepriseSection" class="newSectionBg">
      <div class="addNewSection"> <!-- Ajouter une entreprise -->
            <button id="addEntrepriseClose">Fermer</button>
            <h3>Ajouter une entreprise</h3>
            <form action="tableau.ctrl.php" method="POST">
              <label for="nom">Nom *</label>
              <input type="text" name="entrepriseName" placeholder="Entrez le nom de l'entreprise" >
              <label for="mail">Adresse E-mail *</label>
              <input type="mail" name="entrepriseMail" placeholder="Entrez l' adresse mail de l'entreprise" >
              <label for="tel">Téléphone</label>
              <input type="mail" name="entrepriseTel" placeholder="Entrez le téléphone de l'entreprise" >
              <label for="tel">Pays *</label>
              <select name="entreprisePays" id="">
                <?php foreach($listePays as $pays): ?>
                  <option value="<?= $pays ?>"><?= $pays ?></option>
                <?php endforeach; ?>
              </select>
              <label for="ville">Ville</label>
              <input type="text" name="entrepriseVille" placeholder="Entrez la ville l'entreprise" >
              <button type="submit" name="ajouterEntrepriseBtn" value="ajouterEntreprise">Ajouter</button>
            </form>
            <span class="erreur"></span>
            <span class="asterisque">* : Champ obligatoire</span>
          </div>
        </div>
      </div>
    <div id="addOffreSection" class="newSectionBg">
      <div class="addNewSection"> <!-- Ajouter une offre -->
          <button id="addOffreClose">Fermer</button>
          <h3>Ajouter une offre</h3>
          <form action="tableau.ctrl.php" method="POST">
            <label for="nom">Nom *</label>
            <input type="text" name="offreName" placeholder="Entrez le nom de l'offre" >
            <label for="">Entreprise *</label>
            <select name="idEntrepriseOffre" id="">
              <?php foreach($entreprises as $e): ?>
                <option value="<?= $e->getId() ?>"><?= $e->getNom() ?></option>
              <?php endforeach; ?>
            </select>
            <label for="nvEtude">Niveau d'etudes</label>
              <select name="nvEtude">
                      <option value="bac" selected>Bac</option>
                      <option value="bac+1" >Bac +1</option>
                      <option value="bac+2" >Bac +2</option>
                      <option value="bac+3" >Bac +3</option>
                      <option value="bac+4" >Bac +4</option>
                      <option value="bac+5" >Bac +5</option>
                      <option value="bac+6" >Bac +6</option>
                      <option value="bac+7" >Bac +7</option>
                      <option value="bac+8" >Bac +8</option>
              </select>
              <label for="langueParle[]">Langue(s) parlée(s)</label>
                <div class="list-check"> <!-- Liste des langues -->
                  <input type="checkbox" name="langueParle[]" value="francais" selected>Français</option>
                  <input type="checkbox" name="langueParle[]" value="anglais" >Anglais</option>
                  <input type="checkbox" name="langueParle[]" value="espagnole" >Espagnol</option>
                  <input type="checkbox" name="langueParle[]" value="italien" >Italien</option>
                  <input type="checkbox" name="langueParle[]" value="allemand">Allemand</option>
                  <input type="checkbox" name="langueParle[]" value="albanais">Albanais</option>
                </div>
              <label for="languageAquis[]">Language(s) infomatique connu(s)</label>
              <div class="list-check"> <!-- Liste des langages -->
                <input type="checkbox" name="languageAquis[]" value="php" selected>PHP</option>
                <input type="checkbox" name="languageAquis[]" value="hmtl/css" >HTML/CSS</option>
                <input type="checkbox" name="languageAquis[]" value="c" >C#, C ou C++</option>
                <input type="checkbox" name="languageAquis[]" value="python" >Python</option>
                <input type="checkbox" name="languageAquis[]" value="perl">PERL</option>
                <input type="checkbox" name="languageAquis[]" value="java">Java</option>
                <input type="checkbox" name="languageAquis[]" value="ruby">Ruby</option>
                <input type="checkbox" name="languageAquis[]" value="swift">Swift</option>
                <input type="checkbox" name="languageAquis[]" value="julia">Julia</option>
                <input type="checkbox" name="languageAquis[]" value="scala">Scala</option>
              </div>

              <label for="travEtranger">Travail à l'etranger</label>
              <div class="list-radio">
                <input type="radio" name="travEtranger" value=true>
                <label for="oui">Oui</label>
                <input type="radio" name="travEtranger" value=false>
                <label for="oui">Non</label>
              </div>



              <label for="typeContrat">Type de contrat</label>
              <select name="typeContrat" >
                  <option value="">--Veuillez choisir une option--</option>
                  <option value="cdi">CDI</option>
                  <option value="cdd">CDD</option>
              </select>

              <label for="secteur">Secteur de travail</label>
              <select name="secteur" >
                  <option value="">--Veuillez choisir une option--</option>
                  <option value="Informatique">Informatique</option>
                  <option value="Autre">Autre</option>
              </select>

              <label for="poste">Poste</label>
              <select name="poste" >
                  <option value="">--Veuillez choisir une option--</option>
                  <option value="Développeur">Développeur</option>
                  <option value="Développeur de jeux video">Développeur de jeux video</option>
                  <option value="Front-end développeur">Front-end développeur</option>
                  <option value="Back-end développeur">Back-end développeur</option>
                  <option value="Full stack  développeur">Full stack  développeur</option>
              </select>

              <form action ="formulaire.ctrl.php" method="post">
              <output><?=$erreur?></output>
              <input type="hidden" name="etape" value="competences">
            <button type="submit" name="ajouterOffreBtn" value="ajouterOffre">Ajouter</button>
          </form>
          <span class="erreur"></span>
          <span class="asterisque">* : Champ obligatoire</span>
        </div>
      </div>
    
        <!-- FOOTER -------------------------------------------------------------------------------->
    <?php include_once('../view/design/footer.php'); ?>



  </body>

  <script src="../framework/jquery-3.6.0.min.js"></script>
  <script>
    $(window).ready(function() {

      $(".candidatDeleteBtn").click(function() { /* Affichage d'une fenêtre de confirmation pour la suppression d'un candidat */
        if (confirm("Etes-vous sûr de vouloir supprimer ce candidat ?")) {
          $(".candidatAction").val("deleteY");
        } else {
          $(".candidatAction").val("deleteN");
        }
      });

      $(".entrepriseDeleteBtn").click(function() { /* Affichage d'une fenêtre de confirmation pour la suppression d'une entreprise */
        if (confirm("Etes-vous sûr de vouloir supprimer cette entreprise ?")) {
          $(".entrepriseAction").val("deleteY");
        } else {
          $(".entrepriseAction").val("deleteN");
        }
      });

      $(".offreDeleteBtn").click(function() { /* Affichage d'une fenêtre de confirmation pour la suppression d'une offre */
        if (confirm("Etes-vous sûr de vouloir supprimer cette offre ?")) {
          $(".offreAction").val("deleteY");
        } else {
          $(".offreAction").val("deleteN");
        }
      });

      /* Modifier candidat */
      $(".editCandidatSection").hide();
      $(".editBtn").click(function() {
        $(".editCandidatSection").show();
      });
      $(".editCandidatClose").click(function() {
        $(".editCandidatSection").hide();
      });

      /* Ajouter entreprise */
      $("#addEntrepriseSection").hide();
      $("#addEntrepriseBtn").click(function() {
        $("#addEntrepriseSection").show();
      });
      $("#addEntrepriseClose").click(function() {
        $("#addEntrepriseSection").hide();
      });

      /* Ajouter offre */
      $("#addOffreSection").hide();
      $("#addOffreBtn").click(function() {
        $("#addOffreSection").show();
      });
      $("#addOffreClose").click(function() {
        $("#addOffreSection").hide();
      });

    });
  </script>

</html>
