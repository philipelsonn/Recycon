<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

Auth::routes();

Route::get('/home', [HomeController::class, 'index']);

Route::get('/showProduct', [ItemController::class, 'showProduct']);
Route::get('/showProduct/{item_id?}', [ItemController::class, 'showDetail']);
Route::resource('items', ItemController::class);


