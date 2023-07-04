<?php

session_start();
$servername = "localhost";
$username = "AMS_User";
$password = "P@ssW0rdAMS2023";

$_SESSION['user_name'];
$_SESSION['depts'];

try {
    $conn = new PDO("mysql:host=$servername;dbname=ihoms_inventory", $username, $password);  
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //printer
    $getPrinter = $conn->prepare("SELECT * FROM tbl_pm where PM_Department = '".$_SESSION['depts']."' ");
    $getPrinter->execute();
    $printers = $getPrinter->fetchAll();
    $data1=array();
    foreach ($printers as $printer) {
        array_push($data1,
           array("PM_Department"=>$printer["PM_Department"],"PM_SerialPC"=>$printer["PM_SerialPC"],"PM_STATUS"=>$printer["PM_STATUS"],"PM_ID"=>$printer["PM_ID"],"PM_DoneBy"=>$printer["PM_DoneBy"],"PM_DesigUser"=>$printer["PM_DesigUser"],
        ));
   }
    
        echo json_encode($data1);
      
        } 
catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>