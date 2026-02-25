<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [AuthorController::class, 'index'])->name('index');
Route::get('/author/{id}', [AuthorController::class, 'edit'])->name('author.edit');
Route::delete('/delete-comments/{id}', [CommentController::class, 'deleteByPostId'])->name('comment.destroy');
Route::get('/author-age', [AuthorController::class, 'showBetweenAges'])->name('author.ages');

Route::get('/posts/create', [PostController::class, 'create'])
    ->name('post.create');

Route::post('/post', [PostController::class, 'store'])
    ->name('post.store');
