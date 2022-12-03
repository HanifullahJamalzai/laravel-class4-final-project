<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Slider>
 */
class SliderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'photo' => $this->faker->imageUrl(640, 480, 'animals', true),
            'title' => $this->faker->title(),
            'description' => fake()->paragraph(4),
        ];
    }
}
