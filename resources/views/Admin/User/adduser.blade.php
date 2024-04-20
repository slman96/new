@extends('layouts.master',['title' => __("strings.Add_User")])
@section('content')
<div class="alert alert-success" id="success_msg" style="display: none;">
   User add successfly
 </div>
<div class="container">
    <div class="text">
      {{__("strings.Add_User")}}
    </div>
    <input type="hidden" id="lang" value="{{App::currentLocale()}}">
    <form method="POST" action="" id="adduser">
      @csrf
      <input type="hidden" id="storeRoute" value="{{route('admin.storeUser')}}">
      <div class="box-body">
          <div class="row">
            <div class="col-md-6 ">
              <label for="firstname">{{__("strings.Firstname")}}:</label>
              <input name="firstname" type="text" class="form-control" id="firstname" placeholder="{{__("strings.Firstname")}}">
              <small  id="firstname_error" class=" form-text text-danger"></small>
             </div>
      
            <div class="col-md-6">
              <label for="lastname">{{__("strings.Lastname")}}:</label>
              <input name="lastname" type="text" class="form-control" id="lastname" placeholder="{{__("strings.Lastname")}}">
              <small id="lastname_error" class="form-text text-danger"></small>
             </div>
          </div>
        </br>
          <div class="row">
            <div class="col-md-6">
              <label for="country">{{__('strings.Country')}}:</label>
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
              <label for="image">{{__("strings.Image")}}:</label>
              <input class="form-control" type="file" name="image" id="image" placeholder="user address">
              <small id="image_error" class="form-text text-danger"></small>
              <div class="img-holder" ></div>
            </div>
          </div>
        </br>
          <div class="row">
            <div class="col-md-6">
              <label for="phone_number"> {{__("strings.Phone")}}:</label>
            </br>
              <div class="iti">
              <input name="phone_number" id="phone_number" type="tel"> 
             </div>
             <small id="phone_number_error" class="form-text text-danger"></small>
            </div>
            <div class="col-md-6">
              <label for="email">{{__("strings.Email")}}:</label>
              <input class="form-control" type="email" name="email" id="email" placeholder="{{__("strings.Email")}}">
              <small id="email_error" class="form-text text-danger"></small>
             </div>
          </div>
        </br>
          <div class="row">
            <div class="col-md-6">
                <label for="password">{{__("strings.password")}}:</label>
                <input class="form-control" type="password" name="password" id="password" placeholder="{{__("strings.password")}}">
                <small id="password_error" class="form-text text-danger"></small>
            </div>
            <div class="col-md-6">
              <label for="password_confirmation">{{__("strings.password_confirm")}}:</label>
              <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" placeholder="{{__("strings.password_confirm")}}">
              <small id="password_confirmation_error" class="form-text text-danger"></small>
            </div>
          </div>
        </br>
       <div class="box-body">
            <div class="form-group">
              <label for="address">{{__('strings.Address')}}:</label>
              <input type="hidden" name="latitude" id="latitude">
              <input type="hidden" name="longitude" id="longitude">
              <input class="form-control" type="text" name="address" id="pac-input" placeholder="{{__("strings.search")}}">
              <small id="address_error" class="form-text text-danger"></small>
            </div>
        </div>
        <div id="map" style="width: 1000px; height:500px"></div>
         </br>
          <div class="form-check">
            <div class="box-footer">
                <div class="form-group">
                    <button id="save" class="btn btn-success">{{__("strings.Add_User")}}</button>
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
