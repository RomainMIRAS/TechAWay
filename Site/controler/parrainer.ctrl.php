<?php

include_once(__DIR__."/../framework/view.class.php");

$nomCandidat = (isset($_POST['nomCandidat'])) ? $_POST['nomCandidat']:"";
$nomCandidat = (isset($_POST['telCandidat'])) ? $_POST['telCandidat']:"";
$nomParrainer = (isset($_POST['nomParrainer'])) ? $_POST['nomParrain']:"";
$telCandidat = (isset($_POST['telParrainer'])) ? $_POST['telParrain']:"";

$view = new View();
$view->display("parrainer.view.php");

?>