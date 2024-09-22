@extends('layouts.dashboard')
@section('body')
<div>

</div>
<div class="col-lg-10 grid-margin stretch-card" style="margin-top: 70px;">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Borrowed Books</h4>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>Book</th>
                <th>Borrowed Date</th>
                <th>Duration</th>
                <th>Due Date</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($borrowedBooks as $borrowedBook)
              <tr>
                <td>{{ $borrowedBook->book->name }}</td>
                <td>{{ $borrowedBook->borrowed_at }}</td>
                <td>{{ $borrowedBook->borrowed_duration }}</td>
                <td>{{ $borrowedBook->due_date }}</td>
                @if($borrowedBook->returned_at == null)
                <td><label class="badge badge-danger">Pending</label></td>
                <td>
                    <a href="{{ route('book.return', $borrowedBook->id) }}" class="btn btn-primary">Return</a>
                  </td>
                @else
                <td><label class="badge badge-success">Returned</label></td>
                @endif
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
