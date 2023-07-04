$(document).ready(function() {

    $.post("ty.php",
    function(data, status){
    var data=$.parseJSON(data);    
    var row="";
    for(var i=0;i<data.length;i++){

        var check = data[i].Schedule;
        if (check == "Unscheduled"){
            $('#Unscheduled').append("<div class='col-4 mb-2' ><span style='font-weight:1000;'>"+data[i].Department+"</span></div>");
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

}); 


