<?php
    
    session_start();
    
    $servername = "localhost";
    $username = "AMS_User";
    $password = "P@ssW0rdAMS2023";
    
    $data = json_decode(file_get_contents('php://input'));

    $propID=$data->data->propID;
    $whereto = $data->data->whattype;

    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=ihoms_inventory", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if($whereto == "computers"){ 
            $getComputer = $conn->prepare("SELECT * FROM computers WHERE comp_id ='".$propID."'");
            $getComputer->execute();
            $computers = $getComputer->fetchAll();
            $data=array();
            foreach ($computers as $computer) {
                array_push($data,
                    array("InvDept"=>$computer["department"],"InvID"=>$computer["comp_id"],"InvUser"=>$computer["user"],"InvPropNo"=>$computer["property_NO"] ,"InvSerial"=>$computer["serial_NO"] ,"InvDate"=>$computer["date_acquired"], "InvModel"=>$computer["Model"],"InvBrand"=>$computer["Brand"]
                ));
                $CompSerial= $computer["serial_NO"];
                $compPropNo= $computer["property_NO"];
                $getSpecs = $conn->prepare("SELECT * FROM tbl_computerspecs WHERE serial_NO ='".$CompSerial."'");
                $getSpecs->execute();
                $specs = $getSpecs->fetchAll();
                foreach ($specs as $spec) {
                    array_push($data,
                        array("CompType"=>$spec["CompType"],"CompOS"=>$spec["CompOS"],"CompRAM"=>$spec["CompRAM"],"CompStorageType"=>$spec["CompStorageType"],"CompSSD"=>$spec["SSDStorage"],"CompHDD"=>$spec["HDDStorage"],"CompProcessor"=>$spec["CompProcessor"],"OSLicense"=>$spec["OSLicense"]
                ));    
            }
            echo json_encode($data);
        }}  
        elseif($whereto == "printer"){
            $getComputer = $conn->prepare("SELECT * FROM printer WHERE printer_id ='".$propID."'");
            $getComputer->execute();
            $computers = $getComputer->fetchAll();
            $data=array();
            foreach ($computers as $computer) {
                $PrintSerial= $computer["serial_NO"];
                $printPropNo = $computer["property_NO"];
                array_push($data,
                    array("InvDept"=>$computer["department"],"InvID"=>$computer["printer_id"],"InvUser"=>$computer["user"],"InvPropNo"=>$computer["property_NO"] ,"InvSerial"=>$computer["serial_NO"] ,"InvDate"=>$computer["date_acquired"],"InvModel"=>$computer["Model"],"InvBrand"=>$computer["Brand"]
                ));
                $PrintSerial = $computer["serial_NO"];
            }
            echo json_encode($data);
        }
        else{
            $getComputer = $conn->prepare("SELECT * FROM others WHERE other_id ='".$propID."'");
            $getComputer->execute();
            $computers = $getComputer->fetchAll();
            $data=array();
            foreach ($computers as $computer) {
                $OthSerial= $computer["serial_NO"];
                $otherPropNo = $computer["property_NO"];
                array_push($data,
                    array("InvDept"=>$computer["department"],"InvID"=>$computer["other_id"],"InvUser"=>$computer["user"],"InvPropNo"=>$computer["property_NO"] ,"InvSerial"=>$computer["serial_NO"] ,"InvDate"=>$computer["date_acquired"],"InvDesc"=>$computer["description"],"InvModel"=>$computer["Model"],"InvBrand"=>$computer["Brand"]
                ));
                $OtherSerial = $computer["serial_NO"];
            }
            echo json_encode($data);
        }

        if(isset($CompSerial)){
            $action = "View Computer Specifications of: " .$CompSerial; //my life begin
            $PropNo = $CompSerial;

        }
    
        if(isset($PrintSerial)){
            $action = "View Printer Specifications of: " .$PrintSerial; //my life begin
            $PropNo = $PrintSerial;
        }
    
        if(isset($OtherSerial)){
            $action = "View Equipment Specifications of: " .$OtherSerial; //my life begin
            $PropNo = $OthSerial;
        }
            
            $sql2 = "INSERT INTO audit_r3 (audit_USER, audit_PROPNO, audit_ACTION)
            VALUES ('". $_SESSION['Auser_name'] ."','". $PropNo ."','". $action ."')"; 
            $conn->exec($sql2);  

    } 
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

?>