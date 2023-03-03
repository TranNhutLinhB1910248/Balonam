{{-- trang dang nhap --}}
<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.head')
</head>

<body>
    <div class="container">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header text-center d-block">
                        <h2 class="modal-title">
                            Đăng nhập
                        </h2>
                    </div>
                    <div class="modal-body">
                        @include('admin.alert')
                        <form action="/admin/users/login/store" method="post">
                            <div class="form-group">
                                <label for="">Email:</label>
                                <input type="email" name="email" class="form-control" value="" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="">
                                    <b>Mật khẩu:</b>
                                </label>
                                <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                            <div class="row">
                                <div class="col">
                                    <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                                </div>
                                <br>
                                <div class="col">
                                    <a href="{{route('googleRedirect')}}" class="btn btn-primary btn-block">Login With Google</a>
                                </div>
                            </div>

                            <div class="icheck-primary">
                                <input type="checkbox" name="remember" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                            <a href="/" class="btn btn-danger mr-auto" data-dismiss="modal">
                                Hủy bỏ
                            </a>
                            <div class="form-group">
                                <div class="text-right">Bạn không phải là thành viên?
                                    <a href="/admin/users/register">Đăng kí</a>
                                </div>
                            </div>
                            
                            @csrf
                        </form>
                    </div>
            </div>
        </div>
    </div>
    @include('admin.footer')
</body>
</html>
