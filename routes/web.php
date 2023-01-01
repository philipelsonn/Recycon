<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\TransactionController;
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
Route::get('/cart', [TransactionController::class, 'viewCart'])->name('cart');
Route::post('/addToCart/{id}', [TransactionController::class, 'addToCart'])->name('addToCart');
Route::get('/editCart/{id}', [TransactionController::class, 'editCart'])->name('editCart');
Route::put('/updateCart/{id}', [TransactionController::class, 'updateCart'])->name('updateCart');
Route::delete('/deleteCart/{id}', [TransactionController::class, 'deleteCart'])->name('deleteCart');
