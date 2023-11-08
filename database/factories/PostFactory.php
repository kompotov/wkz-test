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
        $date = $this->faker->dateTimeBetween('-1 year')->format('Y-m-d H:i:s');
        return [
            'title' => fake()->text(64),
            'description' => fake()->text(512),
            'text' => fake()->text(1024),
            'state' => fake()->boolean(),
            'created_at' => $date,
            'updated_at' => $date
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
