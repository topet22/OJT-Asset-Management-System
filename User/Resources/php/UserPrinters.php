<?php
    session_start();
    $servername = "localhost";
    $username = "AMS_User";
    $password = "P@ssW0rdAMS2023";

    $_SESSION['user_name'];
    $_SESSION['depts']; 

    try {
        $conn = new PDO("mysql:host=$servername;dbname=ihoms_inventory", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //printer
        $getPrinter = $conn->prepare("SELECT * FROM printer WHERE department ='".$_SESSION['depts']."'");
        $getPrinter->execute();
        $printers = $getPrinter->fetchAll();
        $data1=array();
        foreach ($printers as $printer) {
            array_push($data1,
               array("printer_ID"=>$printer["printer_id"],"InvUser"=>$printer["user"],"InvPropNo"=>$printer["property_NO"] ,"InvSerial"=>$printer["serial_NO"] ,"InvDate"=>$printer["date_acquired"],"InvStatus"=>$printer["STATS"],"Reason"=>$printer["reason"],"Depart"=>$_SESSION['depts'],"InvModel"=>$printer["Model"],"InvBrand"=>$printer["Brand"]
            ));
       }
        
            echo json_encode($data1);
    
          
            } 
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>
