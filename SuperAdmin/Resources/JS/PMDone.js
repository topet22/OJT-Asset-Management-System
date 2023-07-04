$(document).ready(function() {
    $('#prt').hide();
    $('#acceptPM').hide();
    $("#savesignature").on('click', function () {
        
        var sigdataUrl=$("#sigdataUrl").get(0).value;
        
            
            $.post("../SuperAdmin/Resources/PHP/updatesignature.php",
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

    $.post("../SuperAdmin/Resources/PHP/SupAdminPMDone.php",
    function(data, status){
    var data=$.parseJSON(data);    
    var row="";
   
    for(var i=0;i<data.length;i++){

        var stats = data[i].PM_STATUS;

        if (stats == "APPROVED")
        {
            row=row+"<tr><td>"+data[i].PM_Department+"</td><td>"+data[i].PM_SerialPC+"</td><td><span class ='badge rounded-pill bg-success'>"
            +data[i].PM_STATUS+"</span></td><td class='jo_act'><button id="+data[i].PM_ID+" class='View  btn btn-outline-dark' data-bs-toggle='modal' data-bs-target='#try'><i class='bi bi-file-earmark-plus'></i>&nbsp;View PM Checklist</button></td></tr>";
        }
        else
        {
            row=row+"<tr><td>"+data[i].PM_Department+"</td><td>"+data[i].PM_SerialPC+"</td><td><span class ='badge rounded-pill bg-info'>"
            +data[i].PM_STATUS+"</span></td><td class='jo_act'><button id="+data[i].PM_ID+" class='View  btn btn-outline-dark' data-bs-toggle='modal' data-bs-target='#try'><i class='bi bi-file-earmark-plus'></i>&nbsp;View PM Checklist</button></td></tr>";
        }
    }
    $('#PM_data').html(row);

    
    $(".jo_act").find(".View").click(function () {
        var propID = this.id;
        var prop=JSON.stringify(
            {"data":
              {
               "propID":propID
            
              }
            }
          ); 
           $.post("../SuperAdmin/Resources/PHP/PMDets.php",prop,
           function(data, status){
            var data=$.parseJSON(data);    
            var row="";
            for(var i=0;i<data.length;i++){


                $('#LY').html("&#9744 Yes");
                $('#LN').html("&#9744 No");
                
                var PM_ID =data[0].PM_ID;
                var PM_Date =data[0].PM_Date;
                var PM_DoneBy =data[0].PM_DoneBy;
                var PM_STATUS =data[0].PM_STATUS;
                var PM_Department =data[0].PM_Department;
                var PM_SerialPC =data[0].PM_SerialPC;
                var PM_SerialMonitor1 =data[0].PM_SerialMonitor1;
                var PM_ModelMontor1 =data[0].PM_ModelMontor1;
                var PM_SerialMonitor2 =data[0].PM_SerialMonitor2;
                var PM_ModelMontor2 =data[0].PM_ModelMontor2;
                var PM_SerialKB =data[0].PM_SerialKB;
                var PM_SerialMouse =data[0].PM_SerialMouse;
                var PM_SerialUPS =data[0].PM_SerialUPS;
                var PM_ModelKB =data[0].PM_ModelKB;
                var PM_ModelMouse =data[0].PM_ModelMouse;
                var PM_ModelUPS =data[0].PM_ModelUPS;
                var PM_KBStat =data[0].PM_KBStat;
                var PM_MouseStat =data[0].PM_MouseStat;
                var PM_UPSStat =data[0].PM_UPSStat;
                var PM_Q1 =data[0].PM_Q1;
                var PM_Q2 =data[0].PM_Q2;
                var PM_Q3 =data[0].PM_Q3;
                var PM_Q4 =data[0].PM_Q4;
                var PM_Q5 =data[0].PM_Q5;
                var PM_Q6 =data[0].PM_Q6;
                var PM_Q7 =data[0].PM_Q7;
                var PM_Q8 =data[0].PM_Q8;
                var PM_Q9 =data[0].PM_Q9;
                var PM_Q10 =data[0].PM_Q10;
                var PM_Q11 =data[0].PM_Q11;
                var PM_Q12 =data[0].PM_Q12;
                var PM_Q1Rems =data[0].PM_Q1Rems;
                var PM_Q2Rems =data[0].PM_Q2Rems;
                var PM_Q3Rems =data[0].PM_Q3Rems;
                var PM_Q4Rems =data[0].PM_Q4Rems;
                var PM_Q5Rems =data[0].PM_Q5Rems;
                var PM_Q6Rems =data[0].PM_Q6Rems;
                var PM_Q7Rems =data[0].PM_Q7Rems;
                var PM_Q8Rems =data[0].PM_Q8Rems;
                var PM_Q9Rems =data[0].PM_Q9Rems;
                var PM_Q10Rems =data[0].PM_Q10Rems;
                var PM_Q11Rems =data[0].PM_Q11Rems;
                var PM_Q12Rems =data[0].PM_Q12Rems;
                var PM_DesigUser =data[0].PM_DesigUser;
                var PM_Type =data[0].PM_Type; 


                if(PM_STATUS == "APPROVED"){
                    $('#prt').show();
                    $('#acceptPM').hide();
                    $.post("../SuperAdmin/Resources/PHP/viewsignature2.php",
                    function(data, status){
                      var data=$.parseJSON(data); 
                          console.log(data[0].usersignat);
          
                        var src = data[0].usersignat;
                        $("#2sig-image2").css("background-image", "url(" + src + ")");
                        $('#txtverifby').html(data[0].nameSA);   
                        $('#txtverifby').show();
                    });        
                }
                else if(PM_STATUS == "VERIFIED"){
                    $('#prt').hide();
                    $('#acceptPM').show();
                    $('#txtverifby').hide();
                    var src = "null.jpg";
                    $("#2sig-image2").css("background-image", "url("+src+")");
                }
                else
                {
                    $('#prt').hide();
                    $('#acceptPM').hide();
                }

                $('#PRTPM_Office').html(PM_Department);
                $('#PRTPM_Date').html(PM_Date);
                $('#PRTPM_Dept').html(PM_Department);
                $('#PRTPM_DesigUser').html(PM_DesigUser);
                $('#PRTPM_Serial').html(PM_SerialPC);
                $('#txtpmid').val(PM_ID);


                $('#PRTPM_Monitor1Brand').html(PM_ModelMontor1);
                $('#PRTPM_Monitor2Brand').html(PM_ModelMontor2);
                $('#PRTPM_SerialMonitor1').html(PM_SerialMonitor1);
                $('#PRTPM_SerialMonitor2').html(PM_SerialMonitor2);

                $('#PRTPM_KBModel').html(PM_ModelKB);
                $('#PRTPM_KBSerial').html(PM_SerialKB);
                

                $('#PRTPM_MouseModel').html(PM_ModelMouse);
                $('#PRTPM_MouseSerial').html(PM_SerialMouse);

                $('#PRTPM_UPSModel').html(PM_ModelUPS);
                $('#PRTPM_UPSSerial').html(PM_SerialUPS);

                
                $('#PRTQ1Remarks').html(PM_Q1Rems);
                $('#PRTQ2Remarks').html(PM_Q2Rems);
                $('#PRTQ3Remarks').html(PM_Q3Rems);
                $('#PRTQ4Remarks').html(PM_Q4Rems);
                $('#PRTQ5Remarks').html(PM_Q5Rems);
                $('#PRTQ6Remarks').html(PM_Q6Rems);
                $('#PRTQ7Remarks').html(PM_Q7Rems);
                $('#PRTQ8Remarks').html(PM_Q8Rems);
                $('#PRTQ9Remarks').html(PM_Q9Rems);
                $('#PRTQ10Remarks').html(PM_Q10Rems);
                $('#PRTQ11Remarks').html(PM_Q11Rems);
                $('#PRTQ12Remarks').html(PM_Q12Rems);
                $('#enduser').html(PM_DesigUser);
                $('#PerfBy').html(PM_DoneBy);


                if(PM_KBStat == "Working")
                {
                    $('#KB_1W').html("&#9745 Working");
                    $('#KB_1NW').html("&#9744 Not Working");
                }
                else if(PM_KBStat == "Not Working")
                {
                    $('#KB_1W').html("&#9744 Working");
                    $('#KB_1NW').html("&#9745 Not Working");
                }
                else
                {
                    $('#KB_1W').html("&#9744 Working");
                    $('#KB_1NW').html("&#9744 Not Working");
                }

                ////////

                if(PM_MouseStat == "Working")
                {
                    $('#MS1W').html("&#9745 Working");
                    $('#MS1NW').html("&#9744 Not Working");
                }
                else if(PM_MouseStat == "Not Working")
                {
                    $('#MS1W').html("&#9744 Working");
                    $('#MS1NW').html("&#9745 Not Working");
                }
                else
                {
                    $('#MS1W').html("&#9744 Working");
                    $('#MS1NW').html("&#9744 Not Working");
                }

                /////
                
                if(PM_UPSStat == "Working")
                {
                    $('#UPS1W').html("&#9745 Working");
                    $('#UPS1NW').html("&#9744 Not Working");
                }
                else if(PM_UPSStat == "Not Working")
                {
                    $('#UPS1W').html("&#9744 Working");
                    $('#UPS1NW').html("&#9745 Not Working");
                }
                else
                {
                    $('#UPS1W').html("&#9744 Working");
                    $('#UPS1NW').html("&#9744 Not Working");
                }

                ////////

                if(PM_Q1 == "Done")
                {
                    $('#PrtQ1nd1').hide();
                    $('#PrtQ1d1').show();

                    $('#PrtQ1d2').hide();
                    $('#PrtQ1nd2').show();
                }
                else if(PM_Q1 == "Not Done")
                {
                    $('#PrtQ1nd1').show();
                    $('#PrtQ1d1').hide();

                    $('#PrtQ1nd2').hide();
                    $('#PrtQ1d2').show();
                }
                else
                {
                    $('#PrtQ1nd1').show();
                    $('#PrtQ1d1').hide();

                    $('#PrtQ1nd2').show();
                    $('#PrtQ1d2').hide();
                }

                //////////

                if(PM_Q2 == "Done")
                {
                    $('#PrtQ2nd1').hide();
                    $('#PrtQ2d1').show();

                    $('#PrtQ2d2').hide();
                    $('#PrtQ2nd2').show();
                }
                else if(PM_Q2 == "Not Done")
                {
                    $('#PrtQ2nd1').show();
                    $('#PrtQ2d1').hide();

                    $('#PrtQ2nd2').hide();
                    $('#PrtQ2d2').show();
                }
                else
                {
                    $('#PrtQ2nd1').show();
                    $('#PrtQ2d1').hide();

                    $('#PrtQ2nd2').show();
                    $('#PrtQ2d2').hide();
                }

                /////////

                if(PM_Q3 == "Done")
                {
                    $('#PrtQ3nd1').hide();
                    $('#PrtQ3d1').show();

                    $('#PrtQ3d2').hide();
                    $('#PrtQ3nd2').show();
                }
                else if(PM_Q3 == "Not Done")
                {
                    $('#PrtQ3nd1').show();
                    $('#PrtQ3d1').hide();

                    $('#PrtQ3nd2').hide();
                    $('#PrtQ3d2').show();
                }
                else
                {
                    $('#PrtQ3nd1').show();
                    $('#PrtQ3d1').hide();

                    $('#PrtQ3nd2').show();
                    $('#PrtQ3d2').hide();
                }

                ///////////

                if(PM_Q4 == "Done")
                {
                    $('#PrtQ4nd1').hide();
                    $('#PrtQ4d1').show();

                    $('#PrtQ4d2').hide();
                    $('#PrtQ4nd2').show();
                }
                else if(PM_Q4 == "Not Done")
                {
                    $('#PrtQ4nd1').show();
                    $('#PrtQ4d1').hide();

                    $('#PrtQ4nd2').hide();
                    $('#PrtQ4d2').show();
                }
                else
                {
                    $('#PrtQ4nd1').show();
                    $('#PrtQ4d1').hide();

                    $('#PrtQ4nd2').show();
                    $('#PrtQ4d2').hide();
                }

                //////////////

                if(PM_Q5 == "Done")
                {
                    $('#PrtQ5nd1').hide();
                    $('#PrtQ5d1').show();

                    $('#PrtQ5d2').hide();
                    $('#PrtQ5nd2').show();
                }
                else if(PM_Q5 == "Not Done")
                {
                    $('#PrtQ5nd1').show();
                    $('#PrtQ5d1').hide();

                    $('#PrtQ5nd2').hide();
                    $('#PrtQ5d2').show();
                }
                else
                {
                    $('#PrtQ5nd1').show();
                    $('#PrtQ5d1').hide();

                    $('#PrtQ5nd2').show();
                    $('#PrtQ5d2').hide();
                }

                ///////////////////

                if(PM_Q6 == "Done")
                {
                    $('#PrtQ6nd1').hide();
                    $('#PrtQ6d1').show();

                    $('#PrtQ6d2').hide();
                    $('#PrtQ6nd2').show();
                }
                else if(PM_Q6 == "Not Done")
                {
                    $('#PrtQ6nd1').show();
                    $('#PrtQ6d1').hide();

                    $('#PrtQ6nd2').hide();
                    $('#PrtQ6d2').show();
                }
                else
                {
                    $('#PrtQ6nd1').show();
                    $('#PrtQ6d1').hide();

                    $('#PrtQ6nd2').show();
                    $('#PrtQ6d2').hide();
                }

                /////////////////

                if(PM_Q7 == "Done")
                {
                    $('#PrtQ7nd1').hide();
                    $('#PrtQ7d1').show();

                    $('#PrtQ7d2').hide();
                    $('#PrtQ7nd2').show();
                }
                else if(PM_Q7 == "Not Done")
                {
                    $('#PrtQ7nd1').show();
                    $('#PrtQ7d1').hide();

                    $('#PrtQ7nd2').hide();
                    $('#PrtQ7d2').show();
                }
                else
                {
                    $('#PrtQ7nd1').show();
                    $('#PrtQ7d1').hide();

                    $('#PrtQ7nd2').show();
                    $('#PrtQ7d2').hide();
                }

                /////////////

                if(PM_Q8 == "Done")
                {
                    $('#PrtQ8nd1').hide();
                    $('#PrtQ8d1').show();

                    $('#PrtQ8d2').hide();
                    $('#PrtQ8nd2').show();
                }
                else if(PM_Q8 == "Not Done")
                {
                    $('#PrtQ8nd1').show();
                    $('#PrtQ8d1').hide();

                    $('#PrtQ8nd2').hide();
                    $('#PrtQ8d2').show();
                }
                else
                {
                    $('#PrtQ8nd1').show();
                    $('#PrtQ8d1').hide();

                    $('#PrtQ8nd2').show();
                    $('#PrtQ8d2').hide();
                }

                /////////////////

                if(PM_Q9 == "Done")
                {
                    $('#PrtQ9nd1').hide();
                    $('#PrtQ9d1').show();

                    $('#PrtQ9d2').hide();
                    $('#PrtQ9nd2').show();
                }
                else if(PM_Q9 == "Not Done")
                {
                    $('#PrtQ9nd1').show();
                    $('#PrtQ9d1').hide();

                    $('#PrtQ9nd2').hide();
                    $('#PrtQ9d2').show();
                }
                else
                {
                    $('#PrtQ9nd1').show();
                    $('#PrtQ9d1').hide();

                    $('#PrtQ9nd2').show();
                    $('#PrtQ9d2').hide();
                }

                //////////////

                if(PM_Q10 == "Done")
                {
                    $('#PrtQ10nd1').hide();
                    $('#PrtQ10d1').show();

                    $('#PrtQ10d2').hide();
                    $('#PrtQ10nd2').show();
                }
                else if(PM_Q10 == "Not Done")
                {
                    $('#PrtQ10nd1').show();
                    $('#PrtQ10d1').hide();

                    $('#PrtQ10nd2').hide();
                    $('#PrtQ10d2').show();
                }
                else
                {
                    $('#PrtQ10nd1').show();
                    $('#PrtQ10d1').hide();

                    $('#PrtQ10nd2').show();
                    $('#PrtQ10d2').hide();
                }

                /////////////////////

                if(PM_Q11 == "Done")
                {
                    $('#PrtQ11nd1').hide();
                    $('#PrtQ11d1').show();

                    $('#PrtQ11d2').hide();
                    $('#PrtQ11nd2').show();
                }
                else if(PM_Q11 == "Not Done")
                {
                    $('#PrtQ11nd1').show();
                    $('#PrtQ11d1').hide();

                    $('#PrtQ11nd2').hide();
                    $('#PrtQ11d2').show();
                }
                else
                {
                    $('#PrtQ11nd1').show();
                    $('#PrtQ11d1').hide();

                    $('#PrtQ11nd2').show();
                    $('#PrtQ11d2').hide();
                }

                /////////////////////////

                if(PM_Q12 == "Done")
                {
                    $('#PrtQ12nd1').hide();
                    $('#PrtQ12d1').show();

                    $('#PrtQ12d2').hide();
                    $('#PrtQ12nd2').show();
                }
                else if(PM_Q12 == "Not Done")
                {
                    $('#PrtQ12nd1').show();
                    $('#PrtQ12d1').hide();

                    $('#PrtQ12nd2').hide();
                    $('#PrtQ12d2').show();
                }
                else
                {
                    $('#PrtQ12nd1').show();
                    $('#PrtQ12d1').hide();

                    $('#PrtQ12nd2').show();
                    $('#PrtQ12d2').hide();
                }



                if (PM_Type == "Printer")
                {
                    var Model =data[1].Model;
                    $('#PRTPM_ModelBrand').html(Model);
                    $('#OTHERS').html("&#9745 OTHERS");
                    $('#DESKTOP').html("&#9744 DESKTOP");
                    $('#LAPTOP').html("&#9744 LAPTOP");
                    $('#ASSEMBLED_PC').html("&#9744 ASSEMBLED PC");
                    $('#All_IN_1').html("&#9744 All-IN-1");

                    $('#PRTPM_OS').html("");
                    $('#PRTPM_RAM').html("");
                    $('#PRTPM_HDDSSD').html("");
                    $('#PRTPM_Processor').html("");
                }
                else
                {
                    $('#OTHERS').html("&#9744 OTHERS");
                    var Model =data[1].Model;
                    var Brand =data[1].Brand;
                    var CompType =data[1].CompType;
                    var CompOS =data[1].CompOS;
                    var CompRAM =data[1].CompRAM;
                    var CompStorageType =data[1].CompStorageType;
                    var CompProcessor =data[1].CompProcessor;
                    var OSLicense =data[1].OSLicense;
                    var date_acquired =data[1].date_acquired;

                    $('#PRTPM_ModelBrand').html(Model);
                    $('input[name="PRTPC_Type"][value="'+CompType+'"]').prop('checked', true);

                    $('#PRTPM_OS').html(CompOS);
                    $('#PRTPM_RAM').html(CompRAM);
                    $('#PRTPM_HDDSSD').html(CompStorageType);
                    $('#PRTPM_Processor').html(CompProcessor);

                    if(OSLicense !="NA")
                    {
                        $('#LY').html("&#9745 Yes");
                        $('#LN').html("&#9744 No");
                    }
                    else
                    {
                        $('#LN').html("&#9745 No");
                        $('#LY').html("&#9744 Yes");
                    }

                    if (CompType == "Desktop")
                    {
                        $('#DESKTOP').html("&#9745 DESKTOP");
                    }
                    else if(CompType == "Laptop")
                    {
                        $('#LAPTOP').html("&#9745 LAPTOP");
                    }
                    else if (CompType == "Assembled PC")
                    {
                        $('#ASSEMBLED_PC').html("&#9745 ASSEMBLED PC");
                    }
                    else if(CompType == "All-IN-1")
                    {
                        $('#All_IN_1').html("&#9745 All-IN-1");
                    }
                    else
                    {
                        $('#OTHERS').html("&#9744 OTHERS");
                    }
                }
            }
          });
          $.post("../SuperAdmin/Resources/PHP/viewpmsignature.php",prop,
          function(data, status){
            var data=$.parseJSON(data); 
                console.log(data[0].usersigna);

              var src = data[0].usersigna;
              $("#2sig-image").css("background-image", "url(" + src + ")");
              
          });


    });

    var table_PM = $('#PM_Reports').DataTable({
        "processing": true,
        "serverSide": false,
        "stateSave": true,
        "searching":true,
        "bDestroy": true,
        "scrollY":true,
        "scrollX":true,
        "lengthMenu": [ 10, 20, 30, 40, 50 ]
    });
});


$("#acceptPM").on('click', function () {

    var JO_Num = $('#txtpmid').get(0).value;
    var prop=JSON.stringify(
        {"data":
          {
           "JO_Num":JO_Num
          }
        }
      );
      $.post("../SuperAdmin/Resources/PHP/SupAdminApprovePM.php",prop,
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
});
