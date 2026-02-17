<?php

use App\Http\Controllers\OrderApiController;
use Illuminate\Support\Facades\Route;

Route::get("/order", [OrderApiController::class, 'index']);
Route::post("/order", [OrderApiController::class, 'store']);
Route::delete("/order/{id}", [OrderApiController::class, 'destroy']);

