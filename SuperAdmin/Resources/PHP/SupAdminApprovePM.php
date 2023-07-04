
<?php
    session_start();
    $servername = "localhost";
    $username = "AMS_User";
    $password = "P@ssW0rdAMS2023";
    $data = json_decode(
        file_get_contents('php://input') 
    );

    $_SESSION['SAuser_name'];
    $JO_Num = $data->data->JO_Num;


    try {
    $conn = new PDO("mysql:host=$servername;dbname=ihoms_inventory", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $getComputer = $conn->prepare("SELECT * FROM tbl_pm WHERE PM_ID = '".$JO_Num."'");
    $getComputer->execute();
    $computers = $getComputer->fetchAll();
    foreach ($computers as $computer) {
        $PM_Type = $computer["PM_Type"];
        $PM_SerialPC = $computer["PM_SerialPC"];

        if ($PM_Type == "Computer")
        {
            $getPropNo = $conn->prepare("SELECT * FROM computers WHERE serial_NO = '".$PM_SerialPC."'");
            $getPropNo->execute();
            $propertys = $getPropNo->fetchAll();
            foreach ($propertys as $property) {
                $props = $property["property_NO"];
            }
        }
        elseif ($PM_Type == "Printer") 
        {
            $getPropNo = $conn->prepare("SELECT * FROM printer WHERE serial_NO = '".$PM_SerialPC."'");
            $getPropNo->execute();
            $propertys = $getPropNo->fetchAll();
            foreach ($propertys as $property) {
                $props = $property["property_NO"];
            }
        }
        else
        {
            $getPropNo = $conn->prepare("SELECT * FROM others WHERE serial_NO = '".$PM_SerialPC."'");
            $getPropNo->execute();
            $propertys = $getPropNo->fetchAll();
            foreach ($propertys as $property) {
                $props = $property["property_NO"];
            }
        }
    }

        $sql = "UPDATE tbl_pm SET PM_STATUS = 'APPROVED' WHERE PM_ID = '".$JO_Num."' ";      
        $conn->exec($sql);

        $action = "Approved PM of: " . $PM_SerialPC;
        $sql3 = "INSERT INTO audit_r3 (audit_USER, audit_ACTION, audit_PROPNO) VALUES ('". $_SESSION['SAuser_name'] ."','". $action ."','".$props."')"; 
        $conn->exec($sql3);  

        echo "1";

    
     } catch(PDOException $e) {
     echo "Connection failed: " . $e->getMessage();
     }


?>

