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
        Schema::create('order_returns', function (Blueprint $table) {
            $table->id(); // INT PRIMARY KEY AUTO_INCREMENT

            $table->unsignedBigInteger('order_id'); // the order being returned
            $table->text('reason');                 // reason for return
            $table->string('status', 50)->default('pending'); // e.g., pending, approved, rejected
            $table->timestamp('requested_at')->useCurrent();  // when the return was requested
            $table->timestamps();

            // Foreign key
            $table->foreign('order_id')
                  ->references('id')
                  ->on('orders')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_returns');
    }
};
