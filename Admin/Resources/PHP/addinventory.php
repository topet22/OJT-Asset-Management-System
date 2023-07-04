<?php

    $servername = "localhost";
    $username = "AMS_User";
    $password = "P@ssW0rdAMS2023";
    
    session_start();
    $data = json_decode(
        file_get_contents('php://input') 
    );

    $WhatType =$data-> WhatType;
    $InvDept=$data->InvDept;
    $InvUser=$data->InvUser;
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


    try {
    $conn = new PDO("mysql:host=$servername;dbname=ihoms_inventory", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($WhatType == "Computer"){

        $getCompNum = $conn->prepare("SELECT COUNT(*) FROM computers");
        $getCompNum->execute();
        $CompNum = $getCompNum->fetchColumn();
        $CompNum++;
        $newPCID = str_pad($CompNum,12,"ICT-PC-0000",STR_PAD_LEFT);

        if (empty($InvSerial)) {
            $sql = "INSERT INTO computers (department, user, item_ID ,property_NO, serial_NO, Model, Brand, date_acquired, STATS)
            VALUES ('". $InvDept ."','". $InvUser ."','". $newPCID ."','". $InvPropNo ."','". $newPCID ."','". $InvModel ."','".$InvBrand."','".$InvDate."','In Use')";

            $sql2 = "INSERT INTO tbl_computerspecs (serial_NO,CompType, CompOS,CompRAM, CompStorageType, SSDStorage, HDDStorage, CompProcessor,OSLicense)
            VALUES ('". $newPCID ."','". $Comptype ."','". $CompOS ."','". $CompRAM ."','". $CompStorageType ."','". $SSDCap ."','". $HDDCap ."','". $CompProcessor ."','". $OSLicense ."')";

            $dummyprop = $newPCID;
        }
        else
        {
            $sql = "INSERT INTO computers (department, user, item_ID ,property_NO, serial_NO, Model, Brand, date_acquired, STATS)
            VALUES ('". $InvDept ."','". $InvUser ."','". $newPCID ."','". $InvPropNo ."','". $InvSerial ."','". $InvModel ."','".$InvBrand."','".$InvDate."','In Use')";

            $sql2 = "INSERT INTO tbl_computerspecs (serial_NO,CompType, CompOS,CompRAM, CompStorageType, SSDStorage, HDDStorage, CompProcessor,OSLicense)
            VALUES ('". $InvSerial ."','". $Comptype ."','". $CompOS ."','". $CompRAM ."','". $CompStorageType ."','". $SSDCap ."','". $HDDCap ."','". $CompProcessor ."','". $OSLicense ."')";
        }


        
        $conn->exec($sql);
        $conn->exec($sql2);
        echo "1";
    }
    elseif($WhatType == "Printer"){

        $getPrintNum = $conn->prepare("SELECT COUNT(*) FROM printer");
        $getPrintNum->execute();
        $PrintNum = $getPrintNum->fetchColumn();
        $PrintNum++;
        $newPTID = str_pad($PrintNum,12,"ICT-PT-0000",STR_PAD_LEFT);

        if (empty($InvSerial)) 
        {
            $sql = "INSERT INTO printer (department, user, item_ID, property_NO, serial_NO, Model, Brand, date_acquired, STATS)
            VALUES ('". $InvDept ."','". $InvUser ."','". $newPTID ."','". $InvPropNo ."','". $newPTID ."','". $InvModel ."','".$InvBrand."','".$InvDate."','In Use')";
            
            $dummyprop = $newPTID;
            
        }
        else
        {
            $sql = "INSERT INTO printer (department, user, item_ID, property_NO, serial_NO, Model, Brand, date_acquired, STATS)
            VALUES ('". $InvDept ."','". $InvUser ."','". $newPTID ."','". $InvPropNo ."','". $InvSerial ."','". $InvModel ."','".$InvBrand."','".$InvDate."','In Use')";
        }

        $conn->exec($sql);
        echo "1";
    }
    else{
        $getOtherNum = $conn->prepare("SELECT COUNT(*) FROM others");
        $getOtherNum->execute();
        $othersNum = $getOtherNum->fetchColumn();
        $othersNum++;
        $newOEID = str_pad($othersNum,12,"ICT-OE-0000",STR_PAD_LEFT);

        if (empty($InvSerial))
        {
            $sql = "INSERT INTO others (property_NO,  item_ID, serial_NO, description, department, user, Model, Brand, date_acquired,STATS)
            VALUES ('". $InvPropNo ."','". $newOEID ."','". $newOEID ."','". $InvDesc ."','". $InvDept ."','". $InvUser ."','". $InvModel ."','".$InvBrand."','".$InvDate."','In Use')";

            $dummyprop = $newOEID;
            
        }
        else
        {
            $sql = "INSERT INTO others (property_NO,  item_ID, serial_NO, description, department, user, Model, Brand, date_acquired,STATS)
            VALUES ('". $InvPropNo ."','". $newOEID ."','". $InvSerial ."','". $InvDesc ."','". $InvDept ."','". $InvUser ."','". $InvModel ."','".$InvBrand."','".$InvDate."','In Use')";
        }
        $conn->exec($sql);
        echo "1";
    }

    if(empty($InvSerial))
    {

        $action = "Added New ".$WhatType."-" .$dummyprop; 
        $sql2 = "INSERT INTO audit_r3 (audit_USER, audit_PROPNO, audit_ACTION)
        VALUES ('". $_SESSION['Auser_name'] ."','". $dummyprop ."','". $action ."')"; 
        $conn->exec($sql2);  
    }
    else
    {
        $action = "Added New ".$WhatType."-" .$InvSerial; 
        $sql2 = "INSERT INTO audit_r3 (audit_USER, audit_PROPNO, audit_ACTION)
        VALUES ('". $_SESSION['Auser_name'] ."','". $InvSerial ."','". $action ."')"; 
        $conn->exec($sql2);  
    }

     } catch(PDOException $e) {
     echo "Connection failed: " . $e->getMessage();
     }


            


?>