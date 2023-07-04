<?php
    session_start();
    $servername = "localhost";
    $username = "AMS_User";
    $password = "P@ssW0rdAMS2023";

    $data = json_decode(
        file_get_contents('php://input') 
    );

    $dept_name=$data->dept_name;

    try {
    $conn = new PDO("mysql:host=$servername;dbname=ihoms_inventory", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = $conn->prepare("SELECT COUNT(*) AS `total` FROM tbl_department WHERE dept_Name = :names");
    $sql->execute(array(':names' => $dept_name));
    $result = $sql->fetchObject();

    if ($result->total > 0) 
    {
        echo "2";
    }
    else 
    {
        $sql2 = "INSERT INTO tbl_department (dept_Name) VALUES ('".$dept_name."')";
        $conn->exec($sql2);
        echo "1";
    }
    
     } catch(PDOException $e) {
     echo "Connection failed: " . $e->getMessage();
     }

        $user = "Estes";

        $action = "Added New Department: " .$dept_name; //my life begin
            
            $sql3 = "INSERT INTO audit_r3 (audit_USER, audit_ACTION)
            VALUES ('". $_SESSION['SAuser_name'] ."','". $action ."')"; 
            $conn->exec($sql3);  


?>