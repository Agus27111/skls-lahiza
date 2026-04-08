<?php

namespace Database\Seeders;

use App\Models\SchoolUnit;
use Illuminate\Database\Seeder;

class SchoolUnitFeaturedProgramSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        collect([
            'tk-lahiza' => [
                'featured_program' => 'Pembelajaran fitrah, eksplorasi alam, dan pembiasaan adab islami sejak dini.',
                'featured_programs' => [
                    ['program' => 'Pembelajaran fitrah sesuai tahap perkembangan anak.'],
                    ['program' => 'Eksplorasi alam sebagai media belajar utama.'],
                    ['program' => 'Pembiasaan adab islami sejak dini.'],
                ],
            ],
            'sd-lahiza' => [
                'featured_program' => 'Ketahanan pangan, pembelajaran kontekstual, dan penguatan karakter nabawiyah.',
                'featured_programs' => [
                    ['program' => 'Ketahanan pangan melalui praktik kebun dan ternak.'],
                    ['program' => 'Pembelajaran kontekstual yang terhubung dengan kehidupan nyata.'],
                    ['program' => 'Penguatan karakter nabawiyah dalam keseharian.'],
                ],
            ],
        ])->each(function (array $payload, string $slug): void {
            SchoolUnit::query()
                ->where('slug', $slug)
                ->update($payload);
        });
    }
}
