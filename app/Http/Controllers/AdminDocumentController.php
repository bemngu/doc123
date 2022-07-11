<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class AdminDocumentController extends Controller
{
    public function index(){
        $al_document=DB::table('tbl_document')->join('tbl_category_product','tbl_category_product.category_id','=','tbl_document.category_id')->orderby('tbl_document.document_id','desc')->get();
        return view('Admin.show_list_document')->with('al_document',$al_document);
    }

    public function activeDocument($id_document){
        DB::table('tbl_document')->where('document_id',$id_document)->update(['active'=>1]);
        Session::put('message','Kích hoạt tai lieu thành công');
        return Redirect::to('admin/list-document');
    }
    public function deleteDocument($id_document){
        DB::table('tbl_document')->where('document_id',$id_document)->delete();
        Session::put('message','Xóa tai lieu thành công');
        return Redirect::to('admin/list-document');
    }
    public function unactiveDocument($id_document){
        DB::table('tbl_document')->where('document_id',$id_document)->update(['active'=>0]);
        Session::put('message','Dung Kích hoạt tai lieu thành công');
        return Redirect::to('admin/list-document');
    }

}
