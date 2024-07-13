<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['title' => 'Electronics', 'content' => 'Various electronic items', 'slug' => Str::slug('Electronics')],
            ['title' => 'Books', 'content' => 'Various books', 'slug' => Str::slug('Books')],
            ['title' => 'Clothing', 'content' => 'Various clothing items', 'slug' => Str::slug('Clothing')],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

        $this->call([
            //CategorySeeder::class,
            ProductSeeder::class,
            StockSeeder::class,
            MediaSeeder::class,
        ]);
    }
}
