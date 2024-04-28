<?php

namespace App\Http\Controllers\Admin\User;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;
use App\Models\User;
use DataTables;
use App\Http\Requests\user\UserStoreRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Requests\user\UserUpdateRequest;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class AdminUserController extends Controller
{
    public function create(){
        return view('Admin.User.adduser');
    }
    public function store(UserStoreRequest $request){
        $data = $request->validated();
        $data['role']= 'user';
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        $user->assignRole('user');

        return redirect()->route('admin.index');
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::select('*');
            if($request->filled('start_date') && $request->filled('end_date'))
            {
                $startdate = $request->start_date;
                $enddate = $request->end_date;
                $data = $data->whereBetween('created_at', [$startdate, $enddate]);
            }
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        return '
                        <div id="actionColumn">
                        <a style="" id="delete" href="javascript:void(0)" data-id="'.$row['id'].'"  class="btn btn-danger btn-sm" >
                       '.__("strings.Delete").'
                        </a><br>
                        <a style="margin-top: 10px" id="edit" href="javascript:void(0)" data-id="'.$row['id'].'" class="btn btn-success btn-sm"">
                        '.__("strings.Edit").'
                        </a><br>
                        <a style="margin-top: 10px" id="shwo" href="javascript:void(0)" data-id="'.$row['id'].'" class="btn btn-primary btn-sm"">
                         '.__("strings.Show").'
                        </a><br>
                        <a style="margin-top: 10px" id="changepassword"  href="javascript:void(0)" data-id="'.$row['id'].'" class="btn btn-warning btn-sm"">
                         '.__("strings.Change_Password").'
                    </a><br>
                    </div>';
                    })->addColumn('images',function($row){
                        return '
                        <a><img style="width:200px" src="'.$row->userImage().'" ></a>
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
        $user = User::findOrFail($id);
        $image_path = public_path().'/storage/'.$user->image ;
        $query = $user ->delete();
         if(File::exists($image_path)) {
           File::delete($image_path);
           }
        
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
        $search = $request;
        $users = User::where('firstname'||'lastname'||'country'||'phone_number'||'email' == $search)->get();
        return response()->json([
            'status'=> 200,
            'users'=> $users,
        ]);
    }

    public function exportCsv()
{
    return Excel::download(new UsersExport, 'users.csv' ,\Maatwebsite\Excel\Excel::CSV);
}
public function exportPdf()
{
    return Excel::download(new UsersExport, 'users.pdf' ,\Maatwebsite\Excel\Excel::DOMPDF);
}
}