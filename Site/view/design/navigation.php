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
        <li><a href="#">Recruter</a></li>
        <li><a href="#">Trouver un job</a></li>
        <li><a href="#">Nous rejoindre</a></li>
    </ul>

    <ul>

      <?php if (!isset($_SESSION['utilisateur'])): //Si pas connecté?>
      <form action="../controler/authentification.ctrl.php" method="post">
        <li><button type="submit" name="action" value="signup">S'inscrire</button></li>
        <li><button type="submit" name="action" value="login">S'identifier</button></li>
      </form>
      <?php else: ?>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <button id="btn-compte">Compte</button>

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
