 
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../view/design/style.css">
    <title>Tech A Way</title>
  </head>
  <body>
    
    <!-------------------------------------- Header du site --------------------------------------->
    <?php require('header.php');  ?>

    <!-------------------------------------- Main du Site -------------------------------------->
    <main>




    

      <!-- Section du formulaire -->
      

      <?php if ($action == "formulaire"): ?>
        <section class="formulaire">
            <form class="form" action="formulaire.ctrl.php" method="get">
              <h1>Formulaire</h1>
              <!-- Saisie des informations du candidat -->
              <label for="nom">Nom</label>
              <input id="nom" type="text" name="nom" placeholder="Entrer votre nom" required>
              <label for="prenom">Prenom</label>
              <input id="prenom" type="text" name="prenom" placeholder="Entrer votre prenom" required>
              <label for="age">Date de naissance</label>
              <input id="age" type="date" name="age" placeholder="Renseigner votre date de naissance" required>
              <label for="tel">Telephone</label>
              <!-- type tel -> seul les chiffres sont autorisé -->
              <input id="tel" type="tel" name="tel" required>
              

              <!-- Section du pays parmis la liste des pays europeens -->
              <label for="pays">Pays</label>
              <select name="pays">

                  
                  <option value="Afghanistan">Afghanistan </option>
                  <option value="Afrique_Centrale">Afrique_Centrale </option>
                  <option value="Allemagne">Allemagne </option>
                  <option value="Autriche">Autriche</option>
                  <option value="Andorre">Andorre</option>
                  <option value="Belgique">Belgique</option>
                  <option value="Boznie_Herzegovine">Boznie_Herzegovine</option>
                  <option value="Bulgarie">Bulgarie</option>
                  <option value="Chypre">Chypre</option>
                  <option value="Croatie">Croatie</option>
                  <option value="Danemark">Danemark</option>
                  <option value="Espagne">Espagne</option>
                  <option value="Estonie">Estonie</option>
                  <option value="Finlande">Finlande</option>
                  <option value="France">France</option>
                  <option value="Gibraltar">Gibraltar</option>
                  <option value="Grece">Grece</option>
                  <option value="Hongrie">Hongrie</option>
                  <option value="Irlande">Irlande</option>
                  <option value="Islande">Islande</option>
                  <option value="Italie">Italie</option>
                  <option value="Lettonie">Lettonie</option>
                  <option value="Liechtenstein">Liechtenstein</option>
                  <option value="Lituanie">Lituanie</option>
                  <option value="Luxembourg">Luxembourg</option>
                  <option value="Malte">Malte</option>
                  <option value="Monaco">Monaco</option>
                  <option value="Norvege">Norvege</option>
                  <option value="Pays_Bas">Pays_Bas</option>
                  <option value="Pays de Galle">Pays de Galle</option>
                  <option value="Pologne">Pologne</option>
                  <option value="Portugal">Portugal</option>
                  <option value="Republique_Tcheque">Republique_Tcheque</option>
                  <option value="Roumanie">Roumanie</option>
                  <option value="Royaume_Uni">Royaume_Uni</option>
                  <option value="Russie">Russie</option>
                  <option value="Slovaquie">Slovaquie</option>
                  <option value="Slovenie">Slovenie</option>
                  <option value="Suede">Suede</option>
                  <option value="Suisse">Suisse</option>
                  <option value="Ukraine">Ukraine</option>
                  <option value="Vatican">Vatican </option>
              </select>

              <label for="ville">Ville</label>
              <input id="ville" type="text" name="ville" placeholder="Entrer votre ville" required>

              
              <button type="submit" name="etape" value="competences">Suivant</button>
              </form>
          </section>   
            


      <?php elseif ($action == "competences"): ?>
          <section class="competences">
            <form class="form" action="formulaire.ctrl.php" method="get">
              <h1>Formulaire</h1>
              <!-- Saisie des competences du candidat -->
              <label for="nvEtude">Niveau d'etudes</label>
              <input id="nvEtude" type="text" name="nvEtude" placeholder="Format : Bac+3" required>
              <label for="langueParle">Langues parlé</label>
              <input id="langueParle" type="text" name="langueParle" placeholder="ex : francais, anglais" required>
              <label for="nvEtude">Niveau d'etudes</label>
              <input id="nvEtude" type="text" name="nvEtude" placeholder="Format : Bac+3" required>
              <form action ="formulaire.ctrl.php" method="post">
              <button type="submit" value="formulaire">Precedent</button>
              <input type="submit" name ="etape" value='Envoyer' >
              </form>
          </section>    
              
      <?php endif; ?>

              

    </main>    
        
    <!---------------------------------------- Footer du site ---------------------------------------->
    <?php require('footer.php');  ?>


  </body>
</html>

</body>
</html>
