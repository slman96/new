<div class="modal fade" id="changePasswordModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Change User Password</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <p class="mb-2">Password requirements</p>
                    <p class="small text-muted mb-2">To create a new password, you have to meet all of the following requirements:</p>
                    <ul class="small text-muted pl-4 mb-0">
                        <li id="length" class="invalid">Minimum 6 character</li>
                        <li id="letter" class="invalid">At least one letter</li>
                        <li id="numbers" class="invalid">At least one number</li>
                        <li id="Confirm" class="invalid">New pasword must be Confirm</li>
                    </ul>
                </div>
                  <form action="" id="changePasswordForm">
                    @csrf
                    <input type="hidden" id="userid" value="">
                    <div class="form-group">
                        <label for="new_password">New password:</label>
                        <input class="form-control" type="password" name="new_password" id="new_password" placeholder="new password">
                        <small id="new_password_error" class="form-text text-danger"></small>
                      </div>
                      <div class="form-group">
                        <label for="new_password_confirmation">New password confirm:</label>
                        <input class="form-control" type="password" name="new_password_confirmation" id="new_password_confirmation" placeholder="new password confirm">
                        <small id="new_password_confirmation_error" class="form-text text-danger"></small>
                      </div>
                      <div class="box-footer">
                        <div class="form-group">
                            <button id="updatepassword" class="btn btn-block btn-success">Save Changes</button>
                        </div>
                    </div>
                  </form>
                 
            </div>
        </div>
    </div>
</div>
<script src="{{asset('js/passwordCheck.js')}}" ></script>