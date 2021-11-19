<!DOCTYPE html>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../view/design/style.css">
    <title>Tech A Way</title>
  </head>
  <body>

    <!-------------------------------------- Header du site --------------------------------------->
    <header>
      <h1>Tech A Way</h1>
      <nav>

      <img src="../view/design/logo.png">

      <ul>
        <li> <a href="authentification.view.php">Redirection 1</a> </li>
        <li> <a href="authentification.view.php">Redirection 2</a> </li>
        <li> <a href="authentification.view.php">Redirection 3</a> </li>
      </ul>


      <div class="authentification">
        <button type="button" name="action" value="login"><a href="authentification.ctrl.php">Se connecter</a></button>
        <button type="button" name="action" value="signup"><a href="authentification.ctrl.php">S'inscrire</a></button>
      </div>

    </nav>

    </header>

    <!-------------------------------------- Main du Site -------------------------------------->
    <main>

    <section class="formulaireConnection">
      <form class="" action="authentification.ctrl.php" method="get">
          <h1>Connexion</h1>
          <output class="w3-pale-red"><?=$erreur?></output>
          <label for="username">Nom d'utilisateur</label>
          <input id="username" type="text" name="username" placeholder="Entrer votre nom d'utilisateur" required>
          <label for="password">Mot de passe</label>
          <input id="password" type="password" name="password" placeholder="Mot de passe" required>
          <input type="submit" id='submit' value='LOGIN' >

      </form>
    </section>
    
    </main>

    <!---------------------------------------- Footer du site ---------------------------------------->
    <footer>
        <ul>
          <li> <a href="authentification.view.php">Lien footer 1</a> </li>
          <li> <a href="authentification.view.php">Lien footer 2</a> </li>
          <li> <a href="authentification.view.php">Lien footer 3</a> </li>
        </ul>
    </footer>


  </body>
</html>

</body>
</html>

