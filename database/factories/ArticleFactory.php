<?php

namespace Database\Factories;

use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence();

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'excerpt' => fake()->sentences(2, true),
            'content' => fake()->paragraphs(5, true),
            'category' => fake()->randomElement(['Berita', 'Artikel', 'Pengumuman', 'Tips Belajar', 'Penghargaan']),
            'image' => fake()->imageUrl(800, 400, 'education'),
            'teacher_id' => Teacher::factory(),
            'published' => true,
            'published_at' => fake()->dateTimeThisMonth(),
            'views' => fake()->numberBetween(0, 1000),
        ];
    }

    /**
     * Indicate that the article is not published.
     */
    public function unpublished(): static
    {
        return $this->state(fn(array $attributes) => [
            'published' => false,
            'published_at' => null,
        ]);
    }

    /**
     * Indicate that the article is a draft.
     */
    public function draft(): static
    {
        return $this->state(fn(array $attributes) => [
            'published' => false,
            'published_at' => null,
            'views' => 0,
        ]);
    }
}
