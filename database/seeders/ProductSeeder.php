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
            ['name' => "Men's Clothing", 'slug' => 'mens-clothing'],
            ['name' => "Women's Clothing", 'slug' => 'womens-clothing'],
            ['name' => "Mobile Phones", 'slug' => 'mobile-phones'],
            ['name' => "Furniture", 'slug' => 'furniture'],
            ['name' => "Skincare", 'slug' => 'skincare'],
            ['name' => "Sports Equipment", 'slug' => 'sports-equipment'],
            ['name' => "Baby Products", 'slug' => 'baby-products'],
            ['name' => "Pet Supplies", 'slug' => 'pet-supplies'],
            ['name' => "Books", 'slug' => 'books'],
            ['name' => "Toys", 'slug' => 'toys'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

        Product::factory()
            ->count(50)
            ->has(ProductImages::factory()->count(rand(2, 5)), 'images')
            ->has(ProductVariations::factory()->count(rand(2, 5)), 'variations')
            ->create();

        Order::factory()
            ->count(20)
            ->withProducts()
            ->has(Payment::factory())
            ->create();

        User::factory()->has(Order::factory()->count(10)->withProducts()->has(Payment::factory()))->create();
    }
}
