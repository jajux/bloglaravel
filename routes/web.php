<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Admin\PostController as AdminPostController;


Route::get('/', [PostController::class, 'index'])
    ->name('posts.index');

Route::middleware(['auth'])->group(function () {
    
    Route::resource('posts', PostController::class)
    ->except('index');
    
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::middleware(['admin'])->name('admin.')->prefix('admin')->group(function () {
        Route::resource('posts', AdminPostController::class);
    });
});

require __DIR__.'/auth.php';