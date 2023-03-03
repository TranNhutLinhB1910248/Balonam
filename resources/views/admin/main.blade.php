{{-- trang chu admin --}}
<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.head')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>

            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="dropdown-item" href="/logout">Đăng xuất
                    </a>
                </li>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                            <i class="fas fa-expand-arrows-alt"></i>
                        </a>
                    </li>

                </ul>
        </nav>
        @include('admin.sidebar')
        <div class="content-wrapper">

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    @include('admin.alert')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary mt-3">
                                <div class="card-header">
                                    <h3 class="card-title">{{ $title }}</h3>
                                </div>

                                @yield('content')
                            </div>
                        </div>
                        <div class="col-md-6">
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
            </div>
        </footer>


    </div>
    <!-- ./wrapper -->

    @include('admin.footer')
</body>

</html>
