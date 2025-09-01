<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['category_name' => 'Makanan', 'description' => 'Delicious and juicy burgers made with fresh ingredients.'],
            ['category_name' => 'Minuman', 'description' => 'Crispy fries, onion rings, and other tasty sides to complement your meal.'],
        ];

        DB::table('categories')->insert($categories);
    }
}
