<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Adresse;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Adresse>
 */
class AdresseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'adresse' => fake()->streetAddress(),
            'code_postal' => strval(rand(10000,99999)),
            'ville' => fake()->city(),
            'user_id' => random_int(1, 30)
        ];
    }
}
