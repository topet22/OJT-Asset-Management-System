<?php

session_start();
$servername = "localhost";
$username = "AMS_User";
$password = "P@ssW0rdAMS2023";

$data = json_decode(
    file_get_contents('php://input') 
);

$propID =$data->data->propID;

try {
    $conn = new PDO("mysql:host=$servername;dbname=ihoms_inventory", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //printer
    $getPrinter = $conn->prepare("SELECT * FROM tbl_pm WHERE PM_ID = '".$propID."'");
    $getPrinter->execute();
    $printers = $getPrinter->fetchAll();
    $data1=array();
    foreach ($printers as $printer) {
        $WhatType = $printer["PM_Type"];
        $SerialNo = $printer["PM_SerialPC"];
        array_push($data1,
           array(
            "PM_ID" =>$printer["PM_ID"],
            "PM_Date" =>$printer["PM_Date"],
            "PM_DoneBy" =>$printer["PM_DoneBy"],
            "PM_STATUS" =>$printer["PM_STATUS"],
            "PM_Department" =>$printer["PM_Department"],
            "PM_SerialPC" =>$printer["PM_SerialPC"],
            "PM_SerialMonitor1" =>$printer["PM_SerialMonitor1"],
            "PM_ModelMontor1" =>$printer["PM_ModelMontor1"],
            "PM_SerialMonitor2" =>$printer["PM_SerialMonitor2"],
            "PM_ModelMontor2" =>$printer["PM_ModelMontor2"],
            "PM_SerialKB" =>$printer["PM_SerialKB"],
            "PM_SerialMouse" =>$printer["PM_SerialMouse"],
            "PM_SerialUPS" =>$printer["PM_SerialUPS"],
            "PM_ModelKB" =>$printer["PM_ModelKB"],
            "PM_ModelMouse" =>$printer["PM_ModelMouse"],
            "PM_ModelUPS" =>$printer["PM_ModelUPS"],
            "PM_KBStat" =>$printer["PM_KBStat"],
            "PM_MouseStat" =>$printer["PM_MouseStat"],
            "PM_UPSStat" =>$printer["PM_UPSStat"],
            "PM_ModelKB" =>$printer["PM_ModelKB"],
            "PM_ModelMouse" =>$printer["PM_ModelMouse"],
            "PM_ModelUPS" =>$printer["PM_ModelUPS"],
            "PM_Q1" =>$printer["PM_Q1"],
            "PM_Q2" =>$printer["PM_Q2"],
            "PM_Q3" =>$printer["PM_Q3"],
            "PM_Q4" =>$printer["PM_Q4"],
            "PM_Q5" =>$printer["PM_Q5"],
            "PM_Q6" =>$printer["PM_Q6"],
            "PM_Q7" =>$printer["PM_Q7"],
            "PM_Q8" =>$printer["PM_Q8"],
            "PM_Q9" =>$printer["PM_Q9"],
            "PM_Q10" =>$printer["PM_Q10"],
            "PM_Q11" =>$printer["PM_Q11"],
            "PM_Q12" =>$printer["PM_Q12"],
            "PM_Q1Rems" =>$printer["PM_Q1Rems"],
            "PM_Q2Rems" =>$printer["PM_Q2Rems"],
            "PM_Q3Rems" =>$printer["PM_Q3Rems"],
            "PM_Q4Rems" =>$printer["PM_Q4Rems"],
            "PM_Q5Rems" =>$printer["PM_Q5Rems"],
            "PM_Q6Rems" =>$printer["PM_Q6Rems"],
            "PM_Q7Rems" =>$printer["PM_Q7Rems"],
            "PM_Q8Rems" =>$printer["PM_Q8Rems"],
            "PM_Q9Rems" =>$printer["PM_Q9Rems"],
            "PM_Q10Rems" =>$printer["PM_Q10Rems"],
            "PM_Q11Rems" =>$printer["PM_Q11Rems"],
            "PM_Q12Rems" =>$printer["PM_Q12Rems"],
            "PM_DesigUser" =>$printer["PM_DesigUser"],
            "PM_Type" =>$printer["PM_Type"] 
        ));
   }

   if($WhatType == "Computer")
   {
    $getComputer = $conn->prepare("SELECT * FROM computers INNER JOIN tbl_computerspecs ON computers.serial_NO=tbl_computerspecs.serial_NO WHERE computers.serial_NO='".$SerialNo."'");
    $getComputer->execute();
    $computers = $getComputer->fetchAll();
    foreach ($computers as $computer) {
        array_push($data1,
            array(
                "serial_NO"=>$computer["serial_NO"] ,
                "Model"=>$computer["Model"] ,
                "Brand"=>$computer["Brand"],
                "CompType"=>$computer["CompType"],
                "CompOS"=>$computer["CompOS"],
                "CompRAM"=>$computer["CompRAM"],
                "CompStorageType"=>$computer["CompStorageType"],
                "CompHDD"=>$computer["HDDStorage"],
                "CompProcessor"=>$computer["CompProcessor"],
                "OSLicense"=>$computer["OSLicense"],
                "date_acquired"=>$computer["date_acquired"]
        ));
    }
    }
   else
   {
    $getComputer = $conn->prepare("SELECT * FROM printer where serial_NO='".$SerialNo."'");
    $getComputer->execute();
    $computers = $getComputer->fetchAll();
    foreach ($computers as $computer) {
        array_push($data1,
            array(
                "serial_NO"=>$computer["serial_NO"] ,
                "Model"=>$computer["Model"] ,
                "Brand"=>$computer["Brand"]
        ));
    }
   }
    
        echo json_encode($data1);
      
        } 
catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>

