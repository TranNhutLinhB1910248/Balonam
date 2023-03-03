{{-- danh sach nhan vien va khach hang --}}
@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">ID</th>
                <th>Tên nhân viên</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
                <th>Email</th>
                <th>Loại</th>
                <th>Update</th>
                <th style="width: 100px">Tùy biến</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $key => $user) 
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->address }}</td>
                <td>{{ $user->email }}</td>
                <td> @if ($user->type == 0) 
                        <p>Quản trị</p>
                        @elseif ($user->type == 1)
                        <p>Người dùng</p>
                    @endif
                </td>
                <td>{{ $user->updated_at }}</td>
                <td>
                    <a href="#" class="btn btn-danger btn-sm" onclick="removeRow({{ $user->id }},'/admin/users/destroy')">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="card-footer clearfix">
    {!! $users->links() !!}
    </div>
@endsection

