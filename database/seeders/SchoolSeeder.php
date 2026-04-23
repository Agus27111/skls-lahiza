<?php

namespace Database\Seeders;

use App\Models\School;
use App\Support\Tenant;
use Illuminate\Database\Seeder;

class SchoolSeeder extends Seeder
{
    public function run(): void
    {
        $school = School::query()->first();

        if (! $school) {
            $school = School::query()->create([
                'name' => 'Default School',
                'domain' => config('app.url') ? parse_url(config('app.url'), PHP_URL_HOST) : null,
                'primary_color' => '#15803d',
                'secondary_color' => '#d97706',
                'font_sans' => "Inter, ui-sans-serif, system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', sans-serif",
                'is_active' => true,
            ]);
        }

        Tenant::setSchoolId((int) $school->getKey());
    }
}
