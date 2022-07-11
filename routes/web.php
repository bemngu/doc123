<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('layout');
// });
Route::get('/','HomeController@index');
Route::get('/trang-chu','HomeController@index');
Route::post('/tim-kiem','HomeController@search')->middleware('auth');
Route::get('/danh-muc/{category_id}','HomeController@view')->name('view')->middleware('auth');

Route::get('/log-out','HomeController@getLogout')->middleware('auth');

// //Customer
Route::get('/sign-in','CustomerController@index')->name('sign');
Route::post('/add-customer','CustomerController@store');
Route::post('/trang-chu','CustomerController@postLogin');
Route::get('/profile','CustomerController@show_profile')->middleware('auth');

Route::get('/login','CustomerController@postLogin')->middleware('auth');
Route::get('/edit-profile','CustomerController@edit_profile')->middleware('auth');
Route::post('logout','CustomerController@logout')->middleware('auth');
//document
Route::get('/add-document','DocumentController@add_document')->middleware('auth');
Route::get('/all-document','DocumentController@all_document')->middleware('auth');
Route::get('/download/{file}','DocumentController@download')->middleware('auth');
Route::get('/view-document/{document_id}','DocumentController@view_document');
Route::post('/save-document','DocumentController@save_document')->middleware('auth');
Route::get('/edit-document/{document_id}','DocumentController@edit_document')->middleware('auth');
Route::get('/delete-document/{document_id}','DocumentController@delete_document')->middleware('auth');
Route::post('/update-document/{document_id}','DocumentController@update_document')->middleware('auth');

//back-end
//Auth Admin
Route::get('/admin/login','AdminController@index');
Route::get('/dashboard','AdminController@show_dashboard')->middleware('admin');
Route::get('/logout','AdminController@logout')->middleware('admin');
Route::post('/admin-dashboard','AdminController@dashboard');

//Category Product
Route::get('/add-category-product','CategoryProduct@add_category_product')->middleware('admin');
Route::get('/all-category-product','CategoryProduct@all_category_product')->middleware('admin');
Route::get('/edit-category-product/{category_product_id}','CategoryProduct@edit_category_product')->middleware('admin');
Route::get('/delete-category-product/{category_product_id}','CategoryProduct@delete_category_product')->middleware('admin');


Route::get('/unactive-category-product/{category_product_id}','CategoryProduct@unactive_category_product')->middleware('admin');
Route::get('/active-category-product/{category_product_id}','CategoryProduct@active_category_product')->middleware('admin');

Route::post('/save-category-product','CategoryProduct@save_category_product')->middleware('admin');
Route::post('/update-category-product/{category_product_id}','CategoryProduct@update_category_product')->middleware('admin');
//admin
Route::get('/admin/list-document','AdminDocumentController@index')->middleware('admin');
Route::get('/admin/active-document/{id_document}','AdminDocumentController@activeDocument')->middleware('admin');
Route::get('/admin/unactive-document/{id_document}','AdminDocumentController@unactiveDocument')->middleware('admin');
Route::get('/admin/remove-document/{id_document}','AdminDocumentController@deleteDocument')->middleware('admin');
// admin user
Route::get('/admin/list-user','AdminAccount@index')->middleware('admin');
Route::get('/admin/list-user/{id_account}','AdminAccount@detail')->middleware('admin');
Route::post('/admin/add-permission','AdminAccount@addPermission')->middleware('admin');
Route::get('/admin/remove-user/{id}','AdminAccount@removeAccount')->middleware('admin');
// comment
Route::post('/admin/add-comment','CommentController@index')->middleware('auth');
Route::get('/admin/show-all-comment/{id_document}','CommentController@showComment')->middleware('auth');
// user
Route::post('/update-user','CustomerController@updateUser')->middleware('auth');