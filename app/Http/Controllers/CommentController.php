<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Carbon;

class CommentController extends Controller
{
    public function index(Request $request ){
        $data = array();
        $comment = $request->comment;
        $id = $request->id_hidden;
        $id_session = Session::get('customer_id');
        $data['id_document']=$id_session;
        $data['title'] = $comment;
        $mytime = Carbon::now();
        $data['date'] = $mytime->toDateTimeString() ;
        $data['name'] = Session::get('customer_name');
        $data['id_tailieu'] = $id;
        // add to 
         DB::table('comment')->insert($data);
         Session::put('message','Xóa danh mục thành công');
         return Redirect::back();
    }

    public function showComment($id_document){

    }
    
}