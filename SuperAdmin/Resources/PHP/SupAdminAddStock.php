
<?php
    session_start();
    $servername = "localhost";
    $username = "AMS_User";
    $password = "P@ssW0rdAMS2023";

    $data = json_decode(
        file_get_contents('php://input') 
    );

    $WhatType =$data-> WhatType;
    $InvPropNo=$data->InvPropNo;
    $InvSerial=$data->InvSerial;
    $InvDate=$data->InvDate;
    $InvModel=$data->InvModel;
    $InvBrand=$data->InvBrand;
    $InvDesc=$data->InvDesc;

    //Dedicated keys for Computer Selection
    $CompOS =$data-> CompOS;
    $Comptype =$data-> Comptype;
    $CompStorageType =$data-> CompStorageType;
    $SSDCap =$data-> SSDCap;
    $HDDCap =$data-> HDDCap;
    $CompRAM =$data-> CompRAM;
    $CompProcessor =$data-> CompProcessor;
    $OSLicense =$data-> OSLicense;


    if (empty($SSDCap)) {
        $SSDCap ="No SSD";
    }

    if (empty($HDDCap)) {
        $HDDCap ="No HDD";
    }

    if(empty($InvPropNo))
    {
        $InvPropNo = "N/A";
    }

    try {
    $conn = new PDO("mysql:host=$servername;dbname=ihoms_inventory", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($WhatType == "Computer"){
        $sql = "INSERT INTO tbl_stocks (WhatType, property_NO, serial_NO, Model,Brand, date_acquired)
        VALUES ('". $WhatType ."','". $InvPropNo ."','". $InvSerial ."','". $InvModel ."','". $InvBrand ."','". $InvDate ."')";
        
        $sql2 = "INSERT INTO tbl_computerspecs (serial_NO,CompType, CompOS,CompRAM, CompStorageType, SSDStorage, HDDStorage, CompProcessor,OSLicense)
        VALUES ('". $InvSerial ."','". $Comptype ."','". $CompOS ."','". $CompRAM ."','". $CompStorageType ."','". $SSDCap ."','". $HDDCap ."','". $CompProcessor ."','". $OSLicense ."')";            
        $conn->exec($sql);
        $conn->exec($sql2);
        echo "1";
    }
    elseif($WhatType == "Printer"){
        $sql = "INSERT INTO tbl_stocks (WhatType, property_NO, serial_NO, Model,Brand, date_acquired)
        VALUES ('". $WhatType ."','". $InvPropNo ."','". $InvSerial ."','". $InvModel ."','". $InvBrand ."','". $InvDate ."')";
        $conn->exec($sql);
        echo "1";
    }
    else{
        $sql = "INSERT INTO tbl_stocks (WhatType, property_NO, serial_NO, Model,Brand, date_acquired, description)
        VALUES ('". $WhatType ."','". $InvPropNo ."','". $InvSerial ."','". $InvModel ."','". $InvBrand ."','". $InvDate ."','". $InvDesc ."')";
        $conn->exec($sql);
        echo "1";
    }

    $action = "Inserted a new stock (" .$InvSerial. ")" ;

    $sql2 = "INSERT INTO audit_r3 (audit_USER, audit_PROPNO	 ,audit_ACTION)
    VALUES ('". $_SESSION['SAuser_name'] ."','". $InvSerial ."','". $action ."')"; 
    $conn->exec($sql2);




    
     } catch(PDOException $e) {
     echo "Connection failed: " . $e->getMessage();
     }


?>

