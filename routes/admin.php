<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Admin\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Admin\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Admin\Auth\NewPasswordController;
use App\Http\Controllers\Admin\Auth\PasswordController;
use App\Http\Controllers\Admin\Auth\PasswordResetLinkController;
use App\Http\Controllers\Admin\Auth\RegisteredUserController as AdminRegisteredUserController;
use App\Http\Controllers\Admin\Auth\VerifyEmailController;
use App\Http\Controllers\Admin\BookController as AdminBookController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\AuthenticatedSessionController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\ProfileController;

Route::middleware('is_admin')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', [AdminHomeController::class, 'index'])
            ->name('admin.index');
        Route::get('/students/{id}', [StudentController::class, 'index'])
            ->name('admin.student');
        Route::get('/books', [AdminBookController::class, 'index'])
            ->name('admin.books');
        Route::get('/books/borrowed', [AdminBookController::class, 'borrowed'])
            ->name('admin.books.borrowed');
        Route::get('/books/add', [AdminBookController::class, 'add'])
            ->name('admin.books.add');
        Route::post('/books/add', [AdminBookController::class, 'store'])
            ->name('admin.books.store');

        Route::get('/books/edit/{id}', [AdminBookController::class, 'edit'])
            ->name('admin.books.edit');

        Route::patch('/books/edit/{id}', [AdminBookController::class, 'update'])
            ->name('admin.books.update');
        Route::get('/books/delete/{id}', [AdminBookController::class, 'delete'])
            ->name('admin.books.delete');
        Route::delete('/books/delete/{id}', [AdminBookController::class, 'destroy'])
            ->name('admin.books.destroy');
        Route::get('/books/show/{id}', [AdminBookController::class, 'show'])
            ->name('admin.books.show');

        // categories
        Route::resource('categories',CategoryController::class)->middleware('is_admin');

    });
});


// Route::middleware('guest:admin')->group(function () {
//     Route::prefix('admin')->group(function () {
//     Route::get('login', [AuthenticatedSessionController::class, 'create'])
//                 ->name('admin.login');
//     Route::post('login', [AuthenticatedSessionController::class, 'store'])
//                 ->name('admin.login.store');

//     });
// });

Route::middleware('guest:admin')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('register', [AdminRegisteredUserController::class, 'create'])
            ->name('admin.register');

        Route::post('register', [AdminRegisteredUserController::class, 'store']);

        Route::get('login', [AuthenticatedSessionController::class, 'create'])
            ->name('admin.login');

        Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('admin.login.store');

        Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
            ->name('admin.password.request');

        Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
            ->name('admin.password.email');

        Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
            ->name('admin.password.reset');

        Route::post('reset-password', [NewPasswordController::class, 'store'])
            ->name('admin.password.store');
    });
});

Route::middleware('auth:admin')->group(function () {
    Route::prefix('admin')->group(function () {

        Route::get('verify-email', EmailVerificationPromptController::class)
            ->name('admin.verification.notice');

        Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
            ->middleware(['signed', 'throttle:6,1'])
            ->name('admin.verification.verify');

        Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
            ->middleware('throttle:6,1')
            ->name('admin.verification.send');

        Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
            ->name('admin.password.confirm');

        Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

        Route::put('password', [PasswordController::class, 'update'])->name('admin.password.update');

        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
            ->name('admin.logout');

            Route::get('/profile', [ProfileController::class, 'edit'])->name('admin.profile.edit');
            Route::patch('/profile', [ProfileController::class, 'update'])->name('admin.profile.update');
            Route::delete('/profile', [ProfileController::class, 'destroy'])->name('admin.profile.destroy');
    });
});
