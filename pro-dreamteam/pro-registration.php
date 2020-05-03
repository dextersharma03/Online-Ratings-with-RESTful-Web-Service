<?php

//Require files
require_once("inc/config.inc.php");
require_once("inc/Entity/Student.class.php");
require_once("inc/Utility/PDOService.class.php");
require_once("inc/Utility/StudentDAO.class.php");
require_once("inc/Utility/LoginManager.class.php");
require_once("inc/Utility/Page.class.php");
//Init studentdao
StudentDAO::init();
//If post is not empty!
if (!empty($_POST)) {
    // if post is create
if ($_POST["action"] == "create")    {
    //Assemble the Section to Insert
     
    $newStudent = new Student();
    //Hash the password!
    $storedHash = password_hash($_POST["password"], PASSWORD_DEFAULT);
    //Send the section to the DAO for insertion
    $newStudent->setFirstName($_POST["firstname"]);
    $newStudent->setLastName($_POST["lastname"]);
    $newStudent->setEmail($_POST["email"]);
    $newStudent->setUsername($_POST["username"]);
    $newStudent->setPassword($storedHash);
    //Send the section to the DAO to be created
    StudentDAO::createStudent($newStudent);

    header('Location: http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) .'/pro-login.php');

    }
}
Page::header();
Page::showRegistrationForm();
Page::footer();


?>