@extends('admin.layouts.dashboard')
@section('body')

<div class="main-panel">
    <div class="content-wrapper">

            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Edit Book</h4>
                    <p class="card-description"> Edit Book </p>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form class="" method="POST" action="{{route('admin.books.update', $book->id)}}" enctype="multipart/form-data" id="myform">
                        @csrf
                        @method('PATCH')
                      <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" name="name" value="{{$book->name}}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Author</label>
                        <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Author" name="author" value="{{$book->author}}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Publisher</label>
                        <input type="text" class="form-control" id="exampleInputPassword4" placeholder="Publisher" name="publisher" value="{{$book->publisher}}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Publication Year</label>
                        <input type="text" class="form-control" id="exampleInputPassword4" placeholder="Publication Year" name="publication_year" value="{{$book->publication_year}}">
                      </div>

                      <div class="form-group">
                        <label for="exampleSelectGender">Category</label>
                        <select class="form-control" id="exampleSelectGender" name="category_id">
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}" {{ $book->category_id == $category->id ? 'selected' : '' }}>{{$category->name}}</option>
                            @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Upload Image</label>
                        <input type="file" name="image" class="">
                        <div class="input-group col-xs-12">
                          <img src="{{asset('storage/'.$book->image)}}" alt="" style="width: 100px; height:100px;">
                          {{-- <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image"> --}}
                          {{-- <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                          </span> --}}
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputCity1">Stock</label>
                        <input type="number" class="form-control" id="exampleInputCity1" placeholder="Stock" name="stock" value="{{$book->stock}}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputCity1">Borrowed</label>
                        <input type="number" class="form-control" id="exampleInputCity1" placeholder="Borrowed" name="borrowed" value="{{$book->borrowed}}">
                      </div>
                      <div class="form-group">
                        <label for="exampleTextarea1">Description</label>
                        <textarea class="form-control" id="exampleTextarea1" rows="6" name="description">{{$book->description}}</textarea>
                      </div>
                      <button type="submit" class="btn btn-primary me-2" id="submit_button">Submit</button>
                      <a href="/books" class="btn btn-dark">Cancel</a>
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
    document.addEventListener('DOMContentLoaded', function() {
        let form = document.getElementById('myform');
        document.getElementById('submit_button').addEventListener('click', function(e){
            e.preventDefault();
            form.submit();
        });
    });
</script>

@endsection