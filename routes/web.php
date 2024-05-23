<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return redirect('/posts');
});

Route::get('/posts', PostController::class . '@index')->name('posts.index');

Route::prefix('api')->group(function () {
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
});

require __DIR__ . '/auth.php';
