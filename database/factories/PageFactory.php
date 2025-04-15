<?php

namespace Database\Factories;

use App\Models\Member;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Page>
 */
class PageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'creator_id' => Member::factory(), // 自動建立一位會員作為創作者
            'title' => fake()->sentence(3),
            'post_count' => fake()->numberBetween(0, 20),
            'created_at' => now(),
        ];
    }
}
