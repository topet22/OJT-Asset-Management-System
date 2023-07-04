<?php
    session_start();
    $servername = "localhost";
    $username = "AMS_User";
    $password = "P@ssW0rdAMS2023";

    $data = json_decode(
        file_get_contents('php://input') 
    );

    $min = $data->data->min;
    $max = $data->data->max;
    $JO_WT = $data->data->JO_WT;
    $JO_DEPT = $data->data->JO_DEPT;
    
    if(empty($max))
    {
        $max = date('Y-m-d');
    }

    try {
        $conn = new PDO("mysql:host=$servername;dbname=ihoms_inventory", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //computer
        $data=array();
        if($JO_WT == "ALL" && $JO_DEPT == "ALL")
        {
            $getJOTotal = $conn->prepare("SELECT COUNT(*) FROM tbl_jostat WHERE JO_Status != 'CANCELLED' AND JO_DATE1 BETWEEN '".$min."' AND '".$max."'");
            $getJOTotal->execute();
            $TotalNum = $getJOTotal->fetchColumn();
    
            $getJOTotalPC = $conn->prepare("SELECT COUNT(*) FROM tbl_jostat WHERE JO_Status != 'CANCELLED' AND JO_WhatType = 'Computer' AND JO_DATE1 BETWEEN '".$min."' AND '".$max."'");
            $getJOTotalPC->execute();
            $TotalNumPC = $getJOTotalPC->fetchColumn();
    
            $getJOTotalPRT = $conn->prepare("SELECT COUNT(*) FROM tbl_jostat WHERE JO_Status != 'CANCELLED' AND JO_WhatType = 'Printer' AND JO_DATE1 BETWEEN '".$min."' AND '".$max."'");
            $getJOTotalPRT->execute();
            $TotalNumPRT = $getJOTotalPRT->fetchColumn();
    
            $getJOTotalNTK = $conn->prepare("SELECT COUNT(*) FROM tbl_jostat WHERE JO_Status != 'CANCELLED' AND JO_WhatType = 'Network' AND JO_DATE1 BETWEEN '".$min."' AND '".$max."'");
            $getJOTotalNTK->execute();
            $TotalNumNTK = $getJOTotalNTK->fetchColumn();
    
            $getJOTotalSR = $conn->prepare("SELECT COUNT(*) FROM tbl_jostat WHERE JO_Status != 'CANCELLED' AND JO_WhatType = 'Software' AND JO_DATE1 BETWEEN '".$min."' AND '".$max."'");
            $getJOTotalSR->execute();
            $TotalNumSR = $getJOTotalSR->fetchColumn();
    
            $getJOTotalOTH = $conn->prepare("SELECT COUNT(*) FROM tbl_jostat WHERE JO_Status != 'CANCELLED' AND JO_WhatType = 'Others' AND JO_DATE1 BETWEEN '".$min."' AND '".$max."'");
            $getJOTotalOTH->execute();
            $TotalNumOTH = $getJOTotalOTH->fetchColumn();
    
            $TotalOth = $TotalNumSR + $TotalNumOTH;
    
    
            array_push($data,
            array("JO_Total"=>$TotalNum,"JO_TotalPC"=>$TotalNumPC,"JO_TotalPRT"=>$TotalNumPRT,"JO_TotalNetwork"=>$TotalNumNTK,"JO_TotalOth"=>$TotalOth));
            $getComputer = $conn->prepare("SELECT * FROM tbl_jostat WHERE JO_Status != 'CANCELLED' AND JO_DATE1 BETWEEN '".$min."' AND '".$max."' ");

            $getComputer->execute();
            $computers = $getComputer->fetchAll();
            
            foreach ($computers as $computer) {
                array_push($data,
                    array("JO_TicketNum"=>$computer["JO_TicketNum"],"JO_Date"=>$computer["JO_Date"],"JO_Department"=>$computer["JO_Department"],"JO_DescOfWork"=>$computer["JO_DescOfWork"],"JO_WhatType"=>$computer["JO_WhatType"]
                ));
            }
            echo json_encode($data);  
        }
        else if($JO_WT != "ALL" && $JO_DEPT =="ALL")
        {
            $getJOTotal = $conn->prepare("SELECT COUNT(*) FROM tbl_jostat WHERE JO_Status != 'CANCELLED' AND JO_WhatType = '".$JO_WT."' AND JO_DATE1 BETWEEN '".$min."' AND '".$max."'");
            $getJOTotal->execute();
            $TotalNum = $getJOTotal->fetchColumn();

            if($JO_WT == "Computer")
            {
                $getJOTotalPC = $conn->prepare("SELECT COUNT(*) FROM tbl_jostat WHERE JO_Status != 'CANCELLED' AND JO_WhatType = 'Computer' AND JO_DATE1 BETWEEN '".$min."' AND '".$max."'");
                $getJOTotalPC->execute();
                $TotalNumPC = $getJOTotalPC->fetchColumn();

                array_push($data,
                array("JO_Total"=>$TotalNum,"JO_TotalPC"=>$TotalNumPC,"JO_TotalPRT"=>"0","JO_TotalNetwork"=>"0","JO_TotalOth"=>"0"));
            }
            else if($JO_WT == "Printer")
            {
                $getJOTotalPRT = $conn->prepare("SELECT COUNT(*) FROM tbl_jostat WHERE JO_Status != 'CANCELLED' AND JO_WhatType = 'Printer' AND JO_DATE1 BETWEEN '".$min."' AND '".$max."'");
                $getJOTotalPRT->execute();
                $TotalNumPRT = $getJOTotalPRT->fetchColumn();

                array_push($data,
                array("JO_Total"=>$TotalNum,"JO_TotalPC"=>"0","JO_TotalPRT"=>$TotalNumPRT,"JO_TotalNetwork"=>"0","JO_TotalOth"=>"0"));
            }
            else if($JO_WT == "Network")
            {
                $getJOTotalNTK = $conn->prepare("SELECT COUNT(*) FROM tbl_jostat WHERE JO_Status != 'CANCELLED' AND JO_WhatType = 'Network' AND JO_DATE1 BETWEEN '".$min."' AND '".$max."'");
                $getJOTotalNTK->execute();
                $TotalNumNTK = $getJOTotalNTK->fetchColumn();
                array_push($data,
                array("JO_Total"=>$TotalNum,"JO_TotalPC"=>"0","JO_TotalPRT"=>"0","JO_TotalNetwork"=>$TotalNumNTK,"JO_TotalOth"=>"0"));
            }
            else if($JO_WT == "Software")
            {
                $getJOTotalSR = $conn->prepare("SELECT COUNT(*) FROM tbl_jostat WHERE JO_Status != 'CANCELLED' AND JO_WhatType = 'Software' AND JO_DATE1 BETWEEN '".$min."' AND '".$max."'");
                $getJOTotalSR->execute();
                $TotalNumSR = $getJOTotalSR->fetchColumn();
                array_push($data,
                array("JO_Total"=>$TotalNum,"JO_TotalPC"=>"0","JO_TotalPRT"=>"0","JO_TotalNetwork"=>"0","JO_TotalOth"=>$TotalNumSR));
            }
            else
            {
                $getJOTotalOTH = $conn->prepare("SELECT COUNT(*) FROM tbl_jostat WHERE JO_Status != 'CANCELLED' AND JO_WhatType = 'Others' AND JO_DATE1 BETWEEN '".$min."' AND '".$max."'");
                $getJOTotalOTH->execute();
                $TotalNumOTH = $getJOTotalOTH->fetchColumn();
                array_push($data,
                array("JO_Total"=>$TotalNum,"JO_TotalPC"=>"0","JO_TotalPRT"=>"0","JO_TotalNetwork"=>"0","JO_TotalOth"=>$TotalNumOTH));
            }
            
            $getComputer = $conn->prepare("SELECT * FROM tbl_jostat WHERE JO_Status != 'CANCELLED' AND JO_WhatType = '".$JO_WT."' AND JO_DATE1 BETWEEN '".$min."' AND '".$max."' ");
            $getComputer->execute();
            $computers = $getComputer->fetchAll();
            foreach ($computers as $computer) {
                array_push($data,
                    array("JO_TicketNum"=>$computer["JO_TicketNum"],"JO_Date"=>$computer["JO_Date"],"JO_Department"=>$computer["JO_Department"],"JO_DescOfWork"=>$computer["JO_DescOfWork"],"JO_WhatType"=>$computer["JO_WhatType"]
                ));
            }
            echo json_encode($data);  
        }
        else if($JO_WT == "ALL" && $JO_DEPT !="ALL")
        {
            $getJOTotal = $conn->prepare("SELECT COUNT(*) FROM tbl_jostat WHERE JO_Status != 'CANCELLED' AND JO_Department = '".$JO_DEPT."' AND JO_DATE1 BETWEEN '".$min."' AND '".$max."'");
            $getJOTotal->execute();
            $TotalNum = $getJOTotal->fetchColumn();
    
            $getJOTotalPC = $conn->prepare("SELECT COUNT(*) FROM tbl_jostat WHERE JO_Status != 'CANCELLED' AND JO_Department = '".$JO_DEPT."' AND JO_WhatType = 'Computer' AND JO_DATE1 BETWEEN '".$min."' AND '".$max."'");
            $getJOTotalPC->execute();
            $TotalNumPC = $getJOTotalPC->fetchColumn();
    
            $getJOTotalPRT = $conn->prepare("SELECT COUNT(*) FROM tbl_jostat WHERE JO_Status != 'CANCELLED' AND JO_Department = '".$JO_DEPT."' AND JO_WhatType = 'Printer' AND JO_DATE1 BETWEEN '".$min."' AND '".$max."'");
            $getJOTotalPRT->execute();
            $TotalNumPRT = $getJOTotalPRT->fetchColumn();
    
            $getJOTotalNTK = $conn->prepare("SELECT COUNT(*) FROM tbl_jostat WHERE JO_Status != 'CANCELLED' AND JO_Department = '".$JO_DEPT."' AND JO_WhatType = 'Network' AND JO_DATE1 BETWEEN '".$min."' AND '".$max."'");
            $getJOTotalNTK->execute();
            $TotalNumNTK = $getJOTotalNTK->fetchColumn();
    
            $getJOTotalSR = $conn->prepare("SELECT COUNT(*) FROM tbl_jostat WHERE JO_Status != 'CANCELLED' AND JO_Department = '".$JO_DEPT."' AND JO_WhatType = 'Software' AND JO_DATE1 BETWEEN '".$min."' AND '".$max."'");
            $getJOTotalSR->execute();
            $TotalNumSR = $getJOTotalSR->fetchColumn();
    
            $getJOTotalOTH = $conn->prepare("SELECT COUNT(*) FROM tbl_jostat WHERE JO_Status != 'CANCELLED' AND JO_Department = '".$JO_DEPT."' AND JO_WhatType = 'Others' AND JO_DATE1 BETWEEN '".$min."' AND '".$max."'");
            $getJOTotalOTH->execute();
            $TotalNumOTH = $getJOTotalOTH->fetchColumn();
    
            $TotalOth = $TotalNumSR + $TotalNumOTH;
    
    
            array_push($data,
            array("JO_Total"=>$TotalNum,"JO_TotalPC"=>$TotalNumPC,"JO_TotalPRT"=>$TotalNumPRT,"JO_TotalNetwork"=>$TotalNumNTK,"JO_TotalOth"=>$TotalOth));

            $getComputer = $conn->prepare("SELECT * FROM tbl_jostat WHERE JO_Status != 'CANCELLED' AND JO_Department = '".$JO_DEPT."' AND JO_DATE1 BETWEEN '".$min."' AND '".$max."' ");

            $getComputer->execute();
            $computers = $getComputer->fetchAll();
            foreach ($computers as $computer) {
                array_push($data,
                    array("JO_TicketNum"=>$computer["JO_TicketNum"],"JO_Date"=>$computer["JO_Date"],"JO_Department"=>$computer["JO_Department"],"JO_DescOfWork"=>$computer["JO_DescOfWork"],"JO_WhatType"=>$computer["JO_WhatType"]
                ));
            }
            echo json_encode($data);  
        }
        else
        {

            $getJOTotal = $conn->prepare("SELECT COUNT(*) FROM tbl_jostat WHERE JO_Status != 'CANCELLED' AND JO_WhatType = '".$JO_WT."' AND JO_Department = '".$JO_DEPT."' AND JO_DATE1 BETWEEN '".$min."' AND '".$max."'");
            $getJOTotal->execute();
            $TotalNum = $getJOTotal->fetchColumn();

            if($JO_WT == "Computer")
            {
                $getJOTotalPC = $conn->prepare("SELECT COUNT(*) FROM tbl_jostat WHERE JO_Status != 'CANCELLED' AND JO_WhatType = 'Computer' AND JO_Department = '".$JO_DEPT."' AND JO_DATE1 BETWEEN '".$min."' AND '".$max."'");
                $getJOTotalPC->execute();
                $TotalNumPC = $getJOTotalPC->fetchColumn();

                array_push($data,
                array("JO_Total"=>$TotalNum,"JO_TotalPC"=>$TotalNumPC,"JO_TotalPRT"=>"0","JO_TotalNetwork"=>"0","JO_TotalOth"=>"0"));
            }
            else if($JO_WT == "Printer")
            {
                $getJOTotalPRT = $conn->prepare("SELECT COUNT(*) FROM tbl_jostat WHERE JO_Status != 'CANCELLED' AND JO_WhatType = 'Printer' AND JO_Department = '".$JO_DEPT."' AND JO_DATE1 BETWEEN '".$min."' AND '".$max."'");
                $getJOTotalPRT->execute();
                $TotalNumPRT = $getJOTotalPRT->fetchColumn();

                array_push($data,
                array("JO_Total"=>$TotalNum,"JO_TotalPC"=>"0","JO_TotalPRT"=>$TotalNumPRT,"JO_TotalNetwork"=>"0","JO_TotalOth"=>"0"));
            }
            else if($JO_WT == "Network")
            {
                $getJOTotalNTK = $conn->prepare("SELECT COUNT(*) FROM tbl_jostat WHERE JO_Status != 'CANCELLED' AND JO_WhatType = 'Network' AND JO_Department = '".$JO_DEPT."' AND JO_DATE1 BETWEEN '".$min."' AND '".$max."'");
                $getJOTotalNTK->execute();
                $TotalNumNTK = $getJOTotalNTK->fetchColumn();
                array_push($data,
                array("JO_Total"=>$TotalNum,"JO_TotalPC"=>"0","JO_TotalPRT"=>"0","JO_TotalNetwork"=>$TotalNumNTK,"JO_TotalOth"=>"0"));
            }
            else if($JO_WT == "Software")
            {
                $getJOTotalSR = $conn->prepare("SELECT COUNT(*) FROM tbl_jostat WHERE JO_Status != 'CANCELLED' AND JO_WhatType = 'Software' AND JO_Department = '".$JO_DEPT."' AND JO_DATE1 BETWEEN '".$min."' AND '".$max."'");
                $getJOTotalSR->execute();
                $TotalNumSR = $getJOTotalSR->fetchColumn();
                array_push($data,
                array("JO_Total"=>$TotalNum,"JO_TotalPC"=>"0","JO_TotalPRT"=>"0","JO_TotalNetwork"=>"0","JO_TotalOth"=>$TotalNumSR));
            }
            else
            {
                $getJOTotalOTH = $conn->prepare("SELECT COUNT(*) FROM tbl_jostat WHERE JO_Status != 'CANCELLED' AND JO_WhatType = 'Others' AND JO_Department = '".$JO_DEPT."' AND JO_DATE1 BETWEEN '".$min."' AND '".$max."'");
                $getJOTotalOTH->execute();
                $TotalNumOTH = $getJOTotalOTH->fetchColumn();
                array_push($data,
                array("JO_Total"=>$TotalNum,"JO_TotalPC"=>"0","JO_TotalPRT"=>"0","JO_TotalNetwork"=>"0","JO_TotalOth"=>$TotalNumOTH));
            }

            $getComputer = $conn->prepare("SELECT * FROM tbl_jostat WHERE JO_Status != 'CANCELLED' AND JO_Department = '".$JO_DEPT."' AND JO_WhatType = '".$JO_WT."' AND JO_DATE1 BETWEEN '".$min."' AND '".$max."' ");

            $getComputer->execute();
            $computers = $getComputer->fetchAll();
            
            foreach ($computers as $computer) {
                array_push($data,
                    array("JO_TicketNum"=>$computer["JO_TicketNum"],"JO_Date"=>$computer["JO_Date"],"JO_Department"=>$computer["JO_Department"],"JO_DescOfWork"=>$computer["JO_DescOfWork"],"JO_WhatType"=>$computer["JO_WhatType"]
                ));
            }
            echo json_encode($data);  
        }

    } 
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>
