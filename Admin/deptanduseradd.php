<!----------------------------------Modal Add Department-------------------------------->
     <div class="modal fade" id="DeptModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Add Department</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <div class="row g-2">
                      <div class="col-sm-6">
                          <div class="form-floating mb-3">
                              <input type="text" class="form-control" id="dept_name" placeholder="name@example.com">
                              <label for="floatingInput">Deparment</label>
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-floating">
                              <select class="form-select" id="DRPDepartment" aria-label="Floating label select example">
                              <option selected>Select Department</option>
                              </select>
                              <label for="floatingSelect">Department</label>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="save_dept">Save changes</button>
              </div>  
          </div>
          </div>
      </div> 
          <!----------------------------------Modal Add User-------------------------------->
     <div class="modal fade" id="UserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Add User</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <div class="row g-2">
                  <div class="col-sm-6">
                          <div class="form-floating">
                              <select class="form-select" id="AddUserLevel" aria-label="Floating label select example">
                              <option value="--SELECT--" >Select User Level</option>
                              <option value="2">Admin</option>
                              <option value="3">User</option>
                              </select>
                              <label for="floatingSelect">User Level</label>
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-floating">
                              <select class="form-select" id="UserDepartment" aria-label="Floating label select example">
                              <option value="--SELECT--">-----SELECT DEPARTMENT----- </option>
                              </select>
                              <label for="floatingSelect">Department</label>
                          </div>
                      </div>

                      <div class="col-sm-12">
                          <div class="form-floating mb-12">
                              <input type="text" class="form-control" id="AddUsername" placeholder="name@example.com">
                              <label for="floatingInput">Username</label>
                          </div>
                      </div>    

                      <div class="col-sm-12">
                          <div class="form-floating mb-12">
                              <input type="password" class="form-control" id="AddPassword" placeholder="name@example.com">
                              <label for="floatingInput">Password</label>
                          </div>
                      </div>
                      <div class="col-sm-12">
                          <div class="form-floating mb-12">
                              <input type="password" class="form-control" id="ConfirmAddPassword" placeholder="name@example.com">
                              <label for="floatingInput">Confirm Password</label>
                          </div>
                      </div>
 
                      <span id="message"></span>
                      
                  </div>
              </div>
              <div class="modal-footer">
              
              <button type="button" class="btn btn-primary" id="save_user">Save changes</button>
              </div>
          </div>
          </div>
      </div> 
      <!------------------------------ MODAL ADD SIGNATURE ---------------------------------------------->
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
                <div id="clss">
                <label for="" id="lbl">Classify As:</label>
                <select name="" class="form-select" aria-label="Default select example" id="regurgent">
                <option value="--Select--">--Select--</option>
                    <option value="Regular">Regular</option>
                    <option value="Urgent">Urgent</option>
                </select>
                </div>

              </div>
              <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="save_classify">Save changes</button>
              <button type="button" class="btn btn-primary" id="accept">Accept Job Order</button>
              </div>  
          </div>
          </div>
      </div> 

        <!-- Preventinve Maintainance Start -->
        <!-- Modal -->
        <div class="modal fade" id="PMModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Preventive Maintainance Activity Checklist</h5>
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
                                <td colspan="14" style="text-align: center; background-color:  rgba(41, 197, 93, 0.116);">PREVENTIVE MAINTENANCE ACTIVITY CHECKLIST</td>
                            </tr>
                            <tr>
                                <td style="background-color: rgba(41, 197, 93, 0.116);">Name of Office</td>
                                <td colspan="4">
                                    <select id="PM_Office" class="form-select" aria-label="Default select example">
                                        <option value = "--SELECT--" selected>--SELECT OFFICE--</option>
                                      </select>
                                    <span id="SPPM_Office"></span>
                                </td>
                                <td style="background-color: rgba(41, 197, 93, 0.116);">Date</td>
                                <td colspan="2">
                                   <span id="PM_Date"></span>  
                                </td>
                            </tr>
                            <tr>
                                <td style="background-color: rgba(41, 197, 93, 0.116);">Department</td>
                                <td colspan="6">
                                    <span id="PM_Dept"></span>
                                </td>
                            </tr>
                            <tr>
                                <td style="background-color: rgba(41, 197, 93, 0.116);">Designated user</td>
                                <td colspan="6">
                                    <select id="PM_DesigUser" class="form-select" aria-label="Default select example">
                                        <option value = "--SELECT--" selected>--SELECT USER--</option>
                                      </select>
                                    <span id="SPPM_DesigUser"></span>
                                    <input type="text" class="form-control form-control-sm"  id="PM_Type" placeholder="">
                                </td>
                            </tr>
                            <tr>
                                <td style="background-color: rgba(41, 197, 93, 0.116);">Type of Computer</td>
                                <td colspan="6">
                                    <span id="PM_PCType"></span>
                                </td>
                            </tr>
                            <tr>
                                <td style="background-color: rgba(41, 197, 93, 0.116);">Serial No.</td>
                                <td colspan="6">
                                    <select id="PM_Serial" class="form-select" aria-label="Default select example">
                                        <option value ="--SELECT--"selected>--SELECT--</option>
                                    </select>
                                    <span id="SPPM_Serial"></span>

                                </td>
                            </tr>
                            <tr>
                                <td style="background-color: rgba(41, 197, 93, 0.116);">Model/Brand</td>
                                <td colspan="6">
                                    <span id="PM_ModelBrand" ></span>
                                </td>
                            </tr>
                            <tr>
                                <td style="background-color: rgba(41, 197, 93, 0.116);">OS</td>
                                <td>
                                    <!-- <input type="text" class="form-control form-control-sm"  id="" placeholder=""> -->
                                    <span id="PM_OS" ></span>
                                </td>
                                <td style="background-color: rgba(41, 197, 93, 0.116);">RAM</td>
                                <td>
                                    <!-- <input type="text" class="form-control form-control-sm"  id="" placeholder=""> -->
                                    <span id="PM_RAM" ></span>
                                </td>
                                <td colspan="2"style="background-color: rgba(41, 197, 93, 0.116);">HDD/SSD</td>
                                <td>
                                    <!-- <input type="text" class="form-control form-control-sm"  id="" placeholder=""> -->
                                    <span id="PM_HDDSSD" ></span>
                                </td>
                            </tr>
                            <tr>
                                <td style="background-color: rgba(41, 197, 93, 0.116);">PROCESSOR</td>
                                <td colspan="2"><span id="PM_Processor"></span></td>
                                <td style="background-color: rgba(41, 197, 93, 0.116);">LICENSE</td>
                                <td colspan="6">
                                    <span id="PM_License"></span>
                                </td>
                            </tr>
                            <tr>
                                <td style="background-color: rgba(41, 197, 93, 0.116);">MONITOR 1</td>
                                <td colspan="2"></td>
                                <td style="background-color: rgba(41, 197, 93, 0.116);">MONITOR 2</td>
                                <td colspan="6"></td>
                            </tr>
                            <tr>
                                <td style="background-color: rgba(41, 197, 93, 0.116);">BRAND/MODEL</td>
                                <td colspan="2"><input type="text" id ="PM_Monitor1Brand" class="form-control form-control-sm"></td>
                                <td style="background-color: rgba(41, 197, 93, 0.116);">BRAND/MODEL</td>
                                <td colspan="6"><input type="text" class="form-control form-control-sm" id ="PM_Monitor2Brand"></td>
                            </tr>
                            <tr>
                                <td style="background-color: rgba(41, 197, 93, 0.116);">Serial No.</td>
                                <td colspan="2">
                                    <input type="text" id="PM_Monitor1Serial" class="form-control form-control-sm" >
                                    <span id="SPPM_SerialMonitor1"></span> 
                                </td>
                                <td style="background-color: rgba(41, 197, 93, 0.116);">Serial No.</td>
                                <td colspan="6">
                                    <input type="text" id="PM_Monitor2Serial" class="form-control form-control-sm" placeholder="">
                                    <span id="SPPM_SerialMonitor2"></span> 
                                </td>
                            </tr>
                            <tr>
                                <td style="background-color: rgba(41, 197, 93, 0.116);">Keyboard</td>
                                <td>
                                    <select id="PM_KBStat" class="form-select" aria-label="Default select example">
                                        <option value ="N/A" selected>Keyboard</option>
                                        <option value="Working">Working</option>
                                        <option value="Not Working">Not Working</option>
                                      </select>
                                      <span id=""></span>
                                </td>
                                <td style="background-color: rgba(41, 197, 93, 0.116);">Brand/Model</td>
                                <td colspan="2"><input type="text"  class="form-control form-control-sm" id="PM_KBModel"></input></td>
                                <td style="background-color: rgba(41, 197, 93, 0.116);">Serial No.</td>
                                <td colspan="2">
                                    <input type="text" id="PM_KBSerial" class="form-control form-control-sm">
                                    <span id="SPPM_KBSerial"></span> 
                                </td>
                            </tr>
                            <tr>
                                <td style="background-color: rgba(41, 197, 93, 0.116);">Mouse</td>
                                <td>
                                    <select id="PM_MouseStat" class="form-select" aria-label="Default select example">
                                        <option value ="N/A" selected>Mouse</option>
                                        <option value="Working">Working</option>
                                        <option value="Not Working">Not Working</option>
                                      </select>
                                      <span id=""></span>
                                </td>
                                <td style="background-color: rgba(41, 197, 93, 0.116);">Brand/Model</td>
                                <td colspan="2"><input type="text"  class="form-control form-control-sm" id="PM_MouseModel"></input></td>
                                <td style="background-color: rgba(41, 197, 93, 0.116);">Serial No.</td>
                                <td colspan="2">
                                    <input type="text" id="PM_MouseSerial" class="form-control form-control-sm">
                                    <span id="SPPM_MouseSerial"></span> 
                                </td>
                            </tr>
                            <tr>
                                <td style="background-color: rgba(41, 197, 93, 0.116);">UPS</td>
                                <td>
                                    <select id="PM_UPSStat" class="form-select" aria-label="Default select example">
                                        <option value ="N/A" selected>UPS</option>
                                        <option value="Working">Working</option>
                                        <option value="Not Working">Not Working</option>
                                      </select>
                                      <span id=""></span>
                                </td>
                                <td style="background-color: rgba(41, 197, 93, 0.116);">Brand/Model</td>
                                <td colspan="2"><input type="text"  class="form-control form-control-sm" id="PM_UPSModel"></input></td>
                                <td style="background-color: rgba(41, 197, 93, 0.116);">Serial No.</td>
                                <td colspan="2">
                                    <input type="text"  class="form-control form-control-sm" id="PM_UPSSerial">
                                    <span id="SPPM_UPSSerial"></span> 
                                </td>
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
                                        <input class="form-check-input" type="radio" name="Q1"  value="Done">
                                    </td>
                                    <td>
                                        <input class="form-check-input" type="radio" name="Q1" value="Not Done">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm"  id="Q1Remarks" placeholder="">
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
                                        <input class="form-check-input" type="radio" name="Q2" value="Done" >
                                    </td>
                                    <td>
                                        <input class="form-check-input" type="radio" name="Q2" value="Not Done">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm"  id="Q2Remarks" placeholder="">
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
                                        <input class="form-check-input" type="radio" name="Q3" value="Done">
                                    </td>
                                    <td>
                                        <input class="form-check-input" type="radio" name="Q3" value="Not Done">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm"  id="Q3Remarks" placeholder="">
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
                                        <input class="form-check-input" type="radio" name="Q4" value="Done">
                                    </td>
                                    <td>
                                        <input class="form-check-input" type="radio" name="Q4" value="Not Done">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm"  id="Q4Remarks" placeholder="">
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
                                        <input class="form-check-input" type="radio" name="Q5" value="Done">
                                    </td>
                                    <td>
                                        <input class="form-check-input" type="radio" name="Q5" value="Not Done">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm"  id="Q5Remarks" placeholder="">
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
                                        <input class="form-check-input" type="radio" name="Q6" value="Done">
                                    </td>
                                    <td>
                                        <input class="form-check-input" type="radio" name="Q6" value="Not Done">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm"  id="Q6Remarks" placeholder="">
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
                                        <input class="form-check-input" type="radio" name="Q7" value="Done" >
                                    </td>
                                    <td>
                                        <input class="form-check-input" type="radio" name="Q7" value="Not Done">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm"  id="Q7Remarks" placeholder="">
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
                                        <input class="form-check-input" type="radio" name="Q8" value="Done" >
                                    </td>
                                    <td>
                                        <input class="form-check-input" type="radio" name="Q8"  value="Not Done">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm"  id="Q8Remarks" placeholder="">
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
                                        <input class="form-check-input" type="radio" name="Q9"  value="Done">
                                    </td>
                                    <td>
                                        <input class="form-check-input" type="radio" name="Q9"  value="Not Done">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm"  id="Q9Remarks" placeholder="">
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
                                        <input class="form-check-input" type="radio" name="Q10"  value="Done">
                                    </td>
                                    <td>
                                        <input class="form-check-input" type="radio" name="Q10" value="Not Done">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm"  id="Q10Remarks" placeholder="">
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
                                        <input class="form-check-input" type="radio" name="Q11" value="Done">
                                    </td>
                                    <td>
                                        <input class="form-check-input" type="radio" name="Q11" value="Not Done">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm"  id="Q11Remarks" placeholder="">
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
                                        <input class="form-check-input" type="radio" name="Q12" value="Done">
                                    </td>
                                    <td>
                                        <input class="form-check-input" type="radio" name="Q12" value="Not Done">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm"  id="Q12Remarks" placeholder="">
                                    </td>
                                </tr>
                                <tr style="background-color: rgba(41, 197, 93, 0.116);">
                                    <td  colspan="2">
                                        Performed by:
                                           
                                    </td>
                                    <td  colspan="3">
                                        Noted By:
                                        
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                    <center>
                                        <div id="sig-image">
                                            <img id="watermark" src="watermark.png">
                                        </div>
                                    </center>
                                        <center>
                                        <span style="font-weight: light; text-transform: uppercase;" id=""></span></br>
                                        <span style="font-size:10px;">Staff-In-Charge,IHOMS</span>
                                        </center>              
                                    </td>
                                    <td colspan="3">
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
                                        Conforme: 
                                        <span id=""></span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="Clear">Clear Fields</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="SAVE_PM">Save</button>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
<!-- Preventinve Maintainance End -->
            
<!-- Preventinve Maintainance Print Start -->
<!-- Modal -->
<div class="modal fade" id="try" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Preventive Maintainance Activity Checklist</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">  
                <div class="container">
                    <div id="printThis4">
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
                                <td colspan="14" style="text-align: center; background-color:  rgba(41, 197, 93, 0.116); font-weight:bold;">PREVENTIVE MAINTENANCE ACTIVITY CHECKLIST</td>
                                
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
                                        <!-- <input class="form-check-input" type="radio" name="Q2" value="Done" > -->
                                        <center><span id="PrtQ2nd1">&#9744;</span></center>
                                        <center><span id="PrtQ2d1">&#9745;</span></center>
                                    </td>
                                    <td>
                                        <!-- <input class="form-check-input" type="radio" name="Q2" value="Not Done"> -->
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
                                <tr style="background-color: rgba(41, 197, 93, 0.116); font-weight:bold;">
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
                <input type="button" class="btn btn-primary" id="prt" onclick="printDiv4('printThis4')" value="Print">
               
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
<!-- Preventinve Maintainance End -->

