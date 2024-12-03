<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;

Route::view('/', 'home');
Route::view('/cart', 'cart');

Route::get('/products', [ProductController::class, 'index']);

Route::get('/products/create', [ProductController::class, 'create'])
->middleware(['auth']);

Route::get('/products/{product}', [ProductController::class, 'show']);

Route::post('/products', [ProductController::class, 'store']);

Route::get('/products/{product}/edit', [ProductController::class, 'edit'])
->middleware(['auth'])
->can('edit','product');

Route::patch('/products/{product}', [ProductController::class, 'update'])
->middleware(['auth'])
->can('update','product');

Route::delete('/products/{product}', [ProductController::class, 'destroy'])
->middleware(['auth'])
->can('destroy','product');

Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);


Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);