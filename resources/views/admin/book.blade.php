@extends('admin.layouts.dashboard')
@section('body')


<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">

        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <img src="{{asset('storage/'.$book->image)}}" alt="{{$book->name}}" class="img-fluid" style="height: 600px; width: 60%; margin-left: auto; margin-right: auto; display: block;">
                    <h2 class="card-title">{{$book->name}}</h2>
                    <p class="card-description">
                        <h4>Name : {{$book->name}}</h4>
                        <p>Description : {{$book->description}}</p>
                        <h4>Author : {{$book->author}}</h4>
                        <h4>Category : {{$book->category->name}}</h4>
                        <h4>Publisher : {{$book->publisher}}</h4>
                        <h4>Publication Year : {{$book->publication_year}}</h4>
                        {{-- <h4>Price : {{$book->price}}</h4> --}}
                        <h4>Stock : {{$book->stock}}</h4>
                        <h4>Borrowed : {{$book->borrowed}}</h4>
                    </p>
                    <div class="d-flex justify-content-center">
                        <a href="{{route('admin.books.edit', $book->id)}}" class="btn btn-primary mx-2">Edit</a>
                        <a href="{{route('admin.books.delete', $book->id)}}" class="btn btn-danger mx-2">Delete</a>
                    </div>
                </div>
            </div>
        </div>


        </div>
    </div>
</div>

@endsection