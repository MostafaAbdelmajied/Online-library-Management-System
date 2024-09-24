<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\BorrowedBooks;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\BorrowBookRequest;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('category')->latest()->paginate(6);
        return view('students.site.books', compact('books'));
    }
    public function show($id)
    {
        $book = Book::find($id);
        return view('students.site.book', compact('book'));
    }
    public function borrow($id)
    {
        $book = Book::find($id);
        return view('students.site.borrow', compact('book'));
    }
    public function borrowConfirm(BorrowBookRequest $request, Book $book)
    {
        if($book->stock <= 0){
            return redirect()->route('book.show', $book->id)->with('error', 'Book is out of stock');
        }
        $book->increment('borrowed', 1);
        $student = Student::find(Auth::user()->id);
        $student->increment('borrowed_books', 1);
        $data = $request->validated();
        $data['book_id'] = $book->id;
        $data['student_id'] = Auth::user()->id;
        $data['due_date'] = Carbon::parse($data['borrowed_at'])->addDays(intval($data['borrowed_duration']))->toDateString();
        BorrowedBooks::create($data);

        return redirect()->route('book.show', $book->id)->with('success', 'Book borrowed successfully');
    }
    public function return($id)
    {
        $borrowedBook = BorrowedBooks::find($id);
        $borrowedBook->book->decrement('borrowed', 1);
        $student = Student::find(Auth::user()->id);
        $student->increment('returned_books', 1);
        $borrowedBook->update(['returned_at' => Carbon::now()]);
        return redirect()->route('student.books.borrows')->with('success', 'Book returned successfully');
    }
}
