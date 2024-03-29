<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nom' => fake()->name(),
            'description' => fake()->text(),
            'prix' => random_int(0, 100),
            'disponible' => rand(0, 1),
            'image' => 'article.jpg'
        ];
    }
}
