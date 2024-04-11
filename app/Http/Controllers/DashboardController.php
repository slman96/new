<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rules\Password;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function changePassword(Request $request,$id)
     {
        $userrole =  Auth::user()->role;
        if ($userrole == "admin"){
            $user =  User::find($id);
        return view('dashboard.password.changePassword',compact('user'));
        }
        else
        {
            $user =  Auth::user();
            return view('dashboard.password.changePassword',compact('user'));
        }
        
     }
  
     public function changePasswordSave(Request $request,$id)
     {
         
         $this->validate($request, [
            'new_password' => [
                'required',
                'confirmed',
                Password::min(6)
                    ->letters()
                    ->numbers(),
            ],
          ]);
        
         $user =  User::find($id);
         $user->password =  Hash::make($request->new_password);
         $user->save();
         return back()->with('success', "Password Changed Successfully");
     }
}
