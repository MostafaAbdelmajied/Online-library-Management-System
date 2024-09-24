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

        <div class="col-md-12 grid-margin stretch-card">

            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">{{$category->name}}</h2>
                    <p class="card-description">
                        <h4>Name : {{$category->name}}</h4>
                        <h4>Books : {{count($category->books)}}</h4>
                    </p>

                    <div class="table-responsive">
                        <table class="table table-dark" id="dataTable" >
                          <thead>
                            <tr>
                              <th> ID </th>
                              <th> Name </th>
                              <th> Author </th>
                              <th>Description</th>
                              <th>Image</th>
                            </tr>
                          </thead>
                          <tbody>
                              @foreach ($category->books as $book)
                            <tr>
                              <td> <a href="{{route('admin.books.show',$book->id)}}" style="text-decoration: none; color :aliceblue;">{{ $book->id }}</a> </td>
                              <td> <a href="{{route('admin.books.show',$book->id)}}" style="text-decoration: none; color :aliceblue;">{{ $book->name }} </a> </td>
                              <td> <a href="{{route('admin.books.show',$book->id)}}" style="text-decoration: none; color :aliceblue;">{{ $book->author }} </a> </td>
                              <td> <a href="{{route('admin.books.show',$book->id)}}" style="text-decoration: none; color :aliceblue;">{{ substr($book->description,0,50) . '...' }} </a></td>
                              <td> <a href="{{route('admin.books.show',$book->id)}}" style="text-decoration: none; color :aliceblue;"> <img src="{{asset('storage/'. $book->image)}}" alt="" width="50px" height="50px" style="border-radius: 50%;"> </a></td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                      <div class="d-flex justify-content-center mt-5">
                        <a href="{{route('categories.edit', $category->id)}}" class="btn btn-primary mx-2">Edit</a>
                        <button class="btn btn-danger mx-2" form="delete-form">Delete</button>
                        <form method="POST" action="{{route('categories.destroy')}}" id="delete-form" hidden>
                            @method('DELETE')
                            @csrf
                        </form>
                    </div>

                </div>
            </div>
        </div>


        </div>
    </div>
</div>

@endsection
@section('script')
    <script>
    setTimeout(function(){
        document.getElementById('alert-success').style.display = 'none';
    },2000);
</script>
@endsection