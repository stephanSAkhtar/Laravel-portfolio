<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('index', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    //=========================  Profile Routes ======================
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::prefix('Admin')->middleware(['auth', 'verified'])->group(function () {
    
    // Hero ===============
    Route::get('/hero', function () {
        return Inertia::render('Admin/hero-section');
    })->name('hero.index');

    // About =================
    Route::get('/about', function () {
        return Inertia::render('Admin/about-me');
    })->name('about.index');

    // Contact =================
    Route::get('/contact', function () {
        return Inertia::render('Admin/my-contact');
    })->name('contact.index');

    // Skills =================
    Route::get('/skills', function () {
        return Inertia::render('Admin/my-skills');
    })->name('skills.index');

    // Portfolio =================
    Route::get('/portfolio', function () {
        return Inertia::render('Admin/my-work');
    })->name('portfolio.index');
});
require __DIR__ . '/auth.php';
