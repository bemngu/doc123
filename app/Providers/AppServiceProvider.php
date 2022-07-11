<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Category_product;
use App\Document;
use Session;
use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*',function($view) {
      
        $session_name = Session::get('customer_name');
        $session_id = Session::get('customer_id');
        $cate_document = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $document_views  = Document::where('active','1')->orderBy('document_views','DESC')->take(3)->get();
        $all_document = DB::table('tbl_document')->where('active','1')->orderby('document_id','desc')->paginate(4); 
        $alll_document=DB::table('tbl_document')->join('tbl_category_product','tbl_category_product.category_id','=','tbl_document.category_id')->where('tbl_document.user_create','=',$session_id)->orderby('tbl_document.document_id','desc')->paginate(10);
      
        $view->with('cate_document', $cate_document)->with('all_document',$all_document)->with('alll_document',$alll_document)->with('document_views',$document_views)->with('session_name',$session_name);
        });
    }
}
