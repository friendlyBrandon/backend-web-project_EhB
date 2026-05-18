    <?php

    use App\Http\Controllers\ProfileController;
    use App\Http\Controllers\FetchUsernameController; 
    use App\Http\Controllers\FetchAllAccountsController;
    use App\Http\Controllers\AdminController;
    use Illuminate\Support\Facades\Route;

    Route::get('/', function () {
        return view('welcome');
    });
    

    Route::get('/dashboard', [FetchUsernameController::class, 'index'])
    ->middleware(['auth', 'verified']) // Added 'verified' to match standard Laravel auth
    ->name('dashboard');
    Route::get('/profiles', function () {
        return view('public-profiles.public-profiles');
    });
    Route::get('/profiles', [FetchUsernameController::class, 'index'])->name('profiles');
    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
            Route::get('/admin/admin_page', [AdminController::class, 'index'])->name('admin.admin_page');
    Route::post('/admin/admin_page/{id}/toggle', [AdminController::class, 'toggleAdmin'])->name('admin.toggle');
    });

    require __DIR__.'/auth.php';
