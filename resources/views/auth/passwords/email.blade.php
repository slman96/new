@extends('layouts.app')
@section('content')
<div class="body">
    <div class="container">
        <div class="text">
            Reset Password
        </div>
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
         <form id="resetpassword" name="frm-login" method="POST" >
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
         <div class="form-row submit-btn">
            <div class="input-data"> 
               <button class="inner" id= "save" style="color: #fff">
                Send Password Reset Link
            </button>
           
            </div>
         </div> 
        </form>
        </div>
</div>
<script>
        $(document).on('click', '#save', function (e) {
            e.preventDefault();
            $('#email_error').text('');
            
            var formData = new FormData($('#resetpassword')[0]);
    
            $.ajax({
                type: 'post',
                url: "{{ route('login') }}",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {
                    window.location.href = "{{ route('password.email') }}";
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

