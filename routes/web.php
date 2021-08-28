<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\ClientController;



Route::get('/test', [ShowController::class, 'test']);


Route::get('/show', [CategoryController::class, 'show']);



Route::get('/', function () {
    return view('welcome');
});
Route::get('/', [ProductController::class, 'show1']);
Route::post('/category', [CategoryController::class, 'show']);


Route::get('/single_product/{id}', [ProductController::class, 'display']);


Route::get('/addToCart', function(){
 return view('addToCart');
});

Route::get('/payment1', function(){
    return view('payment1');
   });

   Route::get('/payment2', function(){
    return view('payment2');
   });

   Route::get('/payment3', function(){
    return view('payment3');
   });

   Route::get('/successful_payment', function(){
    return view('successful_payment');
   });

Route::get('cart', [ProductController::class, 'cart'])->name('cart');
Route::get('/addToCart', [ProductController::class, 'viewCart']);
Route::get('/addToCart/{id}', [ProductController::class, 'addToCart']);
Route::patch('update-cart', [ProductController::class, 'update'])->name('update.cart');
Route::delete('/delete', [ProductController::class, 'remove']);
Route::get('/client_data', [ClientController::class, 'clientView']);
Route::post('/client_data', [ClientController::class, 'client']);
// Route::get('addcart/{id}', [ProductController::class, 'addCart'])->name('add.to.cart');
// Route::patch('update-cart', [ProductController::class, 'update'])->name('update.cart');
// Route::delete('remove-from-cart', [ProductController::class, 'remove'])->name('remove.from.cart');

Route::get('/payment', function(){
    return view('payment');
   });
   

Route::get('/about', function () {
    return view('about');
});

Route::get('/product', function () {
    return view('product');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/product-admin', function () {
    return view('product-admin');
})->name('product-admin');

Route::get('/product-admin', [ProductController::class, 'show']);
Route::post('/product-admin', [ProductController::class, 'insert']);


Route::middleware(['auth:sanctum', 'verified'])->get('/order', function () {
    return view('order');
})->name('order');

Route::middleware(['auth:sanctum', 'verified'])->get('/category', function () {
    return view('category');
})->name('category');

Route::middleware(['auth:sanctum', 'verified'])->get('/miscellaneous', function () {
    return view('miscellaneous');
})->name('miscellaneous');

Route::get('/category', [CategoryController::class, 'show1']);

