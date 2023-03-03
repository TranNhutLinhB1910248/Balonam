{{-- trang dang ki --}}
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
                            Đăng kí
                        </h2>
                    </div>
                    <div class="modal-body">
                        @include('admin.alert')
                        <form action="/admin/users/register/store" method="post">
                            <div class="form-group">
                                <label for="">
                                    <b>Tên người dùng:</b>
                                </label>
                                <input type="text" class="form-control" id="" placeholder="Nhập tên" name="name">
                            </div>
                            <div class="form-group">
                                <label for="">
                                    <b>Điện thoại:</b>
                                </label>
                                <input type="text" class="form-control" id="" placeholder="Nhập số điện thoại" name="phone">
                            </div>
                            <div class="form-group">
                                <label for="">
                                    <b>Địa chỉ:</b>
                                </label>
                                <input type="text" class="form-control" id="" placeholder="Nhập địa chỉ" name="address">
                            </div>
                            <div class="form-group">
                                <label for="">Email:</label>
                                <input type="email" name="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="">
                                    <b>Mật khẩu:</b>
                                </label>
                                <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="">Nhập lại mật khẩu:</label>
                                <input type="password" name="re_password" class="form-control" id="" placeholder="Nhập lại mật khẩu">
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block">Register</button>
                            </div>
                            <br>
                            <a href="/" class="btn btn-danger mr-auto" data-dismiss="modal">
                                Hủy bỏ
                            </a>
                            <div class="form-group">
                                <div class="text-right">Bạn là thành viên?
                                    <a href="/admin/users/login">Đăng nhập</a>
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
