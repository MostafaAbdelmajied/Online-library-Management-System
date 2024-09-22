@extends('layouts.site')
@section('banner')
<div class="page-heading products-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="text-content">
            <h4>new arrivals</h4>
            <h2>sixteen products</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('content')
<div class="products">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="filters">
            <ul>
                <li class="active" data-filter="*">All Books</li>
            </ul>
          </div>
        </div>
        <div class="col-md-12">
          <div class="filters-content">
              <div class="row grid">
                @foreach ($books as $book)
                  <div class="col-lg-4 col-md-4 all des">
                    <div class="product-item">
                      <a href="#"><img src="{{asset('storage/'.$book->image)}}" alt=""></a>
                      <div class="down-content">
                        <a href="{{route('book.show', $book->id)}}"><h4>{{$book->name}}</h4></a>
                        {{-- <h6>Author: {{$book->author}}</h6><br> --}}
                        {{-- <h6>Category: {{$book->category->name}}</h6><br> --}}
                        <p>{{substr($book->description,0,100)}}</p>
                        <p>Author: {{$book->author}}</p>
                        <p>Category: {{$book->category->name}}</p>
                        <a href="{{"/books/" . $book->id}}" class="btn btn-outline-primary">Read More</a>
                        <a href="{{route('book.borrow', $book->id)}}" class="btn btn-outline-success">Borrow</a>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
          </div>
        </div>
        {{$books->links()}}
      </div>
    </div>
  </div>
@endsection