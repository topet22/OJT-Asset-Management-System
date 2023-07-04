<?php
    session_start();    
    $servername = "localhost";
    $username = "AMS_User";
    $password = "P@ssW0rdAMS2023";
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=ihoms_inventory", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //computer

       // $getComputer = $conn->prepare("SELECT * FROM computers ");
        $getComputer = $conn->prepare("SELECT * FROM computers INNER JOIN tbl_computerspecs ON computers.serial_NO=tbl_computerspecs.serial_NO;");

        //SELECT * FROM computers INNER JOIN tbl_computerspecs ON tbl_computerspecs.comspec_ID=tbl_computerspecs.comspec_ID;
        $getComputer->execute();
        $computers = $getComputer->fetchAll();
        $data=array();
        foreach ($computers as $computer) {
            array_push($data,
                array("comp_ID"=>$computer["comp_id"],"Dept"=>$computer["department"],"InvUser"=>$computer["user"],"InvPropNo"=>$computer["property_NO"] ,"InvSerial"=>$computer["serial_NO"] ,"InvModel"=>$computer["Model"], "InvBrand"=>$computer["Brand"],"CompType"=>$computer["CompType"],"CompOS"=>$computer["CompOS"],"CompRAM"=>$computer["CompRAM"],"CompSSD"=>$computer["SSDStorage"],"CompHDD"=>$computer["HDDStorage"],"CompProcessor"=>$computer["CompProcessor"],"OSLicense"=>$computer["OSLicense"],"InvStatus"=>$computer["STATS"],"Reason"=>$computer["reason"],"InvDate"=>$computer["date_acquired"],"InvStatus"=>$computer["STATS"],"ItemID"=>$computer["item_ID"]                
            ));
        }
        echo json_encode($data);

        // $user = "Grangermofos";

        // $action = "View All Inventory - Computer "; 
        //     $sql2 = "INSERT INTO audit_r3 (audit_USER, audit_ACTION)
        //     VALUES ('". $_SESSION['SAuser_name'] ."','". $action ."')"; 
        //     $conn->exec($sql2);  

    } 
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>
