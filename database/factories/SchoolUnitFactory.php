<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SchoolUnitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->words(3, true);

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => fake()->sentences(3, true),
            'philosophy' => fake()->sentences(5, true),
            'max_quota' => fake()->numberBetween(50, 500),
            'is_active' => true,
        ];
    }

    /**
     * Indicate that the school unit is inactive.
     */
    public function inactive(): static
    {
        return $this->state(fn(array $attributes) => [
            'is_active' => false,
        ]);
    }
}
