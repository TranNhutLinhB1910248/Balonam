{{-- gio hang --}}
@extends('home')

@section('content')
<form class=" p-t-130 p-85" method="post">
    @include('admin.alert')
    @if (count ($products) != 0)
    <div class="container">
        <h2 class="text-center" style="color: black">GIỎ HÀNG</h2>
        <br>
        <div class="row">
            <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                <div class="m-l-25 m-r--38 m-lr-0-xl">
                    <div class="wrap-table-shopping-cart">
                        @php $total = 0; @endphp
                        <table class="table-shopping-cart" style="width: 600px">
                            <tbody>
                                <tr class="table" style="background-color: skyblue; color: black;">
                                    <th>Sản phẩm</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Thành tiền</th>
                                    <th style="width: 50px"></th>
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
                                    <td class="column-4">
                                        <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                            <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-minus"></i>
                                            </div>

                                            <input class="mtext-104 cl3 txt-center num-product" type="number" 
                                            name="num_product[{{ $product->id }}]" value="{{ $carts[$product->id] }}">

                                            <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-plus"></i>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="column-5">{{ number_format($priceEnd, 0, '', '.') }} đ</td>

                                    <td class="p-r-15">
                                        <a class="btn btn-danger btn-sm" href="/carts/delete/{{ $product->id }}"><i class="fa fa-trash"></i></a>
                                    <td>
                                </tr>       
             
                                @endforeach
                            </tbody>
                            <tr style="font-size: 25px;" >
                                <td style="font: 1em sans-serif; color: black;"><b>Tổng tiền :</b></td>
                                <td colspan="7" class="text-center " style="font-weight: bold; color: black">{{ number_format($total, 0, '', '.') }}VNĐ</td>
                            </tr>  
                        </table>
                    </div>

                    <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                        <div class="flex-w flex-m m-r-20 m-tb-5">
                            <input type="submit" value="Cập nhật giỏ hàng" formaction="/update-cart"
                                class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-50 trans-04 pointer m-r-15 m-b-15">
                            @csrf   

                        </div>
                        <div class="flex-w flex-m m-r-20 m-tb-5">       
                            <a href="/checkout" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-80 trans-04 pointer m-r-15 m-b-15">
                                Đặt hàng
                            </a>
                        </div>   
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@else
<div class="text-center"><h2>Giỏ hàng trống</h2></div>
@endif
@endsection