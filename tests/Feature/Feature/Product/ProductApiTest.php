<?php

namespace Tests\Feature\Feature\Product;

use App\Models\Product;
use App\Models\User;
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

    #[Test] public function an_admin_can_create_a_product()
    {
        $admin = User::factory()->admin()->create();
        $productData = Product::factory()->make()->toArray();

        $response = $this->actingAs($admin, 'sanctum')
            ->postJson('/api/products', $productData);

        $response->assertStatus(201)
            ->assertJsonFragment([
                'name' => $productData['name'],
                'price' => (float)$productData['price'],
            ]);

        $this->assertDatabaseHas('products', [
            'name' => $productData['name'],
            'price' => $productData['price'],
        ]);
    }

    #[Test] public function a_regular_user_can_not_create_a_product()
    {
        $user = User::factory()->create();
        $productData = Product::factory()->make()->toArray();

        $response = $this->actingAs($user, 'sanctum')
            ->postJson('/api/products', $productData);

        $response->assertStatus(403);
        $this->assertDatabaseMissing('products', ['name' => $productData['name']]);

    }
}
