{{-- chi tiet don hang --}}
@extends('home')
@section('content')
<div class="container" style="margin-top: 80px">
    <section class="content-header">
        <h1 style="text-align: center; font-weight: bold; color:black;">
            THÔNG TIN ĐƠN HÀNG
        </h1>
        <br>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-12">
                            <h5 class="text-left" style="color: black">Thông tin khách hàng:</h5><br>
                            <table class="table table-bordered" style="">
                                <thead>
                                    <tr role="row" style="background-color: skyblue; color: black">
                                        {{-- <th>STT</th> --}}
                                        <th>Tên khách hàng</th>
                                        <th>Số điện thoại</th>
                                        <th>Địa chỉ</th>
                                        <th>Email</th>
                                        <th>Thời gian đặt hàng</th>
                                </thead>
                                <tbody>
                                    {{-- @foreach($customer as $key => $customers) --}}
                                    <tr>
                                        {{-- <td>{{ $key+1 }}</td> --}}
                                        <td>{{ $customer->name }}</td>
                                        <td>
                                            {{ $customer->phone }}
                                        </td>
                                        <td>{{ $customer->address }}</td>
                                        <td>{{ $customer->email }}</td>
                                        <td>{{ $customer->created_at }}</td>
                                    </tr>
                                    {{-- @endforeach --}}
                                   
                                </tbody>
                            </table>
                        </div>
                        <br>
                        <hr>
                        <div class="col-md-12">
                            <h5 class="text-left" style="color: black">Thông tin sản phẩm:</h5><br>
                            <table class="table table-bordered" style="color: black">
                                <thead>
                                    <tr role="row" style="background-color: skyblue">
                                        <th>STT</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Hình ảnh</th>
                                        <th>Số lượng</th>
                                        <th>Giá tiền</th>
                                </thead>
                                <tbody>
                                    @foreach($cart as $key => $detail_cart)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $detail_cart-> name }}</td>
                                        <td>
                                            <a>
                                                <img src="{{ $detail_cart->thumb }}" height="40px">
                                            </a>
                                        </td>
                                        <td>{{ $detail_cart->pty }}</td>
                                        <td>{{ number_format($detail_cart->price_sale) }} VNĐ</td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="3"><b>Tổng tiền</b></td>
                                        <td colspan="2"><b>{{ number_format($customer->total) }} VNĐ</b></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><b>Trạng thái đơn hàng</b></td>
                                        <td colspan="3"><b>
                                                @if( $customer->active == 1)
                                                <p>Đang chờ xử lý</p>
                                                @elseif( $customer->active == 2 )
                                                <p>Đang được giao</p>
                                                @elseif( $customer->active == 3 )
                                                <p>Đã giao hàng</p>
                                                @elseif( $customer->active == 4 )
                                                <p>Đã bị huỷ</p>
                                                @endif
                                        </b></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <br>
                <div class="col-md-12" style="margin-bottom: 50px;">
                    <form action="" method="post">
                        {{ csrf_field() }}
                        <div class="col-md-8"></div>
                        <div class="col-md-4">
                            <div class="form-inline">
                                @if( $customer->active == 1)
                                <label style="margin-bottom: 10px; color: black">Trạng thái đơn hàng: </label>
                                <select name="active" class="form-control input-inline" style="width: 150px; margin-right: 10px;">
                                    <option value="4">Huỷ đơn</option>
                                </select>
                                <input type="submit" value="Xác nhận" class="btn btn-primary">
                                @endif

                                @if( $customer->active == 2)
                                <label style="margin-bottom: 10px;">Trạng thái đơn hàng: </label>
                                <select name="active" class="form-control input-inline" style="width: 150px; margin-right: 10px;">
                                    <option value="3">Đã nhận hàng</option>
                                </select>
                                <input type="submit" value="Xác nhận" class="btn btn-primary">
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection