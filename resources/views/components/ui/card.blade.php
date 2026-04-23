@props([
    'p' => '6',
])

<div {{ $attributes->merge(['class' => "rounded-2xl bg-white shadow-sm ring-1 ring-stone-200/60 p-{$p}"]) }}>
    {{ $slot }}
</div>

