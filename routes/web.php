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
Route::resource('/DonHang','OrderController');
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
//Series
Route::resource('/PhienBan','SeriesController');
Route::put('/PhienBan/disabled/{PhienBan}','SeriesController@disabled');
Route::put('/PhienBan/enabled/{PhienBan}','SeriesController@enabled');
//Slider
//Menu
//Event
//Logo
Route::resource('/Logo','LogoController');
Route::put('/Logo/disabled/{Logo}','LogoController@disabled');
Route::put('/Logo/enabled/{Logo}','LogoController@enabled');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('LoginCheck','CheckLoginController@check');

//Client
Route::resource('/','ClientController');