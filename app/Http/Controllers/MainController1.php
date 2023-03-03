<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Slider\SliderService;
use App\Http\Services\Menu\MenuService;
use App\Http\Services\Product\ProductService;
use Illuminate\Support\Facades\DB;
use Mail;

class MainController1 extends Controller
{
    protected $slider;
    protected $menu;
    protected $product;
    public function __construct(SliderService $slider, MenuService $menu,
                                ProductService $product)
    {
        $this->slider = $slider;
        $this->menu = $menu;
        $this->product = $product;
    }
   
    public function index()
    {
        return view('main', [
            'title' => 'Ba lô nam',
            'sliders' => $this->slider->show(),
            'menus' => $this->menu->show(),
            'products' => $this->product->get()
        ]);
    }

    public function loadProduct(Request $request)
    {
        $page = $request->input('page', 0);
        $result = $this->product->get($page);
        if (count($result) != 0) {
            $html = view('products.list', ['products' => $result])->render();
            return response()->json(['html' => $html]);
        }
        return response()->json(['html' => '']);
    }

    public function contact()
    {
        return view('contact', [
            'title' => 'Liên hệ'
        ]);
    }

    public function about()
    {
        return view('about', [
            'title' => 'Giới thiệu'
        ]);
    }

    public function search(Request $request)
    {
        $keywords = $request->keywords_submit;
        $search_product = DB::table('products')->where('name','like','%'.$keywords.'%')->get();

        return view('search', [
            'title' => 'Tìm kiếm',
            'sliders' => $this->slider->show(),
            'menus' => $this->menu->show(),
        ])->with('search_product',$search_product);
    }


}
