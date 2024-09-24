<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href="#" style="font-size: 25px; font-weight: bold; color: #f1eff3; text-decoration: none;">E Library</a>
      {{-- <a class="sidebar-brand brand-logo-mini" href="{{asset('dashboard/index.html')}}"><img src="{{asset('dashboard/assets/images/logo-mini.svg')}}" alt="logo" /></a> --}}
    </div>
    <ul class="nav">

      <li class="nav-item nav-category">
        <span class="nav-link">Navigation</span>
      </li>
      {{-- @dd(request()->is('admin/books*') ) --}}
      <li class="nav-item menu-items {{ request()->is('admin') || request()->is('admin/students*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.index')}}">
          <span class="menu-icon">
            <i class="mdi mdi-speedometer"></i>
          </span>
          <span class="menu-title">Students</span>
        </a>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <span class="menu-icon">
            <i class="mdi mdi-laptop"></i>
          </span>
          <span class="menu-title">Books</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{route('admin.books')}}">All Books</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{route('admin.books.borrowed')}}">Borrowed Books</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{route('admin.books.add')}}">Add Book</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <span class="menu-icon">
            <i class="mdi mdi-laptop"></i>
          </span>
          <span class="menu-title">Categories</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{route('categories.index')}}">All Categories</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{route('categories.create')}}">Add Category</a></li>
          </ul>
        </div>
      </li>
    </ul>
  </nav>
