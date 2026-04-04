<?php

namespace Database\Factories;

use App\Models\SchoolUnit;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PpdbRegistrationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'registration_number' => 'REG-' . Str::upper(Str::random(8)),
            'school_unit_id' => SchoolUnit::factory(),
            'student_name' => fake()->name(),
            'student_birth_date' => fake()->dateTimeBetween('-18 years', '-5 years'),
            'student_gender' => fake()->randomElement(['Laki-laki', 'Perempuan']),
            'student_address' => fake()->address(),
            'parent_name' => fake()->name(),
            'parent_phone' => fake()->phoneNumber(),
            'parent_email' => fake()->safeEmail(),
            'parent_address' => fake()->address(),
            'parent_relationship' => fake()->randomElement(['Ayah', 'Ibu', 'Wali']),
            'status' => fake()->randomElement(['pending', 'confirmed', 'rejected', 'accepted']),
            'registration_fee' => 250000,
            'fee_paid' => fake()->boolean(70),
            'notes' => fake()->optional()->sentence(),
            'confirmed_at' => fake()->boolean(70) ? now() : null,
        ];
    }

    /**
     * Indicate that the registration is accepted and paid.
     */
    public function accepted(): static
    {
        return $this->state(fn(array $attributes) => [
            'status' => 'accepted',
            'fee_paid' => true,
            'confirmed_at' => now(),
        ]);
    }

    /**
     * Indicate that the registration is confirmed.
     */
    public function confirmed(): static
    {
        return $this->state(fn(array $attributes) => [
            'status' => 'confirmed',
            'fee_paid' => true,
            'confirmed_at' => now(),
        ]);
    }

    /**
     * Indicate that the registration is rejected.
     */
    public function rejected(): static
    {
        return $this->state(fn(array $attributes) => [
            'status' => 'rejected',
        ]);
    }

    /**
     * Indicate that the registration is pending.
     */
    public function pending(): static
    {
        return $this->state(fn(array $attributes) => [
            'status' => 'pending',
            'fee_paid' => false,
        ]);
    }
}
