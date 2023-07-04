<?php
    $servername = "localhost";
    $username = "AMS_User";
    $password = "P@ssW0rdAMS2023";
    $conn = new PDO("mysql:host=$servername;dbname=ihoms_inventory", $username, $password);
    session_start(); 

    if(!isset($_SESSION['Auser_name'])){
        header("location:../");
    }
    else
    {
        $_SESSION['Auser_name'];
        $_SESSION['Afull_name'];
    }
?>
 <?php include 'deptanduseradd.php' ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> 
    <link rel="stylesheet" href="Resources/css/style.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.4.0/css/dataTables.dateTime.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap5.min.js"></script>
    <script src=" https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
   <script src="https://cdn.datatables.net/datetime/1.4.0/js/dataTables.dateTime.min.js"></script>

    <!----Datatables Button---->
   <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
    
    <script src="Resources/JS/SupAdmin.js"></script>
    <script src="Resources/JS/PM.js"></script>
    <script src="Resources/JS/ForReports.js"></script>


    <!--CDN para sa datatable button-->

    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script> 




    <title>IHOMS AMS | Other Reports</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container bg-dark">
        <a href="../Admin"> <img src="logo.png" class="rounded-circle" width="50" height="50"></a>
            <label style="color:#fff; margin-left:10px;"><?php echo ("Welcome {$_SESSION['Auser_name']}!");?></label>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link" href="../Admin">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="Inventory.php">Inventory</a>
              </li>
              <li class="nav-item">
             
             <a class="nav-link position-relative " href="ServiceReports.php">Orders
             <span id="blinker" class="badge position-absolute start-80 translate-middle rounded-pill" >     
             <span class="visually-hidden">unread messages</span>
             </span>
             </a>
             </li>
              <li class="nav-item">
                <a class="nav-link" href="Archives.php">Archive</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="PMDone.php">PM Form</a>
              </li>
                <!--Report  drop down-->
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="ComputerReports" role="button" aria-expanded="false">
                <i class="bi bi-file-earmark-text-fill"></i>&nbsp;Records</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="ComputerReports.php"><i class="bi bi-pc"></i>&nbsp;Computer Records</a></li>
                  <li><a class="dropdown-item" href="PrinterReports.php"><i class="bi bi-printer"></i></i>&nbsp;Printer Records</a></li>
                  <li><a class="dropdown-item" href="OtherReports.php"><i class="bi bi-box2"></i></i>&nbsp;Others Records</a></li>
                  <!-- <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#PMModal"><i class="bi bi-people"></i>&nbsp;PM Activity Checklist</a></li> -->
                  <li>
                     <a class="dropdown-item" href="https://drive.google.com/drive/folders/1thAA1_ltsId3kqV0QLnQEZcAPFjpNQhA?usp=sharing"><i class="bi bi-hand-thumbs-up-fill"></i>&nbsp;Feedbacks</a>
                  </li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                    <i class="bi bi-gear-fill"></i>&nbsp;Settings</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#DeptModal"><i class="bi bi-building-fill-gear"></i>&nbsp;Department Management</a></li>
                  <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#UserModal"><i class="bi bi-people"></i>&nbsp;User Management</a></li>
                  <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#Signature"><i class="bi bi-pencil"></i>&nbsp;Signature</a></li>
                  <li><a class="dropdown-item round-pill"  href="remarks.php"><i class="bi bi-bookmark-plus-fill"></i>&nbsp;Remarks</a></li>
                  <li><a class="dropdown-item round-pill"  data-bs-toggle="modal" data-bs-target="#maintenance"><i class="bi bi-screwdriver"></i></i>&nbsp;Maintenance</a></li>
                  <hr class="hr hr-blurry" />
                  <li><a class="dropdown-item" href="../logout.php"><i class="bi bi-arrow-left"></i>&nbsp;Log Out</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
    </nav>
    
          <!-- MODAL ADD MAINTENANCE START -->
          <div class="modal fade" id="maintenance" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Schedule Maintenance</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <div class="row g-2">
                    <div class="col-sm">
                          <div class="form-floating mb-2">
                              <input type="date" class="form-control" id="scheduledate" placeholder="name@example.com">
                              <label for="floatingInput">Date</label>
                          </div>
                      </div>
                    </div>
                <div class="row g-2">
                    <div class="col-sm">
                          <div class="form-floating mb-2">
                          <select class="form-select" id="scheduleDepartment" aria-label="Floating label select example">
                              <option selected>Select Department</option>
                              </select>
                              <label for="floatingSelect">Department</label>
                          </div>
                      </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="savepm">Save changes</button>
                </div>
                </div>
            </div>
            </div>
<!-- --------------------------------Modal Maintenance END-------------------------------->

    <!----------------------------------Modal View Reports-------------------------------->
    <div class="modal fade bd-example-modal-lg" id="view" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Audit Reel</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <table id="other_auditsreports" class="table table-hover" style="100%;">
                        <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>User</th>
                                    <th>Action</th>
                                    <th>audit_DATE</th>
                                </tr>
                            </thead>
                            <tbody id="othaudit_datas">
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>User</th>
                                    <th>Action</th>
                                    <th>audit_DATE</th>
                                </tr>
                            </tfoot>    
                    </table>
                </div>
                <div class="modal-footer">
                </div>
                </div>
            </div>
            </div>  
        <!-- DATA TABOOOLS -->
        <div class="container mt-4" id="cmpt_tbl_report">
          <div class="card" style="background-color:rgb(237, 238, 240);" width="100%">
        <h5 class="card-header">List of Other Equipments</h5>
        <table border="0" cellspacing="3" cellpadding="3">
                <tbody><tr>
                    <td>Start date:</td>
                    <td><input type="text" id="min" name="min"></td>
                </tr>
                <tr>
                    <td>End date:</td>
                    <td><input type="text" id="max" name="max"></td>
                </tr>
            </tbody>
        </table>
        <div class="card-body">
            <h5 class="card-title"></h5>
            <table id="other_report" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                    <th>Deparment</th>
                    <th>User</th>
                    <th>Property Number</th>
                    <th>Serial Number</th>
                    <th>Model</th>
                    <th>Brand</th>
                    <th>Date Acquired</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody id="otherreport_data">

                </tbody>
                <tfoot>
                    <tr>
                    <th>Deparment</th>
                    <th>User</th>
                    <th>Property Number</th>
                    <th>Serial Number</th>
                    <th>Model</th>
                    <th>Brand</th>
                    <th>Date Acquired</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Action</th>
                    </tr>
                </tfoot>    
            </table>
        </div>
    </div>
</div>
    <!-- Optional JavaScript; choose one of the two! -->
    <script src="Resources/JS/Signature.js"></script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
   
  </body>
</html>