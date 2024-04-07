@extends('layouts.master')
@section('content')
<div class="alert alert-success" id="success_msg" style="display: none;">
   User add successfly
 </div>
<div class="container">
    <div class="text">
       Add user
    </div>
    
    <form id="adduser" method="POST" >
      @csrf
        <div class="form-row">
            <div class="input-data">
               <input type="text" required name="user_type">
               <div class="underline"></div>
               <label for="user_type">user type</label>
               <small id="user_type_error" class="form-text text-danger"></small>
            </br>
            </div>
         </div>
       <div class="form-row">
          <div class="input-data">
             <input type="text" required name="firstname">
             <div class="underline"></div>
             <label for="firstname">First Name</label>
             <small id="firstname_error" class="form-text text-danger"></small>
          </div>
         </br>
          <div class="input-data">
             <input type="text" required name='lastname'>
             <div class="underline"></div>
             <label for="lastname">Last Name</label>
             <small id="lastname_error" class="form-text text-danger"></small>
          </div>
         </br>
       </div>
       <div class="form-row">
          <div class="input-data">
             <input type="text" required name="email">
             <div class="underline"></div>
             <label for="">Email Address</label>
             <small id="email_error" class="form-text text-danger"></small>
          </div>
         </br>
          <div class="input-data">
            <input type="number" required name="phone">
            <div class="underline"></div>
            <label for="">Phone Number</label>
            <small id="phone_error" class="form-text text-danger"></small>
         </br>
         </div>
         
       </div>
       <div class="form-row">
        <div class="input-data">
           <input type="password" required name="password">
           <div class="underline"></div>
           <label for="">Password </label>
           <small id="password_error" class="form-text text-danger"></small>
         </br>
        </div>
     </div>
     <div class="form-row submit-btn">
      <div class="input-data"> 
         <button class="inner" id= "save" style="color: #fff">
          add user
      </button>
      </div>
     </div>
       
    </form>
    </div>
<script>
    $(document).on('click', '#save', function (e) {
        e.preventDefault();
        $('#user_type_error').text('');
        $('#firstname_error').text('');
        $('#lastname_error').text('');
        $('#email_error').text('');
        $('#phone_error').text('');
        $('#password_error').text('');
        
        var formData = new FormData($('#adduser')[0]);

        $.ajax({
            type: 'post',
            enctype: 'multipart/form-data',
            url: "{{route('admin.storeUser')}}",
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            success: function (data) {
                        window.location.href = "{{route('home')}}";
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
