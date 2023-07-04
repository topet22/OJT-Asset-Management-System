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
        $getComputer = $conn->prepare("SELECT * FROM tbl_jostat  WHERE JO_Department ='".$_SESSION['depts']."'");

        $getComputer->execute();
        $computers = $getComputer->fetchAll();
        $data=array();
        $uses = "NA";
        foreach ($computers as $computer) {

            // $JO_Accepted=;

            // if (isset($JO_Accepted)) {
            //     $getUser = $conn->prepare("SELECT * FROM tbl_users WHERE username ='".$JO_Accepted."'");
            //     $getUser->execute();
            //     $users = $getUser->fetchAll();
            //     foreach ($users as $user) {
            //         $uses = $user["user_fullname"];
            //     }
            //   }
            //   else
            //   {
            //     $uses = "NA";
            //   }

            array_push($data,
                array("JONumber"=>$computer["JO_TicketNum"],"JOStatus"=>$computer["JO_Status"],"JO_Accepted"=>$computer["JO_AcceptedBy"]
            ));
        }
        echo json_encode($data);  
    } 
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>
