<?php

namespace Database\Factories;

use App\Models\Post;
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
            'title' => fake()->text(64),
            'description' => fake()->text(512),
            'text' => fake()->text(1024),
            'state' => fake()->boolean()
        ];
    }

    public function configure(): static
    {
        return $this->afterCreating(function (Post $post) {
            $post->url = url('/api/news/' . $post->id);
            $post->save();
        });
    }
}
