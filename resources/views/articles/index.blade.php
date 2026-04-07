@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-stone-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <!-- Page Header -->
            <div class="mb-12">
                <h1 class="font-serif text-4xl md:text-5xl font-bold text-earth mb-4">
                    Kumpulan Artikel
                </h1>
                <p class="text-stone-600 text-lg">
                    Temukan artikel-artikel menarik dari para pengajar kami
                </p>
            </div>

            <!-- Search & Filter Section -->
            <div class="bg-white rounded-2xl p-6 mb-8 shadow-sm border border-stone-200">
                <form method="GET" action="{{ route('articles.index') }}" class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <!-- Search Input -->
                        <div class="md:col-span-2">
                            <label for="search" class="block text-sm font-medium text-stone-700 mb-2">
                                <i data-lucide="search" class="w-4 h-4 inline mr-2"></i>
                                Cari Artikel
                            </label>
                            <input type="text" name="search" id="search" value="{{ request('search') }}"
                                placeholder="Cari berdasarkan judul, kategori..."
                                class="w-full px-4 py-2.5 border border-stone-300 rounded-lg bg-white text-stone-900 focus:ring-2 focus:ring-secondary focus:border-secondary transition-colors">
                        </div>

                        <!-- Category Filter -->
                        <div>
                            <label for="category" class="block text-sm font-medium text-stone-700 mb-2">
                                <i data-lucide="filter" class="w-4 h-4 inline mr-2"></i>
                                Kategori
                            </label>
                            <select name="category" id="category"
                                class="w-full px-4 py-2.5 border border-stone-300 rounded-lg bg-white text-stone-900 focus:ring-2 focus:ring-secondary focus:border-secondary transition-colors">
                                <option value="">Semua Kategori</option>
                                @foreach ($categories as $cat)
                                    <option value="{{ $cat }}"
                                        {{ request('category') === $cat ? 'selected' : '' }}>
                                        {{ $cat }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Search & Reset Buttons -->
                    <div class="flex gap-3">
                        <button type="submit"
                            class="flex items-center gap-2 bg-secondary hover:bg-earth text-white font-semibold py-2.5 px-6 rounded-lg transition-colors duration-200">
                            <i data-lucide="search" class="w-4 h-4"></i>
                            Cari
                        </button>
                        @if (request('search') || request('category'))
                            <a href="{{ route('articles.index') }}"
                                class="flex items-center gap-2 bg-stone-200 hover:bg-stone-300 text-stone-700 font-semibold py-2.5 px-6 rounded-lg transition-colors duration-200">
                                <i data-lucide="x" class="w-4 h-4"></i>
                                Reset
                            </a>
                        @endif
                    </div>
                </form>
            </div>

            <!-- Results Info -->
            @if (request('search') || request('category'))
                <div class="mb-6 p-4 bg-sand rounded-lg border border-secondary/20">
                    <p class="text-stone-700">
                        @if (request('search') && request('category'))
                            Hasil pencarian untuk <strong>"{{ request('search') }}"</strong> dalam kategori
                            <strong>"{{ request('category') }}"</strong>
                        @elseif (request('search'))
                            Hasil pencarian untuk <strong>"{{ request('search') }}"</strong>
                        @else
                            Artikel kategori <strong>"{{ request('category') }}"</strong>
                        @endif
                        <span class="text-stone-600">({{ $articles->total() }} artikel ditemukan)</span>
                    </p>
                </div>
            @endif

            <!-- Articles Grid -->
            @if ($articles->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
                    @foreach ($articles as $article)
                        <a href="{{ route('articles.show', $article) }}" class="group">
                            <div
                                class="bg-white rounded-2xl overflow-hidden shadow-sm border border-stone-200 hover:shadow-md hover:border-secondary/30 transition-all duration-300 h-full flex flex-col">
                                <!-- Article Image -->
                                <div class="overflow-hidden bg-stone-100 h-48">
                                    @if ($article->image_url)
                                        <img src="{{ $article->image_url }}" alt="{{ $article->title }}"
                                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                    @else
                                        <div
                                            class="w-full h-full bg-gradient-to-br from-primary/20 to-secondary/20 flex items-center justify-center">
                                            <i data-lucide="book-open" class="w-12 h-12 text-primary/40"></i>
                                        </div>
                                    @endif
                                </div>

                                <!-- Article Content -->
                                <div class="p-6 flex flex-col flex-grow">
                                    <!-- Category Badge -->
                                    <div class="mb-3">
                                        <span
                                            class="text-xs font-bold text-secondary tracking-wider uppercase bg-sand px-3 py-1 rounded-full border border-secondary/20">
                                            {{ $article->category ?? 'Artikel' }}
                                        </span>
                                    </div>

                                    <!-- Title -->
                                    <h3
                                        class="font-serif text-xl font-bold text-earth mb-2 group-hover:text-secondary transition-colors line-clamp-2">
                                        {{ $article->title }}
                                    </h3>

                                    <!-- Excerpt -->
                                    <p class="text-stone-600 text-sm mb-4 line-clamp-3 flex-grow">
                                        {{ $article->excerpt ?? Str::limit($article->content, 150) }}
                                    </p>

                                    <!-- Meta Info -->
                                    <div
                                        class="flex flex-wrap items-center justify-between gap-2 pt-4 border-t border-stone-200 text-xs text-stone-500">
                                        <div class="flex items-center gap-2">
                                            <i data-lucide="user" class="w-4 h-4 text-secondary"></i>
                                            <span>{{ $article->teacher?->name ?? 'Admin' }}</span>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <i data-lucide="calendar" class="w-4 h-4 text-secondary"></i>
                                            <span>{{ $article->published_at?->format('d M Y') }}</span>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <i data-lucide="eye" class="w-4 h-4 text-secondary"></i>
                                            <span>{{ $article->views ?? 0 }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="flex justify-center">
                    {{ $articles->appends(request()->query())->links('pagination::tailwind') }}
                </div>
            @else
                <!-- No Results Message -->
                <div class="bg-white rounded-2xl p-12 text-center border border-stone-200">
                    <i data-lucide="search" class="w-16 h-16 text-stone-300 mx-auto mb-4"></i>
                    <h3 class="font-serif text-2xl font-bold text-stone-700 mb-2">
                        Tidak Ada Artikel Ditemukan
                    </h3>
                    <p class="text-stone-600 mb-6">
                        @if (request('search') || request('category'))
                            Maaf, kami tidak menemukan artikel yang sesuai dengan pencarian Anda. Coba gunakan kata kunci
                            yang berbeda.
                        @else
                            Belum ada artikel tersedia saat ini.
                        @endif
                    </p>
                    @if (request('search') || request('category'))
                        <a href="{{ route('articles.index') }}"
                            class="inline-flex items-center gap-2 bg-secondary hover:bg-earth text-white font-semibold py-2.5 px-6 rounded-lg transition-colors duration-200">
                            <i data-lucide="arrow-left" class="w-4 h-4"></i>
                            Kembali ke Semua Artikel
                        </a>
                    @endif
                </div>
            @endif
        </div>
    </div>
@endsection
