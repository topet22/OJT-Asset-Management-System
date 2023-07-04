<?php
    session_start();
    $servername = "localhost";
    $username = "AMS_User";
    $password = "P@ssW0rdAMS2023";

    
    $data = json_decode(file_get_contents('php://input'));

    $propID=$data->data->dept;
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=ihoms_inventory", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //other
        $getOther = $conn->prepare("SELECT * FROM others WHERE department ='".$propID."' AND STATS != 'Condemned' ");
        $getOther->execute();
        $others = $getOther->fetchAll();
        $data2=array();
        foreach ($others as $other) {
            array_push($data2,
               array("other_ID"=>$other["other_id"],"InvUser"=>$other["user"],"InvDept"=>$other["department"],"InvPropNo"=>$other["property_NO"] ,"InvSerial"=>$other["serial_NO"] ,"InvDate"=>$other["date_acquired"],"INVDesc"=>$other["description"],"INVDept"=>$other["department"],"InvStatus"=>$other["STATS"],"Reason"=>$other["reason"],"ItemID"=>$other["item_ID"]
            ));
       }
        
            echo json_encode($data2);
            $user = "Hehe";

            $action = "View All Other Equipments of " .$propID; 
                $sql2 = "INSERT INTO audit_r3 (audit_USER, audit_ACTION)
                VALUES ('". $_SESSION['SAuser_name'] ."','". $action ."')"; 
                $conn->exec($sql2);  
          
            } 
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>
