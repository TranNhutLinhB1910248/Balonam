{{-- kiem tra gio hang --}}
@extends('home')

@section('content')
<form action="/carts/checkout" class="bg0 p-t-130 p-b-85" method="post">
    @include('admin.alert')
    @if (count ($products) != 0)
    <div class="container">
        <h2 class="text-center" style="color: black">KIỂM TRA GIỎ HÀNG</h2><br>
        <div class="row">
            <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                <div class="m-l-25 m-r--38 m-lr-0-xl">
                    <div class="wrap-table-shopping-cart">
                        @php $total = 0; @endphp
                        <table class="table-shopping-cart" style="width: 600px">
                            <tbody>
                                <tr class="table" style="background-color: skyblue; color: black">
                                    <th class="column-1">Sản phẩm</th>
                                    <th class="column-2">Tên sản phẩm</th>
                                    <th class="column-3">Giá</th>
                                    <th class="column-4">Số lượng</th>
                                    <th class="column-5">Thành tiền</th>
                                    <th class="column-6" style="width: 50px"></th>
                                </tr>
                                @foreach ($products as $key => $product)
                                    @php
                                        $price = $product->price_sale != 0 ? $product->price_sale : $product->price;
                                        $priceEnd = $price * $carts[$product->id];
                                        $total += $priceEnd;
                                    @endphp
                                <tr class="table_row">
                                    <td class="column-1">
                                        <div class="how-itemcart1">
                                            <img src="{{ $product->thumb }}" alt="IMG">
                                        </div>
                                    </td>
                                    <td class="column-2">{{ $product->name }}</td>
                                    <td class="column-3">{{ number_format($price, 0, '', '.') }} đ</td>
                                    <td class="text-center">                                   
                                            {{ $carts[$product->id] }}
                                    </td>
                                    <td class="column-5">{{ number_format($priceEnd, 0, '', '.') }} đ</td>

                                    <td class="p-r-15">
                                        <a class="btn btn-danger btn-sm" href="/carts/delete/{{ $product->id }}"><i class="fa fa-trash"></i></a>
                                    <td>
                                </tr>       
             
                                @endforeach
                            </tbody>
                            <tr class="" style="font-size: 25px;" >
                                <td style="font: 1em sans-serif; color: black"><b>Tổng tiền :</b></td>
                                <td colspan="7" class="text-center " style="font-weight: bold; color: black; margin-right: 50px">{{ number_format($total, 0, '', '.') }}VNĐ</td>
                            </tr> 
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                    <h4 class="mtext-109 cl2 p-b-30 ltext-102" style="color: black; font-size: 20px">
                        <b>GIỎ HÀNG</b>
                    </h4>

                    <div class="flex-w flex-t bor12 p-b-13">
                        <div class="size-208">
                            <span class="stext-110 cl2 ltext-102" style="color: black; font-size: 15px">
                                THÀNH TIỀN:
                            </span>
                        </div>

                        <div class="size-209">
                            <span class="mtext-110 cl2">
                                {{ number_format($total, 0, '', '.') }}
                            </span>
                        </div>
                    </div>

                    <div class="flex-w flex-t bor12 p-t-15 p-b-30">

                        <div class="size-100 p-r-18 p-r-0-sm w-full-ssm">
                            <div class="p-t-15">
                                <span class="stext-112 cl8">
                                    Thông Tin Khách Hàng
                                </span>
                                @csrf

                                <div class="bor8 bg0 m-b-12">
                                    <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="name" placeholder="" value="{{Auth::user()->name}}">
                                <div class="bor8 bg0 m-b-12">
                                    <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="phone" placeholder="" value="{{Auth::user()->phone}}">
                                </div>   
                                <div class="bor8 bg0 m-b-12">
                                    <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="address" placeholder="Địa chỉ giao hàng" value="{{Auth::user()->address}}">
                                </div>           
                                <div class="bor8 bg0 m-b-12">
                                    <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="email" placeholder="Email liên hệ" value="{{Auth::user()->email}}">
                                </div>
   
                            </div>
                        </div>
                    </div>

                    <select id="cars" class="stext-111 cl8 plh3 size-50 p-lr-15">
                        <option value="">Phương thức thanh toán</option>
                        <option value="">Thanh toán bằng tiền mặt</option>
                        <option value="">Thanh toán bằng mono</option>
                      </select>

                    <br><br>
                    <select id="cart" class="stext-111 cl8 plh3 size-50 p-lr-15">
                        <option>Phương thức giao hàng</option>
                        <option>Giao hàng nhanh</option>
                        <option>Giao hàng tiết kiệm</option>
                    </select>
                    <br><br>

                    <button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                        Đặt hàng
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
@else
<div class="text-center"><h2>Giỏ hàng trống</h2></div>
@endif
@endsection