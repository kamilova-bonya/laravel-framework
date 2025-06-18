<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\PostController as AdminPostController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::group([], function () {
    Route::get('posts/', [PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show')->where('id', '[0-9]+');
    Route::get('/posts/categories', [CategoryController::class, 'index'])->name('posts.categories.index');
    Route::get('/posts/categories/{id}', [CategoryController::class, 'show'])->name('posts.categories.show')->where('id', '[0-9]+');
});

//Route::name('posts.')
//    ->prefix('posts')
//    ->group(function () {
//        Route::get('/', [PostController::class, 'index'])->name('index');
//        Route::get('/{id}', [PostController::class, 'show'])->name('show')->where('id', '[0-9]+');
//    });

Route::name('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::get('/', [AdminHomeController::class, 'index'])->name('index');
        Route::get('/posts', [AdminPostController::class, 'index'])->name('posts.index');
    });

