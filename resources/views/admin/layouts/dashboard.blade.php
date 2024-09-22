@include('dashboard.head')
@include('dashboard.sidebar')
<div class="container-fluid page-body-wrapper">
    @include('dashboard.navbar')
    @yield('body')
    @include('dashboard.footer')
