<?php
include_once(__DIR__."/../../model/Utilisateur.class.php");
include_once(__DIR__."/../../model/Candidat.class.php");
include_once(__DIR__."/../../model/Coach.class.php");

session_start();
//$_SESSION['utilisateur']->getMail() (Pour avoir le mail utilisé !!!)
 ?>
<nav>
    <ul>
        <li><a href="main.ctrl.php"><img id="logo" src="../view/design/img/logo.png" ></a></li>
        <div>
          <li><a href="recruter.ctrl.php">Recruter</a></li>
          <li><a href="#">Trouver un job</a></li>
          <li><a href="parrainer.ctrl.php">Parrainer</a></li>
        </div>
    </ul>

    <ul>

      <?php if (!isset($_SESSION['utilisateur'])): //Si pas connecté?>
      <form action="../controler/authentification.ctrl.php" method="post" id="nav-log">
        <li><button id="signup" type="submit" name="action" value="signup">S'inscrire</button></li>
        <li><button id="login" type="submit" name="action" value="login">S'identifier</button></li>
      </form>
      <?php else: ?>
        <script src="../../framework/jquery-3.6.0.min.js"></script>

        <div id="btn-compte">
          <img src="../view/design/img/profil.jpg" alt="">
        </div>

        <div id="menu-drop">
          <ul>

            <div id="menu-part1">
              <li id="user-mail"><?= $_SESSION['utilisateur']->getMail() ?></li>
              <li id="user-type"><?= get_class($_SESSION['utilisateur']) ?></li>
            </div>

            <div id="menu-part2">
              <?php if (is_a($_SESSION['utilisateur'],"Candidat")) : ?>
                <li><a href="#"><i class="fa fa-user"></i> Mon profil</a></li>
                <li><a href="#"><i class="fa fa-pencil-square-o"></i> Editer mon profil</a></li>
                <li><a href="../controler/recrutement-candidat.ctrl.php"><i class="fa fa-level-up" aria-hidden="true"></i> Mon Recrutement</a></li>
              <?php endif; ?>
              <form action="../controler/main.ctrl.php" method="post">
                <li><button id="btn-logout" type="submit" name="logout" value="true"><i class="fa fa-sign-out" aria-hidden="true"></i> Déconnexion</button></li>
              </form>
            </div>

          </ul>
        </div>

        <script>
          $(document).ready(function(){
            $("#btn-compte").click(function(){
              $("#menu-drop").toggle();
            });
          });
        </script>

      <?php endif; ?>
    </ul>
</nav>
