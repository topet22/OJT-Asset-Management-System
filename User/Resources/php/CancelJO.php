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
    
    $JO_Number=$data->data->JO_Number;
    $JO_CancelReason=$data->data->JO_CancelReason;


    try {
        $conn = new PDO("mysql:host=$servername;dbname=ihoms_inventory", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //computer
        $sql = "UPDATE tbl_jostat set  
        JO_Status = 'CANCELLED', JO_CancelRes = '".$JO_CancelReason."' where JO_TicketNum='". $JO_Number ."'";

        $conn->exec($sql);

        $getComputer = $conn->prepare("SELECT * FROM tbl_jostat  WHERE JO_TicketNum ='".$JO_Number."'");

        $getComputer->execute();
        $computers = $getComputer->fetchAll();
        $data=array();
        foreach ($computers as $computer) {
            $JO_PropertyNo = $computer['JO_PropertyNO'];
            $JO_ItemID = $computer['JO_ItemID'];
            $JO_WhatType = $computer['JO_WhatType'];

            if ($JO_WhatType == "Computer")
            {
                $sql2 = "UPDATE computers SET STATS = 'In Use', JOReq = 'NO' WHERE item_ID = '".$JO_ItemID."' ";
                $conn->exec($sql2);
            }
            elseif ($JO_WhatType == "Printer") 
            {
                $sql2 = "UPDATE printer SET STATS = 'In Use', JOReq = 'NO' WHERE item_ID = '".$JO_ItemID."' ";
                $conn->exec($sql2);
            }
            else
            {
                $sql2 = "UPDATE others SET STATS = 'In Use', JOReq = 'NO' WHERE item_ID = '".$JO_ItemID."' ";
                $conn->exec($sql2);
            }
        }



        $action = "Cancelled Job Order No:" . $JO_Number;
        $sql3 = "INSERT INTO audit_r3 (audit_USER, audit_ACTION, audit_PROPNO) VALUES ('". $_SESSION['user_name'] ."','". $action ."', '".$JO_PropertyNo."')"; 
        $conn->exec($sql3); 


        echo "1";
    } 
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>
