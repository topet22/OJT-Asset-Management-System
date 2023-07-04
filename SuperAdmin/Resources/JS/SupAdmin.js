function reloader(){
    $.post("../SuperAdmin/Resources/PHP/SupAdminJOReqs.php",
    function(data, status){
    var data=$.parseJSON(data);    
    var row="";
    for(var i=0;i<data.length;i++){

        var numoth = data[i].OthersNumbers;
        $("#blinker").html(numoth);
        
    }
    });
    

    $.post("../SuperAdmin/Resources/PHP/SupAdminGetNum.php",
    function(data, status){
    var data=$.parseJSON(data);    
    var row="";
    for(var i=0;i<data.length;i++){

        var numcomp = data[i].ComputerNumbers;
        var numprt = data[i].PrinterNumbers;
        var numoth = data[i].OthersNumbers;
        // 
        var numPO = data[i].InvPC;
        var numFR = data[i].InvFRPO;
        var numPJO = data[i].InvPJO;
        var numCondemn = data[i].InvCondemn;
        var numServiceable = data[i].InvIU;

        //

        var comstock = data[i].CompStock;
        var prtstock = data[i].PrintStock;
        var othstock = data[i].OthersStock;

        var sumPC = numcomp + comstock;
        var sumPRT = numprt + prtstock;
        var sumOTH = numoth + othstock;

        $("#TotalComputer").html(sumPC);
        $("#TotalPrinter").html(sumPRT);
        $("#TotalOthers").html(sumOTH);
        
        var sums = numFR + numPJO;

        $("#NumberOfComputer").html(numcomp);
        $("#NumberOfPrinter").html(numprt);
        $("#NumberOfOthers").html(numoth);

        $("#NumberIU").html(numServiceable);
        $("#NumberFRPO").html(sums);
        $("#NumberPC").html(numPO);
        $("#NumberCond").html(numCondemn);
    }
    });
}

$(document).ready(function() {


    $("#AddHDDdiv").hide();
    $('#adddesc').hide();

    $('#oth_tbl').hide();
    $('#prt_tbl').hide();
    $('#cmpt_tbl').hide();
    $("#searchwhere").attr('disabled','disabled');
    $("#searchdept").attr('disabled','disabled');
    $("#searcharchdept").attr('disabled','disabled');

    $('#oth_tblstat').hide();
    $('#prt_tblstat').hide();
    $('#cmpt_tblstat').hide();

    $('#oth_tblarch').hide();
    $('#prt_tblarch').hide();
    $('#cmpt_tblarch').hide();

    
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

        
    }
    });

    setInterval('reloader()',2000)
    

    $.post("../SuperAdmin/Resources/PHP/SupAdminGetNum.php",
    function(data, status){
    var data=$.parseJSON(data);    
    var row="";
    for(var i=0;i<data.length;i++){

        var numcomp = data[i].ComputerNumbers;
        var numprt = data[i].PrinterNumbers;
        var numoth = data[i].OthersNumbers;
        // 
        var numPO = data[i].InvPC;
        var numFR = data[i].InvFRPO;
        var numPJO = data[i].InvPJO;
        var numCondemn = data[i].InvCondemn;
        var numServiceable = data[i].InvIU;

        var sums = numFR + numPJO;

        var comstock = data[i].CompStock;
        var prtstock = data[i].PrintStock;
        var othstock = data[i].OthersStock;

        var sumPC = numcomp + comstock;
        var sumPRT = numprt + prtstock;
        var sumOTH = numoth + othstock;

        $("#TotalComputer").html(sumPC);
        $("#TotalPrinter").html(sumPRT);
        $("#TotalOthers").html(sumOTH);

        $("#NumberOfComputer").html(numcomp);
        $("#NumberOfPrinter").html(numprt);
        $("#NumberOfOthers").html(numoth);

        $("#NumberIU").html(numServiceable);
        $("#NumberFRPO").html(sums);
        $("#NumberPC").html(numPO);
        $("#NumberCond").html(numCondemn);
    }
    });

    //--------------------------------------------------------------------------------------------------------------------------------------------------------

    // AJAX for Displaying All Equipments Regardless of Department (START)

    $('#searchwhat').on('change', function() {
        $("#searchwhere").removeAttr('disabled');
        var selected = $(this).val();
        $('#searchwhere').val("--SELECT--");
        if(selected == "Computer"){
            var table_comp1 = $('#tbl_computers').DataTable();
            table_comp1.destroy();
            $.post("../SuperAdmin/Resources/PHP/SupAdminComputers.php",
            function(data, status){
            var data=$.parseJSON(data);    
            var row="";
            for(var i=0;i<data.length;i++){
        
        
                row=row+"<tr><td>"+data[i].InvUser+"</td><td>"+data[i].InvDept+"</td><td>"+data[i].ItemID+"</td><td>"
                +data[i].InvPropNo+"</td><td>"
                +data[i].InvSerial+"</td><td>"
                +data[i].InvDate+"</td><td class='comp_vew'><button id="+data[i].comp_ID+" class='View btn btn-outline-info mb-2' data-bs-toggle='modal' data-bs-target='#view'><i class='fa fa-eye link-dark'></i>&nbsp;</button>&nbsp;<button id="+data[i].comp_ID+" class='delete btn btn-outline-danger mb-2'><i class='bi bi-archive'></i>&nbsp;</button></td></tr>";
            }
            $('#comp_data').html(row);
            $(".comp_vew").find(".View").click(function () {
                var propID = this.id;
                var prop=JSON.stringify(
                    {"data":
                      {
                       "propID":propID,
                       "whattype":"computers"
                      }
                    }
                  );   


                $.post("../SuperAdmin/Resources/PHP/SupAdminViewEdit.php",prop,
                function(data, status){
                    var data=$.parseJSON(data); 
                    $('#desc').hide();
                    $('#sel_comp').show();
                    $('#ViewInvDept').val(data[0].InvDept);
                    $('#ViewInvUser').val(data[0].InvUser);
                    $('#ViewInvPropNo').val(data[0].InvPropNo);
                    $('#ViewInvSerial').val(data[0].InvSerial);
                    $('#ViewInvDate').val(data[0].InvDate);
                    $('#ViewInvID').val(data[0].InvID);
                    $("#ViewInvModel").val(data[0].InvModel);
                    $("#ViewInvBrand").val(data[0].InvBrand);
                    $('#ViewWhatType').val("Computer");
        

                    var storagechecker = data[1].CompStorageType;
                    if(storagechecker == "SSD"){
                        $('#SSDdiv').show();
                        $("#HDDdiv").hide();
                    }  
                    else if(storagechecker == "HDD"){
                        $('#HDDdiv').show();
                        $("#SSDdiv").hide();
                    }
                    else{
                        $('#SSDdiv').show();
                        $('#HDDdiv').show();
                    }

                    //Dedicated keys for Computer Selection
                    $("#ViewCompOS").val(data[1].CompOS);
                    $("#ViewComptype").val(data[1].CompType);
                    $("#ViewCompStorageType").val(data[1].CompStorageType);
                    $("#ViewSSDCap").val(data[1].CompSSD);
                    $("#ViewHDDCap").val(data[1].CompHDD);
                    $("#ViewCompRAM").val(data[1].CompRAM);
                    $("#ViewCompProcessor").val(data[1].CompProcessor);
                    $("#ViewOSLicense").val(data[1].OSLicense);

                }); 
            });
            $(".comp_vew").find(".delete").click(function () {
                var propID = this.id;
                var prop=JSON.stringify(
                    {"data":
                      {
                       "propID":propID,
                       "whattype":"computers"
                      }
                    }
                  );   
                if (confirm("Do you Want to Delete this record?")) {
                    $.post("../SuperAdmin/Resources/PHP/SupAdminDelete.php",prop,
                    function(data, status){
                        if(data == 1) 
                        { 
                            alert("SUCCESSFULLY DELETED!");
                            location.reload(true);
                        } 
                        else { 
                            alert("ERROR!");
        
                    }
                    }); 
                }
            });
            var table_comp = $('#tbl_computers').DataTable({

                "processing": true,
                "serverSide": false,
                "stateSave": true,
                "searching":true,
                "bDestroy": true,
                "scrollY":true,
                "scrollX":true,
                "lengthMenu": [ 15, 30, 50, 100 ]
            });
            });
            $('#oth_tbl').hide();
            $('#prt_tbl').hide();
            $('#cmpt_tbl').show();
        }  
        else if(selected == "Printer"){
            var table_print1 = $('#tbl_printers').DataTable();
            table_print1.destroy();
            $.post("../SuperAdmin/Resources/PHP/SupAdminPrinters.php",
            function(data, status){
            var data=$.parseJSON(data);    
            var row="";
            for(var i=0;i<data.length;i++){
        
        
                row=row+"<tr><td>"+data[i].InvUser+"</td><td>"+data[i].InvDept+"</td><td>"+data[i].ItemID+"</td><td>"
                +data[i].InvPropNo+"</td><td>"
                +data[i].InvSerial+"</td><td>"
                +data[i].InvDate+"</td><td class='comp_vew'><button id="+data[i].printer_ID+" class='View btn btn-outline-info mb-2' data-bs-toggle='modal' data-bs-target='#view'><i class='fa fa-eye link-dark'></i>&nbsp;</button>&nbsp;<button id="+data[i].printer_ID+" class='delete btn btn-outline-danger mb-2'><i class='bi bi-archive'></i>&nbsp;</button></td></tr>";
            }
            $('#prt_data').html(row);
            $(".comp_vew").find(".View").click(function () {
                var propID = this.id;
                var prop=JSON.stringify(
                    {"data":
                      {
                       "propID":propID,
                       "whattype":"printer"
                      }
                    }
                  );   
                $.post("../SuperAdmin/Resources/PHP/SupAdminViewEdit.php",prop,
                function(data, status){
                    var data=$.parseJSON(data); 
                    $('#desc').hide();
                    $('#sel_comp').hide();
                    $('#ViewInvDept').val(data[0].InvDept);
                    $('#ViewInvUser').val(data[0].InvUser);
                    $('#ViewInvPropNo').val(data[0].InvPropNo);
                    $('#ViewInvSerial').val(data[0].InvSerial);
                    $('#ViewInvDate').val(data[0].InvDate);
                    $('#ViewInvID').val(data[0].InvID);
                    $("#ViewInvModel").val(data[0].InvModel);
                    $("#ViewInvBrand").val(data[0].InvBrand);
                    $('#ViewWhatType').val("Printer");
                }); 
            });
            $(".comp_vew").find(".delete").click(function () {
                var propID = this.id;
                var prop=JSON.stringify(
                    {"data":
                      {
                       "propID":propID,
                       "whattype":"printer"
                      }
                    }
                  );   
                if (confirm("Do you Want to Delete this record?")) {
                    $.post("../SuperAdmin/Resources/PHP/SupAdminDelete.php",prop,
                    function(data, status){
                        if(data == 1) 
                        { 
                            alert("SUCCESSFULLY DELETED!");
                            location.reload(true);
                        } 
                        else { 
                            alert("ERROR!");
        
                    }
                    }); 
                }
            });
            var table_print = $('#tbl_printers').DataTable({
                "processing": true,
                "serverSide": false,
                "stateSave": true,
                "searching":true,
                "bDestroy": true,
                "scrollY":true,
                "scrollX":true,
            
                "lengthMenu": [ 15, 30, 50, 100 ]
            });
            });
            $('#oth_tbl').hide();
            $('#prt_tbl').show();
            $('#cmpt_tbl').hide();
        }
        else if(selected == "Others"){
            var table_others1 = $('#tbl_others').DataTable();
            table_others1.destroy();
            $.post("../SuperAdmin/Resources/PHP/SupAdminOthers.php",
            function(data, status){
            var data=$.parseJSON(data);    
            var row="";
            for(var i=0;i<data.length;i++){
        
        
                row=row+"<tr><td>"+data[i].InvUser+"</td><td>"+data[i].InvDept+"</td><td>"+data[i].ItemID+"</td><td>"
                +data[i].InvPropNo+"</td><td>"
                +data[i].InvSerial+"</td><td>"
                +data[i].InvDate+"</td><td class='comp_vew'><button id="+data[i].other_ID+" class='View btn btn-outline-info mb-2' data-bs-toggle='modal' data-bs-target='#view'><i class='fa fa-eye link-dark'></i>&nbsp;</button>&nbsp;<button id="+data[i].other_ID+" class='delete btn btn-outline-danger mb-2'><i class='bi bi-archive'></i>&nbsp;</button></td></tr>";
            }
            $('#etc_data').html(row);
            $(".comp_vew").find(".View").click(function () {
                var propID = this.id;
                var prop=JSON.stringify(
                    {"data":
                      {
                       "propID":propID,
                       "whattype":"other"
                      }
                    }
                  );   
                $.post("../SuperAdmin/Resources/PHP/SupAdminViewEdit.php",prop,
                function(data, status){
                    var data=$.parseJSON(data); 
                    $('#desc').show();
                    $('#sel_comp').hide();
                    $('#ViewInvDept').val(data[0].InvDept);
                    $('#ViewInvUser').val(data[0].InvUser);
                    $('#ViewInvPropNo').val(data[0].InvPropNo);
                    $('#ViewInvSerial').val(data[0].InvSerial);
                    $('#ViewInvDate').val(data[0].InvDate);
                    $('#ViewInvID').val(data[0].InvID);
                    $("#ViewInvModel").val(data[0].InvModel);
                    $("#ViewInvBrand").val(data[0].InvBrand);
                    $("#ViewInvDesc").val(data[0].InvDesc);
                    $('#ViewWhatType').val("Others");
                }); 
            });
            $(".comp_vew").find(".delete").click(function () {
                var propID = this.id;
                var prop=JSON.stringify(
                    {"data":
                      {
                       "propID":propID,
                       "whattype":"others"
                      }
                    }
                  );   
                if (confirm("Do you Want to Delete this record?")) {
                    $.post("../SuperAdmin/Resources/PHP/SupAdminDelete.php",prop,
                    function(data, status){
                        if(data == 1) 
                        { 
                            alert("SUCCESSFULLY DELETED!");
                            location.reload(true);
                        } 
                        else { 
                            alert("ERROR!");
        
                    }
                    }); 
                }
            });
            var table_others = $('#tbl_others').DataTable({
                "processing": true,
                "serverSide": false,
                "stateSave": true,
                "searching":true,
                "bDestroy": true,
                "scrollY":true,
                "scrollX":true,
                "lengthMenu": [ 15, 30, 50, 100 ]
            });
            });
            $('#oth_tbl').show();
            $('#prt_tbl').hide();
            $('#cmpt_tbl').hide();
        }
        else{
            location.reload(true);
        }
    });

    // AJAX for Displaying All Equipments per Department (START)

    $('#searchwhere').on('change', function() {
        var selected = $("#searchwhat").get(0).value;
        var dept = $(this).val();
        var json =JSON.stringify(
            {"data":
              {
               "dept":dept,
               "wt":selected
              }
            }
          );  
        if(selected == "Computer"){
            var table_comp1 = $('#tbl_computers').DataTable();
            table_comp1.destroy();
            $.post("../SuperAdmin/Resources/PHP/SupAdminDeptComputers.php",json,
            function(data, status){
            var data=$.parseJSON(data);    
            var row="";
            for(var i=0;i<data.length;i++){
        
        
                row=row+"<tr><td>"+data[i].InvUser+"</td><td>"+data[i].InvDept+"</td><td>"+data[i].ItemID+"</td><td>"
                +data[i].InvPropNo+"</td><td>"
                +data[i].InvSerial+"</td><td>"
                +data[i].InvDate+"</td><td class='comp_vew'><button id="+data[i].comp_ID+" class='View btn btn-outline-info mb-2' data-bs-toggle='modal' data-bs-target='#view'><i class='fa fa-eye link-dark'></i>&nbsp;</button>&nbsp;<button id="+data[i].comp_ID+" class='delete btn btn-outline-danger mb-2'><i class='bi bi-archive'></i>&nbsp;</button></td></tr>";
            }
            $('#comp_data').html(row);
            var table_comp2 = $('#tbl_computers').DataTable({
                "processing": true,
                "serverSide": false,
                "stateSave": true,
                "searching":true,
                "bDestroy": true,
                "scrollY":true,
                "scrollX":true
            });
            $(".comp_vew").find(".View").click(function () {
                var propID = this.id;
                var prop=JSON.stringify(
                    {"data":
                      {
                       "propID":propID,
                       "whattype":"computers"
                      }
                    }
                  );   
                $.post("../SuperAdmin/Resources/PHP/SupAdminViewEdit.php",prop,
                function(data, status){
                    var data=$.parseJSON(data); 
                    $('#desc').hide();
                    $('#sel_comp').show();
                    $('#ViewInvDept').val(data[0].InvDept);
                    $('#ViewInvUser').val(data[0].InvUser);
                    $('#ViewInvPropNo').val(data[0].InvPropNo);
                    $('#ViewInvSerial').val(data[0].InvSerial);
                    $('#ViewInvDate').val(data[0].InvDate);
                    $('#ViewInvID').val(data[0].InvID);
                    $("#ViewInvModel").val(data[0].InvModel);
                    $("#ViewInvBrand").val(data[0].InvBrand);
                    $('#ViewWhatType').val("Computer");
        

                    var storagechecker = data[1].CompStorageType;
                    if(storagechecker == "SSD"){
                        $('#SSDdiv').show();
                        $("#HDDdiv").hide();
                    }  
                    else if(storagechecker == "HDD"){
                        $('#HDDdiv').show();
                        $("#SSDdiv").hide();
                    }
                    else{
                        $('#SSDdiv').show();
                        $('#HDDdiv').show();
                    }

                    //Dedicated keys for Computer Selection
                    $("#ViewCompOS").val(data[1].CompOS);
                    $("#ViewComptype").val(data[1].CompType);
                    $("#ViewCompStorageType").val(data[1].CompStorageType);
                    $("#ViewSSDCap").val(data[1].CompSSD);
                    $("#ViewHDDCap").val(data[1].CompHDD);
                    $("#ViewCompRAM").val(data[1].CompRAM);
                    $("#ViewCompProcessor").val(data[1].CompProcessor);
                    $("#ViewOSLicense").val(data[1].OSLicense);

                }); 
            });
            $(".comp_vew").find(".delete").click(function () {
                var propID = this.id;
                var prop=JSON.stringify(
                    {"data":
                      {
                       "propID":propID,
                       "whattype":"computers"
                      }
                    }
                  );   
                if (confirm("Do you Want to Delete this record?")) {
                    $.post("../SuperAdmin/Resources/PHP/SupAdminDelete.php",prop,
                    function(data, status){
                        if(data == 1) 
                        { 
                            alert("SUCCESSFULLY DELETED!");
                            location.reload(true);
                        } 
                        else { 
                            alert("ERROR!");
        
                    }
                    }); 
                }
            });
            });
            $('#oth_tbl').hide();
            $('#prt_tbl').hide();
            $('#cmpt_tbl').show();
        }  
        else if(selected == "Printer"){
            var table_print1 = $('#tbl_printers').DataTable();
            table_print1.destroy();
            $.post("../SuperAdmin/Resources/PHP/SupAdminDeptPrinters.php",json,
            function(data, status){
            var data=$.parseJSON(data);    
            var row="";
            for(var i=0;i<data.length;i++){
        
        
                row=row+"<tr><td>"+data[i].InvUser+"</td><td>"+data[i].InvDept+"</td><td>"+data[i].ItemID+"</td><td>"
                +data[i].InvPropNo+"</td><td>"
                +data[i].InvSerial+"</td><td>"
                +data[i].InvDate+"</td><td class='comp_vew'><button id="+data[i].printer_ID+" class='View btn btn-outline-info mb-2' data-bs-toggle='modal' data-bs-target='#view'><i class='fa fa-eye link-dark'></i>&nbsp;</button>&nbsp;<button id="+data[i].printer_ID+" class='delete btn btn-outline-danger mb-2'><i class='bi bi-archive'></i>&nbsp;</button></td></tr>";
            }
            $('#prt_data').html(row);
            $(".comp_vew").find(".View").click(function () {
                var propID = this.id;
                var prop=JSON.stringify(
                    {"data":
                      {
                       "propID":propID,
                       "whattype":"printer"
                      }
                    }
                  );   
                $.post("../SuperAdmin/Resources/PHP/SupAdminViewEdit.php",prop,
                function(data, status){
                    var data=$.parseJSON(data); 
                    $('#desc').hide();
                    $('#sel_comp').hide();
                    $('#ViewInvDept').val(data[0].InvDept);
                    $('#ViewInvUser').val(data[0].InvUser);
                    $('#ViewInvPropNo').val(data[0].InvPropNo);
                    $('#ViewInvSerial').val(data[0].InvSerial);
                    $('#ViewInvDate').val(data[0].InvDate);
                    $('#ViewInvID').val(data[0].InvID);
                    $("#ViewInvModel").val(data[0].InvModel);
                    $("#ViewInvBrand").val(data[0].InvBrand);
                    $('#ViewWhatType').val("Printer");
                }); 
            });
            $(".comp_vew").find(".delete").click(function () {
                var propID = this.id;
                var prop=JSON.stringify(
                    {"data":
                      {
                       "propID":propID,
                       "whattype":"printer"
                      }
                    }
                  );   
                if (confirm("Do you Want to Delete this record?")) {
                    $.post("../SuperAdmin/Resources/PHP/SupAdminDelete.php",prop,
                    function(data, status){
                        if(data == 1) 
                        { 
                            alert("SUCCESSFULLY DELETED!");
                            location.reload(true);
                        } 
                        else { 
                            alert("ERROR!");
        
                    }
                    }); 
                }
            });
            var table_print2 = $('#tbl_printers').DataTable({
                "processing": true,
                "serverSide": false,
                "stateSave": true,
                "searching":true,
                "bDestroy": true,
                "scrollY":true,
                "scrollX":true
            });
            });
            $('#oth_tbl').hide();
            $('#prt_tbl').show();
            $('#cmpt_tbl').hide();
        }
        else if(selected == "Others"){
            var table_others1 = $('#tbl_others').DataTable();
            table_others1.destroy();
            $.post("../SuperAdmin/Resources/PHP/SupAdminDeptOthers.php",json,
            function(data, status){
            var data=$.parseJSON(data);    
            var row="";
            for(var i=0;i<data.length;i++){
        
        
                row=row+"<tr><td>"+data[i].InvUser+"</td><td>"+data[i].InvDept+"</td><td>"+data[i].ItemID+"</td><td>"
                +data[i].InvPropNo+"</td><td>"
                +data[i].InvSerial+"</td><td>"
                +data[i].InvDate+"</td><td class='comp_vew'><button id="+data[i].other_ID+" class='View btn btn-outline-info mb-2' data-bs-toggle='modal' data-bs-target='#view'><i class='fa fa-eye link-dark'></i>&nbsp;</button>&nbsp;<button id="+data[i].other_ID+" class='delete btn btn-outline-danger mb-2'><i class='bi bi-archive link-dark'></i>&nbsp;</button></td></tr>";
            }
            $('#etc_data').html(row);
            $(".comp_vew").find(".View").click(function () {
                var propID = this.id;
                var prop=JSON.stringify(
                    {"data":
                      {
                       "propID":propID,
                       "whattype":"other"
                      }
                    }
                  );   
                $.post("../SuperAdmin/Resources/PHP/SupAdminViewEdit.php",prop,
                function(data, status){
                    var data=$.parseJSON(data); 
                    $('#desc').show();
                    $('#sel_comp').hide();
                    $('#ViewInvDept').val(data[0].InvDept);
                    $('#ViewInvUser').val(data[0].InvUser);
                    $('#ViewInvPropNo').val(data[0].InvPropNo);
                    $('#ViewInvSerial').val(data[0].InvSerial);
                    $('#ViewInvDate').val(data[0].InvDate);
                    $('#ViewInvID').val(data[0].InvID);
                    $("#ViewInvModel").val(data[0].InvModel);
                    $("#ViewInvBrand").val(data[0].InvBrand);
                    $("#ViewInvDesc").val(data[0].InvDesc);
                    $('#ViewWhatType').val("Others");
                }); 
            });
            $(".comp_vew").find(".delete").click(function () {
                var propID = this.id;
                var prop=JSON.stringify(
                    {"data":
                      {
                       "propID":propID,
                       "whattype":"others"
                      }
                    }
                  );   
                if (confirm("Do you Want to Delete this record?")) {
                    $.post("../SuperAdmin/Resources/PHP/SupAdminDelete.php",prop,
                    function(data, status){
                        if(data == 1) 
                        { 
                            alert("SUCCESSFULLY DELETED!");
                            location.reload(true);
                        } 
                        else { 
                            alert("ERROR!");
        
                    }
                    }); 
                }
            });
            var table_others2 = $('#tbl_others').DataTable({
                "processing": true,
                "serverSide": false,
                "stateSave": true,
                "searching":true,
                "bDestroy": true,
                "scrollY":true,
                "scrollX":true
            });
            });
            $('#oth_tbl').show();
            $('#prt_tbl').hide();
            $('#cmpt_tbl').hide();
        }
        else{
            location.reload(true);
        }
    });

    // END

    //

    //JS for showing textboxes of HDD/SSD Capacity (START)

    $('#CompStorageType').on('change', function() {
        var selected = $(this).val();
        if(selected == "SSD"){
            $('#AddSSDdiv').show();
            $("#AddHDDdiv").hide();
        }  
        else if(selected == "HDD"){
            $('#AddHDDdiv').show();
            $("#AddSSDdiv").hide();
        }
        else{
            $('#AddSSDdiv').show();
            $('#AddHDDdiv').show();
        }
    });



    $.post("../SuperAdmin/Resources/PHP/viewdepts.php",
    function(data, status){
        var data=$.parseJSON(data);    
        var row="";
        for(var i=0;i<data.length;i++){

            var id = data[i].dept_name;
            let name = data[i].dept_name;

            $("#searchwhere").append("<option value='"+id+"'>"+name+"</option>");
            $("#InvDept").append("<option value='"+id+"'>"+name+"</option>");
            $("#DRPDepartment").append("<option value='"+id+"'>"+name+"</option>");
            $("#UserDepartment").append("<option value='"+id+"'>"+name+"</option>");
            $("#searchdept").append("<option value='"+id+"'>"+name+"</option>");
            $("#searcharchdept").append("<option value='"+id+"'>"+name+"</option>");
            $("#scheduleDepartment").append("<option value='"+id+"'>"+name+"</option>");
            $("#JO_DEPT").append("<option value='"+id+"'>"+name+"</option>");
        }
    });

    //END

    $("#savepm").on('click', function () {
        var sched_date=$("#scheduledate").get(0).value;
        var sched_dept=$("#scheduleDepartment").get(0).value;
        if(sched_date!="")
        {
            
            $.post("../SuperAdmin/Resources/PHP/schedPM.php",
            JSON.stringify({
                sched_date : sched_date,
                sched_dept: sched_dept
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
        }
        else
        {
            alert("FILL ALL REQUIRED FIELDS")
        }
    });

   

        $.post("../SuperAdmin/Resources/PHP/SupAdminSeePM.php",
        function(data, status){
        var data=$.parseJSON(data);    
        var row="";
        for(var i=0;i<data.length;i++){
    
            var check = data[i].Schedule;
            if (check == "Unscheduled"){
                $('#Unscheduled').append("<div class='col-4 mb-2'><span style='font-weight:500;'>"+data[i].Department+"</span></div>");
            }
    
            var hehe = new Date(data[i].Schedule);
            
    
            var months = [
                'January',
                'February',
                'March',
                'April',
                'May',
                'June',
                'July',
                'August',
                'September',
                'October',
                'November',
                'December'
                ];
    
                let name = months[hehe.getMonth()];
                  
                
                for(var j = 0; j<months.length; j++){
                    if(name == months[j]){
                            var id = '#' + months[j];
                            $(id).append("<div class='col-4 mb-2' ><span style='font-weight:1000;'>"+data[i].Department+": </span><span></br>"+data[i].Schedule+"</span></div>");
                    }
                }
        }
        });
    


    //

    $("#WhatType").on('change', function() {
        var selected = $(this).val();
        console.log(selected);
        if(selected == 'Others'){
            $('#adddesc').show();
        }  
        else{
            $('#adddesc').hide();
        }
        if(selected == 'Computer'){
            $('#addsel_comp').show();
        }
        else{
            $('#addsel_comp').hide();
        }
    });

    $("#save_dept").on('click', function () {
        var dept_name=$("#dept_name").get(0).value;
        if(dept_name!="")
        {
            
            $.post("../SuperAdmin/Resources/PHP/adddept.php",
            JSON.stringify({
                dept_name : dept_name
            }),
            function(data,status){
                if(data == 1) 
                { 
                    alert("SUCCESSFULLY ADDED!");
                    location.reload(true);
                } 
                else if(data == 2) 
                { 
                    alert("Department Already Added");
                    $("#dept_name").val("");
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

    // Saving Inventory

    $("#save_inv").on('click', function () {
        var WhatType = $("#WhatType").get(0).value;
        var InvDept=$("#InvDept").get(0).value;
        var InvUser=$("#InvUser").get(0).value;
        var InvPropNo=$("#InvPropNo").get(0).value;
        var InvSerial=$("#InvSerial").get(0).value;
        var InvDate=$("#InvDate").get(0).value;
        var InvModel=$("#InvModel").get(0).value;
        var InvBrand=$("#InvBrand").get(0).value;
        var InvDesc=$("#InvDesc").get(0).value;

        //Dedicated keys for Computer Selection
        var CompOS = $("#CompOS").get(0).value;
        var Comptype = $("#Comptype").get(0).value;
        var CompStorageType = $("#CompStorageType").get(0).value;
        var SSDCap = $("#SSDCap").get(0).value;
        var HDDCap = $("#HDDCap").get(0).value;
        var CompRAM = $("#CompRAM").get(0).value;
        var CompProcessor = $("#CompProcessor").get(0).value;
        var OSLicense = $("#OSLicense").get(0).value;


        if(WhatType != "--SELECT--" && InvDept!="" && InvUser!="" && InvModel!="" && InvBrand!="")
        {
            
            if(WhatType == "Computer")
            {
                if(CompOS != "" && Comptype!="--SELECT--" && CompStorageType!="--SELECT--" && CompRAM!="" && CompProcessor!="" && OSLicense!="" ){
                    $.post("../SuperAdmin/Resources/PHP/addinventory.php",
                    JSON.stringify({
                        WhatType : WhatType,
                        InvDept:InvDept,
                        InvUser:InvUser,
                        InvPropNo:InvPropNo,
                        InvSerial:InvSerial,
                        InvDate:InvDate,
                        InvModel:InvModel,
                        InvBrand:InvBrand,
                        InvDesc:InvDesc,
                
                        //Dedicated keys for Computer Selection
                        CompOS : CompOS,
                        Comptype : Comptype,
                        CompStorageType : CompStorageType,
                        SSDCap : SSDCap,
                        HDDCap : HDDCap,
                        CompRAM : CompRAM,
                        CompProcessor : CompProcessor,
                        OSLicense : OSLicense
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
                }
                else{
                    alert("Fill out all Fields")
                }
            }
            else if(WhatType == "Printer")
            {
                $.post("../SuperAdmin/Resources/PHP/addinventory.php",
                JSON.stringify({
                    WhatType : WhatType,
                    InvDept:InvDept,
                    InvUser:InvUser,
                    InvPropNo:InvPropNo,
                    InvSerial:InvSerial,
                    InvDate:InvDate,
                    InvModel:InvModel,
                    InvBrand:InvBrand,
                    InvDesc:InvDesc,
            
                    //Dedicated keys for Computer Selection
                    CompOS : CompOS,
                    Comptype : Comptype,
                    CompStorageType : CompStorageType,
                    SSDCap : SSDCap,
                    HDDCap : HDDCap,
                    CompRAM : CompRAM,
                    CompProcessor : CompProcessor,
                    OSLicense : OSLicense
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
            }
            else
            {
                if(InvDesc != "")
                {
                    $.post("../SuperAdmin/Resources/PHP/addinventory.php",
                    JSON.stringify({
                        WhatType : WhatType,
                        InvDept:InvDept,
                        InvUser:InvUser,
                        InvPropNo:InvPropNo,
                        InvSerial:InvSerial,
                        InvDate:InvDate,
                        InvModel:InvModel,
                        InvBrand:InvBrand,
                        InvDesc:InvDesc,
                
                        //Dedicated keys for Computer Selection
                        CompOS : CompOS,
                        Comptype : Comptype,
                        CompStorageType : CompStorageType,
                        SSDCap : SSDCap,
                        HDDCap : HDDCap,
                        CompRAM : CompRAM,
                        CompProcessor : CompProcessor,
                        OSLicense : OSLicense
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
                }
                else
                {
                    alert("Fill out all Fields");
                }
            }
        }
        else
        {
            alert("FILL ALL REQUIRED FIELDS")
        }
    });
    // END

    $('#AddPassword, #ConfirmAddPassword').on('keyup', function () 
    {
        $('#save_user').prop('disabled',true);

        var AddPassword=$("#AddPassword").get(0).value;
        var ConfirmAddPassword=$("#ConfirmAddPassword").get(0).value;

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




    $("#save_user").on('click', function () {
        var AddUsername = $("#AddUsername").get(0).value;
        var AddFullName = $("#AddFullName").get(0).value;
        var AddPassword=$("#AddPassword").get(0).value;
        var ConfirmAddPassword=$("#ConfirmAddPassword").get(0).value;
        var UserDepartment=$("#UserDepartment").get(0).value;
        var AddUserLevel=$("#AddUserLevel").get(0).value;



        if(AddUsername!="" && AddFullName!="" && AddPassword!="" && ConfirmAddPassword!="" && UserDepartment!="--SELECT--" && AddUserLevel   !="--SELECT--")
        {
            
            $.post("../SuperAdmin/Resources/PHP/SupAdminAddUser.php",
            JSON.stringify({
                AddUsername :AddUsername,
                AddPassword:AddPassword,
                UserDepartment:UserDepartment,
                AddUserLevel:AddUserLevel,
                AddFullName:AddFullName
        
            }),
            function(data,status){
                if(data == 1) 
                { 
                    alert("User Successfully Added!");
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

    

    //VIEW REMARKS JS (REGARDLESS OF DEPT)

    $('#searchtype').on('change', function() {
        $("#searchdept").removeAttr('disabled');
        var selected = $(this).val();
        $('#searchdept').val("--SELECT--");
        if(selected == "Computer"){
            var table_comp1 = $('#tblstat_computers').DataTable();
            table_comp1.destroy();
            $.post("../SuperAdmin/Resources/PHP/SupAdminComputers.php",
            function(data, status){
            var data=$.parseJSON(data);    
            var row="";
            for(var i=0;i<data.length;i++){

                var status = data[i].InvStatus;

                if (status == "In Use")
                {
                    row=row+"<tr><td>"+data[i].ItemID+"</td><td>"+data[i].InvPropNo+"</td><td>"
                    +data[i].InvSerial+"</td><td><span class ='badge rounded-pill bg-success'>"
                    +data[i].InvStatus+"</span></td><td>"+data[i].Reason+"</td><td class='comp_vew'><button id="+data[i].comp_ID+" class='View btn btn-outline-info mb-2' data-bs-toggle='modal' data-bs-target='#editStatus'><i class='bi bi-pencil-square link-dark'></i>&nbsp;</button></td></tr>";
                }
                else if(status == "Condemned")
                {
                    row=row+"<tr><td>"+data[i].ItemID+"</td><td>"+data[i].InvPropNo+"</td><td>"
                    +data[i].InvSerial+"</td><td><span class ='badge rounded-pill bg-danger'>"
                    +data[i].InvStatus+"</span></td><td>"+data[i].Reason+"</td><td class='comp_vew'><button id="+data[i].comp_ID+" class='View btn btn-outline-info mb-2' data-bs-toggle='modal' data-bs-target='#editStatus'><i class='bi bi-pencil-square link-dark'></i>&nbsp;</button></td></tr>";
                }
                else if (status == "For Repair/Pulled out")
                {
                    row=row+"<tr><td>"+data[i].ItemID+"</td><td>"+data[i].InvPropNo+"</td><td>"
                    +data[i].InvSerial+"</td><td><span class ='badge rounded-pill bg-warning text-dark'>"
                    +data[i].InvStatus+"</span></td><td>"+data[i].Reason+"</td><td class='comp_vew'><button id="+data[i].comp_ID+" class='View btn btn-outline-info mb-2' data-bs-toggle='modal' data-bs-target='#editStatus'><i class='bi bi-pencil-square link-dark'></i>&nbsp;</button></td></tr>";
                }
                else
                {
                    row=row+"<tr><td>"+data[i].ItemID+"</td><td>"+data[i].InvPropNo+"</td><td>"
                    +data[i].InvSerial+"</td><td><span class ='badge rounded-pill bg-info text-dark'>"
                    +data[i].InvStatus+"</span></td><td>"+data[i].Reason+"</td><td class='comp_vew'><button id="+data[i].comp_ID+" class='View btn btn-outline-info mb-2' data-bs-toggle='modal' data-bs-target='#editStatus'><i class='bi bi-pencil-square link-dark'></i>&nbsp;</button></td></tr>";
                }
                

            }
            $('#comp_datastat').html(row);
            $(".comp_vew").find(".View").click(function () {
                var stockID = this.id;
                $("#statusID").val(stockID);
                $("#statusTYPEs").val("Computer");
            });
            var table_comp = $('#tblstat_computers').DataTable({

            });
            });
            $('#oth_tblstat').hide();
            $('#prt_tblstat').hide();
            $('#cmpt_tblstat').show();
        }  
        else if(selected == "Printer"){      
            var table_print1 = $('#tbl_printersstat').DataTable();
            table_print1.destroy();
            $.post("../SuperAdmin/Resources/PHP/SupAdminPrinters.php",
            function(data, status){
            var data=$.parseJSON(data);    
            var row="";
            for(var i=0;i<data.length;i++){
        
                var status = data[i].InvStatus;
        
                if (status == "In Use")
                {
                    row=row+"<tr><td>"+data[i].ItemID+"</td><td>"+data[i].InvPropNo+"</td><td>"
                    +data[i].InvSerial+"</td><td><span class ='badge rounded-pill bg-success'>"
                    +data[i].InvStatus+"</span></td><td>"+data[i].Reason+"</td><td class='comp_vew'><button id="+data[i].printer_ID+" class='View btn btn-outline-info mb-2' data-bs-toggle='modal' data-bs-target='#editStatus'><i class='bi bi-pencil-square link-dark'></i>&nbsp;</button></td></tr>";
                }
                else if(status == "Condemned")
                {
                    row=row+"<tr><td>"+data[i].ItemID+"</td><td>"+data[i].InvPropNo+"</td><td>"
                    +data[i].InvSerial+"</td><td><span class ='badge rounded-pill bg-danger'>"
                    +data[i].InvStatus+"</span></td><td>"+data[i].Reason+"</td><td class='comp_vew'><button id="+data[i].printer_ID+" class='View btn btn-outline-info mb-2' data-bs-toggle='modal' data-bs-target='#editStatus'><i class='bi bi-pencil-square link-dark'></i>&nbsp;</button></td></tr>";
                }
                else if (status == "For Repair/Pulled out")
                {
                    row=row+"<tr><td>"+data[i].ItemID+"</td><td>"+data[i].InvPropNo+"</td><td>"
                    +data[i].InvSerial+"</td><td><span class ='badge rounded-pill bg-warning text-dark'>"
                    +data[i].InvStatus+"</span></td><td>"+data[i].Reason+"</td><td class='comp_vew'><button id="+data[i].printer_ID+" class='View btn btn-outline-info mb-2' data-bs-toggle='modal' data-bs-target='#editStatus'><i class='bi bi-pencil-square link-dark'></i>&nbsp;</button></td></tr>";
                }
                else
                {
                    row=row+"<tr><td>"+data[i].ItemID+"</td><td>"+data[i].InvPropNo+"</td><td>"
                    +data[i].InvSerial+"</td><td><span class ='badge rounded-pill bg-info text-dark'>"
                    +data[i].InvStatus+"</span></td><td>"+data[i].Reason+"</td><td class='comp_vew'><button id="+data[i].printer_ID+" class='View btn btn-outline-info mb-2' data-bs-toggle='modal' data-bs-target='#editStatus'><i class='bi bi-pencil-square link-dark'></i>&nbsp;</button></td></tr>";
                }
            }
            $('#prt_datastat').html(row);
            $(".comp_vew").find(".View").click(function () {
                var stockID = this.id;
                $("#statusID").val(stockID);
                $("#statusTYPEs").val("Printer");    
            });
            var table_print = $('#tbl_printersstat').DataTable({
                "processing": true,
                "serverSide": false,
                "stateSave": true,
                "searching":true,
                "bDestroy": true,
                "scrollY":true,
                "scrollX" :true,
                "lengthMenu": [ 20, 40, 60, 80, 100 ]
            });
            });
            $('#oth_tblstat').hide();
            $('#prt_tblstat').show();
            $('#cmpt_tblstat').hide();
        }
        else if(selected == "Others"){
            var table_others1 = $('#tbl_othersstat').DataTable();
            table_others1.destroy();
            $.post("../SuperAdmin/Resources/PHP/SupAdminOthers.php",
            function(data, status){
            var data=$.parseJSON(data);    
            var row="";
            for(var i=0;i<data.length;i++){
        
                var status = data[i].InvStatus;

                if (status == "In Use")
                {
                    row=row+"<tr><td>"+data[i].ItemID+"</td><td>"+data[i].InvPropNo+"</td><td>"
                    +data[i].InvSerial+"</td><td><span class ='badge rounded-pill bg-success'>"
                    +data[i].InvStatus+"</span></td><td>"+data[i].Reason+"</td><td class='comp_vew'><button id="+data[i].other_ID+" class='View btn btn-outline-info mb-2' data-bs-toggle='modal' data-bs-target='#editStatus'><i class='bi bi-pencil-square link-dark'></i>&nbsp;</button></td></tr>";
                }
                else if(status == "Condemned")
                {
                    row=row+"<tr><td>"+data[i].ItemID+"</td><td>"+data[i].InvPropNo+"</td><td>"
                    +data[i].InvSerial+"</td><td><span class ='badge rounded-pill bg-danger'>"
                    +data[i].InvStatus+"</span></td><td>"+data[i].Reason+"</td><td class='comp_vew'><button id="+data[i].other_ID+" class='View btn btn-outline-info mb-2' data-bs-toggle='modal' data-bs-target='#editStatus'><i class='bi bi-pencil-square link-dark'></i>&nbsp;</button></td></tr>";
                }
                else if (status == "For Repair/Pulled out")
                {
                    row=row+"<tr><td>"+data[i].ItemID+"</td><td>"+data[i].InvPropNo+"</td><td>"
                    +data[i].InvSerial+"</td><td><span class ='badge rounded-pill bg-warning text-dark'>"
                    +data[i].InvStatus+"</span></td><td>"+data[i].Reason+"</td><td class='comp_vew'><button id="+data[i].other_ID+" class='View btn btn-outline-info mb-2' data-bs-toggle='modal' data-bs-target='#editStatus'><i class='bi bi-pencil-square link-dark'></i>&nbsp;</button></td></tr>";
                }
                else
                {
                    row=row+"<tr><td>"+data[i].ItemID+"</td><td>"+data[i].InvPropNo+"</td><td>"
                    +data[i].InvSerial+"</td><td><span class ='badge rounded-pill bg-info text-dark'>"
                    +data[i].InvStatus+"</span></td><td>"+data[i].Reason+"</td><td class='comp_vew'><button id="+data[i].other_ID+" class='View btn btn-outline-info mb-2' data-bs-toggle='modal' data-bs-target='#editStatus'><i class='bi bi-pencil-square link-dark'></i>&nbsp;</button></td></tr>";
                }
            }
            $('#etc_datastat').html(row);
            $(".comp_vew").find(".View").click(function () {
                var stockID = this.id;
                $("#statusID").val(stockID);
                $("#statusTYPEs").val("Other");
            });
            var table_others = $('#tbl_othersstat').DataTable({
                "processing": true,
                "serverSide": false,
                "stateSave": true,
                "searching":true,
                "bDestroy": true,
                "scrollY":true,
                "scrollX":true,
                "lengthMenu": [ 20, 40, 60, 80, 100 ]
            });
            });
            $('#oth_tblstat').show();
            $('#prt_tblstat').hide();
            $('#cmpt_tblstat').hide();
        }
        else{
            location.reload(true);
        }
    });


        // AJAX for Remarks per Department (START)

        $('#searchdept').on('change', function() {
            var selected = $("#searchtype").get(0).value;
            var dept = $(this).val();
            var json =JSON.stringify(
                {"data":
                  {
                   "dept":dept,
                   "wt":selected
                  }
                }
              );  
            if(selected == "Computer"){
                var table_comp1 = $('#tblstat_computers').DataTable();
                table_comp1.destroy();
                $.post("../SuperAdmin/Resources/PHP/SupAdminDeptComputers.php",json,
                function(data, status){
                var data=$.parseJSON(data);    
                var row="";
                for(var i=0;i<data.length;i++){
            
                    var status = data[i].InvStatus;
            
                    if (status == "In Use")
                    {
                        row=row+"<tr><td>"+data[i].ItemID+"</td><td>"+data[i].InvPropNo+"</td><td>"
                        +data[i].InvSerial+"</td><td><span class ='badge rounded-pill bg-success'>"
                        +data[i].InvStatus+"</span></td><td>"+data[i].Reason+"</td><td class='comp_vew'><button id="+data[i].comp_ID+" class='View btn btn-outline-info mb-2' data-bs-toggle='modal' data-bs-target='#editStatus'><i class='bi bi-pencil-square link-dark'></i>&nbsp;</button></td></tr>";
                    }
                    else if(status == "Condemned")
                    {
                        row=row+"<tr><td>"+data[i].ItemID+"</td><td>"+data[i].InvPropNo+"</td><td>"
                        +data[i].InvSerial+"</td><td><span class ='badge rounded-pill bg-danger'>"
                        +data[i].InvStatus+"</span></td><td>"+data[i].Reason+"</td><td class='comp_vew'><button id="+data[i].comp_ID+" class='View btn btn-outline-info mb-2' data-bs-toggle='modal' data-bs-target='#editStatus'><i class='bi bi-pencil-square link-dark'></i>&nbsp;</button></td></tr>";
                    }
                    else if (status == "For Repair/Pulled out")
                    {
                        row=row+"<tr><td>"+data[i].ItemID+"</td><td>"+data[i].InvPropNo+"</td><td>"
                        +data[i].InvSerial+"</td><td><span class ='badge rounded-pill bg-warning text-dark'>"
                        +data[i].InvStatus+"</span></td><td>"+data[i].Reason+"</td><td class='comp_vew'><button id="+data[i].comp_ID+" class='View btn btn-outline-info mb-2' data-bs-toggle='modal' data-bs-target='#editStatus'><i class='bi bi-pencil-square link-dark'></i>&nbsp;</button></td></tr>";
                    }
                    else
                    {
                        row=row+"<tr><td>"+data[i].ItemID+"</td><td>"+data[i].InvPropNo+"</td><td>"
                        +data[i].InvSerial+"</td><td><span class ='badge rounded-pill bg-info text-dark'>"
                        +data[i].InvStatus+"</span></td><td>"+data[i].Reason+"</td><td class='comp_vew'><button id="+data[i].comp_ID+" class='View btn btn-outline-info mb-2' data-bs-toggle='modal' data-bs-target='#editStatus'><i class='bi bi-pencil-square link-dark'></i>&nbsp;</button></td></tr>";
                    }

                }
                $('#comp_datastat').html(row);
                var table_comp2 = $('#tblstat_computers').DataTable({
                    "processing": true,
                    "serverSide": false,
                    "stateSave": true,
                    "searching":true,
                    "bDestroy": true,
                    "scrollY":true,
                    "scrollX":true
                });
                $(".comp_vew").find(".View").click(function () {
                    var stockID = this.id;
                    $("#statusID").val(stockID);
                    $("#statusTYPEs").val("Computer");
                }); 
                });
                $('#oth_tblstat').hide();
                $('#prt_tblstat').hide();
                $('#cmpt_tblstat').show();
            }  
            else if(selected == "Printer"){
                var table_print1 = $('#tbl_printersstat').DataTable();
                table_print1.destroy();
                $.post("../SuperAdmin/Resources/PHP/SupAdminDeptPrinters.php",json,
                function(data, status){
                var data=$.parseJSON(data);    
                var row="";
                for(var i=0;i<data.length;i++){

                    var status = data[i].InvStatus;
            
                if (status == "In Use")
                {
                    row=row+"<tr><td>"+data[i].ItemID+"</td><td>"+data[i].InvPropNo+"</td><td>"
                    +data[i].InvSerial+"</td><td><span class ='badge rounded-pill bg-success'>"
                    +data[i].InvStatus+"</span></td><td>"+data[i].Reason+"</td><td class='comp_vew'><button id="+data[i].printer_ID+" class='View btn btn-outline-info mb-2' data-bs-toggle='modal' data-bs-target='#editStatus'><i class='bi bi-pencil-square link-dark'></i>&nbsp;</button></td></tr>";
                }
                else if(status == "Condemned")
                {
                    row=row+"<tr><td>"+data[i].ItemID+"</td><td>"+data[i].InvPropNo+"</td><td>"
                    +data[i].InvSerial+"</td><td><span class ='badge rounded-pill bg-danger'>"
                    +data[i].InvStatus+"</span></td><td>"+data[i].Reason+"</td><td class='comp_vew'><button id="+data[i].printer_ID+" class='View btn btn-outline-info mb-2' data-bs-toggle='modal' data-bs-target='#editStatus'><i class='bi bi-pencil-square link-dark'></i>&nbsp;</button></td></tr>";
                }
                else if (status == "For Repair/Pulled out")
                {
                    row=row+"<tr><td>"+data[i].ItemID+"</td><td>"+data[i].InvPropNo+"</td><td>"
                    +data[i].InvSerial+"</td><td><span class ='badge rounded-pill bg-warning text-dark'>"
                    +data[i].InvStatus+"</span></td><td>"+data[i].Reason+"</td><td class='comp_vew'><button id="+data[i].printer_ID+" class='View btn btn-outline-info mb-2' data-bs-toggle='modal' data-bs-target='#editStatus'><i class='bi bi-pencil-square link-dark'></i>&nbsp;</button></td></tr>";
                }
                else
                {
                    row=row+"<tr><td>"+data[i].ItemID+"</td><td>"+data[i].InvPropNo+"</td><td>"
                    +data[i].InvSerial+"</td><td><span class ='badge rounded-pill bg-info text-dark'>"
                    +data[i].InvStatus+"</span></td><td>"+data[i].Reason+"</td><td class='comp_vew'><button id="+data[i].printer_ID+" class='View btn btn-outline-info mb-2' data-bs-toggle='modal' data-bs-target='#editStatus'><i class='bi bi-pencil-square link-dark'></i>&nbsp;</button></td></tr>";
                }
                    
                    
                }
                $('#prt_datastat').html(row);
                $(".comp_vew").find(".View").click(function () {
                    var stockID = this.id;
                    $("#statusID").val(stockID);
                    $("#statusTYPEs").val("Printer");
                });
                var table_print2 = $('#tbl_printers').DataTable({
                    "processing": true,
                    "serverSide": false,
                    "stateSave": true,
                    "searching":true,
                    "bDestroy": true,
                    "scrollY":true,
                    "scrollX":true
                });
                });
                $('#oth_tblstat').hide();
                $('#prt_tblstat').show();
                $('#cmpt_tblstat').hide();
            }
            else if(selected == "Others"){
                var table_others1 = $('#tbl_othersstat').DataTable();
                table_others1.destroy();
                $.post("../SuperAdmin/Resources/PHP/SupAdminDeptOthers.php",json,
                function(data, status){
                var data=$.parseJSON(data);    
                var row="";
                for(var i=0;i<data.length;i++){

                    var status = data[i].InvStatus;
            
            
                    if (status == "In Use")
                    {
                        row=row+"<tr><td>"+data[i].ItemID+"</td><td>"+data[i].InvPropNo+"</td><td>"
                        +data[i].InvSerial+"</td><td><span class ='badge rounded-pill bg-success'>"
                        +data[i].InvStatus+"</span></td><td>"+data[i].Reason+"</td><td class='comp_vew'><button id="+data[i].other_ID+" class='View btn btn-outline-info mb-2' data-bs-toggle='modal' data-bs-target='#editStatus'><i class='bi bi-pencil-square link-dark'></i>&nbsp;</button></td></tr>";
                    }
                    else if(status == "Condemned")
                    {
                        row=row+"<tr><td>"+data[i].ItemID+"</td><td>"+data[i].InvPropNo+"</td><td>"
                        +data[i].InvSerial+"</td><td><span class ='badge rounded-pill bg-danger'>"
                        +data[i].InvStatus+"</span></td><td>"+data[i].Reason+"</td><td class='comp_vew'><button id="+data[i].other_ID+" class='View btn btn-outline-info mb-2' data-bs-toggle='modal' data-bs-target='#editStatus'><i class='bi bi-pencil-square link-dark'></i>&nbsp;</button></td></tr>";
                    }
                    else if (status == "For Repair/Pulled out")
                    {
                        row=row+"<tr><td>"+data[i].ItemID+"</td><td>"+data[i].InvPropNo+"</td><td>"
                        +data[i].InvSerial+"</td><td><span class ='badge rounded-pill bg-warning text-dark'>"
                        +data[i].InvStatus+"</span></td><td>"+data[i].Reason+"</td><td class='comp_vew'><button id="+data[i].other_ID+" class='View btn btn-outline-info mb-2' data-bs-toggle='modal' data-bs-target='#editStatus'><i class='bi bi-pencil-square link-dark'></i>&nbsp;</button></td></tr>";
                    }
                    else
                    {
                        row=row+"<tr><td>"+data[i].ItemID+"</td><td>"+data[i].InvPropNo+"</td><td>"
                        +data[i].InvSerial+"</td><td><span class ='badge rounded-pill bg-info text-dark'>"
                        +data[i].InvStatus+"</span></td><td>"+data[i].Reason+"</td><td class='comp_vew'><button id="+data[i].other_ID+" class='View btn btn-outline-info mb-2' data-bs-toggle='modal' data-bs-target='#editStatus'><i class='bi bi-pencil-square link-dark'></i>&nbsp;</button></td></tr>";
                    }

                }
                $('#etc_datastat').html(row);
                $(".comp_vew").find(".View").click(function () {
                    var stockID = this.id;
                    $("#statusID").val(stockID);
                    $("#statusTYPEs").val("Other");
                });
                var table_others2 = $('#tbl_othersstat').DataTable({
                    "processing": true,
                    "serverSide": false,
                    "stateSave": true,
                    "searching":true,
                    "bDestroy": true,
                    "scrollY":true,
                    "scrollX":true
                });
                });
                $('#oth_tbl').show();
                $('#prt_tbl').hide();
                $('#cmpt_tbl').hide();
            }
            else{
                location.reload(true);
            }
        });

    $("#save_rems").on('click', function () {
        var InvenStatus = $("#InvenStatus").get(0).value;
        var InvenReason=$("#InvenReason").get(0).value;
        var statusID=$("#statusID").get(0).value;
        var statusTYPEs=$("#statusTYPEs").get(0).value;



        if(InvenStatus!="--SELECT--" && InvenReason!="")
        {
            
            $.post("../SuperAdmin/Resources/PHP/SupAdminAddRemarks.php",
            JSON.stringify({
                InvenStatus :InvenStatus,
                InvenReason:InvenReason,
                statusID:statusID,
                statusTYPEs:statusTYPEs
        
            }),
            function(data,status){
                if(data == 1) 
                { 
                    alert("Status Successfully Updated!");
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

    //

        //VIEW ARCHIVES JS (REGARDLESS OF DEPT)

        $('#searcharchtype').on('change', function() {
            $("#searcharchdept").removeAttr('disabled');
            var selected = $(this).val();
            $('#searcharchdept').val("--SELECT--");
            if(selected == "Computer")
            {
                var table_comp1 = $('#tblarch_computers').DataTable();
                table_comp1.destroy();
                $.post("../SuperAdmin/Resources/PHP/SupAdminArchComputers.php",
                function(data, status){
                var data=$.parseJSON(data);    
                var row="";
                for(var i=0;i<data.length;i++){
    
                    var status = data[i].InvStatus;
    
                    if (status == "In Use")
                    {
                        row=row+"<tr><td>"+data[i].ItemID+"</td><td>"+data[i].InvPropNo+"</td><td>"
                        +data[i].InvSerial+"</td><td><span class ='badge rounded-pill bg-success'>"
                        +data[i].InvStatus+"</span></td><td>"+data[i].Reason+"</td></tr>";
                    }
                    else if(status == "Condemned")
                    {
                        row=row+"<tr><td>"+data[i].ItemID+"</td><td>"+data[i].InvPropNo+"</td><td>"
                        +data[i].InvSerial+"</td><td><span class ='badge rounded-pill bg-danger'>"
                        +data[i].InvStatus+"</span></td><td>"+data[i].Reason+"</td></tr>";
                    }
                    else if (status == "For Repair/Pulled out")
                    {
                        row=row+"<tr><td>"+data[i].ItemID+"</td><td>"+data[i].InvPropNo+"</td><td>"
                        +data[i].InvSerial+"</td><td><span class ='badge rounded-pill bg-warning text-dark'>"
                        +data[i].InvStatus+"</span></td><td>"+data[i].Reason+"</td></tr>";
                    }
                    else
                    {
                        row=row+"<tr><td>"+data[i].ItemID+"</td><td>"+data[i].InvPropNo+"</td><td>"
                        +data[i].InvSerial+"</td><td><span class ='badge rounded-pill bg-info text-dark'>"
                        +data[i].InvStatus+"</span></td><td>"+data[i].Reason+"</td></tr>";
                    }
                    
    
                }
                $('#comp_dataarch').html(row);
                var table_comp = $('#tblarch_computers').DataTable({
                    "processing": true,
                    "serverSide": false,
                    "stateSave": true,
                    "searching":true,
                    "bDestroy": true,
                    "scrollY":true,
                    "scrollX":true,
                    "lengthMenu": [ 20, 40, 60, 80, 100 ]
                });
                });
                $('#oth_tblarch').hide();
                $('#prt_tblarch').hide();
                $('#cmpt_tblarch').show();
            }
            else if(selected == "Printer"){      
                var table_print1 = $('#tbl_printersarch').DataTable();
                table_print1.destroy();
                $.post("../SuperAdmin/Resources/PHP/SupAdminArchPrinters.php",
                function(data, status){
                var data=$.parseJSON(data);    
                var row="";
                for(var i=0;i<data.length;i++){
            
                    var status = data[i].InvStatus;
            
                    if (status == "In Use")
                    {
                        row=row+"<tr><td>"+data[i].ItemID+"</td><td>"+data[i].InvPropNo+"</td><td>"
                        +data[i].InvSerial+"</td><td><span class ='badge rounded-pill bg-success'>"
                        +data[i].InvStatus+"</span></td><td>"+data[i].Reason+"</td></tr>";
                    }
                    else if(status == "Condemned")
                    {
                        row=row+"<tr><td>"+data[i].ItemID+"</td><td>"+data[i].InvPropNo+"</td><td>"
                        +data[i].InvSerial+"</td><td><span class ='badge rounded-pill bg-danger'>"
                        +data[i].InvStatus+"</span></td><td>"+data[i].Reason+"</td></tr>";
                    }
                    else if (status == "For Repair/Pulled out")
                    {
                        row=row+"<tr><td>"+data[i].ItemID+"</td><td>"+data[i].InvPropNo+"</td><td>"
                        +data[i].InvSerial+"</td><td><span class ='badge rounded-pill bg-warning text-dark'>"
                        +data[i].InvStatus+"</span></td><td>"+data[i].Reason+"</td></tr>";
                    }
                    else
                    {
                        row=row+"<tr><td>"+data[i].ItemID+"</td><td>"+data[i].InvPropNo+"</td><td>"
                        +data[i].InvSerial+"</td><td><span class ='badge rounded-pill bg-info text-dark'>"
                        +data[i].InvStatus+"</span></td><td>"+data[i].Reason+"</td></tr>";
                    }
                }
                $('#prt_dataarch').html(row);
                var table_print = $('#tbl_printersarch').DataTable({
                    "processing": true,
                    "serverSide": false,
                    "stateSave": true,
                    "searching":true,
                    "bDestroy": true,
                    "scrollY":true,
                    "scrollX" :true,
                    "lengthMenu": [ 20, 40, 60, 80, 100 ]
                });
                });
                $('#oth_tblarch').hide();
                $('#prt_tblarch').show();
                $('#cmpt_tblarch').hide();
            }
            else if(selected == "Others"){
                var table_others1 = $('#tbl_othersarch').DataTable();
                table_others1.destroy();
                $.post("../SuperAdmin/Resources/PHP/SupAdminArchOthers.php",
                function(data, status){
                var data=$.parseJSON(data);    
                var row="";
                for(var i=0;i<data.length;i++){
            
                    var status = data[i].InvStatus;
    
                    if (status == "In Use")
                    {
                        row=row+"<tr><td>"+data[i].ItemID+"</td><td>"+data[i].InvPropNo+"</td><td>"
                        +data[i].InvSerial+"</td><td><span class ='badge rounded-pill bg-success'>"
                        +data[i].InvStatus+"</span></td><td>"+data[i].Reason+"</td></tr>";
                    }
                    else if(status == "Condemned")
                    {
                        row=row+"<tr><td>"+data[i].ItemID+"</td><td>"+data[i].InvPropNo+"</td><td>"
                        +data[i].InvSerial+"</td><td><span class ='badge rounded-pill bg-danger'>"
                        +data[i].InvStatus+"</span></td><td>"+data[i].Reason+"</td></tr>";
                    }
                    else if (status == "For Repair/Pulled out")
                    {
                        row=row+"<tr><td>"+data[i].ItemID+"</td><td>"+data[i].InvPropNo+"</td><td>"
                        +data[i].InvSerial+"</td><td><span class ='badge rounded-pill bg-warning text-dark'>"
                        +data[i].InvStatus+"</span></td><td>"+data[i].Reason+"</td></tr>";
                    }
                    else
                    {
                        row=row+"<tr><td>"+data[i].ItemID+"</td><td>"+data[i].InvPropNo+"</td><td>"
                        +data[i].InvSerial+"</td><td><span class ='badge rounded-pill bg-info text-dark'>"
                        +data[i].InvStatus+"</span></td><td>"+data[i].Reason+"</td></tr>";
                    }
                }
                $('#etc_dataarch').html(row);
                var table_others = $('#tbl_othersarch').DataTable({
                    "processing": true,
                    "serverSide": false,
                    "stateSave": true,
                    "searching":true,
                    "bDestroy": true,
                    "scrollY":true,
                    "scrollX":true,
                    "lengthMenu": [ 20, 40, 60, 80, 100 ]
                });
                });
                $('#oth_tblarch').show();
                $('#prt_tblarch').hide();
                $('#cmpt_tblarch').hide();
            }
            else{
                location.reload(true);
            }  
        });

        $('#searcharchdept').on('change', function() {
            var selected = $("#searcharchtype").get(0).value;
            var dept = $(this).val();
            var json =JSON.stringify(
                {"data":
                  {
                   "dept":dept,
                   "wt":selected
                  }
                });
                if(selected == "Computer"){
                    var table_comp1 = $('#tblarch_computers').DataTable();
                    table_comp1.destroy();
                    $.post("../SuperAdmin/Resources/PHP/SupAdminDeptArchComputers.php",json,
                    function(data, status){
                    var data=$.parseJSON(data);    
                    var row="";
                    for(var i=0;i<data.length;i++){
                
                    var status = data[i].InvStatus;
            
                    if (status == "In Use")
                    {
                        row=row+"<tr><td>"+data[i].ItemID+"</td><td>"+data[i].InvPropNo+"</td><td>"
                        +data[i].InvSerial+"</td><td><span class ='badge rounded-pill bg-success'>"
                        +data[i].InvStatus+"</span></td><td>"+data[i].Reason+"</td></tr>";
                    }
                    else if(status == "Condemned")
                    {
                        row=row+"<tr><td>"+data[i].ItemID+"</td><td>"+data[i].InvPropNo+"</td><td>"
                        +data[i].InvSerial+"</td><td><span class ='badge rounded-pill bg-danger'>"
                        +data[i].InvStatus+"</span></td><td>"+data[i].Reason+"</td></tr>";
                    }
                    else if (status == "For Repair/Pulled out")
                    {
                        row=row+"<tr><td>"+data[i].ItemID+"</td><td>"+data[i].InvPropNo+"</td><td>"
                        +data[i].InvSerial+"</td><td><span class ='badge rounded-pill bg-warning text-dark'>"
                        +data[i].InvStatus+"</span></td><td>"+data[i].Reason+"</td></tr>";
                    }
                    else
                    {
                        row=row+"<tr><td>"+data[i].ItemID+"</td><td>"+data[i].InvPropNo+"</td><td>"
                        +data[i].InvSerial+"</td><td><span class ='badge rounded-pill bg-info text-dark'>"
                        +data[i].InvStatus+"</span></td><td>"+data[i].Reason+"</td></tr>";
                    }
                }
                $('#comp_dataarch').html(row);
                var table_comp = $('#tblarch_computers').DataTable({
                    "processing": true,
                    "serverSide": false,
                    "stateSave": true,
                    "searching":true,
                    "bDestroy": true,
                    "scrollY":true,
                    "scrollX":true,
                    "lengthMenu": [ 20, 40, 60, 80, 100 ]
                });
                });
                $('#oth_tblarch').hide();
                $('#prt_tblarch').hide();
                $('#cmpt_tblarch').show();
            }
            else if(selected == "Printer"){
                var table_print1 = $('#tbl_printersarch').DataTable();
                table_print1.destroy();
                $.post("../SuperAdmin/Resources/PHP/SupAdminDeptArchPrinters.php",json,
                function(data, status){
                var data=$.parseJSON(data);    
                var row="";
                for(var i=0;i<data.length;i++){

                    var status = data[i].InvStatus;
                    
                    if (status == "In Use")
                    {
                        row=row+"<tr><td>"+data[i].ItemID+"</td><td>"+data[i].InvPropNo+"</td><td>"
                        +data[i].InvSerial+"</td><td><span class ='badge rounded-pill bg-success'>"
                        +data[i].InvStatus+"</span></td><td>"+data[i].Reason+"</td></tr>";
                    }
                    else if(status == "Condemned")
                    {
                        row=row+"<tr><td>"+data[i].ItemID+"</td><td>"+data[i].InvPropNo+"</td><td>"
                        +data[i].InvSerial+"</td><td><span class ='badge rounded-pill bg-danger'>"
                        +data[i].InvStatus+"</span></td><td>"+data[i].Reason+"</td></tr>";
                    }
                    else if (status == "For Repair/Pulled out")
                    {
                        row=row+"<tr><td>"+data[i].ItemID+"</td><td>"+data[i].InvPropNo+"</td><td>"
                        +data[i].InvSerial+"</td><td><span class ='badge rounded-pill bg-warning text-dark'>"
                        +data[i].InvStatus+"</span></td><td>"+data[i].Reason+"</td></tr>";
                    }
                    else
                    {
                        row=row+"<tr><td>"+data[i].ItemID+"</td><td>"+data[i].InvPropNo+"</td><td>"
                        +data[i].InvSerial+"</td><td><span class ='badge rounded-pill bg-info text-dark'>"
                        +data[i].InvStatus+"</span></td><td>"+data[i].Reason+"</td></tr>";
                    }
                }
                $('#prt_dataarch').html(row);
                var table_print = $('#tbl_printersarch').DataTable({
                    "processing": true,
                    "serverSide": false,
                    "stateSave": true,
                    "searching":true,
                    "bDestroy": true,
                    "scrollY":true,
                    "scrollX" :true,
                    "lengthMenu": [ 20, 40, 60, 80, 100 ]
                });
                });
                $('#oth_tblarch').hide();
                $('#prt_tblarch').show();
                $('#cmpt_tblarch').hide();            
            }
            else if(selected == "Others"){
                var table_others1 = $('#tbl_othersstat').DataTable();
                table_others1.destroy();
                $.post("../SuperAdmin/Resources/PHP/SupAdminDeptArchOthers.php",json,
                function(data, status){
                var data=$.parseJSON(data);    
                var row="";
                for(var i=0;i<data.length;i++)
                {
                    var status = data[i].InvStatus;
            
                    if (status == "In Use")
                    {
                        row=row+"<tr><td>"+data[i].ItemID+"</td><td>"+data[i].InvPropNo+"</td><td>"
                        +data[i].InvSerial+"</td><td><span class ='badge rounded-pill bg-success'>"
                        +data[i].InvStatus+"</span></td><td>"+data[i].Reason+"</td></tr>";
                    }
                    else if(status == "Condemned")
                    {
                        row=row+"<tr><td>"+data[i].ItemID+"</td><td>"+data[i].InvPropNo+"</td><td>"
                        +data[i].InvSerial+"</td><td><span class ='badge rounded-pill bg-danger'>"
                        +data[i].InvStatus+"</span></td><td>"+data[i].Reason+"</td></tr>";
                    }
                    else if (status == "For Repair/Pulled out")
                    {
                        row=row+"<tr><td>"+data[i].ItemID+"</td><td>"+data[i].InvPropNo+"</td><td>"
                        +data[i].InvSerial+"</td><td><span class ='badge rounded-pill bg-warning text-dark'>"
                        +data[i].InvStatus+"</span></td><td>"+data[i].Reason+"</td></tr>";
                    }
                    else
                    {
                        row=row+"<tr><td>"+data[i].ItemID+"</td><td>"+data[i].InvPropNo+"</td><td>"
                        +data[i].InvSerial+"</td><td><span class ='badge rounded-pill bg-info text-dark'>"
                        +data[i].InvStatus+"</span></td><td>"+data[i].Reason+"</td></tr>";
                    }
            }
            $('#etc_dataarch').html(row);
            var table_others = $('#tbl_othersarch').DataTable({
                "processing": true,
                "serverSide": false,
                "stateSave": true,
                "searching":true,
                "bDestroy": true,
                "scrollY":true,
                "scrollX":true,
                "lengthMenu": [ 20, 40, 60, 80, 100 ]
            });
            });
            $('#oth_tblarch').show();
            $('#prt_tblarch').hide();
            $('#cmpt_tblarch').hide();
        }});

    $.post("../SuperAdmin/Resources/PHP/SupAdminGetStockNum.php",
        function(data, status){
            var data=$.parseJSON(data);    
            var row="";
            for(var i=0;i<data.length;i++){

                var compstocknum = data[i].ComputerNumbers;
                var prtstocknum = data[i].PrinterNumbers;
                var othstocknum = data[i].OthersNumbers;
            
                var SuperChart = $("#SuperChart");
                var SupData = {
                    labels: ["Computer", "Printer", "Others"],
                    datasets: [
                    {
                        label: "Stock Distribution",
                        data: [compstocknum, prtstocknum ,othstocknum],
                        backgroundColor: [
                        "#62aec5",
                        "#e64072",
                        "#E35335"
                        ]
                    }
                    ]
                };
                var Supoptions = {
                    responsive: true,
                    animations: true,
                    title: {
                        display: true,
                        position: "top",
                        text: "Stock Distribution",
                        fontSize: 24,
                        fontColor: "#111",
                        padding: "20"
                    },
                    legend: {
                        display: true,
                        position: "right",
                        labels: {
                            fontColor: "#333",
                            fontSize: 22
                        }
                    },
                    }; 
                    
                    var chart1 = new Chart(SuperChart, {
                        type: "doughnut",
                        data: SupData,
                        options: Supoptions
                    });
            }
    });

    $.post("../SuperAdmin/Resources/PHP/ViewUserRequest.php",
    function(data, status){
    var data=$.parseJSON(data);    
    var row="";
    for(var i=0;i<data.length;i++){

        row=row+"<tr><td>"+data[i].UsersName+"</td><td>"+data[i].UsersDepartment+
        "</td><td class ='accept_user'><button id="+data[i].UserID+" class='Accept btn btn-success btn-sm'><i class='bi bi-check-square-fill'></i>&nbsp;Confirm Request</button></td></tr>";
    }

    $('#users_data').html(row);
    $(".accept_user").find(".Accept").click(function () {
        var propID = this.id;
        var prop=JSON.stringify(
            {"data":
              {
               "propID":propID,
              }
            }
          );
          if (confirm("Do you want to confirm the password request?")) {
            $.post("../SuperAdmin/Resources/PHP/AcceptPassChange.php",prop,
            function(data, status){
            var data=$.parseJSON(data);    
            if(data == 1) 
            { 
                alert("Transferred Successfully!");
                location.reload(true);
            } 
            else { 
                alert("ERROR!");

            }
            });
        } 
    });  
    
    var table_users2 = $('#tbl_users').DataTable({
        "processing": true,
        "serverSide": false,
        "stateSave": true,
        "searching":true,
        "bDestroy": true,
        "dom": 'B<"clear">lfrtip'
    });
    });

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

  
       
    
});//end document
