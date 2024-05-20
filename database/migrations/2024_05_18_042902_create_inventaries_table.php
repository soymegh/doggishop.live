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
        Schema::create('inventaries', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->foreignId('product_id')->constrained();
            $table->integer('quantity');
            $table->float('price');
            $table->string('description')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventaries');
    }
};