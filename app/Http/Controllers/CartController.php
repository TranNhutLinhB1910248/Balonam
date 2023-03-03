<?php

namespace App\Http\Controllers;
use App\Http\Services\Cart\CartService;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    protected $cartService;
    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function index(Request $request)
    {
        $result = $this->cartService->create($request);
        // dd(session()->get('carts'));
        if ($result === false){
            return redirect()->back();
        }
        return redirect('/carts');
    }

    public function show()
    {
        $products = $this->cartService->getProduct();
        return view('carts.list', [
            'title' => 'Giỏ Hàng',
            'products' => $products,
            'carts' => session()->get('carts')
        ]);
    }

    public function showcheckout()
    {
        $products = $this->cartService->getProduct();
        if (Auth::check()){
            return view('carts.checkout', [
                'title' => 'Giỏ Hàng',
                'products' => $products,
                'carts' => session()->get('carts')
            ]);
        }
        else{
            return redirect('/admin/users/login');

        }
        
    }
    public function update(Request $request)
    {
        // dd($request->all());
        $this->cartService->update($request);
        return redirect('/carts');
    }

    public function remove($id = 0)
    {
        $this->cartService->remove($id);
        return redirect('/carts');
    }

    public function getCart(Request $request)
    {
        // dd($request->input());
        $this->cartService->getCart($request);
        return redirect()->back();
    }

    public function show_DonHang($id)
    {
        $user_id= $id;
        $get_cart = DB::table('carts')
                    ->where('user_id','=',$user_id)
                    ->orderby('id','desc')
                    ->get();
        return view('carts.purchase_order', [
            'title' => 'Lịch sử đơn hàng'
        ])->with('get_cart',$get_cart);
    }

    public function show_ChitietDonhang($id){
        $customer = DB::table('carts')
                ->select('carts.*')
                ->where('carts.id', '=', $id)
                ->first();
     
        $cart = DB::table('detail_carts')
                ->join('products', 'detail_carts.product_id', '=', 'products.id')
                ->select('detail_carts.*', 'products.*')
                ->where('detail_carts.cart_id', '=', $id) 
                ->get();

        return view('carts.detail_order',[
            'title' => 'Chi tiết đơn hàng'
        ])->with('customer',$customer)->with('cart',$cart);
    }

    public function update_DonHang(Request $request, $id){
        $cart = Cart::find($id);  
        $cart->active = $request->input('active');
        $cart->save();
        Session::flash('message', "Successfully updated");
        return redirect()->back();    
    }
}
