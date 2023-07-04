<?php
    session_start();
    $servername = "localhost";
    $username = "AMS_User";
    $password = "P@ssW0rdAMS2023";

    $Condemned = "REQUESTED";

    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=ihoms_inventory", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //other
        $getOtherNum = $conn->prepare("SELECT COUNT(*) FROM tbl_jostat WHERE JO_Status ='".$Condemned."' and JO_DeptDesti != 'DCI'");
        $getOtherNum->execute();
        $othersNum = $getOtherNum->fetchColumn();

        $data = array();

        array_push($data,
            array(
                "OthersNumbers"=>$othersNum
                ));    
           
             echo json_encode($data);
        
    
        } 
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>
