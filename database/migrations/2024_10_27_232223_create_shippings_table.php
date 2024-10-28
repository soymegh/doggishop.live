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
        Schema::create('shippings', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date_shipping')->nullable();
            $table->string('address', 256)->nullable();
            $table->foreignId('municipalities_id')->nullable()->constrained('municipalities');
            $table->foreignId('departments_id')->nullable()->constrained('departments');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('bill_id')->constrained('bills');
            $table->string('status', 45);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shippings');
    }
};
