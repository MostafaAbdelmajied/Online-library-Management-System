@include('students.dashboard.head')
@include('students.dashboard.sidebar')
<div class="container-fluid page-body-wrapper">
    @include('students.dashboard.navbar')
    @yield('body')
    @include('students.dashboard.footer')
