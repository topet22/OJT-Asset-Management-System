$(document).ready(function() 
{
    $.post("../SuperAdmin/Resources/PHP/GetJOSummary.php",
    function(data, status){

        var data=$.parseJSON(data);    
        var row="";

        $('#TOTALJO').html(data[0].JO_Total);
        $('#TOTALJOPC').html(data[0].JO_TotalPC);
        $('#TOTALJOPRT').html(data[0].JO_TotalPRT);
        $('#TOTALJONT').html(data[0].JO_TotalNetwork);
        $('#TOTALJOOTH').html(data[0].JO_TotalOth);

        for(var i=1;i<data.length;i++)
        {
            row = row + "<tr><td>"+data[i].JO_TicketNum+"</td><td>"+data[i].JO_Date+"</td><td>"+data[i].JO_Department+"</td><td>"+data[i].JO_Department+"</td><td>"+data[i].JO_DescOfWork+"</td><td>"+data[i].JO_WhatType+"</td></tr>"
        }
        $('#Summary_DATA').html(row);
    });

    $('#min, #max, #JO_WT, #JO_DEPT').on('change', function () {
        var min = $("#min").get(0).value;
        var max = $("#max").get(0).value;
        var JO_WT = $("#JO_WT").get(0).value;
        var JO_DEPT = $("#JO_DEPT").get(0).value;

        if(min == "" && max == "")
        {
            alert("Fill out the dates");
            $("#JO_WT").val("ALL");
            $("#JO_DEPT").val("ALL");
        }
        else
        {
        var prop = JSON.stringify(
            {"data":
              {
               "min":min,
               "max":max,
               "JO_WT":JO_WT,
               "JO_DEPT":JO_DEPT
              }
            }
          );
          $.post("../SuperAdmin/Resources/PHP/GetJOSummaryBrief.php",prop,
          function(data, status){
      
              var data=$.parseJSON(data);    
              var row="";

              $('#TOTALJO').html(data[0].JO_Total);
              $('#TOTALJOPC').html(data[0].JO_TotalPC);
              $('#TOTALJOPRT').html(data[0].JO_TotalPRT);
              $('#TOTALJONT').html(data[0].JO_TotalNetwork);
              $('#TOTALJOOTH').html(data[0].JO_TotalOth);
      
              for(var i=1;i<data.length;i++)
              {
                  row = row + "<tr><td>"+data[i].JO_TicketNum+"</td><td>"+data[i].JO_Date+"</td><td>"+data[i].JO_Department+"</td><td>"+data[i].JO_Department+"</td><td>"+data[i].JO_DescOfWork+"</td><td>"+data[i].JO_WhatType+"</td></tr>"
              }
              $('#Summary_DATA').html(row);
          });
        }
    });

    

});//end
