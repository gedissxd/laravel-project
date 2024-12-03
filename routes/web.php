<?php

use App\Livewire\Counter;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\CartItemController;

Route::view('/', 'home');
Route::get('/counter', Counter::class);
// cart
Route::get('/cart', [CartItemController::class, 'index']);

Route::post('/cart', [CartItemController::class, 'store']);

// products
Route::get('/products', [ProductController::class, 'index']);

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

//register
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

//login
Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);