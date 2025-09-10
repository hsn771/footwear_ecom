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
        Schema::create('payments', function (Blueprint $table) {
             $table->id(); // INT PRIMARY KEY AUTO_INCREMENT
            $table->unsignedBigInteger('order_id'); // foreign key to orders
            $table->string('payment_method', 50);   // e.g., "Cash", "Card", "Bkash"
            $table->string('status', 50);           // e.g., "pending", "paid", "failed"
            $table->string('transaction_id', 100)->nullable(); // gateway transaction id
            $table->timestamp('paid_at')->nullable(); // when payment completed
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
