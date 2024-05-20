<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pet>
 */
class PetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'name' => $this->faker->name(),
            'breed' => $this->faker->name(),
            'gender' => $this->faker->name(),
            'age' => $this->faker->name(),
            'price' => $this->faker->randomFloat(2, 0, 1000),
            'pet_type_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}