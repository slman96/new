
    @extends('layouts.master')
    @section('content')
    <div class="alert alert-success" id="success_msg" style="display: none;">
        password change successfly
    </div>
    <div class="container">
    <div class="text">
      Change password
   </div>
   <form id="password" name="frm-login" method="POST" action="">
    @csrf
 <div class="form-row">
    <input type="hidden" id="userid" value="{{$user->id}}">
  <div class="input-data">
     <input type="password"  name="new_password">
     <div class="underline"></div>
     <label for="new_password">New Password:</label>
     <small id="new_password_error" class="form-text text-danger"></small>
  </div>
 </div>
</br>
<div class="form-row">
  <div class="input-data">
     <input type="password"  name="new_password_confirmation">
     <div class="underline"></div>
     <label for="new_password_confirmation">New Password confirmation:</label>
     <small id="new_password_confirmation_error" class="form-text text-danger"></small>
    </div>
  </br>
</div>                                                        
   <div class="form-row submit-btn">
        <div class="input-data">
        <button class="inner" id= "save" style="color: #fff">
              Change password
         </button>
        </div>
    </div>
    </form>
  </div>              
                    
                 
        <script>
                    $(document).on('click', '#save', function (e) {
                        e.preventDefault();
                        var userid = $("#userid").val();
                        $('#new_password_error').text('');
                        $('#new_password_confirmation_error').text('');
                        var formData = new FormData($('#password')[0]);
                        $.ajax({
                            type: 'post',
                            url: "/changepasswordsave/"+userid,
                            data: formData,
                            processData: false,
                            contentType: false,
                            cache: false,
                            success: function (data) {
                                $('#success_msg').show(); 
                            }, error: function (reject) {
                                var response = $.parseJSON(reject.responseText);
                                $.each(response.errors, function (key, val) {
                                    $("#" + key + "_error").text(val[0]);
                                });
                            }
                        });
                    });
                </script>
                
        @endsection
    
