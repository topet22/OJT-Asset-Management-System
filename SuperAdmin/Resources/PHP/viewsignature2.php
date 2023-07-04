<?php
    
    session_start();
    
    $servername = "localhost";
    $username = "AMS_User";
    $password = "P@ssW0rdAMS2023";
    
    $data = json_decode(file_get_contents('php://input'));

    $_SESSION['SAuser_name'];

    try {
        $conn = new PDO("mysql:host=$servername;dbname=ihoms_inventory", $username, $password); // INNER JOIN tbl_users ON tbl_jostat.JO_PerfBy = tbl_users.user_fullname; 
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $getJO = $conn->prepare("SELECT * FROM tbl_users WHERE username ='".$_SESSION['SAuser_name']."'");
            $getJO->execute();
            $JO = $getJO->fetchAll();
            $data=array();
            foreach ($JO as $JO) {

                array_push($data,
                array("usersignat"=>$JO['user_signa'],"nameSA"=>$JO["user_fullname"]
                ));
            }
            echo json_encode($data);
            }
            
     
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

?>