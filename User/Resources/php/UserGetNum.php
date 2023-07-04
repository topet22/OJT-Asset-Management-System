<?php
    session_start();
    $servername = "localhost";
    $username = "AMS_User";
    $password = "P@ssW0rdAMS2023";

    $Condemned = "Condemned";


    $_SESSION['depts']; 

    $stattus = array("Pulled out", "Serviceable", "For Repair","Condemned");

    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=ihoms_inventory", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //other
        $getOtherNum = $conn->prepare("SELECT COUNT(*) FROM others WHERE department ='".$_SESSION['depts']."' AND STATS !='".$Condemned."'");
        $getOtherNum->execute();
        $othersNum = $getOtherNum->fetchColumn();

        $getCompNum = $conn->prepare("SELECT COUNT(*) FROM computers WHERE department ='".$_SESSION['depts']."' AND STATS !='".$Condemned."'");
        $getCompNum->execute();
        $CompNum = $getCompNum->fetchColumn();

        $getPrintNum = $conn->prepare("SELECT COUNT(*) FROM printer WHERE department ='".$_SESSION['depts']."' AND STATS !='".$Condemned."'");
        $getPrintNum->execute();
        $PrintNum = $getPrintNum->fetchColumn();

        
        $stat0 = 0;
        $stat1 = 0;
        $stat2 = 0;
        $stat3 = 0;
        $length = count($stattus);


        // $getOther = $conn->prepare("SELECT * FROM others");
        // $getOther->execute();
        // $others = $getOther->fetchAll();
        // foreach ($others as $other) {
        //         if ($other['STATS'] == $stattus[0]){
        //             $stat0++;
        //         }
        //         elseif ($other['STATS'] == $stattus[1]){
        //             $stat1++;
        //         }
        //         elseif ($other['STATS'] == $stattus[2]){
        //             $stat2++;
        //         }
        //         else
        //         {
        //             $stat3++;
        //         }
        // }

        // $getComp = $conn->prepare("SELECT * FROM computers");
        // $getComp->execute();
        // $Comps = $getComp->fetchAll();
        // foreach ($Comps as $comp) {
        //         if ($comp['STATS'] == $stattus[0]){
        //             $stat0++;
        //         }
        //         elseif ($comp['STATS'] == $stattus[1]){
        //             $stat1++;
        //         }
        //         elseif ($comp['STATS'] == $stattus[2]){
        //             $stat2++;
        //         }
        //         else
        //         {
        //             $stat3++;
        //         }
        // }

        // $getPrint = $conn->prepare("SELECT * FROM printer");
        // $getPrint->execute();
        // $Prints = $getPrint->fetchAll();
        // foreach ($Prints as $print) {
        //         if ($print['STATS'] == $stattus[0]){
        //             $stat0++;
        //         }
        //         elseif ($print['STATS'] == $stattus[1]){
        //             $stat1++;
        //         }
        //         elseif ($print['STATS']  == $stattus[2]){
        //             $stat2++;
        //         }
        //         else
        //         {
        //             $stat3++;
        //         }
        // }


        $data = array();

        array_push($data,
            array(
                "ComputerNumbers"=>$CompNum,
                "PrinterNumbers"=>$PrintNum,
                "OthersNumbers"=>$othersNum,
                // "InvPO"=>$stat0,
                // "InvService"=>$stat1,
                // "InvFR"=>$stat2,
                // "InvCondemn"=>$stat3
                ));    
           
             echo json_encode($data);
        
    
        } 
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>
