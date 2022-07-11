<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\User;
use Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Cookie;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return view('login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $password = $request->confirm_password;
        $confirmPassword = $request->customer_password;
        if($password != $confirmPassword){
            return redirect()->back()->with('error','Mật khẩu không trùng khớp');
        }else{
            $data = array();
            $data['name'] = $request->customer_name;
            $data['email'] = $request->customer_email;
            $data['password'] = bcrypt($request->customer_password);
            $data['role'] = 0;
            $user = DB::table('users')->where('email',$data['email'] )->first();
            if(isset($user->id)){
                return redirect()->back()->with('error','Tài khoản đã tồn tại');
            }else{
            $customer_id = DB::table('users')->insertGetId($data); 
            return redirect()->back()->with('success','Tạo tài khoản thành công');
            }
            
        }
       
    }
    public function show_profile(){
        
        return view('Auth.profile');
    }
  public function postLogin(Request $request){
      if($request->remember='Remember Me'){
            $remember = true;
      }else{
            $remember= false;
      }
    $arr = ['email'=>$request->customer_email,'password'=>$request->customer_password];
   if(Auth::attempt($arr,$remember))
   {
       $user = DB::table('users')->where('email',$request->customer_email)->first();
         Session::put('customer_id',$user->id);
            Session::put('customer_name',$user->name);
            
            $cate_document = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
            $all_product = DB::table('tbl_document')->orderby(DB::raw('RAND()'))->paginate(6); 
            return view('pages.home')->with('cate_document', $cate_document)->with('all_product',$all_product);
   }else{
    return redirect()->back()->with('error','Tài khoản mật khẩu sai!!!');
   }
  }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_profile()
    {
        return view('Auth.edit_profile');
    }

    public function updateUser(Request $request){
        $id_session = Session::get('customer_id');
        $data = array();
        $data['name'] = $request->name;
        $data['password'] =  bcrypt($request->confirm_pass);
        $get_image = $request->file('file');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $new_image =  Str::random(20).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('uploads/avatar/',$new_image);
            $data['img'] = $new_image;
            
            DB::table('users')->where('id',$id_session)->update($data);
            Session::put('message','Cập nhật tai khoan thành công');
            return Redirect::to('edit-profile');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
