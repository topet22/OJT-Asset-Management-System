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
            $getJO = $conn->prepare("SELECT * FROM tbl_jostat WHERE JO_TicketNum ='".$propID."'");
            $getJO->execute();
            $JO = $getJO->fetchAll();
            $data=array();
            foreach ($JO as $JO) {

                $users = $JO['JO_PerfBy'];

                $getSigna = $conn->prepare("SELECT * FROM tbl_users WHERE user_fullname = '".$users."'");
                $getSigna->execute();
                $Signa = $getSigna->fetchAll();
                foreach ($Signa as $Signas){
                array_push($data,
                array("user_fullname"=>$Signas['user_fullname'],"usersigna"=>$Signas['user_signa']
                ));
            }
            }
            echo json_encode($data);
        }
     
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

?>