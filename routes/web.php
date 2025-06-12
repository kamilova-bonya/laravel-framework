<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\IndexController as AdminController;

Route::get('/', [HomeController::class, 'index'])->name('home');
//TODO сгруппировать маршруты для работы с постами
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show')->where('id', '[0-9]+');
//TODO добавить категории постов
//1. создать таблицу категорий
//2. заполнить ее данными через seed
//3. сделать страницу со списком категорий и показом постов одной категории
//posts/categories/1
//posts/categories

Route::name('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('index');
        Route::get('/posts', [AdminController::class, 'posts'])->name('posts');
    });

