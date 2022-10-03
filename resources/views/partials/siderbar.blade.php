<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ asset('adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light" href="">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php if (isset(auth()->user()->name)) {
                    echo auth()->user()->name;
                }?></a>
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
        @if (Auth::user()->role_id == 3)
        <!-- student -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('student.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Học viên
                            
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        @endif

        {{-- menu --}}
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{route('course.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Khóa học
                        </p>
                    </a>
                </li>
            </ul>
        </nav>

        {{-- product --}}
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('classroom.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Lớp học
                        </p>
                    </a>
                </li>
            </ul>
        </nav>

        {{-- Test --}}
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{route('testmanager.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Bài kiểm tra
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        {{-- Setting --}}
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{route('question.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Ngân hàng câu hỏi
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('logout') }}"
                        class="nav-link"
                        onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-th"></i>

                                {{ __('Đăng xuất') }}

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
