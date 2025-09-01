<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'category_id' => $this->faker->numberBetween(1, 4), // Assuming you have 4 categories
            'description' => $this->faker->text(),
            'price' => $this->faker->randomFloat(1000, 100000),
            'image' => $this->faker->imageUrl(),
            'is_available' => $this->faker->boolean(), // 80% chance of being true
        ];
    }
}
