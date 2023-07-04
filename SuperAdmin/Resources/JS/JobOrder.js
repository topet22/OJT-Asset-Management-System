function refreshNumbers() {
    $.post("../SuperAdmin/Resources/PHP/SupAdminJOReqs.php",
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
        $("#homisFA").html(numoth);
        if(numoth>=1){
            $("#homisFA").addClass("blinker");
        }
        else{
            $("#homisFA").removeClass("blinker");
        }

        
    }
    });

    $.post("../SuperAdmin/Resources/PHP/TotalNum.php",
    function(data, status){
    var data=$.parseJSON(data);    
    var row="";

    var cls = data[3].Stat;
        if(cls>=1)
        {
            $('#homisFA').addClass("blinker");
        }
        else{
            $("#homisFA").removeClass("blinker");
        }

        $('#mccFA').html(data[1].Stat);
        $('#mccA').html(data[2].Stat);
        $('#homisFA').html(cls);
        $('#Approved').html(data[0].Stat);

        $('#Cancelled').html(data[4].Stat);
        $('#accepted').html(data[5].Stat);
        $('#rqstd').html(data[6].Stat);

        var rqs = data[6].Stat;
        if(cls>=1)
        {
            $('#rqstd').addClass("blinker");
        }
        else{
            $("#rqstd").removeClass("blinker");
        }

    });
    
  }

$(document).ready(function() {

    $('#txtjobordernum').hide();
    $('#Boss').hide();
    $('#adm').hide();

    $.post("../SuperAdmin/Resources/PHP/SupAdminJOReqs.php",
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
        $("#homisFA").html(numoth);
        if(numoth>=1){
            $("#homisFA").addClass("blinker");
        }
        else{
            $("#homisFA").removeClass("blinker");
        }

        
    }
    });

    $.post("../SuperAdmin/Resources/PHP/TotalNum.php",
    function(data, status){
    var data=$.parseJSON(data);    
    var row="";

    var cls = data[3].Stat;
        if(cls>=1)
        {
            $('#homisFA').addClass("blinker");
        }
        else{
            $("#homisFA").removeClass("blinker");
        }

        $('#mccFA').html(data[1].Stat);
        $('#mccA').html(data[2].Stat);
        $('#homisFA').html(cls);
        $('#Approved').html(data[0].Stat);

        $('#Cancelled').html(data[4].Stat);
        $('#accepted').html(data[5].Stat);
        $('#rqstd').html(data[6].Stat);

        var rqs = data[6].Stat;
        if(cls>=1)
        {
            $('#rqstd').addClass("blinker");
        }
        else{
            $("#rqstd").removeClass("blinker");
        }

    });

      setInterval('refreshNumbers()', 2000);  
       
    $.post("../SuperAdmin/Resources/PHP/GetJOStat.php",
    function(data, status){

        var data=$.parseJSON(data);    
        var row="";

        for(var i=0;i<data.length;i++){

            var statsJO = data[i].JOStatus;
            console.log(statsJO);

            if (statsJO == "HOMIS:FOR APPROVAL")
            {
                row=row+"<tr><td>"+data[i].JONumber+"</td><td>"+data[i].JO_PerfBy+"</td><td>"+data[i].JO_Department+"</td><td>"+data[i].JO_Recom+"</td><td><span class='blinker badge rounded-pill bg-warning'>FOR APPROVAL</span></td><td class = 'act'><button id="+data[i].JONumber+" class='ViewSR btn btn-outline-primary btn-sm' data-bs-toggle='modal' data-bs-target='#servicereportform'><i class='bi bi-eye-fill'></i>&nbsp;View Service Report</button></td></tr>";

            }
            else if(statsJO == "MCC:FOR APPROVAL")
            {
                row=row+"<tr><td>"+data[i].JONumber+"</td><td>"+data[i].JO_PerfBy+"</td><td>"+data[i].JO_Department+"</td><td>"+data[i].JO_Recom+"</td><td><span class='badge rounded-pill bg-secondary'>"
                +data[i].JOStatus+"</span></td><td class = 'act'><button id="+data[i].JONumber+" class='View btn btn-outline-success btn-sm' data-bs-toggle='modal' data-bs-target='#JOModal'><i class='bi bi-eye-fill'></i>&nbsp;View Job Order</button></td></tr>";
            }
            else if(statsJO == "APPROVED")
            {
                row=row+"<tr><td>"+data[i].JONumber+"</td><td>"+data[i].JO_PerfBy+"</td><td>"+data[i].JO_Department+"</td><td>"+data[i].JO_Recom+"</td><td><span class='badge rounded-pill bg-success'>"
                +data[i].JOStatus+"</span></td><td class = 'act'><button id="+data[i].JONumber+" class='ViewSR btn btn-outline-primary btn-sm' data-bs-toggle='modal' data-bs-target='#servicereportform'><i class='bi bi-eye-fill'></i>&nbsp;Print Service Report</button>&nbsp;&nbsp;&nbsp;<button id="+data[i].JONumber+" class='View btn btn-outline-info link-dark btn-sm' data-bs-toggle='modal' data-bs-target='#JOModal'><i class='bi bi-eye-fill'></i>&nbsp;Print Job Order</button></td></tr>";
            }
            else if(statsJO == "CANCELLED")
            {
                row=row+"<tr><td>"+data[i].JONumber+"</td><td>"+data[i].JO_PerfBy+"</td><td>"+data[i].JO_Department+"</td><td>"+data[i].JO_Recom+"</td><td><span class='badge rounded-pill bg-danger'>"
                +data[i].JOStatus+"</span></td><td class = 'act'></td></tr>";
            }
            else if(statsJO == "ACCEPTED")
            {
                row=row+"<tr><td>"+data[i].JONumber+"</td><td>"+data[i].JO_AcceptedBy+"</td><td>"+data[i].JO_Department+"</td><td>"+data[i].JO_Recom+"</td><td><span class='badge rounded-pill bg-primary'>ONGOING</span></td><td class = 'act'><button id="+data[i].JONumber+" class='View btn btn-outline-success btn-sm' data-bs-toggle='modal' data-bs-target='#JOModal'><i class='bi bi-eye-fill'></i>&nbsp;View Job Order</button></td></tr>";
            }  
            else
            {
                row=row+"<tr><td>"+data[i].JONumber+"</td><td>N/A</td><td>"+data[i].JO_Department+"</td><td>"+data[i].JO_Recom+"</td><td><span class='badge rounded-pill bg-secondary'>"
                +data[i].JOStatus+"</span></td><td class = 'act'><button id="+data[i].JONumber+" class='View btn btn-outline-success btn-sm' data-bs-toggle='modal' data-bs-target='#JOModal'><i class='bi bi-eye-fill'></i>&nbsp;View Job Order</button></td></tr>";
            }            
        }   
        $('#JO_data').html(row);
        $(".act").find(".View").click(function () {
            var propID = this.id;
            var prop=JSON.stringify(
                {"data":
                  {
                   "propID":propID,
                  }
                }
              );
              $.post("../SuperAdmin/Resources/PHP/JODets.php",prop,
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
                    var JO_DATE1 = data[i].JO_DATE1;

                    var status1 = data[i].JO_Status;
                        if (status1 == "REQUESTED"){
                            $("#approvedby2").hide();
                            
                        }
                        else if(status1 == "MCC:FOR APPROVAL"){
                            $("#approvedby2").hide();

                        }
                        else{
                            $("#approvedby2").show();
                        }
                    

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
                    $('#SPJO_Date').html(JO_DATE1);

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
                    $('#JO_Type').hide();
                    $("#JO_Save").hide();
                    $('#JO_prt').show();
                    $('#JO_Reset').show();
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
              $.post("../SuperAdmin/Resources/PHP/viewsignature.php",prop,
              function(data, status){
                var data=$.parseJSON(data); 
                    console.log(data[0].usersigna);

                  var src = data[0].usersigna;
                  $("#sig-image").css("background-image", "url(" + src + ")");
                  
                  
              });
              $.post("../SuperAdmin/Resources/PHP/viewsignature2.php",
              function(data, status){
                var data=$.parseJSON(data); 
                    console.log(data[0].usersignat);

                  var src = data[0].usersignat;
                  $("#sig-image2").css("background-image", "url(" + src + ")");
                  $('#verifby').html(data[0].nameSA);
                  
              });
              $.post("../SuperAdmin/Resources/PHP/SupAdminViewService.php",prop,
              function(data, status){
                  var data=$.parseJSON(data); 

                 

                  $('#propNum').html(data[0].JO_PropertyNO);
                  $('#date').html(data[0].JO_DATESRDone1);
                  $('#decription').html(data[0].JO_DescOfWork);
                  $('#jobordernum').html(data[0].JO_TicketNum);
                  $('#txtjobordernum').val(data[0].JO_TicketNum);
                  $('#model').html(data[0].JO_Model);
                  $('#perfby').html(data[0].JO_PerfBy);
                  $('#dept').html(data[0].JO_Department);
                  $("#serial").html(data[0].JO_Serial);
                  $("#office").html(data[0].JO_Department);
                  

                  var status = data[0].JO_Status;
                  if (status == "REQUESTED"){

                      $("#span1").hide();
                      $("#span2").hide();
                      $("#span3").hide();
                      
                      $("#print").hide();
                      $("#update_service ").hide();

                      $("#inputact").show();
                      $("#inputass").show();
                      $("#inputreco").show();
                      $("#verifby").hide();
                      $('#Boss').hide();
                      $('#adm').hide();


                  }
                  else if (status == "APPROVED"){
                      $("#span1").show();
                      $("#span2").show();
                      $("#span3").show();

                      $("#actshow").html(data[0].JO_ActionTaken);
                      $("#asses").html(data[0].JO_Assessment);
                      $("#reco").html(data[0].JO_Recommendation);
                      $("#update_service").hide();
                      $("#print").show();

                      $("#inputact").hide();
                      $("#inputass").hide();
                      $("#inputreco").hide();
                      $("#verifby").show();
                      $('#Boss').show();
                      $('#adm').show();

                  }
                  else if (status == "MCC:FOR APPROVAL"){
                    $("#span1").hide();
                    $("#span2").hide();
                    $("#span3").hide();
                    
                    $("#print").hide();
                    $("#update_service ").hide();

                    $("#inputact").show();
                    $("#inputass").show();
                    $("#inputreco").show();
                    $("#verifby").hide();
                    $('#Boss').hide();
                    $('#adm').hide();

                  


                }
                else if (status == "HOMIS:FOR APPROVAL"){
                    $("#span1").show();
                    $("#span2").show();
                    $("#span3").show();

                    $("#actshow").html(data[0].JO_ActionTaken);
                    $("#asses").html(data[0].JO_Assessment);
                    $("#reco").html(data[0].JO_Recommendation);
                    $("#update_service").show();
                    $("#print").hide();

                    $("#inputact").hide();
                    $("#inputass").hide();
                    $("#inputreco").hide();
                    $("#verifby").show();
                    $('#Boss').show();
                    $('#adm').show();

                }
                else if (status == "ACCEPTED"){
                    $("#span1").hide();
                    $("#span2").hide();
                    $("#span3").hide();
                    
                    $("#print").hide();
                    $("#update_service ").hide();

                    $("#inputact").show();
                    $("#inputass").show();
                    $("#inputreco").show();
                    $("#verifby").hide();
                    $('#Boss').hide();
                    $('#adm').hide();

                }
                  else{
                      $("#span1").show();
                      $("#span2").show();
                      $("#span3").show();

                      $("#actshow").html(data[0].JO_ActionTaken);
                      $("#asses").html(data[0].JO_Assessment);
                      $("#reco").html(data[0].JO_Recommendation);
                      $("#update_service").show();

                      $("#inputact").hide();
                      $("#inputass").hide();
                      $("#inputreco").hide();
                      $("#verifby").hide();
                      $('#Boss').hide();
                      $('#adm').show();
                  }

              }); 
              
        });
        var table_comp = $('#tbl_JO').DataTable({
            "processing": true,
            "serverSide": false,
            "stateSave": true,
            "searching":false,
            "bDestroy": true,
            "scrollY":true,
            "scrollX":true,
            "lengthMenu": [ 10, 20, 30, 40, 50 ]
        });
    });

    $("#update_service").on('click', function () {

        var JO_Num = $('#txtjobordernum').get(0).value;
        var prop=JSON.stringify(
            {"data":
              {
               "JO_Num":JO_Num
              }
            }
          );
          $.post("../SuperAdmin/Resources/PHP/SupAdminApproveJO.php",prop,
          function(data, status){
              if(data == 1) 
              { 
                  alert("Transaction Successful!");
                  location.reload(true);
              } 
              else { 
                  alert("ERROR!");

          }
          }); 
    });

    $('#sorter').on('change', function () {
        var sorter = $("#sorter").get(0).value;

        var prop = JSON.stringify(
            {"data":
              {
               "sorter":sorter
              }
            }
          );
          var table_comp1 = $('#tbl_JO').DataTable();
          table_comp1.destroy();
          $.post("../SuperAdmin/Resources/PHP/GetJOStatBrief.php",prop,
          function(data, status){
      
              var data=$.parseJSON(data);    
              var row="";
      
              for(var i=0;i<data.length;i++){
      
                  var statsJO = data[i].JOStatus;
                  console.log(statsJO);
      
                  if (statsJO == "HOMIS:FOR APPROVAL")
                  {
                      row=row+"<tr><td>"+data[i].JONumber+"</td><td>"+data[i].JO_PerfBy+"</td><td>"+data[i].JO_Department+"</td><td>"+data[i].JO_Recom+"</td><td><span class='blinker badge rounded-pill bg-warning'>FOR APPROVAL</span></td><td class = 'act'><button id="+data[i].JONumber+" class='ViewSR btn btn-outline-primary btn-sm' data-bs-toggle='modal' data-bs-target='#servicereportform'><i class='bi bi-eye-fill'></i>&nbsp;View Service Report</button></td></tr>";
      
                  }
                  else if(statsJO == "MCC:FOR APPROVAL")
                  {
                      row=row+"<tr><td>"+data[i].JONumber+"</td><td>"+data[i].JO_PerfBy+"</td><td>"+data[i].JO_Department+"</td><td>"+data[i].JO_Recom+"</td><td><span class='badge rounded-pill bg-secondary'>"
                      +data[i].JOStatus+"</span></td><td class = 'act'><button id="+data[i].JONumber+" class='View btn btn-outline-success btn-sm' data-bs-toggle='modal' data-bs-target='#JOModal'><i class='bi bi-eye-fill'></i>&nbsp;View Job Order</button></td></tr>";
                  }
                  else if(statsJO == "APPROVED")
                  {
                      row=row+"<tr><td>"+data[i].JONumber+"</td><td>"+data[i].JO_PerfBy+"</td><td>"+data[i].JO_Department+"</td><td>"+data[i].JO_Recom+"</td><td><span class='badge rounded-pill bg-success'>"
                      +data[i].JOStatus+"</span></td><td class = 'act'><button id="+data[i].JONumber+" class='ViewSR btn btn-outline-primary btn-sm' data-bs-toggle='modal' data-bs-target='#servicereportform'><i class='bi bi-eye-fill'></i>&nbsp;Print Service Report</button>&nbsp;&nbsp;&nbsp;<button id="+data[i].JONumber+" class='View btn btn-outline-info link-dark btn-sm' data-bs-toggle='modal' data-bs-target='#JOModal'><i class='bi bi-eye-fill'></i>&nbsp;Print Job Order</button></td></tr>";
                  }
                  else if(statsJO == "CANCELLED")
                  {
                      row=row+"<tr><td>"+data[i].JONumber+"</td><td>"+data[i].JO_PerfBy+"</td><td>"+data[i].JO_Department+"</td><td>"+data[i].JO_Recom+"</td><td><span class='badge rounded-pill bg-danger'>"
                      +data[i].JOStatus+"</span></td><td class = 'act'></td></tr>";
                  }
                  else if(statsJO == "ACCEPTED")
                  {
                      row=row+"<tr><td>"+data[i].JONumber+"</td><td>"+data[i].JO_AcceptedBy+"</td><td>"+data[i].JO_Department+"</td><td>"+data[i].JO_Recom+"</td><td><span class='badge rounded-pill bg-primary'>ONGOING</span></td><td class = 'act'><button id="+data[i].JONumber+" class='View btn btn-outline-success btn-sm' data-bs-toggle='modal' data-bs-target='#JOModal'><i class='bi bi-eye-fill'></i>&nbsp;View Job Order</button></td></tr>";
                  }  
                  else
                  {
                      row=row+"<tr><td>"+data[i].JONumber+"</td><td>"+data[i].JO_PerfBy+"</td><td>"+data[i].JO_Department+"</td><td>"+data[i].JO_Recom+"</td><td><span class='badge rounded-pill bg-secondary'>"
                      +data[i].JOStatus+"</span></td><td class = 'act'><button id="+data[i].JONumber+" class='View btn btn-outline-success btn-sm' data-bs-toggle='modal' data-bs-target='#JOModal'><i class='bi bi-eye-fill'></i>&nbsp;View Job Order</button></td></tr>";
                  }            
              }   
              $('#JO_data').html(row);
              $(".act").find(".View").click(function () {
                  var propID = this.id;
                  var prop=JSON.stringify(
                      {"data":
                        {
                         "propID":propID,
                        }
                      }
                    );
                    $.post("../SuperAdmin/Resources/PHP/GETMCC.php",prop,
                                  function(data, status){
                                      var data=$.parseJSON(data); 
                                          // console.log(data[0].user_fullname);
                                          
                                          $('#approvedby2').html(data[0].user_fullname);
      
                                      
                                     
                                      
                                  });
                    $.post("../SuperAdmin/Resources/PHP/JODets.php",prop,
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
                          var JO_DATE1 = data[i].JO_DATE1;
      
                          var status1 = data[i].JO_Status;
                              if (status1 == "REQUESTED"){
                                  $("#approvedby2").hide();
                                  
                              }
                              else if(status1 == "MCC:FOR APPROVAL"){
                                  $("#approvedby2").hide();
      
                              }
                              else{
                                  $("#approvedby2").show();
                              }
                          
      
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
                          $('#SPJO_Date').html(JO_DATE1);
      
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
                          $('#JO_Type').hide();
                          $("#JO_Save").hide();
                          $('#JO_prt').show();
                          $('#JO_Reset').show();
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
                    $.post("../SuperAdmin/Resources/PHP/viewsignature.php",prop,
                    function(data, status){
                      var data=$.parseJSON(data); 
                          console.log(data[0].usersigna);
      
                        var src = data[0].usersigna;
                        $("#sig-image").css("background-image", "url(" + src + ")");
                        
                        
                    });
                    $.post("../SuperAdmin/Resources/PHP/viewsignature2.php",
                    function(data, status){
                      var data=$.parseJSON(data); 
                          console.log(data[0].usersignat);
      
                        var src = data[0].usersignat;
                        $("#sig-image2").css("background-image", "url(" + src + ")");
                        $('#verifby').html(data[0].nameSA);
                        
                    });
                    $.post("../SuperAdmin/Resources/PHP/SupAdminViewService.php",prop,
                    function(data, status){
                        var data=$.parseJSON(data); 
      
                       
      
                        $('#propNum').html(data[0].JO_PropertyNO);
                        $('#date').html(data[0].JO_DATESRDone1);
                        $('#decription').html(data[0].JO_DescOfWork);
                        $('#jobordernum').html(data[0].JO_TicketNum);
                        $('#txtjobordernum').val(data[0].JO_TicketNum);
                        $('#model').html(data[0].JO_Model);
                        $('#perfby').html(data[0].JO_PerfBy);
                        $('#dept').html(data[0].JO_Department);
                        $("#serial").html(data[0].JO_Serial);
                        $("#office").html(data[0].JO_Department);
                        
      
                        var status = data[0].JO_Status;
                        if (status == "REQUESTED"){
      
                            $("#span1").hide();
                            $("#span2").hide();
                            $("#span3").hide();
                            
                            $("#print").hide();
                            $("#update_service ").hide();
      
                            $("#inputact").show();
                            $("#inputass").show();
                            $("#inputreco").show();
                            $("#verifby").hide();
                            $('#Boss').hide();
                            $('#adm').hide();
      
      
                        }
                        else if (status == "APPROVED"){
                            $("#span1").show();
                            $("#span2").show();
                            $("#span3").show();
      
                            $("#actshow").html(data[0].JO_ActionTaken);
                            $("#asses").html(data[0].JO_Assessment);
                            $("#reco").html(data[0].JO_Recommendation);
                            $("#update_service").hide();
                            $("#print").show();
      
                            $("#inputact").hide();
                            $("#inputass").hide();
                            $("#inputreco").hide();
                            $("#verifby").show();
                            $('#Boss').show();
                            $('#adm').show();
      
                        }
                        else if (status == "MCC:FOR APPROVAL"){
                          $("#span1").hide();
                          $("#span2").hide();
                          $("#span3").hide();
                          
                          $("#print").hide();
                          $("#update_service ").hide();
      
                          $("#inputact").show();
                          $("#inputass").show();
                          $("#inputreco").show();
                          $("#verifby").hide();
                          $('#Boss').hide();
                          $('#adm').hide();
      
                        
      
      
                      }
                      else if (status == "HOMIS:FOR APPROVAL"){
                          $("#span1").show();
                          $("#span2").show();
                          $("#span3").show();
      
                          $("#actshow").html(data[0].JO_ActionTaken);
                          $("#asses").html(data[0].JO_Assessment);
                          $("#reco").html(data[0].JO_Recommendation);
                          $("#update_service").show();
                          $("#print").hide();
      
                          $("#inputact").hide();
                          $("#inputass").hide();
                          $("#inputreco").hide();
                          $("#verifby").show();
                          $('#Boss').show();
                          $('#adm').show();
      
                      }
                      else if (status == "ACCEPTED"){
                          $("#span1").hide();
                          $("#span2").hide();
                          $("#span3").hide();
                          
                          $("#print").hide();
                          $("#update_service ").hide();
      
                          $("#inputact").show();
                          $("#inputass").show();
                          $("#inputreco").show();
                          $("#verifby").hide();
                          $('#Boss').hide();
                          $('#adm').hide();
      
                      }
                        else{
                            $("#span1").show();
                            $("#span2").show();
                            $("#span3").show();
      
                            $("#actshow").html(data[0].JO_ActionTaken);
                            $("#asses").html(data[0].JO_Assessment);
                            $("#reco").html(data[0].JO_Recommendation);
                            $("#update_service").show();
      
                            $("#inputact").hide();
                            $("#inputass").hide();
                            $("#inputreco").hide();
                            $("#verifby").hide();
                            $('#Boss').hide();
                            $('#adm').show();
                        }
      
                    }); 
                    
              });
              var table_comp = $('#tbl_JO').DataTable({
                  "processing": true,
                  "serverSide": false,
                  "stateSave": true,
                  "searching":false,
                  "bDestroy": true,
                  "scrollY":true,
                  "scrollX":true,
                  "lengthMenu": [ 10, 20, 30, 40, 50 ]
              });
    });
});
});