<?php

use FontLib\Table\Type\name;
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
        Schema::create('municipalities', function (Blueprint $table) {
            $table->id();
            $table->string('name', 45);
            $table->foreignId('departments_id')->constrained('departments');
        });

        \App\Models\Municipalities::factory()->createMany([
            [ 'name' => 'Boaco', 'departments_id' => 1],
            [ 'name' => 'Camoapa', 'departments_id' => 1],
            [ 'name' => 'Santa Lucía', 'departments_id' => 1],

            [ 'name' => 'Diriamba', 'departments_id' => 2],
            [ 'name' => 'Dolores', 'departments_id' => 2],
            [ 'name' => 'Jinotepe', 'departments_id' => 2],

            [ 'name' => 'Chinandega', 'departments_id' => 3],
            [ 'name' => 'Corinto', 'departments_id' => 3],
            [ 'name' => 'El Realejo', 'departments_id' => 3],

            [ 'name' => 'Juigalpa', 'departments_id' => 4],
            [ 'name' => 'Acoyapa', 'departments_id' => 4],
            [ 'name' => 'Comalapa', 'departments_id' => 4],

            [ 'name' => 'Estelí', 'departments_id' => 5],
            [ 'name' => 'Condega', 'departments_id' => 5],
            [ 'name' => 'La Trinidad', 'departments_id' => 5],

            [ 'name' => 'Jinotega', 'departments_id' => 6],
            [ 'name' => 'San Rafael del Norte', 'departments_id' => 6],
            [ 'name' => 'San Sebastián de Yalí', 'departments_id' => 6],

            [ 'name' => 'León', 'departments_id' => 7],
            [ 'name' => 'Achuapa', 'departments_id' => 7],
            [ 'name' => 'El Jicaral', 'departments_id' => 7],

            [ 'name' => 'Somoto', 'departments_id' => 8],
            [ 'name' => 'San Juan del Río Coco', 'departments_id' => 8],
            [ 'name' => 'Telpaneca', 'departments_id' => 8],

            [ 'name' => 'Managua', 'departments_id' => 9],
            [ 'name' => 'El Crucero', 'departments_id' => 9],
            [ 'name' => 'Mateare', 'departments_id' => 9],

            [ 'name' => 'Masaya', 'departments_id' => 10],
            [ 'name' => 'Catarina', 'departments_id' => 10],
            [ 'name' => 'La Concepción', 'departments_id' => 10],

            [ 'name' => 'Matagalpa', 'departments_id' => 11],
            [ 'name' => 'San Ramón', 'departments_id' => 11],
            [ 'name' => 'Sébaco', 'departments_id' => 11],

            [ 'name' => 'Ocotal', 'departments_id' => 12],
            [ 'name' => 'Ciudad Antigua', 'departments_id' => 12],
            [ 'name' => 'Dipilto', 'departments_id' => 12],

            [ 'name' => 'Rivas', 'departments_id' => 13],
            [ 'name' => 'Altagracia', 'departments_id' => 13],
            [ 'name' => 'Belén', 'departments_id' => 13],

            [ 'name' => 'San Carlos', 'departments_id' => 14],
            [ 'name' => 'El Almendro', 'departments_id' => 14],
            [ 'name' => 'El Castillo', 'departments_id' => 14],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('municipalities');
    }
};
