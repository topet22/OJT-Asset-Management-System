<?php
    session_start();
    $servername = "localhost";
    $username = "AMS_User";
    $password = "P@ssW0rdAMS2023";

    $data = json_decode(
        file_get_contents('php://input') 
    );



    // $propID=$data->data->propID;
    $spjoid=$data->spjoid;




    try {
    $conn = new PDO("mysql:host=$servername;dbname=ihoms_inventory", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "UPDATE tbl_jostat set JO_Status='MCC:APPROVED' where JO_TicketNum='". $spjoid ."'";
    $conn->exec($sql);

    $action = "Accepted Job Order No:" . $spjoid;
    $sql3 = "INSERT INTO audit_r3 (audit_USER, audit_ACTION) VALUES ('". $_SESSION['user_name'] ."','". $action ."')"; 
    $conn->exec($sql3);  

    $getDept = $conn->prepare("SELECT * FROM tbl_jostat where JO_TicketNum='". $spjoid ."'");
    $getDept->execute();
    $Depts = $getDept->fetchAll();
    foreach ($Depts as $Dept) {
        $depart = $Dept["JO_Department"];
   }

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
                    con.query(\"SELECT user_CP FROM tbl_users where department ='".$depart."' \", function (err, result) {
                        if (err) throw err;
                        for(let i=0;i<result.length; i++){

                            console.log(result[i].user_CP);
                        var phonenumber = result[i].user_CP;
                        console.log('modem is initialized!');
                        var message='IMPORTANT NOTICE! Your JO# ".$spjoid." is already approved by MCC and waiting to be accepted by our IT.';

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

    
     } catch(PDOException $e) {
     echo "Connection failed: " . $e->getMessage();
     }


?>