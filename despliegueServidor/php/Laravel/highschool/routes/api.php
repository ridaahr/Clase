<?php

use App\Http\Controllers\TestApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/test', [TestApiController::class, 'store']);
Route::get('/test/{id}', [TestApiController::class, 'show']);
Route::put('/test/{id}', [TestApiController::class, 'update']);
Route::delete('/test/{id}', [TestApiController::class, 'destroy']);

Route::get('/searchMinMax', [TestApiController::class, 'searchMinMax']);
Route::get('/searchType', [TestApiController::class, 'searchType']);