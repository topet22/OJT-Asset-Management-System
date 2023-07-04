<?php
    session_start();    
    $servername = "localhost";
    $username = "AMS_User";
    $password = "P@ssW0rdAMS2023";

    $data = json_decode(
        file_get_contents('php://input') 
    );

    $propID=$data->data->propID;
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=ihoms_inventory", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //computer
        $getComputer = $conn->prepare("SELECT * FROM audit_r3 where audit_PROPNO = '".$propID."'");
        $getComputer->execute();
        $computers = $getComputer->fetchAll();
        $data=array();
        foreach ($computers as $computer) {
            array_push($data,
                array("audit_ID"=>$computer["audit_ID"],"audit_USER"=>$computer["audit_USER"],"audit_PROPNO"=>$computer["audit_PROPNO"] ,"audit_ACTION"=>$computer["audit_ACTION"] ,"audit_DATE"=>$computer["audit_DATE"]
            ));
        }
        echo json_encode($data);

    } 
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>
