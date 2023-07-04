<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IHOMS IMS - Title Here</title>
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
    <!-- <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script> -->
    <script src="Resources/JS/PM.js"></script>
    <script src="Resources/JS/SupAdmin.js"></script>
        <style>
          .form-control {
            border: 0;
        }
       
       .form-control:read-only {
        background-color: #fff;
    }
        </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container bg-dark">
        <a href="../SuperAdmin"> <img src="logo.png" class="rounded-circle" width="50" height="50"></a>
            <label style="color:#fff; margin-left:10px;"></label>
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
                <a class="nav-link"  href="AddStocks.php">Stocks</a>
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
                  <li><a class="dropdown-item" href="PrinterReports.php"><i class="bi bi-printer"></i></i>&nbsp;Printer Records</a></li>
                  <li><a class="dropdown-item" href="OtherReports.php"><i class="bi bi-box2"></i></i>&nbsp;Others Records</a></li>
                  <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#maintenance"><i class="bi bi-screwdriver"></i>&nbsp;Preventinve Maintenance</a></li>
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
                  <li><a class="dropdown-item round-pill" href="remarks.php"><i class="bi bi-bookmark-plus-fill"></i>&nbsp;Remarks</a></li>
                  <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#maintenance"><i class="bi bi-screwdriver"></i>&nbsp;Preventinve Maintenance</a></li>
                  <hr class="hr hr-blurry" />
                  <li><a class="dropdown-item" href="../logout.php"><i class="bi bi-arrow-left"></i>&nbsp;Log Out</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
    </nav>
    <div class="container">
    <button class="btn btn-primary btn-border btn-round btn-sm" onclick="printDiv('printThis')">
      <i class="fa fa-print"></i>
      Print Certificate
    </button>

    </div>
    <div class="card">
      <div class="card-body" id="printThis">
              <div class="d-flex  justify-content-center " style="border: 1px solid black; border-bottom: none;">
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
                <td colspan="3"><input type="text" class="form-control form-control-sm"  id="" placeholder="" readonly></td>
                <td style="background-color: rgba(41, 197, 93, 0.116);">Date:</th>
                <td><input type="date" class=" form-control form-control-sm" value="" id="" placeholder="" readonly></td>
            </tr>
            <tr>
                <td style="background-color: rgba(41, 197, 93, 0.116);">Description:</td>
                <td colspan="3"><input type="text" class="form-control form-control-sm"  id="" placeholder="" readonly></td>
                <td style="background-color: rgba(41, 197, 93, 0.116);">Job Order Number:</th>
                <td><input type="text" class="form-control form-control-sm"  id="" placeholder="" readonly></td>
            </tr>
            <tr>
                <td style="background-color: rgba(41, 197, 93, 0.116);">Model:</td>
                <td colspan="3"><input type="text" class="form-control form-control-sm"  id="" placeholder="" readonly></td>
                <td style="background-color: rgba(41, 197, 93, 0.116);">Department:</th>
                <td><input type="text" class="form-control form-control-sm"  id="" placeholder="" readonly></td>
            </tr>
            <tr>
                <td style="background-color: rgba(41, 197, 93, 0.116);">Serial Number:</td>
                <td colspan="3"><input type="text" class="form-control form-control-sm"  id="" placeholder="" readonly></td>
                <td style="background-color: rgba(41, 197, 93, 0.116);">Office:</th>
                <td><input type="text" class="form-control form-control-sm"  id="" placeholder="" readonly></td>
            </tr>
            
            <tr>
                <td style="background-color: rgba(41, 197, 93, 0.116);" colspan="6">Action Taken</td>
            </tr>
            <tr>
                <td colspan="6">
                    <input type="text" class="form-control form-control-sm"  id="" placeholder="">
                </td>
            </tr>
            <tr>
                <td style="background-color: rgba(41, 197, 93, 0.116);" colspan="6">Assessment</td>
            </tr>
            <tr>
                <td colspan="6">
                    <input type="text" class="form-control form-control-sm"  id="" placeholder="">
                </td>
            </tr>
            <tr>
              <td style="background-color: rgba(41, 197, 93, 0.116);" colspan="6">Recommendation</td>
            </tr>
            <tr>
                <td colspan="6">
                    <input type="text" class="form-control form-control-sm"  id="" placeholder="">
                </td>
            </tr>
            <tr>
              <td style="background-color: rgba(41, 197, 93, 0.116);" colspan="4">Performed by:</td>
              <td style="background-color: rgba(41, 197, 93, 0.116);" colspan="2">Verified by:</td>
            </tr>
            <tr>
                <td colspan="3">
                  	<!-- Content -->
                      <div class="container">
                        <div class="row">
                          <div class="col-md-12">
                            <h1>E-Signature</h1>
                            <p>Sign in the canvas below and save your signature as an image!</p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <canvas id="sig-canvas" width="620" height="160">
                              Get a better browser, bro.
                            </canvas>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <button class="btn btn-primary" id="sig-submitBtn">Submit Signature</button>
                            <button class="btn btn-default" id="sig-clearBtn">Clear Signature</button>
                          </div>
                        </div>
                        <br/>
                        <div class="row">
                          <div class="col-md-12">
                            <textarea id="sig-dataUrl" class="form-control" rows="5">Data URL for your signature will go here!</textarea>
                          </div>
                        </div>
                        <br/>
                        <div class="row">
                          <div class="col-md-12">
                            <img id="sig-image" src="" alt="Your signature will go here!"/>
                          </div>
                        </div>
                      </div>

                    <input type="text" class="form-control form-control-sm"  id="" placeholder="">
                </td>
                <td colspan="3">
                    <input type="text" class="form-control form-control-sm"  id="" placeholder="">
                </td>
            </tr>
            
        </table>
        </div>
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
                
            }
            (function() {
                window.requestAnimFrame = (function(callback) {
                  return window.requestAnimationFrame ||
                    window.webkitRequestAnimationFrame ||
                    window.mozRequestAnimationFrame ||
                    window.oRequestAnimationFrame ||
                    window.msRequestAnimaitonFrame ||
                    function(callback) {
                      window.setTimeout(callback, 1000 / 60);
                    };
                })();

                var canvas = document.getElementById("sig-canvas");
                var ctx = canvas.getContext("2d");
                ctx.strokeStyle = "#222222";
                ctx.lineWidth = 4;

                var drawing = false;
                var mousePos = {
                  x: 0,
                  y: 0
                };
                var lastPos = mousePos;

                canvas.addEventListener("mousedown", function(e) {
                  drawing = true;
                  lastPos = getMousePos(canvas, e);
                }, false);

                canvas.addEventListener("mouseup", function(e) {
                  drawing = false;
                }, false);

                canvas.addEventListener("mousemove", function(e) {
                  mousePos = getMousePos(canvas, e);
                }, false);

                // Add touch event support for mobile
                canvas.addEventListener("touchstart", function(e) {

                }, false);

                canvas.addEventListener("touchmove", function(e) {
                  var touch = e.touches[0];
                  var me = new MouseEvent("mousemove", {
                    clientX: touch.clientX,
                    clientY: touch.clientY
                  });
                  canvas.dispatchEvent(me);
                }, false);

                canvas.addEventListener("touchstart", function(e) {
                  mousePos = getTouchPos(canvas, e);
                  var touch = e.touches[0];
                  var me = new MouseEvent("mousedown", {
                    clientX: touch.clientX,
                    clientY: touch.clientY
                  });
                  canvas.dispatchEvent(me);
                }, false);

                canvas.addEventListener("touchend", function(e) {
                  var me = new MouseEvent("mouseup", {});
                  canvas.dispatchEvent(me);
                }, false);

                function getMousePos(canvasDom, mouseEvent) {
                  var rect = canvasDom.getBoundingClientRect();
                  return {
                    x: mouseEvent.clientX - rect.left,
                    y: mouseEvent.clientY - rect.top
                  }
                }

                function getTouchPos(canvasDom, touchEvent) {
                  var rect = canvasDom.getBoundingClientRect();
                  return {
                    x: touchEvent.touches[0].clientX - rect.left,
                    y: touchEvent.touches[0].clientY - rect.top
                  }
                }

                function renderCanvas() {
                  if (drawing) {
                    ctx.moveTo(lastPos.x, lastPos.y);
                    ctx.lineTo(mousePos.x, mousePos.y);
                    ctx.stroke();
                    lastPos = mousePos;
                  }
                }

                // Prevent scrolling when touching the canvas
                document.body.addEventListener("touchstart", function(e) {
                  if (e.target == canvas) {
                    e.preventDefault();
                  }
                }, false);
                document.body.addEventListener("touchend", function(e) {
                  if (e.target == canvas) {
                    e.preventDefault();
                  }
                }, false);
                document.body.addEventListener("touchmove", function(e) {
                  if (e.target == canvas) {
                    e.preventDefault();
                  }
                }, false);

                (function drawLoop() {
                  requestAnimFrame(drawLoop);
                  renderCanvas();
                })();

                function clearCanvas() {
                  canvas.width = canvas.width;
                }

                // Set up the UI
                var sigText = document.getElementById("sig-dataUrl");
                var sigImage = document.getElementById("sig-image");
                var clearBtn = document.getElementById("sig-clearBtn");
                var submitBtn = document.getElementById("sig-submitBtn");
                clearBtn.addEventListener("click", function(e) {
                  clearCanvas();
                  sigText.innerHTML = "Data URL for your signature will go here!";
                  sigImage.setAttribute("src", "");
                }, false);
                submitBtn.addEventListener("click", function(e) {
                  var dataUrl = canvas.toDataURL();
                  sigText.innerHTML = dataUrl;
                  sigImage.setAttribute("src", dataUrl);
                }, false);

              })();
  </script>
</html>