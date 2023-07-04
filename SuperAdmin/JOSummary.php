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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="Resources/JS/SupAdmin.js"></script>
    <script src="Resources/JS/JOSummary.js"></script>

    <style>

      #shows{
          visibility: hidden;
        }
      @media print
      {
        #shows{
          visibility: visible;
        }
      }
    </style>

    <title>IHOMS AMS | Job Order Summary</title>
  </head>
  <body>
  <?php include 'modalsignature.php' ?>
  <?php include 'DepartmentandUserModal.php' ?>
  <!-- Navigation Start -->
   <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container bg-dark">
            <a href="../SuperAdmin"> <img src="logo.png" class="rounded-circle" width="50" height="50">
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
                <a class="nav-link" href="ViewServiceReports.php">Orders
                <span id="blinker" class="badge position-absolute start-80 translate-middle rounded-pill" >
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
  <!-- Navigation End -->
  <div class="container mt-4">
      <center>
      <h2>Job Order Summary</h2>
      </center>
    <div class="row mb-2">
    <div class="col-md ">
      <label for="">From</label>
      <input class="form-control" id="min" type="date" placeholder="Search..">
    </div>
    <div class="col-md">
      <label for="">To</label>
    <input class="form-control" id="max" type="date" placeholder="Search..">
    </div>
    </div>
    <div class="row mb-2">
    <div class="col-md">
      <label for="">Department</label>
      <select name="JO_DEPT" id="JO_DEPT" class="form-control">
        <option value="ALL">--SELECT--</option>
      </select>
    </div>
    <div class="col-md">
      <label for="">Type</label>
      <select name="JO_DEPT" id="JO_WT" class="form-control">
        <option value="ALL">--SELECT--</option>
        <option value="Computer">Computer</option>
        <option value="Printer">Printer</option>
        <option value="Network">Network</option>
        <option value="Software">Software</option>
        <option value="Others">Others</option>
      </select>
    </div>
    </div>

  </div>
  <div class="container" id="printThis">
    <center id="shows ">
      <h2>Job Order Summary</h2>
    </center>
    <br>
    <div class="table-responsive-md pt-1">
      <table class="table table-bordered table-striped" id="Summary_TBL">
        <thead>
          <tr>
            <p>The following are Job orders request for repairs,cablings, and other ICT technical support for the hospital:</p>
            <th> Job Order #</th>
            <th>Date</th>
            <th>Requesting Department</th>
            <th>Requesting Office</th>
            <th>Description</th>
            <th>Type</th>
          </tr>
        </thead>
        <tbody id="Summary_DATA">
          
        </tbody>
      </table>
           
      <table class="table table-bordered" style="border:transparent;">
          <tr>
              <td>Total:</td>
              <td style="font-weight:bold;" id = "TOTALJO"></td>
              <td> PC:</td>
              <td style="font-weight:bold;" id = "TOTALJOPC"></td>
              <td>Printer:</span></td>
              <td style="font-weight:bold;" id = "TOTALJOPRT"></td>
              <td>Network:</td>
              <td style="font-weight:bold;" id = "TOTALJONT"></td>
              <td>Other:</td>
              <td style="font-weight:bold;" id = "TOTALJOOTH"></td>
          </tr>
      </table>
      <div class="container">
        <div class="row justify-content-between">
              <div class="col-5">
                    <span>Summarized By:</span><br>
                    <input type="text" style="border-style:none;border-bottom:2px solid black;"><br>
                    <span>Monique P. Prepose</span><br>
                    <span style="font-size:12px;">Head,IHOMS</span>
              </div>
              <div class="col-4">
                <span>Approved By:</span><br>
                <input type="text" style="border-style:none;border-bottom:2px solid black;"><br>
                <span>Eduardo M. Badua III</span><br>
                <span style="font-size:12px;">Medical Center Chief II</span>
              </div>
      </div>
      </div>

    </div>
  </div>
</div> <br><br>
  <div class="container">
  <button type="button" class="btn btn-primary" id="print" onclick="printDiv('printThis')"><i class="fa fa-print"> Print</i> </button> &nbsp;
  <button type="button" class="btn btn-success" id="" onclick="tableToCSV('Summary_TBL')"><i class="fa fa-print"> Export to CSV</i></button>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  
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
      <script type="text/javascript">



        function tableToCSV(tableID) {

         
            var csv_data = [];
            var rows = document.getElementsByTagName('tr');
            for (var i = 0; i < rows.length; i++) {
                // Get each column data
                var cols = rows[i].querySelectorAll('td,th');
                var csvrow = [];
                for (var j = 0; j < cols.length; j++) {
                    csvrow.push(cols[j].innerHTML);
                }
 
               
                csv_data.push(csvrow.join(","));
            }
            csv_data = csv_data.join('\n');

            downloadCSVFile(csv_data);
 
        }
 
        function downloadCSVFile(csv_data) {
 
            
            CSVFile = new Blob([csv_data], {
                type: "text/csv"
            }); 
            var temp_link = document.createElement('a');
 
            // Download csv file
            temp_link.download = "Job Order Summary.csv";
            var url = window.URL.createObjectURL(CSVFile);
            temp_link.href = url;
 
            temp_link.style.display = "none";
            document.body.appendChild(temp_link);

            temp_link.click();
            document.body.removeChild(temp_link);
        }
    </script>
</body>
</html>


