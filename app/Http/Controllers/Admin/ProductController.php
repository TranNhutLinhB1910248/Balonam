<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductRequest;
//use App\Http\Services\Product\ProductService;
use App\Http\Services\Product\ProductAdminService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
// use Illuminate\Http\Response;
use App\Models\Product;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductAdminService $productService)
    {
        $this->productService = $productService;
    }
    public function index()
    {
        return view('admin.product.list', [
            'title' => 'Danh sách sản phẩm',
            'products' => $this->productService->get()
        ]);
    }

    public function create()
    {
        return view('admin.product.add', [
            'title' => 'Thêm sản phẩm mới',
            'menus' => $this->productService->getMenu()
        ]);

            // echo 123;
    }

    public function store(ProductRequest $request)
    {
        $this->productService->insert($request);
        return redirect()->back();
    }

    public function show(Product $product)
    {
        return view('admin.product.edit', [
            'title' => "Chỉnh sửa sản phẩm",
            'product' => $product,
            'menus' => $this->productService->getMenu()
        ]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, Product $product)
    {
        $result = $this->productService->update($request, $product);
        if ($result) {
            return redirect('/admin/products/list');
        }
        return redirect()->back();
    }

    
    public function destroy(Request $request): JsonResponse
    {
        $result = $this->productService->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công sản phẩm'
            ]);
        }
        return response()->json(['error' => true]);
    }
}
