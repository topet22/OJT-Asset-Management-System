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
        //computer
        $getPM = $conn->prepare("SELECT * FROM tbl_department WHERE dept_Name ='".$_SESSION['depts']."'");

        $getPM->execute();
        $PMS = $getPM->fetchAll();
        $data=array();
        foreach ($PMS as $PM) {
            $ConfirmDate = $PM["PM_Date"];
            $time = date("F jS, Y", strtotime($PM["PM_Date"]));

            if(!isset($ConfirmDate))
            {
                array_push($data,
                array("DatePM"=>'NONE'));
            }
            else
            {
                array_push($data,
                array("DatePM"=>$time));
            }  
        }
        echo json_encode($data);  
    } 
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>
