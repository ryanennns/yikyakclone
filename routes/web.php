<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return redirect('/posts');
});

Route::get('/posts', function () {
    return Inertia::render('Index');
})->name('posts.index');

Route::prefix('api')->group(function () {
    Route::post('/posts', [PostController::class, 'store'])->name('api.posts.store');
    Route::get('/posts', [PostController::class, 'index'])->name('api.posts.index');
});

require __DIR__ . '/auth.php';
