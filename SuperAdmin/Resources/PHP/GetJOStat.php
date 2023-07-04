<?php
    session_start();
    $servername = "localhost";
    $username = "AMS_User";
    $password = "P@ssW0rdAMS2023";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=ihoms_inventory", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //computer
        $getComputer = $conn->prepare("SELECT * FROM tbl_jostat WHERE JO_Status='HOMIS:FOR APPROVAL'");

        $getComputer->execute();
        $computers = $getComputer->fetchAll();
        $data=array();
        foreach ($computers as $computer) {
            array_push($data,
                array("JONumber"=>$computer["JO_TicketNum"],"JOStatus"=>$computer["JO_Status"],"JO_Department"=>$computer["JO_Department"],"JO_PerfBy"=>$computer["JO_PerfBy"],"JO_Recom"=>$computer["JO_Recommendation"],"JO_AcceptedBy"=>$computer["JO_AcceptedBy"]
            ));
        }
        echo json_encode($data);  
    } 
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>
