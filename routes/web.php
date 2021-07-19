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
    Route::get('/XoaSanPham/{SanPham}','ProductController@destroy');
    Route::put('/SanPham/disabled/{SanPham}','ProductController@disabled');
    Route::put('/SanPham/enabled/{SanPham}','ProductController@enabled');
    //Cate
    Route::resource('/LoaiSanPham','ProductCategoriesController');
    Route::get('/XoaLoaiSanPham/{LoaiSanPham}','ProductCategoriesController@destroy');
    Route::put('/LoaiSanPham/disabled/{LoaiSanPham}','ProductCategoriesController@disabled');
    Route::put('/LoaiSanPham/enabled/{LoaiSanPham}','ProductCategoriesController@enabled');
    //Article
    Route::resource('/BaiViet','ArticleController');
    Route::get('/XoaBaiViet/{LoaiBaiViet}','ArticleController@destroy');
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
    Route::get('/XoaNhaCungCap/{NhaCungCap}','PortfolioController@destroy');
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

    //Slider
    
    // Route::resource('/Slider','SliderController');
    // Route::get('/XoaSlider/{Slider}','SliderController@destroy');
    // Route::put('/Slider/disabled/{Slider}','SliderController@disabled');
    // Route::put('/Slider/enabled/{Slider}','SliderController@enabled');
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
Route::get('/cart','ClientController@cart');
Route::get('/checkout','ClientController@check_out');
Route::get('/contact_us','ClientController@contact_us');
Route::get('/favorite','ClientController@favorite');
Route::get('/account','ClientController@my_account');

//Brand
Route::get('/brand/{brand}','ClientController@portfolio_list');
Route::get('/brand_detail','ClientController@portfolio_detail');

//Categories
Route::get('/categories_detail','ClientController@categories_detail');
Route::get('/product_categories/{product_categories}','ClientController@categories_list');

//Product
Route::get('/product','ClientController@product');
Route::get('/product/{product}','ClientController@product_detail');

//Article
Route::get('/article/{article_detail}','ClientController@article_detail');
Route::get('/article','ClientController@article');
