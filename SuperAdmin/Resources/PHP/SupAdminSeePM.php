<?php
    session_start();
    $servername = "localhost";
    $username = "AMS_User";
    $password = "P@ssW0rdAMS2023";


    try {
    $conn = new PDO("mysql:host=$servername;dbname=ihoms_inventory", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $getDept = $conn->prepare("SELECT * FROM tbl_department");
    $getDept->execute();
    $depts = $getDept->fetchAll();
    $data=array();
    foreach ($depts as $dept) {
        $check = $dept["PM_Date"];
        if (!isset($check)){
            $check = "Unscheduled";
        }
        array_push($data,
            array("Department"=>$dept["dept_Name"],"Schedule"=>$check
        ));
    }
    echo json_encode($data);
    
     } catch(PDOException $e) {
     echo "Connection failed: " . $e->getMessage();
     }


?>