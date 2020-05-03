<?php
//////////////
// $urlpeices = explode("/",$_SERVER['REQUEST_URI']);
// $api_url = "http://localhost";

// for ($i = 0; $i < count($urlpeices) -1; $i++)   {
//     $api_url .= "/".$urlpeices[$i];
// }
// $api_url .= "/RestAPI.php";


// define('API_URL', $api_url);




//Set all the database things!
define("DB_HOST", "localhost");  
define("DB_USER", "root");  
define("DB_PASS", "");  
define("DB_NAME", "csis3280project");  


define('API_URL','http://localhost:8080/pro-dreamteam/RestAPI.php')

?>
