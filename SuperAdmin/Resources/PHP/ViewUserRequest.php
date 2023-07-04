<?php
    session_start();
    $servername = "localhost";
    $username = "AMS_User";
    $password = "P@ssW0rdAMS2023";


    try {
    $conn = new PDO("mysql:host=$servername;dbname=ihoms_inventory", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $getUser = $conn->prepare("SELECT * FROM tbl_users WHERE PassReqs ='YES'");
    $getUser->execute();
    $users = $getUser->fetchAll();
    $data=array();
    foreach ($users as $user) {
        array_push($data,
            array("UsersName"=>$user["username"],"UsersDepartment"=>$user["department"],"UserID"=>$user["user_ID"]
        ));
    }
    echo json_encode($data);
    
     } catch(PDOException $e) {
     echo "Connection failed: " . $e->getMessage();
     }


?>