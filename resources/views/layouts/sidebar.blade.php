<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <div class="brand-link">
        <span class="brand-text font-weight-light">Aplikasi</span>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Nama Pengguna</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('matakuliah-list') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Mata Kuliah
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('polling-list') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Polling
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('polling_detail-list') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Polling Detail
                        </p>
                    </a>
                </li>
                @if(Auth::user()->role == 'admin')
                    <li class="nav-item">
                        <a href="{{ route('kurikulum-list') }}" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Kurikulum
                            </p>
                        </a>
                    </li>
                @endif
                @if(Auth::user()->role == 'admin')
                    <li class="nav-item">
                        <a href="{{ route('user-list') }}" class="nav-link">
                            <i class="nav-icon far fa-user"></i>
                            <p>
                                User
                            </p>
                        </a>
                    </li>
                @endif
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();this.closest('form').submit();">
                            <i class="nav-icon fa fa-sign-out"></i>Logout
                        </a>
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
