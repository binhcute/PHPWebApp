<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('product', 'Api\ProductController');
Route::apiResource('category', 'Api\CategoryController');
Route::apiResource('portfolio', 'Api\PortfolioController');
Route::apiResource('article', 'Api\ArticleController');
Route::apiResource('order', 'Api\OrderController');
Route::apiResource('order-detail', 'Api\OrderDetailController');
Route::apiResource('account', 'Api\AccountController');
