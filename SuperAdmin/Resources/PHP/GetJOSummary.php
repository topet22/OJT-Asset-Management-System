<?php
    session_start();
    $servername = "localhost";
    $username = "AMS_User";
    $password = "P@ssW0rdAMS2023";



    try {
        $conn = new PDO("mysql:host=$servername;dbname=ihoms_inventory", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $data=array();
        $getJOTotal = $conn->prepare("SELECT COUNT(*) FROM tbl_jostat WHERE JO_Status != 'CANCELLED'");
        $getJOTotal->execute();
        $TotalNum = $getJOTotal->fetchColumn();

        $getJOTotalPC = $conn->prepare("SELECT COUNT(*) FROM tbl_jostat WHERE JO_Status != 'CANCELLED' AND JO_WhatType = 'Computer'");
        $getJOTotalPC->execute();
        $TotalNumPC = $getJOTotalPC->fetchColumn();

        $getJOTotalPRT = $conn->prepare("SELECT COUNT(*) FROM tbl_jostat WHERE JO_Status != 'CANCELLED' AND JO_WhatType = 'Printer'");
        $getJOTotalPRT->execute();
        $TotalNumPRT = $getJOTotalPRT->fetchColumn();

        $getJOTotalNTK = $conn->prepare("SELECT COUNT(*) FROM tbl_jostat WHERE JO_Status != 'CANCELLED' AND JO_WhatType = 'Network'");
        $getJOTotalNTK->execute();
        $TotalNumNTK = $getJOTotalNTK->fetchColumn();

        $getJOTotalSR = $conn->prepare("SELECT COUNT(*) FROM tbl_jostat WHERE JO_Status != 'CANCELLED' AND JO_WhatType = 'Software'");
        $getJOTotalSR->execute();
        $TotalNumSR = $getJOTotalSR->fetchColumn();

        $getJOTotalOTH = $conn->prepare("SELECT COUNT(*) FROM tbl_jostat WHERE JO_Status != 'CANCELLED' AND JO_WhatType = 'Others'");
        $getJOTotalOTH->execute();
        $TotalNumOTH = $getJOTotalOTH->fetchColumn();

        $TotalOth = $TotalNumSR + $TotalNumOTH;


        array_push($data,
        array("JO_Total"=>$TotalNum,"JO_TotalPC"=>$TotalNumPC,"JO_TotalPRT"=>$TotalNumPRT,"JO_TotalNetwork"=>$TotalNumNTK,"JO_TotalOth"=>$TotalOth));
        

        //computer
        $getComputer = $conn->prepare("SELECT * FROM tbl_jostat WHERE JO_Status != 'CANCELLED'");

        $getComputer->execute();
        $computers = $getComputer->fetchAll();
        
        foreach ($computers as $computer) {
            array_push($data,
                array("JO_TicketNum"=>$computer["JO_TicketNum"],"JO_Date"=>$computer["JO_Date"],"JO_Department"=>$computer["JO_Department"],"JO_DescOfWork"=>$computer["JO_DescOfWork"],"JO_WhatType"=>$computer["JO_WhatType"]
            ));
        }
        echo json_encode($data);  
    } 
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>
