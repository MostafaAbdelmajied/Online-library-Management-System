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
      </div>
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Categories</h4>
            <div class="table-responsive">
              <table class="table table-dark" id="dataTable" >
                <thead>
                  <tr>
                    <th> ID </th>
                    <th> Name </th>
                    <th> Books </th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                  <tr>
                    <td> {{ $category->id }} </td>
                    <td> {{$category->name}} </td>
                    <td> {{ count($category->books) }} </td>
                    <td>
                        <a class="btn btn-info mx-2" href="{{route('categories.show',$category->id)}}"> Show </a>
                        <a class="btn btn-primary mx-2" href="{{route('categories.edit', $category->id)}}"> Edit </a>
                        <button class="btn btn-danger mx-2" form="delete-form{{$category->id}}"> Delete </button>
                        <form method="POST" action="{{route('categories.destroy',$category->id)}}" id="delete-form{{$category->id}}" hidden>
                            @method('DELETE')
                            @csrf
                        </form>
                    </td>

                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <!-- partial -->
  </div>
@endsection
@section('script')
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            "searching": true,
            "paging": true,
            "ordering": true,
            "info": true,
        });
    });

    $(document).ready(function() {
        $('label[for="dt-search-0"]').text('Search Categories');
    });

    setTimeout(function(){
        document.getElementById('alert-success').style.display = 'none';
    },2000);
</script>
@endsection
