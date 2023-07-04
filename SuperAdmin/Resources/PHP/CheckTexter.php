<?php
    session_start();
    $servername = "localhost";
    $username = "AMS_User";
    $password = "P@ssW0rdAMS2023";

    $data = json_decode(
        file_get_contents('php://input') 
    );

    // $dept =$data->data->dept;
    // $value =$data->data->value;


    try {
        $conn = new PDO("mysql:host=$servername;dbname=ihoms_inventory", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $getOtherNum = $conn->prepare("SELECT COUNT(*) FROM tbl_jostat WHERE JO_Status ='REQUESTED'");
        $getOtherNum->execute();
        $othersNum = $getOtherNum->fetchColumn();

        $getMCCFA = $conn->prepare("SELECT COUNT(*) FROM tbl_jostat WHERE JO_Status ='MCC:FOR APPROVAL'");
        $getMCCFA->execute();
        $MCCFAnum = $getMCCFA->fetchColumn();

        $getAccepted = $conn->prepare("SELECT COUNT(*) FROM tbl_jostat WHERE JO_Status ='ACCEPTED'");
        $getAccepted->execute();
        $AcceptNum = $getAccepted->fetchColumn();

        $getHFA = $conn->prepare("SELECT COUNT(*) FROM tbl_jostat WHERE JO_Status ='HOMIS:FOR APPROVAL'");
        $getHFA->execute();
        $HFANum = $getHFA->fetchColumn();


            $text= "
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
                            con.query(\"SELECT user_CP FROM tbl_users where userlevel ='1' \", function (err, result) {
                                if (err) throw err;
                                for(let i=0;i<result.length; i++){
    
                                    console.log(result[i].user_CP);
                                var phonenumber = result[i].user_CP;
                                console.log('modem is initialized!');
                                var message='There are a total of Requested JO: ".$othersNum.", MCC For Approval JO: ".$MCCFAnum.", Accepted JO: ".$AcceptNum.", For Approval JO: ".$HFANum."';
    
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
            }, 10000);";
    
            $try = fopen("../BAT/texter.js","w");
    
            fwrite($try, $text);
            fclose($try);
    
            $start1 = "start";
            $folder1 = "C:/xampp/htdocs/IMS/SuperAdmin/Resources/BAT/";
            $filename1 = "test456";
            $ext1 = ".bat";
    
            $full1 = $start1 . " ". $folder1 . $filename1 . $ext1;
    
    
            function send($cmd1)
            {
            popen($cmd1, 'r');
            }
    
            send($full1);
    


    } 
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>
