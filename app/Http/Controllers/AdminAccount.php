<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class AdminAccount extends Controller
{
    public function index(){
        $all_account = DB::table('users')->get();
        return view('Admin.show_list_account')->with('all_account',$all_account);
    }
    public function detail($id_account){
        $detail_account = DB::table('users')->where('id',$id_account)->first();
        return view('Admin.detail_user')->with('detail_account',$detail_account);
    }
    public function addPermission(Request $request){
        $data=array();
        $data['role']=$request->role;
        DB::table('users')->where('id',$request->id)->update($data);
        Session::put('message','Cập nhật quyen thành công');
        return Redirect::to('admin/list-user');
    }

    public function removeAccount($id){
        DB::table('users')->where('id',$id)->delete();
        Session::put('message','Xóa danh mục thành công');
        return Redirect::to('admin/list-user');
    }
}