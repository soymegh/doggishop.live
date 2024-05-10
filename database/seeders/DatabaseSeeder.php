<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\CategoriesTableSeeder;
use Database\Seeders\PetsTableSeeder;
use Database\Seeders\PetTypeTableSeeder;
use Database\Seeders\ProductsTableSeeder;
use Database\Seeders\ProvidersTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
             'name' => 'Test Admin',
             'email' => 'admin@example.com',
             'password' => bcrypt('password'),
             'role' => 'admin',]);
        
             \App\Models\User::factory()->create([
             'name' => 'Test User',
             'email' => 'user@example.com',
             'password' => bcrypt('password'),
             'role' => 'user',]);

        


        // $this->call([
        //     CategoriesTableSeeder::class,
        //     PetTypeTableSeeder::class,
        //     PetsTableSeeder::class,
        //     ProvidersTableSeeder::class,
        //     ProductsTableSeeder::class,
        // ]);
        
    }
}