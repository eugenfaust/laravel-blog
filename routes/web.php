<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index'])->name('index');


Route::middleware('auth')->prefix('posts')->controller(PostController::class)->group(function () {
    Route::get('create', 'create')->name('posts/create');
    Route::put('create', 'store')->name('posts/store');
    Route::get('{post}', 'show')->name('posts/show');
});

Route::prefix('user')->controller(UserController::class)->group(function () {
    Route::get('{user}', 'show')->name('user');
});
require __DIR__.'/auth.php';
