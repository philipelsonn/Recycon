<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/', function () {
    return redirect('home');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/showProduct', [ItemController::class, 'showProduct']);
Route::get('/showProduct/{item_id?}', [ItemController::class, 'showDetail']);
Route::resource('items', ItemController::class);

Route::get('/cart', [TransactionController::class, 'viewCart'])->name('cart');
Route::post('/addToCart/{id}', [TransactionController::class, 'addToCart'])->name('addToCart');
Route::get('/editCart/{id}', [TransactionController::class, 'editCart'])->name('editCart');
Route::put('/updateCart/{id}', [TransactionController::class, 'updateCart'])->name('updateCart');
Route::delete('/deleteCart/{id}', [TransactionController::class, 'deleteCart'])->name('deleteCart');


