<?php
    session_start();
    $servername = "localhost";
    $username = "AMS_User";
    $password = "P@ssW0rdAMS2023";

    $user = "TEST123";
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=ihoms_inventory", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $depts = array("MCCO","HFDU","Petro","HRU","CPH & PHC","DRRM-H","IPCU","Legal","QSMO","REC","Chief of Admin Office","BIOMED","Maintenance","Electrical","Planning and Design","Motorpool","Procurement","BAC Sec","Security","Supply","Non- Medical Records","Human Resource ","Linen And Laundry","Finance Mgmt Office","Accounting","Billing ","Budget","Cashier","OPD Cashier","OPD PHIC Portal","Philhealth","CMPS","Dietary","Kiosk","Medical Records/HIMD","MSS","Pharmacy","Satellite Pharmacy","Radiology Office","Radiology - Reception","Radiology - CT Scan","Radiology - MRI","Radiology - XRAY","Radiology - Reading Room","ER Xray","Laboratory","OPD Laboratory","OPD Office","Digihealth Office","Anesthesia Office","ENT Conference Room","Ortho Office","Ophtha Office","Pedia Conference Room","Pulmonary Office","ER Office","OB Gyne Office","Medicine Office","Dental Office","DCFM Office","Surgery Office","PT Rehab","Chief Nurse Office","Nursing Service Office","CSR","AMP","ABTC","2D Echo","Covid Cutting","ENT Nurse Station","ER1","ER2","HDU","Medical Annex 1st Floor","Medical Annex 2nd Floor Left","Medical Annex 2nd Floor Right","Medical Ward 1","Medical Ward 2","MICU/Stroke","NICU","OB 1st Floor","OB 2nd Floor","Frontliners Ward","OSH","Onco","Operating Room","Ortho Nurse Station","Ophtha/Eye Center","OPD Med II","OPD HACT","Pedia Nurse Station","Pedia Isol","PICU","RICU","SICU","Surgery 1st Floor","Subspecialty ","Pysch","TB-DOTS","Trauma","COA"
    );
  

        $data = array();

        foreach ($depts as $dept) {
            $totals = 0;
            $getOtherNum = $conn->prepare("SELECT COUNT(*) FROM computers WHERE department ='".$dept."' AND STATS !='Condemned'");
            $getOtherNum->execute();
            $othersNum = $getOtherNum->fetchColumn();
            

            $getCompNum = $conn->prepare("SELECT COUNT(*) FROM printer WHERE department ='".$dept."' AND STATS !='Condemned'");
            $getCompNum->execute();
            $CompNum = $getCompNum->fetchColumn();


            $getPrintNum = $conn->prepare("SELECT COUNT(*) FROM others WHERE department ='".$dept."' AND STATS !='Condemned'");
            $getPrintNum->execute();
            $PrintNum = $getPrintNum->fetchColumn();


            $totals = $othersNum + $CompNum + $PrintNum;
            $data[$dept] = $totals;
          }

        // array_push($data,
        //     array(
        //         "ComputerNumbers"=>$CompNum,
        //         "PrinterNumbers"=>$PrintNum,
        //         "OthersNumbers"=>$othersNum,
        //         ));    
           
             echo json_encode($data);
        
    
        }  
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>
