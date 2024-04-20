@extends('layouts.master',['title' => __("strings.Users")])
@section('content')
<div class="container">
    <h1> {{__("strings.Users")}}</h1>
    <hr>
<div class="row">
    <div class="col-md-4">
        @include('Admin.User.filter.select') 
    </div>
    <div class="col-md-8">
        @include('Admin.User.filter.datarange') 
    </div>
</div>
</br>
<input type="hidden" id="showUser" value="{{ route('admin.showUser') }}">
<input type="hidden" id="deleteUser" value="{{ route("admin.UserDestroy") }}">
<input type="hidden" id="lang" value="{{App::currentLocale()}}">
<a  dir="{{__("strings.ltr")}}" href="{{route('admin.addUser')}}" style="margin-bottom: 20px" class="btn btn-primary">{{__("strings.Add_User")}}</a>    
</br>
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>{{__('strings.Firstname')}}</th>
                <th>{{__('strings.Lastname')}}</th>
                <th>{{__('strings.Address')}}</th>
                <th>{{__('strings.Country')}}</th>
                <th>{{__('strings.Image')}}</th>
                <th>{{__('strings.Phone')}}</th>
                <th>{{__('strings.Email')}}</th>
                <th width="100px">{{__('strings.action')}}</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    @include('Admin.User.Modal.showUser')
    @include('Admin.User.Modal.editUser')
    @include('Admin.User.Modal.changePassword')
</div>
<script src="{{asset("js/ajax/showuser.js")}}">
</script>
@endsection