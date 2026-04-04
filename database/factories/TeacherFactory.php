<?php

namespace Database\Factories;

use App\Models\SchoolUnit;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->name();

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'title' => fake()->jobTitle(),
            'bio' => fake()->sentences(3, true),
            'position' => fake()->randomElement(['Kepala Sekolah', 'Wakil Kepala', 'Guru Kelas', 'Guru Mata Pelajaran']),
            'image' => fake()->imageUrl(300, 300, 'people'),
            'school_unit_id' => SchoolUnit::factory(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'is_active' => true,
        ];
    }

    /**
     * Indicate that the teacher is inactive.
     */
    public function inactive(): static
    {
        return $this->state(fn(array $attributes) => [
            'is_active' => false,
        ]);
    }
}
