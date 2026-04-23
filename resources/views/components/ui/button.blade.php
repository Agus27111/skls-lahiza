@props([
    'href' => null,
    'variant' => 'primary', // primary | secondary | ghost
    'size' => 'md', // sm | md | lg
    'type' => 'button',
])

@php
    $base = 'inline-flex items-center justify-center gap-2 rounded-full font-medium transition focus:outline-none focus-visible:ring-2 focus-visible:ring-primary/40';

    $sizes = [
        'sm' => 'px-4 py-2 text-sm',
        'md' => 'px-6 py-2.5 text-sm',
        'lg' => 'px-7 py-3 text-base',
    ];

    $variants = [
        'primary' => 'bg-primary text-white hover:opacity-90 shadow-lg shadow-primary/30',
        'secondary' => 'bg-secondary text-white hover:opacity-90 shadow-lg shadow-secondary/30',
        'ghost' => 'bg-transparent text-primary hover:bg-primary/10',
    ];

    $className = trim($base.' '.($sizes[$size] ?? $sizes['md']).' '.($variants[$variant] ?? $variants['primary']).' '.$attributes->get('class'));
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $className]) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $className]) }}>
        {{ $slot }}
    </button>
@endif

