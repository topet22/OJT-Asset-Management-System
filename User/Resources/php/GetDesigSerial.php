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
    


    $desiguser=$data->data->desiguser;

    try {
        $conn = new PDO("mysql:host=$servername;dbname=ihoms_inventory", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

       $getComputer = $conn->prepare("SELECT * FROM computers WHERE department ='".$_SESSION['depts']."' AND user ='".$desiguser."' AND STATS = 'In Use' AND JOReq != 'YES' ");
       $getComputer->execute();
       $Computers = $getComputer->fetchAll();
       $data1=array();
       foreach ($Computers as $Computer) {
           array_push($data1,
              array("WhatType"=>"Computer","Property"=>$Computer["property_NO"],"Serial"=>$Computer["serial_NO"],"PropNo"=>$Computer["item_ID"]));
      }
      


        //printer
        $getPrinter = $conn->prepare("SELECT * FROM printer WHERE department ='".$_SESSION['depts']."' AND user ='".$desiguser."' AND STATS = 'In Use' AND JOReq != 'YES' ");
        $getPrinter->execute();
        $printers = $getPrinter->fetchAll();
        foreach ($printers as $printer) {
            array_push($data1,
               array("WhatType"=>"Printer","Property"=>$printer["property_NO"],"Serial"=>$printer["serial_NO"],"PropNo"=>$printer["item_ID"]));
       }
       

      $getOther = $conn->prepare("SELECT * FROM others WHERE department ='".$_SESSION['depts']."' AND user ='".$desiguser."' AND STATS = 'In Use' AND JOReq != 'YES' ");
      $getOther->execute();
      $Others = $getOther->fetchAll();
      foreach ($Others as $Other) {
          array_push($data1,
             array("WhatType"=>"Other","Property"=>$Other["property_NO"],"Serial"=>$Other["serial_NO"],"PropNo"=>$Other["item_ID"]));
     }
     

        
            echo json_encode($data1);  
    } 
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>
