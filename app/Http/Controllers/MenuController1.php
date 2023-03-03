<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Menu\MenuService;
// use App\Http\Services\Slider\SliderService;

class MenuController1 extends Controller
{
    protected $menuService;


    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    public function index(Request $request, $id, $slug = '')
    {
        $menu = $this->menuService->getId($id);
        // dd($menu);
        $products = $this->menuService->getProduct($menu, $request);
        // dd($products);

        return view('menu', [
            'title' => $menu->name,
            'products' => $products,
            'menu' => $menu,
        ]);
    }
}
