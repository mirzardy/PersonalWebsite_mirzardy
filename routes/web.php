<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\PostController;
use Illuminate\Support\Facades\Route;

// Landing Page
Route::get('/', [HomeController::class, 'index'])->name('home');

// Auth Login
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Admin
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/', function () {
            return view('admin.dashboard');
        });

        Route::resource('posts', PostController::class);
        Route::get('/posts/{post}', [PostController::class, 'show']);
});




require __DIR__.'/auth.php';
