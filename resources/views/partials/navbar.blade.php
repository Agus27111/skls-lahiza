@php
    $isPpdbActive = $activeHeroSection?->is_ppdb_active ?? true;
@endphp

<nav class="fixed w-full bg-white/90 backdrop-blur-md shadow-sm z-40 transition-all no-print">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <div class="flex items-center space-x-2">
                <a href="/" class="flex items-center space-x-2 hover:opacity-80 transition">
                    <i data-lucide="leaf" class="h-8 w-8 text-primary"></i>
                    <span class="font-serif font-bold text-2xl text-earth">Lahiza Sunnah</span>
                </a>
            </div>
            <div class="hidden md:flex space-x-8">
                <a href="/" class="text-stone-600 hover:text-primary transition font-medium">Beranda</a>
                <a href="/tentang-kami" class="text-stone-600 hover:text-primary transition font-medium">Tentang
                    Kami</a>
                <a href="/#unit" class="text-stone-600 hover:text-primary transition font-medium">Unit Sekolah</a>
                <a href="/dokumentasi" class="text-stone-600 hover:text-primary transition font-medium">Video</a>
                <a href="/jejak-langkah"
                    class="text-stone-600 hover:text-primary transition font-medium">Dokumentasi</a>
                <a href="/artikel" class="text-stone-600 hover:text-primary transition font-medium">Informasi</a>
            </div>
            @if ($isPpdbActive)
                <div class="hidden md:flex">
                    <a href="/#ppdb"
                        class="bg-primary hover:bg-earth text-white px-6 py-2.5 rounded-full font-medium transition shadow-lg shadow-primary/30 flex items-center gap-2">
                        <i data-lucide="clipboard-signature" class="w-5 h-5"></i>
                        Daftar PPDB
                    </a>
                </div>
            @endif
            <div class="md:hidden flex items-center">
                <button class="text-stone-600 hover:text-primary focus:outline-none"
                    onclick="document.getElementById('mobile-menu').classList.toggle('hidden')">
                    <i data-lucide="menu" class="h-6 w-6"></i>
                </button>
            </div>
        </div>
    </div>
    <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-stone-100">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <a href="/" class="block px-3 py-2 text-stone-600 font-medium">Beranda</a>
            <a href="/tentang-kami" class="block px-3 py-2 text-stone-600 font-medium">Tentang Kami</a>
            <a href="/#unit" class="block px-3 py-2 text-stone-600 font-medium">Unit Sekolah</a>
            <a href="/dokumentasi" class="block px-3 py-2 text-stone-600 font-medium">Video</a>
            <a href="/jejak-langkah" class="block px-3 py-2 text-stone-600 font-medium">Dokumentasi</a>
            <a href="/artikel" class="block px-3 py-2 text-stone-600 font-medium">Informasi</a>
            @if ($isPpdbActive)
                <a href="/#ppdb" class="block px-3 py-2 text-primary font-bold">Daftar PPDB</a>
            @endif
        </div>
    </div>
</nav>
