$(document).ready(function() {

    $("#AddStockHDDdiv").hide();
    $('#AddStockdesc').hide();

    $("#stockID").hide();
    $('#stockWT').hide();

    $('#oth_tbl').hide();
    $('#prt_tbl').hide();
    $('#cmpt_tbl').hide();

    $.post("../Admin/Resources/PHP/SupAdminJOReqs.php",
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

    $.post("../Admin/Resources/PHP/DEPTschedPM.php",
    function(data, status){
        var data=$.parseJSON(data);    
        var row="";
        const month = ["January","February","March","April","May","June","July","August","September","October","November","December"];
        var d = new Date();
        let name = month[d.getMonth()];;
        for(var i=0;i<data.length;i++){
            row = row+"<div class='carousel-item'><div class='card text-center'><div class='card-body'><h5 class='card-title'>"+data[i].Department+"</h5><p class='card-text'>"+data[i].Schedule+"</p></div></div></div>";
        }
        $( "#carousel_PM" ).append(row);
        $("#Month_PM").append(name);    

    });
    

    $('#AddStockCompStorageType').on('change', function() {
        var selected = $(this).val();
        if(selected == "SSD"){
            $('#AddStockSSDdiv').show();
            $("#AddStockHDDdiv").hide();
        }  
        else if(selected == "HDD"){
            $('#AddStockHDDdiv').show();
            $("#AddStockSSDdiv").hide();
        }
        else{
            $('#AddStockSSDdiv').show();
            $('#AddStockHDDdiv').show();
        }
    });

    $("#AddStockWhatType").on('change', function() {
        var selected = $(this).val();
        console.log(selected);
        if(selected == 'Others'){
            $('#AddStockdesc').show();
        }  
        else{
            $('#AddStockdesc').hide();
        }
        if(selected == 'Computer'){
            $('#AddStocksel_comp').show();
        }
        else{
            $('#AddStocksel_comp').hide();
        }
    });

    $.post("../Admin/Resources/PHP/viewdepusers.php",
    function(data, status){
        var data=$.parseJSON(data);    
        var row="";
        for(var i=0;i<data.length;i++){

            var id = data[i].dept_user;
            var name = data[i].dept_user;

            $("#DRPDepartment").append("<option value='"+id+"'>"+name+"</option>");
            $("#UserDepartment").append("<option value='"+id+"'>"+name+"</option>");
        }
    });

    $("#savepm").on('click', function () {
        var sched_date=$("#scheduledate").get(0).value;
        var sched_dept=$("#scheduleDepartment").get(0).value;
        if(sched_date!="")
        {
            
            $.post("../Admin/Resources/PHP/schedPM.php",
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

    $("#AddStock").on('click', function () {
        var WhatType = $("#AddStockWhatType").get(0).value;
        var InvPropNo=$("#AddStockInvPropNo").get(0).value;
        var InvSerial=$("#AddStockInvSerial").get(0).value;
        var InvDate=$("#AddStockInvDate").get(0).value;
        var InvModel=$("#AddStockInvModel").get(0).value;
        var InvBrand=$("#AddStockInvBrand").get(0).value;
        var InvDesc=$("#AddStockInvDesc").get(0).value;

        //Dedicated keys for Computer Selection
        var CompOS = $("#AddStockCompOS").get(0).value;
        var Comptype = $("#AddStockComptype").get(0).value;
        var CompStorageType = $("#AddStockCompStorageType").get(0).value;
        var SSDCap = $("#AddStockSSDCap").get(0).value;
        var HDDCap = $("#AddStockHDDCap").get(0).value;
        var CompRAM = $("#AddStockCompRAM").get(0).value;
        var CompProcessor = $("#AddStockCompProcessor").get(0).value;
        var OSLicense = $("#AddStockOSLicense").get(0).value;

        // SupAdminAddStock
        if(WhatType != "--SELECT--" &&  InvSerial!="" &&  InvModel!="" && InvBrand!="")
        {
            
            if(WhatType == "Computer")
            {
                if(CompOS != "" && Comptype!="--SELECT--" && CompStorageType!="--SELECT--" && CompRAM!="" && CompProcessor!="" && OSLicense!="" ){
                    $.post("../Admin/Resources/PHP/SupAdminAddStock.php",
                    JSON.stringify({
                        WhatType : WhatType,
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
                $.post("../Admin/Resources/PHP/SupAdminAddStock.php",
                JSON.stringify({
                    WhatType : WhatType,
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
                    $.post("../Admin/Resources/PHP/SupAdminAddStock.php",
                    JSON.stringify({
                        WhatType : WhatType,
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

    $('#searchwhat').on('change', function() {
        var selected = $(this).val();
        if(selected == "Computer"){
            $.post("../Admin/Resources/PHP/SupAdminComputerStocks.php",
            function(data, status){
            var data=$.parseJSON(data);    
            var row="";
            for(var i=0;i<data.length;i++){
        
        
                row=row+"<tr><td>"+data[i].property_NO+"</td><td>"
                +data[i].serial_NO+"</td><td>"
                +data[i].Model+"</td><td>"
                +data[i].Brand+"</td><td>"
                +data[i].CompType+"</td><td>"
                +data[i].CompOS+"</td><td>"
                +data[i].CompRAM+"</td><td>"
                +data[i].CompSSD+"</td><td>"
                +data[i].CompHDD+"</td><td>"
                +data[i].CompProcessor+"</td><td>"
                +data[i].OSLicense+"</td><td>"
                +data[i].date_acquired+"</td><td class='comp_vew'><button id="+data[i].stock_ID+" class='Transfer btn btn-outline-success mb-2' data-bs-toggle='modal' data-bs-target='#Transfer'><i class='bi bi-arrow-repeat'></i>Transfer</button></td></tr>";
            }
            $('#STOCKcomp_data').html(row);
            $(".comp_vew").find(".Transfer").click(function () {
                var stID = this.id;
                $("#stockID").val(stID);
                $("#stockWT").val("Computer");
            });

            var table_comp = $('#STOCKtbl_computers').DataTable({
                "processing": true,
                "serverSide": false,
                "stateSave": true,
                "searching":true,
                "bDestroy": true,
                "scrollY":true,
                "scrollX":true,
                "responsive": true,
                "dom": 'B<"clear">lfrtip',
                "buttons": [
                    {
                        extend: 'print',
                        
                        messageTop: 'List of Computers Stock',
                        className:'btn btn-primary mb-3',
                        exportOptions: {
                             columns: 'th:not(:last-child)',
                             header: 'false'
                         }
                  },
                    {
                        extend: 'csv',
                        messageTop: 'List of Computers Stock',
                        className:'btn btn-primary mb-3',
                        exportOptions: {
                             columns: 'th:not(:last-child)'
                         }
                  },
             
                 {
                    extend: 'excel',
                    messageTop: 'List of Computers Stock',
                    className:'btn btn-primary mb-3',
                    exportOptions: {
                        columns: 'th:not(:last-child)'
                     }
                }],
                "lengthMenu": [ 15, 30, 80, 100 ]
                
            });
            });
            $('#oth_tbl').hide();
            $('#prt_tbl').hide();
            $('#cmpt_tbl').show();
        }  
        else if(selected == "Printer"){
            $.post("../Admin/Resources/PHP/SupAdminPrinterStocks.php",
            function(data, status){
            var data=$.parseJSON(data);    
            var row="";
            for(var i=0;i<data.length;i++){
        
        
                row=row+"<tr><td>"+data[i].property_NO+"</td><td>"
                +data[i].serial_NO+"</td><td>"
                +data[i].Model+"</td><td>"
                +data[i].Brand+"</td><td>"
                +data[i].date_acquired+"</td><td class='comp_vew'><button id="+data[i].stock_ID+" class='Transfer btn btn-outline-success mb-2' data-bs-toggle='modal' data-bs-target='#Transfer'><i class='bi bi-arrow-repeat'></i>Transfer</button></td></tr>";
            }
            $('#STOCKprt_data').html(row);
            $(".comp_vew").find(".Transfer").click(function () {
                var stID = this.id;
                $("#stockID").val(stID);
                $("#stockWT").val("Printer");
            });
            var table_print = $('#STOCKtbl_printers').DataTable({
                "processing": true,
                "serverSide": false,
                "stateSave": true,
                "searching": true,
                "bDestroy": true,
                "scrollY":true,
                "scrollX":true,
                "responsive": true,
                "dom": 'B<"clear">lfrtip',
                "buttons": [
                    {
                        extend: 'print',
                        
                        messageTop: 'List of Printers Stock',
                        className:'btn btn-primary mb-3',
                        exportOptions: {
                             columns: 'th:not(:last-child)',
                         }
                  },
                    {
                        extend: 'csv',
                        messageTop: 'List of Printers Stock',
                        className:'btn btn-primary mb-3',
                        exportOptions: {
                             columns: 'th:not(:last-child)'
                         }
                  },
             
                 {
                    extend: 'excel',
                    messageTop: 'List of Printers Stock',
                    className:'btn btn-primary mb-3',
                    exportOptions: {
                        columns: 'th:not(:last-child)'
                     }
                }],
                "lengthMenu": [ 15, 30, 80, 100 ]
            });
            });
            $('#oth_tbl').hide();
            $('#prt_tbl').show();
            $('#cmpt_tbl').hide();
        }
        else if(selected == "Others"){
            $.post("../Admin/Resources/PHP/SupAdminOthersStock.php",
            function(data, status){
            var data=$.parseJSON(data);    
            var row="";
            for(var i=0;i<data.length;i++){

                row=row+"<tr><td>"+data[i].property_NO+"</td><td>"
                +data[i].serial_NO+"</td><td>"
                +data[i].Model+"</td><td>"
                +data[i].Brand+"</td><td>"
                +data[i].date_acquired+"</td><td>"
                +data[i].description+"</td><td class='comp_vew'><button id="+data[i].stock_ID+" class='Transfer btn btn-outline-success mb-2' data-bs-toggle='modal' data-bs-target='#Transfer'><i class='bi bi-arrow-repeat'></i>Transfer</button></td></tr>";
            }
            $('#STOCKetc_data').html(row);
            $(".comp_vew").find(".Transfer").click(function () {
                var stID = this.id;
                $("#stockID").val(stID);
                $("#stockWT").val("Others");
            });
            var table_others = $('#STOCKtbl_others').DataTable({
                "processing": true,
                "serverSide": false,
                "stateSave": true,
                "searching":true,
                "bDestroy": true,
                "scrollY":true,
                "scrollX":true,
                "responsive": true,
                "dom": 'B<"clear">lfrtip',
                "buttons": [
                    {
                        extend: 'print',
                        
                        messageTop: 'List of Other Equipment',
                        className:'btn btn-primary mb-3',
                        exportOptions: {
                             columns: 'th:not(:last-child)',
                         }
                  },
                    {
                        extend: 'csv',
                        messageTop: 'List of Other Equipment',
                        className:'btn btn-primary mb-3',
                        exportOptions: {
                             columns: 'th:not(:last-child)'
                         }
                  },
             
                 {
                    extend: 'excel',
                    messageTop: 'List of Other Equipment',
                    className:'btn btn-primary mb-3',
                    exportOptions: {
                        columns: 'th:not(:last-child)'
                     }
                }],
                "lengthMenu": [ 15, 30, 80, 100 ]
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

    $.post("../Admin/Resources/PHP/viewdepts.php",
    function(data, status){
        var data=$.parseJSON(data);    
        var row="";
        for(var i=0;i<data.length;i++){

            var id = data[i].dept_name;
            var name = data[i].dept_name;

            $("#DepartmentGoingTo").append("<option value='"+id+"'>"+name+"</option>");
            $("#DRPDepartment").append("<option value='"+id+"'>"+name+"</option>");
            $("#UserDepartment").append("<option value='"+id+"'>"+name+"</option>");
            $("#scheduleDepartment").append("<option value='"+id+"'>"+name+"</option>");
        }
    });

    $('#DepartmentGoingTo').on('change', function() {
        $("#DesignatedUser").empty();
        $("#DesignatedUser").append("<option value='--SELECT--'>--SELECT USER--</option>");
        var selected = $(this).val();
        var sel=JSON.stringify(
            {"data":
              {
               "selected":selected
              }
            }
        );
        if(selected == "--SELECT--"){
            alert("Select a Department")
        }  
        else{
            $.post("../Admin/Resources/PHP/viewdepusers.php",sel,
            function(data, status){
                var data=$.parseJSON(data);    
                var row="";
                for(var i=0;i<data.length;i++){
        
                    var id = data[i].dept_user;
                    var name = data[i].dept_user;
        
                    $("#DesignatedUser").append("<option value='"+id+"'>"+name+"</option>");
        
                }
            });
        }
    });

    $("#TransferStock").on('click', function (){
        var propID = $("#stockID").get(0).value;;
        var dept = $("#DepartmentGoingTo").get(0).value;
        var desiguser = $("#DesignatedUser").get(0).value;
        var whattype = $("#stockWT").get(0).value;
        if (dept !== "--SELECT--" && desiguser !== "--SELECT--"){
            var prop=JSON.stringify(
                {"data":
                  {
                   "propID":propID,
                   "whattype":whattype,
                   "department": dept,
                   "desigUser":desiguser
                  }
                }
              );  
            if (confirm("Do you want to transfer this Item?")) {
                $.post("../Admin/Resources/PHP/SupAdminTransferStock.php",prop,
                function(data, status){
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
        }
        else{
            alert("Fill the required fields")
        }
    });

    $("#save_dept").on('click', function () {
        var dept_name=$("#dept_name").get(0).value;
        if(dept_name!="")
        {
            
            $.post("../Admin/Resources/PHP/adddept.php",
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
        var AddPassword=$("#AddPassword").get(0).value;
        var ConfirmAddPassword=$("#ConfirmAddPassword").get(0).value;
        var UserDepartment=$("#UserDepartment").get(0).value;
        var AddUserLevel=$("#AddUserLevel").get(0).value;



        if(AddUsername!="" && AddPassword!="" && ConfirmAddPassword!="" && UserDepartment!="--SELECT--" && AddUserLevel   !="--SELECT--")
        {
            
            $.post("../Admin/Resources/PHP/SupAdminAddUser.php",
            JSON.stringify({
                AddUsername :AddUsername,
                AddPassword:AddPassword,
                UserDepartment:UserDepartment,
                AddUserLevel:AddUserLevel
        
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

    $("#savesignature").on('click', function () {
        
        var sigdataUrl=$("#sigdataUrl").get(0).value;
        
            
            $.post("../Admin/Resources/PHP/updatesignature.php",
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

});