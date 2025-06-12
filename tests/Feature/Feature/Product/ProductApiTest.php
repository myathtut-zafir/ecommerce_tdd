<?php

namespace Tests\Feature\Feature\Product;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class ProductApiTest extends TestCase
{
    #[Test] public function anyone_can_retrieve_a_list_of_products()
    {
        Product::factory()->count(5)->create(); // Create some dummy products

        $response = $this->getJson('/api/products');

        $response->assertStatus(200)
            ->assertJsonCount(5, 'data') // Assert 5 products in 'data' array
            ->assertJsonStructure([
                'data' => [
                    '*' => ['id', 'name', 'price', 'stock', 'desc', 'created_at']
                ]
            ]);
    }
}
