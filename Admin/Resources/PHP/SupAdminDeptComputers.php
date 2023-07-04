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
        //computer
        $getComputer = $conn->prepare("SELECT * FROM computers WHERE department ='".$propID."' AND STATS != 'Condemned'");
        $getComputer->execute();
        $computers = $getComputer->fetchAll();
        $data=array();
        foreach ($computers as $computer) {
            array_push($data,
                array("comp_ID"=>$computer["comp_id"],"InvUser"=>$computer["user"],"InvPropNo"=>$computer["property_NO"] ,"InvSerial"=>$computer["serial_NO"] ,"InvDate"=>$computer["date_acquired"],
                "InvModel"=>$computer["Model"],
                "InvBrand"=>$computer["Brand"],"InvStatus"=>$computer["STATS"],"Reason"=>$computer["reason"],"ItemID"=>$computer["item_ID"]
            ));
        }
        echo json_encode($data);
        $user = "Haha";

        $action = "View All Computers of " .$propID; 
            $sql2 = "INSERT INTO audit_r3 (audit_USER, audit_ACTION)
            VALUES ('". $_SESSION['Auser_name'] ."','". $action ."')"; 
            $conn->exec($sql2);  
    } 
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>
