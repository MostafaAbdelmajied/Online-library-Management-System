@extends('admin.layouts.dashboard')
@section('body')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Edit Book</h4>
                    <p class="card-description"> Edit Book </p>
                    <form class="forms-sample" method="POST" action="{{route('admin.books.store')}}" enctype="multipart/form-data">
                        @csrf
                      <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" name="name">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Author</label>
                        <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email" name="author">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Publisher</label>
                        <input type="text" class="form-control" id="exampleInputPassword4" placeholder="Publisher" name="publisher">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Publication Year</label>
                        <input type="text" class="form-control" id="exampleInputPassword4" placeholder="Publication Year" name="publication_year">
                      </div>

                      <div class="form-group">
                        <label for="exampleSelectGender">Category</label>
                        <select class="form-control" id="exampleSelectGender" name="category_id">
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label>File upload</label>
                        <input type="file" name="image" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                          </span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputCity1">Stock</label>
                        <input type="number" class="form-control" id="exampleInputCity1" placeholder="Stock" name="stock">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputCity1">Borrowed</label>
                        <input type="number" class="form-control" id="exampleInputCity1" placeholder="Borrowed" name="borrowed">
                      </div>
                      <div class="form-group">
                        <label for="exampleTextarea1">Description</label>
                        <textarea class="form-control" id="exampleTextarea1" rows="6" name="description"></textarea>
                      </div>
                      <button type="submit" class="btn btn-primary me-2">Submit</button>
                      <button class="btn btn-dark">Cancel</button>
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
