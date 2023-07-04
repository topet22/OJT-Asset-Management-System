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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IHOMS AMS | View Stocks</title>
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
    <script src="Resources/JS/SupAdmin.js"></script>

  </head>
  <body style="background:;">
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
                <a class="nav-link active rounded-pill link-dark" style="background-color: aliceblue;" href="AddStocks.php">Stocks</a>
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
                  <li><a class="dropdown-item round-pill" href="remarks.php"><i class="bi bi-bookmark-plus-fill"></i>&nbsp;Remarks</a></li>
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

    <!----------------------------------Modal Add Stock-------------------------------->
    <div class="modal fade" id="AddStockModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Add Stock</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <div class="row g-2">
                      <div class="col-sm-6">
                          <div class="form-floating">
                              <select class="form-select" id="AddStockWhatType" aria-label="Floating label select example">
                              <option value="--SELECT--">Select Type</option>
                              <option value="Computer">Computer</option>
                              <option value="Printer">Printer</option>
                              <option value="Others">Others</option>
                              
                              </select>
                              <label for="floatingSelect">What Type</label>
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-floating mb-2">
                              <input type="text" class="form-control" id="AddStockInvPropNo" placeholder="name@example.com">
                              <label for="floatingInput">Property Number</label>
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-floating mb-2">
                              <input type="text" class="form-control" id="AddStockInvSerial" placeholder="name@example.com">
                              <label for="floatingInput">Serial</label>
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-floating mb-2">
                              <input type="date" class="form-control" id="AddStockInvDate" placeholder="name@example.com">
                              <label for="floatingInput">Date</label>
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-floating mb-2">
                              <input type="text" class="form-control" id="AddStockInvModel" placeholder="name@example.com">
                              <label for="floatingInput">Model</label>
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-floating mb-2">
                              <input type="text" class="form-control" id="AddStockInvBrand" placeholder="name@example.com">
                              <label for="floatingInput">Brand</label>
                          </div>
                      </div>
                      <div class="col-sm-6" id="AddStockdesc">
                          <div class="form-floating mb-2">
                              <input type="text" class="form-control" id="AddStockInvDesc" placeholder="name@example.com">
                              <label for="floatingInput">Description</label>
                          </div>
                      </div>
                      <div id="AddStocksel_comp" class="row g-2">
                      <div class="col-sm-6">
                          <div class="form-floating mb-2">
                              <input type="text" class="form-control" id="AddStockCompOS" placeholder="name@example.com">
                              <label for="floatingInput">Operating System</label>
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-floating">
                              <select class="form-select" id="AddStockComptype" aria-label="Floating label select example">
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
                          <div class="form-floating mb-2">
                            <select class="form-select" id="AddStockCompStorageType">
                                <option value="SSD">SSD</option>
                                <option value="HDD">HDD</option>
                                <option value="BOTH">SSD and HDD</option>
                              </select>
                              <label for="floatingInput">Storage Type</label>
                          </div>
                      </div>
                      <div class="col-sm-6" id="AddStockSSDdiv">
                          <div class="form-floating mb-2">
                              <input type="text" class="form-control" id="AddStockSSDCap" placeholder="name@example.com">
                              <label for="floatingInput">SSD Capacity</label>
                          </div>
                      </div>
                      <div class="col-sm-6" id="AddStockHDDdiv">
                        <div class="form-floating mb-2">
                            <input type="text" class="form-control" id="AddStockHDDCap" placeholder="name@example.com">
                            <label for="floatingInput">HDD Capacity</label>
                        </div>
                    </div>
                      <div class="col-sm-6">
                        <div class="form-floating mb-2">
                            <input type="text" class="form-control" id="AddStockCompRAM" placeholder="name@example.com">
                            <label for="floatingInput">RAM</label>
                        </div>
                    </div>
                      <div class="col-sm-6">
                          <div class="form-floating mb-2">
                              <input type="text" class="form-control" id="AddStockCompProcessor" placeholder="name@example.com">
                              <label for="floatingInput">Processor</label>
                          </div>
                      </div>
                      <div class="col-sm-12">
                          <div class="form-floating mb-2">
                              <input type="text" class="form-control" id="AddStockOSLicense" placeholder="name@example.com">
                              <label for="floatingInput">License</label>
                          </div>
                      </div>
                    </div>
                  </div>
              </div>
              <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="AddStock" >Save changes</button>
              </div>
          </div>
          </div>
      </div>
         
      <div class="container">     
          <div class="row pt-3">
              <div class="col-md pt-2">
                  <div class="form-floating">
                      <select class="form-select" id="searchwhat" aria-label="Floating label select example">
                        <option value="--SELECT--">--SELECT--</option>
                        <option value="Computer">Computer</option>
                        <option value="Printer">Printer</option>
                        <option value="Others">Others</option>
                      </select>
                      <label for="floatingSelect"> What Type </label>
                  </div>
              </div>
          </div>
      </div>
      <div class="container pt-2">
          <div class="d-grid gap-2">
              <button type="button" class="btn btn-outline-primary link-dark" id="" data-bs-toggle="modal" data-bs-target="#AddStockModal">
                  <i class="bi bi-file-earmark-plus"></i> &nbsp;ADD STOCK
              </button> 
            </div>
      </div>
      
    <!-- -------------- Modal to view transfer---------------- -->
    <div class="modal fade" id="Transfer" tabindex="-1" aria-labelledby="Transfer" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Transfer</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="row g-2">
                  <div class="col-sm-6">
                    <div class="form-floating">
                        <select class="form-select" id="DepartmentGoingTo" aria-label="Floating label select example">
                        <option value="--SELECT--">--SELECT--</option>
                        </select>
                        <label for="floatingSelect">Department</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="DesignatedUser" placeholder="placeholder">
                        <label for="floatingSelect">Designated User</label>
                    </div>
                </div>
                
                <div class="col-sm-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="stockID" placeholder="placerholder" disabled>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="stockWT" placeholder="placerholder" disabled>
                    </div>
                </div>
                </div>
              
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="TransferStock">Save</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!----------------------Data tables ------------------------>
        <div class="container w-auto pt-3" id="cmpt_tbl">
          <table id="STOCKtbl_computers" class="display nowrap" style="width:100%">
              <thead>
                  <tr>
                    <th>Property Number</th>
                    <th>Serial Number</th>
                    <th>Model</th>
                    <th>Brand</th>
                    <th>Type</th>
                    <th>Operating System</th>
                    <th>RAM</th>
                    <th>SSD</th>
                    <th>HDD</th>
                    <th>Processor</th>
                    <th>License</th>    
                    <th>Date Acquired</th>
                    <th>Action</th> 
                  </tr>
              </thead>    
              <tbody id="STOCKcomp_data">
              </tbody>
              <tfoot>
                  <tr>
                    <th>Property Number</th>
                    <th>Serial Number</th>
                    <th>Model</th>
                    <th>Brand</th>
                    <th>Type</th>
                    <th>Operating System</th>
                    <th>RAM</th>
                    <th>SSD</th>
                    <th>HDD</th>
                    <th>Processor</th>
                    <th>License</th>    
                    <th>Date Acquired</th>
                    <th>Action</th> 
                  </tr>
              </tfoot>
          </table>
      </div> 

        <div class="container w-auto pt-3" id="prt_tbl">
            <table id="STOCKtbl_printers" class="display nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Property Number</th>
                        <th>Serial Number</th>
                        <th>Model</th>
                        <th>Brand</th>
                        <th>Date Acquired</th>
                        <th>Action</th> 
                    </tr>
                </thead>    
                <tbody id="STOCKprt_data">
                </tbody>
                <tfoot>
                    <tr>
                        <th>Property Number</th>
                        <th>Serial Number</th>
                        <th>Model</th>
                        <th>Brand</th>
                        <th>Date Acquired</th>
                        <th>Action</th> 
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="container w-auto pt-3" id="oth_tbl">
            <table id="STOCKtbl_others" class="display nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Property Number</th>
                        <th>Serial Number</th>
                        <th>Model</th>
                        <th>Brand</th>
                        <th>Date Acquired</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>    
                <tbody id="STOCKetc_data"> 
                </tbody>
                <tfoot>
                    <tr>
                        <th>Property Number</th>
                        <th>Serial Number</th>
                        <th>Model</th>
                        <th>Brand</th>
                        <th>Date Acquired</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div> 
  </body>
</html>