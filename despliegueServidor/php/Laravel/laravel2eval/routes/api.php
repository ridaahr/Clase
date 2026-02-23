<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::post('/post', [PostController::class, 'createRest']);
Route::get('/author/{incr}', [AuthorController::class, 'incrementRest']);