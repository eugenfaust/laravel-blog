<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index'])->name('index');


Route::middleware('auth')->prefix('posts')->controller(PostController::class)->group(function () {
    Route::get('create', 'create')->name('posts/create');
    Route::get('delete/{post}', 'delete')->name('posts/delete');
    Route::put('create', 'store')->name('posts/store');
    Route::get('edit/{post}', 'edit')->name('posts/edit');
    Route::patch('update', 'update')->name('posts/update');
    Route::post('search', 'search')->name('posts/search')->withoutMiddleware('auth');
    Route::get('{post}', 'show')->name('posts/show')->withoutMiddleware('auth');
});

Route::prefix('user')->controller(UserController::class)->group(function () {
    Route::get('{user}', 'show')->name('user');
});
Route::prefix('tag')->controller(TagController::class)->group(function () {
    Route::get('search/{tag}', 'search')->name('tag/search');
});
require __DIR__.'/auth.php';
