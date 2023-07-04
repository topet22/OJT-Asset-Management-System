$(document).ready(function() {

    $("#login").on('click', function () {
        var username = $("#username").get(0).value;
        var password=$("#password").get(0).value;
        if(username!="" && password!="")
        {
            $.post("LoginBack.php",
            JSON.stringify({
                username : username,
                password:password
            }),
            function(data,status){
                if(data == 1) 
                { 
                    console.log(data);
                    window.location.replace("SuperAdmin/");
                } 
                else if(data == 1.5)
                {
                    console.log(data);
                    window.location.replace("MCC/");
                }
                else if(data == 2)
                {
                    console.log(data);
                    window.location.replace("Admin/");
                }
                else if(data == 2.5)
                {
                    console.log(data);
                    window.location.replace("DCI/");
                }
                else if(data == 3)
                {
                    console.log(data);
                    window.location.replace("User/");
                }
                else{
                    console.log(data);
                    alert("Invalid Credentials");
                    $("#username").val('');
                    $("#password").val('');
                }
            });  
        }
        else
        {
            alert("All Fields are Required");
        }
    });

    $("#forget").on('click', function () {
        var forgotusername = $("#forgotusername").get(0).value;
        var forgotdepartment = $("#forgotdepartment").get(0).value;
        if(forgotusername!="" && forgotdepartment !="--SELECT--")
        {
            $.post("ForgotPass.php",
            JSON.stringify({
                forgotusername : forgotusername,
                forgotdepartment:forgotdepartment
            }),
            function(data,status){
                if(data == 1) 
                { 
                    
                    alert("Request successfully reported. Please contact your service administrator for updates");
                    location.reload(true);
                } 
                else{
                    alert("No User Found");
                    $("#forgotusername").val('');
                }
            });  
        }
        else
        {
            alert("All Fields are Required");
        }
    });

    $.post("SuperAdmin/Resources/PHP/viewdepts.php",
    function(data, status){
        var data=$.parseJSON(data);    
        var row="";
        for(var i=0;i<data.length;i++){

            var id = data[i].dept_name;
            let name = data[i].dept_name;

            $("#forgotdepartment").append("<option value='"+id+"'>"+name+"</option>");
        }
    });

});