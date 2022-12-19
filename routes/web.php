<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SaleController;
use App\Product;
use App\Http\Middleware\IsAdmin;
use Illuminate\Http\Request;

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

Route::get('/', function (Request $request) {
    $products = Product::all();
    return view('welcome', ['product' => $products]);
});

//Cart
Route::get('/cart-add', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart-index', [CartController::class, 'index'])->name('cart.index');
Route::get('/cart-delete/{id}', [CartController::class, 'delete'])->name('cart.delete');
Route::get('/cart-decrement/{id}', [CartController::class, 'decrement'])->name('cart.decrement');
Route::get('/cart-increment/{id}', [CartController::class, 'increment'])->name('cart.increment');



//Apartado Auth
Auth::routes();
Route::get('/home', [HomeController::class,'isAdmin'])->name('home');
Route::post('/buy', [SaleController::class, 'buy']);

//Apartado para el cliente
Route::get('/client-index', [HomeController::class,'index']);
Route::get('/client-shop/{id}', [HomeController::class,'showBuy']);

//Apartado para el admin
//gestion productos
Route::get('/admin-index', [AdminController::class, 'index'])->name('admin.index')->middleware(IsAdmin::class);

Route::get('/admin-create', [AdminController::class, 'create'])->name('create')->middleware(IsAdmin::class);
Route::post('/admin-new', [AdminController::class, 'new'])->name('new')->middleware(IsAdmin::class);
Route::get('product/delete/{delete}', [AdminController::class, 'delete'])->middleware(IsAdmin::class);

Route::get('product/edit/{id}', [AdminController::class, 'edit'])->name('edit')->middleware(IsAdmin::class);
Route::put('update/{id}', [AdminController::class, 'update'])->middleware(IsAdmin::class);
