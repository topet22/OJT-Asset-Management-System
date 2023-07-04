$(document).ready(function() {

    $('#FirstLogin').modal({
        backdrop: 'static',
        keyboard: false
    })

        $.post("../User/Resources/php/CredChecker.php",
        function(data, status){
            if (data == 1)
            {
                $('#FirstLogin').modal('show');
            }
            else
            {
                $('#FirstLogin').modal('hide');
                var data=$.parseJSON(data);    
                var row="";
                var cpnum = data[0].cpnum;
                $("#currentContact").val(cpnum);
            }
        });
    
            $.post("../User/Resources/php/UserGetNum.php",
            function(data, status){
            var data=$.parseJSON(data);    
            var row="";
            for(var i=0;i<data.length;i++){

                var numcomp = data[i].ComputerNumbers;
                var numprt = data[i].PrinterNumbers;
                var numoth = data[i].OthersNumbers;

                $("#NumberOfComputer").html(numcomp);
                $("#NumberOfPrinter").html(numprt);
                $("#NumberOfOthers").html(numoth);

               
            }
            });

            $.post("../User/Resources/php/UserGetPM.php",
            function(data, status){
            var data=$.parseJSON(data);    
            var row="";
            for(var i=0;i<data.length;i++){

                var pmsched = data[i].DatePM;

                
                
                if(pmsched == "NONE")
                {
                    var message = "Preventive Maintenance TBA";
                }

                else
                {
                    var message = "Preventive Maintenance Schedule is " + pmsched;
                }

                $("#pmcontent").html(message);

               
            }
            });

    //////////////////////////////////////////////////////////////////
            $.post("../User/Resources/php/UserComputers.php",
            function(data, status){
            var data=$.parseJSON(data);    
            var row="";
           
            for(var i=0;i<data.length;i++){

                var status = data[i].InvStatus;

                if (status == "In Use")
                {
                    row=row+"<tr><td>"+data[i].InvUser+"</td><td>"+data[i].InvPropNo+"</td><td>"
                    +data[i].InvSerial+"</td><td>"+data[i].InvModel+"</td><td>"+data[i].InvBrand+"</td><td>"+data[i].CompType+"</td><td>"+data[i].CompOS+"</td><td>"+data[i].InvDate+"</td><td><span class ='badge rounded-pill bg-success'>"
                    +data[i].InvStatus+"</span></td><td>"+data[i].Reason+"</td></tr>";
                }
                else if(status == "Condemned")
                {
                    row=row+"<tr><td>"+data[i].InvUser+"</td><td>"+data[i].InvPropNo+"</td><td>"
                    +data[i].InvSerial+"</td><td>"+data[i].InvModel+"</td><td>"+data[i].InvBrand+"</td><td>"+data[i].CompType+"</td><td>"+data[i].CompOS+"</td><td>"+data[i].InvDate+"</td><td><span class ='badge rounded-pill bg-danger'>"
                    +data[i].InvStatus+"</span></td><td>"+data[i].Reason+"</td></tr>";   
                }
                else if (status == "For Repair/Pulled out")
                {
                    row=row+"<tr><td>"+data[i].InvUser+"</td><td>"+data[i].InvPropNo+"</td><td>"
                    +data[i].InvSerial+"</td><td>"+data[i].InvModel+"</td><td>"+data[i].InvBrand+"</td><td>"+data[i].CompType+"</td><td>"+data[i].CompOS+"</td><td>"+data[i].InvDate+"</td><td><span class ='badge rounded-pill bg-warning text-dark'>"
                    +data[i].InvStatus+"</span></td><td>"+data[i].Reason+"</td></tr>";
                }
                else
                {
                    row=row+"<tr><td>"+data[i].InvUser+"</td><td>"+data[i].InvPropNo+"</td><td>"
                    +data[i].InvSerial+"</td><td>"+data[i].InvModel+"</td><td>"+data[i].InvBrand+"</td><td>"+data[i].CompType+"</td><td>"+data[i].CompOS+"</td><td>"+data[i].InvDate+"</td><td><span class ='badge rounded-pill bg-info'>"
                    +data[i].InvStatus+"</span></td><td>"+data[i].Reason+"</td></tr>";
                }
                

            }
            $('#comp_data').html(row);
            
            var table_comp = $('#tbl_computers').DataTable({
                "processing": true,
                "serverSide": false,
                "stateSave": true,
                "searching":true,
                "bDestroy": true,
                "scrollY":true,
                "scrollX":true,
                "dom": 'B<"clear">lfrtip',
                "buttons": [
                    {
                        extend: 'print',
                        
                        messageTop: 'List of Computers',
                        className:'btn btn-primary mb-3',
                        
                  },
                    {
                        extend: 'csv',
                        messageTop: 'List of Computers',
                        className:'btn btn-primary mb-3',
                        
                  },
             
                 {
                    extend: 'excel',
                    messageTop: 'List of Computers',
                    className:'btn btn-primary mb-3',
                    
                }],
                "lengthMenu": [ 20, 40, 60, 80, 100 ]
            });
            });
            
            $.post("../User/Resources/php/UserPrinters.php",
            function(data, status){
            var data=$.parseJSON(data);    
            var row="";
            
            for(var i=0;i<data.length;i++){
        
                var status = data[i].InvStatus;
        
                if (status == "In Use")
                {
                    row=row +"<tr><td>"+data[i].InvUser+"</td><td>"+data[i].InvPropNo+"</td><td>"
                    +data[i].InvSerial+"</td><td>"
                    +data[i].InvModel+"</td><td>"
                    +data[i].InvBrand+"</td><td>"
                    +data[i].InvDate+"</td><td><span class ='badge rounded-pill bg-success'>"
                    +data[i].InvStatus+"</span></td><td>"+data[i].Reason+"</td></tr>";
                }
                else if(status == "Condemned")
                {
                    row=row+"<tr><td>"+data[i].InvUser+"</td><td>"+data[i].InvPropNo+"</td><td>"
                    +data[i].InvSerial+"</td><td>"
                    +data[i].InvModel+"</td><td>"
                    +data[i].InvBrand+"</td><td>"
                    +data[i].InvDate+"</td><td><span class ='badge rounded-pill bg-danger'>"
                    +data[i].InvStatus+"</span></td><td>"+data[i].Reason+"</td></tr>";
                }
                else if (status == "For Repair/Pulled out")
                {
                    row=row+"<tr><td>"+data[i].InvUser+"</td><td>"+data[i].InvPropNo+"</td><td>"
                    +data[i].InvSerial+"</td><td>"
                    +data[i].InvModel+"</td><td>"
                    +data[i].InvBrand+"</td><td>"
                    +data[i].InvDate+"</td><td><span class ='badge rounded-pill bg-warning text-dark'>"
                    +data[i].InvStatus+"</span></td><td>"+data[i].Reason+"</td></tr>";
                }
                else
                {
                    row=row+"<tr><td>"+data[i].InvUser+"</td><td>"+data[i].InvPropNo+"</td><td>"
                    +data[i].InvSerial+"</td><td>"
                    +data[i].InvModel+"</td><td>"
                    +data[i].InvBrand+"</td><td>"
                    +data[i].InvDate+"</td><td><span class ='badge rounded-pill bg-info text-dark'>"
                    +data[i].InvStatus+"</span></td><td>"+data[i].Reason+"</td></tr>";
                }
            }
            $('#prt_data').html(row);
            var table_print = $('#tbl_printers').DataTable({
                "processing": true,
                "serverSide": false,
                "stateSave": true,
                "searching":true,
                "bDestroy": true,
                "scrollY":true,
                "scrollX" :true,
                "dom": 'B<"clear">lfrtip',
                "buttons": [
                    {
                        extend: 'print',
                        
                        messageTop: 'List of Printers',
                        className:'btn btn-primary mb-3',
                        
                  },
                    {
                        extend: 'csv',
                        messageTop: 'List of Printers',
                        className:'btn btn-primary mb-3',
                       
                  },
             
                 {
                    extend: 'excel',
                    messageTop: 'List of Printers',
                    className:'btn btn-primary mb-3',
                    
                }],
                "lengthMenu": [ 20, 40, 60, 80, 100 ]
            });
            });
            
            $.post("../User/Resources/php/UserOthers.php",
            function(data, status){
            var data=$.parseJSON(data);  
            
            var row="";
            for(var i=0;i<data.length;i++){
        
                var status = data[i].InvStatus;

                if (status == "In Use")
                {
                    row=row+"<tr><td>"+data[i].InvUser+"</td><td>"+data[i].InvPropNo+"</td><td>"
                    +data[i].InvSerial+"</td><td>"
                    +data[i].InvModel+"</td><td>"
                    +data[i].InvBrand+"</td><td>"
                    +data[i].InvDate+"</td><td><span class ='badge rounded-pill bg-success'>"
                    +data[i].InvStatus+"</span></td><td>"+data[i].Reason+"</td></tr>";
                }
                else if(status == "Condemned")
                {
                    row=row+"<tr><td>"+data[i].InvUser+"</td><td>"+data[i].InvPropNo+"</td><td>"
                    +data[i].InvSerial+"</td><td>"
                    +data[i].InvModel+"</td><td>"
                    +data[i].InvBrand+"</td><td>"
                    +data[i].InvDate+"</td><td><span class ='badge rounded-pill bg-danger'>"
                    +data[i].InvStatus+"</span></td><td>"+data[i].Reason+"</td></tr>";
                }
                else if (status == "For Repair/Pulled out")
                {
                    row=row+"<tr><td>"+data[i].InvUser+"</td><td>"+data[i].InvPropNo+"</td><td>"
                    +data[i].InvSerial+"</td><td>"
                    +data[i].InvModel+"</td><td>"
                    +data[i].InvBrand+"</td><td>"
                    +data[i].InvDate+"</td><td><span class ='badge rounded-pill bg-warning text-dark'>"
                    +data[i].InvStatus+"</span></td><td>"+data[i].Reason+"</td></tr>";
                }
                else
                {
                    row=row+"<tr><td>"+data[i].InvUser+"</td><td>"+data[i].InvPropNo+"</td><td>"
                    +data[i].InvSerial+"</td><td>"
                    +data[i].InvModel+"</td><td>"
                    +data[i].InvBrand+"</td><td>"
                    +data[i].InvDate+"</td><td><span class ='badge rounded-pill bg-info text-dark'>"
                    +data[i].InvStatus+"</span></td><td>"+data[i].Reason+"</td></tr>";
                }
            }
            $('#etc_data').html(row);
            var table_others = $('#tbl_others').DataTable({
                "processing": true,
                "serverSide": false,
                "stateSave": true,
                "searching":true,
                "bDestroy": true,
                "scrollY":true,
                "scrollX":true,
                "dom": 'B<"clear">lfrtip',
                "buttons": [
                    {
                        extend: 'print',
                        
                        messageTop: 'List of Other Equipment',
                        className:'btn btn-primary mb-3',
                        
                  },
                    {
                        extend: 'csv',
                        messageTop: 'List of Other Equipment',
                        className:'btn btn-primary mb-3',
                       
                  },
             
                 {
                    extend: 'excel',
                    messageTop: 'List of Other Equipment',
                    className:'btn btn-primary mb-3',
                    
                }],
                "lengthMenu": [ 20, 40, 60, 80, 100 ]
            });
            });

    $('#NewPassword, #ConfirmNewPassword').on('keyup', function () 
    {
        $('#save_user').prop('disabled',true);

        var AddPassword=$("#NewPassword").get(0).value;
        var ConfirmAddPassword=$("#ConfirmNewPassword").get(0).value;

        if(AddPassword != "" || ConfirmAddPassword != ""){
            $('#message').show();
            if (AddPassword == ConfirmAddPassword) 
            {
                $('#message').html('Password Match').css('color', 'green');
                $('#save_user').prop('disabled',false);
            } 
            else 
            {
                $('#message').html('Password did not match').css('color', 'red');		 
            } 
        }
        else{
            $('#message').hide();
        }
    });

    $("#save_pass").on('click', function () {
        var OldPass = $("#CurrentPassword").get(0).value;
        var NewPass=$("#NewPassword").get(0).value;
        var ConPass=$("#ConfirmNewPassword").get(0).value;



        if(OldPass!="" && NewPass!="" && ConPass!="")
        {
            
            $.post("../User/Resources/php/ChangePassword.php",
            JSON.stringify({
                OldPass :OldPass,
                NewPass:NewPass,
                ConPass:ConPass
        
            }),
            function(data,status){
                if(data == 1) 
                { 
                    alert("Password Changed Successfully!");
                    location.reload(true);
                } 
                else
                {
                    alert("Old Password Is Wrong");
                    $("#CurrentPassword").val('');
                }
            });  
        }
        else
        {
            alert("FILL ALL REQUIRED FIELDS")
        }
    });

    $("#savesignature").on('click', function () {
        
        var sigdataUrl=$("#sigdataUrl").get(0).value;
        
            
            $.post("../User/Resources/php/updatesignature.php",
            JSON.stringify({
                sigdataUrl:sigdataUrl
            }),
            function(data,status){
                if(data == 1) 
                { 
                    alert("SUCCESSFULLY ADDED!");
                    location.reload(true);
                } 
                else
                {
                    alert("ERROR!");
                }
            });  
    
    });

    $("#save_firsttimepass").on('click', function () {
        var CellphoneNum = $("#CellphoneNum").get(0).value;
        var FirstNewPassword=$("#FirstNewPassword").get(0).value;
        var FirstConfirmNewPassword=$("#FirstConfirmNewPassword").get(0).value;



        if(CellphoneNum!="" && FirstNewPassword!="" && FirstConfirmNewPassword!="")
        {
            
            $.post("../User/Resources/php/ChangeFirstTime.php",
            JSON.stringify({
                CellphoneNum :CellphoneNum,
                FirstNewPassword:FirstNewPassword,
                FirstConfirmNewPassword:FirstConfirmNewPassword
        
            }),
            function(data,status){
                if(data == 1) 
                { 
                    alert("Details Changed Successfully!");
                    location.reload(true);
                } 
                else
                {
                    alert("ERROR!");
                }
            });  
        }
        else
        {
            alert("FILL ALL REQUIRED FIELDS")
        }
    });


    $("#update_contact").on('click', function () {
        
        var NewContact=$("#NewContact").get(0).value;
        
            
            $.post("../User/Resources/php/ChangeContact.php",
            JSON.stringify({
                NewContact:NewContact
            }),
            function(data,status){
                if(data == 1) 
                { 
                    alert("SUCCESSFULLY UPDATED CONTACT NUMBER!");
                    location.reload(true);
                } 
                else
                {
                    alert("ERROR!");
                }
            });  
    
    });

});//end document