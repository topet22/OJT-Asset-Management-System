var now = new Date();
var millisTill10 = new Date(now.getFullYear(), now.getMonth(), now.getDate(), 10, 30, 0, 0) - now;
if (millisTill10 < 0) {
     millisTill10 += 86400000; // it's after 10am, try 10am tomorrow.
}

setTimeout(function(){
    $.post("../SuperAdmin/Resources/PHP/CheckTexter.php",
    function(data, status){
    var data=$.parseJSON(data);    
    var row="";
    for(var i=0;i<data.length;i++){
        
    }
    });
}, millisTill10);



var millisTill14 = new Date(now.getFullYear(), now.getMonth(), now.getDate(), 14, 0, 0, 0) - now;
if (millisTill14 < 0) {
     millisTill14 += 86400000; // it's after 2pm, try 2pm tomorrow.
}

setTimeout(function(){
    $.post("../SuperAdmin/Resources/PHP/CheckTexter.php",
    function(data, status){
    var data=$.parseJSON(data);    
    var row="";
    for(var i=0;i<data.length;i++){
        
    }
    });
}, millisTill14);