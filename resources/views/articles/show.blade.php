@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-stone-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <!-- Breadcrumb -->
            <div class="mb-8">
                <a href="{{ route('home') }}" class="text-primary hover:text-earth transition font-medium">Home</a>
                <span class="text-stone-400 mx-2">/</span>
                <span class="text-stone-700">{{ $article->title }}</span>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                <!-- Main Content Area -->
                <div class="lg:col-span-3 order-1 lg:order-2">
                    <!-- Article Header -->
                    <div class="mb-8">
                        <!-- Featured Image -->
                        @if ($article->image_url)
                            <div class="rounded-2xl overflow-hidden mb-8 h-96 shadow-md">
                                <img src="{{ $article->image_url }}" alt="{{ $article->title }}"
                                    class="w-full h-full object-cover">
                            </div>
                        @endif

                        <!-- Category Badge -->
                        <div class="inline-block mb-3">
                            <span
                                class="text-xs font-bold text-secondary tracking-wider uppercase bg-sand px-4 py-1 rounded-full border border-secondary/20">
                                {{ $article->category ?? 'Artikel' }}
                            </span>
                        </div>

                        <!-- Title -->
                        <h1 class="font-serif text-4xl md:text-5xl font-bold text-earth mb-4">
                            {{ $article->title }}
                        </h1>

                        <!-- Meta Information -->
                        <div
                            class="flex flex-wrap items-center gap-6 text-sm text-stone-600 pb-6 border-b border-stone-200">
                            <div class="flex items-center gap-2">
                                <i data-lucide="user" class="w-4 h-4 text-secondary"></i>
                                <span>{{ $article->author_name }}</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <i data-lucide="calendar" class="w-4 h-4 text-secondary"></i>
                                <span>{{ $article->published_at?->format('d M Y') }}</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <i data-lucide="eye" class="w-4 h-4 text-secondary"></i>
                                <span>{{ $article->views ?? 0 }} dibaca</span>
                            </div>
                        </div>
                    </div>

                    <!-- Article Content -->
                    <div class="prose prose-stone max-w-none leading-relaxed text-stone-700 mb-12">
                        {!! nl2br(e($article->content)) !!}
                    </div>

                    <!-- Comments Section -->
                    <div class="border-t border-stone-200 pt-12">
                        <!-- Comments Header -->
                        <h2 class="font-serif text-3xl font-bold text-earth mb-8">
                            Komentar ({{ $comments->count() }})
                        </h2>

                        <!-- Comment Form -->
                        <div class="bg-sand rounded-2xl p-8 mb-8 border border-secondary/20">
                            <h3 class="font-serif text-xl font-bold text-earth mb-4">
                                Tinggalkan Komentar
                            </h3>

                            @if ($errors->any())
                                <div class="mb-4 p-4 bg-red-50 border border-red-200 rounded-lg">
                                    <p class="text-earth font-semibold mb-2">Terjadi kesalahan:</p>
                                    <ul class="text-stone-600 text-sm list-disc list-inside">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if (session('success'))
                                <div class="mb-4 p-4 bg-green-50 border border-green-200 rounded-lg">
                                    <p class="text-green-700 font-semibold">{{ session('success') }}</p>
                                </div>
                            @endif

                            <form action="{{ route('articles.comment.store', $article) }}" method="POST"
                                class="space-y-4">
                                @csrf

                                <!-- Name Input -->
                                <div>
                                    <label for="name" class="block text-sm font-medium text-stone-700 mb-1">
                                        Nama Anda <span class="text-secondary">*</span>
                                    </label>
                                    <input type="text" id="name" name="name" value="{{ old('name') }}"
                                        placeholder="Masukkan nama Anda"
                                        class="w-full px-4 py-2 border border-stone-300 rounded-lg bg-white text-stone-900 focus:ring-2 focus:ring-secondary focus:border-secondary transition-colors @error('name') border-secondary @enderror"
                                        required>
                                    @error('name')
                                        <p class="text-secondary text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Email Input -->
                                <div>
                                    <label for="email" class="block text-sm font-medium text-stone-700 mb-1">
                                        Email Anda <span class="text-secondary">*</span>
                                    </label>
                                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                                        placeholder="contoh@email.com"
                                        class="w-full px-4 py-2 border border-stone-300 rounded-lg bg-white text-stone-900 focus:ring-2 focus:ring-secondary focus:border-secondary transition-colors @error('email') border-secondary @enderror"
                                        required>
                                    @error('email')
                                        <p class="text-secondary text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Comment Input -->
                                <div>
                                    <label for="content" class="block text-sm font-medium text-stone-700 mb-1">
                                        Komentar Anda <span class="text-secondary">*</span>
                                    </label>
                                    <textarea id="content" name="content" rows="4" placeholder="Tulis komentar Anda di sini..."
                                        class="w-full px-4 py-2 border border-stone-300 rounded-lg bg-white text-stone-900 focus:ring-2 focus:ring-secondary focus:border-secondary transition-colors resize-vertical @error('content') border-secondary @enderror"
                                        required></textarea>
                                    @error('content')
                                        <p class="text-secondary text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Submit Button -->
                                <button type="submit"
                                    class="bg-secondary hover:bg-earth text-white font-semibold py-2.5 px-6 rounded-lg transition-colors duration-200">
                                    Kirim Komentar
                                </button>
                            </form>
                        </div>

                        <!-- Comments List -->
                        @if ($comments->count() > 0)
                            <div class="space-y-6">
                                @foreach ($comments as $comment)
                                    <div class="border-b border-stone-200 pb-6 last:border-b-0 last:pb-0">
                                        <!-- Comment Header -->
                                        <div class="flex items-start gap-4 mb-3">
                                            <div
                                                class="w-12 h-12 rounded-full bg-secondary flex items-center justify-center text-white font-semibold shrink-0">
                                                {{ substr($comment->name, 0, 1) }}
                                            </div>
                                            <div>
                                                <p class="font-semibold text-earth">
                                                    {{ $comment->name }}
                                                </p>
                                                <p class="text-xs text-stone-500">
                                                    {{ $comment->created_at->diffForHumans() }}
                                                </p>
                                            </div>
                                        </div>

                                        <!-- Comment Content -->
                                        <p class="text-stone-700">
                                            {{ $comment->content }}
                                        </p>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-8">
                                <p class="text-stone-500">
                                    Belum ada komentar. Jadilah yang pertama untuk memberikan komentar!
                                </p>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Sidebar - Related Articles (Right Side) -->
                <div class="lg:col-span-1 order-2 lg:order-3 sticky top-20 h-fit">
                    <!-- Article Info Card -->
                    <div class="bg-sand rounded-2xl p-6 mb-6 border border-secondary/20">
                        <h4 class="font-serif font-bold text-earth mb-4 flex items-center gap-2">
                            <i data-lucide="book-open" class="w-5 h-5 text-secondary"></i>
                            Informasi Artikel
                        </h4>
                        <div class="space-y-4 text-sm">
                            <div>
                                <p class="text-stone-500 text-xs uppercase font-semibold">Penulis</p>
                                <p class="text-earth font-medium mt-1">{{ $article->author_name }}</p>
                            </div>
                            <div>
                                <p class="text-stone-500 text-xs uppercase font-semibold">Kategori</p>
                                <p class="text-earth font-medium mt-1">{{ $article->category ?? 'Umum' }}</p>
                            </div>
                            <div>
                                <p class="text-stone-500 text-xs uppercase font-semibold">Dibaca</p>
                                <p class="text-earth font-medium mt-1">{{ $article->views ?? 0 }} kali</p>
                            </div>
                            <div>
                                <p class="text-stone-500 text-xs uppercase font-semibold">Waktu Baca</p>
                                <p class="text-earth font-medium mt-1">{{ $article->reading_time }} menit</p>
                            </div>
                        </div>
                    </div>

                    <!-- Related Articles Card -->
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-stone-200">
                        <h3 class="font-serif font-bold text-earth mb-4 flex items-center gap-2">
                            <i data-lucide="sparkles" class="w-5 h-5 text-secondary"></i>
                            Artikel Terkait
                        </h3>

                        @if ($relatedArticles->count() > 0)
                            <div class="space-y-4">
                                @foreach ($relatedArticles as $related)
                                    <a href="{{ route('articles.show', $related) }}" class="group block">
                                        <div class="overflow-hidden rounded-xl bg-stone-100 h-24 mb-2">
                                            @if ($related->image_url)
                                                <img src="{{ $related->image_url }}"
                                                    alt="{{ $related->title }}"
                                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                            @else
                                                <div
                                                    class="w-full h-full bg-gradient-to-br from-primary/20 to-secondary/20 flex items-center justify-center">
                                                    <i data-lucide="book-open" class="w-8 h-8 text-primary/40"></i>
                                                </div>
                                            @endif
                                        </div>
                                        <h4
                                            class="text-sm font-semibold text-earth group-hover:text-secondary transition-colors line-clamp-2">
                                            {{ $related->title }}
                                        </h4>
                                        <p class="text-xs text-stone-500 mt-1">
                                            {{ $related->published_at?->format('d M Y') }}
                                        </p>
                                    </a>
                                @endforeach
                            </div>
                        @else
                            <p class="text-stone-500 text-sm text-center py-4">
                                Belum ada artikel terkait lainnya.
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
