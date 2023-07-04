 <!-- --------------------------------Modal Add User-------------------------------->
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

