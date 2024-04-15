@extends('layouts.master')
@section('content')
<div class="alert alert-success" id="success_msg" style="display: none;">
   User add successfly
 </div>
<div class="container">
    <div class="text">
       Add user
    </div>
    
    <form method="POST" action="" id="adduser">
      @csrf
      <input type="hidden" id="storeRoute" value="{{route('admin.storeUser')}}">
      <div class="box-body">
          <div class="row">
            <div class="col-md 6">
              <label for="firstname">first name:</label>
              <input name="firstname" type="text" class="form-control" id="firstname" placeholder="user first name">
              <small  id="firstname_error" class=" form-text text-danger"></small>
             </div>
      
            <div class="col-md 6">
              <label for="lastname">last name:</label>
              <input name="lastname" type="text" class="form-control" id="lastname" placeholder="user last name">
              <small id="lastname_error" class="form-text text-danger"></small>
             </div>
          </div>
        </br>
          <div class="row">
            <div class="col-md 6">
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
      
            <div class="col-md 6">
              <label for="image">image:</label>
              <input class="form-control" type="file" name="image" id="image" placeholder="user address">
              <small id="image_error" class="form-text text-danger"></small>
              <div class="img-holder" ></div>
             </div>
          </div>
        </br>
          <div class="row">
            <div class="col-md 6">
              <label for="phone_number"> phone number:</label>
            </br>
              <div class="iti">
              <input name="phone_number" id="phone_number" type="tel"> 
              <small id="phone_number_error" class="form-text text-danger"></small>
             </div>
            </div>
            <div class="col-md 6">
              <label for="email">email address:</label>
              <input class="form-control" type="email" name="email" id="email" placeholder="user email address">
              <small id="email_error" class="form-text text-danger"></small>
             </div>
          </div>
        </br>
          <div class="row">
            <div class="col-md 6">
                <label for="password">password:</label>
                <input class="form-control" type="password" name="password" id="password" placeholder="user password">
                <small id="password_error" class="form-text text-danger"></small>
            </div>
            <div class="col-md 6">
              <label for="password-confirm">password confirm:</label>
              <input class="form-control" type="password" name="password-confirm" id="password-confirm" placeholder="user password confirm">
            </div>
          </div>
        </br>
       <div class="box-body">
            <div class="form-group">
              <label for="address">address:</label>
              <input type="hidden" name="latitude" id="latitude">
              <input type="hidden" name="longitude" id="longitude">
              <input class="form-control" type="text" name="address" id="pac-input" placeholder="search">
              <small id="address_error" class="form-text text-danger"></small>
            </div>
          </div>
        <div id="map" style="width: 1000px; height:500px"></div>
         </br>
          <div class="form-check">
            <div class="box-footer">
                <div class="form-group">
                    <button id="save" class="btn btn-success">Add user</button>
                </div>
            </div>
            </div>
          </form>  
      </div>
  
<script src="{{asset('js/ajax/adduser.js')}}" ></script>
<script src="{{asset('js/map.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key={{ config('app.MapKey') }}&libraries=places&callback=initAutocomplete&language=en&region=sy
async defer"></script>
@endsection
