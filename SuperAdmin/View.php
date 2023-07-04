<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IHOMS AMS | Dashboard</title>
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
    <script src="Resources/JS/TESTER.js"></script>
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
  

      <div class="container">
            <center class="mt-4">
                <h5>JOB ORDERS</h5>
             </center>
        <div class="row mt-4">
          <!--  -->
          <div class="col-sm-3 mt-3">
            <div class="card card-stats bg-light card-round">
            <div class="card-body">
              <div class="row">
      
                  <div class="col col-stats">
                    <div class="numbers">
                      <span class="fw-bold text-uppercase">New Orders</span>
                      <h5 class="blinker fw-bold text-uppercase" id="rqstd"></h5>
                      </div>
                    </div>
                  </div>
              </div>                      
            </div>
          </div>
          <!--  -->
        <div class="col-sm-3 mt-3">
          <div class="card card-stats bg-warning card-round">
            <div class="card-body">
              <div class="row">

                  <div class="col col-stats">
                    <div class="numbers">
                      <span class="fw-bold text-uppercase">MCC: FOR APPROVAL</span>
                      <h5 class="fw-bold text-uppercase" id="mccFA"></h5>
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

          <div class="col-sm-3 mt-3">
            <div class="card card-stats bg-primary card-round">
            <div class="card-body">
              <div class="row">
                  <div class="col col-stats">
                    <div class="numbers">
                      <span class="fw-bold text-uppercase">ON GOING</span>
                      <h5 class=" fw-bold text-uppercase" id="accepted"></h5>
                      </div>
                    </div>
                  </div>
              </div>                      
            </div>
          </div>
          

       <div class="container">
        <div class="row mt-4">
        <div class="col-sm-4 mt-3">
          <div class="card card-stats bg-warning card-round">
            <div class="card-body">
              <div class="row">
                  <div class="col col-stats">
                    <div class="numbers">
                      <span class="fw-bold text-uppercase">SR: FOR APPROVAL</span>
                      <h5 class="fw-bold text-uppercase" id="homisFA"></h5>
                      </div>
                    </div>
                  </div>
              </div>                      
            </div>
          </div> 
          <div class="col-sm-4 mt-3">
            <div class="card card-stats bg-success card-round">
            <div class="card-body">
              <div class="row">
                  <div class="col col-stats">
                    <div class="numbers">
                      <span class="fw-bold text-uppercase">DONE</span>
                      <h5 class="fw-bold text-uppercase" id="Approved"></h5>
                      </div>
                    </div>
                  </div>
              </div>                      
            </div>
          </div>  
          <div class="col-sm-4 mt-3">
            <div class="card card-stats bg-danger card-round">
            <div class="card-body">
              <div class="row">
                  <div class="col col-stats">
                    <div class="numbers">
                      <span class="fw-bold text-uppercase">CANCELLED</span>
                      <h5 class="fw-bold text-uppercase" id="Cancelled">0</h5>
                      </div>
                    </div>
                  </div>
              </div>                      
            </div>
          </div>
       </div>
        </div>
        </div>
      </div>
<br>
<div class="container">
    <center>
        <h5 for="">INVENTORY</h5>
    </center>
</div>
<div class="container">
    
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
                                                <h5 class="fw-bold text-uppercase">Computers    </h5>
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
                    <br>
<div class="container">
    <center>
        <h5 for="">STATUS</h5>
    </center>
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
</div>
<div class="container">
    
</div>
 
      
  </body>
 
</html>