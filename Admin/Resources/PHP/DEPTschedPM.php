<?php
    session_start();
    $servername = "localhost";
    $username = "AMS_User";
    $password = "P@ssW0rdAMS2023";


    try {
    $conn = new PDO("mysql:host=$servername;dbname=ihoms_inventory", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $presentmonth = date('F');

    $getDept = $conn->prepare("SELECT * FROM tbl_department WHERE monthname(PM_DATE) ='".$presentmonth."'");
    $getDept->execute();
    $depts = $getDept->fetchAll();
    $data=array();
    foreach ($depts as $dept) {
        array_push($data,
            array("Department"=>$dept["dept_Name"],"Schedule"=>$dept["PM_Date"]
        ));
    }
    echo json_encode($data);
    
     } catch(PDOException $e) {
     echo "Connection failed: " . $e->getMessage();
     }


?>