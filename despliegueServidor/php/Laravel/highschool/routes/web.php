<?php

use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;


Route::get('/', [TeacherController::class, 'index'])->name('index');
Route::get('/teacher/{teacher}', [TeacherController::class, 'show'])->name('teacher.show');
Route::get('/subject/{subject}', [SubjectController::class, 'show'])->name('subject.show');
Route::get('/test/{test}', [TestController::class, 'edit'])->name('test.edit');
Route::put('/test/{test}', [TestController::class, 'update'])->name('test.update');
Route::delete('/test/{test}', [TestController::class, 'destroy'])->name('test.destroy');
Route::get('/teacher', [TeacherController::class, 'create'])->name('teacher.create');
Route::post('/teacher', [TeacherController::class, 'store'])->name('teacher.store');
Route::get('/subject', [SubjectController::class, 'create'])->name('subject.create');
Route::post('/subject', [SubjectController::class, 'store'])->name('subject.store');
Route::get('/test', [TestController::class, 'create'])->name('test.create');
Route::post('/test', [TestController::class, 'store'])->name('test.store');
Route::get('/test/{test}', [TestController::class, 'show'])->name('test.show');
