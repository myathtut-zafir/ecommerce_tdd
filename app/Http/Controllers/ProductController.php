<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\StoreProductRequest;
use App\Services\ProductService;

class ProductController extends Controller
{


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


}
