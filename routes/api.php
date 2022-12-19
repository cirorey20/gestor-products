<?php

use Illuminate\Http\Request;
use App\Http\Controllers\ProductController;
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

Route::get('/products', [ProductController::class, 'getProducts']);
Route::get('/products/{id}', [ProductController::class, 'productId']);
Route::post('/product', [ProductController::class, 'create']);
Route::patch('/product/{id}', [ProductController::class, 'edit']);
Route::delete('/product/{id}', [ProductController::class, 'delete']);