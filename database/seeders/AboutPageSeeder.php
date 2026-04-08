<?php

namespace Database\Seeders;

use App\Models\AboutPage;
use Illuminate\Database\Seeder;

class AboutPageSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        AboutPage::updateOrCreate(
            ['hero_title' => 'Tentang Kami'],
            [
                'eyebrow_text' => 'Mengenal Lebih Dekat',
                'hero_description' => 'Sekolah Lahiza Sunnah adalah lembaga pendidikan berbasis karakter nabawiyah yang mengintegrasikan ilmu pengetahuan dengan pembelajaran dari alam.',
                'history_title' => 'Sejarah & Perjalanan Kami',
                'history_paragraphs' => [
                    'Sekolah Lahiza Sunnah didirikan dengan visi untuk menciptakan pendidikan yang harmonis antara ilmu pengetahuan modern dan nilai-nilai Islam yang kuat. Kami percaya bahwa anak-anak adalah amanah yang harus dididik sesuai dengan fitrah mereka.',
                    'Dengan mengintegrasikan kegiatan pertanian, peternakan, dan pembelajaran alam sebagai belahan utama pendidikan, kami menciptakan generasi yang mandiri, berkarakter, dan mencintai lingkungan.',
                ],
                'history_image_path' => 'https://images.unsplash.com/photo-1427504494785-cdab38d7b331?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                'history_image_alt' => 'Aktivitas Sekolah',
                'vision_text' => 'Menjadi sekolah yang menghasilkan generasi berkarakter Nabawiyah, mandiri, peduli lingkungan, dan mencintai ilmu pengetahuan.',
                'mission_text' => 'Menyelenggarakan pendidikan terintegrasi yang mengembangkan karakter, keterampilan hidup, dan pemahaman mendalam tentang alam sebagai tempat belajar utama.',
                'goal_text' => 'Mengembangkan potensi siswa secara holistik melalui pembelajaran experiential berbasis alam dan nilai-nilai Islam.',
                'core_values_heading' => 'Nilai-Nilai Inti Kami',
                'core_values' => [
                    [
                        'icon' => 'heart',
                        'title' => 'Adab & Akhlak',
                        'description' => 'Pembentukan karakter mulia melalui teladan dan praktek',
                    ],
                    [
                        'icon' => 'sprout',
                        'title' => 'Kemandirian',
                        'description' => 'Mengembangkan kemampuan berdiri sendiri dan bertanggung jawab',
                    ],
                    [
                        'icon' => 'leaf',
                        'title' => 'Cinta Alam',
                        'description' => 'Menghargai dan menjaga lingkungan sebagai amanah dari Tuhan',
                    ],
                    [
                        'icon' => 'book-open-check',
                        'title' => 'Ilmu Bermanfaat',
                        'description' => 'Mengejar ilmu yang bermanfaat untuk diri dan masyarakat',
                    ],
                ],
                'school_units_heading' => 'Unit Pendidikan Kami',
                'school_units_description' => 'Setiap unit dirancang khusus sesuai dengan tahap perkembangan anak',
                'teachers_heading' => 'Murobbi & Fasilitator Kami',
                'teachers_description' => 'Tim pendidik profesional yang berkomitmen mengembangkan potensi setiap anak',
                'facilities_title' => 'Fasilitas & Sarana Belajar',
                'facilities' => [
                    [
                        'title' => 'Kebun Organik',
                        'description' => 'Lahan pertanian untuk pembelajaran praktis budidaya tanaman',
                    ],
                    [
                        'title' => 'Kandang Ternak',
                        'description' => 'Fasilitas peternakan kambing dan ayam untuk edukasi kesejahteraan hewan',
                    ],
                    [
                        'title' => 'Ruang Kelas Modern',
                        'description' => 'Kelas dengan teknologi pembelajaran terkini dan desain ergonomis',
                    ],
                    [
                        'title' => 'Perpustakaan Islami',
                        'description' => 'Koleksi buku pengetahuan umum dan referensi Islam',
                    ],
                ],
                'facilities_image_path' => 'https://images.unsplash.com/photo-1523580494863-6f3031224c94?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                'facilities_image_alt' => 'Fasilitas Sekolah',
                'programs_title' => 'Program Unggulan Kami',
                'programs' => [
                    [
                        'icon' => 'sprout',
                        'title' => 'Urban Farming',
                        'description' => 'Pembelajaran praktis budidaya tanaman di lahan terbatas dengan metode organik',
                    ],
                    [
                        'icon' => 'heart-handshake',
                        'title' => 'Karakter Nabawiyah',
                        'description' => 'Pembentukan karakter mulia berdasarkan teladan Nabi Muhammad SAW',
                    ],
                    [
                        'icon' => 'leaf',
                        'title' => 'Konservasi Alam',
                        'description' => 'Edukasi pelestarian lingkungan dan kesadaran ekologis sejak dini',
                    ],
                ],
                'cta_title' => 'Tertarik Bergabung Bersama Kami?',
                'cta_description' => 'Hubungi kami untuk mendapatkan informasi lebih lengkap tentang program penerimaan peserta didik baru',
                'cta_primary_label' => 'Kembali ke Beranda',
                'cta_primary_url' => '/',
                'cta_secondary_label' => 'Daftar Sekarang',
                'cta_secondary_url' => '/#ppdb',
                'is_active' => true,
            ],
        );
    }
}
