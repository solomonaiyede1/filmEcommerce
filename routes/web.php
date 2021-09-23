<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\ClientController;


// Route::get('/test', [ShowController::class, 'test']);
// Route::post('/test', [ShowController::class, 'insert']);
// Route::get('/edit', [ShowController::class, 'edit']);
// Route::get('/edit/{id}', [ShowController::class, 'edit']);
// Route::post('/edit/{id}', [ShowController::class, 'update']);


Route::get('/show', [CategoryController::class, 'show']);



Route::get('/', function () {
    return view('welcome');
});
Route::get('/', [ProductController::class, 'show1']);
Route::post('/category', [CategoryController::class, 'show']);


Route::get('/single_product/{id}', [ProductController::class, 'display']);
Route::get('/single_product', function(){
    return view('/single_product');
});


Route::post('/addToCart/{id}', [ProductController::class, 'addToCart']);
Route::get('/addToCart/{id}', function(){
 return view('addToCart');
});


   Route::get('/successful_payment', function(){
    return view('successful_payment');
   });



Route::get('cart', [ProductController::class, 'cart'])->name('cart');
// Route::get('/addToCart', [ProductController::class, 'viewCart']);
// Route::get('/addToCart/{id}', [ProductController::class, 'addToCart']);
Route::patch('update-cart', [ProductController::class, 'update'])->name('update.cart');

Route::get('/product-admin-delete/{id}', [ProductController::class, 'deleteView']);
Route::delete('/product-admin/{id}', [ProductController::class, 'deleteProduct']);
Route::get('/payment1', [ProductController::class, 'payment'])->middleware('shoppingcart');
// Route::get('addcart/{id}', [ProductController::class, 'addCart'])->name('add.to.cart');
// Route::patch('update-cart', [ProductController::class, 'update'])->name('update.cart');
Route::delete('/addToCart/{id}', [ProductController::class, 'remove']);


Route::get('/order', function () {
    return view('order');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/product-admin', function () {
    return view('product-admin');
})->name('product-admin');

Route::get('/product-admin', [ProductController::class, 'show']);
Route::post('/product-admin', [ProductController::class, 'insert']);
Route::get('/product-edit', [ShowController::class, 'edit1']);
Route::get('/product-edit/{id}', [ProductController::class, 'show2']);
Route::post('/product-edit/{id}', [ProductController::class, 'update1']);
Route::get('/product-search', [ProductController::class, 'search']);
Route::post('/product-search', [ProductController::class, 'search1']);

Route::middleware(['auth:sanctum', 'verified'])->get('/category', function () {
    return view('category');
})->name('category');


Route::get('/category', [CategoryController::class, 'show1']);

