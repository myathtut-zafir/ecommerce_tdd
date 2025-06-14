<?php

namespace Tests\Unit;

use App\Http\Controllers\ProductController;
use App\Http\Requests\Product\StoreProductRequest;
use App\Models\Product;
use App\Services\ProductService;
use Mockery;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->mockRepository = Mockery::mock(Product::class);
        $this->productService = Mockery::mock(ProductService::class);
        $this->controller = new ProductController($this->productService);
    }

    #[Test] public function it_creates_product_successfully()
    {
        // Create a mock request
        $mockRequest = Mockery::mock(StoreProductRequest::class);

        // Create expected product
        $expectedProduct = new Product([
            'id' => 1,
            'name' => 'Test Product',
            'price' => 29.99
        ]);

        // Mock the service to expect the request object
        $this->productService
            ->shouldReceive('create')
            ->once()
            ->with($mockRequest)  // Expect the request object, not array
            ->andReturn($expectedProduct);

        // Call the controller method
        $result = $this->controller->create($mockRequest);

        $this->assertEquals($expectedProduct, $result);
    }


}
