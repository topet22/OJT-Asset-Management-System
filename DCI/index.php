<?php
    $servername = "localhost";
    $username = "AMS_User";
    $password = "P@ssW0rdAMS2023";
    $conn = new PDO("mysql:host=$servername;dbname=ihoms_inventory", $username, $password);
    session_start(); 

    if(!isset($_SESSION['DCuser_name'])){
        header("location:../");
    }
    else
    {
        $_SESSION['DCuser_name'];
        $_SESSION['DCfull_name'];
     
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IHOMS AMS | Service Reports </title>
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
    <script src="Resources/JS/ServiceReport.js"></script>
        <style>
         
    
        </style>
  </head>
  <body>

    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container bg-dark">
        <a href="../SuperAdmin"> <img src="logo.png" class="rounded-circle" width="50" height="50"></a>
            <label style="color:#fff; margin-left:10px;"></label>
          <label style="color:#fff; margin-left:10px;"><?php echo ("Welcome {$_SESSION['DCuser_name']}!");?></label>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
             <a class="nav-link" href="index.php">Orders
             <span id="blinker" class="badge position-absolute start-80 translate-middle rounded-pill" >
                    <span class="visually-hidden">unread messages</span>
            </span>
             </a>             
             </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                    <i class="bi bi-gear-fill"></i>&nbsp;Settings</a>
                <ul class="dropdown-menu">
                <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#UserModal"><i class="bi bi-shield-lock-fill"></i>&nbsp;Change Password</a></li>
                  <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#contactModal"><i class="bi bi-telephone"></i>&nbsp;Change Contact Number</a></li>
                <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#Signature"><i class="bi bi-pencil"></i>&nbsp;Signature</a></li>
                  <li><a class="dropdown-item" href="../logout.php"><i class="bi bi-arrow-left"></i>&nbsp;Log Out</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
    </nav>
    <!-- Modal Add Signature -->
    <div class="modal fade" id="Signature" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Add Signature</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <div class="row g-2">
                  <div class="col-sm-6">
                          <div class="form-floating">
                                <div class="container" id="signature">
                                    <div class="row">
                                    <div class="col-md-12">
                                        
                                        <canvas id="sig-canvas" width="400" height="160" style="border: 2px dotted #CCCCCC;border-radius: 15px;cursor: crosshair;">
                                        Get a better browser, bro.
                                        </canvas>
                                    </div>
                                    </div>
                                        <div class="row">
                                        <div class="col-md-12">
                                            
                                            <button class="btn btn-secondary" id="sig-clearBtn">Clear Signature</button>
                                            <button class="btn btn-primary" id="sig-submitBtn">Done</button>
                                        </div>
                                        </div>
                                    <br/>
                                    <div class="row">
                                    <div class="col-md-12">
                                        <input id="sigdataUrl" class="form-control" hidden>
                                        <img id="imgshow" src="" alt="">
                                        <span id="msg"></span>
                                    </div>
                                    </div>
                                    <br/>
                            </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="modal-footer">
              
              <button type="button" class="btn btn-primary" id="savesignature">Save</button>
              </div>
          </div>
          </div>
      </div> 
      <div class="modal modal-xl fade" id="JOModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">View Job Order</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
              <div id="printThis1">
      <div class="container">
      </div>
      <!-- MOdal View JO -->
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
                            </tr>

                            <tr class="reby">
                                <td style="border-bottom: hidden;" >
                                    <center>
                                    <span id ="reqby"></span>
                                    </center>
                                </td>
                                <td style="border-bottom: hidden;" >      
                                </td>
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
              <button type="button" class="btn btn-primary" id="accept">Accept Job Order</button>
              </div>  
          </div>
          </div>
      </div> 
    <!----------------------------------Modal Service Report -------------------------------->
    <div class="modal	modal-xl fade" id="servicereportform" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
              <div id="printThis">

                      <div class="d-flex justify-content-center" style="border: 1px solid black;">
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
                        <td colspan="3" id="spanjob"><span id="jobordernum1"></span></td>
                        <td id="inputjob"><input type="text" class="form-control form-control-sm"  id="jobordernum" placeholder="" readonly></td>
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
                      <td id="veri" style="background-color: rgba(41, 197, 93, 0.116);" colspan="2">Verified by:</td>
                    </tr>
                    <tr>
                   <td colspan="3">
                          
                          <center>
                              <div id="3sig-image" class="unget">
                                <img id="watermark" src="watermark.png">
                              </div>
                          </center>
                            <center>
                              <span style="font-weight: light; text-transform: uppercase;" id="txtperfby"></span></br>
                              <span style="font-size:10px;">Staff-In-Charge,IHOMS</span>
                            </center>
                        </td>
                        <td  colspan="3">
                           
                            <center>
                              <div id="3sig-image2" class="unget">
                              <img id="watermark" src="watermark.png">
                            </div>
                            </center>
                            <center>
                              <span style="font-weight: light; text-transform: uppercase;" id="txtverifby2"></span></br>
                              <span style="font-size:10px;">Head,IHOMS</span>
                            </center>
                        </td>

                    </tr>
                    <tr>
                      <td colspan="6">
                        <span>Conforme:</span>
                           
                           <span id="enduser" style="border: 0;outline: 0;background: transparent;border-bottom: 1px solid black; margin-left:25px;"></span>
                            <div>
                              <span style="font-size:12px;margin-left:130px;">End-User</span>
                            </div> 
                      </td>
                    </tr>     
                </table>
                </div>
              </div>
            </div>
                      <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary" id="update_service"><i class="fa fa-print"></i>
                         Create Service Report</button>
                        <button type="button" class="btn btn-primary" id="print" onclick="printDiv('printThis')"><i class="fa fa-print"></i>
                         Print Service Report</button>
                      </div>  
                  </div>
                  </div>
              </div>
              </div>       
<!-- Start Card  -->
            
<!--  End Card --> 
  <!----------------------Data tables Service Report ------------------------>

    <div class="container w-auto pt-3" id ="">
        <div class="card" style="background-color:rgb(237, 238, 240);" width="100%">
         <h5 class="card-header">Job Orders</h5>
         <div class="card-body">
          <table id="tbl_JO" class="table table-striped nowrap" style="width:100%">
              <thead>
                      <tr>
                          <th>J.O. Number</th>
                          <th>Department</th>
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
                          <th>Department</th>
                          <th>Status</th>
                          <th>Action</th> 
                      </tr>
                  </tfoot>
          </table>
        </div>
        </div>
      </div> 

       <!-- --------------------------------Modal CHANGE PASSWORD FROM THE HIGHER TO LOWER AND BACK AND EVERYTHING -------------------------------->
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
                          <div class="form-floating">
                              <input type="password" class="form-control" id="CurrentPassword" placeholder="name@example.com">
                              <label for="floatingInput">Current Password</label>
                          </div>
                      </div>    
                      <div class="col-sm-12">
                          <div class="form-floating">
                              <input type="password" class="form-control" id="NewPassword" placeholder="name@example.com">
                              <label for="floatingInput">Password</label>
                          </div>
                      </div>
                      <div class="col-sm-12">
                          <div class="form-floating">
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

 <!-- --------------------------------Modal CHANGE PASSWORD FROM ME AND YOU TO HEAVEN AND EARTH HIGHER-------------------------------->
 <div class="modal fade" id="FirstLogin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl">
          <div class="modal-content">
              <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Change Details</h1>
              </div>
              <div class="modal-body">
                  <div class="row g-2">
                      <label for="floatingInput">New Contact Number</label>
                      <div class="col-sm-12">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">63</div>
                            </div>
                            <input type="text" class="form-control" id="CellphoneNum" placeholder="9xxxxxxxxx" maxlength=10>
                        </div>
                      </div>    
                      <div class="col-sm-12">
                          <div class="form-floating">
                              <input type="password" class="form-control" id="FirstNewPassword" placeholder="name@example.com" >
                              <label for="floatingInput">New Password</label>
                          </div>
                      </div>
                      <div class="col-sm-12">
                          <div class="form-floating">
                              <input type="password" class="form-control" id="FirstConfirmNewPassword" placeholder="name@example.com">
                              <label for="floatingInput">Confirm New Password</label>
                          </div>
                      </div>
 
                      <span id="message"></span>
                  </div>
              </div>
              <div class="modal-footer">
              
              <button type="button" class="btn btn-primary" id="save_firsttimepass">Save changes</button>
              </div>
          </div>
          </div>
      </div> 

             <!-- --------------------------------Modal CHANGE contact number -------------------------------->
 <div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Change Contact Number</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <div class="row g-2">
                      <div class="col-sm-12">
                          <div class="form-floating">
                              <input type="text" name ="currentContact" class="form-control" id="currentContact" placeholder="" readonly/>
                              <label for="currentContact">Current Contact Number</label>
                          </div>
                      </div>
                      <label for="floatingInput">New Contact Number</label>   
                      <div class="col-sm-12">
                      <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">63</div>
                            </div>
                            <input type="text" class="form-control" id="NewContact" placeholder="9xxxxxxxxx" maxlength=10>
                        </div>
                      </div> 
                      <span id="message"></span>
                  </div>
              </div>
              <div class="modal-footer">
              
              <button type="button" class="btn btn-primary" id="update_contact">Update Contact Number</button>
              </div>
          </div>
          </div>
      </div> 

      <script src="Resources/JS/Signature.js"></script>
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
      
  </script>
</html>