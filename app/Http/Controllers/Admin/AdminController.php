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
    public function create(){
        return view('Admin.User.adduser');
    }
    public function store(UserStoreRequest $request){
        $data = $request->validated();
        $user = User::create($data);
        $user->assignRole('user');
 
        return redirect()->route('admin.index');
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::select('*');
            if($request->filled('startdate') && $request->filled('enddate'))
            {
                $startdate = $request->startdate;
                $enddate = $request->enddate;
                $data = $data->whereBetween('created_at', [$startdate, $enddate]);
            }
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        return '
                        <a style="v: 10px" id="delete" href="javascript:void(0)" data-id="'.$row['id'].'"  class="btn btn-danger btn-sm" >
                        Delete
                        </a><br>
                        <a style="margin-top: 10px" id="edit" href="javascript:void(0)" data-id="'.$row['id'].'" class="btn btn-success btn-sm"">
                        Edit
                        </a><br>
                        <a style="margin-top: 10px" id="shwo" href="javascript:void(0)" data-id="'.$row['id'].'" class="btn btn-primary btn-sm"">
                        Show
                        </a><br>
                        <a style="margin-top: 10px" href="/change-password/'.$row->id.'" class="btn btn-warning btn-sm"">
                        Change Password
                    </a><br>';
                    })->addColumn('images',function($row){
                        return '
                        <a><img style="width:200px" src="/storage/'.$row->image.'" ></a>
                        ';
                    })
                    ->rawColumns(['action','images'])
                    ->make(true);
                 }
        return view('Admin.User.index');
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
    // filter
    public function filter(Request $request){
        $startdate = $request->startdate;
        $enddate = $request->enddate;

        $users = User::whereDate('created_at','>=',$startdate)
                                ->whereDate('created_at','<=',$enddate)
                                ->get();
        return response()->json([
            'status'=> 200,
            'users'=> $users,
        ]);
    }
}
