<?php

    $servername = "localhost";
    $username = "AMS_User";
    $password = "P@ssW0rdAMS2023";

    $data = json_decode(
        file_get_contents('php://input') 
    );


    $WhatType=$data->data->whattype;
    $InvID=$data->data->propID;

    try {
    $conn = new PDO("mysql:host=$servername;dbname=ihoms_inventory", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($WhatType == "computers"){

        $getComputer = $conn->prepare("SELECT * FROM computers WHERE comp_id ='".$InvID."'");
        $getComputer->execute();
        $computers = $getComputer->fetchAll();

        foreach ($computers as $computer) {
            $CompSerial = $computer["serial_NO"];
            $sql1 = "DELETE FROM tbl_computerspecs
            where serial_NO='". $CompSerial ."'";
            $conn->exec($sql1);
        }

        $sql = "DELETE FROM computers
        where comp_id='". $InvID ."'";
        $conn->exec($sql);

        echo "1";
    }
    elseif($WhatType == "printers"){
        $sql = "DELETE FROM printer 
        where printer_id ='". $InvID ."'";
        $conn->exec($sql);
        echo "1";
    }
    else{
        $sql = "DELETE FROM others 
        where other_id  ='". $InvID ."'";
        $conn->exec($sql);
        echo "1";
    }


    
     } catch(PDOException $e) {
     echo "Connection failed: " . $e->getMessage();
     }

    //  $user = "Estes";

    //     $action = "Archive Item: " .$CompSerial; 
            
    //     $sql2 = "INSERT INTO audit_r3 (audit_USER, audit_ACTION)
    //     VALUES ('". $user ."','". $action ."')"; 
    //     $conn->exec($sql2);  


?>


