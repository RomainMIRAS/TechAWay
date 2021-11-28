<?php

session_start();
if (isset($_SESSION['login'])){
  $islog = true;
  $candidat = $_SESSION['login'];
} else {
  $islog = false;
}
session_write_close();

 ?>

<nav>
    <ul>
        <li><a href="main.ctrl.php"><img id="logo" src="../view/design/img/logo.png" ></a></li>
        <li><a href="#">Recruter</a></li>
        <li><a href="#">Trouver un job</a></li>
        <li><a href="#">Nous rejoindre</a></li>
    </ul>

    <ul>
      <?php if (!$islog): ?>

      <form action="../controler/authentification.ctrl.php" method="post">
        <li><button type="submit" name="action" value="signup">S'inscrire</button></li>
        <li><button type="submit" name="action" value="login">Se connecter</button></li>
      </form>
      <?php else: ?>
        <p>Vous êtes connecté avec <?= $candidat->getMail()?></p>
      <?php endif; ?>
    </ul>
</nav>
