<?php

namespace App\Http\Controllers\Admin;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    public function index($id)
    {
        $student = Student::find($id);
        $studentBorrowedBooks = $student->borrowedBooks;
        // dd($studentBorrowedBooks);
        return view('admin.student', compact('student','studentBorrowedBooks'));
    }
}
