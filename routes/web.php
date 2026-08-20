<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FetchUsernameController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfilePictureController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\MessageUsersController;
use App\Http\Controllers\SupportForumController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FAQController;
use Illuminate\Support\Facades\Route;


//Home
Route::get('/', fn() => view('welcome'));

//News
Route::get('/news', [NewsController::class, 'index'])->name('news');
Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.fullview');

Route::post('/news/{news}/comments', [CommentController::class, 'store'])
    ->middleware('auth')
    ->name('comments.store');

//FAQ
Route::view('/FAQ', 'FAQ.FAQ')->name('faq');
Route::get('/FAQ_general', [FaqController::class, 'general']);
Route::get('/FAQ_data', [FaqController::class, 'data']);
Route::get('/FAQ_safe', [FaqController::class, 'safe']);
Route::get('/FAQ_technical', [FaqController::class, 'technical']);


//FAQ admin
// Admin FAQ management
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/faqs', [FaqController::class, 'adminIndex'])
        ->name('faqs.index');

    Route::get('/faqs/create', [FaqController::class, 'create'])
        ->name('faqs.create');

    Route::post('/faqs', [FaqController::class, 'store'])
        ->name('faqs.store');

    Route::get('/faqs/{faq}/edit', [FaqController::class, 'edit'])
        ->name('faqs.edit');

    Route::put('/faqs/{faq}', [FaqController::class, 'update'])
        ->name('faqs.update');

    Route::delete('/faqs/{faq}', [FaqController::class, 'destroy'])
        ->name('faqs.destroy');
});


//Contact
Route::view('/contact', 'contact')->name('contact');
Route::post('/contact', [SupportForumController::class, 'store'])->name('contact.store');


Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [FetchUsernameController::class, 'index'])
        ->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Messaging
    Route::get('/messages/{username}', [MessageUsersController::class, 'show'])
        ->name('messages.message');

    Route::post('/messages/{username}', [MessageUsersController::class, 'send'])
        ->name('messages.send');

    Route::get('/inbox', [MessageUsersController::class, 'inbox'])
        ->name('messages.inbox');
});


Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'admin'])
    ->group(function () {

        //Admin dash
        Route::get('/admin_page', [AdminController::class, 'index'])
            ->name('admin_page');

        Route::post('/toggle/{id}', [AdminController::class, 'toggleAdmin'])
            ->name('toggle');

        Route::get('/support-forums', [SupportForumController::class, 'index'])
            ->name('support-forums');

        Route::get('/news', [NewsController::class, 'admin'])->name('news');
        Route::post('/news', [NewsController::class, 'store'])->name('news.store');
        Route::get('/news/{news}/edit', [NewsController::class, 'edit'])->name('news.edit');
        Route::put('/news/{news}', [NewsController::class, 'update'])->name('news.update');
        Route::delete('/news/{news}', [NewsController::class, 'destroy'])->name('news.destroy');
    });


//Public Profiles
Route::get('/profile/{username}', [ProfileController::class, 'showProfile'])
    ->name('profile.show');

Route::get('/profile/edit/{username}', [ProfileController::class, 'editProfile'])
    ->name('profile.edit.user');

Route::post('/profile/{username}', [ProfileController::class, 'updateProfile'])
    ->name('profile.update.public');

Route::get('/profiles', [FetchUsernameController::class, 'index'])
    ->name('profiles');

Route::get('/profile-view', function () {
    $users = \App\Models\User::all();
    return view('public-profiles.profiles-view', compact('users'));
})->name('profiles.view');


//Profile picture
Route::get('/upload/{path}', [ProfilePictureController::class, 'UploadImage'])
    ->name('public-profiles.profile-pictures');


require __DIR__ . '/auth.php';