@section('sidebar')
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex" data-toggle="dropdown">
                <div class="image">
                    <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                </div>
            </div>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('admin.logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
    
                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
            {{-- <li class="nav-item menu-open"> --}}
            <li class="nav-item">
                {{-- <a href="/admin/home" class="nav-link active"> --}}
                <a href="{{ route('admin.home') }}" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    {{-- <i class="nav-icon fas fa-table"></i> --}}
                    <p>
                        Peminjaman
                        {{-- <i class="right fas fa-angle-left"></i> --}}
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.users') }}" class="nav-link">
                    <i class="nav-icon fas fa-edit"></i>
                    <p>
                        Anggota
                        {{-- <i class="fas fa-angle-left right"></i> --}}
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-book"></i>
                    <p>
                        Buku
                        {{-- <i class="fas fa-angle-left right"></i> --}}
                    </p>
                </a>
            </li>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
</aside>
@endsection