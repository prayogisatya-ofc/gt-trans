@props([
    'show' => false, 
    'title' => null,
    'size' => 'md', // sm|md|lg|xl
    'closeable' => true,
])

@php
    $sizeClasses = match($size) {
        'sm' => 'max-w-md',
        'lg' => 'max-w-3xl',
        'xl' => 'max-w-5xl',
        default => 'max-w-lg',
    };
@endphp

<div
    x-data="{ open: @js($show) }"
    x-show="open"
    @keydown.escape.window="open = false"
    class="fixed inset-0 z-50 flex items-center justify-center px-4 py-6"
    style="display:none"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
>
    {{-- Backdrop --}}
    <div 
        class="absolute inset-0 bg-zinc-900/60 backdrop-blur-sm" 
        @if($closeable) @click="open=false" @endif
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100">
    </div>

    {{-- Modal Content --}}
    <div 
        class="relative w-full {{ $sizeClasses }} rounded-2xl bg-white shadow-2xl border-2 border-zinc-100 overflow-hidden"
        @click.stop
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-95 -translate-y-4"
        x-transition:enter-end="opacity-100 scale-100 translate-y-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 scale-100 translate-y-0"
        x-transition:leave-end="opacity-0 scale-95 -translate-y-4">
        
        {{-- Header --}}
        @if($title || $closeable)
            <div class="flex items-start justify-between gap-4 px-6 py-5 border-b-2 border-zinc-100 bg-gradient-to-b from-zinc-50 to-white">
                <div class="flex-1">
                    @if($title)
                        <h3 class="text-xl font-black text-zinc-900 tracking-tight">{{ $title }}</h3>
                    @endif
                </div>
                
                @if($closeable)
                    <button 
                        type="button"
                        class="flex-shrink-0 rounded-xl p-2 text-zinc-400 hover:bg-red-50 hover:text-red-600 transition-all focus:outline-none focus:ring-4 focus:ring-red-100"
                        @click="open=false"
                        aria-label="Close modal">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                @endif
            </div>
        @endif

        {{-- Body --}}
        <div class="px-6 py-6 text-sm text-zinc-700 leading-relaxed max-h-[calc(100vh-200px)] overflow-y-auto">
            {{ $slot }}
        </div>
    </div>
</div>
