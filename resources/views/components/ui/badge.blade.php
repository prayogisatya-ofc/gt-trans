@props([
    'variant' => 'default', // default|success|warning|danger|info|primary
    'size' => 'md', // sm|md|lg
    'dot' => false,
])

@php
    // Base styles
    $base = 'inline-flex items-center gap-1.5 font-bold';
    
    // Size variations
    $sizes = match($size) {
        'sm' => 'rounded-md px-2 py-0.5 text-[10px]',
        'lg' => 'rounded-xl px-4 py-2 text-sm',
        default => 'rounded-lg px-3 py-1 text-xs',
    };
    
    // Variant styles - menggunakan palet warna yang diberikan
    $styles = match($variant) {
        'success' => 'bg-primary-50 text-primary-700 border border-primary-200',
        'warning' => 'bg-secondary-50 text-secondary-700 border border-secondary-200',
        'danger' => 'bg-red-50 text-red-700 border border-red-200',
        'info' => 'bg-blue-50 text-blue-700 border border-blue-200',
        'primary' => 'bg-primary-600 text-white shadow-sm shadow-primary-600/30',
        default => 'bg-zinc-100 text-zinc-700 border border-zinc-200',
    };
    
    // Dot color based on variant
    $dotColor = match($variant) {
        'success' => 'bg-primary-500',
        'warning' => 'bg-secondary-500',
        'danger' => 'bg-red-500',
        'info' => 'bg-blue-500',
        'primary' => 'bg-white',
        default => 'bg-zinc-500',
    };
@endphp

<span {{ $attributes->merge(['class' => "$base $sizes $styles"]) }}>
    @if($dot)
        <span class="h-1.5 w-1.5 rounded-full {{ $dotColor }} animate-pulse"></span>
    @endif
    {{ $slot }}
</span>
