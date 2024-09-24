@include('admin.dashboard.head')
@include('admin.dashboard.sidebar')
<div class="container-fluid page-body-wrapper">
    @include('admin.dashboard.navbar')
    @yield('body')
    @include('admin.dashboard.footer')
    @yield('script')
