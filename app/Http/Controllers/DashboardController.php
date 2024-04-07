<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function changePassword(Request $request)
     {
         return view('dashboard.password.changePassword');
     }
  
     public function changePasswordSave(Request $request)
     {
         
         $this->validate($request, [
             'current_password' => 'required|string|password',
             'new_password' => 'required|confirmed|min:8|string'
         ]);
         $auth = Auth::user();

         if (!Hash::check($request->get('current_password'), $auth->password)) 
         {
             return back()->with('error', "Current Password is Invalid");
         }
  
         if (strcmp($request->get('current_password'), $request->new_password) == 0) 
         {
             return redirect()->back()->with("error", "New Password cannot be same as your current password.");
         }
  
         $user =  User::find($auth->id);
         $user->password =  Hash::make($request->new_password);
         $user->save();
         return back()->with('success', "Password Changed Successfully");
     }
}
