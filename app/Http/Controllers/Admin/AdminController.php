<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use DataTables;
use App\Http\Requests\user\UserStoreRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Requests\user\UserUpdateRequest;

class AdminController extends Controller
{
    public function createUser(){
        return view('Admin.User.adduser');
    }
    public function store(UserStoreRequest $request){
        $data = $request->validated();
 
        $user = User::create($data);
        $user->assignRole('user');
 
        return redirect()->route('admin.UserShow');
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::select('*');
            if($request->filled('from_date') && $request->filled('to_date'))
            {
                $data = $data->whereBetween('created_at', [$request->from_date, $request->to_date]);
            }
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        return '
                        <a style="v: 10px" id="delete" href="javascript:void(0)" data-id="'.$row['id'].'"  class="btn btn-danger btn-sm" >
                        Delete
                                 </a>
                               <a style="margin-top: 10px" id="edit" href="javascript:void(0)" data-id="'.$row['id'].'" class="btn btn-success btn-sm"">
                               Edit
                               </a>
                               <a style="margin-top: 10px" id="shwo" href="javascript:void(0)" data-id="'.$row['id'].'" class="btn btn-primary btn-sm"">
                               Shwo
                              </a>
                              <a style="margin-top: 10px" href="/change-password/'.$row->id.'" class="btn btn-warning btn-sm"">
                              Change Password
                    </a>';
                    })->addColumn('images',function($row){
                        return '
                        <a><img style="width:200px" src="/storage/'.$row->image.'" ></a>
                        ';
                    })
                    ->rawColumns(['action','images'])
                    ->make(true);
        }
        
        return view('Admin.User.showUser');
    }
    // DELETE COUNTRY RECORD
    public function destroy(Request $request){
        $id = $request->user_id;
        $query = User::findOrFail($id)->delete();

        if($query){
            return response()->json(['code'=>1, 'msg'=>'User has been deleted from database']);
        }else{
            return response()->json(['code'=>0, 'msg'=>'Something went wrong']);
        }
    }

    // show user info
    
    public function show($id){
       
       $user = User::find($id);
       if($user){
        return response()->json([
          'status' => 200,
          'user' =>$user,
        ]);
    }
        else{
            return response()->json([
                'status' => 404,
                'message' =>'eror',
            ]);
        }
    }

    // update user info

    public function update(UserUpdateRequest $request ,$id){
        $data = $request->validated();
        
        $user = User::findOrFail($id);
        $user->update($data);

        return response()->json([
         'status' => 200,
        ]);
    }

}
