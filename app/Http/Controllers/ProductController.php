<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\StoreProductRequest;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ProductController extends Controller
{
    use AuthorizesRequests;

    public function __construct(private ProductService $productService)
    {

    }

    public function index()
    {

        return $this->productService->getAllProducts();

    }

    public function create(StoreProductRequest $request)
    {
        return $this->productService->create($request);
    }
    public function update(Product $product)
    {
        $this->authorize('update', $product);
        return "display";
    }


}
