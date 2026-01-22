@props([
    'label' => null,
    'name' => null,
    'options' => [],
    'required' => false,
    'helperText' => null,
    'placeholder' => 'Pilih salah satu...',
])

<div class="space-y-2">
    @if($label)
        <label for="{{ $name }}" class="block text-sm font-bold text-zinc-900">
            {{ $label }}
            @if($required)
                <span class="text-red-500">*</span>
            @endif
        </label>
    @endif

    <div class="relative">
        <select
            name="{{ $name }}"
            id="{{ $name }}"
            @if($required)
                required 
            @endif
            {{ $attributes->merge([
                'class' => 'w-full rounded-xl border-2 border-zinc-200 bg-white px-4 py-3 pr-10 text-sm font-medium text-zinc-900 outline-none transition-all focus:border-primary-500 focus:ring-4 focus:ring-primary-100 disabled:bg-zinc-50 disabled:text-zinc-500 disabled:cursor-not-allowed hover:border-zinc-300 appearance-none cursor-pointer'
            ]) }}
        >
            @if($placeholder)
                <option value="" disabled selected class="text-zinc-400">{{ $placeholder }}</option>
            @endif
            
            {{ $slot }}
            
            @foreach($options as $value => $text)
                <option value="{{ $value }}">{{ $text }}</option>
            @endforeach
        </select>
        
        {{-- Custom Dropdown Arrow --}}
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
            <svg class="h-5 w-5 text-zinc-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
            </svg>
        </div>
    </div>

    @if($helperText)
        <p class="text-xs text-zinc-500 font-medium">{{ $helperText }}</p>
    @endif

    @error($name)
        <div class="flex items-center gap-2 text-xs text-red-600 font-semibold bg-red-50 px-3 py-2 rounded-lg border border-red-200">
            <svg class="w-4 h-4 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
            </svg>
            {{ $message }}
        </div>
    @enderror
</div>
