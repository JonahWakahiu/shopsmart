<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use App\Models\ProductImages;
use App\Models\ProductVariations;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => "Phones & Tablets", 'slug' => 'mobile-phones'],
            ['name' => "TVS & Audio", 'slug' => 'tvs-audio'],
            ['name' => "Appliances", 'slug' => 'home-appliances'],
            ['name' => "Health & Beauty", 'slug' => 'skincare'],
            ['name' => "Home & Office", 'slug' => 'furniture'],
            ['name' => "Fashion", 'slug' => 'fashion'],
            ['name' => "Computing", 'slug' => 'computing'],
            ['name' => "Supermarket", 'slug' => 'groceries'],
            ['name' => "Baby Products", 'slug' => 'baby-products'],
            ['name' => "Sporting Categories", 'slug' => 'sports-equipment'],
            ['name' => 'Others', 'slug' => 'others'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

        Product::factory()
            ->count(20)
            ->withDiscount()
            ->has(ProductImages::factory()->count(rand(2, 5)), 'images')
            ->create();

        Product::factory()
            ->count(20)
            ->has(ProductImages::factory()->count(rand(2, 5)), 'images')
            ->create();

        Product::factory()
            ->count(50)
            ->has(ProductImages::factory()->count(rand(2, 5)), 'images')
            ->has(ProductVariations::factory()->count(rand(2, 5)), 'variations')
            ->create();

        Product::factory()
            ->count(20)
            ->withDiscount()
            ->has(ProductImages::factory()->count(rand(2, 5)), 'images')
            ->has(ProductVariations::factory()->count(rand(2, 5)), 'variations')
            ->create();

        Order::factory()
            ->count(5)
            ->withProducts()
            ->has(Payment::factory())
            ->create();

        User::factory()->has(Order::factory()->count(10)->withProducts()->has(Payment::factory()))->create();
    }
}
