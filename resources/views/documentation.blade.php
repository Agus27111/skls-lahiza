<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <title>Video Dokumentasi - Sekolah Lahiza Sunnah</title>
    @include('partials.head')
</head>

<body class="bg-stone-50 text-stone-800 font-sans antialiased">

    @include('partials.navbar')
    @include('partials.whatsapp-button')

    <!-- Hero Section -->
    <div class="hero-pattern pt-32 pb-16 mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="flex justify-center mb-6">
                <i data-lucide="video" class="h-16 w-16 text-secondary"></i>
            </div>
            <h1 class="font-serif text-4xl md:text-5xl font-bold text-earth mb-4">Video Dokumentasi</h1>
            <p class="text-xl text-stone-700 max-w-2xl mx-auto">Koleksi video pembelajaran dan dokumentasi kegiatan
                Sekolah Lahiza Sunnah</p>
        </div>
    </div>

    <!-- Content Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">

        <!-- Filter By Category -->
        <div class="mb-12">
            <div class="flex flex-wrap gap-3 justify-center md:justify-start">
                <button onclick="filterVideos('semua')"
                    class="category-btn px-6 py-2.5 rounded-full font-medium transition hover:shadow-lg active:bg-primary active:text-white bg-white border border-stone-200 text-stone-700 hover:border-primary hover:text-primary"
                    data-category="semua">
                    Semua Kategori
                </button>
                @foreach ($categories as $category)
                    <button onclick="filterVideos('{{ str_replace([' ', '&'], ['-', '-'], strtolower($category)) }}')"
                        class="category-btn px-6 py-2.5 rounded-full font-medium transition hover:shadow-lg bg-white border border-stone-200 text-stone-700 hover:border-primary hover:text-primary"
                        data-category="{{ str_replace([' ', '&'], ['-', '-'], strtolower($category)) }}">
                        {{ $category }}
                    </button>
                @endforeach
            </div>
        </div>

        <!-- Videos Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($videos as $video)
                <div class="video-card bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all transform hover:-translate-y-2 duration-300"
                    data-category="{{ str_replace([' ', '&'], ['-', '-'], strtolower($video->category)) }}">
                    <!-- Thumbnail -->
                    <div class="relative bg-stone-200 overflow-hidden h-48">
                        @if ($video->thumbnail)
                            <img src="{{ $video->thumbnail }}" alt="{{ $video->title }}"
                                class="w-full h-full object-cover">
                        @else
                            <div
                                class="w-full h-full bg-gradient-to-br from-primary to-primaryLight flex items-center justify-center">
                                <i data-lucide="video" class="h-12 w-12 text-white/50"></i>
                            </div>
                        @endif

                        <!-- Play Button Overlay -->
                        <div class="absolute inset-0 bg-black/30 group hover:bg-black/50 transition flex items-center justify-center cursor-pointer"
                            onclick="openVideoModal('{{ $video->youtube_url }}')">
                            <button
                                class="bg-white/90 hover:bg-white text-primary p-4 rounded-full transition transform hover:scale-110">
                                <i data-lucide="play" class="h-8 w-8 fill-current"></i>
                            </button>
                        </div>

                        <!-- Category Badge -->
                        <div class="absolute top-4 right-4">
                            <span class="bg-secondary text-white px-4 py-1 rounded-full text-sm font-medium">
                                {{ $video->category }}
                            </span>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-earth mb-2 line-clamp-2 hover:text-primary transition">
                            {{ $video->title }}
                        </h3>

                        @if ($video->description)
                            <p class="text-stone-600 text-sm mb-4 line-clamp-3">
                                {{ $video->description }}
                            </p>
                        @endif

                        <button onclick="openVideoModal('{{ $video->youtube_url }}')"
                            class="w-full bg-primary hover:bg-earth text-white py-2.5 rounded-lg font-medium transition flex items-center justify-center gap-2">
                            <i data-lucide="play" class="h-5 w-5"></i>
                            Tonton Video
                        </button>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-20">
                    <i data-lucide="inbox" class="h-16 w-16 text-stone-300 mx-auto mb-4"></i>
                    <p class="text-xl text-stone-500">Belum ada video dokumentasi</p>
                </div>
            @endforelse
        </div>
    </div>

    <!-- Jejak Langkah Section -->
    <div class="bg-gradient-to-br from-leaf to-sand py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center gap-4 mb-8">
                <i data-lucide="image" class="h-10 w-10 text-secondary"></i>
                <h2 class="text-3xl md:text-4xl font-bold text-earth">Jejak Langkah di Alam</h2>
            </div>
            <p class="text-lg text-stone-700 mb-12 max-w-2xl">Dokumentasi kegiatan keseharian siswa Lahiza Sunnah</p>

            <!-- Photos Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                @forelse($photos as $photo)
                    <div class="photo-card bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all transform hover:-translate-y-2 duration-300 cursor-pointer"
                        onclick="openPhotoModal(@js($photo->image_url), @js($photo->title))">
                        <!-- Photo -->
                        <div class="relative bg-stone-200 overflow-hidden h-56">
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
                        <div class="p-4">
                            <h3 class="text-lg font-bold text-earth mb-1 line-clamp-2 hover:text-primary transition">
                                {{ $photo->title }}
                            </h3>
                            @if ($photo->caption)
                                <p class="text-sm text-stone-600 line-clamp-2">
                                    {{ $photo->caption }}
                                </p>
                            @endif
                            @if ($photo->photo_date)
                                <p class="text-xs text-stone-500 mt-2">
                                    <i data-lucide="calendar" class="inline h-4 w-4 mr-1"></i>
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

            <!-- See All Button -->
            <div class="text-center">
                <a href="/jejak-langkah"
                    class="inline-flex items-center gap-2 bg-primary hover:bg-earth text-white px-8 py-3.5 rounded-lg font-bold transition shadow-lg shadow-primary/30 hover:shadow-lg hover:shadow-earth/30">
                    <i data-lucide="arrow-right" class="h-5 w-5"></i>
                    Lihat Semua Foto
                </a>
            </div>
        </div>
    </div>

    <!-- Video Modal -->
    <div id="videoModal" class="hidden fixed inset-0 bg-black/80 z-50 flex items-center justify-center p-4">
        <div class="bg-black rounded-xl max-w-4xl w-full max-h-[90vh] overflow-hidden">
            <div class="flex justify-between items-center p-6 border-b border-stone-700">
                <h2 class="text-white text-xl font-bold">Video</h2>
                <button onclick="closeVideoModal()" class="text-white hover:text-stone-300">
                    <i data-lucide="x" class="h-6 w-6"></i>
                </button>
            </div>
            <div class="aspect-video">
                <iframe id="videoIframe" width="100%" height="100%" src="" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>
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

        function filterVideos(category) {
            const cards = document.querySelectorAll('.video-card');
            const buttons = document.querySelectorAll('.category-btn');

            // Update button states
            buttons.forEach(btn => {
                btn.classList.remove('bg-primary', 'text-white', 'border-primary');
                btn.classList.add('bg-white', 'text-stone-700', 'border-stone-200');
            });

            event.target.classList.add('bg-primary', 'text-white', 'border-primary');
            event.target.classList.remove('bg-white', 'text-stone-700', 'border-stone-200');

            // Filter cards
            cards.forEach(card => {
                if (category === 'semua' || card.dataset.category === category) {
                    card.style.display = 'block';
                    card.classList.add('animate-fade-in');
                } else {
                    card.style.display = 'none';
                }
            });
        }

        function openVideoModal(youtubeUrl) {
            const modal = document.getElementById('videoModal');
            const iframe = document.getElementById('videoIframe');

            // Convert YouTube URL to embed URL
            let embedUrl = youtubeUrl;
            if (youtubeUrl.includes('youtu.be')) {
                const videoId = youtubeUrl.split('youtu.be/')[1].split('?')[0];
                embedUrl = `https://www.youtube-nocookie.com/embed/${videoId}`;
            } else if (youtubeUrl.includes('youtube.com')) {
                const videoId = youtubeUrl.split('v=')[1].split('&')[0];
                embedUrl = `https://www.youtube-nocookie.com/embed/${videoId}`;
            } else if (!youtubeUrl.includes('youtube-nocookie.com')) {
                embedUrl = `https://www.youtube-nocookie.com/embed/${youtubeUrl}`;
            }

            iframe.src = embedUrl;
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeVideoModal() {
            const modal = document.getElementById('videoModal');
            const iframe = document.getElementById('videoIframe');

            modal.classList.add('hidden');
            iframe.src = '';
            document.body.style.overflow = 'auto';
        }

        // Close modal when clicking outside
        document.getElementById('videoModal')?.addEventListener('click', function(e) {
            if (e.target === this) {
                closeVideoModal();
            }
        });

        // Keyboard shortcut to close modal
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeVideoModal();
                closePhotoModal();
            }
        });

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
