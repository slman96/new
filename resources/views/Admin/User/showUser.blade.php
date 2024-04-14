@extends('layouts.master')
@section('content')

<div class="container">
    <h1> Users</h1>
    
    <div class="card">
        <div class="card-body">
            @include('Admin.User.filter.select')
        </br>
            <a>Filter by date</a>
            <div  id="daterange" class="col-md-4" style="background:#fff ; cursor:pointer;padding:5px 10px;border:1px solid #ccc;width 100% ; text-aligh: center">
            <i class="fa fa-calendar"></i>&nbsp;
            <span></span>
            <i class="fa fa-caret-down"></i>
           </div>
        </br>
        <div>
            <div class="row">
                <div class="col-md-1">
                    <label class="center" style="margin-top: 10px" for="search">Search</label>
                </div>
                <div class="col-md-6">
                    <input id="search" type="search" class="form-control">
                </div>
                <div class="col-md-2">
                    <button id="search-button" class="btn btn-primary">search</button>
                </div>

            </div>
             </div>
        </div>
    </div>
</br>
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

<script src="js/ajax/showuser.js"></script>
</html>
@endsection