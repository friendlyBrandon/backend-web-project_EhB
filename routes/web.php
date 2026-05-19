<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FetchUsernameController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfilePictureController;
use App\Http\Controllers\SearchBarController;
use Illuminate\Support\Facades\Route;

// Main page
Route::get('/', function () {
    return view('welcome');
});

// Public profile routes
Route::get('/profile/{username}', [ProfileController::class, 'showProfile'])
    ->name('profile.show');

Route::get('/profile/edit/{username}', [ProfileController::class, 'editProfile'])
    ->name('profile.edit.user');

Route::post('/profile', [ProfileController::class, 'updateProfile'])
    ->name('profile.update.public');

// Search bar
Route::get('/search', [SearchBarController::class, 'search'])
    ->name('profile.search');

// Dashboard
Route::get('/dashboard', [FetchUsernameController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Profiles page
Route::get('/profiles', [FetchUsernameController::class, 'index'])
    ->name('profiles');

// Upload images
Route::get('/upload/{path}', [ProfilePictureController::class, 'UploadImage'])
    ->name('public-profiles.profile-pictures');

// FAQ
Route::get('/FAQ', function () {
    return view('FAQ.FAQ');
})->name('faq');

//Contact us
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Authenticated routes
    Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');


    Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/admin_page', [AdminController::class, 'index'])
    ->middleware(['auth', 'admin']);

    Route::post('/admin/toggle/{id}', [AdminController::class, 'toggleAdmin'])
        ->name('admin.toggle');
});

});

require __DIR__.'/auth.php';