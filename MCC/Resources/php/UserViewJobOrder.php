<?php
    session_start();
    $servername = "localhost";
    $username = "AMS_User";
    $password = "P@ssW0rdAMS2023";

    $data = json_decode(
        file_get_contents('php://input') 
    );

    $_SESSION['Auser_name'];
    $_SESSION['Afull_name'];


    $classify=$data->classify;
    $jooid=$data->jooid;


    try {
    $conn = new PDO("mysql:host=$servername;dbname=ihoms_inventory", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   

    if($classify == "Regular"){
        $sql1 = "UPDATE tbl_jostat set JO_Level='". $classify ."', JO_Status='MCC:FOR APPROVAL', JO_AcceptedBy='".$_SESSION['Auser_name']."' where JO_TicketNum='". $jooid ."'";
        $conn->exec($sql1);
        echo"1"; 
   
    }
    else{
        $sql2 = "UPDATE tbl_jostat set JO_Level='". $classify ."', JO_Status='ACCEPTED', JO_AcceptedBy='".$_SESSION['Auser_name']."' where JO_TicketNum='". $jooid ."'";
        $conn->exec($sql2);
        echo"1"; 
     
    }
  
    // $action = "Accepted Job Order No:" . $propID;
    // $sql3 = "INSERT INTO audit_r3 (audit_USER, audit_ACTION) VALUES ('". $_SESSION['Auser_name'] ."','". $action ."')"; 
    // $conn->exec($sql3);  



    
     } catch(PDOException $e) {
     echo "Connection failed: " . $e->getMessage();
     }


?>