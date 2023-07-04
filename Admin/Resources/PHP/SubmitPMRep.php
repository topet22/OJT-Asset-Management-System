<?php
    session_start();
    $servername = "localhost";
    $username = "AMS_User";
    $password = "P@ssW0rdAMS2023";

    $_SESSION['Auser_name'];
    $_SESSION['Afull_name'];

    $data = json_decode(
        file_get_contents('php://input') 
    );

    //$action=$data->data->action;

    $PM_Serial=$data->data->PM_Serial;
    $PM_Office=$data->data->PM_Office;
    $PM_DesigUser=$data->data->PM_DesigUser;
    $PM_Type=$data->data->PM_Type;

    $PM_Monitor1Serial=$data->data->PM_Monitor1Serial;
    $PM_Monitor2Serial=$data->data->PM_Monitor2Serial;

    $PM_Monitor1Brand=$data->data->PM_Monitor1Brand;
    $PM_Monitor2Brand=$data->data->PM_Monitor2Brand;

    $PM_KBSerial=$data->data->PM_KBSerial;
    $PM_MouseSerial=$data->data->PM_MouseSerial;
    $PM_UPSSerial=$data->data->PM_UPSSerial;

    $PM_KBStat=$data->data->PM_KBStat;
    $PM_MouseStat=$data->data->PM_MouseStat;
    $PM_UPSStat=$data->data->PM_UPSStat;

    $PM_KBModel=$data->data->PM_KBModel;
    $PM_MouseModel=$data->data->PM_MouseModel;
    $PM_UPSModel=$data->data->PM_UPSModel;



    $Q1=$data->data->Q1;
    $Q2=$data->data->Q2;
    $Q3=$data->data->Q3;
    $Q4=$data->data->Q4;
    $Q5=$data->data->Q5;
    $Q6=$data->data->Q6;
    $Q7=$data->data->Q7;
    $Q8=$data->data->Q8;
    $Q9=$data->data->Q9;
    $Q10=$data->data->Q10;
    $Q11=$data->data->Q11;
    $Q12=$data->data->Q12;

    $Q1Rem=$data->data->Q1Rem;
    $Q2Rem=$data->data->Q2Rem;
    $Q3Rem=$data->data->Q3Rem;
    $Q4Rem=$data->data->Q4Rem;
    $Q5Rem=$data->data->Q5Rem;
    $Q6Rem=$data->data->Q6Rem;
    $Q7Rem=$data->data->Q7Rem;
    $Q8Rem=$data->data->Q8Rem;
    $Q9Rem=$data->data->Q9Rem;
    $Q10Rem=$data->data->Q10Rem;
    $Q11Rem=$data->data->Q11Rem;
    $Q12Rem=$data->data->Q12Rem;

    try {
    $conn = new PDO("mysql:host=$servername;dbname=ihoms_inventory", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($PM_Type == "Computer")
    {
        $sql = "INSERT INTO tbl_pm 
        (
            PM_STATUS, 
            PM_Department,
            PM_DoneBy,
            PM_SerialPC, 
            PM_ModelMontor1, 
            PM_ModelMontor2,
            PM_SerialMonitor1, 
            PM_SerialMonitor2,
            PM_SerialKB, 
            PM_SerialMouse, 
            PM_SerialUPS, 
            PM_KBStat, 
            PM_MouseStat,
            PM_UPSStat, 
            PM_ModelKB, 
            PM_ModelMouse,
            PM_ModelUPS, 
            PM_Q1, 
            PM_Q2, 
            PM_Q3, 
            PM_Q4,
            PM_Q5,
            PM_Q6,
            PM_Q7,
            PM_Q8,
            PM_Q9,
            PM_Q10,
            PM_Q11,
            PM_Q12,
            PM_Q1Rems,
            PM_Q2Rems,
            PM_Q3Rems,
            PM_Q4Rems,
            PM_Q5Rems,
            PM_Q6Rems,
            PM_Q7Rems,
            PM_Q8Rems,
            PM_Q9Rems,
            PM_Q10Rems,
            PM_Q11Rems,
            PM_Q12Rems,
            PM_DesigUser,
            PM_Type )
    
    
        VALUES 
        (
            'SUBMITTED',
            '". $PM_Office ."',
            '". $_SESSION['Afull_name'] ."',
            '". $PM_Serial ."',
            '".$PM_Monitor1Brand."',
            '".$PM_Monitor2Brand."',
            '". $PM_Monitor1Serial ."',
            '". $PM_Monitor2Serial ."',
            '". $PM_KBSerial ."',
            '". $PM_MouseSerial ."',
            '". $PM_UPSSerial ."',
            '". $PM_KBStat ."',
            '". $PM_MouseStat ."',
            '". $PM_UPSStat ."',
            '". $PM_KBModel ."',
            '". $PM_MouseModel ."',
            '". $PM_UPSModel ."',
            '". $Q1 ."',
            '". $Q2 ."',
            '". $Q3 ."',
            '". $Q4 ."',
            '". $Q5 ."',
            '". $Q6 ."',
            '". $Q7 ."',
            '". $Q8 ."',
            '". $Q9 ."',
            '". $Q10 ."',
            '". $Q11 ."',
            '". $Q12 ."',
            '". $Q1Rem ."',
            '". $Q2Rem ."',
            '". $Q3Rem ."',
            '". $Q4Rem ."',
            '". $Q5Rem ."',
            '". $Q6Rem ."',
            '". $Q7Rem ."',
            '". $Q8Rem ."',
            '". $Q9Rem ."',
            '". $Q10Rem ."',
            '". $Q11Rem ."',
            '". $Q12Rem ."',
            '".$PM_DesigUser."',
            '".$PM_Type."'
            )";
    }
    else
    {
        $sql = "INSERT INTO tbl_pm 
        (
            PM_STATUS, 
            PM_Department,
            PM_DoneBy,
            PM_SerialPC, 
            PM_Q3, 
            PM_Q4,
            PM_Q5,
            PM_Q3Rems,
            PM_Q4Rems,
            PM_Q5Rems,
            PM_DesigUser,
            PM_Type )
    
    
        VALUES 
        (
            'SUBMITTED',
            '". $PM_Office ."',
            '". $_SESSION['Afull_name'] ."',
            '". $PM_Serial ."',
            '". $Q3 ."',
            '". $Q4 ."',
            '". $Q5 ."',
            '". $Q3Rem ."',
            '". $Q4Rem ."',
            '". $Q5Rem ."',
            '".$PM_DesigUser."',
            '".$PM_Type."'
            )";
    }

    
    $action = "Generated PM Report of: " . $PM_Serial;
    $sql3 = "INSERT INTO audit_r3 (audit_USER, audit_ACTION) VALUES ('". $_SESSION['Auser_name'] ."','". $action ."')"; 
    $conn->exec($sql3);
   

    $conn->exec($sql);
    echo "1";
     } catch(PDOException $e) {
     echo "Connection failed: " . $e->getMessage();
     }
?>