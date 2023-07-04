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

    <!-- Bootstrap CSS -->
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/dataTables.bootstrap5.min.css">

    <link rel="stylesheet" href="style.css">
    
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> 

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

    <script src="Resources/JS/SupAdmin.js"></script>

    <title>IHOMS AMS | Dashboard</title>
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
                    <a class="nav-link active rounded-pill link-dark" style="background-color: aliceblue;" href="../SuperAdmin">Home</a>
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
                    <span id="blinker"  class="position-absolute top-4 start-80 translate-middle badge rounded-pill" >
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
                    <li><a class="dropdown-item" href="PrinterReports.php"><i class="bi bi-printer"></i>&nbsp;Printer Records</a></li>
                    <li><a class="dropdown-item" href="OtherReports.php"><i class="bi bi-box2"></i>&nbsp;Others Records</a></li>
                    <li><a class="dropdown-item" href="JOSummary.php"><i class="bi bi-clipboard2"></i>&nbsp;Job Order Summary Records</a></li>
                    <!-- <li></li> -->
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

             

<!-- --------------------------------Modal Maintenance END-------------------------------->
<!---------------------->
<!--  -->
<div class="container pt-2 mb-2 mt-4">
    <div class="row">
        <div class="col-lg" style="width:auto; height:25rem;">
            <canvas id="SuperChart" style="height:100%;"></canvas>
        </div>
        <div class="col-lg">
            <div class="card" style="width:auto; height:25rem;">
                <div id="carouselExampleDark1" class="carousel carousel-dark slide" data-bs-ride="carousel1">
                    <div class="carousel-inner" id="carousel_PM">
                        <div class="carousel-item active">
                            <div class="card text-center">
                                <div class="card-body" style="width:auto; height:25rem;" >
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                    <h1 class="card-text align-middle">Preventive Maintenance Schedules</h1>
                                </div>
                            </div>
                        </div>
                        <div class='carousel-item'>
                        <div class='card text-center' style='width:auto; overflow-y:scroll; height: 25rem;'>
                            <div class='card-body'>
                                <h5 class="card-title">January</h5>
                                <div class="row"  id="January"> 

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='carousel-item'>
                        <div class='card text-center' style='width:auto;  overflow-y:scroll; height: 25rem;'>
                            <div class='card-body'>
                                <h5 class="card-title">February</h5>
                                <div class="row"  id="February"> 

                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class='carousel-item'>
                        <div class='card text-center' style='width:auto; overflow-y:scroll; height: 25rem;'>
                            <div class='card-body'>
                                <h5 class="card-title">March</h5>
                                <div class="row"  id="March"> 

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='carousel-item'>
                        <div class='card text-center' style='width:auto; overflow-y:scroll; height: 25rem;'>
                            <div class='card-body'>
                                <h5 class="card-title">April</h5>
                                <div class="row"  id="April"> 

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='carousel-item'>
                        <div class='card text-center' style='width:auto; overflow-y:scroll; height: 25rem;'>
                            <div class='card-body'>
                                <h5 class="card-title">May</h5>
                                <div class="row"  id="May"> 

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='carousel-item'>
                        <div class='card text-center' style='width:auto; overflow-y:scroll; height: 25rem; '>
                            <div class='card-body'>
                                <h5 class="card-title">June</h5>
                                <div class="row"  id="June"> 

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='carousel-item'>
                        <div class='card text-center' style='width:auto; overflow-y:scroll; height: 25rem;'>
                            <div class='card-body'>
                                <h5 class="card-title">July</h5>
                                <div class="row"  id="July"> 

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='carousel-item'>
                        <div class='card text-center' style='width:auto; overflow-y:scroll; height: 25rem;'>
                            <div class='card-body'>
                                <h5 class="card-title">August</h5>
                                <div class="row"  id="August"> 

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='carousel-item'>
                        <div class='card text-center' style='width:auto; overflow-y:scroll; height: 25rem;'>
                            <div class='card-body'>
                                <h5 class="card-title">September</h5>
                                <div class="row"  id="September"> 

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='carousel-item'>
                        <div class='card text-center' style='width:auto; overflow-y:scroll; height: 25rem;'>
                            <div class='card-body'>
                                <h5 class="card-title">October</h5>
                                <div class="row"  id="October"> 

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='carousel-item'>
                        <div class='card text-center' style='width:auto; overflow-y:scroll; height: 25rem;'>
                            <div class='card-body'>
                                <h5 class="card-title">November</h5>
                                <div class="row"  id="November"> 

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='carousel-item'>
                        <div class='card text-center' style='width:auto; overflow-y:scroll; height: 25rem;'>
                            <div class='card-body'>
                                <h5 class="card-title">December</h5>
                                <div class="row"  id="December"> 

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='carousel-item'>
                        <div class='card text-center' style='width:auto; height: 25rem; overflow-y:scroll;'>
                            <div class='card-body'>
                                <h5 class="card-title">Unscheduled</h5>
                                <div class="row"  id="Unscheduled"> 

                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark1" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark1" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
          <!--  -->
    <div class="container mt-3">
        <div class="row">
                <div class="col-md-4 mt-4">
                            <div class="card card-stats bg-info card-round">    
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-2">
                                            <div class="icon fa-lg text-center">
                                                <h1><i class="bi bi-pc-display"></i></h1>
                                            </div>
                                        </div>
                                        <div class="col-1 col-stats">
                                        
                                        </div>
                                        <div class="col col-stats">
                                            <div class="numbers mt-4">
                                                <h5 class="fw-bold text-uppercase">Computers</h5> 
                                                <h4 class="d-inline fw-bold" id="NumberOfComputer"></h4>
                                                <h4 class="d-inline fw-bold" id="">/</h4>
                                                <h4 class="d-inline fw-bold" id="TotalComputer"></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <a href="#" class="card-link text-dark">Total No. of Computer Equipments In Use</a>
                                </div>
                            </div>
                    </div>
                        <div class="col-md-4 mt-4">
                            <div class="card card-stats bg-info card-round">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="icon fa-lg text-center">
                                                <h1><i class="bi bi-printer-fill"></i></h1>
                                            </div>
                                        </div>
                                        <div class="col-1 col-stats">
                                        
                                        </div>
                                        <div class="col col-stats">
          
                             <div class="numbers mt-4">
                                                <h5 class="fw-bold text-uppercase">Printers/Scanners</h5>
                                                <h4 class="d-inline fw-bold" id="NumberOfPrinter"></h4>
                                                <h4 class="d-inline fw-bold" id="">/</h4>
                                                <h4 class="d-inline fw-bold" id="TotalPrinter"></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <a href="#" class="card-link text-dark">Total No. of Printers and Scanners Equipments In Use </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mt-4">
                            <div class="card card-stats bg-info card-round">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="icon fa-lg text-center">
                                                <h1><i class="bi bi-gear-wide-connected"></i></h1>
                                            </div>
                                        </div>
                                        <div class="col-1 col-stats">
                                        
                                        </div>
                                        <div class="col col-stats">
                                            <div class="numbers mt-4">
                                                <h5 class="fw-bold text-uppercase">Others </h5>
                                                <h4 class="d-inline fw-bold" id="NumberOfOthers"></h4>
                                                <h4 class="d-inline fw-bold" id="">/</h4>
                                                <h4 class="d-inline fw-bold" id="TotalOthers"></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <a href="#" class="card-link text-dark">Total No. of Other Equipments In Use</a>
                                </div>
                            </div>
                        </div>
                    </div>   
                    <!--------------4 Cards-------------------->
                <div class="row mt-4">
                    <div class="col-sm-3 mt-3">
                            <div class="card card-stats bg-success card-round">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-2">
                                            <div class="icon text-center">
                                                    <h4><i class="bi bi-gear-fill"></i></h4>
                                            </div>
                                        </div>
                                        
                                        <div class="col col-stats">
                                            <div class="numbers mt-4">
                                                <span class="fw-bold text-uppercase">In Use</span>
                                                <h5 class="fw-bold text-uppercase" id="NumberIU"></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-sm-3 mt-3">
                            <div class="card card-stats bg-secondary card-round">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="icon text-center">
                                                    <h4><i class="bi bi-tools"></i></h4>
                                            </div>
                                        </div>
                                        
                                        <div class="col col-stats">
                                            <div class="numbers mt-4">
                                                <span class="fw-bold text-uppercase">For Repair/Pulled Out</span>
                                                <h5 class="fw-bold text-uppercase" id="NumberFRPO"></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-sm-3 mt-3">
                            <div class="card card-stats bg-warning card-round">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="icon text-center">
                                                    <h4><i class="bi bi-box-arrow-up-left"></i></h4>
                                            </div>
                                        </div>
                                        
                                        <div class="col col-stats">
                                            <div class="numbers mt-4">
                                                <span class="fw-bold text-uppercase">Pending Condemn</span>
                                                <h5 class="fw-bold text-uppercase" id="NumberPC"></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                            </div>
                        </div>
                        <div class="col-sm-3 mt-3">
                            <div class="card card-stats bg-danger card-round">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="icon text-center">
                                                    <h4><i class="bi bi-x-lg"></i></h4>
                                            </div>
                                        </div>
                                        <div class="col col-stats">
                                            <div class="numbers mt-4">
                                                <span class="fw-bold text-uppercase">Condemned</span>
                                                <h5 class="fw-bold text-uppercase" id="NumberCond"></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                     </div> 
                </div>
            </div>
        </div>
    <!-- </section> -->

    <style>
        .googleCalendar{
        position: relative;
        height: 0;
        width: 100%;
        padding-bottom: 50%;
        }

        .googleCalendar iframe{
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <footer class="text-center text-lg-start text-white" style="background-color: #3e4551" >

<div class="text-center p-3 mt-5" style="background-color: rgba(0, 0, 0, 0.05);">
  © 2023 Copyright:
  <a class="text-white" href="">IHOMS - Integrated Hospital Operations Management System</a>
</div>
</footer>

  </body>
</html>