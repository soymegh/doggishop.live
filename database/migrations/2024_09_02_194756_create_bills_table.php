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
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->string('name', 64);
            $table->string('phone', 8);
            $table->string('warrant', 64);
            $table->decimal('subtotal', 10, 0);
            $table->decimal('total',10, 0);
            $table->dateTime('bill_date');
            $table->foreignId('payment_type_id')->constrained('payment_types');
            $table->foreignId('user_id')->constrained('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bills');
    }
};
