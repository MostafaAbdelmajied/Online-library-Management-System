@extends('layouts.dashboard')
@section('body')
<div>

</div>
<div class="col-lg-10 grid-margin stretch-card" style="margin-top: 70px;">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Returned Books</h4>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>Book</th>
                <th>Borrowed Date</th>
                <th>Duration</th>
                <th>Due Date</th>
                <th>Returned Date</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($borrowedBooks as $borrowedBook)
              <tr>
                <td>{{ $borrowedBook->book->name }}</td>
                <td>{{ $borrowedBook->borrowed_at }}</td>
                <td>{{ $borrowedBook->borrowed_duration }}</td>
                <td>{{ $borrowedBook->due_date }}</td>
                <td>{{ $borrowedBook->returned_at }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
