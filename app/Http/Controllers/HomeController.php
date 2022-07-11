<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\User;
use App\Document;
use App\Category_product;
use Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $cate_document = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $all_product = DB::table('tbl_document')->orderby(DB::raw('RAND()'))->paginate(6); 
        return view('pages.home')->with('cate_document', $cate_document)->with('all_product',$all_product);
        
    }

  public function View($category_id){
    $cate_document = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
    $all_product = DB::table('tbl_document')->where('category_id',$category_id)->get(); 
    return view('pages.document.detail_document')->with('cate_document', $cate_document)->with('all_product',$all_product);
  }
    public function getLogout(){
        Auth::logout();
        session()->forget('customer_id');
        session()->forget('customer_name');
        session()->flush();
        return redirect()-> intended('sign-in');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function search(Request $request){
         $checkbox = $request->checkbox;
        $keywords = $request->keywords_submit;
        if(isset($checkbox)){
            // $document=DB::table('tbl_document')->join('tbl_category_product','tbl_category_product.category_id','=','tbl_document.category_id')->where('tbl_document.user_create','=',$session_id)->orderby('tbl_document.document_id','desc')->paginate(10);
            $search_document = DB::table('tbl_document')->where([
                ['document_name','like','%'.$keywords.'%'],
                ['category_id', '=',$checkbox]
            ])->get(); 
            return view('pages.document.search')->with('search_document',$search_document);
        }
        $search_document = DB::table('tbl_document')->where('document_name','like','%'.$keywords.'%')->get(); 
        return view('pages.document.search')->with('search_document',$search_document);

     }
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
