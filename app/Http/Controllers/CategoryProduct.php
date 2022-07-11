<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category_product;
use DB;
use Session;
use Auth;
session_start();
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class CategoryProduct extends Controller
{
    public function AuthLogin(){
        
        if(Session::get('login_normal')){
            $admin_id = Session::get('admin_id');
        }else{
            $admin_id = Auth::id();
        }
            if($admin_id){
                return Redirect::to('dashboard');
            }else{
                return Redirect::to('admin/login')->send();
            } 
        
       
    }
    public function add_category_product(){
        $this->AuthLogin();
        return view('Admin.add_category_product');
    }
    public function all_category_product(){
        $all_category_product=DB::table('tbl_category_product')->get();
        $manage_category_product=view('Admin.all_category_product')->with('all_category_product',$all_category_product);
        return view('Admin.admin_layout')->with('Admin.all_category_product',$manage_category_product);
    }
    public function save_category_product(Request $request){
        $this->AuthLogin();
        $data=array();
        $data['category_name']=$request->category_product_name;
        $data['category_desc']=$request->category_product_desc;
        $data['category_status']=$request->category_product_status;
        

         DB::table('tbl_category_product')->insert($data);
         Session::put('message','Thêm danh mục thành công');
         return Redirect::to('add-category-product');
    }
    public function unactive_category_product($category_product_id){
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status'=>1]);
        Session::put('message','Không kích hoạt danh mục thành công');
        return Redirect::to('all-category-product');
    }
    public function active_category_product($category_product_id){
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status'=>0]);
        Session::put('message','Kích hoạt danh mục thành công');
        return Redirect::to('all-category-product');
    }
    public function edit_category_product($category_product_id){
        $edit_category_product=DB::table('tbl_category_product')->where('category_id',$category_product_id)->get();
        $manager_category_product=view('Admin.edit_category_product')->with('edit_category_product',$edit_category_product);
        return view('Admin.admin_layout')->with('Admin.edit_category_product',$manager_category_product);
    }
    public function update_category_product(Request $request,$category_product_id){
        $data=array();
        $data['category_name']=$request->category_product_name;
        $data['category_desc']=$request->category_product_desc;
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update($data);
        Session::put('message','Cập nhật danh mục thành công');
        return Redirect::to('all-category-product');
    }
    public function delete_category_product($category_product_id){
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->delete();
        Session::put('message','Xóa danh mục thành công');
        return Redirect::to('all-category-product');
    }

}
