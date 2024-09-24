<?php

namespace App\Http\Controllers\Admin;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\BorrowedBooks;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateBookRequest;

class BookController extends Controller
{
    public function borrowed(){
        $borrowedBooks = BorrowedBooks::with('student', 'book')->get();
        return view('admin.borrowedbooks', compact('borrowedBooks'));
    }
    public function index(){
        $books = Book::latest()->paginate(9);
        return view('admin.allbooks', compact('books'));
    }
    public function show($id){
        $book = Book::find($id);
        return view('admin.book', compact('book'));
    }
    public function edit($id){
        $book = Book::find($id);
        $categories = Category::all();
        return view('admin.editbook', compact('book', 'categories'));
    }
    public function update(UpdateBookRequest $request, $id){
        $data = $request->validated();
        // dd($data);
        $book = Book::find($id);
        if($request->hasFile('image')){
            $image = $request->file('image');
            Storage::delete('books/' . $book->image);
            $image = Storage::putFile('books', $image);
            $data['image'] = $image;
        }
        $book->update($data);

        return redirect()->route('admin.books')->with('success', 'Book updated successfully');
    }
    public function add(){
        $categories = Category::all();
        return view('admin.addbook', compact('categories'));
    }
    public function store(StoreBookRequest $request){
        $data = $request->validated();
        $image = $request->file('image');
        $image = Storage::putFile('books', $image);
        $data['image'] = $image;
        Book::create($data);
        return redirect()->route('admin.books')->with('success', 'Book added successfully');
    }

    public function delete($id){
        $book = Book::find($id);
        Storage::delete('books/' . $book->image);
        $book->delete();
        return redirect()->route('admin.books')->with('success', 'Book deleted successfully');
    }
}
