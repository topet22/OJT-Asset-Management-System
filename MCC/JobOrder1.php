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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo ("Job Order | {$_SESSION['depts']}");?></title>
    <!----------CDN LINKSSSSS------------>
    <link rel="stylesheet" href="Resources/css/style.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.5/css/buttons.dataTables.min.css">
    

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="Resources/JS/JobOrder.js"></script>
    <script src="Resources/JS/UserDash.js"></script>

    <style>
          /* #printThis input {
            border: 0;
        } */
        #sig-image{
        width: 200px;
        height: 100px;
        border: 0px solid #333;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover; 
        }
        #sig-image2{
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

    
        </style>

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
              <a class="nav-link" href="../User">Dashboard</a>
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
                        <td colspan="3"><span id="SR_propNum"></span></td>
                        <td style="background-color: rgba(41, 197, 93, 0.116);">Date:</th>
                        <td colspan="3"><span id="SR_date"></span></td>
                        
                    </tr>
                    <tr>
                        <td style="background-color: rgba(41, 197, 93, 0.116);">Description:</td>
                        <td colspan="3"><span id="SR_description"></span></td>
                        <td style="background-color: rgba(41, 197, 93, 0.116);">Job Order Number:</th>
                        <td colspan="3"><span id="SR_jobordernum"></span></span></td>
                    </tr>
                    <tr>
                        <td style="background-color: rgba(41, 197, 93, 0.116);">Model:</td>
                        <td colspan="3"><span id="SR_model"></span></td>
                        <td style="background-color: rgba(41, 197, 93, 0.116);">Department:</th>
                        <td colspan="3"><span id="SR_dept"></span></td>
                    </tr>
                    <tr>
                        <td style="background-color: rgba(41, 197, 93, 0.116);">Serial Number:</td>
                        <td colspan="3"><span id="SR_serial"></span></td>
                        <td style="background-color: rgba(41, 197, 93, 0.116);">Office:</th>
                        <td colspan="3"><span id="SR_office"></span></td>
                    </tr>
                    
                    <tr>
                        <td style="background-color: rgba(41, 197, 93, 0.116);" colspan="6">Action Taken</td>
                    </tr>
                    <tr id="span1">
                        <td colspan="6">
                            <span id="SR_actshow"></span>
                        </td>
                    </tr>
                    <tr>
                        <td style="background-color: rgba(41, 197, 93, 0.116);" colspan="6">Assessment</td>
                    </tr>
                    <tr id="span2">
                        <td colspan="6">
                            <span id="SR_asses"></span>
                        </td>
                    </tr>
                    <tr>
                      <td style="background-color: rgba(41, 197, 93, 0.116);" colspan="6">Recommendation</td>
                    </tr>
                    <tr>
                        <td colspan="6" >
                          <span id="SR_Reco"></span>
                        </td>
                    </tr>
                    <tr>
                      <td style="background-color: rgba(41, 197, 93, 0.116);" colspan="4">Performed by:</td>
                      <td style="background-color: rgba(41, 197, 93, 0.116);" colspan="2">Verified by:</td>
                    </tr>
                    <td colspan="3">
                          
                          <center>
                              <div id="sig-image">
                                <img id="watermark" src="watermark.png">
                              </div>
                          </center>
                            <center>
                              <span style="font-weight: light; text-transform: uppercase;" id="txtperfby"></span></br>
                              <span style="font-size:10px;">Staff-In-Charge,IHOMS</span>
                            </center>
                        </td>
                        <td  colspan="3">
                           
                            <center><div id="sig-image2">
                              <img id="watermark" src="watermark.png">
                            </div></center>
                            <center>
                             <span style="font-weight: light; text-transform: uppercase;" id="txtveri"></span></br>
                              <span style="font-size:10px;">Head,IHOMS</span>
                          </center>
                        </td>
                    </tr>
                    <tr>
                      <td colspan="6">
                        <span>Conforme:</span>
                            <span id="enduser" style="border: 0;outline: 0;background: transparent;border-bottom: 1px solid black; margin-left:25px;"></span>
                            <div>
                              <span style="font-size:12px;margin-left:100px;">End-User</span>
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
                      </div>  
                  </div>
                  </div>
              </div>
              </div>

    <div id="printThis1">
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
                            <select class="SelectJO form-control" id="JO_User" style="width:25%;">
                              <option value="--SELECT--">Select User</option>
                            </select>
                            <span id="SPJO_User"></span>
                        </div>
                    </div>
                      <div class="col">
                        <div class="input-group mt-1 ">
                          <span style="font-weight:bold;">JO Number:</span>&nbsp;&nbsp;
                          <input type="text" class="no-outline" id="JO_IDno" placeholder="JO No." >
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
                          <input type="text" class="no-outline" id="JO_Desti" placeholder="JO No." Value = "IHOMS">
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
                    <select class="SelectJOSerial form-control" id="JO_Serial">
                      <option value="--SELECT--" selected disabled>Select Item</option>
                    </select>
                    <span id="JO_SerialTxT"></span>
                  </td>
                  <td><input type="text" class="form-control" id="JO_Desc" placeholder="Description of Work">
                  <span id="SPJO_Desc"></span></td>
                  <td>
                    <input type="text" class="form-control" id="JO_Quantity" placeholder="Quantity">
                    <input type="text" class="form-control" id="JO_Type" placeholder="">
                    <input type="text" class="form-control" id="JO_PropertyNo" placeholder="">
                    <input type="text" class="form-control" id="JO_ItemID" placeholder="">
                    <input type="text" class="form-control" id="JO_Model" placeholder="">
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
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
    <span id="JOSP_User"></span>
    </div>
  </br>
    <div class="container">
            <button type="button" class="btn btn-outline-primary" id="JO_Save" >Submit</button>
                 <button type="button" class="btn btn-outline-primary" id="JO_Reset">Add New JO</button>
                 <button class="btn btn-outline-primary" id="JO_prt" onclick="printDiv1('printThis1')"><i class="fa fa-print"></i>Print Certificate</button>
      </div>
          <!----------------------Data tables Others ------------------------>
          <div class="container w-auto pt-3" id ="JO_tbl">
        <div class="card" style="background-color:rgb(237, 238, 240);" width="100%">
         <h5 class="card-header">Pending Job Orders</h5>
         <div class="card-body">
          <table id="tbl_JO" class="table table-striped nowrap" style="width:100%">
             <!-- <center><h4>Others Equipments Inventory Table</h4></center> -->
              <thead>
                      <tr>
                          <th>J.O. Number</th>
                          <th>Accepted By:</th>
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
                          <th>Accepted By:</th>
                          <th>Status</th>
                          <th>Action</th> 
                      </tr>
                  </tfoot>
          </table>
        </div>
        </div>
      </div>  
                <!------------------------------ MODAL CANCEL JO ---------------------------------------------->
    <div class="modal fade" id="cancelJO" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Cancel Job Order</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <div class="row g-2">
                    <div class="col-sm-12">
                      <div class="form-floating">
                        <input type="text" class="form-control" id="JO_Number" placeholder="name@example.com">
                        <label for="floatingInput">Job Order Number</label>
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-floating">
                        <input type="text" class="form-control" id="JO_CancelReason" placeholder="name@example.com">
                        <label for="floatingInput">Reason</label>
                      </div>
                    </div>
                  </div>
              </div>
              <div class="modal-footer">
              
              <button type="button" class="btn btn-primary" id="save_cancel">Save</button>
              </div>
          </div>
          </div>
      </div> 
  </body>
  <script src="Resources/JS/Signature.js"></script>
  <script>
    function printDiv(divName) {
                var printContents = document.getElementById(divName).innerHTML;
                var originalContents = document.body.innerHTML;
                document.body.innerHTML = printContents;
                window.print();
                document.body.innerHTML = originalContents;    
                location.reload(true);  
            }

            function printDiv1(divName) {
                var printContents = document.getElementById(divName).innerHTML;
                var originalContents = document.body.innerHTML;
                document.body.innerHTML = printContents;
                window.print();
                document.body.innerHTML = originalContents;    
                location.reload(true);  
            }

  </script>

    <style type="text/css">
      body {
        background-color: #eee;
      }
      input {
        border-top-style: hidden;
        border-right-style: hidden;
        border-left-style: hidden;
        border-bottom-style: hidden;
        background-color: #eee;
      }
      
      .no-outline:focus {
        outline: none;
      }
          @media screen and (max-width: 700px) {
      .col-25, .col-75, input[type=text], input[type=date]{
        width: 100%;
        margin-top: 0;
      }
    }
    @media print {
      #noprint {
        display :  none;
    }
}

    </style>
</html>