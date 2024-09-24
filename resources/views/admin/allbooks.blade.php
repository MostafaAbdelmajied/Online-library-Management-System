@extends('admin.layouts.dashboard')
@section('body')


<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            @if (session('success'))
                    <div class="alert alert-success" id="alert-success">
                        {{session('success')}}
                    </div>
                @endif
    @foreach ($books as $book)
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <a href="{{route('admin.books.show', $book->id)}}"><img src="{{asset('storage/'.$book->image)}}" alt="{{$book->name}}" class="img-fluid" style="height: 200px; width: 100%; "></a>
                    <a href="{{route('admin.books.show', $book->id)}}" style="text-decoration: none;"><h2 class="card-title">{{$book->name}}</h2></a>
                    <p class="card-description">
                        <h4>Name : {{$book->name}}</h4>
                        <h4>Author : {{$book->author}}</h4>
                        <h4>Category : {{$book->category->name}}</h4>
                        <h4>Publisher : {{$book->publisher}}</h4>
                    </p>
                    <div class="d-flex justify-content-center">
                        <a href="{{route('admin.books.edit', $book->id)}}" class="btn btn-primary mx-2">Edit</a>
                        <a href="{{route('admin.books.delete', $book->id)}}" class="btn btn-danger mx-2">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div class="d-flex justify-content-center">
        {{$books->links()}}
    </div>
        </div>
    </div>
</div>

@endsection

@section('script')
    <script>
        setTimeout(() => {
            document.getElementById('alert-success').style.display = 'none';
        }, 2000);
    </script>

@endsection