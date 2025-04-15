<?php

namespace Database\Factories;

use App\Models\Member;
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
            'page_id' => Page::factory(), // 建立一個 Page
            'poster_id' => Member::factory(), // 建立一個 Member 作為貼文者
            'title' => $this->faker->sentence(4),
            'comment_count' => 0, // 一開始為 0，可後續更新
            'mvp_talker_id' => null, // 可選，有留言後再指派 MVP
            'created_at' => now(),
        ];
    }
}
