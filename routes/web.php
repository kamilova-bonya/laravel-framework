<?php

use App\Http\Controllers\CategoryController;

use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::group([], function () {
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show')->where('post', '[0-9]+');
    Route::get('/posts/categories', [CategoryController::class, 'index'])->name('posts.categories.index');
    Route::get('/posts/categories/{category}', [CategoryController::class, 'show'])->name('posts.categories.show')->where('id', '[0-9]+');
});

Route::post('/posts/{id}/add/like', [PostController::class, 'addLike'])
    ->name('posts.like.add');

Route::middleware('auth')->group(function () {
    Route::get('/posts/{post}/comments/create', [CommentController::class, 'create'])->name('comments.create');
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::get('/comments/{comment}', [CommentController::class, 'show'])->name('comments.show');
    Route::get('/comments/{comment}/edit', [CommentController::class, 'edit'])->name('comments.edit');
    Route::put('/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
});

Route::name('admin.')
    ->middleware(['auth', 'isAdmin']);

Route::name('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::get('/', [AdminHomeController::class, 'index'])->name('index');
        Route::get('/posts', [AdminPostController::class, 'index'])->name('posts.index');
        Route::get('/posts/create', [AdminPostController::class, 'create'])->name('posts.create');
        Route::post('/posts/store', [AdminPostController::class, 'store'])->name('posts.store');
        Route::delete('/posts/{post}/destroy', [AdminPostController::class, 'destroy'])->name('posts.destroy');
        Route::get('/posts/{post}/edit', [AdminPostController::class, 'edit'])->name('posts.edit');
        Route::put('/posts/{post}', [AdminPostController::class, 'update'])->name('posts.update');
        Route::get('/categories', [AdminCategoryController::class, 'index'])->name('categories.index');
        Route::get('/categories/create', [AdminCategoryController::class, 'create'])->name('categories.create');
        Route::post('/categories/store', [AdminCategoryController::class, 'store'])->name('categories.store');
        Route::get('/categories/{category}/edit', [AdminCategoryController::class, 'edit'])->name('categories.edit');
        Route::put('/categories/{category}', [AdminCategoryController::class, 'update'])->name('categories.update');
        Route::delete('/categories/{category}/destroy', [AdminCategoryController::class, 'destroy'])->name('categories.destroy');
    });




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
