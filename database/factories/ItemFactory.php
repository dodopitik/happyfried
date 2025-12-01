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
            'category_id' => $this->faker->numberBetween(1, 2), // Assuming you have 4 categories
            'price' => $this->faker->randomFloat(1000, 100000),
            'image' => fake()->randomElement([
                'https://plus.unsplash.com/premium_photo-1694708455249-992010f9db32',
                'https://images.unsplash.com/photo-1569050467447-ce54b3bbc37d',
                'https://images.unsplash.com/photo-1679279726946-a158b8bcaa23',
                'https://images.unsplash.com/photo-1638502182261-7be714a565ce',
                'https://plus.unsplash.com/premium_photo-1666919818889-0b7251bea0a6',
                'https://images.unsplash.com/photo-1652752731860-ef0cf518f13a',
            ]),
            'is_available' => $this->faker->boolean(), // 80% chance of being true
        ];
    }
}
