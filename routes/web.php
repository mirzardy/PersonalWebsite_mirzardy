<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\PortfolioProfileController;
use App\Http\Controllers\Admin\PortfolioSkillController;
use App\Http\Controllers\Admin\PortfolioEducationController;
use App\Http\Controllers\Admin\PortfolioExperienceController;
use App\Http\Controllers\Admin\PortfolioLanguageController;
use App\Http\Controllers\Admin\PortfolioHobbyController;
use App\Http\Controllers\Admin\ContactController;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Portfolio\PortfolioProfile;
use App\Models\Contact\Contact;
use App\Models\Contact\Link;

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

        // DASHBOARD
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        // POSTS
        Route::resource('posts', PostController::class);

        // PORTFOLIO
        Route::get('portfolio', [PortfolioProfileController::class, 'edit'])->name('portfolio.edit');
        Route::put('portfolio', [PortfolioProfileController::class, 'update'])->name('portfolio.update');

        Route::resource('portfolio-skills', PortfolioSkillController::class)
            ->parameters([
                'portfolio-skill' => 'skill'
            ])
            ->except(['create', 'edit', 'show']);

        Route::resource('portfolio-educations', PortfolioEducationController::class)
            ->except(['index', 'create', 'edit', 'show']);

        Route::resource('portfolio-experiences',PortfolioExperienceController::class)
            ->except(['create', 'edit', 'show']);

        Route::resource('portfolio-languages', PortfolioLanguageController::class)
            ->except(['create','edit','show']);

        Route::resource('portfolio-hobbies', PortfolioHobbyController::class)
            ->except(['create','edit','show']);

        // CONTACT
        Route::get('contacts', [ContactController::class, 'index'])
            ->name('contacts.index');

        Route::put('contacts', [ContactController::class, 'updateContact'])
            ->name('contacts.update');

        // LINKS
        Route::post('links', [ContactController::class, 'storeLink'])
            ->name('links.store');

        Route::put('links/{link}', [ContactController::class, 'updateLink'])
            ->name('links.update');

        Route::delete('links/{link}', [ContactController::class, 'destroyLink'])
            ->name('links.destroy');

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

Route::get('/contact', function () {
    return view('contact.index', [
        'contact' => Contact::first(),
        'links' => Link::all(),
        'profile' => PortfolioProfile::with('address')->first(),
    ]);
})->name('contact.index');


require __DIR__.'/auth.php';
