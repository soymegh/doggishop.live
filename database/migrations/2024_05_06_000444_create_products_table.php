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
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('size');
            $table->float('price');
            $table->integer('stock')->default(0);
            $table->string('picture')->nullable();
            $table->foreignId('pet_type_id')->constrained();
            $table->foreignId('category_id')->constrained();
            $table->foreignId('provider_id')->constrained(); //Marca o proveedor
            $table->boolean('status')->default(true);
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