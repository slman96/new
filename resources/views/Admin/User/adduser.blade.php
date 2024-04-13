@extends('layouts.master')
@section('content')

<style>
        ul {
            top: 100% !important;
            transform: translateY(0%) !important;
        }
        .iti {
            position: relative;
            display: inline-block;
        }
        input[type=tel] {
            padding-right: 6px;
            padding-left: 52px;
            margin-left: 0;

            position: relative;
            z-index: 0;
            margin-top: 0 !important;
            margin-bottom: 0 !important;
            margin-right: 0;
            border: 1px solid #CCC;
            width: 270px;
            height: 35px;
            /* padding: 6px 12px; */
            border-radius: 2px;
            font-family: inherit;
            font-size: 100%;
            color: inherit;
        }
        </style>
<div class="alert alert-success" id="success_msg" style="display: none;">
   User add successfly
 </div>
<div class="container">
    <div class="text">
       Add user
    </div>
    
    <form method="POST" action="" id="adduser">
      @csrf
      <div class="box-body">
          <div class="box-body">
              <div class="form-group">
                <label for="firstname">first name:</label>
                <input name="firstname" type="text" class="form-control" id="firstname" placeholder="user first name">
                <small  id="firstname_error" class=" form-text text-danger"></small>
               </div>
             </div>
             <div class="box-body">
              <div class="form-group">
                <label for="lastname">last name:</label>
                <input name="lastname" type="text" class="form-control" id="lastname" placeholder="user last name">
                <small id="lastname_error" class="form-text text-danger"></small>
               </div>
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
            </div>
         </div>
          <div class="box-body">
          </div>
          
          <div class="box-body">
          <div class="form-group">
              <label for="image">image:</label>
              <input class="form-control" type="file" name="image" id="image" placeholder="user address">
              <small id="image_error" class="form-text text-danger"></small>
          </div>
          </div>
          <div class="img-holder" ></div>

          <div class="box-body" >
          <div class="form-group">
            <label for="phone_number"> phone number:</label>
            <div class="iti">
              <input name="phone_number" id="phone_number" type="tel"> 
          </div>
            <small id="phone_number_error" class="form-text text-danger"></small>
          </div>
          </div>

          <div class="box-body">
          <div class="form-group">
            <label for="email">email address:</label>
            <input class="form-control" type="email" name="email" id="email" placeholder="user email address">
          
            <small id="email_error" class="form-text text-danger"></small>
          </div>
          </div>
          <div class="box-body">
            <div class="form-group">
              <label for="password">password:</label>
              <input class="form-control" type="text" name="password" id="password" placeholder="user password">
              <small id="password_error" class="form-text text-danger"></small>
            </div>
        </div>
     <div class="box-body">
            <div class="form-group">
              <label for="address">address:</label>
              <div class="row">
                <div class="col-5">
                    <input type="text" class="form-control" id="latitude">
                </div>
                <div class="col-5">
                    <input type="text" class="form-control" id="longitude">
                </div>
            </div>
              <input class="form-control" type="text" name="address" id="pac-input" placeholder="search">
              <small id="address_error" class="form-text text-danger"></small>
            </div>
          </div>
        <div id="map" style="width: 1000px; height:500px"></div>
         </br>
          <div class="form-check">
            <div class="box-footer">
                <div class="form-group">
                    <button id="save" class="btn btn-block btn-success">Add user</button>
                </div>
            </div>
            </div>
          </form>  
      </div>
      
    </div>
  
<script>



// ajax setup
$.ajaxSetup({
             headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')}
});

$(document).on('click', '#save', function (e) {
        e.preventDefault();
        $('#firstname_error').text('');
        $('#lastname_error').text('');
        $('#email_error').text('');
        $('#image_error').text('');
        $('#phone_number_error').text('');
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
                        window.location.href = "{{route('admin.showUser')}}";
                }, error: function (reject) {
                var response = $.parseJSON(reject.responseText);
                $.each(response.errors, function (key, val) {
                    $("#" + key + "_error").text(val[0]);
                });
            }
        });
});


// image preview
$('input[type="file"][name="image"]').val('');
            $('input[type="file"][name="image"]').on('change', function(){
                var img_path = $(this)[0].value;
                var img_holder = $('.img-holder');
                var extension = img_path.substring(img_path.lastIndexOf('.')+1).toLowerCase();
                if(extension == 'jpeg' || extension == 'jpg' || extension == 'png'){
                     if(typeof(FileReader) != 'undefined'){
                          img_holder.empty();
                          var reader = new FileReader();
                          reader.onload = function(e){
                              $('<img/>',{'src':e.target.result,'class':'img-fluid','style':'max-width:200px;margin-bottom:10px;'}).appendTo(img_holder);
                          }
                          img_holder.show();
                          reader.readAsDataURL($(this)[0].files[0]);
                     }else{
                         $(img_holder).html('This browser does not support FileReader');
                     }
                }else{
                    $(img_holder).empty();
                }
            });


</script>
<script src="{{asset('js/map.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key={{ config('app.MapKey') }}&libraries=places&callback=initAutocomplete&language=en&region=sy
async defer"></script>
@endsection
