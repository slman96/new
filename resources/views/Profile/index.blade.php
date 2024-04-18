@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10 col-xl-8 mx-auto">
            <div class="my-4">   
                    <div class="row mt-5 align-items-center">
                        <div class="col-md-3 text-center mb-5">
                            <div class="avatar avatar-xl">
                                <img src="{{Auth::user()->userImage()}}" alt="..." class="avatar-img r" />
                            </div>
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h4 class="mb-1">{{Auth::user()->firstname}} {{Auth::user()->lastname}}</h4>
                                    <p class="small mb-3"><span class="badge badge-dark">{{Auth::user()->country}}</span></p>
                                    <p class="small mb-0 text-muted">{{Auth::user()->address}}</p>
                                    <p class="small mb-0 text-muted">{{Auth::user()->phone_number}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="my-4" />
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Firstname</label>
                        </div>
                        <div class="form-group col-md-6">
                            <p class="small mb-0 text-muted">{{Auth::user()->firstname}}</p>
                        </div>
                    </div>
                    <hr class="my-4" />
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Lastname</label>
                        </div>
                        <div class="form-group col-md-6">
                            <p class="small mb-0 text-muted">{{Auth::user()->lastname}}</p>
                        </div>
                    </div>
                    <hr class="my-4" />
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Email</label>
                        </div>
                        <div class="form-group col-md-6">
                            <p class="small mb-0 text-muted">{{Auth::user()->email}}</p>
                        </div>
                    </div>
                    <hr class="my-4" />
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Phone</label>
                        </div>
                        <div class="form-group col-md-6">
                            <p class="small mb-0 text-muted">{{Auth::user()->phone_number}}</p>
                        </div>
                    </div>
                    <hr class="my-4" />
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Country</label>
                        </div>
                        <div class="form-group col-md-6">
                            <p class="small mb-0 text-muted">{{Auth::user()->country}}</p>
                        </div>
                    </div>
                    <hr class="my-4" />
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Address</label>
                        </div>
                        <div class="form-group col-md-6">
                            <p class="small mb-0 text-muted">{{Auth::user()->address}}</p>
                        </div>
                    </div>
                    <hr class="my-4" />
                    <form action="" id="password">
                        @csrf
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <input type="hidden" id="userid" value="{{Auth::user()->id}}">
                                <div class="form-group">
                                    <label for="new_password">New Password</label>
                                    <input type="password" class="form-control" id="new_password" name="new_password" />
                                    <small id="new_password_error" class="form-text text-danger"></small>
                                </div>
                                <div class="form-group">
                                    <label for="new_password_confirmation">Confirm Password</label>
                                    <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" />
                                    <small id="new_password_confirmation_error" class="form-text text-danger"></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <p class="mb-2">Password requirements</p>
                                <p class="small text-muted mb-2">To create a new password, you have to meet all of the following requirements:</p>
                                <ul class="small text-muted pl-4 mb-0">
                                    <li id="length" class="invalid">Minimum 6 character</li>
                                    <li id="letter" class="invalid">At least one letter</li>
                                    <li id="numbers" class="invalid">At least one number</li>
                                    <li id="Confirm" class="invalid">New pasword must be Confirm</li>
                                </ul>
                            </div>
                        </div>
                        <button id="save" class="btn btn-success">Save Change</button>
                    </form>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('js/ajax/editpassword.js')}}" ></script>
<script src="{{asset('js/passwordCheck.js')}}" ></script>
@endsection
