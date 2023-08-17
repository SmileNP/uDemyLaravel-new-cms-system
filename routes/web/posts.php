<?php


use Illuminate\Support\Facades\Route;

Route::get('/post/{post}', [App\Http\Controllers\PostController::class, 'show'])->name('post');

Route::get('/posts', [App\Http\Controllers\PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [App\Http\Controllers\PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [App\Http\Controllers\PostController::class, 'store'])->name('posts.store');


Route::delete('/posts/{post}/destroy', [App\Http\Controllers\PostController::class, 'destroy'])->name('posts.destroy');
Route::patch('/posts/{post}/update', [App\Http\Controllers\PostController::class, 'update'])->name('posts.update');
Route::get('/posts/{post}/edit', [App\Http\Controllers\PostController::class, 'edit'])->name('posts.edit');
