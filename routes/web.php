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

Route::resource('/','ServerController');
Route::resource('/SanPham','ProductController');
Route::resource('/LoaiSanPham','ProductCategoriesController');
Route::put('/LoaiSanPham/disabled/{LoaiSanPham}','ProductCategoriesController@disabled');
Route::put('/LoaiSanPham/enabled/{LoaiSanPham}','ProductCategoriesController@enabled');
Route::resource('/BaiViet','ArticleController');