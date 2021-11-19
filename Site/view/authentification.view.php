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

      <img src="../view/design/logo.png">

      <ul>
        <li> <a href="authentification.view.php">Redirection 1</a> </li>
        <li> <a href="authentification.view.php">Redirection 2</a> </li>
        <li> <a href="authentification.view.php">Redirection 3</a> </li>
      </ul>

      <button type="button" name="action" value="login"><a href="authentification.view.php">Se connecter</a></button>
      <button type="button" name="action" value="signup"><a href="authentificationin.view.php">S'inscrire</a></button>
    </header>

    <!-------------------------------------- Main du Site -------------------------------------->
    <main>

    <section class="formulaireConnection">
        <form>
            <h1> Connexion à votre compte </h1>
            <label > Nom d'utilisateur :</label>
            <input id="in" type="char" name="username" value="<?=$username?>">
            <br></br>
            <label > Mot de passe :</label>
            <input id="in" type="char" name="password" value="<?=$password?>">

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

