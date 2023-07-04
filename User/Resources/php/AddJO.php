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
    
    $JO_Serial=$data->data->JO_Serial;
    $JO_Desc=$data->data->JO_Desc;
    $JO_Desti=$data->data->JO_Desti;
    $JO_Type=$data->data->JO_Type;
    $JO_PropertyNo=$data->data->JO_PropertyNo;
    $JO_ItemID=$data->data->JO_ItemID;
    $JO_Model=$data->data->JO_Model;
    $JO_User=$data->data->JO_User;


    try {
        $conn = new PDO("mysql:host=$servername;dbname=ihoms_inventory", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $getPrintNum = $conn->prepare("SELECT COUNT(*) FROM tbl_jostat");
        $getPrintNum->execute();
        $PrintNum = $getPrintNum->fetchColumn();
        $PrintNum++;
        $presentyear = date("Y");
        $presentmonth = date("m");
        $pads = $presentyear . "-" . $presentmonth."-00000";
        $newJOID = str_pad($PrintNum,14,$pads,STR_PAD_LEFT);

        $sql = "INSERT INTO tbl_jostat (JO_DesigUser,JO_TicketNum, JO_Department, JO_DeptDesti, serial_NO,JO_DescOfWork, JO_ActionTaken, JO_Assessment, JO_Recommendation,JO_Status,JO_WhatType,JO_PropertyNO,JO_ItemID,JO_Model)
        VALUES ('".$JO_User."','". $newJOID ."','".  $_SESSION['depts']  ."','". $JO_Desti ."','". $JO_Serial ."','". $JO_Desc ."','REQUESTED','REQUESTED','REQUESTED','REQUESTED','".$JO_Type."','".$JO_PropertyNo."','".$JO_ItemID."','".$JO_Model."')";

        if ($JO_Type == "Computer")
        {
            $sql2 = "UPDATE computers set STATS = 'Pending JO', JOReq = 'YES' where item_ID = '".$JO_ItemID."'";
        }
        elseif ($JO_Type == "Printer")
        {
            $sql2 = "UPDATE printer set STATS = 'Pending JO', JOReq = 'YES' where item_ID = '".$JO_ItemID."'";
        }
        else
        {
            $sql2 = "UPDATE others set STATS = 'Pending JO', JOReq = 'YES' where item_ID = '".$JO_ItemID."'";
        }

        $conn->exec($sql);
        $conn->exec($sql2);

        $action = "Generated Job Order No:" . $newJOID;
        $sql3 = "INSERT INTO audit_r3 (audit_USER, audit_ACTION, audit_PROPNO) VALUES ('". $_SESSION['user_name'] ."','". $action ."', '".$JO_PropertyNo."')"; 
        $conn->exec($sql3);  


        $sql4="SELECT * FROM tbl_users where BINARY username='". $_SESSION['user_name'] ."' AND department = '".$_SESSION['depts']."'";
        $query = $conn->prepare($sql4);
        $query->execute();
        $fetch = $query->fetch();

        $statusID = $fetch['user_CP'];



        

        $data1 = array();
        array_push($data1,
        array(
            "JO_TicketNum"=>$newJOID,
            "JO_DeptDesti"=>$JO_Desti,
            "JO_DescOfWork"=>$JO_Desc,
            "JO_Date"=>date("Y/m/d"),
            "JO_Serial"=>$JO_Serial,
            "JO_DesigUser"=>$JO_User,
            "User_CP"=>$statusID
            ));    
        
            $start1 = "start";
            $folder1 = "C:/xampp/htdocs/IMS/User/Resources/bat/";
            $filename1 = "test123";
            $ext1 = ".bat";
    
            $full1 = $start1 . " ". $folder1 . $filename1 . $ext1;
    
    
            function send($cmd1)
            {
            popen($cmd1, 'r');
            }
    
            send($full1);

            
        echo json_encode($data1);  
    } 
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>
