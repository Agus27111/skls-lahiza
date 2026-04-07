<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PhotoDocumentation>
 */
class PhotoDocumentationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(2),
            'image_path' => $this->faker->imageUrl(640, 480),
            'category' => 'Jejak Langkah',
            'caption' => $this->faker->text(100),
            'photo_date' => $this->faker->dateTimeBetween('-3 months'),
            'order' => 0,
            'is_active' => true,
        ];
    }

    /**
     * State to make the photo active
     */
    public function active(): static
    {
        return $this->state(fn(array $attributes) => [
            'is_active' => true,
        ]);
    }

    /**
     * State to make the photo inactive
     */
    public function inactive(): static
    {
        return $this->state(fn(array $attributes) => [
            'is_active' => false,
        ]);
    }
}
