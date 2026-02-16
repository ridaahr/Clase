<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ClientController::class, "index"])->name("index");
Route::delete('/client/{id}', [ClientController::class, "destroy"])->name('client.destroy');
Route::get('/client/create', [ClientController::class, "create"])->name("client.create");
Route::post('/client', [ClientController::class, "store"])->name("client.store");
Route::get('/order/create', [OrderController::class, "create"])->name("order.create");
Route::post('/order', [OrderController::class, "store"])->name("order.store");