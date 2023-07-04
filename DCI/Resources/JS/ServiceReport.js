$(document).ready(function() {

    $.post("../DCI/Resources/PHP/SupAdminJOReqs.php",
    function(data, status){
    var data=$.parseJSON(data);    
    var row="";
    for(var i=0;i<data.length;i++){

        var numoth = data[i].OthersNumbers;
        $("#blinker").html(numoth);
        if(numoth > 0)
        {
            $("#blinker").show();
        }
        else
        {
            $("#blinker").hide();
        }    
    }
    });

    $('#FirstLogin').modal({
        backdrop: 'static',
        keyboard: false
    })

        $.post("../DCI/Resources/php/CredChecker.php",
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

    $.post("../DCI/Resources/PHP/SupAdminServiceReport.php",
            function(data, status){
            var data=$.parseJSON(data);    
            var row="";
           
            for(var i=0;i<data.length;i++){

                var status = data[i].JO_Status;

                if (status == "REQUESTED"){ 
                    row=row+"<tr><td>"+data[i].JO_TicketNum+"</td><td>"+data[i].JO_Department+"</td><td><span class ='badge rounded-pill bg-secondary'>"
                    +data[i].JO_Status+"</span></td><td class='jo_act'><button id="+data[i].JO_TicketNum+" class='view btn btn-outline-dark'  data-bs-toggle='modal' data-bs-target='#JOModal'><i class='bi bi-file-earmark-plus'></i>&nbsp;View Job Order</button></td></tr>";

                }
                else if(status == "MCC:FOR APPROVAL"){
                    row=row+"<tr><td>"+data[i].JO_TicketNum+"</td><td>"+data[i].JO_Department+"</td><td><span class ='badge rounded-pill bg-info'>"
                    +data[i].JO_Status+"</span></td><td class='jo_act'><button id="+data[i].JO_TicketNum+" class='view btn btn-outline-primary' data-bs-toggle='modal' data-bs-target='#JOModal'><i class='bi bi-eye'></i>&nbsp;View Job Order</button></td></tr>";
                }
                else if(status == "HOMIS:FOR APPROVAL"){
                    row=row+"<tr><td>"+data[i].JO_TicketNum+"</td><td>"+data[i].JO_Department+"</td><td><span class ='badge rounded-pill bg-warning'>"
                    +data[i].JO_Status+"</span></td><td class='jo_act'><button id="+data[i].JO_TicketNum+" class='create btn btn-outline-primary' data-bs-toggle='modal' data-bs-target='#servicereportform'><i class='bi bi-eye'></i>&nbsp;View Service Report</button></td></tr>";
                }
                else if(status == "MCC:APPROVED")
                {
                    row=row+"<tr><td>"+data[i].JO_TicketNum+"</td><td>"+data[i].JO_Department+"</td><td><span class ='badge rounded-pill bg-primary'>"
                    +data[i].JO_Status+"</span></td><td class='jo_act'><button id="+data[i].JO_TicketNum+" class='view  btn btn-outline-dark' data-bs-toggle='modal' data-bs-target='#JOModal'><i class='bi bi-file-earmark-plus'></i>&nbsp;View Job Order</button></td></tr>";
                }
                else if(status == "ACCEPTED")
                {
                    row=row+"<tr><td>"+data[i].JO_TicketNum+"</td><td>"+data[i].JO_Department+"</td><td><span class ='badge rounded-pill bg-primary'>"
                    +data[i].JO_Status+"</span></td><td class='jo_act'><button id="+data[i].JO_TicketNum+" class='create  btn btn-outline-dark' data-bs-toggle='modal' data-bs-target='#servicereportform'><i class='bi bi-file-earmark-plus'></i>&nbsp;Create Service Report</button></td></tr>";
                }
                else if(status == "CANCELLED")
                {
                    row=row+"<tr><td>"+data[i].JO_TicketNum+"</td><td>"+data[i].JO_Department+"</td><td><span class ='badge rounded-pill bg-danger'>"
                    +data[i].JO_Status+"</span></td><td class='jo_act'>"+data[i].JO_CancelReason+"</td></tr>";
                }
                else{
                    row=row+"<tr><td>"+data[i].JO_TicketNum+"</td><td>"+data[i].JO_Department+"</td><td><span class='badge rounded-pill bg-success'>"
                    +data[i].JO_Status+"</span></td><td class='jo_act'><button id="+data[i].JO_TicketNum+" class='create btn btn-outline-primary' data-bs-toggle='modal' data-bs-target='#servicereportform'><i class='bi bi-eye'></i>&nbsp;View Service Report</button></td></tr>";
                }
            }
            
            $('#JO_data').html(row);

          
            $(".jo_act").find(".viewSR").click(function () {

            });
            $(".jo_act").find(".view").click(function () {
                var propID = this.id;
                var prop=JSON.stringify(
                    {"data":
                      {
                       "propID":propID,
                      }
                    }
                  );
                  $.post("../DCI/Resources/PHP/JODets.php",prop,
                      function(data, status){
                      var data=$.parseJSON(data);    
                      var row="";
                      for(var i=0;i<data.length;i++){
                        
                        // var JO_TicketNum1 = data[i].JO_TicketNum;
                        var JO_TicketNum = data[i].JO_TicketNum;
                        var JO_DeptDesti = data[i].JO_DeptDesti;
                        var JO_DescOfWork = data[i].JO_DescOfWork;
                        var JO_Serial = data[i].JO_Serial;
                        var JO_DesigUser = data[i].JO_DesigUser;
                        var JO_Date = data[i].JO_Date;
                        var JO_Type = data[i].JO_Type;

                        if (JO_Type == "Software" || JO_Type == "Network" || JO_Type == "Others")
                        {
                            $('#SPJO_Quantity').html("NA");
                            $('#JO_SerialTxT').html("NA");
                        }
                        else
                        {
                            $('#SPJO_Quantity').html("1");
                            $('#JO_SerialTxT').html(JO_Serial);
                        }
                        
                        $('#SPJO_ID').val(JO_TicketNum);
                        $('#SPJO_IDno').html(JO_TicketNum);
                        $('#SPJO_Date').html(JO_Date);
                        $('#SPJO_Desti').html(JO_DeptDesti);
         
                        $('#SPJO_Desc').html(JO_DescOfWork);
                
                        $('#reqby').html(JO_DesigUser);

                        // $("#lbl").hide();
                        // $("#regurgent").hide();
                        // var status = data[0].JO_Status;
                        //         $("#lbl").hide();
                        //         $("#regurgent").hide();
                        //         // $("#save_classify").hide();
                        //         // $("#accept").hide();
                                
                                

                        //     if (status == "REQUESTED"){

                        //         $("#lbl").show();
                        //         $("#regurgent").show();
                        //         $("#save_classify").show();
                        //         $("#approvedby").hide();
                               
                        //     }
                        //     else if(status == "MCC:APPROVED"){
                        //         $("#accept").show();
                                

                        //     }
                        //     else if(status == "MCC:FOR APPROVAL"){
                        //         $("#approvedby").hide();
                                

                        //     }
                        //     else{

                        //         $("#lbl").hide();
                        //         $("#regurgent").hide();
                        //         $("#save_classify").hide();
                                
                                
                        //     }
                      }});
                    //   $.post("../DCI/Resources/PHP/GETMCC.php",prop,
                    //         function(data, status){
                    //             var data=$.parseJSON(data); 
                    //                 // console.log(data[0].user_fullname);
                                    
                    //                 $('#approvedby').html(data[0].user_fullname);

                                
                               
                                
                    //         });


    

            });

            $(".jo_act").find(".create").click(function () {
                var propID = this.id;
                var prop=JSON.stringify(
                    {"data":
                      {
                       "propID":propID
                      }
                    }
                  );  
                  $.post("../DCI/Resources/PHP/viewsignature.php",prop,
                  function(data, status){
                    var data=$.parseJSON(data); 
                        console.log(data[0].usersigna);

                      var src = data[0].usersigna;
                      $("#3sig-image").css("background-image", "url(" + src + ")");
                      
                  });
                  $.post("../DCI/Resources/PHP/viewsignature2.php",prop,
                  function(data, status){
                    var data=$.parseJSON(data); 
                        console.log(data[0].usersignat);

                      var src = data[0].usersignat;
                      $("#3sig-image2").css("background-image", "url(" + src + ")");
                      $('#txtverifby2').html(data[0].nameSA);
                      
                      
                  });


                $.post("../DCI/Resources/PHP/SupAdminViewService.php",prop,
                function(data, status){
                    var data=$.parseJSON(data); 

                    $('#propNum').html(data[0].JO_PropertyNO);
                    $('#date').html(data[0].JO_Date);
                    $('#decription').html(data[0].JO_DescOfWork);
                    $('#jobordernum1').html(data[0].JO_TicketNum);
                    $('#jobordernum').val(data[0].JO_TicketNum);
                    $('#model').html(data[0].JO_Model);
                    $('#dept').html(data[0].JO_Department);
                    $("#serial").html(data[0].JO_Serial);
                    $("#office").html(data[0].JO_Department);

                    $("#txtperfby").html(data[0].JO_PerfBy);
                    $("#enduser").html(data[0].JO_DesigUser);
                   
                    var status = data[0].JO_Status;

                    if (status == "ACCEPTED"){

                        $("#spanjob").hide();
                        $("#inputjob").show();

                        $("#span1").hide();
                        $("#span2").hide();
                        $("#span3").hide();
                        
                        $("#print").hide();
                        $("#update_service").show();

                        $("#inputact").show();
                        $("#inputass").show();

                        $("#inputreco").show();
                        $("#txtperfby").show();

                        $("#verifby").hide();
                        $("#3sig-image").hide();
                        $("#3sig-image2").hide();


                    }
                    else if (status == "APPROVED"){

                        $("#spanjob").show();
                        $("#inputjob").hide();

                        $("#span1").show();
                        $("#span2").show();
                        $("#span3").show();

                        $("#actshow").html(data[0].JO_ActionTaken);
                        $("#asses").html(data[0].JO_Assessment);
                        $("#reco").html(data[0].JO_Recommendation);

                        $("#print").show();
                        $("#update_service").hide();

                        $("#inputact").hide();
                        $("#inputass").hide();
                        $("#inputreco").hide();

                        $("#txtperfby").show();
                    
                        $("#3sig-image").show();
                        $("#3sig-image2").show();
                        
                       

                    }
                    else{
                        $("#spanjob").show();
                        $("#inputjob").hide();

                        $("#span1").show();
                        $("#span2").show();
                        $("#span3").show();

                        $("#actshow").html(data[0].JO_ActionTaken);
                        $("#asses").html(data[0].JO_Assessment);
                        $("#reco").html(data[0].JO_Recommendation);
                        $("#update_service").hide();

                        $("#inputact").hide();
                        $("#inputass").hide();
                        $("#inputreco").hide();
                        $("#txtperfby").show();
                      

                      $("#3sig-image").show();
                      $("#3sig-image2").hide();
                      $("#verifby").hide();

                       

                        
                    }
                }); 
           

            });

            var table_comp = $('#tbl_JO').DataTable({
                "processing": true,
                "serverSide": false,
                "stateSave": true,
                "searching":true,
                "bDestroy": true,
                "scrollY":true,
                "scrollX":true,
                "lengthMenu": [ 25, 50, 75, 100 ]
            });
               

        });





        $("#update_service").on('click', function () {
            var action=$("#actiontaken").get(0).value;
            var assesment=$("#assesment").get(0).value;
            var recommendation=$("#recommendation").get(0).value;
            var joticketnum=$("#jobordernum").get(0).value;
            
      
            var sigdataUrl=$("#sigdataUrl").get(0).value;
            
                
                $.post("../DCI/Resources/PHP/SupAdminupdateService.php",
                JSON.stringify({
                    action : action,
                    assesment: assesment,
                    recommendation: recommendation,
                    joticketnum: joticketnum,
                    sigdataUrl:sigdataUrl
                }),
                function(data,status){
                    if(data == 1) 
                    { 
                        alert("SUCCESSFULLY ADDED!");
                        location.reload(true);
                    } 
                    else if(data == 2)
                    {
                        alert("You are not allowed to edit this Report");
                        
                    }
                    else
                    {
                        alert("ERROR!");
                    }
                });  
        
        });
        $("#save_pass").on('click', function () {
            var OldPass = $("#CurrentPassword").get(0).value;
            var NewPass=$("#NewPassword").get(0).value;
            var ConPass=$("#ConfirmNewPassword").get(0).value;
    
    
    
            if(OldPass!="" && NewPass!="" && ConPass!="")
            {
                
                $.post("../DCI/Resources/php/ChangePassword.php",
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
            
                
                $.post("../DCI/Resources/php/updatesignature.php",
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
                
                $.post("../DCI/Resources/php/ChangeFirstTime.php",
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
            
                
                $.post("../DCI/Resources/php/ChangeContact.php",
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
        $("#accept").on('click', function () {
        
            var spjooo=$("#SPJO_ID").get(0).value;
            
                
                $.post("../DCI/Resources/PHP/SupAdminAcceptTicket.php",
                JSON.stringify({
                    spjooo:spjooo
                }),
                function(data,status){
                    if(data == 1) 
                    { 
                        alert("ACCEPTED!");
                        location.reload(true);
                    } 
                    else
                    {
                        alert("ERROR!");
                    }
                });        
        
        });


    
        
        



});//end document