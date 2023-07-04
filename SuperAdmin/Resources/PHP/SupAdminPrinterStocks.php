<?php
    
    session_start();
    $servername = "localhost";
    $username = "AMS_User";
    $password = "P@ssW0rdAMS2023";

    // $user = "TEST123";
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=ihoms_inventory", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //computer
        $getComputer = $conn->prepare("SELECT * FROM tbl_stocks WHERE WhatType = 'Printer' and stock_STATUS = 'NEW'");
        $getComputer->execute();
        $computers = $getComputer->fetchAll();
        $data=array();
        foreach ($computers as $computer) {
            array_push($data,
                array("stock_ID"=>$computer["stock_ID"],"property_NO"=>$computer["property_NO"],"serial_NO"=>$computer["serial_NO"] ,"Model"=>$computer["Model"] ,"Brand"=>$computer["Brand"],
                "date_acquired"=>$computer["date_acquired"]
            ));
        }
        echo json_encode($data);

        $action = "Viewed Printer Stocks" ;

        $sql2 = "INSERT INTO audit_r3 (audit_USER, audit_ACTION)
        VALUES ('". $_SESSION['SAuser_name'] ."','". $action ."')"; 
        $conn->exec($sql2);
    } 
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>
