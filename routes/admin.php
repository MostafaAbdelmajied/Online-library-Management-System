<?php

use App\Http\Controllers\Admin\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest:admin')->group(function () {
    Route::prefix('admin')->group(function () {
    Route::get('/', [AuthenticatedSessionController::class, 'index'])
                ->name('admin.index');
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('admin.login');
    Route::post('login', [AuthenticatedSessionController::class, 'store'])
                ->name('admin.login.store');

    });
});