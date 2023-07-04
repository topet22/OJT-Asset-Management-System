<?php
    $servername = "localhost";
    $username = "AMS_User";
    $password = "P@ssW0rdAMS2023";
    $conn = new PDO("mysql:host=$servername;dbname=ihoms_inventory", $username, $password);
    session_start(); 

    if(!isset($_SESSION['user_name'])){
        header("location:../");
    }
    else
    {
        $_SESSION['user_name'];
        $_SESSION['depts'];
    }
?>
<!doctype html>
<html lang="en">
  <head>
        <?php include 'Resources/template/header.php' ?>
  </head>
  <body>
  <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container bg-dark">
        <a href="../User"> <img src="../logo.png" class="rounded-circle" width="50" height="50"></a>
            <label style="color:#fff; margin-left:10px;"><?//php echo ("Welcome {$_SESSION['user_name']}!");?></label>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
          </button>
          <ul class="nav navbar-nav navbar-right">
				<li><a href="notification.php"><span class="bi bi-bell link-light"></span></a></li>
	        </ul>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link rounded-pill link-dark" style="background-color:aliceblue;" href="../User">Dashboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#"><i class="bi bi-ticket-perforated-fill"></i>&nbsp;Ticket</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="https://docs.google.com/forms/d/e/1FAIpQLSfhsDFMcrQKOATkvlX60js9EEarQRWu7h_PJoAMK9HF6Etn5Q/viewform?fbclid=IwAR1M-OLG4FLDqxz_gvbnGg9t7YWUf2DU8VqjMn4V65AykPS3XVnWBNQ5oW0"><i class="bi bi-hand-thumbs-up-fill"></i>&nbsp;Feedback</a>
              </li>
            
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                    <i class="bi bi-gear-fill"></i>&nbsp;Settings</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#UserModal"><i class="bi bi-shield-lock-fill"></i>&nbsp;Change Password</a></li>
                  <li><a class="dropdown-item" href="../logout.php"><i class="bi bi-arrow-left"></i>&nbsp;Log Out</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
    </nav>
          <!-- --------------------------------Modal Add User-------------------------------->
          <div class="modal fade" id="UserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Change Password</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <div class="row g-2">
                      <div class="col-sm-12">
                          <div class="form-floating mb-12">
                              <input type="password" class="form-control" id="CurrentPassword" placeholder="name@example.com">
                              <label for="floatingInput">Current Password</label>
                          </div>
                      </div>    
                      <div class="col-sm-12">
                          <div class="form-floating mb-12">
                              <input type="password" class="form-control" id="NewPassword" placeholder="name@example.com">
                              <label for="floatingInput">Password</label>
                          </div>
                      </div>
                      <div class="col-sm-12">
                          <div class="form-floating mb-12">
                              <input type="password" class="form-control" id="ConfirmNewPassword" placeholder="name@example.com">
                              <label for="floatingInput">Confirm Password</label>
                          </div>
                      </div>
 
                      <span id="message"></span>
                  </div>
              </div>
              <div class="modal-footer">
              
              <button type="button" class="btn btn-primary" id="save_pass">Save changes</button>
              </div>
          </div>
          </div>
      </div> 
<!---------------------------------------------------------------------------------------->
        <!----------------------Data tables Notif ------------------------>
        <div class="container w-auto pt-3" id="cmpt_tbl">
        <div class="card" style="background-color:rgb(237, 238, 240);" width="100%">
            <div class="card-body">
          <table id="tbl_notice" class="table table-striped nowrap" style="width:100%">
            <center><h4>All Notifications</h4></center>
              <thead>
                      <tr>
                        <th>Sr. No</th>
                        <th>Subject</th>
                        <th>Details</th>
                        <th>Date</th>
                      </tr>
              </thead>    
          </table>
          </div>
        </div>
      </div> 
   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  

  <footer class="text-center text-lg-start text-white" style="background-color: #3e4551" >

    
    <div class="text-center p-3 mt-3" style="background-color: rgba(0, 0, 0, 0.2)">
      © 2023 Copyright:
      <a class="text-white" href="">IHOMIS - Integrated Hospital Operations Management Information System</a>
    </div>
  </footer>


</body>
</html>
