
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
                        user: 'root',
                        password: '',
                        database: 'ihoms_inventory'
                        });

                    //start con
                        con.connect(function(err) {
                        if (err) throw err;
                        con.query("SELECT user_CP FROM tbl_users where department ='TB-DOTS' ", function (err, result) {
                            if (err) throw err;
                            for(let i=0;i<result.length; i++){

                                console.log(result[i].user_CP);
                            var phonenumber = result[i].user_CP;
                            console.log('modem is initialized!');
                            var message='IMPORTANT NOTICE! Service Report for your Job Order#:2023-05-000005 is already in process and for verification, Thank you.';

                            modem.sendSMS(phonenumber, message, true, (data)=>{
                                console.log(data);
                                
                            });
                
                        }
                    });
                    con.query("SELECT user_CP FROM tbl_users where userlevel='1' ", function (err, result) {
                        if (err) throw err;
                        for(let i=0;i<result.length; i++){

                            console.log(result[i].user_CP);
                        var phonenumber = result[i].user_CP;
                        console.log('modem is initialized!');
                        var message='ALERT! The Turnaround time for JO#:2023-05-000005 is 0 day/s 00 hours 0 minutes 28 seconds. Awaiting for your Approval';

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

        
        