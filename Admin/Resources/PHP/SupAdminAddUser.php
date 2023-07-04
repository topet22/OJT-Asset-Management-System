
<?php
    session_start();
    $servername = "localhost";
    $username = "AMS_User";
    $password = "P@ssW0rdAMS2023";

    $data = json_decode(
        file_get_contents('php://input') 
    );

    $AddUsername =$data->AddUsername;
    $AddPassword=$data->AddPassword;
    $UserDepartment=$data->UserDepartment;
    $AddUserLevel=$data->AddUserLevel;

    $AddPassword = md5($AddPassword);  

    try {
    $conn = new PDO("mysql:host=$servername;dbname=ihoms_inventory", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO tbl_users (department, username, pass, userlevel)
    VALUES ('". $UserDepartment ."','". $AddUsername ."','". $AddPassword ."','". $AddUserLevel ."')";
    $conn->exec($sql);
    echo "1";
    
    $action = "Added a New User (" .$AddUsername. ")" ;

    $sql2 = "INSERT INTO audit_r3 (audit_USER, audit_ACTION)
    VALUES ('". $_SESSION['Auser_name'] ."','". $action ."')"; 
    $conn->exec($sql2);

    
     } catch(PDOException $e) {
     echo "Connection failed: " . $e->getMessage();
     }


?>

