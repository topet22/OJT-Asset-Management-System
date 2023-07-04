<?php

    session_start();

    $servername = "localhost";
    $username = "AMS_User";
    $password = "P@ssW0rdAMS2023";

    $data = json_decode(
        file_get_contents('php://input') 
    );

    $propID=$data->data->propID;
    $whattype=$data->data->whattype;
    $department=$data->data->department;
    $desigUser=$data->data->desigUser;    

    $stat = "In Use";


    try {
        $conn = new PDO("mysql:host=$servername;dbname=ihoms_inventory", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //computer
        $getComputer = $conn->prepare("SELECT * FROM tbl_stocks WHERE stock_ID ='".$propID."'");
        $getComputer->execute();
        $computers = $getComputer->fetchAll();
        $data=array();
        foreach ($computers as $computer) {
            if($whattype == "Computer"){
                $property_NO = $computer["property_NO"];
                $serial_NO = $computer["serial_NO"];
                $Model = $computer["Model"];
                $Brand = $computer["Brand"];
                $date_acquired = $computer["date_acquired"];

                $getCompNum = $conn->prepare("SELECT COUNT(*) FROM computers");
                $getCompNum->execute();
                $CompNum = $getCompNum->fetchColumn();
                $CompNum++;
                $newPCID = str_pad($CompNum,12,"ICT-PC-0000",STR_PAD_LEFT);

                $sql = "INSERT INTO computers (department, user, item_ID, property_NO, serial_NO, Model,Brand, date_acquired, STATS)
                VALUES ('". $department ."','". $desigUser ."','". $newPCID ."','". $property_NO ."','". $serial_NO ."','". $Model ."','". $Brand ."','". $date_acquired ."','".$stat."')"; 
                
                $conn->exec($sql);

                // $delREC = "DELETE FROM tbl_stocks WHERE stock_ID ='".$propID."'";
                // $conn->exec($delREC);

                $delREC = "UPDATE tbl_stocks set stock_STATUS = 'TRANSFERRED' WHERE stock_ID = '".$propID."'";
                $conn->exec($delREC);
                echo "1";

            }
            elseif($whattype == "Printer"){
                $property_NO = $computer["property_NO"];
                $serial_NO = $computer["serial_NO"];
                $Model = $computer["Model"];
                $Brand = $computer["Brand"];
                $date_acquired = $computer["date_acquired"];

                $getPrintNum = $conn->prepare("SELECT COUNT(*) FROM printer");
                $getPrintNum->execute();
                $PrintNum = $getPrintNum->fetchColumn();
                $PrintNum++;
                $newPTID = str_pad($PrintNum,12,"ICT-PT-0000",STR_PAD_LEFT);

                $sql = "INSERT INTO printer (department, user, item_ID, property_NO, serial_NO, Model,Brand, date_acquired, STATS)
                VALUES ('". $department ."','". $desigUser ."','". $newPTID ."','". $property_NO ."','". $serial_NO ."','". $Model ."','". $Brand ."','". $date_acquired ."','".$stat."')"; 
                
                $conn->exec($sql);

                // $delREC = "DELETE FROM tbl_stocks WHERE stock_ID ='".$propID."'";
                // $conn->exec($delREC);

                $delREC = "UPDATE tbl_stocks set stock_STATUS = 'TRANSFERRED' WHERE stock_ID = '".$propID."'";
                $conn->exec($delREC);

                echo "1";
            }
            else{
                $property_NO = $computer["property_NO"];
                $serial_NO = $computer["serial_NO"];
                $Model = $computer["Model"];
                $Brand = $computer["Brand"];
                $date_acquired = $computer["date_acquired"];
                $description = $computer["description"];

                $getOtherNum = $conn->prepare("SELECT COUNT(*) FROM others");
                $getOtherNum->execute();
                $othersNum = $getOtherNum->fetchColumn();
                $othersNum++;
                $newOEID = str_pad($othersNum,12,"ICT-OE-0000",STR_PAD_LEFT);

                $sql = "INSERT INTO others (department, user, item_ID, property_NO, serial_NO, description, Model,Brand, date_acquired,STATS)
                VALUES ('". $department ."','". $desigUser ."','". $newOEID ."','". $property_NO ."','". $serial_NO ."','". $description ."','". $Model ."','". $Brand ."','". $date_acquired ."','".$stat."')"; 
                
                $conn->exec($sql);

                // $delREC = "DELETE FROM tbl_stocks WHERE stock_ID ='".$propID."'";
                // $conn->exec($delREC);

                $delREC = "UPDATE tbl_stocks set stock_STATUS = 'TRANSFERRED' WHERE stock_ID = '".$propID."'";
                $conn->exec($delREC);
                echo "1";
            }

        }
        $user = "Test456";
        $action = "Transfered " .$property_NO . " Stock to ". $department ;

        $sql2 = "INSERT INTO audit_r3 (audit_USER, audit_PROPNO ,audit_ACTION)
        VALUES ('". $_SESSION['SAuser_name'] ."','". $property_NO ."','". $action ."')"; 
        $conn->exec($sql2);
    } 
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }


?>