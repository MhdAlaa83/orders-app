<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;

/*

|----------------------------------------------
| Orders Page
|----------------------------------------------
| GET /orders -> OrderController@index
| Route name: orders.index (conventional)

*/
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
