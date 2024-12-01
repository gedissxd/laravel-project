<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;

Route::view('/', 'home');
Route::resource('products', ProductController::class);
Route::view('/cart', 'cart');
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);
Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);


// //all products
// Route::get('/products', [ProductController::class, 'index']);

// //create product
// Route::get('/products/create', [ProductController::class, 'create']);

// //show product
// Route::get('/products/{product}', [ProductController::class, 'show']); 

// //store product
// Route::post('/products', [ProductController::class, 'store']);

// //edit product
// Route::get('/products/{product}/edit', [ProductController::class, 'edit']);

// //update product
// Route::patch('/products/{product}', [ProductController::class, 'update']);

// //delete product
// Route::delete('/products/{product}', [ProductController::class, 'destroy']);