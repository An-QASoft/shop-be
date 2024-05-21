<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $productData = [
            ['code' => 'PD1', 'name' => 'Product A', 'quantity' => 10, 'price' => 10, 'description' => 'Description for Product A'],
            ['code' => 'PD2', 'name' => 'Product B', 'quantity' => 15, 'price' => 10, 'description' => 'Description for Product B'],
            ['code' => 'PD3', 'name' => 'Product C', 'quantity' => 20, 'price' => 10, 'description' => 'Description for Product C'],
        ];

        for ($i = 0; $i < 10; $i++) {
            $index = $i % count($productData); 
            $product = $productData[$index];

            $product['name'] = $product['name'] . ' ' . ($i + 1);
            Product::create($product);
        }
    }
}
