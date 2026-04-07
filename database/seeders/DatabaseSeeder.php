<?php

namespace Database\Seeders;

use App\Models\Announcement;
use App\Models\Article;
use App\Models\PpdbRegistration;
use App\Models\SchoolUnit;
use App\Models\Teacher;
use App\Models\User;
use App\Models\VideoDocumentation;
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

        $this->call(HeroSectionSeeder::class);

        // Create school units with specific names for PPDB form
        $schoolUnits = collect([
            SchoolUnit::create([
                'name' => 'TK Lahiza',
                'slug' => 'tk-lahiza',
                'description' => 'Taman Kanak-Kanak Lahiza Sunnah mengedepankan pendidikan anak usia dini sesuai fitrah dengan pendekatan natural learning.',
                'philosophy' => 'Mendidik anak-anak dengan pendekatan yang sesuai dengan fitrahnya, dekat dengan alam, dan mengembangkan karakter nabawiyah.',
                'max_quota' => 30,
                'is_active' => true,
            ]),
            SchoolUnit::create([
                'name' => 'SD Lahiza',
                'slug' => 'sd-lahiza',
                'description' => 'Sekolah Dasar Lahiza Sunnah mengintegrasikan pembelajaran akademik dengan pengalaman praktis di alam dan pertanian.',
                'philosophy' => 'Membangun generasi yang berpengetahuan, berkarakter, dan dekat dengan alam serta pemahaman nilai-nilai agama.',
                'max_quota' => 40,
                'is_active' => true,
            ]),
        ]);

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

        // Create video documentations
        VideoDocumentation::factory(8)->create();
    }
}
