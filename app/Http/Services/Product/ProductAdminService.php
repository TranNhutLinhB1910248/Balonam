<?php

namespace App\Http\Services\Product;

use App\Models\Menu;
use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use App\Http\Services\Product\ProductService;

class  ProductAdminService
{
    public function getMenu()
    {
        return Menu::where('active', 1)->get();
    }

    public function isValidPrice($request)
    {
        if($request->input('price') != 0 && $request->input('price_sale') != 0
        && $request->input('price_sale') >= $request->input('price') 
        ){
            session()->flash('error', 'Giá giảm phải nhỏ hơn giá gốc');
            return false;
        }

        if ($request->input('price_sale') != 0 &&(int)$request->input('price') == 0) {
            session()->flash('error', 'Vui lòng nhập giá gốc');
            return false;
        }

        return true;

    }

    public function insert($request)
    {
        $isValidPrice = $this->isValidPrice($request);
        if ($isValidPrice === false)
            return false;
        // dd($request->all());
        try {
            $request->except('_token');
            Product::create($request->all());
            session()->flash('success', 'Thêm sản phẩm thành công');
        } catch(\Exception $err) {
            session()->flash('error', 'Thêm sản phẩm lỗi');
            Log::info($err->getMessage());
            return false;

        }
        return true;
    }


    public function get()
    {
        return Product::with('menu')->orderByDesc('id')->paginate(15);
    }

    public function update($request, $product)
    {
        $isValidPrice = $this->isValidPrice($request);
        if ($isValidPrice === false)
        return false;

        try {
            $product->fill($request->input());
            $product->save();
            session()->flash('success', 'Cập nhật thành công');
        } catch (\Exception $err) {
            session()->flash('error', 'Có lỗi vui lòng thử lại');
            Log::info($err->getMessage());
            return false;
        }
        return true;
    }

    public function destroy($request)
    {
        $product = Product::where('id', $request->input('id'))->first();
        if ($product) {
            $product->delete();
            return true;
        }

        return false;
    }
}
