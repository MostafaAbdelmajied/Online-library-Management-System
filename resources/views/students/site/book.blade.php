@extends('layouts.site')

@section('content')
<br><br><br><br>
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="col-md-9">
    <div class="product-item">
        <div class="col-md-6">
      <a href="#"><img  src="{{asset("storage/$book->image")}}" alt="not found" width="300px" height="400px"></a>
        </div>
      <div class="down-content">
        <h4>{{$book->name}}</h4>
        <p>by : {{$book->author}}</p>
        <p>{{$book->description}}</p>
        <p>Category : {{$book->category->name}}</p>
        <p>Publisher : {{$book->publisher}}</p>
        <p>Publish Year : {{$book->publish_year}}</p>
        <div class="d-flex justify-content-center">
            <a href="{{route('book.borrow',$book->id)}}" class="btn btn-primary">Borrow</a>
        </div>
      </div>
    </div>
  </div>
@endsection
