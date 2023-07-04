<?php

    session_start();
    $servername = "localhost";
    $username = "AMS_User";
    $password = "P@ssW0rdAMS2023";
    
    $data = json_decode(file_get_contents('php://input'));

    $propID=$data->data->propID;

    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=ihoms_inventory", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $getComputer = $conn->prepare("SELECT * FROM tbl_stocks WHERE stock_ID ='".$propID."'");
            $getComputer->execute();
            $computers = $getComputer->fetchAll();
            $data=array();
            foreach ($computers as $computer) {
                $CompProp = $computer["property_NO"];
                $CompSerial = $computer["serial_NO"];
                $getSpecs = $conn->prepare("SELECT * FROM tbl_computerspecs WHERE serial_NO ='".$CompSerial."'");
                $getSpecs->execute(); 
                $specs = $getSpecs->fetchAll();
                foreach ($specs as $spec) {
                    array_push($data,
                        array("CompType"=>$spec["CompType"],"CompOS"=>$spec["CompOS"],"CompRAM"=>$spec["CompRAM"],"CompStorageType"=>$spec["CompStorageType"],"CompSSD"=>$spec["SSDStorage"],"CompHDD"=>$spec["HDDStorage"],"CompProcessor"=>$spec["CompProcessor"],"OSLicense"=>$spec["OSLicense"]
                ));    
            }
            echo json_encode($data);
            
            $action = "View Computer Specifications"; //my life begin
            
            $sql2 = "INSERT INTO audit_r3 (audit_USER, audit_PROPNO	,audit_ACTION)
            VALUES ('". $_SESSION['SAuser_name'] ."','". $CompSerial ."','". $action ."')"; 
            $conn->exec($sql2);       
    } 
    }
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

?>