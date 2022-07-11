<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class AdminController extends Controller
{
    public function index(){
        return view('Admin.admin_login');
    }
    public function show_dashboard(){
        $sl_user = DB::table('users')->where('role',0)->count();
        $sl_doc = DB::table('tbl_document')->count();
        $sl_category = DB::table('tbl_category_product')->count();
        $max_viewer = DB::table('tbl_document')->orderBy('document_views','DESC')->first();
        return view('Admin.dashboard')->with('sl_user',$sl_user)->with('sl_doc',$sl_doc)->with('sl_category',$sl_category)->with('max_viewer',$max_viewer);
    }
    public function dashboard(Request $request){
        $admin_email=$request->admin_email;

        $arr = ['email'=>$admin_email,'password'=>$request->admin_password];
        if(Auth::attempt($arr,true))
        {
            $result = DB::table('users')->where('email',$request->admin_email)->first();
              Session::put('admin_name',$result->name);
            Session::put('admin_id',$result->id);
            return Redirect::to('/dashboard');
        }else{
            Session::put('message','Mật khẩu hoặc tài khoản chưa chính xác');
            return Redirect::to('/admin/login');
        }
    }
    public function logout(){
            Session::put('admin_name',null);
            Session::put('admin_id',null);
            return Redirect::to('/admin/login');
    }
}
