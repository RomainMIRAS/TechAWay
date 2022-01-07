<?php
include_once(__DIR__."/../model/DAO.class.php"); // Singleton


	if(isset($_GET['email'], $_GET['key']) AND !empty($_GET['email']) AND !empty($_GET['key'])) {
	   $email = htmlspecialchars(urldecode($_GET['email']));
	   $key = htmlspecialchars($_GET['key']);
     session_start();
     if (isset($_SESSION['key'])) $confirmekey = $_SESSION['key'];
     if (isset($_SESSION['email'])) $confirmeemail = $_SESSION['email'];
     session_write_close();
	   if($confirmekey == $key && $confirmeemail == $email) {
	         echo "Votre compte a bien été confirmé !";
           DAO::get()->createUtilisateur($email, $password);
           session_start();
           unset( $_SESSION['key'] );
           unset( $_SESSION['email'] );
           $_SESSION['utilisateur'] = DAO::get()->getCoachOuCandidat($email,$password);
           sleep(5);
           header('Location: main.ctrl.php');
	      } else {
	         echo "Votre compte a déjà été confirmé !";
	      }
	   } else {
	      echo "L'utilisateur n'existe pas !";
	   }
	}
?>
