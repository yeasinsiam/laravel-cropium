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
            'title'         => fake()->sentence(fake()->numberBetween(3, 5)),
            'slug'          => fake()->slug(),
            'thumbnail'     => fake()->imageUrl(750, 350),
            'excerpt'       => fake()->paragraph(fake()->numberBetween(2, 3)),
            'content'       => fake()->paragraph(fake()->numberBetween(60, 80)),
            'views'         => fake()->numberBetween(150, 250),
            'user_id'       => fake()->numberBetween(1, 3),
        ];
    }
}