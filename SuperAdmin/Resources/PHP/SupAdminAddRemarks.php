
<?php
    session_start();
    $servername = "localhost";
    $username = "AMS_User";
    $password = "P@ssW0rdAMS2023";

    $data = json_decode(
        file_get_contents('php://input') 
    );

    $InvenStatus =$data->InvenStatus;
    $InvenReason=$data->InvenReason;
    $statusID=$data->statusID;
    $statusTYPEs=$data->statusTYPEs;


    try {
    $conn = new PDO("mysql:host=$servername;dbname=ihoms_inventory", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if($statusTYPEs == "Computer")
    {
        $getComputer = $conn->prepare("SELECT * FROM computers WHERE comp_ID ='".$statusID."'");
        $getComputer->execute();
        $computers = $getComputer->fetchAll();
        foreach ($computers as $computer) {
            $CompProp = $computer["property_NO"];
        }

        $sql = "UPDATE computers set  
        STATS = '". $InvenStatus ."', 
        reason = '". $InvenReason ."' where comp_ID='". $statusID ."'";
        $conn->exec($sql);

        $action = "Updated the status of " .$CompProp." to ".$InvenStatus ;

        $sql2 = "INSERT INTO audit_r3 (audit_USER, audit_PROPNO	 ,audit_ACTION)
        VALUES ('". $_SESSION['SAuser_name'] ."','". $CompProp ."','". $action ."')"; 
        $conn->exec($sql2);

        echo "1";
    }

    elseif($statusTYPEs == "Printer")
    {

        $getPrinter = $conn->prepare("SELECT * FROM printer WHERE printer_ID ='".$statusID."'");
        $getPrinter->execute();
        $printers = $getPrinter->fetchAll();
        foreach ($printers as $printer) {
            $PrintProp = $printer["property_NO"];
        }

        $sql = "UPDATE printer set  
        STATS = '". $InvenStatus ."', 
        reason = '". $InvenReason ."' where printer_ID='". $statusID ."'";
        $conn->exec($sql);

        $action = "Updated the status of " .$PrintProp." to ".$InvenStatus ;

        $sql2 = "INSERT INTO audit_r3 (audit_USER, audit_PROPNO	 ,audit_ACTION)
        VALUES ('". $_SESSION['SAuser_name'] ."','". $PrintProp ."','". $action ."')"; 
        $conn->exec($sql2);

        echo "1";
    }

    else
    {
        $getOther = $conn->prepare("SELECT * FROM others WHERE other_ID ='".$statusID."'");
        $getOther->execute();
        $others = $getOther->fetchAll();
        foreach ($others as $other) {
            $OtherProp = $other["property_NO"];
        }

        $sql = "UPDATE others set  
        STATS = '". $InvenStatus ."', 
        reason = '". $InvenReason ."' where other_ID='". $statusID ."'";
        $conn->exec($sql);

        $action = "Updated the status of " .$OtherProp." to ".$InvenStatus ;

        $sql2 = "INSERT INTO audit_r3 (audit_USER, audit_PROPNO	 ,audit_ACTION)
        VALUES ('". $_SESSION['SAuser_name'] ."','". $OtherProp ."','". $action ."')"; 
        $conn->exec($sql2);

        echo "1";
    }
    
     } catch(PDOException $e) {
     echo "Connection failed: " . $e->getMessage();
     }


?>

