<?php
    session_start();
    $servername = "localhost";
    $username = "AMS_User";
    $password = "P@ssW0rdAMS2023";

    $_SESSION['Auser_name'];
    $_SESSION['Afull_name'];

    $data = json_decode(
        file_get_contents('php://input') 
    );

    $action=$data->action;
    $assesment=$data->assesment;
    $recommendation=$data->recommendation;
    $joticketnum=$data->joticketnum;
    $sigdataUrl=$data->sigdataUrl;

    date_default_timezone_set('Asia/Manila');
    $today = date("Y-m-d H:i:s"); 
    $today1 = date("Y-m-d"); 

    try {
    $conn = new PDO("mysql:host=$servername;dbname=ihoms_inventory", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $getJO = $conn->prepare("SELECT * FROM tbl_jostat where JO_TicketNum = '".$joticketnum."'");
    $getJO->execute();
    $JOS = $getJO->fetchAll();
    foreach($JOS as $JO)
    {
        $PropertyNo = $JO['JO_PropertyNO'];
    }

        $conn = new PDO("mysql:host=$servername;dbname=ihoms_inventory", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $sql2 = "SELECT * FROM tbl_jostat where JO_TicketNum='". $joticketnum ."' AND JO_AcceptedBy = '". $_SESSION['Afull_name']."'";
        $query = $conn->prepare($sql2);
        $query->execute();
        $row = $query->rowCount();
    
    
        if ($row > 0)
        {
            $sql = "UPDATE tbl_jostat set JO_Status='HOMIS:FOR APPROVAL', JO_DATESRDone = '".$today."',JO_DATESRDone1 = '".$today1."',JO_ActionTaken = '". $action ."', JO_Assessment = '". $assesment ."', JO_Recommendation = '". $recommendation ."', JO_PerfBy = '".$_SESSION['Afull_name']."' where JO_TicketNum='". $joticketnum ."'";
            $conn->exec($sql);
        
            $action = "Generated Service Report for Job Order No:" . $joticketnum;
            $sql3 = "INSERT INTO audit_r3 (audit_USER, audit_ACTION, audit_PROPNO) VALUES ('". $_SESSION['Auser_name'] ."','". $action ."','".$PropertyNo."')"; 
            $conn->exec($sql3);  

            $getDept = $conn->prepare("SELECT * FROM tbl_jostat where JO_TicketNum='". $joticketnum."'");
            $getDept->execute();
            $Depts = $getDept->fetchAll();
            foreach ($Depts as $Dept) {
                $date1 = $Dept["JO_DATEAccept"];
                $date2 = $Dept["JO_DATESRDone"];

                $depart = $Dept["JO_Department"];
        }
        
        $date1 = new DateTime($date1);
        $date2 = new DateTime($date2);
        $interval = $date1->diff($date2);
        $TAT =  $interval->format('%d day/s %H hours %i minutes %s seconds');

        $text= 
        "
        const serialportgsm = require('serialport-gsm')
        let modem = serialportgsm.Modem()
        let options = {
            baudRate: 9600,
            dataBits: 8,
            stopBits: 1,
            parity: 'none',
            rtscts: false,
            xon: false,
            xoff: false,
            xany: false,
            autoDeleteOnReceive: true,
            enableConcatenation: true,
            incomingCallIndication: true,
            incomingSMSIndication: true,
            pin: '',
            customInitCommand: '',
            cnmiCommand: 'AT+CNMI=2,1,0,2,1',
            logger: console
        }

        modem.open('COM3', options, {});

        modem.on('open', data => {
            modem.initializeModem((data)=>{ 
                var mysql = require('mysql');

                        var con = mysql.createConnection({
                            host: 'localhost',
                            user: 'AMS_User',
                            password: 'P@ssW0rdAMS2023',
                            database: 'ihoms_inventory'
                        });

                    //start con
                        con.connect(function(err) {
                        if (err) throw err;
                        con.query(\"SELECT user_CP FROM tbl_users where department ='".$depart."' \", function (err, result) {
                            if (err) throw err;
                            for(let i=0;i<result.length; i++){

                                console.log(result[i].user_CP);
                            var phonenumber = result[i].user_CP;
                            console.log('modem is initialized!');
                            var message='IMPORTANT NOTICE! Service Report for your Job Order#:".$joticketnum." is already in process and for verification, Thank you.';

                            modem.sendSMS(phonenumber, message, true, (data)=>{
                                console.log(data);
                                
                            });
                
                        }
                    });
                    con.query(\"SELECT user_CP FROM tbl_users where userlevel='1' \", function (err, result) {
                        if (err) throw err;
                        for(let i=0;i<result.length; i++){

                            console.log(result[i].user_CP);
                        var phonenumber = result[i].user_CP;
                        console.log('modem is initialized!');
                        var message='ALERT! The Turnaround time for JO#:".$joticketnum." is ".$TAT.". Awaiting for your Approval';

                        modem.sendSMS(phonenumber, message, true, (data)=>{
                            console.log(data);
                            
                        });
            
                    }
                });

                });//end con



            
            });
        
        })
        modem.on('onSendingMessage', result => { 
        console.log(result);
        
            
        })

        setTimeout(() => {
            console.log('Exiting.');
            process.exit(2000);
        }, 10000);

        
        ";

            $try = fopen("../BAT/accept.js","w");

            fwrite($try, $text);
            fclose($try);

            $start1 = "start";
            $folder1 = "C:/xampp/htdocs/IMS/Admin/Resources/BAT/";
            $filename1 = "test123";
            $ext1 = ".bat";

            $full1 = $start1 . " ". $folder1 . $filename1 . $ext1;


            function send($cmd1)
            {
            popen($cmd1, 'r');
            }

            send($full1);
        
            echo"1";   
        }
        else
        {
            echo"2";
        }
    
     } catch(PDOException $e) {
     echo "Connection failed: " . $e->getMessage();
     }


?>