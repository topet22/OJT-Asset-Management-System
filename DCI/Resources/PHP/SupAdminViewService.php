<?php
    
    session_start();
    
    $servername = "localhost";
    $username = "AMS_User";
    $password = "P@ssW0rdAMS2023";
    
    $data = json_decode(file_get_contents('php://input'));

    $propID=$data->data->propID;

    try {
        $conn = new PDO("mysql:host=$servername;dbname=ihoms_inventory", $username, $password); // INNER JOIN tbl_users ON tbl_jostat.JO_PerfBy = tbl_users.user_fullname; 
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $getJO = $conn->prepare("SELECT * FROM tbl_jostat  WHERE JO_TicketNum ='".$propID."'");
            $getJO->execute();
            $JO = $getJO->fetchAll();
            $data=array();
            foreach ($JO as $JO) {
                array_push($data,
                array("JO_ID"=>$JO["JO_ID"],"JO_Date"=>$JO["JO_Date"],"JO_TicketNum"=>$JO["JO_TicketNum"],"JO_Department"=>$JO["JO_Department"],
                "JO_DeptDesti"=>$JO["JO_DeptDesti"],
                "JO_Serial"=>$JO["serial_NO"],
                "JO_DescOfWork"=>$JO["JO_DescOfWork"],
                "JO_ActionTaken"=>$JO["JO_ActionTaken"],
                "JO_Assessment"=>$JO["JO_Assessment"],
                "JO_Recommendation"=>$JO["JO_Recommendation"],
                "JO_Status"=>$JO["JO_Status"],"JO_PropertyNO"=>$JO["JO_PropertyNO"],"JO_Model"=>$JO["JO_Model"],"JO_PerfBy"=>$JO['JO_PerfBy'],"JO_DesigUser"=>$JO['JO_DesigUser']

                ));
                   
            }
            // $action = "Update Signature" ;
    
            // $sql2 = "INSERT INTO audit_r3 (audit_USER ,audit_ACTION)
            // VALUES ('". $_SESSION['Auser_name'] ."','". $action ."')"; 
            // $conn->exec($sql2);

            echo json_encode($data);
        }
     
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

?>