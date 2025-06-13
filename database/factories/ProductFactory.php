<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name() . " " . $this->faker->unique()->word(),
            'desc' => $this->faker->sentence(),
            'price' => $this->faker->randomFloat(),
            'stock' => $this->faker->numberBetween(1, 1000),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
