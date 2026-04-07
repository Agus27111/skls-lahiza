<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <title>Jejak Langkah di Alam - Sekolah Lahiza Sunnah</title>
    @include('partials.head')
</head>

<body class="bg-stone-50 text-stone-800 font-sans antialiased">

    @include('partials.navbar')
    @include('partials.whatsapp-button')

    <!-- Hero Section -->
    <div class="hero-pattern pt-32 pb-16 mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="flex justify-center mb-6">
                <i data-lucide="image" class="h-16 w-16 text-secondary"></i>
            </div>
            <h1 class="font-serif text-4xl md:text-5xl font-bold text-earth mb-4">Jejak Langkah di Alam</h1>
            <p class="text-xl text-stone-700 max-w-2xl mx-auto">Dokumentasi kegiatan keseharian siswa Lahiza Sunnah.
                Momen berharga dari setiap pembelajaran di alam</p>
        </div>
    </div>

    <!-- Content Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">

        <!-- Photos Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($photos as $photo)
                <div class="photo-card bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all transform hover:-translate-y-2 duration-300 cursor-pointer"
                    onclick="openPhotoModal(@js($photo->image_url), @js($photo->title))">
                    <!-- Photo -->
                    <div class="relative bg-stone-200 overflow-hidden h-64">
                        <img src="{{ $photo->image_url }}" alt="{{ $photo->title }}"
                            class="w-full h-full object-cover">

                        <!-- Overlay -->
                        <div
                            class="absolute inset-0 bg-black/40 hover:bg-black/60 transition flex items-center justify-center">
                            <button
                                class="bg-white/90 hover:bg-white text-secondary p-4 rounded-full transition transform hover:scale-110">
                                <i data-lucide="expand" class="h-8 w-8 fill-current"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="p-6">
                        <h3 class="text-lg font-bold text-earth mb-2 line-clamp-2 hover:text-primary transition">
                            {{ $photo->title }}
                        </h3>
                        @if ($photo->description)
                            <p class="text-stone-600 text-sm mb-3 line-clamp-3">
                                {{ $photo->description }}
                            </p>
                        @endif
                        @if ($photo->caption)
                            <p class="text-sm text-stone-600 italic mb-3 line-clamp-2">
                                "{{ $photo->caption }}"
                            </p>
                        @endif
                        @if ($photo->photo_date)
                            <p class="text-xs text-stone-500 flex items-center gap-2">
                                <i data-lucide="calendar" class="h-4 w-4"></i>
                                {{ $photo->photo_date->format('d M Y') }}
                            </p>
                        @endif
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-20">
                    <i data-lucide="inbox" class="h-16 w-16 text-stone-300 mx-auto mb-4"></i>
                    <p class="text-xl text-stone-500">Belum ada foto dokumentasi</p>
                </div>
            @endforelse
        </div>

        <!-- Back Button -->
        <div class="mt-16 text-center">
            <a href="/dokumentasi"
                class="inline-flex items-center gap-2 text-primary hover:text-earth font-bold transition">
                <i data-lucide="arrow-left" class="h-5 w-5"></i>
                Kembali ke Dokumentasi
            </a>
        </div>
    </div>

    <!-- Photo Modal -->
    <div id="photoModal" class="hidden fixed inset-0 bg-black/80 z-50 flex items-center justify-center p-4">
        <div class="bg-black rounded-xl max-w-4xl w-full max-h-[90vh] overflow-hidden">
            <div class="flex justify-between items-center p-6 border-b border-stone-700">
                <h2 class="text-white text-xl font-bold" id="photoTitle">Foto</h2>
                <button onclick="closePhotoModal()" class="text-white hover:text-stone-300">
                    <i data-lucide="x" class="h-6 w-6"></i>
                </button>
            </div>
            <div class="w-full max-h-[calc(90vh-100px)]">
                <img id="photoImage" src="" alt="Foto" class="w-full h-full object-contain">
            </div>
        </div>
    </div>

    @include('partials.footer')

    <script>
        // Initialize Lucide icons
        lucide.createIcons();

        // Photo Modal Functions
        function openPhotoModal(imagePath, title) {
            const modal = document.getElementById('photoModal');
            const photoImage = document.getElementById('photoImage');
            const photoTitle = document.getElementById('photoTitle');

            photoImage.src = imagePath;
            photoTitle.textContent = title;
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closePhotoModal() {
            const modal = document.getElementById('photoModal');
            const photoImage = document.getElementById('photoImage');

            modal.classList.add('hidden');
            photoImage.src = '';
            document.body.style.overflow = 'auto';
        }

        // Close photo modal when clicking outside
        document.getElementById('photoModal')?.addEventListener('click', function(e) {
            if (e.target === this) {
                closePhotoModal();
            }
        });

        // Keyboard shortcut to close modal
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closePhotoModal();
            }
        });

        // Add animation CSS
        const style = document.createElement('style');
        style.textContent = `
            @keyframes fadeIn {
                from {
                    opacity: 0;
                    transform: translateY(10px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
            .animate-fade-in {
                animation: fadeIn 0.3s ease-in-out;
            }
            .line-clamp-2 {
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }
            .line-clamp-3 {
                display: -webkit-box;
                -webkit-line-clamp: 3;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }
        `;
        document.head.appendChild(style);
    </script>
</body>

</html>
