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
    


    $serial=$data->data->serial;

    try {
        $conn = new PDO("mysql:host=$servername;dbname=ihoms_inventory", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

       $getComputer = $conn->prepare("SELECT * FROM computers WHERE serial_NO ='".$serial."'");
       $getComputer->execute();
       $Computers = $getComputer->fetchAll();
       $data1=array();
       foreach ($Computers as $Computer) {
           array_push($data1,
              array("WhatType"=>"Computer","Property"=>$Computer["property_NO"],"PropNo"=>$Computer["item_ID"],"model"=>$Computer["Model"]));
      }
      


        //printer
        $getPrinter = $conn->prepare("SELECT * FROM printer WHERE serial_NO ='".$serial."'");
        $getPrinter->execute();
        $printers = $getPrinter->fetchAll();
        foreach ($printers as $printer) {
            array_push($data1,
               array("WhatType"=>"Printer","Property"=>$printer["property_NO"],"PropNo"=>$printer["item_ID"],"model"=>$printer["Model"]));
       }
       

      $getOther = $conn->prepare("SELECT * FROM others WHERE serial_NO ='".$serial."'");
      $getOther->execute();
      $Others = $getOther->fetchAll();
      foreach ($Others as $Other) {
          array_push($data1,
             array("WhatType"=>"Other","Property"=>$Other["property_NO"],"PropNo"=>$Other["item_ID"],"model"=>$Other["Model"]));
     }
     

        
            echo json_encode($data1);  
    } 
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>
