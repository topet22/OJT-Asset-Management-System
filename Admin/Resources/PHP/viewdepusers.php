<?php
    $servername = "localhost";
    $username = "AMS_User";
    $password = "P@ssW0rdAMS2023";

    $data = json_decode(
        file_get_contents('php://input') 
    );

    $selected=$data->data->selected;

    if (!isset($selected)){
        $selected = "MCCO";
    }
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=ihoms_inventory", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //printer
        $getDepartment = $conn->prepare("SELECT * FROM tbl_users WHERE department = '".$selected."'");
        $getDepartment->execute();
        $Departments = $getDepartment->fetchAll();
        $data1=array();
        foreach ($Departments as $Department) {
            array_push($data1,
               array("dept_user"=>$Department["username"]
            ));
       }
        
            echo json_encode($data1);
          
            } 
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>
