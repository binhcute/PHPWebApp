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

Route::apiResource('products', 'Api\ProductController');
Route::apiResource('product_categories', 'Api\ProductCategoriesController');
Route::apiResource('portfolios', 'Api\PortfolioController');
Route::apiResource('articles', 'Api\ArticleController');
Route::apiResource('orders', 'Api\OrderController');
Route::apiResource('users', 'Api\UserController');