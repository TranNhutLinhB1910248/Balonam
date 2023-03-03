{{-- {{dd($menus)}} --}}
<!-- Header -->
<header>
    @php $menusHtml = \App\Helpers\Helper::menus($menus); @endphp
    <!-- Header desktop -->
    <div class="container-menu-desktop">
        <div class="wrap-menu-desktop">
            <nav class="limiter-menu-desktop container">

                <!-- Logo desktop -->
                <a href="#" class="logo">
                    <div id="logo" class="flex-col logo">
                        <a href="https://balooutlet.com/" title="BaloOutlet" rel="home">
                            <img src="/template/images/icons/logo-2.png" width="215" height="60"
                                class="header_logo header-logo" alt="BaloOutlet">
                        </a>
                    </div>
                </a>

                <!-- Menu desktop -->
                <div class="menu-desktop">
                    <ul class="main-menu" style="color: black; font-weight: bold">
                        <li class="active-menu">
                            <b><a href="/">Trang chủ</a></b>
                        </li>

                        {!! $menusHtml !!}

                        <li>
                            <a href="/about">Giới thiệu</a>
                        </li>

                        <li>
                            <a href="/contact">Liên hệ</a>
                        </li>
                    </ul>
                </div>

                <!-- Icon header -->
                <div class="wrap-icon-header flex-w flex-r-m">
                    <form class="form-inline" action="/search" method="POST">
                        @csrf
                        <input class="form-control mr-sm-2" type="text" placeholder="Tìm kiếm..."
                            name="keywords_submit" value="">
                        <button class="icon-header-item cl2 hov-cl1 trans-04 p-r-1 js-show-modal-search" type="submit" > <i class="zmdi zmdi-search"></i>
                        </button>
                    </form>
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart"
                        data-notify="{{ !is_null(\Illuminate\Support\Facades\Session::get('carts')) ? count(\Illuminate\Support\Facades\Session::get('carts')) : 0 }}">
                        <i class="zmdi zmdi-shopping-cart"></i>
                    </div>
                    <div class="">          
                        <i class="zmdi zmdi-account icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11" data-toggle="dropdown"></i>
                        <div class="dropdown-menu">
                            @if (Auth::check())
                                <a class="dropdown-item" href="">{{ Auth::user()->name }}</a>
                                <a class="dropdown-item" href="/purchase_order/{{Auth::user()->id}}">Đơn hàng</a>
                                <a class="dropdown-item" href="/logout"><i class="fa-sharp fa-solid fa-right-from-bracket"></i>Đăng xuất</a>
                            @else
                                <a class="dropdown-item" href="/admin/users/login" style="font-weight: bold;">Đăng nhập</a>
                                <a class="dropdown-item" href="/admin/users/register" style="font-weight: bold;">Đăng kí</a>
                            @endif        
                        </div>     
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <!-- Header Mobile -->
    <div class="wrap-header-mobile">
        <!-- Logo moblie -->
        <div class="logo-mobile">
            <a href="#" class="logo">
                <div id="logo" class="flex-col logo">
                    <a href="https://balooutlet.com/" title="BaloOutlet" rel="home">
                        <img src="/template/images/icons/logo-2.png" width="115" height="60"
                            class="header_logo header-logo" alt="BaloOutlet">
                    </a>
                </div>
            </a>
        </div>

        <!-- Icon header -->
        <div class="wrap-icon-header flex-w flex-r-m m-r-15">
            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
                <i class="zmdi zmdi-search"></i>
            </div>

            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart"
                data-notify="{{ !is_null(\Illuminate\Support\Facades\Session::get('carts')) ? count(\Illuminate\Support\Facades\Session::get('carts')) : 0 }}">
                <i class="zmdi zmdi-shopping-cart"></i>
            </div>



        </div>

        <!-- Button show menu -->
        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </div>
    </div>


    <!-- Menu Mobile -->
    <div class="menu-mobile">

        <ul class="main-menu-m">
            <li class="active-menu">
                <a href="/">Trang chủ</a>
                {!! $menusHtml !!}
            <li>
                <a href="#">Giới thiệu</a>
            </li>

            <li>
                <a href="#">Liên hệ</a>
            </li>
        </ul>
    </div>
</header>

