{{-- them nhan su --}}
@extends('admin.main')

@section('head')
    <script src="/public/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
<form action="" method="POST" >
    <div class="card-body">
        <div class="form-group">
          <label for="user">Tên nhân viên</label>
          <input type="text" name="name" class="form-control" placeholder="Nhập tên nhân viên">
        </div>

        <div class="form-group">
          <label for="phone">Số điện thoại</label>
          <input type="text" name="phone" class="form-control" placeholder="Nhập số điện thoại">
        </div>

        <div class="form-group">
          <label for="address">Địa chỉ</label>
          <input type="text" name="address" class="form-control" placeholder="Nhập địa chỉ">
        </div>

        <div class="form-group">
          <label for="email">Email</label>
          <input type="text" name="email" class="form-control" placeholder="Nhập email">
        </div>

        <div class="form-group">
          <label for="password">Mật khẩu</label>
          <input type="text" name="password" class="form-control" placeholder="Nhập password">
        </div>

        <div class="form-group">
          <label>Loại</label>
          <select class="form-control" name="type">
              <option value="0">Quản trị</option>        
          </select>
        </div>
      </div>

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Thêm nhân viên</button>
    </div>
    @csrf
  </form>
@endsection

@section('footer')
  <script>
    CKEDITOR.replace('content');
  </script>
@endsection