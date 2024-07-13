<?php

namespace Database\Seeders;

use App\Models\Stock;
use Illuminate\Database\Seeder;

class StockSeeder extends Seeder
{
    public function run()
    {
        $stocks = [
            ['product_id' => 1, 'variant_id' => null, 'quantity' => 50, 'user_id' => 1],
            ['product_id' => 2, 'variant_id' => null, 'quantity' => 30, 'user_id' => 1],
            // Adicione mais estoque aqui
        ];

        foreach ($stocks as $stock) {
            Stock::create($stock);
        }
    }
}
