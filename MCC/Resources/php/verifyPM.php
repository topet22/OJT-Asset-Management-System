<?php
    session_start();
    $servername = "localhost";
    $username = "AMS_User";
    $password = "P@ssW0rdAMS2023";

    $_SESSION['user_name'];
    $_SESSION['depts']; 

    $data = json_decode(
        file_get_contents('php://input') 
    );
    
    $propID=$data->data->JO_Num;

    try {
        $conn = new PDO("mysql:host=$servername;dbname=ihoms_inventory", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //computer
        $sql = "UPDATE tbl_pm set  
        PM_STATUS = 'VERIFIED' where PM_ID='". $propID ."'";
        $conn->exec($sql);
        echo 1;
    } 
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>
