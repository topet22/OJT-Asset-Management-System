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
        $getComputer = $conn->prepare("SELECT * FROM computers WHERE STATS ='Condemned'");
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
    } 
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>
