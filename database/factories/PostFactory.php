<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Page;
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
    public function definition(): array
    {
        return [
            // 'page_id' => Page::factory(),
            'page_id' => fake()->numberBetween(1, 5),
            'poster_id' => User::factory(),
            'title' => fake()->sentence(),
            'content' => fake()->paragraph(3),
            'comment_count' => 0,
            'mvp_talker_id' => null,
            'created_at' => now(),
        ];
    }
}
