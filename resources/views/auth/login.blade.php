@extends('layouts.app')
@section('content')
<div class="body">
    <div class="container">
        <div class="text">
            Login
        </div>
        <form id="login" name="frm-login" method="POST" >
            @csrf
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
               <input type="password"  name="password">
               <div class="underline"></div>
               <label for="password">Password </label>
               <small id="password_error" class="form-text text-danger"></small>
            </div>
        </br>
         </div>
         <div class="form-row">
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                 <div class="underline"></div>
               <label for="password_confirmation">Remember Me</label>
               <div class="input-data">
                @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">
                   Forgot Your Password?
                 </a>
                @endif
             </div>
             <div class="input-data">
                <a href="{{ route('register') }}">
                    don't have account ? Register now
                 </a>
             </div>
         </div>
         <div class="form-row submit-btn">
            <div class="input-data"> 
               <button class="inner" id= "save" style="color: #fff">
                Login
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
            $('#email_error').text('');
            $('#email_error').text('');
            $('#password_error').text('');
            
            var formData = new FormData($('#login')[0]);
    
            $.ajax({
                type: 'post',
                url: "{{ route('login') }}",
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
