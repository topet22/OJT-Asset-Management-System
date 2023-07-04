<?php
$servername = "localhost";
$username = "AMS_User";
$password = "P@ssW0rdAMS2023";
    $conn = new PDO("mysql:host=$servername;dbname=ihoms_inventory", $username, $password);
    session_start(); 

    if(!isset($_SESSION['SAuser_name'])){
        header("location:../");
    }
    else
    {
        $_SESSION['SAuser_name'];
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS  CDN-->
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="style.css">
    
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> 

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap5.min.js"></script>
    <script src="Resources/JS/SupAdmin.js"></script>
    
    <title>IHOMS IMS | Update Remarks</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container bg-dark">
        <a href="../SuperAdmin"> <img src="logo.png" class="rounded-circle" width="50" height="50"></a>
         <label style="color:#fff; margin-left:10px;"><?php echo ("Welcome {$_SESSION['SAuser_name']}!");?>&nbsp;&nbsp;<a href="View.php" target="_blank" class="link-light"><i class="bi bi-display"></i></a></label>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link" href="../SuperAdmin">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="Inventory.php">Inventory</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="AddStocks.php">Stocks</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="Archives.php">Archive</a>
              </li>
              <li class="nav-item">
                    <a class="nav-link" href="PMDone.php">PM Forms</a>
              </li>
              <li class="nav-item">
                <a class="nav-link position-relative " href="ViewServiceReports.php">Orders
                    <span id="blinker" class="position-absolute top-4 start-80 translate-middle badge rounded-pill" >
                        <span class="visually-hidden">unread messages</span>
                    </span>
                 </a>
              </li>
                <!--Report  drop down-->
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                <i class="bi bi-file-earmark-text-fill"></i>&nbsp;Records</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="ComputerReports.php"><i class="bi bi-pc"></i>&nbsp;Computer Records</a></li>
                  <li><a class="dropdown-item" href="PrinterReports.php"><i class="bi bi-printer"></i></i>&nbsp;Printer Records</a></li>
                  <li><a class="dropdown-item" href="OtherReports.php"><i class="bi bi-box2"></i></i>&nbsp;Others Records</a></li>
                  <!-- <li><a class="dropdown-item" href="ViewServiceReports.php"><i class="bi bi-ticket-detailed-fill"></i>&nbsp;Service Reports</a></li> -->
                  <li><a class="dropdown-item" href="JOSummary.php"><i class="bi bi-clipboard2"></i>&nbsp;Job Order Summary Records</a></li>
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
                  <!-- <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#maintenance"><i class="bi bi-screwdriver"></i>&nbsp;Preventinve Maintenance</a></li> -->
                  <hr class="hr hr-blurry" />
                  <li><a class="dropdown-item" href="../logout.php"><i class="bi bi-arrow-left"></i>&nbsp;Log Out</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
    </nav>
    <?php include 'modalsignature.php' ?>
    <?php include 'DepartmentandUserModal.php' ?>

<!---------------------->
<div class="container">     
        <div class="row pt-2">
            <div class="col-md pt-2">
                <div class="form-floating">
                    <select class="form-select" id="searchtype">
                        <option value="--SELECT--">--SELECT--</option>
                        <option value="Computer">Computer</option>
                        <option value="Printer">Printer</option>
                        <option value="Others">Others</option>
                    </select>
                    <label for="user">What Type</label>
                </div>
            </div>
            <div class="col-md pt-2">
                <div class="form-floating">
                    <select class="form-select" id="searchdept">
                        <option value="--SELECT--">-----SELECT DEPARTMENT----- </option>
                    </select>
                    <label for="user">Department</label>
                </div>
            </div>
        </div>
    </div>
<!--------------------------------------------------REMARKS!-------------------------------------------------->
<div class="modal fade" id="editStatus" tabindex="-1" aria-labelledby="editStatus" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Remarks</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row g-2">
            <div class="col-sm-12">
              <div class="form-floating">
                  <select class="form-select" id="InvenStatus" aria-label="Floating label select example">
                  <option value="--SELECT--"selected>Status</option>
                  <option value="In Use">In Use</option>
                  <option value="For Repair/Pulled out">For Repair</option>
                  <option value="Condemned">Condemned</option>
                  </select>
                  <label for="floatingSelect">Status</label>
              </div>
          </div>
          <div class="col-sm-12" hidden>
              <div class="form-floating">
                <input type="text" class="form-control" id="statusID" placeholder="name@example.com" disabled>
                <input type="text" class="form-control" id="statusTYPEs" placeholder="name@example.com" disabled>
              </div>
          </div>
                <div class="input-group col-sm-12">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Reasons</span>
                  </div>
                  <textarea class="form-control" aria-label="With textarea" id="InvenReason"></textarea>
                </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="save_rems">Save</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>
        <!----------------------Data tables Computer ------------------------>
        <div class="container w-auto pt-3" id="cmpt_tblstat">
        <div class="card" style="background-color:rgb(237, 238, 240);" width="100%">
         <h5 class="card-header mb-4">List of Computers</h5>

          <table id="tblstat_computers" class="table table-striped" style="width:100%;">
              <thead>
                      <tr>
                          <th>Item ID</th>
                          <th>Property No</th>
                          <th>Serial No</th>
                          <th>Status</th>
                          <th>Reason</th>
                          <th>Action</th>  
                      </tr>
              </thead>    
                  <tbody id="comp_datastat">
                  </tbody>
                  <tfoot>
                      <tr>
                          <th>Item ID</th>
                          <th>Property No</th>
                          <th>Serial No</th>
                          <th>Status</th>
                          <th>Reason</th>
                          <th>Action</th>
                      </tr>
                  </tfoot>
          </table>
        </div>
      </div> 
      <!----------------------Data tables Printer ------------------------>
      <div class="container w-auto pt-3" id ="prt_tblstat">
        <div class="card" style="background-color:rgb(237, 238, 240);" width="100%">
         <h5 class="card-header mb-4">List of Printers</h5>
          <table id="tbl_printersstat" class="table table-striped" style="width:100%;">
           
              <thead>
                      <tr>
                          <th>Item ID</th>
                          <th>Property No</th>
                          <th>Serial No</th>
                          <th>Status</th>
                          <th>Reason</th>
                          <th>Action</th>  
                      </tr>
              </thead>    
                  <tbody id="prt_datastat">
                    <!---PRT TABLE-->
                  </tbody>
                  <tfoot>
                      <tr>
                          <th>Item ID</th>
                          <th>Property No</th>
                          <th>Serial No</th>
                          <th>Status</th>
                          <th>Reason</th>
                          <th>Action</th>  
                      </tr>
                  </tfoot>
          </table>
        </div>
      </div> 
      <!----------------------Data tables Others ------------------------>
      <div class="container w-auto pt-3" id ="oth_tblstat">
        <div class="card" style="background-color:rgb(237, 238, 240);" width="100%">
         <h5 class="card-header mb-4">List of Others</h5>
          <table id="tbl_othersstat" class="table table-striped no-wrap" style="width:100%;">
            
              <thead>
                      <tr>
                          <th>Item ID</th>
                          <th>Property No</th>
                          <th>Serial No</th>
                          <th>Status</th>
                          <th>Reason</th>
                          <th>Action</th>  
                      </tr>
              </thead>    
                  <tbody id="etc_datastat">
                    <!---Others TABLE-->
                  </tbody>
                  <tfoot>
                      <tr>
                          <th>Item ID</th>
                          <th>Property No</th>
                          <th>Serial No</th>
                          <th>Status</th>
                          <th>Reason</th>
                          <th>Action</th>  
                      </tr>
                  </tfoot>
          </table>
        </div>
      </div>         

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>