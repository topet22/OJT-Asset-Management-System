
<?php
    session_start();
    $servername = "localhost";
    $username = "AMS_User";
    $password = "P@ssW0rdAMS2023";

    $_SESSION['DCuser_name'];


    try {
        $conn = new PDO("mysql:host=$servername;dbname=ihoms_inventory", $username, $password);
        $sql="SELECT * FROM tbl_users where BINARY username='". $_SESSION['DCuser_name'] ."' AND department = 'DCI'";

        $data = array();
    
        $query = $conn->prepare($sql);
        $query->execute();
        $row = $query->rowCount();
        $fetch = $query->fetch();

        $statusID = $fetch['pass'];

        if ($statusID == "5f4dcc3b5aa765d61d8327deb882cf99")
        {
            echo 1;
        }
        else
        {
            array_push($data,array("cpnum"=>$fetch['user_CP']));
            echo json_encode($data);
        }
    
        

    
     } catch(PDOException $e) {
     echo "Connection failed: " . $e->getMessage();
     }


?>
