<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sekolah Lahiza Sunnah - Mendidik Sesuai Fitrah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Merriweather:wght@300;400;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#15803d',    /* Hijau Daun (Green 700) */
                        primaryLight: '#22c55e', /* Hijau Muda (Green 500) */
                        secondary: '#d97706',  /* Kuning Hangat (Amber 600) */
                        earth: '#78350f',      /* Cokelat Tanah (Amber 900) */
                        sand: '#fef3c7',       /* Pasir/Krem (Amber 50) */
                        leaf: '#f0fdf4',       /* Hijau Sangat Pudar (Green 50) */
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        serif: ['Merriweather', 'serif'],
                    }
                }
            }
        }
    </script>
    <style>
        /* CSS Khusus untuk Fitur Cetak Invoice */
        @media print {
            body * {
                visibility: hidden;
            }
            #invoice-content, #invoice-content * {
                visibility: visible;
            }
            #invoice-content {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                margin: 0;
                padding: 20px;
                box-shadow: none !important;
            }
            .no-print {
                display: none !important;
            }
        }
        .hero-pattern {
            background-color: #fef3c7;
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='#d97706' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
    </style>
</head>
<body class="bg-stone-50 text-stone-800 font-sans antialiased">

    <!-- Navigation -->
    <nav class="fixed w-full bg-white/90 backdrop-blur-md shadow-sm z-40 transition-all no-print">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <div class="flex items-center space-x-2">
                    <i data-lucide="leaf" class="h-8 w-8 text-primary"></i>
                    <span class="font-serif font-bold text-2xl text-earth">Lahiza Sunnah</span>
                </div>
                <div class="hidden md:flex space-x-8">
                    <a href="#beranda" class="text-stone-600 hover:text-primary transition font-medium">Beranda</a>
                    <a href="#tentang" class="text-stone-600 hover:text-primary transition font-medium">Tentang Kami</a>
                    <a href="#unit" class="text-stone-600 hover:text-primary transition font-medium">Unit Sekolah</a>
                    <a href="#galeri" class="text-stone-600 hover:text-primary transition font-medium">Galeri</a>
                    <a href="#informasi" class="text-stone-600 hover:text-primary transition font-medium">Informasi</a>
                </div>
                <div class="hidden md:flex">
                    <a href="#ppdb" class="bg-primary hover:bg-earth text-white px-6 py-2.5 rounded-full font-medium transition shadow-lg shadow-primary/30 flex items-center gap-2">
                        <i data-lucide="clipboard-signature" class="w-5 h-5"></i>
                        Daftar PPDB
                    </a>
                </div>
                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center">
                    <button class="text-stone-600 hover:text-primary focus:outline-none" onclick="document.getElementById('mobile-menu').classList.toggle('hidden')">
                        <i data-lucide="menu" class="h-6 w-6"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-stone-100">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="#beranda" class="block px-3 py-2 text-stone-600 font-medium">Beranda</a>
                <a href="#tentang" class="block px-3 py-2 text-stone-600 font-medium">Tentang Kami</a>
                <a href="#unit" class="block px-3 py-2 text-stone-600 font-medium">Unit Sekolah</a>
                <a href="#ppdb" class="block px-3 py-2 text-primary font-bold">Daftar PPDB</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="beranda" class="relative pt-20 pb-16 md:pt-32 md:pb-24 flex items-center min-h-[90vh] hero-pattern">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div class="text-center md:text-left">
                    <span class="inline-block py-1 px-3 rounded-full bg-sand text-secondary font-semibold text-sm mb-4 border border-secondary/20">
                        Penerimaan Peserta Didik Baru 2026/2027
                    </span>
                    <h1 class="font-serif text-4xl md:text-5xl lg:text-6xl font-bold text-earth leading-tight mb-6">
                        Mendidik Sesuai <span class="text-primary">Fitrah</span>,<br>Tumbuh Bersama Alam.
                    </h1>
                    <p class="text-lg text-stone-600 mb-8 max-w-lg mx-auto md:mx-0">
                        Sekolah berbasis Karakter Nabawiyah yang menjadikan ketahanan pangan, pertanian, dan peternakan sebagai laboratorium kehidupan utama anak-anak kita.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
                        <a href="#ppdb" class="bg-primary hover:bg-earth text-white px-8 py-3.5 rounded-full font-medium transition shadow-xl shadow-primary/20 text-center">
                            Mulai Pendaftaran
                        </a>
                        <a href="#tentang" class="bg-white hover:bg-stone-50 text-earth border-2 border-earth/10 px-8 py-3.5 rounded-full font-medium transition text-center flex justify-center items-center gap-2">
                            <i data-lucide="play-circle" class="w-5 h-5 text-secondary"></i>
                            Kenali Filosofi Kami
                        </a>
                    </div>
                </div>
                <div class="relative">
                    <div class="absolute inset-0 bg-primary/10 rounded-full blur-3xl transform translate-x-10 translate-y-10"></div>
                    <img src="https://images.unsplash.com/photo-1594498653385-d5172c532c00?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" alt="Anak-anak di alam" class="rounded-t-[100px] rounded-b-3xl shadow-2xl relative z-10 border-8 border-white object-cover h-[500px] w-full">
                    
                    <!-- Floating Badge -->
                    <div class="absolute -bottom-6 -left-6 bg-white p-4 rounded-2xl shadow-xl z-20 flex items-center gap-4 animate-bounce" style="animation-duration: 3s;">
                        <div class="bg-sand p-3 rounded-full text-secondary">
                            <i data-lucide="sprout" class="w-8 h-8"></i>
                        </div>
                        <div>
                            <p class="text-xs text-stone-500 font-medium">Pembelajaran Aktif</p>
                            <p class="font-bold text-earth">100% Berbasis Alam</p>
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
                    "Ajarilah anak-anakmu memanah, berenang, dan berkuda." Konsep kemandirian dan kekuatan fisik dalam Islam kami terjemahkan melalui keseharian yang dekat dengan alam.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
                <div class="order-2 md:order-1 relative">
                    <img src="https://images.unsplash.com/photo-1500595046743-cd271d694d30?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Peternakan dan Anak" class="rounded-3xl shadow-lg w-full">
                    <img src="https://images.unsplash.com/photo-1615811361523-6bd03d7748e7?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Sayuran segar" class="absolute -bottom-8 -right-8 w-48 h-48 object-cover rounded-2xl border-8 border-white shadow-xl hidden md:block">
                </div>
                <div class="order-1 md:order-2 space-y-6">
                    <h3 class="font-serif text-2xl font-bold text-earth">Ketahanan Pangan sebagai Laboratorium Utama</h3>
                    <p class="text-stone-600 leading-relaxed">
                        Di Lahiza Sunnah, kebun dan peternakan bukanlah sekadar ekstrakurikuler. Mereka adalah ruang kelas utama kami. 
                    </p>
                    <ul class="space-y-4">
                        <li class="flex items-start gap-3">
                            <i data-lucide="check-circle-2" class="w-6 h-6 text-primary shrink-0 mt-0.5"></i>
                            <div>
                                <strong class="text-earth block">Merawat Ternak (Kambing & Ayam)</strong>
                                <span class="text-stone-600 text-sm">Menumbuhkan sifat kasih sayang, kesabaran, dan tanggung jawab seperti para Nabi yang menggembala.</span>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <i data-lucide="check-circle-2" class="w-6 h-6 text-primary shrink-0 mt-0.5"></i>
                            <div>
                                <strong class="text-earth block">Bercocok Tanam (Sayur & Buah)</strong>
                                <span class="text-stone-600 text-sm">Memahami proses, menghargai makanan, dan belajar ikhtiar serta tawakkal kepada sang Maha Pencipta.</span>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <i data-lucide="check-circle-2" class="w-6 h-6 text-primary shrink-0 mt-0.5"></i>
                            <div>
                                <strong class="text-earth block">Adab Sebelum Ilmu</strong>
                                <span class="text-stone-600 text-sm">Fokus utama pada pembentukan adab, akhlak mulia, dan kecintaan kepada Allah dan Rasul-Nya.</span>
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
            <svg width="400" height="400" viewBox="0 0 24 24" fill="none" stroke="#15803d" stroke-width="1"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-16">
                <h2 class="font-serif text-3xl md:text-4xl font-bold text-earth mb-4">Unit Pendidikan Kami</h2>
                <div class="w-24 h-1 bg-secondary mx-auto rounded-full mb-6"></div>
                <p class="text-stone-600">Fokus pada tahap perkembangan anak (Fitrah) sesuai panduan Islam.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-12">
                <!-- TK Card -->
                <div class="bg-white rounded-[2rem] p-8 md:p-10 shadow-xl border border-stone-100 hover:shadow-2xl transition group relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-sand rounded-bl-full -z-0 transition group-hover:scale-110"></div>
                    <div class="relative z-10">
                        <div class="w-16 h-16 bg-secondary/10 text-secondary rounded-2xl flex items-center justify-center mb-6">
                            <i data-lucide="sun" class="w-8 h-8"></i>
                        </div>
                        <h3 class="font-serif text-2xl font-bold text-earth mb-3">TK Lahiza Sunnah</h3>
                        <p class="text-primary font-medium mb-4">Fase Eksplorasi Fitrah & Bermain</p>
                        <p class="text-stone-600 mb-6 leading-relaxed">
                            Masa emas untuk menanamkan tauhid dan cinta kasih. Anak-anak dibiarkan bebas mengeksplorasi alam, menyentuh tanah, bermain air, dan mengenal ciptaan Allah dengan gembira tanpa paksaan akademis berat.
                        </p>
                        <ul class="space-y-2 mb-8">
                            <li class="flex items-center gap-2 text-stone-600"><i data-lucide="bird" class="w-4 h-4 text-secondary"></i> Sentra Kebun Ceria</li>
                            <li class="flex items-center gap-2 text-stone-600"><i data-lucide="bird" class="w-4 h-4 text-secondary"></i> Hafalan Surat Pendek Bertema</li>
                            <li class="flex items-center gap-2 text-stone-600"><i data-lucide="bird" class="w-4 h-4 text-secondary"></i> Bermain Peran Islami</li>
                        </ul>
                    </div>
                </div>

                <!-- SD Card -->
                <div class="bg-white rounded-[2rem] p-8 md:p-10 shadow-xl border border-stone-100 hover:shadow-2xl transition group relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-primary/10 rounded-bl-full -z-0 transition group-hover:scale-110"></div>
                    <div class="relative z-10">
                        <div class="w-16 h-16 bg-primary/10 text-primary rounded-2xl flex items-center justify-center mb-6">
                            <i data-lucide="compass" class="w-8 h-8"></i>
                        </div>
                        <h3 class="font-serif text-2xl font-bold text-earth mb-3">SD Lahiza Sunnah</h3>
                        <p class="text-secondary font-medium mb-4">Fase Kemandirian & Tanggung Jawab</p>
                        <p class="text-stone-600 mb-6 leading-relaxed">
                            Beralih ke fase tanggung jawab. Siswa mulai diberikan proyek nyata seperti mengelola area tanam sendiri, merawat siklus pakan ternak, dan memahami konsep jual beli hasil bumi secara syariah.
                        </p>
                        <ul class="space-y-2 mb-8">
                            <li class="flex items-center gap-2 text-stone-600"><i data-lucide="shovel" class="w-4 h-4 text-primary"></i> Proyek Pertanian Mini</li>
                            <li class="flex items-center gap-2 text-stone-600"><i data-lucide="shovel" class="w-4 h-4 text-primary"></i> Pengenalan Wirausaha Sunnah</li>
                            <li class="flex items-center gap-2 text-stone-600"><i data-lucide="shovel" class="w-4 h-4 text-primary"></i> Tahsin & Tahfidz Quran</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Galeri & Guru -->
    <section id="galeri" class="py-20 bg-stone-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-end mb-12">
                <div>
                    <h2 class="font-serif text-3xl font-bold text-earth mb-2">Jejak Langkah di Alam</h2>
                    <p class="text-stone-600">Dokumentasi kegiatan keseharian siswa Lahiza Sunnah.</p>
                </div>
                <a href="#" class="text-primary font-medium hover:underline mt-4 md:mt-0 flex items-center gap-1">
                    Lihat Semua <i data-lucide="arrow-right" class="w-4 h-4"></i>
                </a>
            </div>

            <!-- Galeri Grid -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-20">
                <div class="aspect-square rounded-2xl overflow-hidden group">
                    <img src="https://images.unsplash.com/photo-1589923158776-cb4485d99fd6?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="Galeri 1" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                </div>
                <div class="aspect-square rounded-2xl overflow-hidden group">
                    <img src="https://images.unsplash.com/photo-1525008985172-e01662c1605b?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="Galeri 2" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                </div>
                <div class="aspect-square rounded-2xl overflow-hidden group">
                    <img src="https://images.unsplash.com/photo-1594498653385-d5172c532c00?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="Galeri 3" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                </div>
                <div class="aspect-square rounded-2xl overflow-hidden group">
                    <img src="https://images.unsplash.com/photo-1628104550873-1bb3cb0179a6?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="Galeri 4" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                </div>
            </div>

            <!-- Asatidz (Guru) -->
            <div class="text-center mb-12">
                <h2 class="font-serif text-3xl font-bold text-earth mb-4">Murobbi & Fasilitator Kami</h2>
                <div class="w-24 h-1 bg-primary mx-auto rounded-full"></div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
                <!-- Guru 1 -->
                <div class="text-center">
                    <div class="w-32 h-32 mx-auto rounded-full bg-sand border-4 border-white shadow-lg overflow-hidden mb-4">
                        <img src="https://ui-avatars.com/api/?name=Ustadz+Ahmad&background=78350f&color=fff&size=150" alt="Ustadz Ahmad" class="w-full h-full object-cover">
                    </div>
                    <h4 class="font-bold text-earth text-lg">Ustadz Ahmad, S.P.</h4>
                    <p class="text-primary text-sm font-medium">Kepala Sekolah & Ahli Pertanian</p>
                </div>
                <!-- Guru 2 -->
                <div class="text-center">
                    <div class="w-32 h-32 mx-auto rounded-full bg-sand border-4 border-white shadow-lg overflow-hidden mb-4">
                        <img src="https://ui-avatars.com/api/?name=Ustadzah+Fatimah&background=15803d&color=fff&size=150" alt="Ustadzah Fatimah" class="w-full h-full object-cover">
                    </div>
                    <h4 class="font-bold text-earth text-lg">Ustadzah Fatimah, S.Pd.</h4>
                    <p class="text-primary text-sm font-medium">Koordinator TK</p>
                </div>
                <!-- Guru 3 -->
                <div class="text-center">
                    <div class="w-32 h-32 mx-auto rounded-full bg-sand border-4 border-white shadow-lg overflow-hidden mb-4">
                        <img src="https://ui-avatars.com/api/?name=Ustadz+Rizal&background=d97706&color=fff&size=150" alt="Ustadz Rizal" class="w-full h-full object-cover">
                    </div>
                    <h4 class="font-bold text-earth text-lg">Ustadz Rizal</h4>
                    <p class="text-primary text-sm font-medium">Fasilitator Peternakan & Diniyah</p>
                </div>
                <!-- Guru 4 -->
                <div class="text-center">
                    <div class="w-32 h-32 mx-auto rounded-full bg-sand border-4 border-white shadow-lg overflow-hidden mb-4">
                        <img src="https://ui-avatars.com/api/?name=Ustadzah+Aisyah&background=78350f&color=fff&size=150" alt="Ustadzah Aisyah" class="w-full h-full object-cover">
                    </div>
                    <h4 class="font-bold text-earth text-lg">Ustadzah Aisyah, S.Psi.</h4>
                    <p class="text-primary text-sm font-medium">Konselor Anak & Fitrah</p>
                </div>
            </div>
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
                        <!-- Artikel 1 -->
                        <div class="flex flex-col sm:flex-row gap-6 group cursor-pointer">
                            <div class="w-full sm:w-48 h-32 rounded-xl overflow-hidden shrink-0">
                                <img src="https://images.unsplash.com/photo-1594608661623-aa0bd3a69d98?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Blog 1" class="w-full h-full object-cover group-hover:scale-105 transition">
                            </div>
                            <div>
                                <span class="text-xs font-bold text-primary tracking-wider uppercase">Edukasi</span>
                                <h3 class="font-serif text-lg font-bold text-earth mt-1 group-hover:text-primary transition">Mengapa Anak Perlu Bermain Tanah?</h3>
                                <p class="text-stone-600 text-sm mt-2 line-clamp-2">Bermain tanah bukan sekadar kotor-kotoran. Dalam pandangan medis, ini menguatkan imun. Dalam pandangan tauhid, ini mengenalkan mereka pada asal muasal penciptaan.</p>
                                <span class="text-xs text-stone-400 mt-2 block">12 April 2026</span>
                            </div>
                        </div>
                        <!-- Artikel 2 -->
                        <div class="flex flex-col sm:flex-row gap-6 group cursor-pointer">
                            <div class="w-full sm:w-48 h-32 rounded-xl overflow-hidden shrink-0">
                                <img src="https://images.unsplash.com/photo-1536640712-4d4c36ef0e57?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Blog 2" class="w-full h-full object-cover group-hover:scale-105 transition">
                            </div>
                            <div>
                                <span class="text-xs font-bold text-secondary tracking-wider uppercase">Adab</span>
                                <h3 class="font-serif text-lg font-bold text-earth mt-1 group-hover:text-primary transition">Mengajarkan Adab Makan dari Hasil Panen Sendiri</h3>
                                <p class="text-stone-600 text-sm mt-2 line-clamp-2">Menghargai makanan menjadi lebih mudah ketika anak tahu seberapa keras proses menanam sebuah sayuran dari biji hingga siap saji.</p>
                                <span class="text-xs text-stone-400 mt-2 block">5 April 2026</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kolom Pengumuman -->
                <div class="bg-sand rounded-3xl p-8 border border-secondary/20 h-fit">
                    <div class="flex items-center gap-3 mb-6">
                        <i data-lucide="bell-ring" class="w-6 h-6 text-earth"></i>
                        <h2 class="font-serif text-xl font-bold text-earth">Papan Pengumuman</h2>
                    </div>
                    <ul class="space-y-4">
                        <li class="bg-white p-4 rounded-xl shadow-sm">
                            <div class="text-primary font-bold text-sm mb-1">Gelombang 1 PPDB Dibuka!</div>
                            <div class="text-stone-600 text-sm">Pendaftaran tahun ajaran 2026/2027 telah dibuka. Kuota terbatas 20 siswa per kelas.</div>
                        </li>
                        <li class="bg-white p-4 rounded-xl shadow-sm border-l-4 border-secondary">
                            <div class="text-secondary font-bold text-sm mb-1">Market Day (Pasar Syariah)</div>
                            <div class="text-stone-600 text-sm">Jumat, 25 Mei 2026. Siswa SD akan menjual hasil panen kebun. Orang tua diundang hadir.</div>
                        </li>
                        <li class="bg-white p-4 rounded-xl shadow-sm border-l-4 border-earth">
                            <div class="text-earth font-bold text-sm mb-1">Kajian Orang Tua (Parenting)</div>
                            <div class="text-stone-600 text-sm">Ahad, 10 Juni 2026 pkl 09.00. Tema: "Membangun Karakter Tangguh di Era Digital".</div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- PPDB Form Section -->
    <section id="ppdb" class="py-24 bg-earth text-white relative">
        <div class="absolute inset-0 opacity-10 bg-[url('https://images.unsplash.com/photo-1550989460-0adf9ea622e2?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80')] bg-cover bg-center"></div>
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-10">
                <span class="bg-secondary/20 text-secondary-300 py-1 px-3 rounded-full text-sm font-semibold tracking-wider mb-4 inline-block">FORM PENDAFTARAN</span>
                <h2 class="font-serif text-3xl md:text-4xl font-bold mb-4">Bergabunglah Bersama Kami</h2>
                <p class="text-stone-300 max-w-2xl mx-auto">Lengkapi formulir di bawah ini untuk pendaftaran awal. Sistem akan membuatkan <strong>Invoice/Tanda Terima</strong> dan mengarahkan Anda ke WhatsApp Admin.</p>
            </div>

            <div class="bg-white rounded-3xl p-8 md:p-12 shadow-2xl text-stone-800">
                <form id="form-ppdb" onsubmit="handleFormSubmit(event)">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <!-- Data Anak -->
                        <div class="space-y-4">
                            <h3 class="font-bold text-earth border-b pb-2 mb-4">Data Calon Siswa</h3>
                            
                            <div>
                                <label class="block text-sm font-medium text-stone-600 mb-1">Nama Lengkap Anak *</label>
                                <input type="text" id="namaAnak" required class="w-full px-4 py-2 border border-stone-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary outline-none transition" placeholder="Masukkan nama lengkap">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-stone-600 mb-1">Tanggal Lahir *</label>
                                <input type="date" id="tglLahir" required class="w-full px-4 py-2 border border-stone-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary outline-none transition">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-stone-600 mb-1">Pilih Unit Pendidikan *</label>
                                <div class="flex gap-4">
                                    <label class="flex-1 border border-stone-200 rounded-xl p-3 cursor-pointer hover:bg-leaf transition flex items-center gap-2">
                                        <input type="radio" name="unit" value="TK" required class="text-primary focus:ring-primary w-4 h-4">
                                        <span class="font-medium text-stone-700">TK Lahiza</span>
                                    </label>
                                    <label class="flex-1 border border-stone-200 rounded-xl p-3 cursor-pointer hover:bg-leaf transition flex items-center gap-2">
                                        <input type="radio" name="unit" value="SD" required class="text-primary focus:ring-primary w-4 h-4">
                                        <span class="font-medium text-stone-700">SD Lahiza</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Data Ortu -->
                        <div class="space-y-4">
                            <h3 class="font-bold text-earth border-b pb-2 mb-4">Data Orang Tua / Wali</h3>
                            
                            <div>
                                <label class="block text-sm font-medium text-stone-600 mb-1">Nama Ayah / Ibu *</label>
                                <input type="text" id="namaOrtu" required class="w-full px-4 py-2 border border-stone-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary outline-none transition" placeholder="Nama representatif">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-stone-600 mb-1">No. WhatsApp Aktif *</label>
                                <input type="tel" id="noWa" required class="w-full px-4 py-2 border border-stone-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary outline-none transition" placeholder="Contoh: 08123456789">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-stone-600 mb-1">Alamat Domisili *</label>
                                <textarea id="alamat" required rows="2" class="w-full px-4 py-2 border border-stone-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-primary outline-none transition" placeholder="Alamat tempat tinggal saat ini"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 flex justify-end">
                        <button type="submit" class="w-full md:w-auto bg-primary hover:bg-primaryLight text-white px-8 py-4 rounded-xl font-bold transition shadow-lg flex items-center justify-center gap-2 text-lg">
                            <i data-lucide="check-circle" class="w-5 h-5"></i>
                            Daftar & Terbitkan Invoice
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-stone-900 text-stone-400 py-12 border-t-4 border-primary no-print">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="col-span-1 md:col-span-2">
                    <div class="flex items-center space-x-2 mb-4">
                        <i data-lucide="leaf" class="h-6 w-6 text-primaryLight"></i>
                        <span class="font-serif font-bold text-xl text-white">Lahiza Sunnah</span>
                    </div>
                    <p class="mb-4 max-w-sm">
                        Mendidik anak sesuai fitrah, membangun karakter Nabawiyah melalui kedekatan dengan alam, pertanian, dan peternakan.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="hover:text-white transition"><i data-lucide="instagram" class="w-5 h-5"></i></a>
                        <a href="#" class="hover:text-white transition"><i data-lucide="facebook" class="w-5 h-5"></i></a>
                        <a href="#" class="hover:text-white transition"><i data-lucide="youtube" class="w-5 h-5"></i></a>
                    </div>
                </div>
                
                <div>
                    <h4 class="text-white font-bold mb-4 font-serif">Kontak Kami</h4>
                    <ul class="space-y-2 text-sm">
                        <li class="flex items-start gap-2">
                            <i data-lucide="map-pin" class="w-4 h-4 shrink-0 mt-1"></i>
                            Jl. Perkebunan Asri No.99, Kaki Gunung, Jawa Barat, Indonesia.
                        </li>
                        <li class="flex items-center gap-2">
                            <i data-lucide="phone" class="w-4 h-4"></i>
                            +62 812 3456 7890
                        </li>
                        <li class="flex items-center gap-2">
                            <i data-lucide="mail" class="w-4 h-4"></i>
                            info@lahizasunnah.sch.id
                        </li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-white font-bold mb-4 font-serif">Tautan</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#tentang" class="hover:text-white transition">Tentang Sekolah</a></li>
                        <li><a href="#unit" class="hover:text-white transition">Unit TK & SD</a></li>
                        <li><a href="#informasi" class="hover:text-white transition">Artikel & Berita</a></li>
                        <li><a href="#ppdb" class="hover:text-white transition">Pendaftaran PPDB</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-stone-800 mt-8 pt-8 text-sm text-center">
                &copy; 2026 Sekolah Lahiza Sunnah. All rights reserved.
            </div>
        </div>
    </footer>

    <!-- MODAL INVOICE (Hidden by default) -->
    <div id="invoice-modal" class="fixed inset-0 z-50 hidden no-print">
        <!-- Backdrop -->
        <div class="absolute inset-0 bg-stone-900/80 backdrop-blur-sm" onclick="closeModal()"></div>
        
        <!-- Modal Content (Scrollable area) -->
        <div class="absolute inset-0 overflow-y-auto pt-10 pb-10 flex justify-center items-start">
            <div id="invoice-content" class="bg-white w-full max-w-2xl rounded-2xl shadow-2xl relative animate-[fadeIn_0.3s_ease-out]">
                
                <!-- Close Button (No Print) -->
                <button onclick="closeModal()" class="absolute top-4 right-4 text-stone-400 hover:text-stone-600 no-print z-10">
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
                            <p class="text-sm text-stone-500">Jl. Perkebunan Asri No.99, Jawa Barat<br>Telp: +62 812 3456 7890</p>
                        </div>
                        <div class="text-right">
                            <h2 class="text-2xl font-bold text-stone-800 uppercase tracking-wider">Tanda Terima</h2>
                            <p class="text-sm text-stone-500 font-mono mt-1" id="inv-no">INV-20260001</p>
                            <p class="text-sm font-medium text-stone-500 mt-1" id="inv-date">Tanggal: 04 April 2026</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-8 mb-8 relative z-10">
                        <div>
                            <p class="text-sm font-bold text-stone-400 uppercase tracking-wider mb-1">Pendaftar (Orang Tua):</p>
                            <p class="font-bold text-stone-800 text-lg" id="inv-ortu">Nama Ortu</p>
                            <p class="text-sm text-stone-600 mt-1" id="inv-wa">08123456789</p>
                            <p class="text-sm text-stone-600 mt-1" id="inv-alamat">Alamat Lengkap</p>
                        </div>
                        <div>
                            <p class="text-sm font-bold text-stone-400 uppercase tracking-wider mb-1">Status Pendaftaran:</p>
                            <span class="bg-amber-100 text-amber-800 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wide inline-block border border-amber-200">
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
                                    <td class="p-4 text-right font-bold text-primary text-base" id="inv-unit">TK Lahiza</td>
                                </tr>
                            </tbody>
                            <tfoot class="bg-stone-100">
                                <tr>
                                    <td class="p-4 text-right font-bold text-stone-600">Biaya Pendaftaran:</td>
                                    <td class="p-4 text-right font-bold text-stone-800 text-lg">Rp 250.000</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    
                    <div class="mt-8 text-center relative z-10">
                        <p class="text-sm text-stone-500 italic">"Semoga Allah memberkahi niat baik Ayah/Bunda dalam memberikan pendidikan terbaik sesuai fitrah bagi ananda."</p>
                    </div>
                </div>

                <!-- Modal Actions (No Print) -->
                <div class="p-6 bg-stone-50 rounded-b-2xl border-t border-stone-200 flex flex-col sm:flex-row justify-end gap-4 no-print">
                    <button onclick="window.print()" class="px-6 py-2.5 rounded-xl font-medium text-stone-600 bg-white border border-stone-300 hover:bg-stone-100 transition flex items-center justify-center gap-2">
                        <i data-lucide="printer" class="w-4 h-4"></i> Cetak / Simpan PDF
                    </button>
                    <a href="#" id="wa-link" target="_blank" class="px-6 py-2.5 rounded-xl font-bold text-white bg-green-600 hover:bg-green-700 transition shadow-lg shadow-green-600/30 flex items-center justify-center gap-2">
                        <i data-lucide="send" class="w-4 h-4"></i> Lanjutkan ke WhatsApp Admin
                    </a>
                </div>

            </div>
        </div>
    </div>

    <!-- Script Logika PPDB & UI -->
    <script>
        // Inisialisasi ikon Lucide
        lucide.createIcons();

        // Nomor WhatsApp Admin Tujuan (Ganti dengan nomor aslinya)
        const ADMIN_WA = "6281234567890"; 

        function handleFormSubmit(event) {
            event.preventDefault(); // Mencegah reload halaman

            // 1. Ambil data dari form
            const namaAnak = document.getElementById('namaAnak').value;
            const tglLahir = document.getElementById('tglLahir').value;
            const unit = document.querySelector('input[name="unit"]:checked').value;
            const namaOrtu = document.getElementById('namaOrtu').value;
            const noWa = document.getElementById('noWa').value;
            const alamat = document.getElementById('alamat').value;

            // 2. Buat Nomor Invoice Random (contoh: REG-2026-XXXX)
            const randomID = Math.floor(1000 + Math.random() * 9000);
            const invoiceNo = `REG-2026-${randomID}`;
            
            // Format Tanggal Hari Ini
            const today = new Date();
            const dateString = today.toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' });

            // 3. Masukkan data ke dalam UI Invoice Modal
            document.getElementById('inv-no').innerText = invoiceNo;
            document.getElementById('inv-date').innerText = `Tanggal: ${dateString}`;
            document.getElementById('inv-ortu').innerText = namaOrtu;
            document.getElementById('inv-wa').innerText = noWa;
            document.getElementById('inv-alamat').innerText = alamat;
            document.getElementById('inv-anak').innerText = namaAnak;
            document.getElementById('inv-tgl').innerText = `Tgl Lahir: ${tglLahir}`;
            document.getElementById('inv-unit').innerText = `${unit} Lahiza`;

            // 4. Siapkan Text Pesan WhatsApp
            const waText = `Assalamu'alaikum Admin Lahiza Sunnah.%0A%0ASaya ingin mengkonfirmasi pendaftaran PPDB dengan detail berikut:%0A%0A*No. Registrasi:* ${invoiceNo}%0A*Nama Anak:* ${namaAnak}%0A*Unit:* ${unit}%0A*Nama Orang Tua:* ${namaOrtu}%0A*No. WA:* ${noWa}%0A%0AMohon panduannya untuk langkah selanjutnya. Terima kasih.`;
            
            // Set Link tombol WA
            document.getElementById('wa-link').href = `https://wa.me/${ADMIN_WA}?text=${waText}`;

            // 5. Tampilkan Modal
            document.getElementById('invoice-modal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('invoice-modal').classList.add('hidden');
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