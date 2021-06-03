<?php

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
//Server
Route::resource('/admin','ServerController')->middleware('levellogin');
Route::resource('/SanPham','ProductController');
Route::put('/SanPham/disabled/{SanPham}','ProductController@disabled');
Route::put('/SanPham/enabled/{SanPham}','ProductController@enabled');
Route::resource('/LoaiSanPham','ProductCategoriesController');
Route::put('/LoaiSanPham/disabled/{LoaiSanPham}','ProductCategoriesController@disabled');
Route::put('/LoaiSanPham/enabled/{LoaiSanPham}','ProductCategoriesController@enabled');
Route::resource('/BaiViet','ArticleController');
// Route::put('/BaiViet/disabled/{BaiViet}','ArticleController@disabled');
// Route::put('/BaiViet/enabled/{BaiViet}','ArticleController@enabled');
Route::resource('/DonHang','OrderController');
Route::resource('/ChiTietDonHang','OrderDetailController');
Route::resource('/NhaCungCap','PortfolioController');
Route::resource('/BinhLuan','CommentController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('LoginCheck','CheckLoginController@check');

//Client
Route::resource('/','ClientController');