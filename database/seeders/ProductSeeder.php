<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            [
                'title' => 'Laptop',
                'slug' => Str::slug('Laptop'),
                'price' => 1000.00,
                'content' => json_encode(['description' => 'High performance laptop']),
                'published_at' => now(),
                'user_id' => 1,
                'meta_description' => 'A powerful laptop',
                //'variants' => json_encode(['color' => 'black', 'size' => '15 inch']),
                'SKU' => 'LAP123',
            ],
            [
                'title' => 'Smartphone',
                'slug' => Str::slug('Smartphone'),
                'price' => 600.00,
                'content' => json_encode(['description' => 'Latest model smartphone']),
                'published_at' => now(),
                'user_id' => 1,
                'meta_description' => 'A smartphone with latest features',
                //'variants' => json_encode(['color' => 'white', 'size' => '6 inch']),
                'SKU' => 'SMP456',
            ],
            // Adicione mais produtos aqui
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
