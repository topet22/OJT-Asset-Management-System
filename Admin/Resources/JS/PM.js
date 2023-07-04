$(document).ready(function() {

    $('#PM_Type').hide();

    var d = new Date();

    var month = d.getMonth()+1;
    var day = d.getDate();
    
    var output = d.getFullYear() + '/' +
        ((''+month).length<2 ? '0' : '') + month + '/' +
        ((''+day).length<2 ? '0' : '') + day;

    $('#PM_Date').html(output);

    $.post("../Admin/Resources/PHP/viewdepts.php",
    function(data, status){
        var data=$.parseJSON(data);    
        var row="";
        for(var i=0;i<data.length;i++){

            var id = data[i].dept_name;
            let name = data[i].dept_name;

            $("#PM_Office").append("<option value='"+id+"'>"+name+"</option>");
        }
    });

    $('#PM_Office').on('change', function() {
        var value = this.value;
        $('#PM_Dept').html(value);
        var prop=JSON.stringify(
            {"data":
              {
               "value":value
              }
            }
          );
        $("#PM_DesigUser").empty().append("<option value='--SELECT--'>--SELECT--</option>");
        $.post("../Admin/Resources/PHP/GetDesig.php",prop,
        function(data, status){
            var data=$.parseJSON(data);    
            var row="";
    
            for(var i=0;i<data.length;i++){
    
                var id = data[i].users;
                var name = data[i].users;
    
                $("#PM_DesigUser").append("<option value='"+id+"'>"+name+"</option>");
            }   
            var map = {};
            $('#PM_DesigUser option').each(function () {
                if (map[this.value]) {
                    $(this).remove()
                }
                map[this.value] = true;
            }); 
        });
    });

    $('#PM_DesigUser').on('change', function() {
        var dept = $("#PM_Office").get(0).value;
        var value = this.value;
        var prop=JSON.stringify(
            {"data":
              {
                "dept":dept,
               "value":value
              }
            }
          );
        $("#PM_Serial").empty().append("<option value='--SELECT--'>--SELECT--</option>");
        $.post("../Admin/Resources/PHP/GetDesigSerial.php",prop,
        function(data, status){
            var data=$.parseJSON(data);    
            var row="";
    
            for(var i=0;i<data.length;i++){
    
                var id = data[i].serial;
                var name = data[i].serial;
    
                $("#PM_Serial").append("<option value='"+id+"'>"+name+"</option>");
            }   
    });});
    

    $('#PM_Serial').on('change', function() {
        $('#PM_PCType').empty();
        $('#PM_ModelBrand').empty();
        $('#PM_OS').empty();
        $('#PM_RAM').empty();
        $('#PM_HDDSSD').empty();
        $('#PM_License').empty();
        $('#PM_Processor').empty();
        
        var value = this.value;
        var prop=JSON.stringify(
            {"data":
              {
               "value":value
              }
            }
          );
        $.post("../Admin/Resources/PHP/GetDesigSerialDets.php",prop,
        function(data, status){
            var data=$.parseJSON(data);    
            var row="";
    
            for(var i=0;i<data.length;i++){

                var WhatType = data[0].WhatType;

                if (WhatType == "Computer")
                {
                    var PM_PCType= data[0].CompType;
                    var PM_ModelBrand= data[0].InvModel;
                    var PM_OS= data[0].CompOS;
                    var PM_RAM= data[0].CompRAM;
                    var PM_HDDSSD= data[0].CompStorageType;
                    var PM_License= data[0].OSLicense;
                    var PM_Processor= data[0].CompProcessor;
    
                    if(PM_License != "N/A")
                    {
                        var lisensya = "YES";
                    }
                    else
                    {
                        var lisensya = "NO";
                    }
                    
    
                    $('#PM_PCType').html(PM_PCType);
                    $('#PM_ModelBrand').html(PM_ModelBrand);
                    $('#PM_OS').html(PM_OS);
                    $('#PM_RAM').html(PM_RAM);
                    $('#PM_HDDSSD').html(PM_HDDSSD);
                    $('#PM_License').html(lisensya);
                    $('#PM_Processor').html(PM_Processor);
                    $('#PM_Type').val(WhatType);

                    $("input[name=Q1]").prop("disabled",false);
                    $("input[name=Q2]").prop("disabled",false);
                    $("input[name=Q6]").prop("disabled",false);
                    $("input[name=Q7]").prop("disabled",false);
                    $("input[name=Q8]").prop("disabled",false);
                    $("input[name=Q9]").prop("disabled",false);
                    $("input[name=Q10]").prop("disabled",false);
                    $("input[name=Q11]").prop("disabled",false);
                    $("input[name=Q12]").prop("disabled",false);
            
                    $("#Q1Remarks").prop("disabled",false);
                    $("#Q2Remarks").prop("disabled",false);
                    $("#Q6Remarks").prop("disabled",false);
                    $("#Q7Remarks").prop("disabled",false);
                    $("#Q8Remarks").prop("disabled",false);
                    $("#Q9Remarks").prop("disabled",false);
                    $("#Q10Remarks").prop("disabled",false);
                    $("#Q11Remarks").prop("disabled",false);
                    $("#Q12Remarks").prop("disabled",false);

                    $("#PM_Monitor1Serial").prop("disabled",false);
                    $("#PM_Monitor1Brand").prop("disabled",false);
            
                    $("#PM_Monitor2Serial").prop("disabled",false);
                    $("#PM_Monitor2Brand").prop("disabled",false);
            
                    $("#PM_KBSerial").prop("disabled",false);
                    $("#PM_MouseSerial").prop("disabled",false);
                    $("#PM_UPSSerial").prop("disabled",false);
            
                    $("#PM_UPSStat").prop("disabled",false);
                    $("#PM_MouseStat").prop("disabled",false);
                    $("#PM_KBStat").prop("disabled",false);
            
                    $("#PM_KBModel").prop("disabled",false);
                    $("#PM_MouseModel").prop("disabled",false);
                    $("#PM_UPSModel").prop("disabled",false);

                    $('input[name="Q1"]').prop('checked', false);
                    $('input[name="Q2"]').prop('checked', false);
                    $('input[name="Q3"]').prop('checked', false);
                    $('input[name="Q4"]').prop('checked', false);
                    $('input[name="Q5"]').prop('checked', false);
                    $('input[name="Q6"]').prop('checked', false);
                    $('input[name="Q7"]').prop('checked', false);
                    $('input[name="Q8"]').prop('checked', false);
                    $('input[name="Q9"]').prop('checked', false);
                    $('input[name="Q10"]').prop('checked', false);
                    $('input[name="Q11"]').prop('checked', false);
                    $('input[name="Q12"]').prop('checked', false);
                }
                else
                {
                    var PM_ModelBrand= data[0].InvModel;
                    $('#PM_PCType').html(WhatType);
                    $('#PM_Type').val(WhatType);
                    $('#PM_ModelBrand').html(PM_ModelBrand);

                    $('input[name=ticketID]').attr("disabled",true);

                    $("input[name=Q1]").prop("disabled",true);
                    $("input[name=Q2]").prop("disabled",true);
                    $("input[name=Q6]").prop("disabled",true);
                    $("input[name=Q7]").prop("disabled",true);
                    $("input[name=Q8]").prop("disabled",true);
                    $("input[name=Q9]").prop("disabled",true);
                    $("input[name=Q10]").prop("disabled",true);
                    $("input[name=Q11]").prop("disabled",true);
                    $("input[name=Q12]").prop("disabled",true);


                    $("input[name=Q1][value='Not Done']").prop("checked",true);
                    $("input[name=Q2][value='Not Done']").prop("checked",true);
                    $("input[name=Q6][value='Not Done']").prop("checked",true);
                    $("input[name=Q7][value='Not Done']").prop("checked",true);
                    $("input[name=Q8][value='Not Done']").prop("checked",true);
                    $("input[name=Q9][value='Not Done']").prop("checked",true);
                    $("input[name=Q10][value='Not Done']").prop("checked",true);
                    $("input[name=Q11][value='Not Done']").prop("checked",true);
                    $("input[name=Q12][value='Not Done']").prop("checked",true);
            
                    $("#Q1Remarks").prop("disabled",true);
                    $("#Q2Remarks").prop("disabled",true);
                    $("#Q6Remarks").prop("disabled",true);
                    $("#Q7Remarks").prop("disabled",true);
                    $("#Q8Remarks").prop("disabled",true);
                    $("#Q9Remarks").prop("disabled",true);
                    $("#Q10Remarks").prop("disabled",true);
                    $("#Q11Remarks").prop("disabled",true);
                    $("#Q12Remarks").prop("disabled",true);

                    $("#PM_Monitor1Serial").prop("disabled",true);
                    $("#PM_Monitor1Brand").prop("disabled",true);
            
                    $("#PM_Monitor2Serial").prop("disabled",true);
                    $("#PM_Monitor2Brand").prop("disabled",true);
            
                    $("#PM_KBSerial").prop("disabled",true);
                    $("#PM_MouseSerial").prop("disabled",true);
                    $("#PM_UPSSerial").prop("disabled",true);
            
                    $("#PM_UPSStat").prop("disabled",true);
                    $("#PM_MouseStat").prop("disabled",true);
                    $("#PM_KBStat").prop("disabled",true);
            
                    $("#PM_KBModel").prop("disabled",true);
                    $("#PM_MouseModel").prop("disabled",true);
                    $("#PM_UPSModel").prop("disabled",true);
                }

            }   
        });
    });
    $("#SAVE_PM").on('click', function () {

        var PM_Serial = $("#PM_Serial").get(0).value;
        var PM_Office = $("#PM_Office").get(0).value;
        var PM_DesigUser = $("#PM_DesigUser").get(0).value;
        var PM_Type = $('#PM_Type').get(0).value;

        var PM_Monitor1Serial = $("#PM_Monitor1Serial").get(0).value;
        var PM_Monitor1Brand = $("#PM_Monitor1Brand").get(0).value;

        var PM_Monitor2Serial = $("#PM_Monitor2Serial").get(0).value;
        var PM_Monitor2Brand = $("#PM_Monitor2Brand").get(0).value;

        var PM_KBSerial = $("#PM_KBSerial").get(0).value;
        var PM_MouseSerial = $("#PM_MouseSerial").get(0).value;
        var PM_UPSSerial = $("#PM_UPSSerial").get(0).value;

        var PM_UPSStat = $("#PM_UPSStat").get(0).value;
        var PM_MouseStat = $("#PM_MouseStat").get(0).value;
        var PM_KBStat = $("#PM_KBStat").get(0).value;

        var PM_KBModel = $("#PM_KBModel").get(0).value;
        var PM_MouseModel = $("#PM_MouseModel").get(0).value;
        var PM_UPSModel = $("#PM_UPSModel").get(0).value;

        var Q1 = $("input[name=Q1]:checked").val();
        var Q2 = $("input[name=Q2]:checked").val();
        var Q3 = $("input[name=Q3]:checked").val();
        var Q4 = $("input[name=Q4]:checked").val();
        var Q5 = $("input[name=Q5]:checked").val();
        var Q6 = $("input[name=Q6]:checked").val();
        var Q7 = $("input[name=Q7]:checked").val();
        var Q8 = $("input[name=Q8]:checked").val();
        var Q9 = $("input[name=Q9]:checked").val();
        var Q10 = $("input[name=Q10]:checked").val();
        var Q11 = $("input[name=Q11]:checked").val();
        var Q12 = $("input[name=Q12]:checked").val();

        var Q1Rem = $("#Q1Remarks").get(0).value;
        var Q2Rem = $("#Q2Remarks").get(0).value;
        var Q3Rem = $("#Q3Remarks").get(0).value;
        var Q4Rem = $("#Q4Remarks").get(0).value;
        var Q5Rem = $("#Q5Remarks").get(0).value;
        var Q6Rem = $("#Q6Remarks").get(0).value;
        var Q7Rem = $("#Q7Remarks").get(0).value;
        var Q8Rem = $("#Q8Remarks").get(0).value;
        var Q9Rem = $("#Q9Remarks").get(0).value;
        var Q10Rem = $("#Q10Remarks").get(0).value;
        var Q11Rem = $("#Q11Remarks").get(0).value;
        var Q12Rem = $("#Q12Remarks").get(0).value;

        var prop=JSON.stringify(
            {"data":
              {
               "PM_Serial":PM_Serial,
               "PM_Office":PM_Office,
               "PM_DesigUser":PM_DesigUser,
               "PM_Type":PM_Type,
               "PM_Monitor1Serial":PM_Monitor1Serial,
               "PM_Monitor2Serial":PM_Monitor2Serial,
               "PM_Monitor1Brand":PM_Monitor1Brand,
               "PM_Monitor2Brand":PM_Monitor2Brand,
               "PM_KBSerial":PM_KBSerial,
               "PM_MouseSerial":PM_MouseSerial,
               "PM_UPSSerial":PM_UPSSerial,
               "PM_UPSStat":PM_UPSStat,
               "PM_MouseStat":PM_MouseStat,
               "PM_KBStat":PM_KBStat,
               "PM_KBModel":PM_KBModel,
               "PM_MouseModel":PM_MouseModel,
               "PM_UPSModel":PM_UPSModel,
               "Q1":Q1,
               "Q2":Q2,
               "Q3":Q3,
               "Q4":Q4,
               "Q5":Q5,
               "Q6":Q6,
               "Q7":Q7,
               "Q8":Q8,
               "Q9":Q9,
               "Q10":Q10,
               "Q11":Q11,
               "Q12":Q12,
               "Q1Rem":Q1Rem,
               "Q2Rem":Q2Rem,
               "Q3Rem":Q3Rem,
               "Q4Rem":Q4Rem,
               "Q5Rem":Q5Rem,
               "Q6Rem":Q6Rem,
               "Q7Rem":Q7Rem,
               "Q8Rem":Q8Rem,
               "Q9Rem":Q9Rem,
               "Q10Rem":Q10Rem,
               "Q11Rem":Q11Rem,
               "Q12Rem":Q12Rem
              }
            }
          ); 
          
        $.post("../Admin/Resources/PHP/SubmitPMRep.php",prop,
            function(data,status){
                if(data == 1) 
                { 
                    alert("Successfully Added!");
                    location.reload(true);
                } 
                else
                {
                    alert("ERROR!");
                }
            })

        
    });
    $('#Clear').on('click', function() {
     
        $('input[name="Q1"]').prop('checked', false);
        $('input[name="Q2"]').prop('checked', false);
        $('input[name="Q3"]').prop('checked', false);
        $('input[name="Q4"]').prop('checked', false);
        $('input[name="Q5"]').prop('checked', false);
        $('input[name="Q6"]').prop('checked', false);
        $('input[name="Q7"]').prop('checked', false);
        $('input[name="Q8"]').prop('checked', false);
        $('input[name="Q9"]').prop('checked', false);
        $('input[name="Q10"]').prop('checked', false);
        $('input[name="Q11"]').prop('checked', false);
        $('input[name="Q12"]').prop('checked', false);

    
      
      
    });
    
});