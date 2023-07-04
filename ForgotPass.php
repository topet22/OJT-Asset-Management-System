<?php
    session_start();
    $servername = "localhost";
    $username = "AMS_User";
    $password = "P@ssW0rdAMS2023";

    $data = json_decode(
        file_get_contents('php://input') 
    );
    


    $forgotusername=$data->forgotusername;
    $pass="YES";
    $forgotdepartment=$data->forgotdepartment;

    $conn = new PDO("mysql:host=$servername;dbname=ihoms_inventory", $username, $password);
    $sql="SELECT * FROM tbl_users where BINARY username='". $forgotusername ."'  AND department = '".$forgotdepartment  ."'";

    $query = $conn->prepare($sql);
    $query->execute();
    $row = $query->rowCount();
    $fetch = $query->fetch();

    if($row > 0) 
    {
        $userID = $fetch['user_ID'];
        $sql3 = "UPDATE tbl_users set  PassReqs = '". $pass ."' where user_ID ='". $userID ."'";
        $conn->exec($sql3);

        $action = "Requested for password retrieval"; 
        $sql2 = "INSERT INTO audit_r3 (audit_USER, audit_ACTION) VALUES ('". $forgotusername ."','". $action ."')"; 
        $conn->exec($sql2);  

        echo "1";    
    } 
    else
    {
        echo "0";
    }
?>