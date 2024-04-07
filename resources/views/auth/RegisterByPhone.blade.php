@extends('layouts.app')
@section('content')
<div class="body">
    <div class="container">
        <div class="text">
            Register by phone number
        </div>
        <form id="register" name="frm-login" method="POST" >
            @csrf
            <div class="form-row">
                <div class="input-data">
                   <input type="text" name="firstname">
                   <div class="underline"></div>
                   <label for="firstname">First name</label>
                   <small id="firstname_error" class="form-text text-danger"></small>
                </div>
			</br>
             </div>
             <div class="form-row">
                <div class="input-data">
                   <input type="text" name="lastname">
                   <div class="underline"></div>
                   <label for="lastname">Last name</label>
                   <small id="lastname_error" class="form-text text-danger"></small>
                </div>
			</br>
             </div>
           <div class="form-row">
              <div class="input-data">
                 <input type="email"  name="email">
                 <div class="underline"></div>
                 <label for="email">Email</label>
                 <small id="email_error" class="form-text text-danger"></small>
              </div>
			</br>
           </div>
		   <div class="form-row">
			<div class="input-data">
			   <input type="number"  name="phone">
			   <div class="underline"></div>
			   <label for="phone">Phone</label>
			   <small id="email_error" class="form-text text-danger"></small>
			</div>
		</br>
		 </div>
           <div class="form-row">
            <div class="input-data">
               <input type="password"  name="password">
               <div class="underline"></div>
               <label for="password">Password </label>
               <small id="password_error" class="form-text text-danger"></small>
            </div>
		</br>
         </div>
         <div class="form-row">
            <div class="input-data">
               <input type="password"  name="password_confirmation">
               <div class="underline"></div>
               <label for="password_confirmation">Password Confirm</label>
            </div>
		</br>
			<div class="input-data">
				<a  href="{{ route('register') }}"> Register by email address</a>
			 </div>
         </div>
         <div class="form-row submit-btn">
            <div class="input-data"> 
               <button class="inner" id= "save" style="color: #fff">
                Register
            </button>
            </div>
         </div> 
        </form>
        </div>
</div>
<script>
        $(document).on('click', '#save', function (e) {
            e.preventDefault();
            $('#firstname_error').text('');
            $('#lastname_error').text('');
            $('#phone_error').text('');
            $('#email_error').text('');
            $('#password_error').text('');
            
            var formData = new FormData($('#register')[0]);
    
            $.ajax({
                type: 'post',
                url: "{{ route('register') }}",
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

