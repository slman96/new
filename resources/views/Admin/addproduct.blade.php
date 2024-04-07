@extends('layouts.master')
@section('content')
<div class="container">
    <div class="text">
       Add Product
    </div>
    <form id="product"  method="post" enctype="multipart/form-data">
      @csrf
        <div class="form-row">
            <div class="input-data">
               <input type="text"  name="user_id">
               <div class="underline"></div>
               <label for="user_id">User</label>
               <small id="user_id_error" class="form-text text-danger"></small>
            </div>
         </br>
         </div>
       <div class="form-row">
          <div class="input-data">
             <input type="text"  name="caption">
             <div class="underline"></div>
             <label for="caption">caption</label>
             <small id="caption_error" class="form-text text-danger"></small>
          </div>
       </div>
         </br>
         <div class="form-row">
          <div class="input-data">
             <input type="text"  name='discription'>
             <div class="underline"></div>
             <label for="discription">Discription</label>
             <small id="discription_error" class="form-text text-danger"></small>
          </div>
         </br>
       </div>
      </br>
       <div class="form-row">
          <div class="input-data">
             <input type="file"  name="image">
             <div class="underline"></div>
             <small id="image_error" class="form-text text-danger"></small>
          </div>
       </div>
      </br>
     <div class="form-row submit-btn">
        <div class="input-data">
            <button class="inner" id= "save" style="color: #fff">
               Add product
         </button>
        </div>
     </div>
       
    </form>
    </div>
<script>
        $(document).on('click', '#save', function (e) {
            e.preventDefault();
            $('#user_id_error').text('');
            $('#caption_error').text('');
            $('#discription_error').text('');
            $('#image_error').text('');
            
            var formData = new FormData($('#product')[0]);
    
            $.ajax({
                type: 'post',
                enctype: 'multipart/form-data',
                url: "{{route('admin.storeProduct')}}",
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