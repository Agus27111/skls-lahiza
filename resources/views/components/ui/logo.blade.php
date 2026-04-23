@props([
    'size' => '8',
])

@php
    $logoUrl = $currentSchool?->logo_url ?? asset('storage/framework/views_compiled/logo-skls.png');
    $brand = $currentSchool?->name ?? config('app.name');
@endphp

<div class="flex items-center gap-2">
    <img src="{{ $logoUrl }}" alt="{{ $brand }}" class="h-{{ $size }} w-{{ $size }} object-contain">
    <span class="font-serif font-bold text-2xl text-earth">{{ \Illuminate\Support\Str::lower($brand) }}</span>
</div>

