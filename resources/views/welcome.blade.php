<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <title>Sekolah Lahiza Sunnah - Mendidik Sesuai Fitrah</title>
    @include('partials.head')
    <style>
        /* CSS Khusus untuk Fitur Cetak Invoice */
        @media print {

            html,
            body {
                margin: 0 !important;
                padding: 0 !important;
                width: 100%;
                height: auto;
            }

            body {
                background: white !important;
            }

            /* Hide everything except invoice modal */
            body>*:not(#invoice-modal) {
                display: none !important;
            }

            #invoice-modal {
                display: block !important;
                position: static !important;
                margin: 0 !important;
                padding: 0 !important;
                width: 100% !important;
                height: auto !important;
                background: white !important;
                border: none !important;
                box-shadow: none !important;
                z-index: 1 !important;
            }

            /* Hide backdrop (first div child) */
            #invoice-modal>div:first-child {
                display: none !important;
            }

            /* Hide scrollable wrapper but show invoice-content inside */
            #invoice-modal>div:last-child {
                display: block !important;
                position: static !important;
                width: 100% !important;
                height: auto !important;
                padding: 0 !important;
                margin: 0 !important;
                overflow: visible !important;
            }

            #invoice-content {
                display: block !important;
                position: static !important;
                width: 100% !important;
                max-width: 100% !important;
                margin: 0 !important;
                padding: 40px !important;
                background: white !important;
                border: none !important;
                border-radius: 0 !important;
                box-shadow: none !important;
                animation: none !important;
                rounded: 0 !important;
            }

            #invoice-content * {
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }

            .no-print {
                display: none !important;
            }

            * {
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }
        }

        .hero-pattern {
            background-color: #fef3c7;
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='#d97706' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
    </style>
</head>

<body class="bg-stone-50 text-stone-800 font-sans antialiased">

    @include('partials.navbar')
    @include('partials.whatsapp-button')

    @php
        $hero = $heroSection ?? null;
        $isPpdbActive = $hero?->is_ppdb_active ?? true;
        $shouldShowPrimaryPpdbButton = $isPpdbActive || ($hero?->primary_button_url ?? '#ppdb') !== '#ppdb';
        $ppdbLimits = $ppdbUploadLimits ?? [
            'per_file_kb' => 2048,
            'per_file_mb_label' => '2',
            'total_post_kb' => 8192,
            'total_post_mb_label' => '8',
        ];
        $paymentSetting = $ppdbPaymentSetting ?? null;
        $registrationFeeFormatted = $paymentSetting?->formatted_registration_fee ?? 'Rp 250.000';
    @endphp

    <!-- Hero Section -->
    <section id="beranda" class="relative pt-20 pb-16 md:pt-32 md:pb-24 flex items-center min-h-[90vh] hero-pattern">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div class="text-center md:text-left">
                    @if ($isPpdbActive)
                        <span
                            class="inline-block py-1 px-3 rounded-full bg-sand text-secondary font-semibold text-sm mb-4 border border-secondary/20">
                            {{ $hero?->eyebrow_text ?? 'Penerimaan Peserta Didik Baru 2026/2027' }}
                        </span>
                    @endif
                    <h1 class="font-serif text-4xl md:text-5xl lg:text-6xl font-bold text-earth leading-tight mb-6">
                        {{ $hero?->title_prefix ?? 'Mendidik Sesuai' }} <span
                            class="text-primary">{{ $hero?->title_highlight ?? 'Fitrah' }}</span>,<br>{{ $hero?->title_suffix ?? 'Tumbuh Bersama Alam.' }}
                    </h1>
                    <p class="text-lg text-stone-600 mb-8 max-w-lg mx-auto md:mx-0">
                        {{ $hero?->description ?? 'Sekolah berbasis Karakter Nabawiyah yang menjadikan ketahanan pangan, pertanian, dan peternakan sebagai laboratorium kehidupan utama anak-anak kita.' }}
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
                        @if ($shouldShowPrimaryPpdbButton)
                            <a href="{{ $hero?->primary_button_url ?? '#ppdb' }}"
                                class="bg-primary hover:bg-earth text-white px-8 py-3.5 rounded-full font-medium transition shadow-xl shadow-primary/20 text-center">
                                {{ $hero?->primary_button_label ?? 'Mulai Pendaftaran' }}
                            </a>
                        @endif
                        <a href="{{ $hero?->secondary_button_url ?? '#tentang' }}"
                            class="bg-white hover:bg-stone-50 text-earth border-2 border-earth/10 px-8 py-3.5 rounded-full font-medium transition text-center flex justify-center items-center gap-2">
                            <i data-lucide="play-circle" class="w-5 h-5 text-secondary"></i>
                            {{ $hero?->secondary_button_label ?? 'Kenali Filosofi Kami' }}
                        </a>
                    </div>
                </div>
                <div class="relative">
                    <div
                        class="absolute inset-0 bg-primary/10 rounded-full blur-3xl transform translate-x-10 translate-y-10">
                    </div>
                    <img src="{{ $hero?->image_url ?? 'https://images.unsplash.com/photo-1594498653385-d5172c532c00?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80' }}"
                        alt="{{ $hero?->image_alt ?? 'Anak-anak di alam' }}"
                        class="rounded-t-[100px] rounded-b-3xl shadow-2xl relative z-10 border-8 border-white object-cover h-[500px] w-full">

                    <!-- Floating Badge -->
                    <div class="absolute -bottom-6 -left-6 bg-white p-4 rounded-2xl shadow-xl z-20 flex items-center gap-4 animate-bounce"
                        style="animation-duration: 3s;">
                        <div class="bg-sand p-3 rounded-full text-secondary">
                            <i data-lucide="sprout" class="w-8 h-8"></i>
                        </div>
                        <div>
                            <p class="text-xs text-stone-500 font-medium">
                                {{ $hero?->floating_badge_label ?? 'Pembelajaran Aktif' }}
                            </p>
                            <p class="font-bold text-earth">{{ $hero?->floating_badge_text ?? '100% Berbasis Alam' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Tentang Sekolah -->
    <section id="tentang" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <i data-lucide="book-open-check" class="w-12 h-12 text-secondary mx-auto mb-4"></i>
                <h2 class="font-serif text-3xl md:text-4xl font-bold text-earth mb-4">Filosofi Pendidikan Nabawiyah</h2>
                <div class="w-24 h-1 bg-primary mx-auto rounded-full mb-6"></div>
                <p class="text-stone-600 text-lg">
                    "Ajarilah anak-anakmu memanah, berenang, dan berkuda." Konsep kemandirian dan kekuatan fisik dalam
                    Islam kami terjemahkan melalui keseharian yang dekat dengan alam.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
                <div class="order-2 md:order-1 relative">
                    <img src="https://images.unsplash.com/photo-1500595046743-cd271d694d30?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                        alt="Peternakan dan Anak" class="rounded-3xl shadow-lg w-full">
                    <img src="https://images.unsplash.com/photo-1615811361523-6bd03d7748e7?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"
                        alt="Sayuran segar"
                        class="absolute -bottom-8 -right-8 w-48 h-48 object-cover rounded-2xl border-8 border-white shadow-xl hidden md:block">
                </div>
                <div class="order-1 md:order-2 space-y-6">
                    <h3 class="font-serif text-2xl font-bold text-earth">Ketahanan Pangan sebagai Laboratorium Utama
                    </h3>
                    <p class="text-stone-600 leading-relaxed">
                        Di Lahiza Sunnah, kebun dan peternakan bukanlah sekadar ekstrakurikuler. Mereka adalah ruang
                        kelas utama kami.
                    </p>
                    <ul class="space-y-4">
                        <li class="flex items-start gap-3">
                            <i data-lucide="check-circle-2" class="w-6 h-6 text-primary shrink-0 mt-0.5"></i>
                            <div>
                                <strong class="text-earth block">Merawat Ternak (Kambing & Ayam)</strong>
                                <span class="text-stone-600 text-sm">Menumbuhkan sifat kasih sayang, kesabaran, dan
                                    tanggung jawab seperti para Nabi yang menggembala.</span>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <i data-lucide="check-circle-2" class="w-6 h-6 text-primary shrink-0 mt-0.5"></i>
                            <div>
                                <strong class="text-earth block">Bercocok Tanam (Sayur & Buah)</strong>
                                <span class="text-stone-600 text-sm">Memahami proses, menghargai makanan, dan belajar
                                    ikhtiar serta tawakkal kepada sang Maha Pencipta.</span>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <i data-lucide="check-circle-2" class="w-6 h-6 text-primary shrink-0 mt-0.5"></i>
                            <div>
                                <strong class="text-earth block">Adab Sebelum Ilmu</strong>
                                <span class="text-stone-600 text-sm">Fokus utama pada pembentukan adab, akhlak mulia,
                                    dan kecintaan kepada Allah dan Rasul-Nya.</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Unit Sekolah -->
    <section id="unit" class="py-20 bg-leaf relative overflow-hidden">
        <!-- Decorative elements -->
        <div class="absolute top-0 right-0 opacity-10">
            <svg width="400" height="400" viewBox="0 0 24 24" fill="none" stroke="#15803d" stroke-width="1">
                <path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6" />
            </svg>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-16">
                <h2 class="font-serif text-3xl md:text-4xl font-bold text-earth mb-4">Unit Pendidikan Kami</h2>
                <div class="w-24 h-1 bg-secondary mx-auto rounded-full mb-6"></div>
                <p class="text-stone-600">Fokus pada tahap perkembangan anak (Fitrah) sesuai panduan Islam.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-12">
                @forelse($schoolUnits as $unit)
                    <!-- Unit Card -->
                    <div
                        class="bg-white rounded-[2rem] p-8 md:p-10 shadow-xl border border-stone-100 hover:shadow-2xl transition group relative overflow-hidden">
                        <div
                            class="absolute top-0 right-0 w-32 h-32 {{ $loop->first ? 'bg-sand' : 'bg-primary/10' }} rounded-bl-full -z-0 transition group-hover:scale-110">
                        </div>
                        <div class="relative z-10">
                            <div
                                class="w-16 h-16 {{ $loop->first ? 'bg-secondary/10 text-secondary' : 'bg-primary/10 text-primary' }} rounded-2xl flex items-center justify-center mb-6">
                                <i data-lucide="{{ $loop->first ? 'sun' : 'compass' }}" class="w-8 h-8"></i>
                            </div>
                            <h3 class="font-serif text-2xl font-bold text-earth mb-3">{{ $unit->name }}</h3>
                            <p class="text-primary font-medium mb-4">{{ $unit->philosophy }}</p>
                            <p class="text-stone-600 mb-6 leading-relaxed">
                                {{ $unit->description }}
                            </p>
                            <ul class="space-y-2 mb-8">
                                @forelse ($unit->featured_programs_list as $program)
                                    <li class="flex items-center gap-2 text-stone-600"><i
                                            data-lucide="{{ $loop->parent->first ? 'bird' : 'shovel' }}"
                                            class="w-4 h-4 {{ $loop->parent->first ? 'text-secondary' : 'text-primary' }}"></i>
                                        {{ $program }}</li>
                                @empty
                                    <li class="flex items-center gap-2 text-stone-600"><i
                                            data-lucide="{{ $loop->first ? 'bird' : 'shovel' }}"
                                            class="w-4 h-4 {{ $loop->first ? 'text-secondary' : 'text-primary' }}"></i>
                                        Program unggulan belum diatur</li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                @empty
                    <div class="col-span-2 text-center py-12 px-6 bg-stone-50 rounded-2xl">
                        <p class="text-stone-600">Unit pendidikan tidak tersedia saat ini</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Galeri & Guru -->
    <section id="galeri" class="py-20 bg-stone-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Asatidz (Guru) -->
            <div class="flex flex-col md:flex-row justify-between items-end mb-12">
                <div>
                    <h2 class="font-serif text-3xl font-bold text-earth mb-2">Murobbi & Fasilitator Kami</h2>
                    <p class="text-stone-600">Tim profesional yang berkomitmen mengembangkan potensi setiap anak</p>
                </div>
                <a href="{{ route('about') }}"
                    class="text-primary font-medium hover:underline mt-4 md:mt-0 flex items-center gap-1">
                    Lihat Selengkapnya <i data-lucide="arrow-right" class="w-4 h-4"></i>
                </a>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
                @forelse($teachers->take(4) as $teacher)
                    <!-- Guru Card -->
                    <div class="text-center group cursor-pointer">
                        <div
                            class="w-32 h-32 mx-auto rounded-full bg-sand border-4 border-white shadow-lg overflow-hidden mb-4 group-hover:shadow-xl transition">
                            @if ($teacher->image_url)
                                <img src="{{ $teacher->image_url }}" alt="{{ $teacher->name }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                            @else
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($teacher->name) }}&background=78350f&color=fff&size=150"
                                    alt="{{ $teacher->name }}" class="w-full h-full object-cover">
                            @endif
                        </div>
                        <h4 class="font-bold text-earth text-lg group-hover:text-primary transition">
                            {{ $teacher->name }}</h4>
                        <p class="text-primary text-sm font-medium">{{ $teacher->position }}</p>
                    </div>
                @empty
                    <div class="col-span-4 text-center py-8 px-6 bg-white rounded-2xl">
                        <p class="text-stone-600">Data guru tidak tersedia</p>
                    </div>
                @endforelse
            </div>
            @if ($teachers->count() > 4)
                <div class="text-center mt-12">
                    <a href="{{ route('about') }}"
                        class="inline-block bg-primary hover:bg-earth text-white px-8 py-3.5 rounded-full font-medium transition shadow-lg">
                        Lihat Semua Murobbi Kami
                    </a>
                </div>
            @endif
        </div>
    </section>

    <!-- Informasi & Artikel -->
    <section id="informasi" class="py-20 bg-white border-t border-stone-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                <!-- Kolom Blog/Parenting -->
                <div class="lg:col-span-2">
                    <div class="flex items-center gap-3 mb-8">
                        <i data-lucide="book-open" class="w-6 h-6 text-secondary"></i>
                        <h2 class="font-serif text-2xl font-bold text-earth">Parenting Berbasis Fitrah</h2>
                    </div>
                    <div class="space-y-6">
                        @forelse($articles as $article)
                            <!-- Artikel -->
                            <a href="{{ route('articles.show', $article) }}"
                                class="flex flex-col sm:flex-row gap-6 group cursor-pointer hover:opacity-80 transition">
                                <div class="w-full sm:w-48 h-32 rounded-xl overflow-hidden shrink-0">
                                    @if ($article->image_url)
                                        <img src="{{ $article->image_url }}" alt="{{ $article->title }}"
                                            class="w-full h-full object-cover group-hover:scale-105 transition">
                                    @else
                                        <div
                                            class="w-full h-full bg-gradient-to-br from-primary/20 to-secondary/20 flex items-center justify-center">
                                            <i data-lucide="book-open" class="w-12 h-12 text-primary/40"></i>
                                        </div>
                                    @endif
                                </div>
                                <div>
                                    <span
                                        class="text-xs font-bold text-primary tracking-wider uppercase">{{ $article->category }}</span>
                                    <h3
                                        class="font-serif text-lg font-bold text-earth mt-1 group-hover:text-primary transition">
                                        {{ $article->title }}</h3>
                                    <p class="text-stone-600 text-sm mt-2 line-clamp-2">{{ $article->excerpt }}</p>
                                    <span
                                        class="text-xs text-stone-400 mt-2 block">{{ $article->published_at->format('d M Y') }}</span>
                                </div>
                            </a>
                        @empty
                            <div class="text-center py-8 px-6 bg-stone-50 rounded-2xl">
                                <p class="text-stone-600">Belum ada artikel yang dipublikasikan</p>
                            </div>
                        @endforelse
                    </div>
                </div>

                <!-- Kolom Pengumuman -->
                <div class="bg-sand rounded-3xl p-8 border border-secondary/20 h-fit">
                    <div class="flex items-center gap-3 mb-6">
                        <i data-lucide="bell-ring" class="w-6 h-6 text-earth"></i>
                        <h2 class="font-serif text-xl font-bold text-earth">Papan Pengumuman</h2>
                    </div>
                    <ul class="space-y-4">
                        @forelse($announcements as $announcement)
                            <li
                                class="bg-white p-4 rounded-xl shadow-sm {{ $announcement->is_featured ? 'border-l-4 border-secondary' : '' }}">
                                <div class="text-primary font-bold text-sm mb-1">{{ $announcement->title }}</div>
                                <div class="text-stone-600 text-sm">{{ $announcement->content }}</div>
                            </li>
                        @empty
                            <li class="bg-white p-4 rounded-xl shadow-sm">
                                <div class="text-stone-500 text-sm">Belum ada pengumuman</div>
                            </li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Dokumentasi Video YouTube -->
    <section id="dokumentasi-video" class="py-20 bg-white border-t border-stone-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-end mb-12">
                <div>
                    <h2 class="font-serif text-3xl font-bold text-earth mb-2">Jejak Langkah di Alam</h2>
                    <p class="text-stone-600">Dokumentasi kegiatan keseharian siswa Lahiza Sunnah.</p>
                </div>
                <a href="/jejak-langkah"
                    class="text-primary font-medium hover:underline mt-4 md:mt-0 flex items-center gap-1">
                    Lihat Semua <i data-lucide="arrow-right" class="w-4 h-4"></i>
                </a>
            </div>

            <!-- Galeri Grid -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-20">
                @forelse($photos as $photo)
                    <div class="aspect-square rounded-2xl overflow-hidden group cursor-pointer"
                        onclick="openPhotoModal(@js($photo->image_url), @js($photo->title))">
                        <img src="{{ $photo->image_url }}" alt="{{ $photo->title }}"
                            class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition"></div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12">
                        <p class="text-stone-600">Belum ada dokumentasi foto</p>
                    </div>
                @endforelse
            </div>
            <div class="text-center mb-16">
                <div class="flex items-center justify-center gap-3 mb-4">
                    <i data-lucide="play-circle" class="w-8 h-8 text-secondary"></i>
                    <h2 class="font-serif text-3xl md:text-4xl font-bold text-earth">Dokumentasi Video</h2>
                </div>
                <div class="w-24 h-1 bg-primary mx-auto rounded-full mb-6"></div>
                <p class="text-stone-600 max-w-2xl mx-auto">Koleksi video pembelajaran dan kegiatan sehari-hari siswa
                    Lahiza Sunnah yang dapat dibuka dalam popup player.</p>
            </div>

            <!-- Video Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @forelse($videos as $video)
                    <!-- Video Card -->
                    <div class="group cursor-pointer" onclick="openVideoModal('{{ $video->youtube_playlist_id }}')">
                        <div
                            class="relative overflow-hidden rounded-2xl bg-stone-900 aspect-video group-hover:ring-2 ring-primary transition">
                            <div
                                class="absolute inset-0 bg-black/30 group-hover:bg-black/20 transition flex items-center justify-center">
                                <div
                                    class="w-16 h-16 bg-secondary rounded-full flex items-center justify-center group-hover:scale-110 transition shadow-lg">
                                    <i data-lucide="play" class="w-8 h-8 text-white fill-current"></i>
                                </div>
                            </div>
                            <img src="{{ $video->thumbnail ?: 'https://via.placeholder.com/400x225?text=' . urlencode($video->title) }}"
                                alt="{{ $video->title }}"
                                class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                        </div>
                        <h3 class="font-bold text-earth mt-3 group-hover:text-primary transition">{{ $video->title }}
                        </h3>
                        <p class="text-sm text-stone-600">{{ $video->description ?? $video->category }}</p>
                        @if ($video->category)
                            <span
                                class="inline-block mt-2 text-xs bg-primary/10 text-primary px-2 py-1 rounded-full font-medium">{{ $video->category }}</span>
                        @endif
                    </div>
                @empty
                    <div class="col-span-full text-center py-12 px-6 bg-stone-50 rounded-2xl">
                        <i data-lucide="video-off" class="w-12 h-12 text-stone-300 mx-auto mb-4"></i>
                        <p class="text-stone-600">Belum ada video dokumentasi yang dipublikasikan</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Video Modal Popup -->
    <div id="video-modal"
        class="fixed inset-0 z-50 hidden bg-stone-900/80 backdrop-blur-sm flex items-center justify-center p-4"
        onclick="if(event.target === this) closeVideoModal()">
        <div
            class="relative w-full max-w-4xl bg-stone-900 rounded-2xl overflow-hidden shadow-2xl animate-[fadeIn_0.3s_ease-out]">
            <!-- Close Button -->
            <button onclick="closeVideoModal()"
                class="absolute top-4 right-4 bg-white/10 hover:bg-white/20 text-white p-2 rounded-full transition z-10">
                <i data-lucide="x" class="w-6 h-6"></i>
            </button>

            <!-- YouTube Embed -->
            <div class="relative w-full" style="padding-bottom: 56.25%;">
                <iframe id="youtube-player" class="absolute top-0 left-0 w-full h-full" src=""
                    title="Video Dokumentasi Lahiza Sunnah" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
                </iframe>
            </div>
        </div>
    </div>

    <!-- Photo Modal -->
    <div id="photo-modal"
        class="fixed inset-0 z-50 hidden bg-stone-900/80 backdrop-blur-sm flex items-center justify-center p-4"
        onclick="if(event.target === this) closePhotoModal()">
        <div
            class="relative w-full max-w-4xl bg-stone-900 rounded-2xl overflow-hidden shadow-2xl animate-[fadeIn_0.3s_ease-out]">
            <!-- Close Button -->
            <button onclick="closePhotoModal()"
                class="absolute top-4 right-4 bg-white/10 hover:bg-white/20 text-white p-2 rounded-full transition z-10">
                <i data-lucide="x" class="w-6 h-6"></i>
            </button>

            <!-- Photo -->
            <div class="w-full">
                <img id="photo-image" src="" alt="Foto" class="w-full h-auto object-contain">
            </div>

            <!-- Photo Title -->
            <div class="bg-stone-800 px-6 py-4">
                <h3 id="photo-title" class="text-white font-bold text-lg"></h3>
            </div>
        </div>
    </div>

    @if ($isPpdbActive)
        <!-- PPDB Form Section -->
        <section id="ppdb" class="py-24 bg-earth text-white relative">
            <div
                class="absolute inset-0 opacity-10 bg-[url('https://images.unsplash.com/photo-1550989460-0adf9ea622e2?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80')] bg-cover bg-center">
            </div>
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="text-center mb-10">
                    <span
                        class="bg-secondary/20 text-secondary-300 py-1 px-3 rounded-full text-sm font-semibold tracking-wider mb-4 inline-block">FORM
                        PENDAFTARAN</span>
                    <h2 class="font-serif text-3xl md:text-4xl font-bold mb-4">Bergabunglah Bersama Kami</h2>
                    <p class="text-stone-300 max-w-2xl mx-auto">Lengkapi formulir di bawah ini untuk pendaftaran awal.
                        Sistem akan membuatkan <strong>Invoice/Tanda Terima</strong> dan mengarahkan Anda ke WhatsApp
                        Admin.
                    </p>
                </div>

                <div class="bg-white rounded-3xl p-8 md:p-12 shadow-2xl text-stone-800">
                    <form id="form-ppdb" onsubmit="handleFormSubmit(event)" enctype="multipart/form-data">
                        @csrf
                        <div id="form-error"
                            class="hidden mb-6 p-4 bg-red-50 border border-red-200 rounded-xl text-red-700"></div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <!-- Data Anak -->
                            <div class="space-y-4">
                                <h3 class="font-bold text-earth border-b pb-2 mb-4">Data Calon Siswa</h3>

                                <div>
                                    <label class="block text-sm font-medium text-stone-600 mb-1">Nama Lengkap Anak
                                        *</label>
                                    <input type="text" id="namaAnak" name="student_name" required
                                        class="w-full px-4 py-2 border border-stone-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary outline-none transition"
                                        placeholder="Masukkan nama lengkap">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-stone-600 mb-1">Tanggal Lahir
                                        *</label>
                                    <input type="date" id="tglLahir" name="student_birth_date" required
                                        class="w-full px-4 py-2 border border-stone-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary outline-none transition">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-stone-600 mb-1">Pilih Unit Pendidikan
                                        *</label>
                                    <div class="flex gap-4">
                                        <label
                                            class="flex-1 border border-stone-200 rounded-xl p-3 cursor-pointer hover:bg-leaf transition flex items-center gap-2">
                                            <input type="radio" name="school_unit_code" value="TK" required
                                                class="text-primary focus:ring-primary w-4 h-4">
                                            <span class="font-medium text-stone-700">TK Lahiza</span>
                                        </label>
                                        <label
                                            class="flex-1 border border-stone-200 rounded-xl p-3 cursor-pointer hover:bg-leaf transition flex items-center gap-2">
                                            <input type="radio" name="school_unit_code" value="SD" required
                                                class="text-primary focus:ring-primary w-4 h-4">
                                            <span class="font-medium text-stone-700">SD Lahiza</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Data Ortu -->
                            <div class="space-y-4">
                                <h3 class="font-bold text-earth border-b pb-2 mb-4">Data Orang Tua / Wali</h3>

                                <div>
                                    <label class="block text-sm font-medium text-stone-600 mb-1">Nama Ayah / Ibu
                                        *</label>
                                    <input type="text" id="namaOrtu" name="parent_name" required
                                        class="w-full px-4 py-2 border border-stone-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary outline-none transition"
                                        placeholder="Nama representatif">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-stone-600 mb-1">No. WhatsApp Aktif
                                        *</label>
                                    <input type="tel" id="noWa" name="parent_phone" required
                                        class="w-full px-4 py-2 border border-stone-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary outline-none transition"
                                        placeholder="Contoh: 08123456789">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-stone-600 mb-1">Alamat Domisili
                                        *</label>
                                    <textarea id="alamat" name="parent_address" required rows="2"
                                        class="w-full px-4 py-2 border border-stone-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary outline-none transition"
                                        placeholder="Alamat tempat tinggal saat ini"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="border-t border-stone-200 pt-6">
                            <h3 class="font-bold text-earth border-b pb-2 mb-4">Upload Dokumen Persyaratan</h3>
                            <p class="text-sm text-stone-500 mb-4">
                                Format file: PDF/JPG/PNG, maksimal {{ $ppdbLimits['per_file_mb_label'] }} MB per
                                dokumen.
                                Total upload per pengiriman maksimal {{ $ppdbLimits['total_post_mb_label'] }} MB.
                            </p>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-stone-600 mb-1">KK *</label>
                                    <input type="file" name="family_card_file" required
                                        accept=".pdf,.jpg,.jpeg,.png"
                                        class="w-full px-4 py-2 border border-stone-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary outline-none transition file:mr-4 file:rounded-lg file:border-0 file:bg-primary file:px-4 file:py-2 file:font-medium file:text-white hover:file:bg-earth">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-stone-600 mb-1">KTP Ayah *</label>
                                    <input type="file" name="father_id_card_file" required
                                        accept=".pdf,.jpg,.jpeg,.png"
                                        class="w-full px-4 py-2 border border-stone-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary outline-none transition file:mr-4 file:rounded-lg file:border-0 file:bg-primary file:px-4 file:py-2 file:font-medium file:text-white hover:file:bg-earth">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-stone-600 mb-1">KTP Ibu *</label>
                                    <input type="file" name="mother_id_card_file" required
                                        accept=".pdf,.jpg,.jpeg,.png"
                                        class="w-full px-4 py-2 border border-stone-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary outline-none transition file:mr-4 file:rounded-lg file:border-0 file:bg-primary file:px-4 file:py-2 file:font-medium file:text-white hover:file:bg-earth">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-stone-600 mb-1">Akte Lahir *</label>
                                    <input type="file" name="birth_certificate_file" required
                                        accept=".pdf,.jpg,.jpeg,.png"
                                        class="w-full px-4 py-2 border border-stone-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary outline-none transition file:mr-4 file:rounded-lg file:border-0 file:bg-primary file:px-4 file:py-2 file:font-medium file:text-white hover:file:bg-earth">
                                </div>
                            </div>
                        </div>

                        <div class="mt-8 flex justify-end">
                            <button type="submit" id="submit-btn"
                                class="w-full md:w-auto bg-primary hover:bg-primaryLight text-white px-8 py-4 rounded-xl font-bold transition shadow-lg flex items-center justify-center gap-2 text-lg disabled:opacity-75 disabled:cursor-not-allowed">
                                <i data-lucide="check-circle" class="w-5 h-5"></i>
                                <span id="submit-text">Daftar & Terbitkan Invoice</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    @endif

    @include('partials.footer')

    <!-- MODAL INVOICE (Hidden by default) -->
    <div id="invoice-modal" class="fixed inset-0 z-50 hidden">
        <!-- Backdrop -->
        <div class="absolute inset-0 bg-stone-900/80 backdrop-blur-sm" onclick="closeModal()"></div>

        <!-- Modal Content (Scrollable area) -->
        <div class="absolute inset-0 overflow-y-auto pt-10 pb-10 flex justify-center items-start">
            <div id="invoice-content"
                class="bg-white w-full max-w-2xl rounded-2xl shadow-2xl relative animate-[fadeIn_0.3s_ease-out]">

                <!-- Close Button (No Print) -->
                <button onclick="closeModal()"
                    class="absolute top-4 right-4 text-stone-400 hover:text-stone-600 no-print z-10">
                    <i data-lucide="x" class="w-6 h-6"></i>
                </button>

                <!-- Invoice Body -->
                <div class="p-8 md:p-12 border-b-8 border-primary relative overflow-hidden rounded-t-2xl">
                    <!-- Watermark -->
                    <div class="absolute -right-10 -top-10 opacity-5">
                        <i data-lucide="leaf" class="w-64 h-64"></i>
                    </div>

                    <div class="flex justify-between items-start mb-8 relative z-10 border-b pb-8">
                        <div>
                            <div class="flex items-center space-x-2 mb-2">
                                <i data-lucide="leaf" class="h-8 w-8 text-primary"></i>
                                <span class="font-serif font-bold text-2xl text-earth">Lahiza Sunnah</span>
                            </div>
                            <p class="text-sm text-stone-500">Kandanghaur, Kabupaten Indramayu, Jawa Barat<br>Telp: +62
                                812
                                3456 7890</p>
                        </div>
                        <div class="text-right">
                            <h2 class="text-2xl font-bold text-stone-800 uppercase tracking-wider">Tanda Terima</h2>
                            <p class="text-sm text-stone-500 font-mono mt-1" id="inv-no">INV-20260001</p>
                            <p class="text-sm font-medium text-stone-500 mt-1" id="inv-date">Tanggal: 04 April 2026
                            </p>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-8 mb-8 relative z-10">
                        <div>
                            <p class="text-sm font-bold text-stone-400 uppercase tracking-wider mb-1">Pendaftar (Orang
                                Tua):</p>
                            <p class="font-bold text-stone-800 text-lg" id="inv-ortu">Nama Ortu</p>
                            <p class="text-sm text-stone-600 mt-1" id="inv-wa">08123456789</p>
                            <p class="text-sm text-stone-600 mt-1" id="inv-alamat">Alamat Lengkap</p>
                        </div>
                        <div>
                            <p class="text-sm font-bold text-stone-400 uppercase tracking-wider mb-1">Status
                                Pendaftaran:</p>
                            <span
                                class="bg-amber-100 text-amber-800 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wide inline-block border border-amber-200">
                                Menunggu Konfirmasi Admin
                            </span>
                        </div>
                    </div>

                    <div class="relative z-10 bg-stone-50 rounded-xl border border-stone-200 overflow-hidden">
                        <table class="w-full text-left text-sm">
                            <thead class="bg-stone-100 text-stone-600 border-b border-stone-200">
                                <tr>
                                    <th class="p-4 font-bold">Deskripsi Pendaftaran</th>
                                    <th class="p-4 font-bold text-right">Unit Pendidikan</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-stone-200">
                                <tr>
                                    <td class="p-4">
                                        <p class="font-bold text-stone-800 text-base" id="inv-anak">Nama Anak</p>
                                        <p class="text-stone-500 text-xs mt-1" id="inv-tgl">Tgl Lahir: -</p>
                                    </td>
                                    <td class="p-4 text-right font-bold text-primary text-base" id="inv-unit">TK
                                        Lahiza</td>
                                </tr>
                            </tbody>
                            <tfoot class="bg-stone-100">
                                <tr>
                                    <td class="p-4 text-right font-bold text-stone-600">Biaya Pendaftaran:</td>
                                    <td class="p-4 text-right font-bold text-stone-800 text-lg" id="inv-fee">
                                        {{ $registrationFeeFormatted }}
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="mt-6 rounded-xl border border-stone-200 bg-stone-50/80 p-5">
                        <h3 class="font-bold text-earth mb-3">Informasi Transfer</h3>
                        <div class="space-y-2 text-sm text-stone-600">
                            <p><span class="font-medium text-stone-800">Bank:</span> <span
                                    id="inv-bank">{{ $paymentSetting?->bank_name ?: '-' }}</span></p>
                            <p><span class="font-medium text-stone-800">No. Rekening:</span> <span
                                    id="inv-account-number">{{ $paymentSetting?->account_number ?: '-' }}</span></p>
                            <p><span class="font-medium text-stone-800">Atas Nama:</span> <span
                                    id="inv-account-name">{{ $paymentSetting?->account_holder_name ?: '-' }}</span>
                            </p>
                            <p><span class="font-medium text-stone-800">Catatan:</span> <span
                                    id="inv-payment-notes">{{ $paymentSetting?->payment_notes ?: 'Silakan konfirmasi ke admin setelah transfer.' }}</span>
                            </p>
                        </div>
                    </div>

                    <div class="mt-8 text-center relative z-10">
                        <p class="text-sm text-stone-500 italic">"Semoga Allah memberkahi niat baik Ayah/Bunda dalam
                            memberikan pendidikan terbaik sesuai fitrah bagi ananda."</p>
                    </div>
                </div>

                <!-- Modal Actions (No Print) -->
                <div
                    class="p-6 bg-stone-50 rounded-b-2xl border-t border-stone-200 flex flex-col sm:flex-row justify-end gap-4 no-print">
                    <button onclick="window.print()"
                        class="px-6 py-2.5 rounded-xl font-medium text-stone-600 bg-white border border-stone-300 hover:bg-stone-100 transition flex items-center justify-center gap-2">
                        <i data-lucide="printer" class="w-4 h-4"></i> Cetak / Simpan PDF
                    </button>
                    <a href="#" id="wa-link" target="_blank"
                        class="px-6 py-2.5 rounded-xl font-bold text-white bg-green-600 hover:bg-green-700 transition shadow-lg shadow-green-600/30 flex items-center justify-center gap-2">
                        <i data-lucide="send" class="w-4 h-4"></i> Lanjutkan ke WhatsApp Admin
                    </a>
                </div>

            </div>
        </div>
    </div>

    <!-- Script Logika PPDB & UI -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        // Inisialisasi ikon Lucide
        lucide.createIcons();

        // Konfigurasi Axios dengan CSRF Token
        const token = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') ||
            document.querySelector('input[name="_token"]')?.value;

        if (token) {
            axios.defaults.headers.common['X-CSRF-TOKEN'] = token;
        }

        // Nomor WhatsApp Admin from config
        const ADMIN_WA = "{{ config('app.whatsapp_phone') }}";
        const PPDB_MAX_FILE_BYTES = {{ (int) $ppdbLimits['per_file_kb'] * 1024 }};
        const PPDB_MAX_TOTAL_BYTES = {{ (int) $ppdbLimits['total_post_kb'] * 1024 }};
        const PPDB_MAX_FILE_LABEL = "{{ $ppdbLimits['per_file_mb_label'] }}";
        const PPDB_MAX_TOTAL_LABEL = "{{ $ppdbLimits['total_post_mb_label'] }}";
        const PPDB_FILE_LABELS = {
            family_card_file: 'file KK',
            father_id_card_file: 'file KTP ayah',
            mother_id_card_file: 'file KTP ibu',
            birth_certificate_file: 'file Akte Lahir',
        };


        async function handleFormSubmit(event) {
            event.preventDefault(); // Mencegah reload halaman

            const submitBtn = document.getElementById('submit-btn');
            const submitText = document.getElementById('submit-text');
            const formError = document.getElementById('form-error');
            const originalText = submitText.textContent;

            // Reset error message
            formError.classList.add('hidden');
            formError.textContent = '';

            // Disable submit button
            submitBtn.disabled = true;
            submitText.textContent = 'Memproses...';

            try {
                // Ambil data dari form
                const form = document.getElementById('form-ppdb');
                const fileInputs = Array.from(form.querySelectorAll('input[type="file"]'));
                const totalUploadSize = fileInputs.reduce((total, input) => total + (input.files[0]?.size || 0), 0);

                const oversizedFile = fileInputs.find((input) => (input.files[0]?.size || 0) > PPDB_MAX_FILE_BYTES);

                if (oversizedFile) {
                    throw new Error(
                        `Ukuran ${PPDB_FILE_LABELS[oversizedFile.name] || oversizedFile.name} melebihi batas ${PPDB_MAX_FILE_LABEL} MB.`
                    );
                }

                if (totalUploadSize > PPDB_MAX_TOTAL_BYTES) {
                    throw new Error(
                        `Total ukuran semua dokumen melebihi batas ${PPDB_MAX_TOTAL_LABEL} MB dalam satu pengiriman.`
                    );
                }

                const formData = new FormData(form);

                // Kirim ke server
                const response = await axios.post('/ppdb/store', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data',
                    },
                });

                if (response.data.success) {
                    const data = response.data.data;

                    // Masukkan data ke dalam UI Invoice Modal
                    document.getElementById('inv-no').innerText = data.registration_number;

                    const today = new Date();
                    const dateString = today.toLocaleDateString('id-ID', {
                        day: 'numeric',
                        month: 'long',
                        year: 'numeric'
                    });
                    document.getElementById('inv-date').innerText = `Tanggal: ${dateString}`;

                    document.getElementById('inv-ortu').innerText = data.parent_name;
                    document.getElementById('inv-wa').innerText = data.parent_phone;
                    document.getElementById('inv-alamat').innerText = data.parent_address;
                    document.getElementById('inv-anak').innerText = data.student_name;
                    document.getElementById('inv-tgl').innerText = `Tgl Lahir: ${data.student_birth_date}`;
                    document.getElementById('inv-unit').innerText = data.school_unit;
                    document.getElementById('inv-fee').innerText = data.registration_fee_formatted;
                    document.getElementById('inv-bank').innerText = data.payment_bank_name || '-';
                    document.getElementById('inv-account-number').innerText = data.payment_account_number || '-';
                    document.getElementById('inv-account-name').innerText = data.payment_account_holder_name || '-';
                    document.getElementById('inv-payment-notes').innerText = data.payment_notes ||
                        'Silakan konfirmasi ke admin setelah transfer.';

                    // Siapkan Text Pesan WhatsApp
                    const waText =
                        `Assalamu'alaikum Admin Lahiza Sunnah.%0A%0ASaya ingin mengkonfirmasi pendaftaran PPDB dengan detail berikut:%0A%0A*No. Registrasi:* ${data.registration_number}%0A*Nama Anak:* ${data.student_name}%0A*Unit:* ${data.school_unit}%0A*Nama Orang Tua:* ${data.parent_name}%0A*No. WA:* ${data.parent_phone}%0A*Biaya Pendaftaran:* ${data.registration_fee_formatted}%0A%0AMohon panduannya untuk langkah selanjutnya. Terima kasih.`;

                    // Set Link tombol WA
                    document.getElementById('wa-link').href = `https://wa.me/${ADMIN_WA}?text=${waText}`;

                    // Tampilkan Modal
                    document.getElementById('invoice-modal').classList.remove('hidden');

                    // Reset form
                    document.getElementById('form-ppdb').reset();
                } else {
                    throw new Error(response.data.message || 'Terjadi kesalahan');
                }
            } catch (error) {
                let errorMessage = 'Terjadi kesalahan saat memproses pendaftaran';

                if (error.response && error.response.data.errors) {
                    // Tampilkan validation errors
                    const errors = error.response.data.errors;
                    errorMessage = Object.values(errors)
                        .flat()
                        .map(err => '• ' + err)
                        .join('\n');
                } else if (error.response && error.response.data.message) {
                    errorMessage = error.response.data.message;
                } else if (error.message) {
                    errorMessage = error.message;
                }

                formError.textContent = errorMessage;
                formError.classList.remove('hidden');
            } finally {
                // Enable submit button
                submitBtn.disabled = false;
                submitText.textContent = originalText;
            }
        }

        function closeModal() {
            document.getElementById('invoice-modal').classList.add('hidden');
        }

        // Fungsi untuk membuka video modal dengan YouTube playlist
        function openVideoModal(playlistId) {
            const videoModal = document.getElementById('video-modal');
            const youtubePlayer = document.getElementById('youtube-player');

            // Set YouTube iframe src dengan playlist ID
            youtubePlayer.src = `https://www.youtube.com/embed/videoseries?list=${playlistId}`;

            // Tampilkan modal
            videoModal.classList.remove('hidden');

            // Prevent scroll
            document.body.style.overflow = 'hidden';
        }

        // Fungsi untuk menutup video modal
        function closeVideoModal() {
            const videoModal = document.getElementById('video-modal');
            const youtubePlayer = document.getElementById('youtube-player');

            // Sembunyikan modal
            videoModal.classList.add('hidden');

            // Stop video dan reset src
            youtubePlayer.src = '';

            // Restore scroll
            document.body.style.overflow = 'auto';
        }

        // Close video modal dengan ESC key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                const videoModal = document.getElementById('video-modal');
                if (!videoModal.classList.contains('hidden')) {
                    closeVideoModal();
                }
                const photoModal = document.getElementById('photo-modal');
                if (photoModal && !photoModal.classList.contains('hidden')) {
                    closePhotoModal();
                }
            }
        });

        // Fungsi untuk membuka photo modal
        function openPhotoModal(imagePath, title) {
            const photoModal = document.getElementById('photo-modal');
            const photoImage = document.getElementById('photo-image');
            const photoTitle = document.getElementById('photo-title');

            photoImage.src = imagePath;
            photoTitle.textContent = title;
            photoModal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        // Fungsi untuk menutup photo modal
        function closePhotoModal() {
            const photoModal = document.getElementById('photo-modal');
            const photoImage = document.getElementById('photo-image');

            photoModal.classList.add('hidden');
            photoImage.src = '';
            document.body.style.overflow = 'auto';
        }

        // Tambahan style animasi sederhana untuk modal
        const style = document.createElement('style');
        style.textContent = `
            @keyframes fadeIn {
                from { opacity: 0; transform: translateY(10px) scale(0.98); }
                to { opacity: 1; transform: translateY(0) scale(1); }
            }
        `;
        document.head.appendChild(style);
    </script>
</body>

</html>
