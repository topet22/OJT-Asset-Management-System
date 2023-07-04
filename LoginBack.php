<?php
    session_start();
    $servername = "localhost";
    $username = "AMS_User";
    $password = "P@ssW0rdAMS2023";

    $data = json_decode(
        file_get_contents('php://input') 
    );
    


    $uname=$data->username;
    $pass=$data->password;
    $pass = md5($pass);  

    $conn = new PDO("mysql:host=$servername;dbname=ihoms_inventory", $username, $password);
    $sql="SELECT * FROM tbl_users where BINARY username='". $uname ."'AND BINARY pass ='". $pass ."'";

    $query = $conn->prepare($sql);
    $query->execute();
    $row = $query->rowCount();
    $fetch = $query->fetch();

    if($row > 0) 
    {
        $userlevel = $fetch['userlevel'];
        $userdept = $fetch['department'];
        if ($userlevel == 1)
        {
            $_SESSION['SAuser_name'] = $uname;

            $action = "Logged In"; 
            $sql2 = "INSERT INTO audit_r3 (audit_USER, audit_ACTION) VALUES ('". $uname ."','". $action ."')"; 
            $conn->exec($sql2);  

            echo "1";
        }
        elseif ($userlevel == 1.5)
        {
            $_SESSION['user_name'] = $uname;
            $_SESSION['depts'] = $userdept;

            $action = "Logged In"; 
            $sql2 = "INSERT INTO audit_r3 (audit_USER, audit_ACTION) VALUES ('". $uname ."','". $action ."')"; 
            $conn->exec($sql2);  

            echo "1.5";
        }
        elseif ($userlevel == 2) {
            $getComputer = $conn->prepare("SELECT * FROM tbl_users where BINARY username='". $uname ."'AND BINARY pass ='". $pass ."'");

            $getComputer->execute();
            $computers = $getComputer->fetchAll();
            $data=array();
            foreach ($computers as $computer) {
                $_SESSION['Afull_name'] = $computer["user_fullname"];
                $_SESSION['Asigna'] = $computer["user_signa"];
            }

             //audit trail
            $_SESSION['Auser_name'] = $uname;
            $action = "Logged In"; 
            $sql2 = "INSERT INTO audit_r3 (audit_USER, audit_ACTION) VALUES ('". $uname ."','". $action ."')"; 
            $conn->exec($sql2);  

            echo "2";
        }
        elseif ($userlevel == 2.5) {
            $getComputer = $conn->prepare("SELECT * FROM tbl_users where BINARY username='". $uname ."'AND BINARY pass ='". $pass ."'");

            $getComputer->execute();
            $computers = $getComputer->fetchAll();
            $data=array();
            foreach ($computers as $computer) {
                $_SESSION['DCfull_name'] = $computer["user_fullname"];
                $_SESSION['DCsigna'] = $computer["user_signa"];
            }

             //audit trail
            $_SESSION['DCuser_name'] = $uname;
            $action = "Logged In"; 
            $sql2 = "INSERT INTO audit_r3 (audit_USER, audit_ACTION) VALUES ('". $uname ."','". $action ."')"; 
            $conn->exec($sql2);  

            echo "2.5";
        }

        else {
            $_SESSION['user_name'] = $uname;
            $_SESSION['depts'] = $userdept;
            
            $action = "Logged In"; 
            $sql2 = "INSERT INTO audit_r3 (audit_USER, audit_ACTION) VALUES ('". $uname ."','". $action ."')"; 
            $conn->exec($sql2);  

            echo "3";
        }
    } 
    else
    {
        echo "4";
    }
?>