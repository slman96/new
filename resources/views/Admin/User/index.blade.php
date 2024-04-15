@extends('layouts.master')
@section('content')

<div class="container">
    <h1> Users</h1>
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
<a href="{{route('admin.addUser')}}" style="margin-bottom: 20px" class="btn btn-primary">Add User</a>    
</br>
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>address</th>
                <th>country</th>
                <th>image</th>
                <th>phone</th>
                <th>Email</th>
                <th width="100px">action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

@include('Admin.User.Modal.showUser')
@include('Admin.User.Modal.editUser')

<script src="{{asset("js/ajax/showuser.js")}}">
</script>
</html>
@endsection