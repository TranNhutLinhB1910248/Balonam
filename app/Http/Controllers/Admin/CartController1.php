<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\CartService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Bill;

use App\Models\Cart;
use App\Http\Controllers\Admin\User;

class CartController1 extends Controller
{
    public function index_all()
    {
        $orders = DB::table('carts')
            ->orderBy('id')
            ->get();
        return view('admin.carts.order',[
            'title' => 'Tất cả đơn hàng'
        ])->with('orders',$orders);
    }

    public function index_pending()
    {
        $orders = DB::table('carts')
            ->orderBy('id')
            ->where('active', 1)
            ->get();
        return view('admin.carts.order',[
            'title' => 'Đơn hàng chờ xử lí'
        ])->with('orders',$orders);
    }

    public function index_delivering()
    {
        $orders = DB::table('carts')
            ->orderBy('id')
            ->where('active', 2)
            ->get();
        return view('admin.carts.order',[
            'title' => 'Đơn hàng đang giao'
        ])->with('orders',$orders);
    }

    public function index_complete()
    {
        $orders = DB::table('carts')
            ->orderBy('id')
            ->where('active', 3)
            ->get();
        return view('admin.carts.order',[
            'title' => 'Đơn hàng đã giao'
        ])->with('orders',$orders);
    }

    public function index_cancelled()
    {
        $orders = DB::table('carts')
            ->orderBy('id')
            ->where('active', 4)
            ->get();
        return view('admin.carts.order',[
            'title' => 'Đơn hàng bị hủy'
        ])->with('orders',$orders);
    }

    public function detail_order($id)
    {
        $customer = DB::table('carts')
                        ->select('carts.*')
                        ->where('carts.id', '=', $id)
                        ->first();

        $cart_id = DB::table('detail_carts')
                    ->join('products', 'detail_carts.product_id', '=', 'products.id')
                    ->select('detail_carts.*', 'products.*')
                    ->where('detail_carts.cart_id', '=', $id) 
                    ->get();

        return view('admin.carts.order_detail',[
            'title' => 'Chi tiết đơn hàng',
        ])->with('customer',$customer)->with('cart_id',$cart_id);
    }

    public function update_order(Request $request, $id){
        $order = Cart::find($id);
        $order->active = $request->input('active');
        $order->save();
        Session::flash('message', "Successfully updated");
        return redirect()->back();
    }
}
