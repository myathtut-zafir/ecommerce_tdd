<?php

namespace App\Services;

use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;

class ProductService
{
    public function __construct()
    {
    }

    public function getAllProducts()
    {
        $products = Product::all();

        return ProductResource::collection($products);
    }

    public function create(StoreProductRequest $request)
    {
        $product = Product::create($request->validated());

        return (new ProductResource($product))->response()->setStatusCode(201);
    }

}
