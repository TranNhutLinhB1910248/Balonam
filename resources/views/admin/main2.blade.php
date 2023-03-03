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
                <div class="sidebar" style="margin-left: 500px">
                    <form action="{{ url('admin/menus/search')}}" method="GET" class="form-inline pl-3 pt-3" >
                        <div class="form-group" style="width: 400px ; text-align: right" >
                            <input class="form-control form-control-sidebar" name="search" type="search" placeholder="Search" aria-lable="Search" value="" style="width: 400px">
                        </div>
                        <button type="submit" class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                        </button>
                    </form> 
                </div>

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
