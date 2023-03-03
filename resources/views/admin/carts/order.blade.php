{{-- tat ca don hang --}}
@extends('admin.main')

@section('content')
<table class="table">
    <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th>Tên Khách Hàng</th>
            <th>Số Điện Thoại</th>
            <th>Email</th>
            <th>Ngày Đặt hàng</th>
            <th>Tình trạng</th>
            <th style="width: 100px">Tùy biến</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $key => $order)
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->name }}</td>
            <td>{{ $order->phone }}</td>
            <td>{{ $order->email }}</td>
            <td>{{ $order->created_at }}</td>
            <td>
                @if( $order->active == 1)
                    <p>Chờ xử lý</p>
                @elseif( $order->active == 2 )
                    <p>Đang được giao</p>
                @elseif( $order->active == 3 )
                    <p>Hoàn thành</p>
                @elseif( $order->active == 4 )
                    <p>Đã bị huỷ</p>
                @endif
            </td>
            <td>
                <a class="btn btn-primary btn-sm" href="/admin/order/{{$order->id}}">
                    <i class="fas fa-regular fa-eye"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="card-footer clearfix">

</div>
@endsection