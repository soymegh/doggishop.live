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
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('name', 45);
        });

        \App\Models\Departments::factory()->createMany([
            ['name'=>'Boaco'],
            ['name'=>'Carazo'],
            ['name'=>'Chinandega'],
            ['name'=>'Chontales'],
            ['name'=>'Estelí'],
            ['name'=>'Jinotega'],
            ['name'=>'León'],
            ['name'=>'Madriz'],
            ['name'=>'Managua'],
            ['name'=>'Masaya'],
            ['name'=>'Matagalpa'],
            ['name'=>'Nueva Segovia'],
            ['name'=>'Rivas'],
            ['name'=>'Río San Juan'],
        ]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departments');
    }
};
