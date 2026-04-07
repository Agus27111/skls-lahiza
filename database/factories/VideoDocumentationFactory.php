<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VideoDocumentation>
 */
class VideoDocumentationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = ['Pembelajaran', 'Peternakan', 'Pertanian', 'Adab', 'Olahraga', 'Seni', 'Kepemimpinan', 'Komunitas'];
        $thumbnails = [
            'https://images.unsplash.com/photo-1594498653385-d5172c532c00?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80',
            'https://images.unsplash.com/photo-1599027528406-245d50c2b0e9?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80',
            'https://images.unsplash.com/photo-1535905557558-afc4877a26fc?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80',
            'https://images.unsplash.com/photo-1469571486292-20577e8e935f?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80',
            'https://images.unsplash.com/photo-1516534775068-bb4c4dbe763b?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80',
            'https://images.unsplash.com/photo-1491841573634-28fb1df32293?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80',
            'https://images.unsplash.com/photo-1509914866180-6ceb992ffc00?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80',
            'https://images.unsplash.com/photo-1509042239860-f550ce710b93?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80',
        ];

        return [
            'title' => $this->faker->sentence(4),
            'description' => $this->faker->paragraph(),
            'thumbnail' => $this->faker->randomElement($thumbnails),
            'youtube_url' => 'https://www.youtube.com/watch?v=' . $this->faker->lexify('??????????'),
            'youtube_playlist_id' => 'PL1rZQsKFIdk-wQWh8lLnuEp9t6dDvqRHI',
            'category' => $this->faker->randomElement($categories),
            'order' => $this->faker->numberBetween(0, 10),
            'is_active' => $this->faker->boolean(80),
        ];
    }
}
