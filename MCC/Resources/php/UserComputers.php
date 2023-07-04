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
        //computer
        $getComputer = $conn->prepare("SELECT * FROM computers INNER JOIN tbl_computerspecs ON computers.serial_NO=tbl_computerspecs.serial_NO  WHERE department ='".$_SESSION['depts']."'");

        $getComputer->execute();
        $computers = $getComputer->fetchAll();
        $data=array();
        foreach ($computers as $computer) {
            array_push($data,
                array("comp_ID"=>$computer["comp_id"],"InvUser"=>$computer["user"],"InvPropNo"=>$computer["property_NO"] ,"InvSerial"=>$computer["serial_NO"] ,
                "InvModel"=>$computer["Model"],"InvBrand"=>$computer["Brand"],"CompType"=>$computer["CompType"],"CompOS"=>$computer["CompOS"],"InvDate"=>$computer["date_acquired"],"InvStatus"=>$computer["STATS"],"Reason"=>$computer["reason"], "Depart"=>$_SESSION['depts']
            ));
        }
        echo json_encode($data);  
    } 
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>
