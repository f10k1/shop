<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{

    static $products = ['Shoes', 'Dress', 'Shirt'];


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => self::$products[fake()->numberBetween(0, count(self::$products) - 1)],
            'price' => fake()->randomFloat(2, 10, 200),
            'quantity' => fake()->numberBetween(0, 100),
            'description' => fake()->sentence(200),
            'short_description' => fake()->sentence(70)
        ];
    }
}
