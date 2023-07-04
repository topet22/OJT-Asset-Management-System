<?php
    session_start();
    $servername = "localhost";
    $username = "AMS_User";
    $password = "P@ssW0rdAMS2023";

    $Condemned = "Condemned";

    $stattus = array("For Repair/Pulled out", "In Use","Pending Condemn" ,"Pending JO","Condemned");
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=ihoms_inventory", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //other
        $getOtherNum = $conn->prepare("SELECT COUNT(*) FROM others WHERE STATS !='".$Condemned."'");
        $getOtherNum->execute();
        $othersNum = $getOtherNum->fetchColumn();

        $getCompNum = $conn->prepare("SELECT COUNT(*) FROM computers WHERE STATS !='".$Condemned."'");
        $getCompNum->execute();
        $CompNum = $getCompNum->fetchColumn();

        $getPrintNum = $conn->prepare("SELECT COUNT(*) FROM printer WHERE STATS !='".$Condemned."'");
        $getPrintNum->execute();
        $PrintNum = $getPrintNum->fetchColumn();

        //////

        $getOtherNum1 = $conn->prepare("SELECT COUNT(*) FROM tbl_stocks WHERE stock_STATUS = 'NEW' AND WhatType ='Others'");
        $getOtherNum1->execute();
        $othersNum1 = $getOtherNum1->fetchColumn();

        $getCompNum1 = $conn->prepare("SELECT COUNT(*) FROM tbl_stocks WHERE stock_STATUS = 'NEW' AND WhatType ='Computer'");
        $getCompNum1->execute();
        $CompNum1 = $getCompNum1->fetchColumn();

        $getPrintNum1 = $conn->prepare("SELECT COUNT(*) FROM tbl_stocks WHERE stock_STATUS = 'NEW' AND WhatType ='Printer'");
        $getPrintNum1->execute();
        $PrintNum1 = $getPrintNum1->fetchColumn();


        /////////////////

        
        $stat0 = 0;
        $stat1 = 0;
        $stat2 = 0;
        $stat3 = 0;
        $stat4 = 0;
        $length = count($stattus);


        $getOther = $conn->prepare("SELECT * FROM others");
        $getOther->execute();
        $others = $getOther->fetchAll();
        foreach ($others as $other) {
                if ($other['STATS'] == $stattus[0]){
                    $stat0++;
                }
                elseif ($other['STATS'] == $stattus[1]){
                    $stat1++;
                }
                elseif ($other['STATS'] == $stattus[2]){
                    $stat2++;
                }
                elseif ($other['STATS'] == $stattus[3]){
                    $stat3++;
                }
                else
                {
                    $stat4++;
                }
        }

        $getComp = $conn->prepare("SELECT * FROM computers");
        $getComp->execute();
        $Comps = $getComp->fetchAll();
        foreach ($Comps as $comp) {
                if ($comp['STATS'] == $stattus[0]){
                    $stat0++;
                }
                elseif ($comp['STATS'] == $stattus[1]){
                    $stat1++;
                }
                elseif ($comp['STATS'] == $stattus[2]){
                    $stat2++;
                }
                elseif ($comp['STATS'] == $stattus[3]){
                    $stat3++;
                }
                else
                {
                    $stat4++;
                }
        }

        $getPrint = $conn->prepare("SELECT * FROM printer");
        $getPrint->execute();
        $Prints = $getPrint->fetchAll();
        foreach ($Prints as $print) {
                if ($print['STATS'] == $stattus[0]){
                    $stat0++;
                }
                elseif ($print['STATS'] == $stattus[1]){
                    $stat1++;
                }
                elseif ($print['STATS']  == $stattus[2]){
                    $stat2++;
                }
                elseif ($print['STATS']  == $stattus[3]){
                    $stat3++;
                }
                else
                {
                    $stat4++;
                }
        }


        $data = array();

        array_push($data,
            array(
                "ComputerNumbers"=>$CompNum,
                "PrinterNumbers"=>$PrintNum,
                "OthersNumbers"=>$othersNum,
                "OthersStock"=>$othersNum1,
                "CompStock"=>$CompNum1,
                "PrintStock"=>$PrintNum1,
                "InvFRPO"=>$stat0,
                "InvIU"=>$stat1,
                "InvPC"=>$stat2,
                "InvPJO"=>$stat3,
                "InvCondemn"=>$stat4
                ));    
           
             echo json_encode($data);
        
    
        } 
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>
