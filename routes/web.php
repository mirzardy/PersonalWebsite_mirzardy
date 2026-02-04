<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\PortfolioProfileController;
use App\Http\Controllers\Admin\PortfolioSkillController;
use App\Http\Controllers\Admin\PortfolioEducationController;
use Illuminate\Support\Facades\Route;
use App\Models\Post;

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

        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('posts', PostController::class);

        Route::get('portfolio', [PortfolioProfileController::class, 'edit'])->name('portfolio.edit');
        Route::put('portfolio', [PortfolioProfileController::class, 'update'])->name('portfolio.update');

        Route::resource('portfolio-skills', PortfolioSkillController::class)
            ->parameters([
                'portfolio-skill' => 'skill'
            ])
            ->except(['create', 'edit', 'show']);

        Route::resource('portfolio-educations', PortfolioEducationController::class)
            ->except(['index', 'create', 'edit', 'show']);

});

// Public
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/posts', function () {
    return view('posts.index', [
        'posts' => Post::latest()->get(),
    ]);
})->name('posts.index');
Route::get('/posts/{post:slug}', function (Post $post) {
    return view('posts.show', compact('post'));
})->name('posts.show');


require __DIR__.'/auth.php';
