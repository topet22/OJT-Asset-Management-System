<!-- WAG GAGALAWIN -->
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


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IHOMS AMS | PM Forms</title>
    <!----------CDN LINKSSSSS------------>
   
   
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.5/css/buttons.dataTables.min.css">
    

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <!----Datatables Button---->
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
    <script src="Resources/JS/SupAdminStock.js"></script>
    <script src="Resources/JS/PM.js"></script>
    <script src="Resources/JS/PMDone.js"></script>
  </head>
  <body style="background:;">
    <?php include 'deptanduseradd.php'?>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
         <!-- logo -->
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
                <a class="nav-link active rounded-pill link-dark" style="background-color: aliceblue;"  href="PMDone.php">PM Form</a>
              </li>
              
                    <!--Report  drop down-->
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                    <i class="bi bi-file-earmark-text-fill"></i>&nbsp;Records</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="ComputerReports.php"><i class="bi bi-pc"></i>&nbsp;Computer Records</a></li>
                        <li><a class="dropdown-item" href="PrinterReports.php"><i class="bi bi-printer"></i>&nbsp;Printer Records</a></li>
                        <li><a class="dropdown-item" href="OtherReports.php"><i class="bi bi-box2"></i>&nbsp;Others Records</a></li>
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
                  <li><a class="dropdown-item round-pill" href="remarks.php"><i class="bi bi-bookmark-plus-fill"></i>&nbsp;Remarks</a></li>
                  <li><a class="dropdown-item round-pill"  data-bs-toggle="modal" data-bs-target="#maintenance"><i class="bi bi-screwdriver"></i></i>&nbsp;Maintenance</a></li>
                  <hr class="hr hr-blurry"/>
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
    <!-- Modal for PM-->
    <div class="container pt-2 pb-2">
        <div class="d-grid gap-2">
            <button type="button" class="btn btn-outline-primary link-dark" id="" data-bs-toggle="modal" data-bs-target="#PMModal">
                <i class="bi bi-file-earmark-plus"></i> &nbsp;Add Preventive Maintenance
            </button> 
          </div>
    </div>
    <!-- Modal for PM End-->
            <!-- DATA TABOOOLS -->
            <div class="container mt-4" id="tbl_PMS">
          <div class="card" style="background-color:rgb(237, 238, 240);" width="100%">
        <h5 class="card-header">PM List</h5>
        <div class="card-body">
            <h5 class="card-title"></h5>
            <table id="PM_Reports" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                    <th>Performed By</th>
                    <th>Deparment</th>
                    <th>Serial Number</th>
                    <th>Status</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody id="PM_data">

                </tbody>
                <tfoot>
                    <tr>
                    <th>Performed By</th>
                    <th>Deparment</th>
                    <th>Serial Number</th>
                    <th>Status</th>
                    <th>Action</th>
                    </tr>
                </tfoot>    
            </table>
        </div>
    </div>
</div>

  </body>
  <script>
    // function isChecked(event){
    // if(event.getAttribute('checked') === null){
    //     event.setAttribute('checked','');
    // }
    // else{
    //     event.removeAttribute('checked');
    // }
    // }
    function printDiv4(divName) {
        
                var printContents = document.getElementById(divName).innerHTML;
                var originalContents = document.body.innerHTML;
                document.body.innerHTML = printContents;

                window.print();

                document.body.innerHTML = originalContents;
                location.reload(true);
                
            }
   
  </script>

  <script src="Resources/JS/Signature.js"></script>
  
</html>