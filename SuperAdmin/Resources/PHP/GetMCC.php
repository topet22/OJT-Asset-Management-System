<?php
    session_start();
    $servername = "localhost";
    $username = "AMS_User";
    $password = "P@ssW0rdAMS2023";

    $data = json_decode(
        file_get_contents('php://input') 
    );

    // $dept =$data->data->dept;
    // $value =$data->data->value;


    try {
        $conn = new PDO("mysql:host=$servername;dbname=ihoms_inventory", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

       $getComputer = $conn->prepare("SELECT * FROM tbl_users where userlevel='1.5'");
       $getComputer->execute();
       $Computers = $getComputer->fetchAll();
       $data1=array();
       foreach ($Computers as $Computer) {
           array_push($data1,
              array("user_fullname"=>$Computer["user_fullname"]));
      }
      
            echo json_encode($data1);  
    } 
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>
