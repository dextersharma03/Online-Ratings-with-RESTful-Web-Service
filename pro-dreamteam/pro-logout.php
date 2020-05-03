<?php
//Require files
require_once("inc/config.inc.php");
require_once("inc/Entity/Student.class.php");
require_once("inc/Utility/PDOService.class.php");
require_once("inc/Utility/StudentDAO.class.php");
require_once("inc/Utility/LoginManager.class.php");
require_once("inc/Utility/Page.class.php");

//Start the sesion... one last time!
session_start();
$a = $_SESSION['user'];
$check = $a->getUsername();
if($check=="admin"){
    unset($_SESSION['user']);
    session_destroy();

    header('Location: http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) .'/pro-login.php');
}
unset($_SESSION['user']);

//Destroy the sesison
session_destroy();

header('Location: http://localhost:8000');
Page::header();

Page::footer();

?>