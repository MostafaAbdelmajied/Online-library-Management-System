@extends('layouts.site')

@section('content')
<br><br><br><br>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Borrow Book</h1> <hr>
        </div>
    </div>
  <div class="row">
    <!-- Book Details -->
    <div class="col-md-6">
      <div class="product-item">
        <a href="#"><img src="{{asset("storage/$book->image")}}" alt="not found" class="img-fluid"></a>
        <div class="down-content">
          <h4>{{$book->name}}</h4>
          <p>by : {{$book->author}}</p>
          <p>{{$book->description}}</p>
          <p>Category : {{$book->category->name}}</p>
          <p>Publisher : {{$book->publisher}}</p>
          <p>Publish Year : {{$book->publish_year}}</p>

        </div>
      </div>
    </div>

    <!-- Borrow Form -->
    @error('borrowed_at')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="col-md-6">
      <form action="{{route('book.borrow',$book->id)}}" method="post" class="border p-3 rounded">
          @csrf
          <div class="form-group">
              <label for="name">From</label>
              <input type="date" name="borrowed_at" class="form-control" value="{{date('Y-m-d')}}" required>
          </div>
          <div class="form-group">
              <label for="email">Duration</label>
              <input type="number" name="borrowed_duration" class="form-control" value="7" required>
          </div>

          <button type="submit" class="btn btn-success">Confirm</button>
      </form>
    </div>
  </div>
</div>

@endsection
