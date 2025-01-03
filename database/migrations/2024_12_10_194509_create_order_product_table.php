<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order_product', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->cascadeOnDelete();
            $table->foreignId('product_id')->constrained()->cascadeOnUpdate();
            $table->foreignId('variation_id')->nullable()->constrained('product_variations')->cascadeOnDelete();
            $table->integer('quantity');
            $table->decimal('price', 10, 2)->comment('Price of product when the order was created');
            $table->decimal('discount', 10, 2)->comment('Discount of Product when the order was created');
            $table->decimal('items_discount', 10, 2)->comment('discount total');
            $table->decimal('items_total', 10, 2)->comment('Price total without the discount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_product');
    }
};
