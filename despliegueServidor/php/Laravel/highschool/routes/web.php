<?php

use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [TeacherController::class, 'index'])->name('index');
Route::get('/teacher/{id}', [TeacherController::class, 'show'])->name('teacher.show');

