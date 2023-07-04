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

    <!-- Bootstrap CSS CDN-->
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/dataTables.bootstrap5.min.css">

    <link rel="stylesheet" href="Resources/css/style.css">
    <link rel="stylesheet" href="style.css">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> 

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap5.min.js"></script>
    <!--CDN para sa datatable button-->
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>

    <script src="Resources/JS/PM.js"></script>
    <script src="Resources/JS/SupAdmin.js"></script>
    <title>IHOMS AMS | View Inventory</title>
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
                <a class="nav-link active rounded-pill link-dark" style="background-color: aliceblue;" href="Inventory.php">Inventory</a>
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
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                <i class="bi bi-file-earmark-text-fill"></i>&nbsp;Records</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="ComputerReports.php"><i class="bi bi-pc"></i>&nbsp;Computer Records</a></li>
                  <li><a class="dropdown-item" href="PrinterReports.php"><i class="bi bi-printer"></i></i>&nbsp;Printer Records</a></li>
                  <li><a class="dropdown-item" href="OtherReports.php"><i class="bi bi-box2"></i></i>&nbsp;Others Records</a></li>
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

     <!------------------------Add Inventory Trigger Button----------------------------------->
     <div class="container pt-2 pb-2">
        <div class="d-grid gap-2">
            <button type="button" class="btn btn-outline-primary link-dark" id="" data-bs-toggle="modal" data-bs-target="#addCompModal">
                <i class="bi bi-file-earmark-plus"></i> &nbsp;ADD INVENTORY
            </button> 
          </div>
    </div>
  <div class="container">     
        <div class="row pt-2">
            <div class="col-md pt-2">
                <div class="form-floating">
                    <select class="form-select" id="searchwhat">
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
                    <select class="form-select" id="searchwhere">
                        <option value="--SELECT--">-----SELECT DEPARTMENT----- </option>
                    </select>
                    <label for="user">Department</label>
                </div>
            </div>
        </div>
    </div>
      


  <!----------------------Modal View in Action ------------------------> 
  <div class="modal fade" id="view" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Item Details</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row g-2">
            <div class="col-sm-6">
                <div class="form-floating">
                    <select class="form-select" id="ViewWhatType" aria-label="Floating label select example" disabled>
                    <option>Select Type</option>
                    <option value="Computer">Computer</option>
                    <option value="Printer">Printer</option>
                    <option value="Others">Others</option>
                    </select>
                    <label for="floatingSelect">What Type</label>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="ViewInvPropNo" placeholder="name@example.com" disabled>
                    <label for="floatingInput">Property Number</label>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="ViewInvSerial" placeholder="name@example.com" disabled>
                    <label for="floatingInput">Serial</label>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-floating mb-2">
                    <input type="date" class="form-control" id="ViewInvDate" placeholder="name@example.com" disabled>
                    <label for="floatingInput">Date Acquired</label>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="ViewInvModel" placeholder="name@example.com" disabled>
                    <label for="floatingInput">Model</label>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="ViewInvBrand" placeholder="name@example.com" disabled>
                    <label for="floatingInput">Brand</label>
                </div>
            </div>
            <div class="col-sm-6" id="desc">
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="ViewInvDesc" placeholder="name@example.com" disabled>
                    <label for="floatingInput">Description</label>
                </div>
            </div>
            <div id="sel_comp" class="row g-2">
            <div class="col-sm-6" >
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="ViewCompOS" placeholder="name@example.com" disabled>
                    <label for="floatingInput">Operating System</label>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-floating">
                    <select class="form-select" id="ViewComptype" aria-label="Floating label select example" disabled>
                    <option >Type of Computer</option>
                    <option value="Desktop">DESKTOP</option>
                    <option value="All-IN-1">ALL IN 1</option>
                    <option value="Assembled PC">ASSEMBLED PC</option>
                    <option value="Laptop">LAPTOP</option>
                    <option value="Others">OTHERS</option>
                    </select>
                    <label for="floatingSelect">Type of Computer</label>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-floating">
                    <select class="form-select" id="ViewCompStorageType" aria-label="Floating label select example" disabled>
                    <option >Type of Storage</option>
                    <option value="HDD">HDD</option>
                    <option value="SSD">SSD</option>
                    <option value="BOTH">HDD & SSD</option>
                    </select>
                    <label for="floatingSelect">Type of Storage</label>
                </div>
            </div>
            <div class="col-sm-6" id="HDDdiv">
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="ViewHDDCap" placeholder="name@example.com" disabled>
                    <label for="floatingInput">HDD Capacity</label>
                </div>
            </div>
            <div class="col-sm-6" id="SSDdiv">
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="ViewSSDCap" placeholder="name@example.com" disabled>
                    <label for="floatingInput">SSD Capacity</label>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="ViewCompRAM" placeholder="name@example.com" disabled>
                    <label for="floatingInput">RAM</label>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="ViewCompProcessor" placeholder="name@example.com" disabled>
                    <label for="floatingInput">Processor</label>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="ViewOSLicense" placeholder="name@example.com" disabled>
                    <label for="floatingInput">License</label>
                </div>
            </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    </div>
</div>
</div>
</div>
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
    <!----------------------------------Modal Add ITEM-------------------------------->
    <div class="modal fade" id="addCompModal" tabindex="-1" aria-labelledby="addCompModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="addCompModal">Add Item</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-2">
                    <div class="col-sm-6">
                        <div class="form-floating">
                            <select class="form-select" id="WhatType" aria-label="Floating label select example">
                            <option value="--SELECT--">Select Type</option>
                            <option value="Computer">Computer</option>
                            <option value="Printer">Printer</option>
                            <option value="Others">Others</option>
                            
                            </select>
                            <label for="floatingSelect">What Type</label>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-floating">
                            <select class="form-select" id="InvDept" aria-label="Floating label select example">
                            <option selected>Select Department</option>
                            </select>
                            <label for="floatingSelect">Department</label>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-floating mb-2">
                            <input type="text" class="form-control" id="InvUser" placeholder="name@example.com">
                            <label for="floatingInput">User</label> 
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-floating mb-2">
                            <input type="text" class="form-control" id="InvPropNo" placeholder="name@example.com">
                            <label for="floatingInput">Property Number</label>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-floating mb-2">
                            <input type="text" class="form-control" id="InvSerial" placeholder="name@example.com">
                            <label for="floatingInput">Serial</label>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-floating mb-2">
                            <input type="date" class="form-control" id="InvDate" placeholder="name@example.com">
                            <label for="floatingInput">Date Acquired</label>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-floating mb-2">
                            <input type="text" class="form-control" id="InvModel" placeholder="name@example.com">
                            <label for="floatingInput">Model</label>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-floating mb-2">
                            <input type="text" class="form-control" id="InvBrand" placeholder="name@example.com">
                            <label for="floatingInput">Brand</label>
                        </div>
                    </div>
                    <div class="col-sm-6" id="adddesc">
                        <div class="form-floating mb-2">
                            <input type="text" class="form-control" id="InvDesc" placeholder="name@example.com">
                            <label for="floatingInput">Description</label>
                        </div>
                    </div>
                    <div id="addsel_comp" class="row g-2">
                    <div class="col-sm-6">
                        <div class="form-floating mb-2">
                            <input type="text" class="form-control" id="CompOS" placeholder="name@example.com">
                            <label for="floatingInput">Operating System</label>
                        </div>
                    </div>
                    <!--May bug ang type of computer-->
                    <div class="col-sm-6">
                        <div class="form-floating">
                            <select class="form-select" id="Comptype" aria-label="Floating label select example">
                            <option value="--SELECT--">Type of Computer</option>
                            <option value="Desktop">DESKTOP</option>
                            <option value="All-IN-1">ALL IN 1</option>
                            <option value="Assembled PC">ASSEMBLED PC</option>
                            <option value="Laptop">LAPTOP</option>
                            <option value="Others">OTHERS</option>
                            </select>
                            <label for="floatingSelect">Type of Computer</label>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-floating">
                            <select class="form-select" id="CompStorageType" aria-label="Floating label select example">
                            <option value="--SELECT--">Type of Storage</option>
                            <option value="HDD">HDD</option>
                            <option value="SSD">SSD</option>
                            <option value="BOTH">HDD & SSD</option>
                            </select>
                            <label for="floatingSelect">Type of Storage</label>
                        </div>
                    </div>
                    <div class="col-sm-6" id="AddHDDdiv">
                        <div class="form-floating mb-2">
                            <input type="text" class="form-control" id="HDDCap" placeholder="name@example.com">
                            <label for="floatingInput">HDD Capacity</label>
                        </div>
                    </div>
                    <div class="col-sm-6" id="AddSSDdiv">
                        <div class="form-floating mb-2">
                            <input type="text" class="form-control" id="SSDCap" placeholder="name@example.com">
                            <label for="floatingInput">SSD Capacity</label>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-floating mb-2">
                            <input type="text" class="form-control" id="CompRAM" placeholder="name@example.com">
                            <label for="floatingInput">RAM</label>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-floating mb-2">
                            <input type="text" class="form-control" id="CompProcessor" placeholder="name@example.com">
                            <label for="floatingInput">Processor</label>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-floating mb-2">
                            <input type="text" class="form-control" id="OSLicense" placeholder="name@example.com">
                            <label for="floatingInput">License</label>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="save_inv">Save changes</button>
            </div>
        </div>
        </div>
    </div>
<div class="container mt-4" id="cmpt_tbl">
    <div class="card" style="background-color:rgb(237, 238, 240);" width="100%">
        <h5 class="card-header">List of Computers</h5>
        <div class="card-body">
            <h5 class="card-title"></h5>
            <table id="tbl_computers" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Item ID</th>
                        <th>Property Number</th>
                        <th>Serial</th>
                        <th>Date Acquired</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="comp_data">
                </tbody>
                <tfoot>
                        <th>User</th>
                        <th>Item ID</th>
                        <th>Property Number</th>
                        <th>Serial</th>
                        <th>Date Acquired</th>
                        <th>Action</th>
                </tfoot>    
            </table>
        </div>
    </div>
</div>

<div class="container mt-4" id="prt_tbl">
    <div class="card" style="background-color:rgb(237, 238, 240);" width="100%">
        <h5 class="card-header">List of Printers</h5>
        <div class="card-body">
            <h5 class="card-title"></h5>
            <table id="tbl_printers" class="table table-striped " style="width:100%">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Item ID</th>
                        <th>Property Number</th>
                        <th>Serial</th>
                        <th>Date Acquired</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="prt_data">
                </tbody>
                <tfoot>
                        <th>User</th>
                        <th>Item ID</th>
                        <th>Property Number</th>
                        <th>Serial</th>
                        <th>Date Acquired</th>
                        <th>Action</th>
                </tfoot>    
            </table>
        </div>
    </div>
</div>

<div class="container mt-4" id="oth_tbl">
    <div class="card" style="background-color:rgb(237, 238, 240);" width="100%">
        <h5 class="card-header">List of Other Equipments</h5>
        <div class="card-body">
            <h5 class="card-title"></h5>
            <table id="tbl_others" class="table table-striped " style="width:100%">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Item ID</th>
                        <th>Property Number</th>
                        <th>Serial</th>
                        <th>Date Acquired</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="etc_data">
                </tbody>
                <tfoot>
                        <th>User</th>
                        <th>Item ID</th>
                        <th>Property Number</th>
                        <th>Serial</th>
                        <th>Date Acquired</th>
                        <th>Action</th> 
                </tfoot>    
            </table>
        </div>
    </div>
</div>

<!---------------------->



<script src="Resources/JS/Signature.js"></script>




    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>