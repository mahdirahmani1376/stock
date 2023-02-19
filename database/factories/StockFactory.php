<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Stock>
 */
class StockFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'price' => random_int(100,500),
            'url' => $this->faker->url(),
            'sku' => random_int(100,500),
            'in_stock' => $this->faker->boolean(),
        ];
    }
}
