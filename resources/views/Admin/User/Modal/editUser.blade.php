<div class="modal fade" id="edituser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__("strings.Edit_User_Info")}}</h5>
                <button type="button" style="{{__("strings.closeBtn")}}" class="close" data-bs-dismiss="modal" aria-label="Close">
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
                              <label for="firstname">{{__("strings.Firstname")}}</label>
                              <input name="firstname" type="text" class="form-control" id="firstname" placeholder="{{__("strings.Firstname")}}">
                              <small id="firstname_error" class="form-text text-danger"></small>
                             </div>
                           </div>
                           <div class="box-body">
                            <div class="form-group">
                              <label for="lastname">{{__("strings.Lastname")}}</label>
                              <input name="lastname" type="text" class="form-control" id="lastname" placeholder="{{__("strings.Lastname")}}">
                              <small id="lastname_error" class="form-text text-danger"></small>
                             </div>
                           </div>
                       <div class="box-body">
                        <div class="form-group">
                          <label for="role" >{{__('strings.role')}}</label>
                          <select id="role" name="role" class="form-control">
                            <option value="user">{{__('strings.user')}}</option>
                            <option value="admin">{{__('strings.admin')}}</option>
                          </select>
                          <small id="role_error" class="form-text text-danger"></small>
                        </div>
                        <div class="form-group">
                            <label for="country">{{__('strings.Country')}}</label>
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
                          <label for="address">{{__('strings.Address')}}</label>
                          <input type="hidden" name="latitude" id="latitude">
                          <input type="hidden" name="longitude" id="longitude">
                          <input class="form-control" type="text" name="address" id="pac-input" placeholder="{{__("strings.search")}}">
                          <small id="address_error" class="form-text text-danger"></small>
                        </div>
                        <div id="map" style="width: 470px; height:500px"></div>
                    </div>
                        <div class="box-body">
                        <div class="form-group">
                            <label for="image">{{__("strings.Image")}}:</label>
                            <input class="form-control" type="file" name="image" id="image" >
                        </div>
                        </div>
                        <div class="img-holder" ></div>
                        <div class="box-body" >
                        <div class="form-group">
                          <label for="phone_number"> {{__("strings.Phone")}}</label>
                           <div class="iti">
                            <input name="phone_number" id="phone_number" type="tel"> 
                           </div>
                           <small id="phone_number_error" class="form-text text-danger"></small>
                        </div>
                        </div>
                        <div class="box-body">
                        <div class="form-group">
                          <label for="email">{{__("strings.Email")}}</label>
                          <input class="form-control" type="email" name="email" id="email" placeholder="{{__("strings.Email")}}">
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
<script src="{{asset('js/map.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key={{ config('app.MapKey') }}&libraries=places&callback=initAutocomplete&language=en&region=sy
async defer"></script>