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
<!-- WAG GAGALAWIN -- same lang connection nito sa native-->
<!-- OPO -->
                    <!-- OPO -->
<?php include 'deptanduseradd.php'?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IHOMS AMS | PM Forms</title>
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
    <!----Datatables Button---->
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
    <script src="Resources/JS/SupAdminStock.js"></script>
  </head>
  <body style="background:;">
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
                    <a class="nav-link active rounded-pill link-dark" style="background-color: aliceblue;" href="../Admin">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Inventory.php">Inventory</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Archives.php">Archive</a>
                </li>
                    <!--Report  drop down-->
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                    <i class="bi bi-file-earmark-text-fill"></i>&nbsp;Records</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="ComputerReports.php"><i class="bi bi-pc"></i>&nbsp;Computer Records</a></li>
                        <li><a class="dropdown-item" href="PrinterReports.php"><i class="bi bi-printer"></i>&nbsp;Printer Records</a></li>
                        <li><a class="dropdown-item" href="OtherReports.php"><i class="bi bi-box2"></i>&nbsp;Others Records</a></li>
                        <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#PMModal"><i class="bi bi-people"></i>&nbsp;PM Activity Checklist</a></li>
                        <li><a class="dropdown-item" href="ServiceReports.php"><i class="bi bi-ticket-detailed-fill"></i>&nbsp;Service Reports</a></li>
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

        <!-- Modal -->
        <div class="modal fade" id="PMModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="d-flex  justify-content-center" style="border: 1px solid black; border-bottom: none;">
                          <br/><br/>
                            <img src="../LOGOS/ITRMC.png"  style="height: 100px;margin-top: 25px;margin-right: 15px;">
                                <div class="text-center">
                                        <p class="mb-0 mt-4"><span>Republic of the Philippines</span></p>
                                        <h5 class="mb-0">Department of Health</h5>
                                        <h3 class="fw-bold mb-0" style="font-size: 25px;">ILOCOS TRAINING AND REGIONAL MEDICAL CENTER</h3>
                                        <span class="mb-0">City of San Fernando La Union</span>
                                        <br/><br/>
                                </div>
                            <img src="../LOGOS/DOH.png" class="img-fluid" style="height: 100px;margin-top: 25px; margin-left: 15px;">                    
                        </div>
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered"  style="border: 1px solid black;">
                            <tr>
                                <td colspan="7" style="text-align: center; background-color:  rgba(41, 197, 93, 0.116);">PREVENTIVE MAINTENANCE ACTIVITY CHECKLIST</td>
                            </tr>
                            <tr>
                                <td style="background-color: rgba(41, 197, 93, 0.116);">Name of Office</td>
                                <td colspan="4">
                                    <select id="" class="form-select" aria-label="Default select example">
                                        <option selected>Office</option>
                                        <option value="1">IHOM</option>
                                        <option value="2">BAC OFFICE</option>
                                        <option value="3">Motorpool</option>
                                      </select>
                                    <span id=""></span>
                                </td>
                                <td style="background-color: rgba(41, 197, 93, 0.116);">Date</td>
                                <td colspan="2">
                                    <input id="" type="date" class="form-control form-control-sm"  id="" placeholder="">
                                </td>
                            </tr>
                            <tr>
                                <td style="background-color: rgba(41, 197, 93, 0.116);">Department</td>
                                <td colspan="6">
                                    <select id="" class="form-select" aria-label="Default select example">
                                        <option selected>Department</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                      </select>
                                    <span id=""></span>
                                </td>
                            </tr>
                            <tr>
                                <td style="background-color: rgba(41, 197, 93, 0.116);">Type of Computer</td>
                                <td colspan="6">
                                    <select id="" class="form-select" aria-label="Default select example">
                                        <option selected>Type of Computer</option>
                                        <option value="1">Desktop</option>
                                        <option value="2">All in One</option>
                                        <option value="3">Assembled PC</option>
                                        <option value="3">Laptop</option>
                                        <option value="3">Others</option>
                                      </select>
                                    <span id=""></span>
                                </td>
                            </tr>
                            <tr>
                                <td style="background-color: rgba(41, 197, 93, 0.116);">Serial No.</td>
                                <td colspan="6">
                                    <input type="text" class="form-control form-control-sm"  id="" placeholder="">
                                </td>
                            </tr>
                            <tr>
                                <td style="background-color: rgba(41, 197, 93, 0.116);">Model/Brand</td>
                                <td colspan="6">
                                    <input type="text" class="form-control form-control-sm"  id="" placeholder="">
                                </td>
                            </tr>
                            <tr>
                                <td style="background-color: rgba(41, 197, 93, 0.116);">OS</td>
                                <td>
                                    <input type="text" class="form-control form-control-sm"  id="" placeholder="">
                                </td>
                                <td style="background-color: rgba(41, 197, 93, 0.116);">RAM</td>
                                <td>
                                    <input type="text" class="form-control form-control-sm"  id="" placeholder="">
                                </td>
                                <td colspan="2"style="background-color: rgba(41, 197, 93, 0.116);">HDD/SSD</td>
                                <td>
                                    <input type="text" class="form-control form-control-sm"  id="" placeholder="">
                                </td>
                            </tr>
                            <tr>
                                <td style="background-color: rgba(41, 197, 93, 0.116);">Processor</td>
                                <td colspan="2"><input type="text" class="form-control form-control-sm"  id="" placeholder=""></td>
                                <td style="background-color: rgba(41, 197, 93, 0.116);">License</td>
                                <td colspan="6">
                                    <select id="" class="form-select" aria-label="Default select example">
                                        <option selected>Choose your pokemon</option>
                                        <option value="1">YES</option>
                                        <option value="1">NO</option>
                                      </select>
                                    <span id=""></span>
                                </td>
                            </tr>
                            <tr>
                                <td style="background-color: rgba(41, 197, 93, 0.116);">Monitor 1</td>
                                <td colspan="2"><input type="text" class="form-control form-control-sm"  id="" placeholder=""></td>
                                <td style="background-color: rgba(41, 197, 93, 0.116);">Monitor 2</td>
                                <td colspan="6"><input type="text" class="form-control form-control-sm"  id="" placeholder=""></td>
                            </tr>
                            <tr>
                                <td style="background-color: rgba(41, 197, 93, 0.116);">Brand/Model</td>
                                <td colspan="2"><input type="text" class="form-control form-control-sm"  id="" placeholder=""></td>
                                <td style="background-color: rgba(41, 197, 93, 0.116);">Brand/Model</td>
                                <td colspan="6"><input type="text" class="form-control form-control-sm"  id="" placeholder=""></td>
                            </tr>
                            <tr>
                                <td style="background-color: rgba(41, 197, 93, 0.116);">Serial No.</td>
                                <td colspan="2"><input type="text" class="form-control form-control-sm"  id="" placeholder=""></td>
                                <td style="background-color: rgba(41, 197, 93, 0.116);">Serial No.</td>
                                <td colspan="6"><input type="text" class="form-control form-control-sm"  id="" placeholder=""></td>
                            </tr>
                            <tr>
                                <td style="background-color: rgba(41, 197, 93, 0.116);">Keyboard</td>
                                <td>
                                    <select id="" class="form-select" aria-label="Default select example">
                                        <option selected>Keyboard</option>
                                        <option value="1">Working</option>
                                        <option value="1">Not Working</option>
                                      </select>
                                      <span id=""></span>
                                </td>
                                <td style="background-color: rgba(41, 197, 93, 0.116);">Brand/Model</td>
                                <td colspan="2"><input type="text" class="form-control form-control-sm"  id="" placeholder=""></td>
                                <td style="background-color: rgba(41, 197, 93, 0.116);">Serial No.</td>
                                <td colspan="2"><input type="text" class="form-control form-control-sm"  id="" placeholder=""></td>
                            </tr>
                            <tr>
                                <td style="background-color: rgba(41, 197, 93, 0.116);">Mouse</td>
                                <td>
                                    <select id="" class="form-select" aria-label="Default select example">
                                        <option selected>Mouse</option>
                                        <option value="1">Working</option>
                                        <option value="1">Not Working</option>
                                      </select>
                                      <span id=""></span>
                                </td>
                                <td style="background-color: rgba(41, 197, 93, 0.116);">Brand/Model</td>
                                <td colspan="2"><input type="text" class="form-control form-control-sm"  id="" placeholder=""></td>
                                <td style="background-color: rgba(41, 197, 93, 0.116);">Serial No.</td>
                                <td colspan="2"><input type="text" class="form-control form-control-sm"  id="" placeholder=""></td>
                            </tr>
                            <tr>
                                <td style="background-color: rgba(41, 197, 93, 0.116);">UPS</td>
                                <td>
                                    <select id="" class="form-select" aria-label="Default select example">
                                        <option selected>UPS</option>
                                        <option value="1">Working</option>
                                        <option value="1">Not Working</option>
                                      </select>
                                      <span id=""></span>
                                </td>
                                <td style="background-color: rgba(41, 197, 93, 0.116);">Brand/Model</td>
                                <td colspan="2"><input type="text" class="form-control form-control-sm"  id="" placeholder=""></td>
                                <td style="background-color: rgba(41, 197, 93, 0.116);">Serial No.</td>
                                <td colspan="2"><input type="text" class="form-control form-control-sm"  id="" placeholder=""></td>
                            </tr>
                        </table>
                        <table class="table table-sm table-bordered" style="border: 1px solid black; border-top: none;">
                            <thead>
                                <tr style="background-color: rgba(41, 197, 93, 0.116);">
                                    <th>
                                        No.
                                    </th>
                                    <th>
                                        Work Instruction
                                    </th>
                                    <th>
                                        Done
                                    </th>
                                    <th>
                                        Not Done
                                    </th>
                                    <th>
                                        Remarks/Result
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <h5>1</h5>
                                    </td>
                                    <td>
                                        Turn off the computer and monitor
                                    </td>
                                    <td>
                                        <input class="form-check-input" type="radio" name="1" id="" >
                                    </td>
                                    <td>
                                        <input class="form-check-input" type="radio" name="1" id="" >
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm"  id="" placeholder="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>2</h5>
                                    </td>
                                    <td>
                                        Clean the monitor
                                    </td>
                                    <td>
                                        <input class="form-check-input" type="radio" name="2" id="" >
                                    </td>
                                    <td>
                                        <input class="form-check-input" type="radio" name="2" id="" >
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm"  id="" placeholder="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>3</h5>
                                    </td>
                                    <td>
                                        Remove grit, paper clips, staples, and crumbs
                                    </td>
                                    <td>
                                        <input class="form-check-input" type="radio" name="3" id="" >
                                    </td>
                                    <td>
                                        <input class="form-check-input" type="radio" name="3" id="" >
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm"  id="" placeholder="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>4</h5>
                                    </td>
                                    <td>
                                        Remove Dust (Outer part)
                                    </td>
                                    <td>
                                        <input class="form-check-input" type="radio" name="4" id="" >
                                    </td>
                                    <td>
                                        <input class="form-check-input" type="radio" name="4" id="" >
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm"  id="" placeholder="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>5</h5>
                                    </td>
                                    <td>
                                        Remove Dust (Inner Part)
                                    </td>
                                    <td>
                                        <input class="form-check-input" type="radio" name="5" id="" >
                                    </td>
                                    <td>
                                        <input class="form-check-input" type="radio" name="5" id="" >
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm"  id="" placeholder="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>6</h5>
                                    </td>
                                    <td>
                                        Uninstall unwanted files, programs, and application (i.e Torrents, Netflix, etc)
                                    </td>
                                    <td>
                                        <input class="form-check-input" type="radio" name="6" id="" >
                                    </td>
                                    <td>
                                        <input class="form-check-input" type="radio" name="6" id="" >
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm"  id="" placeholder="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>7</h5>
                                    </td>
                                    <td>
                                        Update antivirus software and scan
                                    </td>
                                    <td>
                                        <input class="form-check-input" type="radio" name="7" id="" >
                                    </td>
                                    <td>
                                        <input class="form-check-input" type="radio" name="7" id="" >
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm"  id="" placeholder="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>8</h5>
                                    </td>
                                    <td>
                                       Defragment hard drives
                                    </td>
                                    <td>
                                        <input class="form-check-input" type="radio" name="8" id="" >
                                    </td>
                                    <td>
                                        <input class="form-check-input" type="radio" name="8" id="" >
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm"  id="" placeholder="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>9</h5>
                                    </td>
                                    <td>
                                       Free temporary files folder and Recycle Bin
                                    </td>
                                    <td>
                                        <input class="form-check-input" type="radio" name="9" id="" >
                                    </td>
                                    <td>
                                        <input class="form-check-input" type="radio" name="9" id="" >
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm"  id="" placeholder="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>10</h5>
                                    </td>
                                    <td>
                                       Create Admin account
                                    </td>
                                    <td>
                                        <input class="form-check-input" type="radio" name="10" id="" >
                                    </td>
                                    <td>
                                        <input class="form-check-input" type="radio" name="10" id="" >
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm"  id="" placeholder="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>11</h5>
                                    </td>
                                    <td>
                                       Make existing user as guest
                                    </td>
                                    <td>
                                        <input class="form-check-input" type="radio" name="11" id="" >
                                    </td>
                                    <td>
                                        <input class="form-check-input" type="radio" name="11" id="" >
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm"  id="" placeholder="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5>12</h5>
                                    </td>
                                    <td>
                                      Change PC name to (officename),(username)
                                    </td>
                                    <td>
                                        <input class="form-check-input" type="radio" name="12" id="" >
                                    </td>
                                    <td>
                                        <input class="form-check-input" type="radio" name="12" id="" >
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm"  id="" placeholder="">
                                    </td>
                                </tr>
                                <tr style="background-color: rgba(41, 197, 93, 0.116);">
                                    <td  colspan="2">
                                        Preformed by
                                           
                                    </td>
                                    <td  colspan="3">
                                        Noted By
                                        
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <span" id="">asd</span>                  
                                    </td>
                                    <td colspan="3">
                                        <span" id="">asd</span>                         
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="6">
                                        Conforme: 
                                        <span id="">asd</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
            </div>
        </div>