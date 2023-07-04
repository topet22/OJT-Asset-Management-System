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
        if ($_SESSION['depts'] == "MCCO")
        {
          $_SESSION['depts']; 
        }
        else
        {
          $_SESSION['depts'];
          header("location:../User");
        }
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
        <a href="../MCC"> <img src="../logo.png" class="rounded-circle" width="50" height="50"></a>
            <label style="color:#fff; margin-left:10px;"><?php echo ("Welcome {$_SESSION['user_name']}!");?></label>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
             
              <li class="nav-item">
                <a class="nav-link rounded-pill link-dark" style="background-color:aliceblue;" href="../User">Dashboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="PMDone.php">PM Forms</a>
              </li>
              <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
              <i class="bi bi-ticket-perforated-fill"></i>&nbsp;Job Order</a>
              <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="JobOrder1.php"><i class="bi bi-gear-wide-connected"></i>&nbsp;For Equipments</a></li>
                <li><a class="dropdown-item" href="JobOrder2.php"><i class="bi bi-person-gear"></i>&nbsp;For Other Equipments</a></li>
                <li><a class="dropdown-item" href="JobOrder3.php"><i class="bi bi-person-check-fill"></i>&nbsp;For Approval</a></li>
              </ul>
            </li>
              <li class="nav-item">
                <a class="nav-link" href="https://docs.google.com/forms/d/e/1FAIpQLSfhsDFMcrQKOATkvlX60js9EEarQRWu7h_PJoAMK9HF6Etn5Q/viewform?fbclid=IwAR1M-OLG4FLDqxz_gvbnGg9t7YWUf2DU8VqjMn4V65AykPS3XVnWBNQ5oW0"><i class="bi bi-hand-thumbs-up-fill"></i>&nbsp;Feedback</a>
              </li>
            
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                    <i class="bi bi-gear-fill"></i>&nbsp;Settings</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#UserModal"><i class="bi bi-shield-lock-fill"></i>&nbsp;Change Password</a></li>
                  <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#Signature"><i class="bi bi-pencil"></i>&nbsp;Signature</a></li>
                  <li><a class="dropdown-item" href="../logout.php"><i class="bi bi-arrow-left"></i>&nbsp;Log Out</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
    </nav>

    <?php include 'Resources/template/modal.php' ?>
    <div class="container">
      <div class="row align-items-start">
      <marquee id="pmschedule">
        <h1 id="pmcontent"></h1>
      </marquee>
      </div>
    </div>
<!---------------------------------------------------------------------------------------->
<div class="container">
        <div class="row">
           <div class="col-md-4 mt-1">
                            <div class="card card-stats bg-info card-round">    
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-2">
                                            <div class="icon fa-lg text-center">
                                                <h1><i class="bi bi-pc-display"></i></h1>
                                            </div>
                                        </div>
                                      <div class="col-1 col-stats">
                                        
                                        </div>
                                        <div class="col col-stats">
                                            <div class="numbers mt-4">
                                                <h5 class="fw-bold text-uppercase">Computer</h5>
                                                <h4 class="fw-bold" id="NumberOfComputer"></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                    </div>
                        <div class="col-md-4 mt-1">
                            <div class="card card-stats bg-info card-round">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="icon fa-lg text-center">
                                                <h1><i class="bi bi-printer-fill"></i></h1>
                                            </div>
                                        </div>
                                        <div class="col-1 col-stats">
                                        
                                        </div>
                                        <div class="col col-stats">
          
                             <div class="numbers mt-4">
                                                <h5 class="fw-bold text-uppercase">Printers</h5>
                                                <h4 class="fw-bold" id="NumberOfPrinter"></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-md-4 mt-1">
                            <div class="card card-stats bg-info card-round">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="icon fa-lg text-center">
                                                <h1><i class="bi bi-gear-wide-connected"></i></h1>
                                            </div>
                                        </div>
                                        <div class="col-1 col-stats">
                                        
                                        </div>
                                        <div class="col col-stats">
                                            <div class="numbers mt-4">
                                                <h5 class="fw-bold text-uppercase">Others</h5>
                                                <h4 class="fw-bold" id="NumberOfOthers"></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                  </div>  
                </div>
 <!------------------------------------------------------------------------------------------>  

        <!----------------------Data tables Computer ------------------------>
        <div class="container w-auto pt-3" id="cmpt_tbl">
        <div class="card" style="background-color:rgb(237, 238, 240);" width="100%">
         <h5 class="card-header">List of Computers</h5>
            <div class="card-body">
          <table id="tbl_computers" class="table table-striped nowrap" style="width:100%">
            <!-- <center><h4>Computer Inventory Table</h4></center> -->
              <thead>
                      <tr>
                        <th>Designated User</th>
                        <th>Property Number</th>
                        <th>Serial Number</th>
                        <th>Model</th>
                        <th>Brand</th>
                        <th>Type</th>
                        <th>Operating System</th> 
                        <th>Date Acquired</th>
                        <th>Status</th>
                        <th>Reason</th> 
                      </tr>
              </thead>    
                  <tbody id = "comp_data">
                  </tbody>
                  <tfoot>
                      <tr>
                        <th>Designated User</th>
                        <th>Property Number</th>
                        <th>Serial Number</th>
                        <th>Model</th>
                        <th>Brand</th>
                        <th>Type</th>
                        <th>Operating System</th>
                        <th>Date Acquired</th>
                        <th>Status</th>
                        <th>Reason</th> 
                      </tr>
                  </tfoot>
          </table>
          </div>
        </div>
      </div> 
      <!----------------------Data tables Printer ------------------------>
      <div class="container w-auto pt-3" id ="prt_tbl">
        <div class="card" style="background-color:rgb(237, 238, 240);" width="100%">
         <h5 class="card-header">List of Printers</h5>
         <div class="card-body">
          <table id="tbl_printers" class="table table-striped nowrap" style="width:100%">
             <!-- <center><h4>Printer Inventory Table</h4></center> -->
              <thead>
                      <tr>
                          <th>Designated User</th>
                          <th>Property No</th>
                          <th>Serial No</th>
                          <th>Model</th>
                          <th>Brand</th>
                          <th>Date Acquired</th>
                          <th>Status</th>
                          <th>Reason</th>  
                      </tr>
              </thead>    
                  <tbody id="prt_data">
                    <!---PRT TABLE-->
                  </tbody>
                  <tfoot>
                      <tr>
                          <th>Designated User</th>
                          <th>Property No</th>
                          <th>Serial No</th>
                          <th>Model</th>
                          <th>Brand</th>
                          <th>Date Acquired</th>
                          <th>Status</th>
                          <th>Reason</th>  
                      </tr>
                  </tfoot>
          </table>
          </div>
        </div>
      </div> 
      <!----------------------Data tables Others ------------------------>
      <div class="container w-auto pt-3" id ="oth_tbl">
        <div class="card" style="background-color:rgb(237, 238, 240);" width="100%">
         <h5 class="card-header">List of Other Equipments</h5>
         <div class="card-body">
          <table id="tbl_others" class="table table-striped nowrap" style="width:100%">
             <!-- <center><h4>Others Equipments Inventory Table</h4></center> -->
              <thead>
                      <tr>
                          <th>Designated User</th>
                          <th>Property No</th>
                          <th>Serial No</th>
                          <th>Model</th>
                          <th>Brand</th>
                          <th>Date Acquired</th>
                          <th>Status</th>
                          <th>Reason</th>  
                      </tr>
              </thead>    
                  <tbody id="etc_data">
                    <!---Others TABLE-->
                  </tbody>
                  <tfoot>
                      <tr>
                          <th>Designated User</th>
                          <th>Property No</th>
                          <th>Serial No</th>
                          <th>Model</th>
                          <th>Brand</th>
                          <th>Date Acquired</th>
                          <th>Status</th>
                          <th>Reason</th>
                      </tr>
                  </tfoot>
          </table>
        </div>
        </div>
      </div>  
      

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  

  <footer class="text-center text-lg-start text-white" style="background-color: #3e4551" >

    
    <div class="text-center p-3 mt-3" style="background-color: rgba(0, 0, 0, 0.05);">
      © 2023 Copyright:
      <a class="text-white" href="">IHOMS - Integrated Hospital Operations Management System</a>
    </div>
  </footer>


</body>
<script src="Resources/JS/Signature.js"></script>
</html>
