<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BorrowedBooksController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('student/dashboard', function () {
    $borrowedBooks = Auth::user()->borrowedBooks;
    return view('students.dashboard.home', compact('borrowedBooks'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/books', [BookController::class, 'index'])->name('books');

Route::middleware('auth')->group(function () {
    Route::get('/books/{id}', [BookController::class, 'show'])->name('book.show');
    Route::get('/books/borrow/{id}', [BookController::class, 'borrow'])->name('book.borrow');
    Route::get('/books/return/{id}', [BookController::class, 'return'])->name('book.return');
    Route::post('/books/borrow/{book}', [BookController::class, 'borrowConfirm'])->name('book.borrow.post');
    Route::get('borrows',[BorrowedBooksController::class, 'index'])->name('student.books.borrows');
    Route::get('returns',[BorrowedBooksController::class, 'returns'])->name('student.books.returns');

});