<!-- WAG GAGALAWIN -->
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
    <title><?php echo ("PM Form | {$_SESSION['depts']}");?></title>
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
    <script src="Resources/JS/UserDash.js"></script>
    <script src="Resources/JS/PMDone.js"></script>

    <style>
          /* #printThis input {
            border: 0;
        } */
        .unget{
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
  <body style="background:;">
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
    
            <!-- DATA TABOOOLS -->
            <div class="container mt-4" id="tbl_PMS">
          <div class="card" style="background-color:rgb(237, 238, 240);" width="100%">
        <h5 class="card-header">PM List</h5>
        <div class="card-body">
            <h5 class="card-title"></h5>
            <table id="PM_Reports" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                    <th>Deparment</th>
                    <th>User</th>
                    <th>Serial Number</th>
                    <th>Status</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody id="PM_data">

                </tbody>
                <tfoot>
                    <tr>
                    <th>Deparment</th>
                    <th>User</th>
                    <th>Serial Number</th>
                    <th>Status</th>
                    <th>Action</th>
                    </tr>
                </tfoot>    
            </table>
        </div>
    </div>
</div>

<!-- Preventinve Maintainance Print Start -->
<!-- Modal -->
<div class="modal fade" id="tres" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Preventive Maintainance Activity Checklist</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">  
                <div class="container">
                    <div id="printThis6">
                        <div class="d-flex  justify-content-center" style="border: 1px solid black; border-bottom: none;">
                          <br/><br/>
                            <img src="../LOGOS/ITRMC.png"  style="height: 100px;margin-top: 25px;margin-right: 15px;">
                                <div class="text-center">
                                        <p class="mb-0 mt-4"><span style="font-size:12px;">Republic of the Philippines</span></p>
                                        <h6 class="mb-0" >DEPARTMENT OF HEALTH</h6>
                                        <h6 class="mb-0">CENTER FOR HEALTH DEVELOPMENT-1</h6>
                                        <h3 class="fw-bold mb-0" style="font-size: 25px;">ILOCOS TRAINING AND REGIONAL MEDICAL CENTER</h3>
                                        <span class="mb-0">Parian, City of San Fernando La Union</span>
                                        <br/><br/>
                                </div>
                            <img src="../LOGOS/DOH.png" class="img-fluid" style="height: 100px;margin-top: 25px; margin-left: 15px;">                    
                        </div>
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered" id="centerized" style="border: 1px solid black;">
                            <tr>
                                <td colspan="14" style="text-align: center; background-color:  rgba(41, 197, 93, 0.116);font-weight:bold;">PREVENTIVE MAINTENANCE ACTIVITY CHECKLIST</td>
                                
                            </tr>
                            <tr>
                                <td  style="background-color: rgba(41, 197, 93, 0.116);font-weight:bold;">NAME OF OFFICE</td>
                                <td colspan="7">
                                    <span id="PRTPM_Office"></span>
                                </td>
                                <td colspan="" style="background-color: rgba(41, 197, 93, 0.116);font-weight:bold;">DATE</td>
                                <td colspan="4">
                                   <span id="PRTPM_Date"></span>  
                                </td>
                            </tr>
                            <tr>
                                <td style="background-color: rgba(41, 197, 93, 0.116);font-weight:bold;">DEPARTMENT</td>
                                <td colspan="12">
                                    <span id="PRTPM_Dept"></span>
                                    <input type="text" name="txtpmid" id="txtpmid" hidden>
                                </td>
                            </tr>
                            <tr>
                                <td style="background-color: rgba(41, 197, 93, 0.116);font-weight:bold;">DESIGNATED USER</td>
                                <td colspan="12">
                                   
                                    <span id="PRTPM_DesigUser"></span>
                                </td>
                            </tr>
                            <tr>
                                <td style="background-color: rgba(41, 197, 93, 0.116);font-weight:bold;">TYPE</td>
                               
                                <td colspan="2">
                                   
                                    <span id="DESKTOP">&#9744; DESKTOP</span>
                                </td>
                                <td>
                                   
                                    <span id="ALL_IN_1">&#9744; ALL IN 1</span>
                                </td>
                                <td colspan="4">
                                    
                                    <span id="ASSEMBLED_PC">&#9744; ASSEMBLED PC</span>
                                </td>
                                <td colspan="2">
                                    
                                    <span id="LAPTOP">&#9744; LAPTOP</span>
                                </td>
                                <td colspan="3">
                                    
                                    <span id="OTHERS">&#9744;OTHERS</span>
                                </td>
                            </tr>
                            <tr>
                                <td style="background-color: rgba(41, 197, 93, 0.116);font-weight:bold;">SERIAL NO.</td>
                                <td colspan="12">
                                    <span id="PRTPM_Serial"></span>

                                </td>
                            </tr>
                            <tr>
                                <td style="background-color: rgba(41, 197, 93, 0.116);font-weight:bold;">MODEL/BRAND</td>
                                <td colspan="12">
                                    <span id="PRTPM_ModelBrand"></span>
                                </td>
                            </tr>

                            <tr>
                                <td style="background-color: rgba(41, 197, 93, 0.116);font-weight:bold;">OS</td>
                                <td colspan="5">
                                   <span id="PRTPM_OS" ></span>
                                </td>
                                <td  style="background-color: rgba(41, 197, 93, 0.116);font-weight:bold;">RAM</td>
                                <td colspan="2">
                                   
                                    <span id="PRTPM_RAM" ></span>
                                </td>
                                <td style="background-color: rgba(41, 197, 93, 0.116);font-weight:bold;">HDD/SSD</td>
                                <td  colspan="3">
                                     
                                    <span id="PRTPM_HDDSSD"></span>
                                </td>
                            </tr>

                            <tr>
                                <td style="background-color: rgba(41, 197, 93, 0.116);font-weight:bold;">PROCESSOR</td>
                                <td colspan="6"><span id="PRTPM_Processor"></span></td>
                                <td colspan="2  " style="background-color: rgba(41, 197, 93, 0.116);font-weight:bold;">LICENSE</td>
                                
                                <td colspan="2">
                                    
                                    <span id="LY">Yes</span>
                                </td>
                                <td colspan="2">
                            
                                    <span id="LN">No</span>
                                </td>
                            </tr>
                            <tr>
                                <td  style="background-color: rgba(41, 197, 93, 0.116);font-weight:bold;">MONITOR 1</td>
                                <td colspan="6"></td>
                                <td colspan="3" style="background-color: rgba(41, 197, 93, 0.116);font-weight:bold;">MONITOR 2</td>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td style="background-color: rgba(41, 197, 93, 0.116);font-weight:bold;">BRAND/MODEL</td>
                                <td colspan="6"><span id ="PRTPM_Monitor1Brand"></span></td>
                                <td colspan="3"style="background-color: rgba(41, 197, 93, 0.116);font-weight:bold;">BRAND/MODEL</td>
                                <td colspan="3"><span id ="PRTPM_Monitor2Brand"></td>
                            </tr>
                            <tr>
                                <td style="background-color: rgba(41, 197, 93, 0.116);font-weight:bold;">SERIAL NO.</td>
                                <td colspan="6">
                                    
                                    <span id="PRTPM_SerialMonitor1"></span> 
                                </td>
                                <td colspan="3"style="background-color: rgba(41, 197, 93, 0.116);font-weight:bold;">SERIAL NO.</td>
                                <td colspan="3">
                                    <span id="PRTPM_SerialMonitor2"></span> 
                                </td>
                            </tr>
                            <tr>
                                <td style="background-color: rgba(41, 197, 93, 0.116);font-weight:bold;">KEYBOARD</td>
                                <td colspan="2">
                                  
                                    <span id="KB_1W"></span>
                                  
                                </td>
                                <td colspan="2">
                                  
                                    <span id="KB_1NW"></span>
                                
                                </td>
                                
                                <td  colspan="1" style="background-color: rgba(41, 197, 93, 0.116);font-weight:bold;">BRAND/MODEL</td>
                                <td colspan="3"><span id="PRTPM_KBModel"></span></td>
                                <td  style="background-color: rgba(41, 197, 93, 0.116);font-weight:bold;">SERIAL NO.</td>
                                <td colspan="2">
                            
                                    <span id="PRTPM_KBSerial"></span> 
                                </td>
                               
                            </tr>
                            <tr>
                                <td style="background-color: rgba(41, 197, 93, 0.116);font-weight:bold;">MOUSE</td>
                                <td colspan="2">
                                  
                                    <span id="MS1W"></span>
                                </td>
                                <td colspan="2">
                                  
                                    <span id="MS1NW"></span>
                                </td>
                                <td colspan="1"  style="background-color: rgba(41, 197, 93, 0.116);font-weight:bold;">BRAND/MODEL</td>
                                <td colspan="3"><span id="PRTPM_MouseModel"></span></td>
                                <td style="background-color: rgba(41, 197, 93, 0.116);font-weight:bold;">SERIAL NO.</td>
                                <td colspan="2">
                                    
                                    <span id="PRTPM_MouseSerial"></span> 
                                </td>
                            </tr>
                            <tr>
                                <td style="background-color: rgba(41, 197, 93, 0.116);font-weight:bold;">UPS</td>
                                <td colspan="2">
                                    
                                    <span id="UPS1W"></span>
                                </td>
                                <td colspan="2">
                                 
                                    <span id="UPS1NW"></span>
                                </td>
                                <td colspan="1"  style="background-color: rgba(41, 197, 93, 0.116);font-weight:bold;">BRAND/MODEL</td>
                                <td colspan="3"><span id="PRTPM_UPSModel"></span></td>
                                <td style="background-color: rgba(41, 197, 93, 0.116);font-weight:bold;">SERIAL NO.</td>
                                <td colspan="2">
                                    <span id="PRTPM_UPSSerial"></span> 
                                </td>
                            </tr>
                            <Tr>
                                <td colspan="14"></td>
                            </Tr>
                            <tr>
                                <th style="background-color: rgba(41, 197, 93, 0.116);font-weight:bold;">NO.</th>
                                <th style="background-color: rgba(41, 197, 93, 0.116);font-weight:bold;" colspan="6">WORK INSTRUCTION</th>
                                <th style="background-color: rgba(41, 197, 93, 0.116);font-weight:bold;">DONE</th>
                                <Th style="background-color: rgba(41, 197, 93, 0.116);font-weight:bold;">NOT DONE</Th>
                                <Th style="background-color: rgba(41, 197, 93, 0.116);font-weight:bold;" colspan="5">REMARKS/RESULT</Th>
                            </tr>
                            <tr>
                                    <td>
                                        <h5>1</h5>
                                    </td>
                                    <td class="instruct" colspan="6">
                                        Turn off the computer and monitor
                                    </td>
                                    <td colspan="" >
                                        
                                    <center><span id="PrtQ1nd1">&#9744;</span></center>
                                    <center><span id="PrtQ1d1">&#9745;</span></center>

                                    </td>
                                    <td >
                                    
                                    <center><span id="PrtQ1nd2">&#9744;</span></center>
                                    <center><span id="PrtQ1d2">&#9745;</span></center>
                                     
                                    </td>
                                    <td colspan="5">
                                        <span id="PRTQ1Remarks"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>2</h5>
                                    </td>
                                    <td colspan="6">
                                        Clean the monitor
                                    </td>
                                    <td colspan="" >
                         
                                        <center><span id="PrtQ2nd1">&#9744;</span></center>
                                        <center><span id="PrtQ2d1">&#9745;</span></center>
                                    </td>
                                    <td>
                                        
                                        <center><span id="PrtQ2nd2">&#9744;</span></center>
                                        <center><span id="PrtQ2d2">&#9745;</span></center>
                                    </td>
                                    <td colspan="5" >
                                        <span id="PRTQ2Remarks"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>3</h5>
                                    </td>
                                    <td class="instruct" colspan="6">
                                        Remove grit, paper clips, staples, and crumbs
                                    </td>
                                    <td colspan="">
                                           <center><span id="PrtQ3nd1">&#9744;</span></center>
                                           <center><span id="PrtQ3d1">&#9745;</span></center>
                                    </td>
                                    <td>
                                         <center><span id="PrtQ3nd2">&#9744;</span></center>
                                         <center><span id="PrtQ3d2">&#9745;</span></center>
                                    </td>
                                    <td colspan="5">
                                        <span id="PRTQ3Remarks"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>4</h5>
                                    </td>
                                    <td colspan="6">
                                        Remove Dust (Outer part)
                                    </td>
                                    <td colspan="">
                                        <center><span id="PrtQ4d1">&#9745;</span></center>
                                        <center><span id="PrtQ4nd1">&#9744;</span></center>
                                    </td>
                                    <td>
                                         <center><span id="PrtQ4d2">&#9745;</span></center>
                                         <center><span id="PrtQ4nd2">&#9744;</span></center>
                                    </td>
                                    <td colspan="5">
                                        <span id="PRTQ4Remarks"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>5</h5>
                                    </td>
                                    <td colspan="6">
                                        Remove Dust (Inner Part)
                                    </td>
                                    <td colspan="">
                                        <center><span id="PrtQ5d1">&#9745;</span></center>
                                        <center><span id="PrtQ5nd1">&#9744;</span></center>
                                    </td>
                                    <td>
                                        <center><span id="PrtQ5d2">&#9745;</span></center>
                                        <center><span id="PrtQ5nd2">&#9744;</span></center>
                                    </td>
                                    <td colspan="5">
                                        <span id="PRTQ5Remarks"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>6</h5>
                                    </td>
                                    <td class="instruct" colspan="6">
                                        Uninstall unwanted files, programs, and application (i.e Torrents, Netflix, etc)
                                    </td>
                                    <td colspan="">
                                        <center><span id="PrtQ6d1">&#9745;</span></center>
                                        <center><span id="PrtQ6nd1">&#9744;</span></center>
                                    </td>
                                    <td>
                                        <center><span id="PrtQ6d2">&#9745;</span></center>
                                        <center><span id="PrtQ6nd2">&#9744;</span></center>
                                    </td>
                                    <td colspan="5">
                                        <span id="PRTQ6Remarks"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>7</h5>
                                    </td>
                                    <td colspan="6">
                                        Update antivirus software and scan
                                    </td>
                                    <td colspan="">
                                    <center><span id="PrtQ7d1">&#9745;</span></center>
                                    <center><span id="PrtQ7nd1">&#9744;</span></center>
                                    </td>
                                    <td>
                                    <center><span id="PrtQ7d2">&#9745;</span></center>
                                    <center><span id="PrtQ7nd2">&#9744;</span></center>
                                    </td>
                                    <td colspan="5">
                                        <span id="PRTQ7Remarks"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>8</h5>
                                    </td>
                                    <td colspan="6">
                                       Defragment hard drives
                                    </td>
                                    <td colspan="">
                                        <center><span id="PrtQ8d1">&#9745;</span></center>
                                        <center><span id="PrtQ8nd1">&#9744;</span></center>
                                    </td>
                                    <td>
                                        <center><span id="PrtQ8d2">&#9745;</span></center>
                                        <center><span id="PrtQ8nd2">&#9744;</span></center>
                                    </td>
                                    <td colspan="5">
                                        
                                        <span id="PRTQ8Remarks"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>9</h5>
                                    </td>
                                    <td colspan="6">
                                       Free temporary files folder and Recycle Bin
                                    </td>
                                    <td>
                                        <center><span id="PrtQ9d1">&#9745;</span></center>
                                        <center><span id="PrtQ9nd1">&#9744;</span></center>
                                    </td>
                                    <td>
                                        <center><span id="PrtQ9d2">&#9745;</span></center>
                                        <center><span id="PrtQ9nd2">&#9744;</span></center>
                                    </td>
                                    <td colspan="5">
                                        <span id="PRTQ9Remarks"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>10</h5>
                                    </td>
                                    <td colspan="6">
                                       Create Admin account
                                    </td>
                                    <td colspan="">
                                        <center><span id="PrtQ10d1">&#9745;</span></center>
                                        <center><span id="PrtQ10nd1">&#9744;</span></center>
                                    </td>
                                    <td>
                                        <center><span id="PrtQ10d2">&#9745;</span></center>
                                        <center><span id="PrtQ10nd2">&#9744;</span></center>
                                    </td>
                                    <td colspan="5">
                                        <span id="PRTQ10Remarks"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>11</h5>
                                    </td>
                                    <td colspan="6">
                                       Make existing user as guest
                                    </td>
                                    <td colspan="">
                                        <center><span id="PrtQ11d1">&#9745;</span></center>
                                        <center><span id="PrtQ11nd1">&#9744;</span></center>
                                    </td>
                                    <td>
                                        <center><span id="PrtQ11d2">&#9745;</span></center>
                                        <center><span id="PrtQ11nd2">&#9744;</span></center>
                                    </td>
                                    <td colspan="5">
                                        <span id="PRTQ11Remarks"></span>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td>
                                        <h5>12</h5>
                                    </td>
                                    <td class="instruct" colspan="6">
                                      Change PC name to (officename),(username)
                                    </td>
                                    <td colspan="">
                                        <center><span id="PrtQ12d1">&#9745;</span></center>
                                        <center><span id="PrtQ12nd1">&#9744;</span></center>
                                    </td>
                                    <td>
                                        <center><span id="PrtQ12d2">&#9745;</span></center>
                                        <center><span id="PrtQ12nd2">&#9744;</span></center>                                       
                                    </td> 
                                    <td colspan="5">
                                        <span id="PRTQ12Remarks"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="14">
                                    </td>
                                </tr>
                                <tr style="background-color: rgba(41, 197, 93, 0.116);font-weight:bold;">
                                    <td  colspan="6">
                                        Performed by:
                                           
                                    </td>
                                    <td  colspan="7">
                                        Noted By:
                                        
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="6">
                                    <center>
                                        <div id="2sig-image" class="unget">
                                            <img id="watermark" src="watermark.png">
                                        </div>
                                    </center>
                                        <center>
                                        <span style="font-weight: light; text-transform: uppercase;" id="PerfBy"></span></br>
                                        <span style="font-size:10px;">Staff-In-Charge,IHOMS</span>
                                        </center>              
                                    </td>
                                    <td colspan="7">
                                    <center>
                                    <div id="2sig-image2" class="unget">
                                    <img id="watermark" src="watermark.png">
                                    </div>
                                    </center>
                                    <center>
                                    <span style="font-weight: light; text-transform: uppercase;" id="txtverifby"></span></br>
                                    <span style="font-size:10px;">Head,IHOMS</span>
                                    </center>                  
                                    </td>
                                </tr>
                                <tr> 
                                    <td colspan="14">
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

                <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" id="Clear">Clear Selected</button> -->
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <input type="button" class="btn btn-primary" id="prt" onclick="printDiv6('printThis6')" value="Print">
                <input type="button" class="btn btn-success" id="verify" value="Verify">
               
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
<!-- Preventinve Maintainance End -->

  </body>

  <script src="Resources/JS/Signature.js"></script>
  <script>
   
   function printDiv6(divName) {
       
               var printContents = document.getElementById(divName).innerHTML;
               var originalContents = document.body.innerHTML;
               document.body.innerHTML = printContents;

               window.print();

               document.body.innerHTML = originalContents;
               location.reload(true);
               
           }
  
 </script>
</html>