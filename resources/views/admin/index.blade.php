@extends('admin.layouts.dashboard')
@section('body')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
      </div>
      <div class="row">
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-9">
                  <div class="d-flex align-items-center align-self-start">
                    <h3 class="mb-0">$12.34</h3>
                    <p class="text-success ms-2 mb-0 font-weight-medium">+3.5%</p>
                  </div>
                </div>
                <div class="col-3">
                  <div class="icon icon-box-success ">
                    <span class="mdi mdi-arrow-top-right icon-item"></span>
                  </div>
                </div>
              </div>
              <h6 class="text-muted font-weight-normal">Potential growth</h6>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-9">
                  <div class="d-flex align-items-center align-self-start">
                    <h3 class="mb-0">$17.34</h3>
                    <p class="text-success ms-2 mb-0 font-weight-medium">+11%</p>
                  </div>
                </div>
                <div class="col-3">
                  <div class="icon icon-box-success">
                    <span class="mdi mdi-arrow-top-right icon-item"></span>
                  </div>
                </div>
              </div>
              <h6 class="text-muted font-weight-normal">Revenue current</h6>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-9">
                  <div class="d-flex align-items-center align-self-start">
                    <h3 class="mb-0">$12.34</h3>
                    <p class="text-danger ms-2 mb-0 font-weight-medium">-2.4%</p>
                  </div>
                </div>
                <div class="col-3">
                  <div class="icon icon-box-danger">
                    <span class="mdi mdi-arrow-bottom-left icon-item"></span>
                  </div>
                </div>
              </div>
              <h6 class="text-muted font-weight-normal">Daily Income</h6>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-9">
                  <div class="d-flex align-items-center align-self-start">
                    <h3 class="mb-0">$31.53</h3>
                    <p class="text-success ms-2 mb-0 font-weight-medium">+3.5%</p>
                  </div>
                </div>
                <div class="col-3">
                  <div class="icon icon-box-success ">
                    <span class="mdi mdi-arrow-top-right icon-item"></span>
                  </div>
                </div>
              </div>
              <h6 class="text-muted font-weight-normal">Expense current</h6>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Students</h4>
            <div class="table-responsive">
              <table class="table table-dark" id="dataTable" >
                <thead>
                  <tr>
                    <th> ID </th>
                    <th> Name </th>
                    <th> Email </th>
                    <th> Joining Date </th>
                    <th> Borrowed Books </th>
                    <th>Returned Books</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                  <tr>
                    <td> {{ $student->id }} </td>
                    <td> <a href="{{route('admin.student',$student->id)}}" style="text-decoration: none; color: white;">{{ $student->name }} </a> </td>
                    <td> {{ $student->email }} </td>
                    <td> {{ $student->created_at->format('d-m-Y') }} </td>
                    <td> {{ $student->borrowed_books }} </td>
                    <td> {{ $student->returned_books }} </td>
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
        $('label[for="dt-search-0"]').text('Search students by id:');
    });

</script>
@endsection
