<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/post/{post}', [App\Http\Controllers\PostController::class, 'show'])->name('post');


Route::middleware('auth')->group(function () {
    Route::get('/admin', [App\Http\Controllers\AdminsController::class, 'index'])->name('admin.index');

    Route::get('/admin/posts', [App\Http\Controllers\PostController::class, 'index'])->name('posts.index');
    Route::get('/admin/posts/create', [App\Http\Controllers\PostController::class, 'create'])->name('posts.create');
    Route::post('/admin/posts', [App\Http\Controllers\PostController::class, 'store'])->name('posts.store');


    Route::delete('/admin/posts/{post}/destroy', [App\Http\Controllers\PostController::class, 'destroy'])->name('posts.destroy');
    Route::patch('/admin/posts/{post}/update', [App\Http\Controllers\PostController::class, 'update'])->name('posts.update');
    Route::get('/admin/posts/{post}/edit', [App\Http\Controllers\PostController::class, 'edit'])->name('posts.edit');

    Route::put('admin/users/{user}/update', [App\Http\Controllers\UserController::class, 'update'])->name('user.profile.update');

    Route::delete('admin/users/{user}/destroy', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');
});

Route::middleware(['role:admin', 'auth'])->group(function(){
    Route::get('admin/users/', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
});

Route::middleware(['can:view,user'])->group(function (){
    Route::get('admin/users/{user}/profile', [App\Http\Controllers\UserController::class, 'show'])->name('user.profile.show');

});

