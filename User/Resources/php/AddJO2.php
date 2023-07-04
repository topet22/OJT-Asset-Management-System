<?php
    session_start();
    $servername = "localhost";
    $username = "AMS_User";
    $password = "P@ssW0rdAMS2023";

    $_SESSION['user_name'];
    $_SESSION['depts']; 

    $data = json_decode(
        file_get_contents('php://input') 
    );
    
    $JO_Desc=$data->data->JO_Desc;
    $JO_Desti=$data->data->JO_Desti;
    $JO_Type=$data->data->JO_Type;
    $JO_User=$data->data->JO_User;


    try {
        $conn = new PDO("mysql:host=$servername;dbname=ihoms_inventory", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $getPrintNum = $conn->prepare("SELECT COUNT(*) FROM tbl_jostat");
        $getPrintNum->execute();
        $PrintNum = $getPrintNum->fetchColumn();
        $PrintNum++;
        $presentyear = date("Y");
        $presentmonth = date("m");
        $pads = $presentyear . "-" . $presentmonth."-00000";
        $newJOID = str_pad($PrintNum,14,$pads,STR_PAD_LEFT);

        $sql = "INSERT INTO tbl_jostat (JO_DesigUser,JO_TicketNum, JO_Department, JO_DeptDesti,JO_DescOfWork, JO_ActionTaken, JO_Assessment, JO_Recommendation,JO_Status,JO_WhatType)
        VALUES ('".$JO_User."','". $newJOID ."','".  $_SESSION['depts']  ."','". $JO_Desti ."','". $JO_Desc ."','REQUESTED','REQUESTED','REQUESTED','REQUESTED','".$JO_Type."')";

        $conn->exec($sql);

        $action = "Generated Job Order No:" . $newJOID;
        $sql3 = "INSERT INTO audit_r3 (audit_USER, audit_ACTION) VALUES ('". $_SESSION['user_name'] ."','". $action ."')"; 
        $conn->exec($sql3);  



        $data1 = array();
        array_push($data1,
        array(
            "JO_TicketNum"=>$newJOID,
            "JO_DeptDesti"=>$JO_Desti,
            "JO_DescOfWork"=>$JO_Desc,
            "JO_Date"=>date("Y/m/d"),
            "JO_DesigUser"=>$JO_User
            ));    
        
            
            if($JO_Desti == 'DCI')
            {
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
                                con.query(\"SELECT user_CP FROM tbl_users where userlevel ='1' \", function (err, result) {
                                    if (err) throw err;
                                    for(let i=0;i<result.length; i++){
        
                                        console.log(result[i].user_CP);
                                    var phonenumber = result[i].user_CP;
                                    console.log('modem is initialized!');
                                    var message='IMPORTANT NOTICE! New Job Order Requested.';
        
                                    modem.sendSMS(phonenumber, message, true, (data)=>{
                                        console.log(data);
                                        
                                    });
                        
                                }
                            });
                            con.query(\"SELECT user_CP FROM tbl_users where userlevel='2.5' \", function (err, result) {
                                if (err) throw err;
                                for(let i=0;i<result.length; i++){
        
                                    console.log(result[i].user_CP);
                                var phonenumber = result[i].user_CP;
                                console.log('modem is initialized!');
                                var message='IMPORTANT NOTICE! New Job Order Requested.';
        
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
            }
            else
            {
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
                                con.query(\"SELECT user_CP FROM tbl_users where userlevel ='1' \", function (err, result) {
                                    if (err) throw err;
                                    for(let i=0;i<result.length; i++){
        
                                        console.log(result[i].user_CP);
                                    var phonenumber = result[i].user_CP;
                                    console.log('modem is initialized!');
                                    var message='IMPORTANT NOTICE! New Job Order Requested.';
        
                                    modem.sendSMS(phonenumber, message, true, (data)=>{
                                        console.log(data);
                                        
                                    });
                        
                                }
                            });

                            con.query(\"SELECT user_CP FROM tbl_users where userlevel ='2' AND user_fullname LIKE '%Casilla%' \", function (err, result) {
                                if (err) throw err;
                                for(let i=0;i<result.length; i++){
    
                                    console.log(result[i].user_CP);
                                var phonenumber = result[i].user_CP;
                                console.log('modem is initialized!');
                                var message='IMPORTANT NOTICE! New Job Order Requested.';
    
                                modem.sendSMS(phonenumber, message, true, (data)=>{
                                    console.log(data);
                                    
                                });
                    
                            }
                        });


                            con.query(\"SELECT user_CP FROM tbl_users where userlevel='2' AND user_fullname LIKE '%Almoite%' \", function (err, result) {
                                if (err) throw err;
                                for(let i=0;i<result.length; i++){
        
                                    console.log(result[i].user_CP);
                                var phonenumber = result[i].user_CP;
                                console.log('modem is initialized!');
                                var message='IMPORTANT NOTICE! New Job Order Requested.';
        
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
            }

    
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
            
        echo json_encode($data1);  
    } 
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>
