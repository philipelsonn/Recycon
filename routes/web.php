<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'home']);

//auth
Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'loginAuth']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::get('/register', [AuthController::class, 'register'])->middleware('guest');
Route::post('/register', [AuthController::class, 'registerAuth']);
Route::get('/editProfile', [AuthController::class, 'editProfile'])->middleware('auth');
Route::post('/editProfile', [AuthController::class, 'editProfileAuth']);
Route::get('/changePassword', [AuthController::class, 'changePassword'])->middleware('auth');
Route::post('/changePassword', [AuthController::class, 'changePasswordAuth']);

//item
Route::get('/showProduct', [ItemController::class, 'showProduct']);
Route::get('/showProduct/{item_id?}', [ItemController::class, 'showDetail']);
Route::get('/addItem', [ItemController::class, 'create'])->name('items.create')->middleware('admin');
Route::post('/addItem', [ItemController::class, 'store']);
Route::get('/viewItem', [ItemController::class, 'index'])->name('items.index')->middleware('admin');
Route::get('/updateItem/{item_id?}', [ItemController::class, 'edit'])->name('items.edit')->middleware('admin');
Route::post('/updateItem/{item_id?}', [ItemController::class, 'update']);
Route::post('/deleteItem/{item_id?}', [ItemController::class, 'destroy']);

//cart
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/addToCart/{id}', [CartController::class, 'store'])->name('addToCart');
Route::get('/editCart/{id}', [CartController::class, 'edit'])->name('editCart');
Route::put('/updateCart/{id}', [CartController::class, 'update'])->name('updateCart');
Route::delete('/deleteCart/{id}', [CartController::class, 'destroy'])->name('deleteCart');
