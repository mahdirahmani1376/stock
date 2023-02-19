<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Product;
use App\Models\Retailer;
use App\Models\Stock;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       $ps5 = Product::create(['name' => 'PS5']);
       $amazon = Retailer::create(['name' => 'amazon']);
       $amazon->addStock($ps5, Stock::factory()->create(['product_id' => $ps5->id,'retailer_id' => $amazon->id,'in_stock' => false]));
    }
}
