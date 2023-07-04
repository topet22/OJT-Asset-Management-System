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
        //printer
        $getPrinter = $conn->prepare("SELECT * FROM printer WHERE department ='".$propID."' AND STATS != 'Condemned'");
        $getPrinter->execute();
        $printers = $getPrinter->fetchAll();
        $data1=array();
        foreach ($printers as $printer) {
            array_push($data1,
               array("printer_ID"=>$printer["printer_id"],"InvUser"=>$printer["user"],"InvDept"=>$printer["department"],"InvPropNo"=>$printer["property_NO"] ,"InvSerial"=>$printer["serial_NO"] ,"InvDate"=>$printer["date_acquired"],"InvStatus"=>$printer["STATS"],"Reason"=>$printer["reason"],"ItemID"=>$printer["item_ID"]
            ));
       }
        
            echo json_encode($data1);
            $user = "Hihi";

            $action = "View All Printer of " .$propID; 
                $sql2 = "INSERT INTO audit_r3 (audit_USER, audit_ACTION)
                VALUES ('". $_SESSION['SAuser_name'] ."','". $action ."')"; 
                $conn->exec($sql2);  
    
          
            } 
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>
