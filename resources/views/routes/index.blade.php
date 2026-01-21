@extends('layouts.app')

@section('title', 'Cari Rute Travel Antar Kota Indonesia')
@section('meta_description', 'Temukan rute travel terbaik dengan GT Trans. Tersedia layanan Reguler, Carter Private, dan Paket Kilat dengan harga transparan dan booking mudah.')

@section('content')
    {{-- BREADCRUMB - SEO Friendly --}}
    <nav class="mb-6 md:mb-8" aria-label="Breadcrumb">
        <ol class="flex items-center gap-2 text-sm">
            <li>
                <a href="{{ route('home') }}" class="text-zinc-500 hover:text-primary-600 font-medium transition-colors">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                    </svg>
                </a>
            </li>
            <li class="text-zinc-300">/</li>
            <li class="text-zinc-900 font-bold">Rute Travel</li>
        </ol>
    </nav>

    {{-- HEADER & SEARCH SECTION --}}
    <section class="mb-12 md:mb-16">
        <div class="grid lg:grid-cols-2 gap-8 md:gap-12 items-center">
            {{-- Left: Title & Description --}}
            <article class="space-y-6">
                <div>
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-gradient-to-r from-primary-50 to-emerald-50 border border-primary-200 text-primary-700 text-sm font-bold mb-4 shadow-sm">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                        </svg>
                        Rute Terlengkap Se-Indonesia
                    </div>
                    
                    <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-black leading-[1.1] text-zinc-900 tracking-tight">
                        Cari Jadwal & <br>
                        <span class="bg-clip-text text-transparent bg-gradient-to-r from-primary-600 to-primary-500">Rute Travel</span>
                    </h1>
                </div>
                
                <p class="text-base sm:text-lg text-zinc-600 leading-relaxed max-w-xl">
                    Ketik kota asal atau tujuan Anda, pilih kategori layanan, dan temukan jadwal keberangkatan terbaik hari ini.
                </p>

                {{-- Stats --}}
                <div class="flex flex-wrap gap-4 sm:gap-6 pt-4">
                    <div class="flex items-center gap-3">
                        <div class="h-10 w-10 sm:h-12 sm:w-12 rounded-xl bg-primary-100 flex items-center justify-center">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="text-xl sm:text-2xl font-black text-zinc-900">{{ $routes->total() }}+</div>
                            <div class="text-xs font-bold text-zinc-500 uppercase tracking-wider">Rute Tersedia</div>
                        </div>
                    </div>
                    
                    <div class="flex items-center gap-3">
                        <div class="h-10 w-10 sm:h-12 sm:w-12 rounded-xl bg-secondary-100 flex items-center justify-center">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="text-xl sm:text-2xl font-black text-zinc-900">Instan</div>
                            <div class="text-xs font-bold text-zinc-500 uppercase tracking-wider">E-Ticket QR</div>
                        </div>
                    </div>
                </div>
            </article>

            {{-- Right: Search & Filter Card --}}
            <aside class="relative">
                {{-- Glow Effect --}}
                <div class="absolute -inset-4 bg-gradient-to-tr from-primary-200/60 via-secondary-200/40 to-blue-200/60 blur-3xl rounded-[3rem] opacity-60 animate-pulse"></div>
                
                <x-ui.card class="relative p-5 sm:p-6 md:p-8 border-none shadow-2xl shadow-zinc-300/50 rounded-[2rem] bg-white/95 backdrop-blur-md">
                    {{-- Form Header --}}
                    <div class="mb-6">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="h-9 w-9 sm:h-10 sm:w-10 rounded-xl bg-primary-100 flex items-center justify-center text-primary-600">
                                <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                </svg>
                            </div>
                            <h2 class="text-lg sm:text-xl font-black text-zinc-900">Filter Pencarian</h2>
                        </div>
                        <p class="text-sm text-zinc-500 font-medium">Temukan rute sesuai kebutuhan perjalanan Anda</p>
                    </div>

                    {{-- Search Form --}}
                    <form method="GET" class="space-y-4">
                        {{-- Search Input --}}
                        <div>
                            <label for="search-city" class="block text-xs font-black uppercase tracking-widest text-zinc-500 mb-2">
                                Cari Kota
                            </label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-4 flex items-center pointer-events-none text-zinc-400 group-focus-within:text-primary-600 transition-colors">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                </div>
                                <input 
                                    type="text" 
                                    id="search-city"
                                    name="q" 
                                    placeholder="Jakarta, Surabaya, Malang..." 
                                    value="{{ request('q') }}"
                                    class="w-full pl-12 pr-4 py-3 sm:py-4 rounded-2xl border-2 border-zinc-200 bg-zinc-50 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all outline-none text-sm font-bold placeholder:text-zinc-400"
                                    autocomplete="off">
                            </div>
                        </div>

                        {{-- Category Select --}}
                        <div>
                            <label for="category" class="block text-xs font-black uppercase tracking-widest text-zinc-500 mb-2">
                                Kategori Layanan
                            </label>
                            <div class="relative">
                                <select 
                                    name="category" 
                                    id="category"
                                    class="w-full px-4 py-3 sm:py-4 pr-10 rounded-2xl border-2 border-zinc-200 bg-zinc-50 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all outline-none text-sm font-bold appearance-none cursor-pointer">
                                    <option value="">Semua Kategori</option>
                                    @foreach($categories as $cat)
                                        <option value="{{ $cat->slug }}" @selected(request('category') == $cat->slug)>
                                            {{ $cat->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-4">
                                    <svg class="h-5 w-5 text-zinc-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        {{-- Submit Button --}}
                        <x-ui.button type="submit" class="w-full py-3 sm:py-4 text-sm sm:text-base font-bold shadow-lg shadow-primary-600/30 bg-primary-600 hover:bg-primary-700 text-white" size="lg">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                            Cari Rute Sekarang
                        </x-ui.button>
                    </form>

                    {{-- Active Filters --}}
                    @if(request('q') || request('category'))
                        <div class="mt-6 pt-6 border-t-2 border-zinc-100">
                            <div class="flex items-center justify-between mb-3">
                                <span class="text-xs font-black uppercase tracking-widest text-zinc-400">Filter Aktif</span>
                                <a href="{{ route('routes.index') }}" class="text-xs font-bold text-red-600 hover:text-red-700 transition-colors">
                                    Reset Semua
                                </a>
                            </div>
                            <div class="flex flex-wrap gap-2">
                                @if(request('q'))
                                    <span class="inline-flex items-center gap-2 px-3 py-2 rounded-xl bg-primary-50 text-primary-700 text-xs font-bold border-2 border-primary-200 shadow-sm">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                        </svg>
                                        "{{ request('q') }}"
                                        <a href="{{ request()->fullUrlWithQuery(['q' => null]) }}" class="hover:text-red-600 transition-colors">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/>
                                            </svg>
                                        </a>
                                    </span>
                                @endif
                                
                                @if(request('category'))
                                    @php($activeCat = $categories->firstWhere('slug', request('category')))
                                    <span class="inline-flex items-center gap-2 px-3 py-2 rounded-xl bg-secondary-50 text-secondary-800 text-xs font-bold border-2 border-secondary-200 shadow-sm">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/>
                                        </svg>
                                        {{ $activeCat?->name }}
                                        <a href="{{ request()->fullUrlWithQuery(['category' => null]) }}" class="hover:text-red-600 transition-colors">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/>
                                            </svg>
                                        </a>
                                    </span>
                                @endif
                            </div>
                        </div>
                    @endif
                </x-ui.card>
            </aside>
        </div>
    </section>

    {{-- QUICK SERVICE INFO CARDS --}}
    <section class="mb-16 md:mb-20">
        <div class="grid md:grid-cols-3 gap-5 sm:gap-6">
            {{-- Service 1 --}}
            <article class="group flex items-start gap-4 p-5 sm:p-6 rounded-2xl bg-white border-2 border-zinc-100 hover:border-primary-200 hover:shadow-xl hover:shadow-primary-600/5 transition-all duration-300 hover:-translate-y-1">
                <div class="h-10 w-10 sm:h-12 sm:w-12 flex-shrink-0 flex items-center justify-center rounded-xl bg-gradient-to-br from-primary-50 to-primary-100 text-primary-600 group-hover:from-primary-600 group-hover:to-primary-700 group-hover:text-white transition-all shadow-lg">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
                <div class="flex-1">
                    <h3 class="text-base font-black text-zinc-900 mb-1.5 group-hover:text-primary-700 transition-colors">Travel Reguler</h3>
                    <p class="text-sm text-zinc-600 leading-relaxed font-medium">Berangkat tiap hari dengan sistem per kursi yang hemat dan efisien.</p>
                </div>
            </article>

            {{-- Service 2 - Highlight --}}
            <article class="group flex items-start gap-4 p-5 sm:p-6 rounded-2xl bg-gradient-to-br from-zinc-900 to-zinc-800 border-2 border-zinc-700 shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-1">
                <div class="h-10 w-10 sm:h-12 sm:w-12 flex-shrink-0 flex items-center justify-center rounded-xl bg-secondary-400/20 text-secondary-400 border-2 border-secondary-400/30 shadow-lg">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"/>
                    </svg>
                </div>
                <div class="flex-1">
                    <h3 class="text-base font-black text-secondary-400 mb-1.5">Carter Mobil</h3>
                    <p class="text-sm text-zinc-400 leading-relaxed font-medium">Sewa 1 unit full untuk grup atau keluarga dengan privasi maksimal.</p>
                </div>
            </article>

            {{-- Service 3 --}}
            <article class="group flex items-start gap-4 p-5 sm:p-6 rounded-2xl bg-white border-2 border-zinc-100 hover:border-primary-200 hover:shadow-xl hover:shadow-primary-600/5 transition-all duration-300 hover:-translate-y-1">
                <div class="h-10 w-10 sm:h-12 sm:w-12 flex-shrink-0 flex items-center justify-center rounded-xl bg-gradient-to-br from-primary-50 to-primary-100 text-primary-600 group-hover:from-primary-600 group-hover:to-primary-700 group-hover:text-white transition-all shadow-lg">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                </div>
                <div class="flex-1">
                    <h3 class="text-base font-black text-zinc-900 mb-1.5 group-hover:text-primary-700 transition-colors">Paket Kilat</h3>
                    <p class="text-sm text-zinc-600 leading-relaxed font-medium">Kirim barang antar kota sampai di hari yang sama dengan aman.</p>
                </div>
            </article>
        </div>
    </section>

    {{-- RESULTS SECTION --}}
    <section>
        {{-- Results Header --}}
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6 md:mb-8 pb-4 md:pb-6 border-b-2 border-zinc-100">
            <div>
                <h2 class="text-xl sm:text-2xl font-black text-zinc-900 mb-1">Daftar Rute Tersedia</h2>
                <p class="text-sm font-bold text-zinc-500">
                    Menampilkan 
                    <span class="text-primary-600">{{ $routes->count() }}</span> 
                    dari 
                    <span class="text-primary-600">{{ $routes->total() }}</span> 
                    rute
                </p>
            </div>
        </div>

        {{-- Route Cards Grid --}}
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-6 md:gap-8">
            @forelse($routes as $r)
                <a href="{{ route('routes.show', $r->slug) }}" class="group block focus:outline-none focus:ring-4 focus:ring-primary-200 rounded-[2.5rem]">
                    <article class="relative h-full flex flex-col p-6 sm:p-7 lg:p-8 rounded-[2.5rem] bg-white border-2 border-zinc-100 hover:border-primary-300 group-hover:shadow-2xl group-hover:shadow-primary-600/10 transition-all duration-300 hover:-translate-y-2 overflow-hidden">
                        {{-- Background Accent --}}
                        <div class="absolute -top-16 -right-16 h-40 w-40 rounded-full bg-gradient-to-br from-primary-50 to-primary-100 group-hover:from-primary-100 group-hover:to-primary-200 transition-all duration-300 opacity-50"></div>

                        {{-- Card Header --}}
                        <div class="relative flex items-center justify-between mb-6 sm:mb-8">
                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-primary-50 text-primary-700 text-[10px] font-black uppercase tracking-widest rounded-lg border-2 border-primary-200 shadow-sm">
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                                </svg>
                                {{ $r->category?->name ?? 'Travel' }}
                            </span>
                            
                            <div class="h-9 w-9 sm:h-10 sm:w-10 rounded-xl bg-zinc-50 flex items-center justify-center text-zinc-400 group-hover:bg-primary-600 group-hover:text-white group-hover:scale-110 transition-all duration-300 shadow-sm">
                                <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                </svg>
                            </div>
                        </div>

                        {{-- Route Details --}}
                        <div class="relative flex-grow space-y-7 sm:space-y-8 mb-6 sm:mb-8">
                            <div class="space-y-2">
                                <div class="text-xs font-bold text-zinc-400 uppercase tracking-wider flex items-center gap-2">
                                    {{ $r->cityA?->name }}
                                </div>
                                
                                <div class="flex items-center gap-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 sm:w-6 sm:h-6 text-primary-500 icon icon-tabler icons-tabler-outline icon-tabler-arrows-diff"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M11 16h10" /><path d="M11 16l4 4" /><path d="M11 16l4 -4" /><path d="M13 8h-10" /><path d="M13 8l-4 4" /><path d="M13 8l-4 -4" /></svg>
                                    <div class="text-xl sm:text-2xl md:text-3xl font-black text-zinc-900 leading-tight group-hover:text-primary-700 transition-colors">
                                        {{ $r->cityB?->name }}
                                    </div>
                                </div>
                            </div>

                            {{-- Price Section --}}
                            <div class="p-3 sm:p-4 rounded-2xl bg-gradient-to-br from-primary-50 to-emerald-50 border border-primary-100">
                                <span class="block text-[10px] font-black text-primary-600 uppercase tracking-widest mb-1">Harga Mulai Dari</span>
                                <div class="flex items-baseline gap-1">
                                    <span class="text-xl sm:text-2xl font-black text-primary-700">
                                        Rp{{ number_format($r->price_regular, 0, ',', '.') }}
                                    </span>
                                    <span class="text-xs font-bold text-primary-600">/orang</span>
                                </div>
                                <p class="text-[10px] font-bold text-primary-600 mt-1 uppercase">Sekali Jalan</p>
                            </div>
                        </div>

                        {{-- Features --}}
                        <div class="relative pt-6 border-t-2 border-zinc-50 flex flex-wrap gap-2">
                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-zinc-50 text-zinc-600 text-[10px] font-black uppercase tracking-tight border border-zinc-100">
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                Drop / PP
                            </span>
                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-zinc-50 text-zinc-600 text-[10px] font-black uppercase tracking-tight border border-zinc-100">
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                E-Ticket QR
                            </span>
                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-zinc-50 text-zinc-600 text-[10px] font-black uppercase tracking-tight border border-zinc-100">
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                Antar Jemput
                            </span>
                        </div>
                    </article>
                </a>
            @empty
                {{-- Empty State --}}
                <div class="col-span-full">
                    <div class="py-16 sm:py-24 px-6 sm:px-10 rounded-[3rem] bg-white border-2 border-dashed border-zinc-200 text-center">
                        <div class="max-w-md mx-auto space-y-6">
                            {{-- Icon --}}
                            <div class="h-16 w-16 sm:h-24 sm:w-24 bg-zinc-50 rounded-full flex items-center justify-center mx-auto border-2 border-zinc-100">
                                <svg class="h-8 w-8 sm:h-12 sm:w-12 text-zinc-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            
                            {{-- Message --}}
                            <div class="space-y-2">
                                <h3 class="text-xl sm:text-2xl font-black text-zinc-900">Rute Tidak Ditemukan</h3>
                                <p class="text-zinc-600 leading-relaxed font-medium">
                                    Maaf, kami belum memiliki jadwal untuk rute tersebut. Coba ubah kata kunci pencarian atau hubungi admin untuk request rute khusus.
                                </p>
                            </div>
                            
                            {{-- Actions --}}
                            <div class="flex flex-col sm:flex-row gap-3 justify-center pt-4">
                                <x-ui.button href="{{ route('routes.index') }}" variant="outline" class="rounded-xl">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                    </svg>
                                    Reset Pencarian
                                </x-ui.button>
                                <x-ui.button href="{{ route('contact') }}" variant="primary">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                    </svg>
                                    Hubungi Admin
                                </x-ui.button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>

        {{-- PAGINATION --}}
        @if($routes->hasPages())
            <div class="mt-12 md:mt-16 flex justify-center">
                <nav class="flex items-center gap-2" role="navigation" aria-label="Pagination">
                    {{-- Previous Page --}}
                    @if ($routes->onFirstPage())
                        <span class="px-3 sm:px-4 py-2 sm:py-3 rounded-xl bg-zinc-100 text-zinc-400 font-bold text-sm cursor-not-allowed">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                            </svg>
                        </span>
                    @else
                        <a href="{{ $routes->previousPageUrl() }}" class="px-3 sm:px-4 py-2 sm:py-3 rounded-xl bg-white border-2 border-zinc-200 hover:border-primary-500 hover:bg-primary-50 text-zinc-700 hover:text-primary-700 font-bold text-sm transition-all shadow-sm hover:shadow-md">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                            </svg>
                        </a>
                    @endif

                    {{-- Page Numbers --}}
                    <div class="flex items-center gap-2">
                        @foreach ($routes->getUrlRange(1, $routes->lastPage()) as $page => $url)
                            @if ($page == $routes->currentPage())
                                <span class="px-4 sm:px-5 py-2 sm:py-3 rounded-xl bg-primary-600 text-white font-black text-sm shadow-lg shadow-primary-600/30">
                                    {{ $page }}
                                </span>
                            @else
                                <a href="{{ $url }}" class="px-4 sm:px-5 py-2 sm:py-3 rounded-xl bg-white border-2 border-zinc-200 hover:border-primary-500 hover:bg-primary-50 text-zinc-700 hover:text-primary-700 font-bold text-sm transition-all shadow-sm hover:shadow-md">
                                    {{ $page }}
                                </a>
                            @endif
                        @endforeach
                    </div>

                    {{-- Next Page --}}
                    @if ($routes->hasMorePages())
                        <a href="{{ $routes->nextPageUrl() }}" class="px-3 sm:px-4 py-2 sm:py-3 rounded-xl bg-white border-2 border-zinc-200 hover:border-primary-500 hover:bg-primary-50 text-zinc-700 hover:text-primary-700 font-bold text-sm transition-all shadow-sm hover:shadow-md">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    @else
                        <span class="px-3 sm:px-4 py-2 sm:py-3 rounded-xl bg-zinc-100 text-zinc-400 font-bold text-sm cursor-not-allowed">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </span>
                    @endif
                </nav>
            </div>
        @endif
    </section>

    {{-- CTA SECTION - Request Custom Route --}}
    <section class="mt-20 md:mt-32">
        <div class="relative bg-gradient-to-br from-secondary-400 via-secondary-500 to-secondary-600 rounded-[3rem] p-7 sm:p-10 md:p-16 overflow-hidden shadow-2xl shadow-secondary-400/30">
            {{-- Background Pattern --}}
            <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/asfalt-light.png')] opacity-10"></div>
            <div class="absolute top-0 right-0 -mt-20 -mr-20 h-80 w-80 rounded-full bg-white/10 blur-[100px]"></div>
            
            {{-- Content --}}
            <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-10">
                <div class="max-w-2xl text-center md:text-left space-y-4">
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-secondary-950/20 border border-secondary-950/30 text-secondary-950 text-xs sm:text-sm font-bold backdrop-blur-sm">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                        </svg>
                        Request Rute Khusus
                    </div>
                    
                    <h3 class="text-2xl sm:text-3xl md:text-4xl font-black text-secondary-950 leading-tight">
                        Rute yang Anda Cari Tidak Ada?
                    </h3>
                    
                    <p class="text-base sm:text-lg text-secondary-900 font-medium leading-relaxed">
                        Jangan khawatir! Anda bisa request rute khusus atau carter privat dengan jadwal fleksibel langsung melalui WhatsApp admin kami.
                    </p>
                    
                    {{-- Trust Badges --}}
                    <div class="flex flex-wrap gap-3 pt-2">
                        <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-secondary-950/10 text-secondary-950 text-xs font-bold">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            Respon Cepat
                        </span>
                        <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-secondary-950/10 text-secondary-950 text-xs font-bold">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            Harga Fleksibel
                        </span>
                        <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-secondary-950/10 text-secondary-950 text-xs font-bold">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            Jadwal Custom
                        </span>
                    </div>
                </div>
                
                <div class="flex-shrink-0">
                    <x-ui.button href="{{ route('contact') }}" size="lg" class="group bg-secondary-950 hover:bg-black text-white border-none px-7 sm:px-10 py-4 sm:py-5 text-base sm:text-lg font-black rounded-2xl shadow-2xl hover:shadow-3xl hover:scale-105 transition-all">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6 mr-2 group-hover:rotate-12 transition-transform" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                        </svg>
                        Request via WhatsApp
                    </x-ui.button>
                </div>
            </div>
        </div>
    </section>
@endsection