 <!----------------------------------Modal Add Department-------------------------------->
 <div class="modal fade" id="DeptModal" tabindex="-1" aria-labelledby="DeptModal" aria-hidden="true">
          <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
              <h1 class="modal-title fs-5" id="DeptModal">Add Department</h1>
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
          <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Add User</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <div class="row g-2">
                      <div class="col-sm-12">
                          <div class="form-floating mb-12">
                              <input type="text" class="form-control" id="AddFullName" placeholder="name@example.com">
                              <label for="floatingInput">Full Name</label> 
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
                      <div class="col-sm-6">
                          <div class="form-floating">
                              <select class="form-select" id="UserDepartment" aria-label="Floating label select example">
                              <option value="--SELECT--">-----SELECT DEPARTMENT----- </option>
                              </select>
                              <label for="floatingSelect">Department</label>
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-floating">
                              <select class="form-select" id="AddUserLevel" aria-label="Floating label select example">
                              <option value="--SELECT--">Select User Level</option>
                              <option value="1">Super Admin</option>
                              <option value="1.5">MCC</option>
                              <option value="2">Admin</option>
                              <option value="2.5">DCI</option>
                              <option value="3">User</option>
                              </select>
                              <label for="floatingSelect">User Level</label>
                          </div>
                      </div>
                  </div>
                  <div class="row g-2 mt-2">
                  <div class="card" style="background-color:rgb(237, 238, 240);" width="100%">
                                    <h5 class="card-header">User Request</h5>
                                    <div class="card-body">
                                        <h5 class="card-title"></h5>
                                        <table id="tbl_users" class="table table-striped" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>User</th>
                                                    <th>Department</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="users_data">
                                            </tbody>
                                            <tfoot>
                                                <th>User</th>
                                                <th>Department</th>
                                                <th>Action</th>
                                            </tfoot>    
                                        </table>
                                    </div>
                                </div>
                  </div>
              </div>
              <div class="modal-footer">
              <button type="button" class="btn btn-primary" id="save_user">Save changes</button>
              </div>
          </div>
          </div>
      </div>