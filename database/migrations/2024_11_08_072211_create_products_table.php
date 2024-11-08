<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
            $table->foreignid('brand_id')->constrained('brands')->cascadeOnDelete();
            $table->string('name');
            $table->string('slug')->unique();
            $table->json('images')->nullable();
            $table->string('description')->nullable();
            $table->decimal('price', 10, 2);
            $table->boolean('is_active')->default(1);
            $table->boolean('is_featured')->default(0);
            $table->boolean('in_stock')->default(1);
            $table->boolean('on_sale')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
