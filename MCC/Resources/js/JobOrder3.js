$(document).ready(function() {

    $.post("../MCC/Resources/PHP/GetJOReqs.php",
    function(data, status){
        var data=$.parseJSON(data);    
        var row="";

        for(var i=0;i<data.length;i++)
        {
            var status = data[i].JOStatus;

            if(status == "MCC:APPROVED")
            {
                row=row+"<tr><td>"+data[i].JONumber+"</td><td>"+data[i].JO_Accepted+"</td><td><span class='badge rounded-pill bg-primary'>APPROVED</td><td class = 'joact'><button id="+data[i].JONumber+" class='Prt btn btn-outline-primary btn-sm' data-bs-toggle='modal' data-bs-target='#JOModal'><i class='bi bi-eye-fill'></i>&nbsp;Print JO</button></td></tr>";
               
            }
            else
            {
                row=row+"<tr><td>"+data[i].JONumber+"</td><td>"+data[i].JO_Accepted+"</td><td><span class='badge rounded-pill bg-danger'>REQUESTED</td><td class = 'joact'><button id="+data[i].JONumber+" class='Vieew btn btn-outline-primary btn-sm' data-bs-toggle='modal' data-bs-target='#JOModal'><i class='bi bi-eye-fill'></i>&nbsp;View JO</button></td></tr>";
            }
        }
        $('#JO_data').html(row);

        $(".joact").find(".Vieew").click(function () {
            var propID = this.id;
            var prop=JSON.stringify(
                {"data":
                  {
                   "propID":propID,
                  }
                }
              );
              $.post("../MCC/Resources/PHP/JODets.php",prop,
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
    
                    $('#SPJO_ID').val(JO_TicketNum);
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
                    $('#JO_Type').hide();
                    $("#JO_Save").hide();
                    $('#JO_prt').show();
                    $('#JO_Reset').show();
                    $('#print').hide();
                    $('#approve').show();
                  }});
        });

        $(".joact").find(".Prt").click(function () {
            var propID = this.id;
            var prop=JSON.stringify(
                {"data":
                  {
                   "propID":propID,
                  }
                }
              );
              $.post("../MCC/Resources/PHP/JODets.php",prop,
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
    
                    $('#SPJO_ID').val(JO_TicketNum);
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
                    $('#JO_Type').hide();
                    $("#JO_Save").hide();
                    $('#JO_prt').show();
                    $('#JO_Reset').show();
                    $('#approve').hide();
                    $('#print').show();

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

    $("#approve").on('click', function () {
        var spjoid=$("#SPJO_ID").get(0).value;
        

            $.post("../MCC/Resources/PHP/ApproveJO.php",
            JSON.stringify({
                spjoid : spjoid
                
            }),
            function(data,status){
                if(data == 1) 
                { 
                    alert("APPROVED JO!");
                    location.reload(true);
                } 
                else
                {
                    alert("ERROR!");
                }
            });  
    }); 
    
});//end document