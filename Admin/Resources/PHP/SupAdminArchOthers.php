<?php
    session_start();
    $servername = "localhost";
    $username = "AMS_User";
    $password = "P@ssW0rdAMS2023";
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=ihoms_inventory", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //other
        $getOther = $conn->prepare("SELECT * FROM others WHERE STATS = 'Condemned'");
        $getOther->execute();
        $others = $getOther->fetchAll();
        $data2=array();
        foreach ($others as $other) {
            array_push($data2,
               array("other_ID"=>$other["other_id"],"InvUser"=>$other["user"],"InvPropNo"=>$other["property_NO"] ,"InvSerial"=>$other["serial_NO"] ,"InvDate"=>$other["date_acquired"],"INVDesc"=>$other["description"],"INVDept"=>$other["department"],"InvStatus"=>$other["STATS"],"Reason"=>$other["reason"],"ItemID"=>$other["item_ID"]
            ));
       }
        
            echo json_encode($data2);
            $user = "MyLIfeBegin";

            $action = "View All Inventory - Other "; 
                $sql2 = "INSERT INTO audit_r3 (audit_USER, audit_ACTION)
                VALUES ('". $_SESSION['Auser_name'] ."','". $action ."')"; 
                $conn->exec($sql2);  
    
            } 
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>
