<?php
    session_start();
    $servername = "localhost";
    $username = "AMS_User";
    $password = "P@ssW0rdAMS2023";

    $data = json_decode(
        file_get_contents('php://input') 
    );

    $value =$data->data->value;


    try {
        $conn = new PDO("mysql:host=$servername;dbname=ihoms_inventory", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql="SELECT * FROM computers WHERE serial_NO ='".$value."'";

        $query = $conn->prepare($sql);
        $query->execute();
        $row = $query->rowCount();
        $data1=array();
        
        if($row > 0) 
        {
            $getComputer = $conn->prepare("SELECT * FROM computers INNER JOIN tbl_computerspecs ON computers.serial_NO=tbl_computerspecs.serial_NO WHERE computers.serial_NO ='".$value."' AND tbl_computerspecs.serial_NO = '".$value."'");
            $getComputer->execute();
            $Computers = $getComputer->fetchAll();
            
            foreach ($Computers as $computer) {
                array_push($data1,
                array("InvModel"=>$computer["Model"], "InvBrand"=>$computer["Brand"],"CompType"=>$computer["CompType"],"CompOS"=>$computer["CompOS"],"CompRAM"=>$computer["CompRAM"],"CompStorageType"=>$computer["CompStorageType"],"CompProcessor"=>$computer["CompProcessor"],"OSLicense"=>$computer["OSLicense"],"WhatType"=>'Computer'));
            }
        }

        else
        {
            $getPrinter = $conn->prepare("SELECT * FROM printer WHERE serial_NO ='".$value."'");
            $getPrinter->execute();
            $Printers = $getPrinter->fetchAll();
            foreach ($Printers as $printer) {
                array_push($data1,
                array("InvModel"=>$printer["Model"], "InvBrand"=>$printer["Brand"],"WhatType"=>'Printer'));
           }
        }

    //     //printer
    //     $getPrinter = $conn->prepare("SELECT * FROM printer WHERE department ='".$value."'");
    //     $getPrinter->execute();
    //     $printers = $getPrinter->fetchAll();
    //     foreach ($printers as $printer) {
    //         array_push($data1,
    //            array("users"=>$printer["user"]));
    //    }
       

    //   $getOther = $conn->prepare("SELECT * FROM others WHERE department ='".$value."'");
    //   $getOther->execute();
    //   $Others = $getOther->fetchAll();
    //   foreach ($Others as $Other) {
    //       array_push($data1,
    //          array("users"=>$Other["user"]));
    //  }
     

        
            echo json_encode($data1);  
    } 
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>
