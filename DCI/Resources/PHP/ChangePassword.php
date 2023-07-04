
<?php
    session_start();
    $servername = "localhost";
    $username = "AMS_User";
    $password = "P@ssW0rdAMS2023";
    
    $_SESSION['DCuser_name'];

    $data = json_decode(
        file_get_contents('php://input') 
    );

    $OldPass =$data->OldPass;
    $NewPass=$data->NewPass;

    $ConPass=$data->ConPass;

    $OldPass = md5($OldPass);  
    $NewPass = md5($NewPass);
    $ConPass = md5($ConPass);

    try {
        $conn = new PDO("mysql:host=$servername;dbname=ihoms_inventory", $username, $password);
        $sql="SELECT * FROM tbl_users where BINARY username='". $_SESSION['DCuser_name'] ."'AND BINARY pass ='". $OldPass ."' AND department = 'DCI'";
    
        $query = $conn->prepare($sql);
        $query->execute();
        $row = $query->rowCount();
        $fetch = $query->fetch();
    
        if($row > 0) 
        {
            $statusID = $fetch['user_ID'];
            $sql = "UPDATE tbl_users set  
            pass = '". $NewPass ."' where user_ID='". $statusID ."'";
            $conn->exec($sql);
    
            $action = "Updated Password" ;
    
            $sql2 = "INSERT INTO audit_r3 (audit_USER ,audit_ACTION)
            VALUES ('". $_SESSION['DCuser_name'] ."','". $action ."')"; 
            $conn->exec($sql2);
    
            echo "1";
        } 
        else
        {
            echo "2";
        }

    
     } catch(PDOException $e) {
     echo "Connection failed: " . $e->getMessage();
     }


?>

