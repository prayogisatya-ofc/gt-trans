@props([
    'href' => null,
    'variant' => 'primary', // primary|outline|ghost|secondary
    'size' => 'md', // sm|md|lg
])

@php
    $base = 'inline-flex items-center justify-center font-bold transition-all duration-200 disabled:opacity-50 disabled:cursor-not-allowed cursor-pointer focus:outline-none focus:ring-4';
    
    // Size variations
    $sizes = match($size) {
        'sm' => 'rounded-lg px-3 py-1.5 text-xs',
        'lg' => 'rounded-2xl px-6 py-3 text-base',
        default => 'rounded-xl px-4 py-2 text-sm',
    };
    
    // Variant styles
    $styles = match($variant) {
        'primary' => 'bg-primary-600 hover:bg-primary-700 shadow-md shadow-primary-600/20 hover:shadow-lg hover:shadow-primary-600/30 focus:ring-primary-300',
        'outline' => 'border-2 border-zinc-300 bg-white text-zinc-700 hover:border-primary-600 hover:bg-primary-50 hover:text-primary-700 shadow-sm hover:shadow-md focus:ring-primary-200',
        'ghost' => 'text-zinc-700 hover:bg-zinc-100 hover:text-zinc-900 focus:ring-zinc-200',
        'secondary' => 'bg-secondary-400 text-secondary-950 hover:bg-secondary-500 shadow-md shadow-secondary-400/20 hover:shadow-lg hover:shadow-secondary-500/30 focus:ring-secondary-300',
        default => 'bg-primary-600 hover:bg-primary-700 shadow-md shadow-primary-600/20 hover:shadow-lg hover:shadow-primary-600/30 focus:ring-primary-300',
    };
@endphp

@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => "$base $sizes $styles"]) }}>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['class' => "$base $sizes $styles"]) }}>
        {{ $slot }}
    </button>
@endif
