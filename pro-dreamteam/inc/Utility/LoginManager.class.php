<?php

class LoginManager  {

    //This function checks if the user is logged in, if they are not they are redirected to the login page
    static function verifyLogin()   {

        //Check for a session
        if(session_status() !== PHP_SESSION_ACTIVE){             
        //Start it up
        session_start();
        }

        //If there is session data
        if (array_key_exists('user', $_SESSION)) {
        //The user is loggedin, return true
                return true;
        } else {

            //The user is not logged in
            //Destroy any session just in case
            session_destroy();

            //Send them back to the login pages
            header('Location: http://' . $_SERVER['HTTP_HOST']. dirname($_SERVER['PHP_SELF']) .'/pro-login.php');

            return false;

        }
    }
        
    
}

?>