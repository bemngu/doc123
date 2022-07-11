<?php

namespace App\Http\Controllers;

use App\Submission;
 use Illuminate\Support\Facades\Validator;
 use Illuminate\Http\Request;
 use Illuminate\Support\Facades\File;
 use Illuminate\Support\Facades\Storage;
 use Illuminate\Support\Facades\Redirect;
 use Illuminate\Support\Str;
use DB;
use App\Document;
use Session;
use App\Category_product;
use Auth;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_document()
    {
        $cate_document = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        return view('pages.document.add_document')->with('cate_document', $cate_document);
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
 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

        return view('pages.document.all_document');
    }

    
    /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_document($document_id){
       $cate_document = DB::table('tbl_category_product')->orderby('category_id','desc')->get(); 
       $edit_document = DB::table('tbl_document')->where('document_id',$document_id)->get();
       $manager_document= view('pages.document.edit_document')->with('edit_document',$edit_document)->with('cate_document',$cate_document);
       return view('layout')->with('pages.document.edit_document',$manager_document);
   }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function save_document(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'document_name' => 'required',
            'document_desc' => 'required',
            'document_title' => 'required',
            'document_slug' => 'required',
            'category_id' => 'required',
            'product_image' => 'required',
            'file' => 'required|mimetypes:application/pdf',

        ]);

        
        if ($validator->fails()) {
            return redirect('add-document')
                        ->withErrors($validator)
                        ->withInput();
        }else{
            $data=array();;
            $data['document_name']=$request->document_name;
            $data['document_desc']=$request->document_desc;        
            $data['document_title']=$request->document_title;        
            $data['document_slug']=$request->document_slug;        
            $data['category_id']=$request->category_id;  
            $data['active'] = 0;
            $data['user_create'] = Session::get('customer_id');
    
            $path = 'uploads/product/';
            $get_image = $request->file('product_image');
            
    
             $get_document = $request->file('file');
             
            $path_document = 'uploads/document/';
            if($get_image){
                $get_name_image = $get_image->getClientOriginalName();
                $new_image = Str::random(20).'.'.$get_image->getClientOriginalExtension();
                $get_image->move($path,$new_image);
                $data['product_image'] = $new_image;
               
            }
            if($get_document){
                $get_name_document = $get_document->getClientOriginalName();
                $new_document =  Str::random(20).'.'.$get_document->getClientOriginalExtension();
                $get_document->move($path_document,$new_document);
                $data['file'] = $new_document;
            }
             DB::table('tbl_document')->insertGetId($data);
             Session::put('message','Thêm tài liệu thành công');
             return redirect()->back();
        }
       
       
    
}
    public function all_document(){
        $session = Session::get('customer_id');
       
        $alll_document=DB::table('tbl_document')->where('user_create',10)->get();
        $manage_document=view('pages.document.all_document')->with('alll_document',$alll_document);
        return view('layout')->with('pages.document.all_document',$manage_document);
    }
    public function update_document(Request $request,$document_id){
       $data = array();
       $data['document_name'] = $request->document_name;
       $data['document_slug'] = $request->document_slug;
       $data['document_desc'] = $request->document_desc;
       $data['document_title'] = $request->document_title;
       $data['category_id'] = $request->category_id;
       $get_image = $request->file('product_image');
       $get_document = $request->file('file');
       $path_document = 'uploads/document/';


       if($get_image){
        $get_name_image = $get_image->getClientOriginalName();
        $new_image =  Str::random(20).'.'.$get_image->getClientOriginalExtension();
        $get_image->move('uploads/product',$new_image);
        $data['product_image'] = $new_image;
}
         //them document
         if($get_document){
            $get_name_document = $get_document->getClientOriginalName();
            $new_document =  Str::random(20).'.'.$get_document->getClientOriginalExtension();
            $get_document->move($path_document,$new_document);
            $data['file'] = $new_document;

            //lay file old document 

        }   
       DB::table('tbl_document')->where('document_id',$document_id)->update($data);
       Session::put('message','Cập nhật sản phẩm thành công');
       return redirect()->back();
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_document($document_id){
        DB::table('tbl_document')->where('document_id',$document_id)->delete();
        Session::put('message','Xóa tài liệu thành công');
        return Redirect::to('all-document');
    }
    public function view_document($document_id){
        $id_session = Session::get('customer_id');
        $data=Document::find($document_id);
        $document = Document::where('document_id',$document_id)->first();
        $document->document_views = $document->document_views + 1;
        $document->save();
        $imga = DB::table('users')->where('id',$id_session)->first();
        $show_comment = DB::table('comment')->where('id_tailieu',$document_id)->get();
        
        return view('pages.document.view',compact('data','show_comment','imga'));

    }
    public function download(Request $request,$file){
        return response()->download(public_path('uploads/document/'.$file));
    }
}
