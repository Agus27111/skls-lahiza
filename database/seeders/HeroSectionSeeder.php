<?php

namespace Database\Seeders;

use App\Models\HeroSection;
use Illuminate\Database\Seeder;

class HeroSectionSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        HeroSection::updateOrCreate(
            ['title_highlight' => 'Fitrah'],
            [
                'eyebrow_text' => 'Penerimaan Peserta Didik Baru 2026/2027',
                'title_prefix' => 'Mendidik Sesuai',
                'title_suffix' => 'Tumbuh Bersama Alam.',
                'description' => 'Sekolah berbasis Karakter Nabawiyah yang menjadikan ketahanan pangan, pertanian, dan peternakan sebagai laboratorium kehidupan utama anak-anak kita.',
                'primary_button_label' => 'Mulai Pendaftaran',
                'primary_button_url' => '#ppdb',
                'secondary_button_label' => 'Kenali Filosofi Kami',
                'secondary_button_url' => '#tentang',
                'image_path' => 'https://images.unsplash.com/photo-1594498653385-d5172c532c00?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
                'image_alt' => 'Anak-anak di alam',
                'floating_badge_label' => 'Pembelajaran Aktif',
                'floating_badge_text' => '100% Berbasis Alam',
                'is_ppdb_active' => true,
                'is_active' => true,
            ],
        );
    }
}
