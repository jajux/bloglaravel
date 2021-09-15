<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;


Route::get('/', [PostController::class, 'index'])
    ->name('posts.index');

Route::middleware(['auth'])->group(function () {
    
    Route::resource('posts', PostController::class)
    ->except('index');
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

require __DIR__.'/auth.php';