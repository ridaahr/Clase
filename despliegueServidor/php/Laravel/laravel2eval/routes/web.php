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


Route::get('/post', [PostController::class, 'index'])->name('post.index');

Route::get('/post/create', [PostController::class, 'create'])
    ->name('post.create');

Route::post('/post', [PostController::class, 'store'])
    ->name('post.store');

Route::get('/post/edit/{post}', [PostController::class, 'edit'])
    ->name('post.edit');

Route::put('/post/{post}', [PostController::class, 'update'])
    ->name('post.update');

Route::get('/comment/create/{post}', [CommentController::class, 'create'])->name('comment.create');
Route::post('/comment',              [CommentController::class, 'store'])->name('comment.store');

Route::get('/comment/edit/{comment}', [CommentController::class, 'edit'])->name('comment.edit');
Route::put('/comment/{comment}',      [CommentController::class, 'update'])->name('comment.update');