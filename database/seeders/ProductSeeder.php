<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use App\Models\ProductImages;
use App\Models\ProductVariations;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::factory()->count(7)->create();

        Product::factory()
            ->count(20)
            ->has(ProductImages::factory()->count(rand(2, 5)), 'images')
            ->has(ProductVariations::factory()->count(rand(2, 5)), 'variations')
            ->create();


        Order::factory()
            ->count(20)
            ->withProducts()
            ->has(Payment::factory())
            ->create();
    }
}
