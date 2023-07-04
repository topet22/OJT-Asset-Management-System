<?php
    $servername = "localhost";
    $username = "AMS_User";
    $password = "P@ssW0rdAMS2023";
    $conn = new PDO("mysql:host=$servername;dbname=ihoms_inventory", $username, $password);

    session_start(); 

    if(isset($_SESSION['SAuser_name'])){
        header("location:SuperAdmin/");
    }
    if(isset($_SESSION['mcc'])){
        header("location:MCC/");
    }
    if(isset($_SESSION['Auser_name'])){
        header("location:Admin/");
    }
    if(isset($_SESSION['DCuser_name'])){
        header("location:DCI/");
    }

    if(isset($_SESSION['user_name'])){
        header("location:User/");
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="test.js"></script>
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    height: 100vh;
    display: flex;
    background-image: url("logo2.png");
    background-position: center center; 
    align-items: center;
    justify-content: center;
    background-repeat: no-repeat;
}

.login {
    width: 360px;
    height: min-content;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
    backdrop-filter: blur( 10px );
    -webkit-backdrop-filter: blur( 10px );
    border-radius: 10px;
    border: 1px solid rgba( 255, 255, 255, 0.18 );
}

.login h1 {
    font-size: 36px;
    margin-bottom: 25px;
}

.login form {
    font-size: 20px;
}

.login form .form-group {
    margin-bottom: 12px;
}

.login form input[type="submit"] {
    font-size: 20px;
    margin-top: 15px;

}

    </style>
  </head>
  <body>
    <div class="login">
        <form class="needs-validation">
            <center><img src="logo.png" class="rounded-circle" width="70" height="70"></center>
            <div class="form-group">
                <label class="form-label" for="email">Username</label>
                <input class="form-control" type="text" id="username" required>
                <div class="invalid-feedback">
                    Please enter your Username
                </div>
            </div>
            <div class="form-group">
                <label class="form-label" for="password">Password</label>
                <input class="form-control" type="password" id="password" required>
                <div class="invalid-feedback">
                    Please enter your password
                </div>
            </div>
            <a style="cursor:pointer; text-decoration:underline;color:red;"  data-bs-toggle="modal" data-bs-target="#forgetPass"  >Forgot Password?</a>
           <button id="login" class="btn btn-primary w-100">Login</button>
        </form>
    </div>
        <div class="modal fade" id="forgetPass" tabindex="-1" aria-labelledby="forgetPassLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Forgot Password</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-2">
                    <div class="col-sm-12">
                        <div class="form-floating mb-2">
                        <input type="text" class="form-control" id="forgotusername" placeholder="@example.com">
                        <label for="floatingInput">Enter Username Here</label>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-floating mb-2">
                            <select class="form-select" id="forgotdepartment" aria-label="Floating label select example">
                              <option value="--SELECT--">-----SELECT DEPARTMENT----- </option>
                              </select>
                            <label for="floatingSelect">Select Department Here</label>
                        </div>
                    </div>      
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="forget" class="btn btn-primary">Submit</button>
            </div>
        </div>
     </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>
