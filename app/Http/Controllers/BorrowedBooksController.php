<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BorrowedBooksController extends Controller
{
    public function index()
    {
        $borrowedBooks = Auth::user()->borrowedBooks;
        return view('students.dashboard.home', compact('borrowedBooks'));
    }

    public function returns()
    {
        $borrowedBooks = Auth::user()->borrowedBooks->where('returned_at', '!=', null);
        return view('students.dashboard.returns', compact('borrowedBooks'));
    }
}
