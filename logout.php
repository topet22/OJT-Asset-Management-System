<?php  
        session_start(); 
        $servername = "localhost";
        $username = "AMS_User";
        $password = "P@ssW0rdAMS2023";

        if(isset($_SESSION['SAuser_name'])){
                $conn = new PDO("mysql:host=$servername;dbname=ihoms_inventory", $username, $password);
                $action = "Logged Out"; 
                $sql2 = "INSERT INTO audit_r3 (audit_USER, audit_ACTION) VALUES ('". $_SESSION['SAuser_name'] ."','". $action ."')"; 
                $conn->exec($sql2);
        }


        if(isset($_SESSION['Auser_name'])){
                $conn = new PDO("mysql:host=$servername;dbname=ihoms_inventory", $username, $password);
                $action = "Logged Out"; 
                $sql2 = "INSERT INTO audit_r3 (audit_USER, audit_ACTION) VALUES ('". $_SESSION['Auser_name'] ."','". $action ."')"; 
                $conn->exec($sql2);
        }

        if(isset($_SESSION['user_name'])){
                $conn = new PDO("mysql:host=$servername;dbname=ihoms_inventory", $username, $password);
                $action = "Logged Out"; 
                $sql2 = "INSERT INTO audit_r3 (audit_USER, audit_ACTION) VALUES ('". $_SESSION['user_name'] ."','". $action ."')"; 
                $conn->exec($sql2);
        }
        


        session_destroy();   
        header("location:index.php");
?>  