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
Route::group(['middleware' => 'levellogin'],function(){
    //Server
    Route::resource('/admin','ServerController');
    //Product
    Route::resource('/SanPham','ProductController');
    Route::put('/SanPham/disabled/{SanPham}','ProductController@disabled');
    Route::put('/SanPham/enabled/{SanPham}','ProductController@enabled');
    //Cate
    Route::resource('/LoaiSanPham','ProductCategoriesController');
    Route::put('/LoaiSanPham/disabled/{LoaiSanPham}','ProductCategoriesController@disabled');
    Route::put('/LoaiSanPham/enabled/{LoaiSanPham}','ProductCategoriesController@enabled');
    //Article
    Route::resource('/BaiViet','ArticleController');
    Route::put('/BaiViet/disabled/{BaiViet}','ArticleController@disabled');
    Route::put('/BaiViet/enabled/{BaiViet}','ArticleController@enabled');
    //Order
    // Route::resource('/DonHang','OrderController');
    Route::put('/DonHang/disabled/{DonHang}','OrderController@disabled');
    Route::put('/DonHang/enabled/{DonHang}','OrderController@enabled');
    //OrderDetail
    Route::resource('/ChiTietDonHang','OrderDetailController');
    Route::put('/ChiTietDonHang/disabled/{ChiTietDonHang}','OrderDetailController@disabled');
    Route::put('/ChiTietDonHang/enabled/{ChiTietDonHang}','OrderDetailController@enabled');
    //Portfolio
    Route::resource('/NhaCungCap','PortfolioController');
    Route::put('/NhaCungCap/disabled/{NhaCungCap}','PortfolioController@disabled');
    Route::put('/NhaCungCap/enabled/{NhaCungCap}','PortfolioController@enabled');
    //CMT
    Route::resource('/BinhLuan','CommentController');
    Route::put('/BinhLuan/disabled/{BinhLuan}','CommentController@disabled');
    Route::put('/BinhLuan/enabled/{BinhLuan}','CommentController@enabled');
    //Favorite
    Route::resource('/YeuThich','FavoriteController');
    Route::put('/YeuThich/disabled/{YeuThich}','FavoriteController@disabled');
    Route::put('/YeuThich/enabled/{YeuThich}','FavoriteController@enabled');
    //Color
    Route::resource('/MauSac','ColorController');
    Route::put('/MauSac/disabled/{MauSac}','ColorController@disabled');
    Route::put('/MauSac/enabled/{MauSac}','ColorController@enabled');

    //Slider
    //Menu
    //Event
    //Logo
    Route::resource('/Logo','LogoController');
    Route::put('/Logo/disabled/{Logo}','LogoController@disabled');
    Route::put('/Logo/enabled/{Logo}','LogoController@enabled');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('LoginCheck','CheckLoginController@check');

Route::resource('/DonHang','OrderController');
//Client
Route::resource('/','ClientController');
Route::get('/about_us','ClientController@about_us');
Route::get('/ChiTietBaiViet','ClientController@article_detail');
Route::get('/article','ClientController@article');
Route::get('/cart','ClientController@cart');
Route::get('/checkout','ClientController@check_out');
Route::get('/contact_us','ClientController@contact_us');
Route::get('/favorite','ClientController@favorite');
Route::get('/account','ClientController@my_account');
Route::get('/brand','ClientController@portfolio');
Route::get('/ChiTietNCC','ClientController@portfolio_detail');
Route::get('/product','ClientController@product');
Route::get('/product/{product}','ClientController@product_detail');