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
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // INT PRIMARY KEY AUTO_INCREMENT

            $table->unsignedBigInteger('user_id');
            $table->decimal('discount_amount', 10, 2)->default(0);
            $table->string('status', 50)->default('pending');      // order status
            $table->timestamp('created_at')->useCurrent();         // order created
            $table->timestamp('updated_at')->nullable();           // updated timestamp

            // // Foreign keys
            // $table->foreign('user_id')
            //       ->references('id')
            //       ->on('users')
            //       ->onDelete('cascade');

            // $table->foreign('discount_id')
            //       ->references('id')
            //       ->on('discounts')
            //       ->onDelete('set null');

            // $table->foreign('payment_id')
            //       ->references('id')
            //       ->on('payments')
            //       ->onDelete('set null');

            // $table->foreign('shipping_address_id')
            //       ->references('id')
            //       ->on('shipping_addresses')
            //       ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
