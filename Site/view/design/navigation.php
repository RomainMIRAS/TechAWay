<?php

session_start();
$islog = isset($_SESSION['login']);
session_write_close();

 ?>

<nav>
    <ul>
        <li><a href="main.ctrl.php"><img id="logo" src="../view/design/img/logo.png" ></a></li>
        <li><a href="#">Recruter</a></li>
        <li><a href="#">Trouver un job</a></li>
        <li><a href="#">Nous rejoindre</a></li>
    </ul>
    <?php if ($islog): ?>
    <ul>


      <form action="../controler/authentification.ctrl.php" method="post">
        <li><button type="submit" name="action" value="signup">S'inscrire</button></li>
        <li><button type="submit" name="action" value="login">Se connecter</button></li>
      </form>
    </ul>
    <?php endif; ?>
</nav>
