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
    <script src="Resources/JS/JobOrder3.js"></script>
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
  <!-- MODAL JO -->
      <!----------------------------------Modal Add JO-------------------------------->
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
                                            <input type="text" id="SPJO_ID" hidden>
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
                                            <span id ="approvedby"></span>
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
              <button type="button" class="btn btn-primary" id="approve">Approve Job Order</button>
              <button type="button" class="btn btn-primary" id="print" onclick="printDiv1('printThis1')">Print Job Order</button>

              </div>  
          </div>
          </div>
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