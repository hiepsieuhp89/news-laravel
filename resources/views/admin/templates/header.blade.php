<div class="wrapper">
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="{{ route('home') }}" class="nav-link">VnPoint</a>
                    </li>
                </ul>
                
            </nav>
            <!-- /.navbar -->
            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="{{ route('admin.home') }}" class="brand-link">
                <img src="AdminLTE-3.0.5/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">Trang quản trị</span>
                </a>
                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="AdminLTE-3.0.5/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info">
                            <a href="{{ route('admin.home') }}" class="d-block">{{ Auth::guard('staff')->user()->name }}</a>
                        </div>
                    </div>
                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
                                with font-awesome or any other icon font library -->
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon far fa-plus-square"></i>
                                    <p>
                                        Cơ sở dữ liệu
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.CSDL') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Tất cả</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="AdminLTE-3.0.5/pages/examples/login.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Tin tức</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="AdminLTE-3.0.5/pages/examples/login.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Người dùng</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="AdminLTE-3.0.5/pages/examples/login.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Nguồn</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="AdminLTE-3.0.5/pages/examples/login.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Tác giả</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="AdminLTE-3.0.5/pages/examples/login.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Nhân viên</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
                 </aside>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-dark">@yield('title')</h1>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Trang chủ</a></li>
                                    <li class="breadcrumb-item active">@yield('title')</li>
                                </ol>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->
                <!-- Main content -->