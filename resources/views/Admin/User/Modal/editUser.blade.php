<div class="modal fade" id="edituser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit User Info</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="" id="UpdateUserForm">
                    @csrf
                    <input type="hidden" id="userid">
                    <div class="box-body">
                        <div class="box-body">
                            <div class="form-group">
                              <label for="firstname">first name:</label>
                              <input name="firstname" type="text" class="form-control" id="firstname" placeholder="user type">
                              <small id="firstname_error" class="form-text text-danger"></small>
                             </div>
                           </div>
                           <div class="box-body">
                            <div class="form-group">
                              <label for="lastname">last name:</label>
                              <input name="lastname" type="text" class="form-control" id="lastname" placeholder="user last name">
                              <small id="lastname_error" class="form-text text-danger"></small>
                             </div>
                           </div>
                       <div class="box-body">
                        <div class="form-group">
                          <label for="role">user role:</label>
                          <select id="role" name="role" class="form-control">
                            <option value="user">user</option>
                            <option value="admin">admin</option>
                          </select>
                          <small id="role_error" class="form-text text-danger"></small>
                        </div>
                        <div class="form-group">
                            <label for="country">country:</label>
                            <select id="country" name="country" class="form-control">
                              <option value="Syria">Syria</option>
                              <option value="Lebanon">Lebanon</option>
                              <option value="Iraq">Iraq</option>
                              <option value="Jordan">Jordan</option>
                              <option value="Palestine">Palestine</option>
                              <option value="Saudi Arabia">Saudi Arabia</option>
                              <option value="United Arab Emirates">United Arab Emirates</option>
                              <option value="Bahrain">Bahrain</option>
                              <option value="Oman">Oman</option>
                              <option value="Kuwait">Kuwait</option>
                              <option value="Yemen">Yemen</option>
                              <option value="Qatar">Qatar</option>
                              <option value="Egypt">Egypt</option>
                              <option value="Libya">Libya</option>
                              <option value="Algeria">Algeria</option>
                              <option value="Morocco">Morocco</option>
                              <option value="Sudan">Sudan</option>
                              <option value="Tunisia">Tunisia</option>
                              <option value="Somalia">Somalia</option>
                              <option value="Mauritania">Mauritania</option>
                              <option value="Djibouti">Djibouti</option>
                            </select>
                            <small id="country_error" class="form-text text-danger"></small>
                          </div>
                       </div>
                        <div class="box-body">
                        </div>
                        <div class="box-body">
                        <div class="form-group">
                          <label for="address">address:</label>
                          <input class="form-control" type="text" name="address" id="address" placeholder="user address">
                          <small id="address_error" class="form-text text-danger"></small>
                        </div>
                    </div>
                        <div class="box-body">
                        <div class="form-group">
                            <label for="image">image:</label>
                            <input class="form-control" type="file" name="image" id="image" placeholder="user address">
                        </div>
                        </div>
                        <div class="box-body" >
                        <div class="form-group">
                          <label for="phone"> phone number:</label>
                          <input class="form-control" type="number" name="phone" id="phone" placeholder="user phone number">
                        
                          <small id="phone_error" class="form-text text-danger"></small>
                        </div>
                        </div>
                        <div class="box-body">
                        <div class="form-group">
                          <label for="email">email address:</label>
                          <input class="form-control" type="email" name="email" id="email" placeholder="user email address">
                        
                          <small id="email_error" class="form-text text-danger"></small>
                        </div>
                        </div>  
                    </div>
                    <div class="form-check">
                    <div class="box-footer">
                        <div class="form-group">
                            <button id="updateuser" class="btn btn-block btn-success">Save Changes</button>
                        </div>
                    </div>
                    </div>
                  </form>
            </div>
        </div>
    </div>
</div>