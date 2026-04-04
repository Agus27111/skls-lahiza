<?php

namespace Database\Seeders;

use App\Models\Announcement;
use App\Models\Article;
use App\Models\PpdbRegistration;
use App\Models\SchoolUnit;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
        ]);

        // Create additional users
        User::factory(5)->create();

        // Create school units
        $schoolUnits = SchoolUnit::factory(3)->create();

        // For each school unit, create related data
        $schoolUnits->each(function (SchoolUnit $schoolUnit) {
            // Create teachers for this school unit
            $teachers = Teacher::factory(8)
                ->for($schoolUnit)
                ->create();

            // Create PPDB registrations
            PpdbRegistration::factory(15)
                ->for($schoolUnit)
                ->create();

            // Create articles authored by these teachers
            $teachers->each(function (Teacher $teacher) {
                Article::factory(3)
                    ->for($teacher)
                    ->create();
            });

            // Create announcements for this school unit
            Announcement::factory(5)
                ->for($schoolUnit)
                ->create();
        });
    }
}
