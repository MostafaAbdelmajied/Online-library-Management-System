@extends('admin.layouts.dashboard')
@section('body')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Borrowed Books</h4>
                    <div class="table-responsive">
                      <table class="table table-dark" id="dataTable" >
                        <thead>
                          <tr>
                            <th> Student Name </th>
                            <th> Book Name </th>
                            <th> Borrowed Date </th>
                            <th> Duration </th>
                            <th> Due Date </th>
                            <th> Returned Date </th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($borrowedBooks as $borrowedBook)
                          <tr>
                            <td> {{ $borrowedBook->student->name }} </td>
                            <td> {{ $borrowedBook->book->name }} </td>
                            <td> {{ $borrowedBook->borrowed_at }} </td>
                            <td> {{ $borrowedBook->borrowed_duration }} </td>
                            <td>{{$borrowedBook->due_date}}</td>
                            <td> {{ ($borrowedBook->returned_at == null) ? 'Not Returned Yet' : $borrowedBook->returned_at }} </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
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
    $(document).ready(function() {
        $('#dataTable').DataTable({
            "searching": true,
            "paging": true,
            "ordering": true,
            "info": true,
        });
    });

    $(document).ready(function() {
        $('label[for="dt-search-0"]').text('Search borrowed books by student name:');
    });

</script>
@endsection

