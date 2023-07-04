<?php
    session_start();
    $servername = "localhost";
    $username = "AMS_User";
    $password = "P@ssW0rdAMS2023";

    // $Approved = "Approved";
    // $mccFA = "MCC:FOR APPROVAL";
    // $mccA = "MCC:APPROVED";
    // $homisFA = "HOMIS:FOR APPROVAL";
    // $cancelled = "CANCELLED";

    $stats = array("APPROVED","MCC:FOR APPROVAL","MCC:APPROVED","HOMIS:FOR APPROVAL","CANCELLED","ACCEPTED","REQUESTED");

    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=ihoms_inventory", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //other
        $data = array();
        foreach ($stats as $stat) {

            $getOtherNum = $conn->prepare("SELECT COUNT(*) FROM tbl_jostat WHERE JO_Status ='".$stat."'");
            $getOtherNum->execute();
            $othersNum = $getOtherNum->fetchColumn();
            array_push($data,
                array(
                    "Stat"=>$othersNum
                    ));    
        }
             echo json_encode($data);
        
    
        } 
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>
