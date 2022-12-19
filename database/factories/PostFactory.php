<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'category_id' => fake()->numberBetween(1,4),
            'title'  => fake()->title(),
            'photo'  => fake()->imageUrl(640, 480, 'animals', true),
            'description' => fake()->paragraph(4),
        ];
    }
}
