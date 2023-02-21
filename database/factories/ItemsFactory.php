<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Items>
 */
class ItemsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'item_name' => $this->faker->sentence(),
            'quantity' => $this->faker->numberBetween(1, 10),
            'category' => $this->faker->randomElement(['IT Equipment', 'Communication Equipment', 'Others']),
            'price' => $this->faker->numberBetween(500, 100000),
            'description' => $this->faker->text(),
        ];
    }
}
