<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <title>Tentang Kami - Sekolah Lahiza Sunnah</title>
    @include('partials.head')
    <style>
        .about-hero-pattern {
            background: linear-gradient(135deg, #fef3c7 0%, #fcd34d 100%);
            background-attachment: fixed;
        }
    </style>
</head>

<body class="bg-stone-50 text-stone-800 font-sans antialiased">
    @php
        $historyParagraphs = $aboutPage?->history_paragraphs ?? [];
        $coreValues = $aboutPage?->core_values ?? [];
        $facilities = $aboutPage?->facilities ?? [];
        $programs = $aboutPage?->programs ?? [];
    @endphp

    @include('partials.navbar')
    @include('partials.whatsapp-button')

    <section class="relative pt-20 pb-16 md:pt-32 md:pb-24 about-hero-pattern">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center max-w-3xl mx-auto">
                <span
                    class="inline-block py-1 px-3 rounded-full bg-white/50 text-earth font-semibold text-sm mb-4 border border-white/60">
                    {{ $aboutPage?->eyebrow_text ?? 'Mengenal Lebih Dekat' }}
                </span>
                <h1 class="font-serif text-4xl md:text-5xl lg:text-6xl font-bold text-earth leading-tight mb-6">
                    {{ $aboutPage?->hero_title ?? 'Tentang Kami' }}
                </h1>
                <p class="text-lg text-stone-700 max-w-2xl mx-auto">
                    {{ $aboutPage?->hero_description ?? 'Sekolah Lahiza Sunnah adalah lembaga pendidikan berbasis karakter nabawiyah yang mengintegrasikan ilmu pengetahuan dengan pembelajaran dari alam.' }}
                </p>
            </div>
        </div>
    </section>

    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center mb-20">
                <div>
                    <h2 class="font-serif text-3xl md:text-4xl font-bold text-earth mb-6">
                        {{ $aboutPage?->history_title ?? 'Sejarah & Perjalanan Kami' }}
                    </h2>
                    @forelse ($historyParagraphs as $paragraph)
                        <p class="text-stone-600 text-lg leading-relaxed {{ $loop->last ? '' : 'mb-4' }}">
                            {{ $paragraph }}
                        </p>
                    @empty
                        <p class="text-stone-600 text-lg leading-relaxed mb-4">
                            Sekolah Lahiza Sunnah didirikan dengan visi untuk menciptakan pendidikan yang harmonis antara
                            ilmu pengetahuan modern dan nilai-nilai Islam yang kuat. Kami percaya bahwa anak-anak adalah
                            amanah yang harus dididik sesuai dengan fitrah mereka.
                        </p>
                        <p class="text-stone-600 text-lg leading-relaxed">
                            Dengan mengintegrasikan kegiatan pertanian, peternakan, dan pembelajaran alam sebagai belahan
                            utama pendidikan, kami menciptakan generasi yang mandiri, berkarakter, dan mencintai
                            lingkungan.
                        </p>
                    @endforelse
                </div>
                <div class="relative">
                    <div
                        class="absolute inset-0 bg-primary/10 rounded-3xl blur-2xl transform translate-x-8 translate-y-8">
                    </div>
                    <img src="{{ $aboutPage?->history_image_url ?? 'https://images.unsplash.com/photo-1427504494785-cdab38d7b331?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80' }}"
                        alt="{{ $aboutPage?->history_image_alt ?? 'Aktivitas Sekolah' }}"
                        class="rounded-3xl shadow-xl relative z-10 w-full object-cover h-[400px]">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div
                    class="bg-gradient-to-br from-sand to-sand/50 p-8 rounded-2xl border border-secondary/20 shadow-lg">
                    <div
                        class="w-12 h-12 bg-secondary/20 text-secondary rounded-xl flex items-center justify-center mb-4">
                        <i data-lucide="eye" class="w-6 h-6"></i>
                    </div>
                    <h3 class="font-serif text-2xl font-bold text-earth mb-4">Visi</h3>
                    <p class="text-stone-700 leading-relaxed">
                        {{ $aboutPage?->vision_text ?? 'Menjadi sekolah yang menghasilkan generasi berkarakter Nabawiyah, mandiri, peduli lingkungan, dan mencintai ilmu pengetahuan.' }}
                    </p>
                </div>

                <div
                    class="bg-gradient-to-br from-primary/10 to-primary/5 p-8 rounded-2xl border border-primary/20 shadow-lg">
                    <div class="w-12 h-12 bg-primary/20 text-primary rounded-xl flex items-center justify-center mb-4">
                        <i data-lucide="target" class="w-6 h-6"></i>
                    </div>
                    <h3 class="font-serif text-2xl font-bold text-earth mb-4">Misi</h3>
                    <p class="text-stone-700 leading-relaxed">
                        {{ $aboutPage?->mission_text ?? 'Menyelenggarakan pendidikan terintegrasi yang mengembangkan karakter, keterampilan hidup, dan pemahaman mendalam tentang alam sebagai tempat belajar utama.' }}
                    </p>
                </div>

                <div class="bg-gradient-to-br from-leaf/10 to-leaf/5 p-8 rounded-2xl border border-leaf/20 shadow-lg">
                    <div class="w-12 h-12 bg-leaf/20 text-earth rounded-xl flex items-center justify-center mb-4">
                        <i data-lucide="sparkles" class="w-6 h-6"></i>
                    </div>
                    <h3 class="font-serif text-2xl font-bold text-earth mb-4">Tujuan</h3>
                    <p class="text-stone-700 leading-relaxed">
                        {{ $aboutPage?->goal_text ?? 'Mengembangkan potensi siswa secara holistik melalui pembelajaran experiential berbasis alam dan nilai-nilai Islam.' }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 bg-leaf/5">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="font-serif text-3xl md:text-4xl font-bold text-earth mb-4">
                    {{ $aboutPage?->core_values_heading ?? 'Nilai-Nilai Inti Kami' }}
                </h2>
                <div class="w-24 h-1 bg-primary mx-auto rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @forelse ($coreValues as $value)
                    <div class="bg-white p-6 rounded-2xl shadow-md border border-stone-100 hover:shadow-lg transition">
                        <div
                            class="w-12 h-12 {{ $loop->index % 4 === 0 ? 'bg-primary/10 text-primary' : ($loop->index % 4 === 1 ? 'bg-secondary/10 text-secondary' : ($loop->index % 4 === 2 ? 'bg-leaf/20 text-earth' : 'bg-sand/20 text-primary')) }} rounded-full flex items-center justify-center mb-4 mx-auto">
                            <i data-lucide="{{ $value['icon'] ?? 'star' }}" class="w-6 h-6"></i>
                        </div>
                        <h4 class="font-bold text-earth text-center mb-2">{{ $value['title'] ?? '-' }}</h4>
                        <p class="text-stone-600 text-sm text-center">{{ $value['description'] ?? '-' }}</p>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12 px-6 bg-white rounded-2xl">
                        <p class="text-stone-600">Nilai inti belum tersedia.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="font-serif text-3xl md:text-4xl font-bold text-earth mb-4">
                    {{ $aboutPage?->school_units_heading ?? 'Unit Pendidikan Kami' }}
                </h2>
                <div class="w-24 h-1 bg-primary mx-auto rounded-full mb-6"></div>
                <p class="text-stone-600 text-lg">
                    {{ $aboutPage?->school_units_description ?? 'Setiap unit dirancang khusus sesuai dengan tahap perkembangan anak' }}
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @forelse($schoolUnits as $unit)
                    <div
                        class="bg-gradient-to-br {{ $loop->first ? 'from-sand/50 to-sand/20 border-secondary/20' : 'from-primary/10 to-primary/5 border-primary/20' }} p-10 rounded-3xl shadow-lg border">
                        <div
                            class="w-16 h-16 {{ $loop->first ? 'bg-secondary/20 text-secondary' : 'bg-primary/20 text-primary' }} rounded-2xl flex items-center justify-center mb-6">
                            <i data-lucide="{{ $loop->first ? 'sun' : 'compass' }}" class="w-8 h-8"></i>
                        </div>
                        <h3 class="font-serif text-2xl font-bold text-earth mb-2">{{ $unit->name }}</h3>
                        <p class="text-primary font-semibold mb-4 italic">{{ $unit->philosophy }}</p>
                        <p class="text-stone-600 leading-relaxed mb-6">
                            {{ $unit->description }}
                        </p>
                        <div class="pt-6 border-t border-stone-200">
                            <p class="text-sm text-stone-600 font-medium">Fokus Pembelajaran:</p>
                            <ul class="mt-2 space-y-2 text-stone-700">
                                @forelse ($unit->featured_programs_list as $program)
                                    <li class="flex items-start gap-2">
                                        <i data-lucide="check" class="w-4 h-4 text-primary shrink-0 mt-1"></i>
                                        <span>{{ $program }}</span>
                                    </li>
                                @empty
                                    <li>Program unggulan berbasis ketahanan pangan, peternakan, dan karakter nabawiyah</li>
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

    <section class="py-20 bg-leaf/5">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="font-serif text-3xl md:text-4xl font-bold text-earth mb-4">
                    {{ $aboutPage?->teachers_heading ?? 'Murobbi & Fasilitator Kami' }}
                </h2>
                <div class="w-24 h-1 bg-primary mx-auto rounded-full mb-6"></div>
                <p class="text-stone-600 text-lg">
                    {{ $aboutPage?->teachers_description ?? 'Tim pendidik profesional yang berkomitmen mengembangkan potensi setiap anak' }}
                </p>
            </div>

            @if ($teachers->isNotEmpty())
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                    @foreach ($teachers as $teacher)
                        <div
                            class="bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition transform hover:-translate-y-2 duration-300">
                            <div
                                class="relative w-full h-48 bg-gradient-to-br from-primary/20 to-secondary/20 overflow-hidden">
                                @if ($teacher->image_url)
                                    <img src="{{ $teacher->image_url }}" alt="{{ $teacher->name }}"
                                        class="w-full h-full object-cover">
                                @else
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($teacher->name) }}&background=78350f&color=fff&size=200"
                                        alt="{{ $teacher->name }}" class="w-full h-full object-cover">
                                @endif
                                @if ($teacher->schoolUnit)
                                    <div
                                        class="absolute top-3 right-3 bg-secondary/90 text-white px-3 py-1 rounded-full text-xs font-medium">
                                        {{ $teacher->schoolUnit->name }}
                                    </div>
                                @endif
                            </div>

                            <div class="p-6">
                                <h4 class="font-bold text-earth text-lg mb-1">{{ $teacher->name }}</h4>
                                <p class="text-primary font-semibold text-sm mb-3">{{ $teacher->position }}</p>

                                @if ($teacher->title)
                                    <p class="text-xs text-stone-500 mb-3 font-medium">{{ $teacher->title }}</p>
                                @endif

                                @if ($teacher->bio)
                                    <p class="text-stone-600 text-sm leading-relaxed mb-4 line-clamp-3">
                                        {{ $teacher->bio }}
                                    </p>
                                @endif

                                <div class="space-y-2 pt-4 border-t border-stone-100">
                                    @if ($teacher->email)
                                        <div class="flex items-center gap-2 text-xs text-stone-600">
                                            <i data-lucide="mail" class="w-4 h-4 text-primary"></i>
                                            <a href="mailto:{{ $teacher->email }}"
                                                class="hover:text-primary transition truncate">
                                                {{ $teacher->email }}
                                            </a>
                                        </div>
                                    @endif
                                    @if ($teacher->phone)
                                        <div class="flex items-center gap-2 text-xs text-stone-600">
                                            <i data-lucide="phone" class="w-4 h-4 text-primary"></i>
                                            <a href="tel:{{ $teacher->phone }}"
                                                class="hover:text-primary transition">
                                                {{ $teacher->phone }}
                                            </a>
                                        </div>
                                    @endif
                                </div>

                                <div class="mt-4 flex items-center gap-2">
                                    <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                                    <span class="text-xs text-stone-500">Aktif Mengajar</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="col-span-full text-center py-12 px-6 bg-white rounded-2xl">
                    <i data-lucide="users" class="w-16 h-16 text-stone-300 mx-auto mb-4"></i>
                    <p class="text-stone-600">Data guru tidak tersedia saat ini</p>
                </div>
            @endif
        </div>
    </section>

    <section class="py-20 bg-white border-t border-stone-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center mb-16">
                <div>
                    <h2 class="font-serif text-3xl md:text-4xl font-bold text-earth mb-6">
                        {{ $aboutPage?->facilities_title ?? 'Fasilitas & Sarana Belajar' }}
                    </h2>
                    <ul class="space-y-4">
                        @forelse ($facilities as $facility)
                            <li class="flex items-start gap-3">
                                <div
                                    class="w-6 h-6 bg-primary/20 text-primary rounded-full flex items-center justify-center shrink-0 mt-0.5">
                                    <i data-lucide="check" class="w-4 h-4"></i>
                                </div>
                                <div>
                                    <strong class="text-earth block">{{ $facility['title'] ?? '-' }}</strong>
                                    <span class="text-stone-600 text-sm">{{ $facility['description'] ?? '-' }}</span>
                                </div>
                            </li>
                        @empty
                            <li class="text-stone-600">Fasilitas belum tersedia.</li>
                        @endforelse
                    </ul>
                </div>
                <div class="relative">
                    <div class="absolute inset-0 bg-primary/10 rounded-3xl blur-2xl"></div>
                    <img src="{{ $aboutPage?->facilities_image_url ?? 'https://images.unsplash.com/photo-1523580494863-6f3031224c94?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80' }}"
                        alt="{{ $aboutPage?->facilities_image_alt ?? 'Fasilitas Sekolah' }}"
                        class="rounded-3xl shadow-xl relative z-10 w-full object-cover h-[400px]">
                </div>
            </div>

            <div class="bg-gradient-to-r from-sand/50 to-sand/20 rounded-3xl p-10 md:p-12 border border-secondary/20">
                <h3 class="font-serif text-2xl font-bold text-earth mb-8">
                    {{ $aboutPage?->programs_title ?? 'Program Unggulan Kami' }}
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @forelse ($programs as $program)
                        <div class="bg-white p-6 rounded-2xl">
                            <div
                                class="w-12 h-12 {{ $loop->index % 3 === 0 ? 'bg-secondary/20 text-secondary' : ($loop->index % 3 === 1 ? 'bg-primary/20 text-primary' : 'bg-leaf/20 text-earth') }} rounded-xl flex items-center justify-center mb-4">
                                <i data-lucide="{{ $program['icon'] ?? 'sparkles' }}" class="w-6 h-6"></i>
                            </div>
                            <h4 class="font-bold text-earth mb-2">{{ $program['title'] ?? '-' }}</h4>
                            <p class="text-stone-600 text-sm">{{ $program['description'] ?? '-' }}</p>
                        </div>
                    @empty
                        <div class="md:col-span-3 bg-white p-6 rounded-2xl text-center text-stone-600">
                            Program unggulan belum tersedia.
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 bg-primary/10 border-t border-stone-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="font-serif text-3xl md:text-4xl font-bold text-earth mb-4">
                {{ $aboutPage?->cta_title ?? 'Tertarik Bergabung Bersama Kami?' }}
            </h2>
            <p class="text-stone-600 text-lg mb-8 max-w-2xl mx-auto">
                {{ $aboutPage?->cta_description ?? 'Hubungi kami untuk mendapatkan informasi lebih lengkap tentang program penerimaan peserta didik baru' }}
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ $aboutPage?->cta_primary_url ?? '/' }}"
                    class="bg-primary hover:bg-earth text-white px-8 py-3.5 rounded-full font-medium transition">
                    {{ $aboutPage?->cta_primary_label ?? 'Kembali ke Beranda' }}
                </a>
                <a href="{{ $aboutPage?->cta_secondary_url ?? '/#ppdb' }}"
                    class="bg-white hover:bg-stone-50 text-earth border-2 border-earth/10 px-8 py-3.5 rounded-full font-medium transition">
                    {{ $aboutPage?->cta_secondary_label ?? 'Daftar Sekarang' }}
                </a>
            </div>
        </div>
    </section>

    @include('partials.footer')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (window.lucide) {
                lucide.createIcons();
            }
        });
    </script>

</body>

</html>
