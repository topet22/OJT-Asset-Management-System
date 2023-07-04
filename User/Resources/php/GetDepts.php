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

       $getComputer = $conn->prepare("SELECT * FROM tbl_department WHERE dept_Name !='".$_SESSION['depts']."'");
       $getComputer->execute();
       $Computers = $getComputer->fetchAll();
       $data1=array();
       foreach ($Computers as $Computer) {
           array_push($data1,
              array("Department"=>$Computer["dept_Name"]));
      }

        
            echo json_encode($data1);  
    } 
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>
