$(document).ready(function() {

    $('#SPJO_User').hide();
    $('#SPJO_IDno').hide();
    $('#SPJO_Desti').hide();
    $('#JO_SerialTxT').hide();
    $('#SPJO_Desc').hide();
    $('#SPJO_Quantity').hide();

    $('#JO_prt').hide();

    $('.reby').hide();

    const d = new Date();
    var date = ((d.getMonth() > 8) ? (d.getMonth() + 1) : ('0' + (d.getMonth() + 1))) + '/' + ((d.getDate() > 9) ? d.getDate() : ('0' + d.getDate())) + '/' + d.getFullYear();
    $('#SPJO_Date').html(date);

    
    $.post("../User/Resources/PHP/GetJOStat.php",
    function(data, status){
        var data=$.parseJSON(data);    
        var row="";

        for(var i=0;i<data.length;i++){

            var stats = data[i].JOStatus;

            if (stats == "APPROVED")
            {
                row=row+"<tr><td>"+data[i].JONumber+"</td><td>"+data[i].JO_Accepted+"</td><td><span class='badge rounded-pill bg-success'>DONE</td><td class = 'act'><button id="+data[i].JONumber+" class='View btn btn-outline-primary btn-sm'><i class='bi bi-eye-fill'></i>&nbsp;View JO</button> <button id="+data[i].JONumber+" class='ViewSR btn btn-outline-dark btn-sm' data-bs-toggle='modal' data-bs-target='#servicereportform'><i class='bi bi-eye-fill'></i>&nbsp;Print Service Report</button></td></tr>";
            }
            else if(stats == "HOMIS:FOR APPROVAL")
            {
                row=row+"<tr><td>"+data[i].JONumber+"</td><td>"+data[i].JO_Accepted+"</td><td><span class='badge rounded-pill bg-warning text-dark'>ONGOING</td><td class = 'act'><button id="+data[i].JONumber+" class='View btn btn-outline-primary btn-sm'><i class='bi bi-eye-fill'></i>&nbsp;View JO</button></td></tr>";
            }   
            else if (stats == "MCC:FOR APPROVAL")
            {
                row=row+"<tr><td>"+data[i].JONumber+"</td><td>"+data[i].JO_Accepted+"</td><td><span class='badge rounded-pill bg-info text-dark'>FOR MCC APPROVAL</td><td class = 'act'><button id="+data[i].JONumber+" class='View btn btn-outline-primary btn-sm'><i class='bi bi-eye-fill'></i>&nbsp;View JO</button></td></tr>";
            }  
            else if(stats == "ACCEPTED")
            {
                row=row+"<tr><td>"+data[i].JONumber+"</td><td>"+data[i].JO_Accepted+"</td><td><span class='badge rounded-pill bg-info text-dark'>REQUEST ACCEPTED</td><td class = 'act'><button id="+data[i].JONumber+" class='View btn btn-outline-primary btn-sm'><i class='bi bi-eye-fill'></i>&nbsp;View JO</button></td></tr>";
            }
            else if(stats == "CANCELLED")
            {
                row=row+"<tr><td>"+data[i].JONumber+"</td><td>"+data[i].JO_Accepted+"</td><td><span class='badge rounded-pill bg-danger text-dark'>REQUEST CANCELLED</td><td class = 'act'></td></tr>";
            }
            else
            {
                row=row+"<tr><td>"+data[i].JONumber+"</td><td>"+data[i].JO_Accepted+"</td><td><span class='badge rounded-pill bg-primary'> REQUEST SUBMITTED</td><td class = 'act'><button id="+data[i].JONumber+" class='View btn btn-outline-primary btn-sm'><i class='bi bi-eye-fill'></i>&nbsp;View JO</button>&nbsp;&nbsp;<button id="+data[i].JONumber+" class='cancelJO btn btn-outline-danger btn-sm' data-bs-toggle='modal' data-bs-target='#cancelJO'><i class='bi bi-x-circle-fill'></i>&nbsp;Cancel JO</button></td></tr>";
            }         
        }   
        $('#JO_data').html(row);
        $(".act").find(".cancelJO").click(function () {
            var propID = this.id;
            $('#JO_Number').val(propID);
        });
        $(".act").find(".View").click(function () {
            var propID = this.id;
            var prop=JSON.stringify(
                {"data":
                  {
                   "propID":propID,
                  }
                }
              );
              $.post("../User/Resources/PHP/JODets.php",prop,
                  function(data, status){
                  var data=$.parseJSON(data);    
                  var row="";
                  for(var i=0;i<data.length;i++){

                    var JO_TicketNum = data[i].JO_TicketNum;
                    var JO_DeptDesti = data[i].JO_DeptDesti;
                    var JO_DescOfWork = data[i].JO_DescOfWork;
                    var JO_Serial = data[i].JO_Serial;
                    var JO_DesigUser = data[i].JO_DesigUser;
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

                    $('#SPJO_IDno').html(JO_TicketNum);
                    $('#SPJO_Desti').html(JO_DeptDesti);
                    $('#SPJO_Desc').html(JO_DescOfWork);
                    $('#reqby').html(JO_DesigUser);

                    $('#JO_Serial').hide();
                    $('#JO_IDno').hide();
                    $('#JO_Desti').hide();
                    $('#JO_Desc').hide();
                    $('#JO_Quantity').hide();
                    $('.reby').show();

                    $('#SPJO_IDno').show();
                    $('#SPJO_Desti').show();
                    $('#JO_SerialTxT').show();
                    $('#SPJO_Desc').show();
                    $('#SPJO_Quantity').show();
                    $('#JO_User').hide();
                    $("#JO_Save").hide();
                    $('#JO_prt').show();
                    $('#JO_Reset').show();
                    $('#JO_Type').hide();
                  }});
        });
        $(".act").find(".ViewSR").click(function () {
            var propID = this.id;
            var prop=JSON.stringify(
                {"data":
                  {
                   "propID":propID,
                  }
                }
              );

              $.post("../User/Resources/php/viewsignature.php",prop,
              function(data, status){
                var data=$.parseJSON(data); 
                    console.log(data[0].usersigna);

                  var src = data[0].usersigna;
                  $("#sig-image").css("background-image", "url(" + src + ")");
                  
              });
              $.post("../User/Resources/php/viewsignature2.php",prop,
              function(data, status){
                var data=$.parseJSON(data); 
                    console.log(data[0].usersignat);

                  var src = data[0].usersignat;
                  $("#sig-image2").css("background-image", "url(" + src + ")");
                  $('#txtveri').html(data[0].nameSA);
                  
                  
              });

              $.post("../User/Resources/PHP/SRDets.php",prop,
                  function(data, status){
                  var data=$.parseJSON(data);    
                  var row="";
                  for(var i=0;i<data.length;i++){

                    var JO_Date=data[i].JO_Date;
                    var JO_TicketNum=data[i].JO_TicketNum;
                    var JO_Department=data[i].JO_Department;
                    var serial_NO=data[i].serial_NO;
                    var JO_DescOfWork=data[i].JO_DescOfWork;
                    var JO_ActionTaken=data[i].JO_ActionTaken;
                    var JO_Assessment=data[i].JO_Assessment;
                    var JO_Recommendation=data[i].JO_Recommendation;
                    var JO_PropertyNO=data[i].JO_PropertyNO;
                    var JO_Model=data[i].JO_Model;
                    var JO_PerfBy=data[i].JO_PerfBy;
                    var DesigUser=data[i].JO_DesigUser;

                    $('#SR_propNum').html(JO_PropertyNO);
                    $('#SR_date').html(JO_Date);
                    $('#SR_description').html(JO_DescOfWork);
                    $('#SR_jobordernum').html(JO_TicketNum);
                    $('#SR_model').html(JO_Model);
                    $('#SR_dept').html(JO_Department);
                    $('#SR_office').html(JO_Department);
                    $('#SR_actshow').html(JO_ActionTaken);
                    $('#SR_asses').html(JO_Assessment);
                    $('#SR_Reco').html(JO_Recommendation);
                    $('#txtperfby').html(JO_PerfBy);
                    $('#SR_serial').html(serial_NO);
                    $('#enduser').html(DesigUser);

                  }});
        });
        var table_JO = $('#tbl_JO').DataTable({
            "processing": true,
            "serverSide": false,
            "stateSave": true,
            "searching":true,
            "bDestroy": true,
            "scrollY":true,
            "scrollX":true,
            "dom": 'B<"clear">lfrtip',
            "lengthMenu": [ 20, 40, 60, 80, 100 ]
        });
    });


    $.post("../User/Resources/PHP/GetDesig.php",
    function(data, status){
        var data=$.parseJSON(data);    
        var row="";

        for(var i=0;i<data.length;i++){

            var id = data[i].users;
            var name = data[i].users;

            $("#JO_User").append("<option value='"+id+"'>"+name+"</option>");
        }   
        var map = {};
        $('#JO_User option').each(function () {
            if (map[this.value]) {
                $(this).remove()
            }
            map[this.value] = true;
        }); 
    });

 

    $('#JO_Reset').hide();
    $('#printJO').hide();
    
    $("#JO_Save").on('click', function () {
        var JO_Desc=$("#JO_Desc").get(0).value;
        var JO_Desti = $("#JO_Desti").get(0).value;
        var JO_Type = $("#JO_Type").get(0).value;
        var JO_User = $("#JO_User").get(0).value;
        var prop=JSON.stringify(
            {"data":
                {
                "JO_Desc": JO_Desc,
                "JO_Desti":JO_Desti,
                "JO_Type":JO_Type,
                "JO_User":JO_User
                  }
                }
              ); 

        if(JO_Type != "--SELECT--" && JO_Desc != "" && JO_User!="--SELECT--")
        {
            alert("Please Wait");
            $('#JO_Save').prop('disabled', true);

            $.post("../User/Resources/PHP/AddJO2.php",prop,
            function(data,status){
                if(data == 0) 
                { 
                    alert("ERROR");
                    
                } 
                else
                {
                    var data=$.parseJSON(data);    
                    var row="";
                    for(var i=0;i<data.length;i++){
                
                        var JO_TicketNum = data[i].JO_TicketNum;
                        var JO_DeptDesti = data[i].JO_DeptDesti;
                        var JO_DescOfWork = data[i].JO_DescOfWork;
                        var JO_DesigUser = data[i].JO_DesigUser;

                        $('#JO_IDno').val(JO_TicketNum);
                        $('#JO_Desti').val(JO_DeptDesti);
                        $('#JO_Desc').val(JO_DescOfWork);
                        $('#JO_Quantity').val("NA");
                        $('#reqby').html(JO_DesigUser);


                        $('#JO_IDno').prop('disabled', true);
                        $('#JO_Desti').prop('disabled', true);
                        $('#JO_Desc').prop('disabled', true);
                        $('#JO_Date').prop('disabled', true);
                        $('#JO_Serial').prop('disabled', true);
                        $('#JO_Quantity').prop('disabled', true);
                        $('#JO_Reset').show();
                        $("#JO_Save").hide();
                        $('#JO_User').hide();
                        $('#JO_Type').hide();
                        
                    }
                }
            });  
        }
        else 
        {
            alert ("Fill all required fields")
        }
    });

    $("#JO_Reset").on('click', function () {
        location.reload(true);
    });
    $('#JO_Number').prop('disabled', true);
    $("#save_cancel").on('click', function () {
        var JO_Number = $("#JO_Number").get(0).value;
        var JO_CancelReason=$("#JO_CancelReason").get(0).value;
        
        var prop=JSON.stringify(
            {"data":
                {
                    JO_Number:JO_Number,
                    JO_CancelReason:JO_CancelReason
                }
        });
        if(JO_Number != "" && JO_CancelReason != "")
        {
            alert("Please Wait");
            $.post("../User/Resources/PHP/CancelJO.php",prop,
            function(data,status){
                if(data == 1) 
                { 
                    alert("Job Order Cancelled");
                    location.reload(true);
                } 
                else
                {
                    alert("ERROR!");
                }
            })
        }
        else
        {
            alert("All fields are required!")
        }

    });
});