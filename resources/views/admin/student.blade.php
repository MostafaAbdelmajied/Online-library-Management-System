@extends('admin.layouts.dashboard')
@section('body')
<div class="main-panel">
    <div class="content-wrapper">
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Student Details</h2>
                <p class="card-description">
                    <h4>Name : {{$student->name}}</h4>
                    <h4>Email : {{$student->email}}</h4>
                    <h4>Joining Date : {{$student->created_at->format('d-m-Y')}}</h4>
                    <h4>Borrowed Books : {{$studentBorrowedBooks->count()}}</h4>
                </p>
            </div>
        </div>
        </div>
    </div>
    <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
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
                  </tr>
                </thead>
                <tbody>
                  @foreach ($studentBorrowedBooks as $borrowedBook)
                  <tr>
                    <td>{{ $borrowedBook->book->name }}</td>
                    <td>{{ $borrowedBook->borrowed_at }}</td>
                    <td>{{ $borrowedBook->borrowed_duration }}</td>
                    <td>{{ $borrowedBook->due_date }}</td>
                    @if($borrowedBook->returned_at == null)
                    <td><label class="badge badge-danger">Pending</label></td>
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
    </div>
    </div>
</div>
@endsection
