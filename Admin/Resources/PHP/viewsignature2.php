<?php
    
    session_start();
    
    $servername = "localhost";
    $username = "AMS_User";
    $password = "P@ssW0rdAMS2023";
    
    $data = json_decode(file_get_contents('php://input'));

    // $_SESSION['SAuser_name'];
    // $asd=$data->data->asd;

    try {
        $conn = new PDO("mysql:host=$servername;dbname=ihoms_inventory", $username, $password); 
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $getadmin = $conn->prepare("SELECT * FROM tbl_users WHERE userlevel ='1'");
            $getadmin->execute();
            $admin = $getadmin->fetchAll();
            $data=array();
            foreach ($admin as $admin) {

                array_push($data,
                array("usersignat"=>$admin['user_signa'],"nameSA"=>$admin["user_fullname"]
                ));
            }
            echo json_encode($data);
            }
            
     
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

?>