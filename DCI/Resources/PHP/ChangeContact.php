
<?php
    session_start();
    $servername = "localhost";
    $username = "AMS_User";
    $password = "P@ssW0rdAMS2023";

    $_SESSION['DCuser_name'];


    $data = json_decode(
        file_get_contents('php://input') 
    );

    $NewContact =$data->NewContact;
   

    try {
    $conn = new PDO("mysql:host=$servername;dbname=ihoms_inventory", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql="SELECT * FROM tbl_users where BINARY username='". $_SESSION['DCuser_name'] ."'";
    
        $query = $conn->prepare($sql);
        $query->execute();
        $row = $query->rowCount();
        $fetch = $query->fetch();
    
        if($row > 0) 
        {
            $prefix = "63";
            $Contact = $prefix . $NewContact;
            $statusID = $fetch['user_ID'];
            $sql = "UPDATE tbl_users set  
            user_CP = '". $Contact ."' where user_ID='". $statusID ."'";
            $conn->exec($sql);
    
            // $action = "Update Contact Number" ;
    
            // $sql2 = "INSERT INTO audit_r3 (audit_USER ,audit_ACTION)
            // VALUES ('". $_SESSION['user_name'] ."','". $action ."')"; 
            // $conn->exec($sql2);
    
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

