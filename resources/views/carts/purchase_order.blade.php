{{-- lich su don hang --}}
@extends('home')

@section('content')

<div class="container" style=" margin-top:100px">
    <section class="content-header">
        <h1 style="text-align: center; font-weight: bold; color:black;">
            ĐƠN HÀNG CỦA BẠN
        </h1>
        <br>
    </section>
    <table class="table" style="color: black; ">
        <thead>
            <tr class="table_head" style="background-color: skyblue ">
                <th>Mã đơn hàng</th>
                <th>Số Điện Thoại</th>
                <th>Tổng tiền</th>
                <th>Email</th>
                <th>Tình trạng</th>
                <th>Ngày Đặt hàng</th>
                <th style="width: 100px">Tùy biến</th>
            </tr>
        </thead>
        <tbody>
            @foreach($get_cart as $key => $cart)
            <tr>
                <td>{{ $cart->id }}</td>
                <td>{{ $cart->phone }}</td>
                <td>{{ number_format($cart->total) }}VNĐ</td>
                <td>{{ $cart->email }}</td>
                <td>
                    @if( $cart->active == 1)
                    <p>Chờ xử lý</p>
                    @elseif( $cart->active == 2 )
                    <p>Đang được giao</p>
                    @elseif( $cart->active == 3 )
                    <p>Hoàn thành</p>
                    @elseif( $cart->active == 4 )
                    <p>Đã bị huỷ</p>
                    @endif
                </td>
                <td>{{ $cart->created_at }}</td>

                <td>
                    <a class="btn btn-info" href="/purchase_order/orderdetail/{{$cart->id}}">
                        <i class="zmdi zmdi-eye"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection