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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id(); // INT PRIMARY KEY AUTO_INCREMENT

            $table->unsignedBigInteger('order_id');   // belongs to an order
            $table->unsignedBigInteger('product_id'); // product in the order
            $table->unsignedBigInteger('size_id')->nullable(); // optional size (e.g., T-shirt size)
            $table->integer('quantity');              // how many of the product
            $table->decimal('price', 10, 2);          // price per unit at purchase time
            $table->timestamps();

            // Foreign keys
            $table->foreign('order_id')
                  ->references('id')
                  ->on('orders')
                  ->onDelete('cascade');

            $table->foreign('product_id')
                  ->references('id')
                  ->on('products')
                  ->onDelete('cascade');

            $table->foreign('size_id')
                  ->references('id')
                  ->on('sizes')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
