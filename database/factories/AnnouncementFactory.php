<?php

namespace Database\Factories;

use App\Models\SchoolUnit;
use Illuminate\Database\Eloquent\Factories\Factory;

class AnnouncementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'content' => fake()->paragraphs(3, true),
            'type' => fake()->randomElement(['info', 'warning', 'success', 'danger']),
            'icon' => fake()->randomElement(['bell', 'star', 'info', 'alert', 'check']),
            'is_active' => true,
            'is_featured' => fake()->boolean(30),
            'school_unit_id' => SchoolUnit::factory(),
            'published_at' => now(),
            'archived_at' => null,
        ];
    }

    /**
     * Indicate that the announcement is archived.
     */
    public function archived(): static
    {
        return $this->state(fn(array $attributes) => [
            'archived_at' => now(),
        ]);
    }

    /**
     * Indicate that the announcement is inactive.
     */
    public function inactive(): static
    {
        return $this->state(fn(array $attributes) => [
            'is_active' => false,
        ]);
    }

    /**
     * Indicate that the announcement is featured.
     */
    public function featured(): static
    {
        return $this->state(fn(array $attributes) => [
            'is_featured' => true,
        ]);
    }
}
