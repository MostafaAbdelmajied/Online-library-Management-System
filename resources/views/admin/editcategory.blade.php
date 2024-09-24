@extends('admin.layouts.dashboard')
@section('body')

<div class="main-panel">
    <div class="content-wrapper">

            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Edit Category</h4>
                    <p class="card-description"> Edit Category </p>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form class="" method="POST" action="{{route('categories.update', $category->id)}}" id="myform">
                        @csrf
                        @method('PATCH')
                      <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" name="name" value="{{$category->name}}">
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