<?php

$servername = "localhost";
$username = "AMS_User";
$password = "P@ssW0rdAMS2023";

    session_start();
    $data = json_decode(
        file_get_contents('php://input') 
    );
    
?>