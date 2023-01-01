<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'home']);

//auth
Route::get('/login', [AuthController::class, 'login'])->middleware('guest');
Route::post('/login', [AuthController::class, 'loginAuth']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::get('/register', [AuthController::class, 'register'])->middleware('guest');
Route::post('/register', [AuthController::class, 'registerAuth']);

//item
Route::get('/showProduct', [ItemController::class, 'showProduct']);
Route::get('/showProduct/{item_id?}', [ItemController::class, 'showDetail']);
Route::resource('items', ItemController::class);

//cart
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/addToCart/{id}', [CartController::class, 'store'])->name('addToCart');
Route::get('/editCart/{id}', [CartController::class, 'edit'])->name('editCart');
Route::put('/updateCart/{id}', [CartController::class, 'update'])->name('updateCart');
Route::delete('/deleteCart/{id}', [CartController::class, 'destroy'])->name('deleteCart');
