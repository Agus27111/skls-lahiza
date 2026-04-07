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

    @include('partials.navbar')
    @include('partials.whatsapp-button')

    <!-- Hero Section -->
    <section class="relative pt-20 pb-16 md:pt-32 md:pb-24 about-hero-pattern">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center max-w-3xl mx-auto">
                <span
                    class="inline-block py-1 px-3 rounded-full bg-white/50 text-earth font-semibold text-sm mb-4 border border-white/60">
                    Mengenal Lebih Dekat
                </span>
                <h1 class="font-serif text-4xl md:text-5xl lg:text-6xl font-bold text-earth leading-tight mb-6">
                    Tentang Kami
                </h1>
                <p class="text-lg text-stone-700 max-w-2xl mx-auto">
                    Sekolah Lahiza Sunnah adalah lembaga pendidikan berbasis karakter nabawiyah yang
                    mengintegrasikan ilmu pengetahuan dengan pembelajaran dari alam.
                </p>
            </div>
        </div>
    </section>

    <!-- Sejarah & Misi -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center mb-20">
                <div>
                    <h2 class="font-serif text-3xl md:text-4xl font-bold text-earth mb-6">Sejarah & Perjalanan Kami</h2>
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
                </div>
                <div class="relative">
                    <div
                        class="absolute inset-0 bg-primary/10 rounded-3xl blur-2xl transform translate-x-8 translate-y-8">
                    </div>
                    <img src="https://images.unsplash.com/photo-1427504494785-cdab38d7b331?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                        alt="Aktivitas Sekolah"
                        class="rounded-3xl shadow-xl relative z-10 w-full object-cover h-[400px]">
                </div>
            </div>

            <!-- Visi, Misi, Tujuan -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div
                    class="bg-gradient-to-br from-sand to-sand/50 p-8 rounded-2xl border border-secondary/20 shadow-lg">
                    <div
                        class="w-12 h-12 bg-secondary/20 text-secondary rounded-xl flex items-center justify-center mb-4">
                        <i data-lucide="eye" class="w-6 h-6"></i>
                    </div>
                    <h3 class="font-serif text-2xl font-bold text-earth mb-4">Visi</h3>
                    <p class="text-stone-700 leading-relaxed">
                        Menjadi sekolah yang menghasilkan generasi berkarakter Nabawiyah, mandiri, peduli lingkungan,
                        dan mencintai ilmu pengetahuan.
                    </p>
                </div>

                <div
                    class="bg-gradient-to-br from-primary/10 to-primary/5 p-8 rounded-2xl border border-primary/20 shadow-lg">
                    <div class="w-12 h-12 bg-primary/20 text-primary rounded-xl flex items-center justify-center mb-4">
                        <i data-lucide="target" class="w-6 h-6"></i>
                    </div>
                    <h3 class="font-serif text-2xl font-bold text-earth mb-4">Misi</h3>
                    <p class="text-stone-700 leading-relaxed">
                        Menyelenggarakan pendidikan terintegrasi yang mengembangkan karakter, keterampilan hidup, dan
                        pemahaman mendalam tentang alam sebagai tempat belajar utama.
                    </p>
                </div>

                <div class="bg-gradient-to-br from-leaf/10 to-leaf/5 p-8 rounded-2xl border border-leaf/20 shadow-lg">
                    <div class="w-12 h-12 bg-leaf/20 text-earth rounded-xl flex items-center justify-center mb-4">
                        <i data-lucide="sparkles" class="w-6 h-6"></i>
                    </div>
                    <h3 class="font-serif text-2xl font-bold text-earth mb-4">Tujuan</h3>
                    <p class="text-stone-700 leading-relaxed">
                        Mengembangkan potensi siswa secara holistik melalui pembelajaran experiential berbasis alam
                        dan nilai-nilai Islam.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Nilai-Nilai Inti -->
    <section class="py-20 bg-leaf/5">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="font-serif text-3xl md:text-4xl font-bold text-earth mb-4">Nilai-Nilai Inti Kami</h2>
                <div class="w-24 h-1 bg-primary mx-auto rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Nilai 1 -->
                <div class="bg-white p-6 rounded-2xl shadow-md border border-stone-100 hover:shadow-lg transition">
                    <div
                        class="w-12 h-12 bg-primary/10 text-primary rounded-full flex items-center justify-center mb-4 mx-auto">
                        <i data-lucide="heart" class="w-6 h-6"></i>
                    </div>
                    <h4 class="font-bold text-earth text-center mb-2">Adab & Akhlak</h4>
                    <p class="text-stone-600 text-sm text-center">Pembentukan karakter mulia melalui teladan dan
                        praktek</p>
                </div>

                <!-- Nilai 2 -->
                <div class="bg-white p-6 rounded-2xl shadow-md border border-stone-100 hover:shadow-lg transition">
                    <div
                        class="w-12 h-12 bg-secondary/10 text-secondary rounded-full flex items-center justify-center mb-4 mx-auto">
                        <i data-lucide="sprout" class="w-6 h-6"></i>
                    </div>
                    <h4 class="font-bold text-earth text-center mb-2">Kemandirian</h4>
                    <p class="text-stone-600 text-sm text-center">Mengembangkan kemampuan berdiri sendiri dan
                        bertanggung
                        jawab</p>
                </div>

                <!-- Nilai 3 -->
                <div class="bg-white p-6 rounded-2xl shadow-md border border-stone-100 hover:shadow-lg transition">
                    <div
                        class="w-12 h-12 bg-leaf/20 text-earth rounded-full flex items-center justify-center mb-4 mx-auto">
                        <i data-lucide="leaf" class="w-6 h-6"></i>
                    </div>
                    <h4 class="font-bold text-earth text-center mb-2">Cinta Alam</h4>
                    <p class="text-stone-600 text-sm text-center">Menghargai dan menjaga lingkungan sebagai amanah dari
                        Tuhan</p>
                </div>

                <!-- Nilai 4 -->
                <div class="bg-white p-6 rounded-2xl shadow-md border border-stone-100 hover:shadow-lg transition">
                    <div
                        class="w-12 h-12 bg-sand/20 text-primary rounded-full flex items-center justify-center mb-4 mx-auto">
                        <i data-lucide="book-open-check" class="w-6 h-6"></i>
                    </div>
                    <h4 class="font-bold text-earth text-center mb-2">Ilmu Bermanfaat</h4>
                    <p class="text-stone-600 text-sm text-center">Mengejar ilmu yang bermanfaat untuk diri dan
                        masyarakat
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Unit Sekolah Lengkap -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="font-serif text-3xl md:text-4xl font-bold text-earth mb-4">Unit Pendidikan Kami</h2>
                <div class="w-24 h-1 bg-primary mx-auto rounded-full mb-6"></div>
                <p class="text-stone-600 text-lg">Setiap unit dirancang khusus sesuai dengan tahap perkembangan anak
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
                            <p class="text-stone-700 mt-2">Program unggulan berbasis ketahanan pangan, peternakan,
                                dan karakter nabawiyah</p>
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

    <!-- Daftar Guru & Murobbi Lengkap -->
    <section class="py-20 bg-leaf/5">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="font-serif text-3xl md:text-4xl font-bold text-earth mb-4">Murobbi & Fasilitator Kami</h2>
                <div class="w-24 h-1 bg-primary mx-auto rounded-full mb-6"></div>
                <p class="text-stone-600 text-lg">Tim pendidik profesional yang berkomitmen mengembangkan potensi
                    setiap anak</p>
            </div>

            @if ($teachers->isNotEmpty())
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                    @foreach ($teachers as $teacher)
                        <div
                            class="bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition transform hover:-translate-y-2 duration-300">
                            <!-- Foto -->
                            <div
                                class="relative w-full h-48 bg-gradient-to-br from-primary/20 to-secondary/20 overflow-hidden">
                                @if ($teacher->image_url)
                                    <img src="{{ $teacher->image_url }}" alt="{{ $teacher->name }}"
                                        class="w-full h-full object-cover">
                                @else
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($teacher->name) }}&background=78350f&color=fff&size=200"
                                        alt="{{ $teacher->name }}" class="w-full h-full object-cover">
                                @endif
                                <!-- Badge Unit -->
                                @if ($teacher->schoolUnit)
                                    <div
                                        class="absolute top-3 right-3 bg-secondary/90 text-white px-3 py-1 rounded-full text-xs font-medium">
                                        {{ $teacher->schoolUnit->name }}
                                    </div>
                                @endif
                            </div>

                            <!-- Info -->
                            <div class="p-6">
                                <h4 class="font-bold text-earth text-lg mb-1">{{ $teacher->name }}</h4>
                                <p class="text-primary font-semibold text-sm mb-3">{{ $teacher->position }}</p>

                                @if ($teacher->title)
                                    <p class="text-xs text-stone-500 mb-3 font-medium">{{ $teacher->title }}</p>
                                @endif

                                <!-- Bio -->
                                @if ($teacher->bio)
                                    <p class="text-stone-600 text-sm leading-relaxed mb-4 line-clamp-3">
                                        {{ $teacher->bio }}
                                    </p>
                                @endif

                                <!-- Contact Info -->
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

                                <!-- Status -->
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

    <!-- Fasilitas & Program Unggulan -->
    <section class="py-20 bg-white border-t border-stone-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center mb-16">
                <div>
                    <h2 class="font-serif text-3xl md:text-4xl font-bold text-earth mb-6">Fasilitas & Sarana Belajar
                    </h2>
                    <ul class="space-y-4">
                        <li class="flex items-start gap-3">
                            <div
                                class="w-6 h-6 bg-primary/20 text-primary rounded-full flex items-center justify-center shrink-0 mt-0.5">
                                <i data-lucide="check" class="w-4 h-4"></i>
                            </div>
                            <div>
                                <strong class="text-earth block">Kebun Organik</strong>
                                <span class="text-stone-600 text-sm">Lahan pertanian untuk pembelajaran praktis
                                    budidaya
                                    tanaman</span>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <div
                                class="w-6 h-6 bg-primary/20 text-primary rounded-full flex items-center justify-center shrink-0 mt-0.5">
                                <i data-lucide="check" class="w-4 h-4"></i>
                            </div>
                            <div>
                                <strong class="text-earth block">Kandang Ternak</strong>
                                <span class="text-stone-600 text-sm">Fasilitas peternakan kambing dan ayam untuk
                                    edukasi
                                    kesejahteraan hewan</span>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <div
                                class="w-6 h-6 bg-primary/20 text-primary rounded-full flex items-center justify-center shrink-0 mt-0.5">
                                <i data-lucide="check" class="w-4 h-4"></i>
                            </div>
                            <div>
                                <strong class="text-earth block">Ruang Kelas Modern</strong>
                                <span class="text-stone-600 text-sm">Kelas dengan teknologi pembelajaran terkini dan
                                    desain ergonomis</span>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <div
                                class="w-6 h-6 bg-primary/20 text-primary rounded-full flex items-center justify-center shrink-0 mt-0.5">
                                <i data-lucide="check" class="w-4 h-4"></i>
                            </div>
                            <div>
                                <strong class="text-earth block">Perpustakaan Islami</strong>
                                <span class="text-stone-600 text-sm">Koleksi buku pengetahuan umum dan referensi
                                    Islam</span>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="relative">
                    <div class="absolute inset-0 bg-primary/10 rounded-3xl blur-2xl"></div>
                    <img src="https://images.unsplash.com/photo-1523580494863-6f3031224c94?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                        alt="Fasilitas Sekolah"
                        class="rounded-3xl shadow-xl relative z-10 w-full object-cover h-[400px]">
                </div>
            </div>

            <!-- Program Unggulan -->
            <div class="bg-gradient-to-r from-sand/50 to-sand/20 rounded-3xl p-10 md:p-12 border border-secondary/20">
                <h3 class="font-serif text-2xl font-bold text-earth mb-8">Program Unggulan Kami</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white p-6 rounded-2xl">
                        <div
                            class="w-12 h-12 bg-secondary/20 text-secondary rounded-xl flex items-center justify-center mb-4">
                            <i data-lucide="sprout" class="w-6 h-6"></i>
                        </div>
                        <h4 class="font-bold text-earth mb-2">Urban Farming</h4>
                        <p class="text-stone-600 text-sm">Pembelajaran praktis budidaya tanaman di lahan terbatas
                            dengan
                            metode organik</p>
                    </div>
                    <div class="bg-white p-6 rounded-2xl">
                        <div
                            class="w-12 h-12 bg-primary/20 text-primary rounded-xl flex items-center justify-center mb-4">
                            <i data-lucide="heart-handshake" class="w-6 h-6"></i>
                        </div>
                        <h4 class="font-bold text-earth mb-2">Karakter Nabawiyah</h4>
                        <p class="text-stone-600 text-sm">Pembentukan karakter mulia berdasarkan teladan Nabi Muhammad
                            SAW</p>
                    </div>
                    <div class="bg-white p-6 rounded-2xl">
                        <div class="w-12 h-12 bg-leaf/20 text-earth rounded-xl flex items-center justify-center mb-4">
                            <i data-lucide="leaf" class="w-6 h-6"></i>
                        </div>
                        <h4 class="font-bold text-earth mb-2">Konservasi Alam</h4>
                        <p class="text-stone-600 text-sm">Edukasi pelestarian lingkungan dan kesadaran ekologis sejak
                            dini
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-primary/10 border-t border-stone-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="font-serif text-3xl md:text-4xl font-bold text-earth mb-4">Tertarik Bergabung Bersama Kami?</h2>
            <p class="text-stone-600 text-lg mb-8 max-w-2xl mx-auto">
                Hubungi kami untuk mendapatkan informasi lebih lengkap tentang program penerimaan peserta didik baru
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/"
                    class="bg-primary hover:bg-earth text-white px-8 py-3.5 rounded-full font-medium transition">
                    Kembali ke Beranda
                </a>
                <a href="/#ppdb"
                    class="bg-white hover:bg-stone-50 text-earth border-2 border-earth/10 px-8 py-3.5 rounded-full font-medium transition">
                    Daftar Sekarang
                </a>
            </div>
        </div>
    </section>

    @include('partials.footer')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Lucide icons
            if (window.lucide) {
                lucide.createIcons();
            }
        });
    </script>

</body>

</html>
