@props(['padding' => true])

@php
    $base = 'rounded-2xl border-2 border-zinc-100 bg-white shadow-sm hover:shadow-md transition-shadow duration-200';
    $paddingClass = $padding ? 'p-6' : '';
@endphp

<div {{ $attributes->merge(['class' => "$base $paddingClass"]) }}>
    {{ $slot }}
</div>
