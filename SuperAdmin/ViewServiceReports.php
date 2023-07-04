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
    <title>IHOMS AMS | Service Reports</title>
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
    <script src="Resources/JS/SupAdmin.js"></script>
    <script src="Resources/JS/JobOrder.js"></script>
        <style>
          .shesh input {
            border: 0;
        }

        #sig-image{
        width: 200px;
        height: 100px;
        border: 0px solid #333;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover; 
        }
        #watermark{
           height:100px;
           opacity:.3;
        }
    
        #sig-image2{
        width: 200px;
        height: 100px;
        border: 0px solid #333;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover; 
        }
        </style>
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
                <a class="nav-link position-relative active rounded-pill link-dark" style="background-color: aliceblue;" href="ViewServiceReports.php">Orders
                <span id="" class="badge position-absolute start-80 translate-middle rounded-pill" >
                    <span class="visually-hidden">unread messages</span>
                    </span>
                </a>
              </li>
                <!--Report  drop down-->
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle"  data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
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

    <!----------------------------------Modal -------------------------------->
    <div class="modal modal-xl fade" id="servicereportform" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
      
           
              <div id="printThis" class="shesh">
                      <div class="d-flex  justify-content-center " style="border: 1px solid black;">
                        <br/><br/>
                        <img src="../LOGOS/ITRMC.png"  style="height: 100px;margin-top: 25px;margin-right: 15px;">
                          <div class="text-center">
                                    <p class="mb-0 mt-4"><span>Republic of the Philippines</span></p>
                                    <h5 class="mb-0">Department of Health</h5>
                                    <h3 class="fw-bold mb-0" style="font-size: 25px;">ILOCOS TRAINING AND REGIONAL MEDICAL CENTER</h3>
                                    <span class="mb-0">City of San Fernando La Union</span>
                                    <br/><br/>
                                    <span style="font-size: 12px;">Tel:(072) 607-6418/64232;700-0486 Telefax:(072) 700-3719 E-mail:itrmc2010@yahoo.com url address:<i>http://www/doh.gov.ph/itmc</i></span>
                          </div>
                      <img src="../LOGOS/DOH.png" class="img-fluid" style="height: 100px;margin-top: 25px; margin-left: 15px;">                    
                </div>
                <div class="table-responsive-md">
                <table class="table table-md table-bordered"  style="border: 1px solid black;">
                    <tr>
                        <td colspan="6" style="text-align: center; background-color:  rgba(41, 197, 93, 0.116);">SERVICE REPORT</td>
                    </tr>

                    <tr>
                        <td style="background-color: rgba(41, 197, 93, 0.116);">Property Number:</td>
                        <td colspan="3"><span id="propNum"></span></td>
                        <td style="background-color: rgba(41, 197, 93, 0.116);">Date:</th>
                        <td colspan="3"><span id="date"></span></td>
                        
                    </tr>
                    <tr>
                        <td style="background-color: rgba(41, 197, 93, 0.116);">Description:</td>
                        <td colspan="3"><span id="decription"></span></td>
                        <td style="background-color: rgba(41, 197, 93, 0.116);">Job Order Number:</th>
                        <td colspan="3"><span id="jobordernum"></span><input type="text" id="txtjobordernum"></span></td>
                    </tr>
                    <tr>
                        <td style="background-color: rgba(41, 197, 93, 0.116);">Model:</td>
                        <td colspan="3"><span id="model"></span></td>
                        <td style="background-color: rgba(41, 197, 93, 0.116);">Department:</th>
                        <td colspan="3"><span id="dept"></span></td>
                    </tr>
                    <tr>
                        <td style="background-color: rgba(41, 197, 93, 0.116);">Serial Number:</td>
                        <td colspan="3"><span id="serial"></span></td>
                        <td style="background-color: rgba(41, 197, 93, 0.116);">Office:</th>
                        <td colspan="3"><span id="office"></span></td>
                    </tr>
                    
                    <tr>
                        <td style="background-color: rgba(41, 197, 93, 0.116);" colspan="6">Action Taken</td>
                    </tr>
                    <tr id="inputact">
                        <td colspan="6" >
                            <input type="text" class="form-control form-control-sm"  id="actiontaken" placeholder="">
                            
                        </td>
                        </tr>
                    <tr id="span1">
                        <td colspan="6">
                            <span id="actshow"></span>
                        </td>
                    </tr>
                    <tr>
                        <td style="background-color: rgba(41, 197, 93, 0.116);" colspan="6">Assessment</td>
                    </tr>
                    <tr id="inputass">
                        <td colspan="6" >
                            <input type="text" class="form-control form-control-sm"  id="assesment" placeholder="">
                        </td>
                        </tr>
                    <tr id="span2">
                        <td colspan="6">
                            <span id="asses"></span>
                        </td>
                    </tr>
                    <tr>
                      <td style="background-color: rgba(41, 197, 93, 0.116);" colspan="6">Recommendation</td>
                    </tr>
                    <tr id="inputreco">
                        <td colspan="6" >
                            <input type="text" class="form-control form-control-sm"  id="recommendation" placeholder="">
                        </td>
                      </tr>
                    <tr id="span3">
                        <td colspan="6">
                            <span id="reco"></span>
                        </td>
                    </tr>
                    <tr>
                      <td style="background-color: rgba(41, 197, 93, 0.116);" colspan="4">Performed by:</td>
                      <td style="background-color: rgba(41, 197, 93, 0.116);" colspan="2">Verified by:</td>
                    </tr>
                    <tr>
                    
                        <td colspan="3" id="adm">
                        <center>
                        <div id="sig-image">
                          <img id="watermark" src="watermark.png">
                        </div>
                    </center>
                            <center>
                                <span style="font-weight: light; text-transform: uppercase;" id="perfby"></span></br>
                                <span style="font-size:10px;">Staff-In-Charge,IHOMS</span>
                        </center>
                            
                        </td>
                        <td colspan="3" id="Boss">
                        <center>
                        <div id="sig-image2">
                          <img id="watermark" src="watermark.png">
                        </div>
                        </center>
                        <center>
                            <span style="font-weight: light; text-transform: uppercase;" id="verifby"></span></br>
                            <span style="font-size:10px;">Head,IHOMS</span>
                        </center>
                        </td>
                    </tr>

                    <tr>
                      <td colspan="6">
                        <span>Conforme:</span>
                            <input type="text" style="border: 0;outline: 0;background: transparent;border-bottom: 1px solid black; margin-left:25px;" readonly>
                            <div>
                              <span style="font-size:12px;margin-left:160px;">End-User</span>
                            </div> 
                      </td>
                    </tr>
                    

                    
                </table>
                </div>
              </div>
            
          
            </div>
                      <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                        <button type="button" class="btn btn-primary" id="print" onclick="printDiv('printThis')"><i class="fa fa-print"></i>
                         Print Service Report</button>                      
                         <button type="button" class="btn btn-success" id="update_service"><i class="fa fa-print"></i>
                         Approve Service Report</button>
                      </div>  
                  </div>
                  </div>
              </div>
              </div>
      <!----------------------------------Modal Add JO-------------------------------->
     <div class="modal modal-xl fade" id="JOModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">View Job Order</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
              <div id="printThis9">
      <div class="container">
      </div>
    <div class="container-fluid">
                        <div class="container">
                        <div class="text-center">
                            <h3 class="fw-bold mb-0">ILOCOS TRAINING AND REGIONAL MEDICAL CENTER</h3>
                            <span class="mb-0">City of San Fernando La Union</span>
                            <h5 class="mb-0">JOB ORDER</h5>
                            <br/><br/>
                            <div class="container">
                                <div class="row gx">
                                <div class="form-group">
                                    <div class="col-xs">
                            
                                        <span id="SPJO_User"></span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="input-group mt-1 ">
                                    <span style="font-weight:bold;">JO Number:</span>&nbsp;&nbsp;
                                    <input type="text" id="SPJO_ID" hidden >
                                    <span id="SPJO_IDno"></span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="input-group mb-3">
                                    <span style="font-weight:bold;">DATE:</span>&nbsp;&nbsp;
                                   
                                    <span id="SPJO_Date"></span>
                                    </div>
                                </div>
                                </div>
                                <div class="row">
                                    <div class="input-group mb-3">
                                    <span style="font-weight:bold;">Department:</span>&nbsp;&nbsp;
                                    <span id="SPJO_Desti"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                    <div class="table-responsive-md">
                        <table class="table table-border border-dark">
                        </span>
                        <thead>
                            <tr>
                            <th>Serial No.</th>
                            <th>Article/Description of Work</th> 
                            <th>Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <td>
                               
                                <span id="JO_SerialTxT"></span>
                            </td>
                            <td>
                            <span id="SPJO_Desc"></span></td>
                            <td>
                             
                                <span id="SPJO_Quantity"></span>
                            </td>
                            </tr>
                            <tr class="reby">
                                <td style="border-bottom: 2pt solid black; line-height:50px">
                                <span style="font-weight:bold;">Requested By</span>
                                </td>
                                <!-- <td style="border-bottom: none; line-height:50px"></td>
                                <td style="border-bottom: 2pt solid black; line-height:50px">
                                <span style="font-weight:bold;">Approved By</span>
                                </td> -->
                                
                            </tr>

                            <tr class="reby">
                                <td style="border-bottom: hidden;" >
                                    <center>
                                    <span id ="reqby"></span>
                                    </center>
                                </td>
                                <td style="border-bottom: hidden;" >
                                    
                                </td>
                                <!-- <td style="border-bottom: hidden;" >
                                    <center>
                                    <span id ="approvedby2"></span>
                                    </center>
                                </td> -->

                            </tr>
                            
                            
                        </tbody>
                        </table>
                    </div>
                    </div>
                </div>
                </div>
             

              </div>
              <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="print1" onclick="printDiv99('printThis9')">Print Job Order</button>
           
              </div>  
          </div>
          </div>
      </div> 
      <!-- Start Card  -->
                    
      <div class="container">
        <div class="row mt-4">
          <!--  -->
          <div class="col-sm-3 mt-2">
            <div class="card card-stats bg-light card-round">
            <div class="card-body">
              <div class="row">
      
                  <div class="col col-stats">
                    <div class="numbers">
                      <span class="fw-bold text-uppercase">New Orders </span>
                      <h5 class="fw-bold text-uppercase" id="rqstd">20</h5>
                      </div>
                    </div>
                  </div>
              </div>                      
            </div>
          </div>
          <!--  -->
        <div class="col-sm-3 mt-2">
          <div class="card card-stats bg-warning card-round">
            <div class="card-body">
              <div class="row">

                  <div class="col col-stats">
                    <div class="numbers">
                      <span class="fw-bold text-uppercase">MCC: FOR APPROVAL</span>
                      <h5 class="fw-bold text-uppercase" id="mccFA">35</h5>
                      </div>
                    </div>
                  </div>
              </div>                      
            </div>
          </div>

          <div class="col-sm-3 mt-2">
            <div class="card card-stats bg-secondary card-round">
            <div class="card-body">
              <div class="row">
      
                  <div class="col col-stats">
                    <div class="numbers">
                      <span class="fw-bold text-uppercase">NOT YET ACCEPTED</span>
                      <h5 class="fw-bold text-uppercase" id="mccA"></h5>
                      </div>
                    </div>
                  </div>
              </div>                      
            </div>
          </div>

          <div class="col-sm-3 mt-2">
            <div class="card card-stats bg-primary card-round">
            <div class="card-body">
              <div class="row">
                  <div class="col col-stats">
                    <div class="numbers">
                      <span class="fw-bold text-uppercase">ON GOING</span>
                      <h5 class=" fw-bold text-uppercase" id="accepted">25</h5>
                      </div>
                    </div>
                  </div>
              </div>                      
            </div>
          </div>
      </div>

      <div class="row mt-2">
          <div class="col-sm-4 mt-2">
            <div class="card card-stats bg-warning card-round">
            <div class="card-body">
              <div class="row">
      
                  <div class="col col-stats">
                    <div class="numbers">
                      <span class="fw-bold text-uppercase">SR:FOR APPROVAL</span>
                      <h5 class="blinker fw-bold text-uppercase" id="homisFA"></h5>
                      </div>
                    </div>
                  </div>
              </div>                      
            </div>
          </div>

          <!--  -->
          <div class="col-sm-4 mt-2">
            <div class="card card-stats bg-success card-round">
            <div class="card-body">
              <div class="row">
                  <div class="col col-stats">
                    <div class="numbers">
                      <span class="fw-bold text-uppercase">DONE</span>
                      <h5 class="fw-bold text-uppercase" id="Approved">20</h5>
                      </div>
                    </div>
                  </div>
              </div>                      
            </div>
          </div>
          <!--  -->
          <div class="col-sm-4 mt-2">
            <div class="card card-stats bg-danger card-round">
            <div class="card-body">
              <div class="row">

                  <div class="col col-stats">
                    <div class="numbers">
                      <span class="fw-bold text-uppercase">CANCELLED</span>
                      <h5 class="fw-bold text-uppercase" id="Cancelled">20</h5>
                      </div>
                    </div>
                  </div>
              </div>                      
            </div>
          </div>

        </div>
      </div>
<br>
<!--  End Card -->
 <!-- Select Status Start -->
 <div class="container">
    <label for="">Select status</label>
      <select class="form-select" id="sorter">
        <option value="HOMIS:FOR APPROVAL">FOR APPROVAL</option>
        <option value="REQUESTED">REQUESTED</option>
        <option value="MCC:FOR APPROVAL">MCC:FOR APPROVAL</option>
        <option value="MCC:APPROVED">MCC:APPROVED</option>
        <option value="ACCEPTED">ACCEPTED</option>
        <option value="APPROVED">DONE</option>
        <option value="CANCELLED">CANCELLED</option>
        <option value="All">ALL</option>
      </select>
 </div>
  <!-- Select Status End -->

  <!----------------------Data tables Service Report ------------------------>

    <div class="container w-auto pt-3" id ="JO_tbl">
        <div class="card" style="background-color:rgb(237, 238, 240);" width="100%">
         <h5 class="card-header">Job Orders</h5>
         <div class="card-body">
          <table id="tbl_JO" class="table table-striped nowrap" style="width:100%">
             <!-- <center><h4>Others Equipments Inventory Table</h4></center> -->
              <thead>
                      <tr>
                          <th>J.O. Number</th>
                          <th>Performed By</th>
                          <th>Department</th>
                          <th>Recommendation</th>
                          <th>Status</th>
                          <th>Action</th> 
                      </tr>
              </thead>    
                  <tbody id="JO_data">
                    <!---Others TABLE-->
                  </tbody>
                  <tfoot>
                      <tr>
                          <th>J.O. Number</th>
                          <th>Performed By</th>
                          <th>Department</th>
                          <th>Recommendation</th>
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
    function printDiv(divName) {
                var printContents = document.getElementById(divName).innerHTML;
                var originalContents = document.body.innerHTML;
                document.body.innerHTML = printContents;

                window.print();

                document.body.innerHTML = originalContents;
                location.reload(true);
                
            }

            function printDiv99(divName) {
                var printContents = document.getElementById(divName).innerHTML;
                var originalContents = document.body.innerHTML;
                document.body.innerHTML = printContents;

                window.print();

                document.body.innerHTML = originalContents;
                location.reload(true);
                
            }
  </script>
</html>