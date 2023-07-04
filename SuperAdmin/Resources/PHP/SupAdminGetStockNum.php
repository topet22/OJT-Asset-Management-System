<?php
    session_start();
    $servername = "localhost";
    $username = "AMS_User";
    $password = "P@ssW0rdAMS2023";

    $Condemned = "Condemned";

    $stattus = array("Pulled out", "Serviceable", "For Repair","Condemned");
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=ihoms_inventory", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //other
        $getOtherNum = $conn->prepare("SELECT COUNT(*) FROM tbl_stocks WHERE WhatType ='Others' AND stock_STATUS = 'NEW'");
        $getOtherNum->execute();
        $othersNum = $getOtherNum->fetchColumn();

        $getCompNum = $conn->prepare("SELECT COUNT(*) FROM tbl_stocks WHERE WhatType ='Computer' AND stock_STATUS = 'NEW'");
        $getCompNum->execute();
        $CompNum = $getCompNum->fetchColumn();

        $getPrintNum = $conn->prepare("SELECT COUNT(*) FROM tbl_stocks WHERE WhatType ='Printer' AND stock_STATUS = 'NEW'");
        $getPrintNum->execute();
        $PrintNum = $getPrintNum->fetchColumn();

    

        $data = array();

        array_push($data,
            array(
                "ComputerNumbers"=>$CompNum,
                "PrinterNumbers"=>$PrintNum,
                "OthersNumbers"=>$othersNum,
                ));    
           
             echo json_encode($data);
        
    
        } 
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>
