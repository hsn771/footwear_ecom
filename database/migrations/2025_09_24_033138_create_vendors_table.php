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
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->string('owner_name')->nullable();
            $table->string('owner_contact')->nullable();
            $table->string('store_name')->nullable();
            $table->string('store_contact')->nullable();
            $table->string('email')->nullable();
            $table->integer('district_id')->nullable();
            $table->integer('division_id')->nullable();
            $table->text('address')->nullable();
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendors');
    }
};
