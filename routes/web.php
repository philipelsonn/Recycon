<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Auth;

Route::get('/home', [HomeController::class, 'guestHome']);
Route::get('/home/admin', [HomeController::class, 'adminHome']);
Route::get('/home/user', [HomeController::class, 'userHome']);
Route::get('/showProduct', [ItemController::class, 'showProduct']);
Route::get('/showProduct/{item_id?}', [ItemController::class, 'showDetail']);
Route::resource('items', ItemController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
