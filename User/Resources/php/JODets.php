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
    
    $propID=$data->data->propID;

    try {
        $conn = new PDO("mysql:host=$servername;dbname=ihoms_inventory", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //computer
        $getComputer = $conn->prepare("SELECT * FROM tbl_jostat  WHERE JO_TicketNum ='".$propID."'");

        $getComputer->execute();
        $computers = $getComputer->fetchAll();
        $data=array();
        foreach ($computers as $computer) {
            array_push($data,
                array("JO_TicketNum"=>$computer["JO_TicketNum"],
                "JO_DeptDesti"=>$computer["JO_DeptDesti"],
                "JO_DescOfWork"=>$computer["JO_DescOfWork"],
                "JO_Date"=>$computer["JO_Date"],
                "JO_Serial"=>$computer["serial_NO"],
                "JO_DesigUser"=>$computer["JO_DesigUser"],
                "JO_Type"=>$computer["JO_WhatType"]
                
            ));
        }
        echo json_encode($data);  
    } 
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>
