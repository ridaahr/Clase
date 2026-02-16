<?php

use App\Http\Controllers\OrderApiController;
use Illuminate\Support\Facades\Route;

Route::get("/api/order", [OrderApiController::class, "show"]);
Route::post("/api/order", [OrderApiController::class, "store"]);
Route::delete("/api/order/{id}", [OrderApiController::class, "destroy"]);