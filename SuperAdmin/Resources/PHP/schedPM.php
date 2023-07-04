<?php
    session_start();
    $servername = "localhost";
    $username = "AMS_User";
    $password = "P@ssW0rdAMS2023";

    $data = json_decode(
        file_get_contents('php://input') 
    );

    $sched_date=$data->sched_date;
    $sched_dept=$data->sched_dept;

    try {
    $conn = new PDO("mysql:host=$servername;dbname=ihoms_inventory", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "UPDATE tbl_department set  
    PM_Date = '". $sched_date ."' where dept_NAME='". $sched_dept ."'";
    $conn->exec($sql);
    echo"1";

    
     } catch(PDOException $e) {
     echo "Connection failed: " . $e->getMessage();
     }


?>