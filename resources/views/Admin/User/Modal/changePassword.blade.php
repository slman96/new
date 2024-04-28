<div class="modal fade" id="changePasswordModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5  class="modal-title" id="exampleModalLabel">{{__('strings.Change_User_Password')}}</h5>
                <button type="button" style="{{__("strings.closeBtn")}}" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <p class="mb-2">{{__('strings.Password_requirements')}}</p>
                    <p class="small text-muted mb-2">{{__('strings.To_create_a_new_password')}}</p>
                    <ul class="small text-muted pl-4 mb-0">
                        <li id="length" class="invalid">{{__('strings.Minimum_6_character')}}</li>
                        <li id="letter" class="invalid">{{__('strings.At_least_one_letter')}}</li>
                        <li id="numbers" class="invalid">{{__('strings.At_least_one_number')}}</li>
                        <li id="Confirm" class="invalid">{{__('strings.New_pasword_must_be_Confirm')}}</li>
                        
                    </ul>
                </div>
                  <form action="" id="changePasswordForm">
                    @csrf
                    <input type="hidden" id="userid" value="">
                    <div class="form-group">
                        <label for="new_password">{{__('strings.New_Password')}}</label>
                        <input class="form-control" type="password" name="new_password" id="new_password" placeholder="{{__('strings.New_Password')}}">
                        <small id="new_password_error" class="form-text text-danger"></small>
                      </div>
                      <div class="form-group">
                        <label for="new_password_confirmation">{{__('strings.Confirm_Password')}}</label>
                        <input class="form-control" type="password" name="new_password_confirmation" id="new_password_confirmation" placeholder="{{__('strings.Confirm_Password')}}">
                        <small id="new_password_confirmation_error" class="form-text text-danger"></small>
                      </div>
                      <div class="box-footer">
                        <div class="form-group">
                            <button id="updatepassword" class="btn btn-block btn-success">{{__('strings.Save_Chang')}}</button>
                        </div>
                    </div>
                  </form>
                 
            </div>
        </div>
    </div>
</div>
<script src="{{asset('js/passwordCheck.js')}}" ></script>