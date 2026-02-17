<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [OrderController::class, "index"])->name("index");
Route::delete('/client/{id}', [ClientController::class, "destroy"])->name('client.destroy');
Route::get('/client/create', [ClientController::class, "create"])->name("client.create");
Route::post('/client', [ClientController::class, "store"])->name("client.store");
Route::get('/order/create', [OrderController::class, "create"])->name("order.create");
Route::post('/order', [OrderController::class, "store"])->name("order.store");
Route::delete('/order/{id}', [OrderController::class, "destroy"])->name("order.destroy");

//opcionales
Route::get("/product/search", [ProductController::class, "search"])->name('product.search');
Route::get("/product/search", [ProductController::class, "showProducts"]);