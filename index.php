<?php
/*
session_start();
require_once 'config/connexion.php';
$query = mysqli_query($con, "SELECT user.username FROM user wher");
*/

require_once 'core/classes/Controller.php';
require_once 'src/Controllers/DefaultController.php';
require_once 'src/Utils/Path.php';

$controller = new DefaultController();

$controller->render("login/register");


?>

