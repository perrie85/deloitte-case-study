<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Electronic',
            'sku_prefix' => 'ELC'
        ]);

        Category::create([
            'name' => 'Food',
            'sku_prefix' => 'FOD'
        ]);

        Category::create([
            'name' => 'Entertainment',
            'sku_prefix' => 'ENT'
        ]);

        Category::create([
            'name' => 'Cleaning',
            'sku_prefix' => 'CLN'
        ]);

        Product::create([
            'name' => 'Laptop',
            'category_id' => 1,
            'stock' => 5,
            'price' => 1000
        ]);

        Product::create([
            'name' => 'Steak',
            'category_id' => 2,
            'stock' => 50,
            'price' => 10
        ]);

        Product::create([
            'name' => 'PC Game',
            'category_id' => 3,
            'stock' => 20,
            'price' => 50
        ]);

        Product::create([
            'name' => 'Detergent',
            'category_id' => 4,
            'stock' => 150,
            'price' => 5
        ]);
    }
}
