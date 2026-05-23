<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FetchUsernameController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfilePictureController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SearchBarController;
use App\Http\Controllers\MessageUsersController;
use App\Http\Controllers\SupportForumController;
use App\Http\Controllers\CommentController;
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

Route::post('/profile/{username}', [ProfileController::class, 'updateProfile'])
    ->name('profile.update.public');

// Dashboard
Route::get('/dashboard', [FetchUsernameController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Profiles page
Route::get('/profiles', [FetchUsernameController::class, 'index'])
    ->name('profiles');

Route::get('/profile-view', function () {
    $users = \App\Models\User::all();
    return view('public-profiles.profiles-view', compact('users'));
})->name('profiles.view');

// Upload images
Route::get('/upload/{path}', [ProfilePictureController::class, 'UploadImage'])
    ->name('public-profiles.profile-pictures');


//Users messages
Route::middleware('auth')->group(function () {

    Route::get('/messages/{username}', [MessageUsersController::class, 'show'])
        ->name('messages.message');

    Route::post('/messages/{username}', [MessageUsersController::class, 'send'])
        ->name('messages.send');

    Route::get('/inbox', [MessageUsersController::class, 'inbox'])
        ->name('messages.inbox');
});

//News Page
Route::get('/news', [NewsController::class, 'index'])
    ->name('news');

Route::get('/news/{news}', [NewsController::class, 'show'])
    ->name('news.fullview');
Route::post('/news/{news}/comments', [CommentController::class, 'store'])
    ->middleware('auth')
    ->name('comments.store');

// FAQ
Route::get('/FAQ', function () {
    return view('FAQ.FAQ');
})->name('faq');

//Contact us
Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::post('/contact', [SupportForumController::class, 'store'])
    ->name('contact.store');

//Auth to profile
Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');


    //Auth admin page
    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/admin/admin_page', [AdminController::class, 'index'])
            ->name('admin.admin_page')
            ->middleware(['auth', 'admin']);


        Route::post('/admin/toggle/{id}', [AdminController::class, 'toggleAdmin'])
            ->name('admin.toggle');
    });
    Route::middleware(['auth'])->group(function () {

        Route::get('/admin/support-forums', [SupportForumController::class, 'index'])
            ->name('admin.support-forums');

    });
    //Admin news
    Route::middleware(['auth', 'admin'])->group(function () {

        Route::get('/admin/news', [NewsController::class, 'admin'])
            ->name('admin.news');

        Route::post('/admin/news', [NewsController::class, 'store'])
            ->name('admin.news.store');

        Route::delete('/admin/news/{news}', [NewsController::class, 'destroy'])
            ->name('admin.news.destroy');
    });

});

require __DIR__ . '/auth.php';