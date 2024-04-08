<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\user\UserStoreRequest;
use Illuminate\Support\Facades\Hash;
use App\DataTables\userDataTable;

class AdminController extends Controller
{
    public function createUser(){
        return view('Admin.adduser');
    }
    public function userStore(UserStoreRequest $request){
        $data = $request->validated();
 
        User::create([
            'user_type' => $data['user_type'],
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
 
        return redirect('/dashbord');
    }
    public function index(userDataTable $dataTable){
    
        return $dataTable->render("Admin.showUser");
    }
}
