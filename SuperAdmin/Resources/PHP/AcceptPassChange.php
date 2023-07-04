<?php
    session_start();
    $servername = "localhost";
    $username = "AMS_User";
    $password = "P@ssW0rdAMS2023";

    $data = json_decode(
        file_get_contents('php://input') 
    );
    


    $propID=$data->data->propID;
    $pass="password";
    $pass=md5($pass);

    $conn = new PDO("mysql:host=$servername;dbname=ihoms_inventory", $username, $password);
    $sql="SELECT * FROM tbl_users where user_ID = '".$propID  ."'";

    $query = $conn->prepare($sql);
    $query->execute();
    $row = $query->rowCount();

    if($row > 0) 
    {
        $sql3 = "UPDATE tbl_users set  PassReqs = 'NO', pass = '".$pass."' where user_ID ='". $propID ."'";
        $conn->exec($sql3); 

        echo "1";    
    } 
    else
    {
        echo "0";
    }
?>