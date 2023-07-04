$(document).ready(function() {

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

            $.post("../Admin/Resources/PHP/SupAdminReportsViewComp.php",
            function(data, status){
            var data=$.parseJSON(data);    
            var row="";
            for(var i=0;i<data.length;i++){

                row=row+"<tr><td>"+data[i].Dept+"</td><td>"
                +data[i].InvUser+"</td><td>"
                +data[i].InvPropNo+"</td><td>"
                +data[i].InvSerial+"</td><td>"
                +data[i].InvModel+"</td><td>"
                +data[i].InvBrand+"</td><td>"
                +data[i].CompType+"</td><td>"
                +data[i].CompOS+"</td><td>"
                +data[i].CompRAM+"</td><td>"
                +data[i].CompSSD+"</td><td>"
                +data[i].CompHDD+"</td><td>"
                +data[i].CompProcessor+"</td><td>"
                +data[i].OSLicense+"</td><td>"
                +data[i].InvDate+"</td><td>"
                +data[i].InvStatus+"</td><td class = 'comp_auditreels'><button id="+data[i].InvSerial+" class='View btn btn-success btn-sm' data-bs-toggle='modal' data-bs-target='#view'><i class='bi bi-eye-fill'></i>&nbsp;View History</button></td></tr>";
            }

            $('#compreport_data').html(row);
            $(".comp_auditreels").find(".View").click(function () {
                var table_compaudit1 = $('#computer_auditsreports').DataTable();
                table_compaudit1.destroy();
                var propID = this.id;
                var prop=JSON.stringify(
                    {"data":
                      {
                       "propID":propID,
                      }
                    }
                  );
                  $.post("../Admin/Resources/PHP/SupAdminViewAudit.php",prop,
                  function(data, status){
                  var data=$.parseJSON(data);    
                  var row="";
                  for(var i=0;i<data.length;i++){

                      row=row+"<tr><td>"+data[i].audit_ID+"</td><td>"
                      +data[i].audit_USER+"</td><td>"
                      +data[i].audit_ACTION+"</td><td>"
                      +data[i].audit_DATE+"</td></tr>";
                  }

                  var mess = "Audit Trail for " + propID;
                  $('#compaudit_datas').html(row);
                  var table_compaudits2 = $('#computer_auditsreports').DataTable({
                    "processing": true,
                    "serverSide": false,
                    "stateSave": true,
                    "searching":true,
                    "responsive": true,
                    "dom": 'B<"clear">lfrtip',
                    "lengthMenu": [ 20, 40, 60, 80, 100 ],
                    "buttons": [
                            {
                                extend: 'print',
                                messageTop: mess,
                                className:'btn btn-primary mb-3',
                        },
                            {
                                extend: 'csv',
                                messageTop: mess,
                                className:'btn btn-primary mb-3',
                        },
                    
                        {
                            extend: 'excel',
                            messageTop: mess,
                            className:'btn btn-primary mb-3',
                        }]   
                });
                });
                
            });   
            
            var table_compreport2 = $('#computer_report').DataTable({
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
                        exportOptions: {
                             columns: 'th:not(:last-child)',
                             header: 'false'
                         }
                  },
                    {
                        extend: 'csv',
                        messageTop: 'List of Computers',
                        className:'btn btn-primary mb-3',
                        exportOptions: {
                             columns: 'th:not(:last-child)'
                         }
                  },
             
                 {
                    extend: 'excel',
                    messageTop: 'List of Computers',
                    className:'btn btn-primary mb-3',
                    exportOptions: {
                        columns: 'th:not(:last-child)'
                     }
                }],
                "lengthMenu": [ 20, 40, 60, 80, 100 ]
            });


            var minDate;
            var maxDate;
            $.fn.dataTable.ext.search.push(
                function( settings, data, dataIndex ) {
                    var min = minDate.val();
                    var max = maxDate.val();
                    var date = new Date( data[13] );
                    if (
                        ( min === null && max === null ) ||
                        ( min === null && date <= max ) ||
                        ( min <= date   && max === null ) ||
                        ( min <= date   && date <= max )
                    ) {
                        return true;
                    }
                    return false;
                }
            );  
            minDate = new DateTime($('#min'), {
                format: 'MMMM Do YYYY'
            });
            maxDate = new DateTime($('#max'), {
                format: 'MMMM Do YYYY'
            });
    
            $('#min, #max').on('change', function () {
                table_compreport2.draw();    
            });
        });
// Printer////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $.post("../Admin/Resources/PHP/SupAdminReportsViewPrinter.php",
        function(data, status){
        var data=$.parseJSON(data);    
        var row="";
        for(var i=0;i<data.length;i++){

            row=row+"<tr><td>"+data[i].Dept+"</td><td>"+data[i].InvUser+"</td><td>"
            +data[i].InvPropNo+"</td><td>"
            +data[i].InvSerial+"</td><td>"
            +data[i].InvModel+"</td><td>"
            +data[i].InvBrand+"</td><td>"
            +data[i].InvDate+"</td><td>"
            +data[i].InvStatus+"</td><td class ='print_auditreels'><button id="+data[i].InvSerial+" class='View btn btn-success btn-sm' data-bs-toggle='modal' data-bs-target='#view'><i class='bi bi-eye-fill'></i>&nbsp;View History</button></td></tr>";
        }

        $('#prtreport_data').html(row);
        $(".print_auditreels").find(".View").click(function () {
            var table_printaudit1 = $('#printer_auditsreports').DataTable();
            table_printaudit1.destroy();
            var propID = this.id;
            var prop=JSON.stringify(
                {"data":
                  {
                   "propID":propID,
                  }
                }
              );
              $.post("../Admin/Resources/PHP/SupAdminViewAudit.php",prop,
              function(data, status){
              var data=$.parseJSON(data);    
              var row="";
              for(var i=0;i<data.length;i++){

                  row=row+"<tr><td>"+data[i].audit_ID+"</td><td>"
                  +data[i].audit_USER+"</td><td>"
                  +data[i].audit_ACTION+"</td><td>"
                  +data[i].audit_DATE+"</td></tr>";
              }

              var mess = "Audit Trail for " + propID;
              $('#prtaudit_datas').html(row);
              var table_printaudit2 = $('#printer_auditsreports').DataTable({
                "processing": true,
                "serverSide": false,
                "stateSave": true,
                "searching":true,
                "responsive": true,
                "dom": 'B<"clear">lfrtip',
                "buttons": [
                        {
                            extend: 'print',
                            messageTop: mess,
                            className:'btn btn-primary mb-3',
                    },
                        {
                            extend: 'csv',
                            messageTop: mess,
                            className:'btn btn-primary mb-3',
                    },
                
                    {
                        extend: 'excel',
                        messageTop: mess,
                        className:'btn btn-primary mb-3',
                    }],   
            });
            });
            
        });  
        
        var table_printerreport2 = $('#printer_report').DataTable({
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
                    
                    messageTop: 'List of Printers',
                    className:'btn btn-primary mb-3',
                    exportOptions: {
                         columns: 'th:not(:last-child)',
                         header: 'false'
                     }
              },
                {
                    extend: 'csv',
                    messageTop: 'List of Printers',
                    className:'btn btn-primary mb-3',
                    exportOptions: {
                         columns: 'th:not(:last-child)'
                     }
              },
         
             {
                extend: 'excel',
                messageTop: 'List of Printers',
                className:'btn btn-primary mb-3',
                exportOptions: {
                    columns: 'th:not(:last-child)'
                 }
            }],
            "lengthMenu": [ 20, 40, 60, 80, 100 ]
        });


        var minDate;
        var maxDate;
        $.fn.dataTable.ext.search.push(
            function( settings, data, dataIndex ) {
                var min = minDate.val();
                var max = maxDate.val();
                var date = new Date( data[6] );
        
                if (
                    ( min === null && max === null ) ||
                    ( min === null && date <= max ) ||
                    ( min <= date   && max === null ) ||
                    ( min <= date   && date <= max )
                ) {
                    return true;
                }
                return false;
            }
        );  
        minDate = new DateTime($('#min'), {
            format: 'MMMM Do YYYY'
        });
        maxDate = new DateTime($('#max'), {
            format: 'MMMM Do YYYY'
        });

        $('#min, #max').on('change', function () {
            table_printerreport2.draw();
            
        });
    });
        
    $.post("../Admin/Resources/PHP/SupAdminReportsViewOther.php",
    function(data, status){
    var data=$.parseJSON(data);    
    var row="";
    for(var i=0;i<data.length;i++){

        row=row+"<tr><td>"+data[i].InvDept+"</td><td>"+data[i].InvUser+"</td><td>"
        +data[i].InvPropNo+"</td><td>"
        +data[i].InvSerial+"</td><td>"
        +data[i].InvModel+"</td><td>"
        +data[i].InvBrand+"</td><td>"
        +data[i].InvDate+"</td><td>"
        +data[i].INVDesc+"</td><td>"
        +data[i].InvStatus+"</td><td class='other_auditreels'><button id="+data[i].InvSerial+" class='View btn btn-success btn-sm' data-bs-toggle='modal' data-bs-target='#view'><i class='bi bi-eye-fill'></i>&nbsp;View History</button></td></tr>";
    }

    $('#otherreport_data').html(row);
    $(".other_auditreels").find(".View").click(function () {
        var table_printaudit1 = $('#other_auditsreports').DataTable();
        table_printaudit1.destroy();
        var propID = this.id;
        var prop=JSON.stringify(
            {"data":
              {
               "propID":propID,
              }
            }
          );
          $.post("../Admin/Resources/PHP/SupAdminViewAudit.php",prop,
          function(data, status){
          var data=$.parseJSON(data);    
          var row="";
          for(var i=0;i<data.length;i++){

              row=row+"<tr><td>"+data[i].audit_ID+"</td><td>"
              +data[i].audit_USER+"</td><td>"
              +data[i].audit_ACTION+"</td><td>"
              +data[i].audit_DATE+"</td></tr>";
          }

          var mess = "Audit Trail for " + propID;
          $('#othaudit_datas').html(row);
          var table_printaudit2 = $('#other_auditsreports').DataTable({
            "processing": true,
            "serverSide": false,
            "stateSave": true,
            "searching":true,
            "responsive": true,
            "dom": 'B<"clear">lfrtip',
            "buttons": [
                    {
                        extend: 'print',
                        messageTop: mess,
                        className:'btn btn-primary mb-3',
                },
                    {
                        extend: 'csv',
                        messageTop: mess,
                        className:'btn btn-primary mb-3',
                },
            
                {
                    extend: 'excel',
                    messageTop: mess,
                    className:'btn btn-primary mb-3',
                }],   
        });
        });
        
    });  
    
    var table_otherreport2 = $('#other_report').DataTable({
        "processing": true,
        "serverSide": false,
        "stateSave": true,
        "searching":true,
        "bDestroy": true,
        "scrollY":true,
        "scrollX":true,
        "lengthMenu": [ 20, 40, 60, 80, 100 ],
        "dom": 'B<"clear">lfrtip',
            "buttons": [
                {
                    extend: 'print',
                    
                    messageTop: 'List of Other Equipment',
                    messageBottom: null,
                    className:'btn btn-primary mb-3',
                    exportOptions: {
                         columns: 'th:not(:last-child)',
                         header: 'false'
                     }
              },
                {
                    extend: 'csv',
                    messageTop: 'List of Other Equipment',
                    messageBottom: null,
                    className:'btn btn-primary mb-3',
                    exportOptions: {
                         columns: 'th:not(:last-child)'
                     }
              },
         
             {
                extend: 'excel',
                messageTop: 'List of Other Equipment',
                messageBottom: null,
                className:'btn btn-primary mb-3',
                exportOptions: {
                    columns: 'th:not(:last-child)'
                 }
            }],
            "lengthMenu": [ 20, 40, 60, 80, 100 ]
        
    });


    var minDate;
    var maxDate;
    $.fn.dataTable.ext.search.push(
        function( settings, data, dataIndex ) {
            var min = minDate.val();
            var max = maxDate.val();
            var date = new Date( data[6] );
    
            if (
                ( min === null && max === null ) ||
                ( min === null && date <= max ) ||
                ( min <= date   && max === null ) ||
                ( min <= date   && date <= max )
            ) {
                return true;
            }
            return false;
        }
    );  
    minDate = new DateTime($('#min'), {
        format: 'MMMM Do YYYY'
    });
    maxDate = new DateTime($('#max'), {
        format: 'MMMM Do YYYY'
    });

    $('#min, #max').on('change', function () {
        table_otherreport2.draw();
        
    });
});

    });

