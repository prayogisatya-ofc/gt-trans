@extends('layouts.app')

@section('title', 'Travel Reguler, Carter & Paket Kilat Antar Kota Indonesia')
@section('meta_description', 'GT Trans melayani travel antar kota di Indonesia: Reguler (Umum), Carter (Private), dan Paket Kilat. Booking mudah via WhatsApp dengan e-ticket QR.')

@section('content')
    {{-- POPUP ANNOUNCEMENT --}}
    @if(!empty($popupAnnouncement))
        <div
            x-data="gtAnnouncement('{{ $popupAnnouncement->id }}')"
            x-init="init()"
            x-show="open"
            x-transition.opacity
            class="fixed inset-0 z-[999] flex items-center justify-center p-4"
            style="display:none;"
        >
            {{-- Overlay dengan blur effect --}}
            <div
                class="absolute inset-0 bg-gradient-to-br from-zinc-900/80 via-zinc-900/70 to-zinc-900/80 backdrop-blur-md"
                @click="close(false)"
            ></div>

            {{-- Modal Container --}}
            <div
                class="relative w-full max-w-xl max-h-[calc(100vh-2rem)]"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95"
            >
                {{-- Modal Card --}}
                <div class="relative rounded-[2rem] bg-white shadow-2xl overflow-hidden border-2 border-zinc-100 max-h-[calc(100vh-2rem)] flex flex-col">
                    {{-- Top Gradient Accent --}}
                    <div class="h-3 bg-gradient-to-r from-primary-600 via-emerald-500 to-secondary-400"></div>

                    {{-- Background Decoration --}}
                    <div class="absolute top-0 right-0 -mt-20 -mr-20 h-72 w-72 rounded-full bg-gradient-to-br from-primary-100/40 to-emerald-100/40 blur-3xl pointer-events-none"></div>
                    <div class="absolute bottom-0 left-0 -mb-20 -ml-20 h-64 w-64 rounded-full bg-gradient-to-tr from-secondary-100/30 to-orange-100/30 blur-3xl pointer-events-none"></div>

                    {{-- Content (Scrollable) --}}
                    <div class="relative p-6 sm:p-8 overflow-y-auto overscroll-contain">
                        {{-- Header Section --}}
                        <div class="flex items-start justify-between gap-4 mb-6">
                            <div class="flex items-start gap-4 flex-1">
                                {{-- Icon --}}
                                <div class="flex-shrink-0 h-14 w-14 rounded-2xl bg-gradient-to-br from-primary-600 to-emerald-600 flex items-center justify-center text-white shadow-lg shadow-primary-600/30 relative">
                                    <div class="absolute -top-1 -right-1 h-5 w-5 rounded-full bg-secondary-400 border-2 border-white animate-pulse"></div>
                                    <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6 6 0 10-12 0v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                    </svg>
                                </div>

                                {{-- Title --}}
                                <div class="flex-1 min-w-0">
                                    <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-gradient-to-r from-primary-50 to-emerald-50 border border-primary-200 text-primary-700 text-xs font-bold uppercase tracking-wider mb-3">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                        </svg>
                                        Pengumuman Penting
                                    </div>
                                    <h3 class="text-xl md:text-3xl font-black text-zinc-900 leading-tight">
                                        {{ $popupAnnouncement->title }}
                                    </h3>
                                </div>
                            </div>

                            {{-- Close Button --}}
                            <button
                                type="button"
                                class="flex-shrink-0 h-11 w-11 rounded-xl bg-zinc-100 hover:bg-red-50 border-2 border-zinc-200 hover:border-red-300 flex items-center justify-center text-zinc-500 hover:text-red-600 transition-all hover:scale-110 group"
                                @click="close(false)"
                                aria-label="Tutup"
                            >
                                <svg class="w-6 h-6 group-hover:rotate-90 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>
                        </div>

                        {{-- Content Section --}}
                        <div class="mb-8">
                            <div class="p-6 rounded-2xl bg-gradient-to-br from-zinc-50 to-zinc-100 border-2 border-zinc-200">
                                <div class="prose prose-sm max-w-none text-zinc-700 leading-relaxed text-sm md:text-base">
                                    {!! $popupAnnouncement->content !!}
                                </div>
                            </div>
                        </div>

                        {{-- Action Buttons --}}
                        <div class="flex flex-col sm:flex-row gap-3">
                            {{-- Primary Button --}}
                            <button
                                type="button"
                                @click="close(false)"
                                class="group flex-1 inline-flex items-center justify-center gap-2 rounded-2xl bg-gradient-to-r from-primary-600 to-emerald-600 text-white px-6 py-4 font-black text-sm shadow-lg shadow-primary-600/30 hover:from-primary-700 hover:to-emerald-700 hover:shadow-xl hover:scale-105 transition-all"
                            >
                                <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                <span>Mengerti</span>
                            </button>

                            {{-- Secondary Button --}}
                            <button
                                type="button"
                                @click="close(true)"
                                class="group flex-1 inline-flex items-center justify-center gap-2 rounded-2xl bg-zinc-100 hover:bg-zinc-200 border-2 border-zinc-200 hover:border-zinc-300 text-zinc-800 px-6 py-4 font-bold text-sm transition-all hover:scale-105"
                            >
                                <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
                                </svg>
                                <span class="hidden sm:inline">Jangan Tampilkan Lagi</span>
                                <span class="sm:hidden">Sembunyikan</span>
                            </button>
                        </div>

                        {{-- Info Footer --}}
                        <div class="mt-6 pt-5 border-t-2 border-zinc-200">
                            <div class="flex items-center justify-center gap-2 text-xs text-zinc-500">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                </svg>
                                <span class="font-bold">Anda bisa menutup popup ini kapan saja</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function gtAnnouncement(id) {
                return {
                    open: false,
                    key: 'gt_announcement_closed_' + id,

                    init() {
                        // Cek apakah pengumuman sudah pernah ditutup permanent
                        if (!localStorage.getItem(this.key)) {
                            // Delay sedikit untuk smooth appearance
                            setTimeout(() => {
                                this.open = true;
                                document.documentElement.classList.add('overflow-hidden');
                            }, 500);
                        }
                    },

                    close(permanent = false) {
                        // Jika permanent, simpan ke localStorage
                        if (permanent) {
                            localStorage.setItem(this.key, '1');
                        }

                        this.open = false;
                        document.documentElement.classList.remove('overflow-hidden');
                    },

                    // Handle ESC key
                    handleEscape(event) {
                        if (event.key === 'Escape' && this.open) {
                            this.close(false);
                        }
                    }
                }
            }

            // Global ESC key handler
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape') {
                    const announcement = document.querySelector('[x-data*="gtAnnouncement"]');
                    if (announcement && announcement.__x) {
                        announcement.__x.$data.close(false);
                    }
                }
            });
        </script>
    @endif

    {{-- HERO SECTION - Enhanced --}}
    <section class="relative pt-8 pb-16 md:pt-12 md:pb-20">
        <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">
            {{-- Left Content --}}
            <article class="order-2 lg:order-1 space-y-8">
                {{-- Badge --}}
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-gradient-to-r from-emerald-50 to-green-50 border border-emerald-200 text-emerald-700 text-sm font-bold shadow-sm">
                    <svg class="w-5 h-5 animate-pulse" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    Partner Perjalanan Terpercaya Anda
                </div>

                {{-- Main Heading --}}
                <div>
                    <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-black leading-[1.1] text-zinc-900 tracking-tight">
                        Perjalanan Antar Kota 
                        <span class="block mt-2 bg-clip-text text-transparent bg-gradient-to-r from-primary-600 via-primary-500 to-secondary-400">
                            Makin Praktis & Nyaman
                        </span>
                    </h1>
                </div>

                {{-- Description --}}
                <p class="text-base sm:text-lg md:text-xl text-zinc-600 leading-relaxed max-w-xl">
                    Cari rute terbaik, pilih layanan sesuai kebutuhan, dan dapatkan <strong class="text-zinc-900">e-ticket QR instan</strong>. Booking langsung tersambung ke WhatsApp admin.
                </p>

                {{-- CTA Buttons --}}
                <div class="flex flex-col sm:flex-row flex-wrap gap-4">
                    <x-ui.button size="lg" href="{{ route('routes.index') }}" class="group bg-primary-600 hover:bg-primary-700 text-white px-6 py-3 text-sm sm:px-8 sm:py-4 sm:text-base font-bold shadow-xl shadow-primary-600/30 hover:shadow-2xl hover:shadow-primary-600/40 transition-all hover:-translate-y-0.5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 group-hover:scale-110 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg>
                        Mulai Booking Sekarang
                    </x-ui.button>
                    <x-ui.button size="lg" variant="outline" href="#layanan" class="group px-6 py-3 text-sm sm:px-8 sm:py-4 sm:text-base font-bold bg-white border-2 border-zinc-300 hover:border-primary-600 hover:bg-primary-50 text-zinc-700 hover:text-primary-700 transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" /></svg>
                        Lihat Layanan
                    </x-ui.button>
                </div>

                {{-- Stats --}}
                <div class="grid grid-cols-3 gap-6 pt-8 border-t-2 border-zinc-100">
                    <div class="text-center sm:text-left">
                        <div class="text-2xl sm:text-3xl md:text-4xl font-black text-primary-600 mb-1">24/7</div>
                        <div class="text-xs md:text-sm font-bold text-zinc-500 uppercase tracking-wider">Layanan Admin</div>
                    </div>
                    <div class="text-center sm:text-left">
                        <div class="text-2xl sm:text-3xl md:text-4xl font-black text-primary-600 mb-1">100+</div>
                        <div class="text-xs md:text-sm font-bold text-zinc-500 uppercase tracking-wider">Pilihan Rute</div>
                    </div>
                    <div class="text-center sm:text-left">
                        <div class="flex items-baseline justify-center sm:justify-start gap-1 mb-1">
                            <span class="text-2xl sm:text-3xl md:text-4xl font-black text-secondary-400">Gratis</span>
                        </div>
                        <div class="text-xs md:text-sm font-bold text-zinc-500 uppercase tracking-wider">E-Ticket QR</div>
                    </div>
                </div>
            </article>

            {{-- Right Side - Search Card --}}
            <aside class="order-1 lg:order-2 relative">
                {{-- Glow Effect --}}
                <div class="absolute -inset-4 bg-gradient-to-tr from-primary-200/60 via-secondary-200/40 to-indigo-200/60 blur-3xl rounded-[3rem] opacity-60 animate-pulse"></div>
                
                {{-- Main Card --}}
                <x-ui.card class="relative p-6 md:p-8 border-none shadow-2xl shadow-zinc-300/50 rounded-[2rem] bg-white/95 backdrop-blur-md">
                    {{-- Header --}}
                    <div class="mb-6">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="flex items-center justify-center h-9 w-9 sm:h-10 sm:w-10 rounded-xl bg-primary-100 text-primary-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div>
                            <h2 class="text-xl sm:text-2xl font-black text-zinc-900 tracking-tight">Cari Jadwal & Rute</h2>
                        </div>
                        <p class="text-sm text-zinc-500 font-medium">Masukkan kota asal atau kota tujuan Anda.</p>
                    </div>

                    {{-- Search Form --}}
                    <form action="{{ route('routes.index') }}" method="GET" class="space-y-4">
                        <div class="relative group">
                            <label for="search-route" class="sr-only">Cari rute</label>
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-zinc-400 group-focus-within:text-primary-600 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <input 
                                type="text" 
                                id="search-route"
                                name="q" 
                                placeholder="Contoh: Jakarta, Surabaya, Malang..." 
                                class="w-full pl-12 pr-4 py-3 sm:py-4 rounded-2xl border-2 border-zinc-200 bg-zinc-50 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all outline-none font-medium placeholder:text-zinc-400"
                                autocomplete="off">
                        </div>
                        
                        <x-ui.button type="submit" class="w-full py-3 text-sm sm:py-4 sm:text-base font-bold shadow-lg shadow-primary-600/30 bg-primary-600 hover:bg-primary-700 text-white hover:shadow-xl transition-all" size="lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                            Cari Sekarang
                        </x-ui.button>
                    </form>

                    {{-- Popular Categories --}}
                    <div class="mt-8 pt-6 border-t border-zinc-100">
                        <div class="flex items-center gap-2 mb-4">
                            <svg class="w-4 h-4 text-secondary-500" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            <span class="text-xs font-black text-zinc-500 uppercase tracking-widest">Kategori Populer</span>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            @foreach($categories as $cat)
                                <a href="{{ route('routes.index', ['category' => $cat->slug]) }}"
                                   class="group px-4 py-2 text-sm font-bold rounded-xl bg-white border-2 border-zinc-200 text-zinc-700 hover:border-primary-500 hover:bg-primary-50 hover:text-primary-700 transition-all shadow-sm hover:shadow-md">
                                    {{ $cat->name }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </x-ui.card>
            </aside>
        </div>
    </section>

    {{-- SERVICES SECTION - Enhanced --}}
    <section id="layanan" class="py-14 sm:py-20 md:py-32">
        {{-- Section Header --}}
        <header class="text-center max-w-3xl mx-auto mb-16 space-y-4">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-primary-50 border border-primary-200 text-primary-700 text-sm font-bold mb-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                </svg>
                Layanan Kami
            </div>
            <h2 class="text-2xl sm:text-3xl md:text-5xl font-black tracking-tight text-zinc-900">
                Layanan Unggulan Kami
            </h2>
            <p class="text-lg text-zinc-600">Pilih jenis layanan yang paling sesuai dengan kebutuhan mobilitas Anda hari ini.</p>
        </header>

        {{-- Service Cards --}}
        <div class="grid lg:grid-cols-3 gap-8">
            {{-- Service Card 1: Travel Reguler --}}
            <article class="group relative p-6 sm:p-8 rounded-[2rem] bg-white border-2 border-zinc-100 hover:border-primary-300 hover:shadow-2xl hover:shadow-primary-600/10 transition-all duration-300 hover:-translate-y-2">
                <div class="mb-6 h-14 w-14 sm:h-16 sm:w-16 rounded-2xl bg-gradient-to-br from-primary-50 to-primary-100 flex items-center justify-center text-primary-600 group-hover:from-primary-600 group-hover:to-primary-700 group-hover:text-white transition-all duration-300 shadow-lg group-hover:shadow-xl group-hover:shadow-primary-600/30">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
                
                <h3 class="text-xl sm:text-2xl font-black mb-3 text-zinc-900 group-hover:text-primary-700 transition-colors">Travel Reguler</h3>
                <p class="text-zinc-600 text-sm leading-relaxed mb-6 font-medium">
                    Hemat biaya dengan sistem per kursi. Cocok untuk perjalanan dinas atau pulang kampung sendirian.
                </p>
                
                <ul class="space-y-3 text-sm font-semibold text-zinc-700 mb-8">
                    <li class="flex items-center gap-3">
                        <div class="flex-shrink-0 w-6 h-6 rounded-full bg-emerald-100 flex items-center justify-center">
                            <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        Harga Tiket Per Kursi
                    </li>
                    <li class="flex items-center gap-3">
                        <div class="flex-shrink-0 w-6 h-6 rounded-full bg-emerald-100 flex items-center justify-center">
                            <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        Antar Jemput Alamat
                    </li>
                    <li class="flex items-center gap-3">
                        <div class="flex-shrink-0 w-6 h-6 rounded-full bg-emerald-100 flex items-center justify-center">
                            <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        E-Ticket QR Code
                    </li>
                </ul>
                
                <x-ui.button variant="outline" class="w-full rounded-xl font-bold border-2 group-hover:bg-primary-600 group-hover:text-white group-hover:border-primary-600 transition-all py-3">
                    Pilih Reguler
                </x-ui.button>
            </article>

            {{-- Service Card 2: Carter (Highlight) --}}
            <article class="group relative p-6 sm:p-8 rounded-[2rem] bg-gradient-to-br from-zinc-900 via-zinc-800 to-zinc-900 text-white shadow-2xl shadow-zinc-900/40 lg:-mt-4 lg:mb-4 hover:shadow-3xl transition-all duration-300 hover:-translate-y-2 border-2 border-zinc-700">
                {{-- Popular Badge --}}
                <div class="absolute -top-4 left-1/2 -translate-x-1/2">
                    <span class="px-5 py-2 bg-gradient-to-r from-secondary-400 to-secondary-500 text-secondary-950 text-xs font-black uppercase tracking-widest rounded-full shadow-lg">
                        ⚡ Paling Privat
                    </span>
                </div>
                
                <div class="mb-6 h-14 w-14 sm:h-16 sm:w-16 rounded-2xl bg-gradient-to-br from-secondary-400/20 to-secondary-500/20 flex items-center justify-center text-secondary-400 border-2 border-secondary-400/30 shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                    </svg>
                </div>
                
                <h3 class="text-xl sm:text-2xl font-black mb-3">Carter Mobil (Private)</h3>
                <p class="text-zinc-300 text-sm leading-relaxed mb-6 font-medium">
                    Sewa satu mobil penuh untuk keluarga atau grup. Waktu keberangkatan lebih fleksibel sesuka Anda.
                </p>
                
                <ul class="space-y-3 text-sm font-semibold text-zinc-200 mb-8">
                    <li class="flex items-center gap-3">
                        <div class="flex-shrink-0 w-6 h-6 rounded-full bg-secondary-400/20 flex items-center justify-center">
                            <svg class="w-4 h-4 text-secondary-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        Satu Mobil Full Unit
                    </li>
                    <li class="flex items-center gap-3">
                        <div class="flex-shrink-0 w-6 h-6 rounded-full bg-secondary-400/20 flex items-center justify-center">
                            <svg class="w-4 h-4 text-secondary-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        Bebas Atur Jam Jemput
                    </li>
                    <li class="flex items-center gap-3">
                        <div class="flex-shrink-0 w-6 h-6 rounded-full bg-secondary-400/20 flex items-center justify-center">
                            <svg class="w-4 h-4 text-secondary-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        Driver Berpengalaman
                    </li>
                </ul>
                
                <x-ui.button class="w-full rounded-xl bg-gradient-to-r from-secondary-400 to-secondary-500 hover:from-secondary-500 hover:to-secondary-600 text-secondary-950 border-none font-black shadow-lg shadow-secondary-500/30 hover:shadow-xl transition-all py-3">
                    Booking Carter
                </x-ui.button>
            </article>

            {{-- Service Card 3: Paket Kilat --}}
            <article class="group relative p-6 sm:p-8 rounded-[2rem] bg-white border-2 border-zinc-100 hover:border-primary-300 hover:shadow-2xl hover:shadow-primary-600/10 transition-all duration-300 hover:-translate-y-2">
                <div class="mb-6 h-14 w-14 sm:h-16 sm:w-16 rounded-2xl bg-gradient-to-br from-primary-50 to-primary-100 flex items-center justify-center text-primary-600 group-hover:from-primary-600 group-hover:to-primary-700 group-hover:text-white transition-all duration-300 shadow-lg group-hover:shadow-xl group-hover:shadow-primary-600/30">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                </div>
                
                <h3 class="text-xl sm:text-2xl font-black mb-3 text-zinc-900 group-hover:text-primary-700 transition-colors">Paket Kilat</h3>
                <p class="text-zinc-600 text-sm leading-relaxed mb-6 font-medium">
                    Kirim dokumen atau barang berharga antar kota sampai di hari yang sama. Keamanan prioritas kami.
                </p>
                
                <ul class="space-y-3 text-sm font-semibold text-zinc-700 mb-8">
                    <li class="flex items-center gap-3">
                        <div class="flex-shrink-0 w-6 h-6 rounded-full bg-emerald-100 flex items-center justify-center">
                            <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        Pengiriman Sameday
                    </li>
                    <li class="flex items-center gap-3">
                        <div class="flex-shrink-0 w-6 h-6 rounded-full bg-emerald-100 flex items-center justify-center">
                            <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        Monitoring via Admin
                    </li>
                    <li class="flex items-center gap-3">
                        <div class="flex-shrink-0 w-6 h-6 rounded-full bg-emerald-100 flex items-center justify-center">
                            <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        Asuransi Tersedia
                    </li>
                </ul>
                
                <x-ui.button variant="outline" class="w-full rounded-xl font-bold border-2 group-hover:bg-primary-600 group-hover:text-white group-hover:border-primary-600 transition-all py-3">
                    Kirim Barang
                </x-ui.button>
            </article>
        </div>
    </section>

    {{-- POPULAR ROUTES - Enhanced --}}
    <section class="py-14 sm:py-20 md:py-32">
        {{-- Section Header --}}
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12">
            <div class="space-y-2">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-secondary-50 border border-secondary-200 text-secondary-700 text-sm font-bold mb-2">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    Rute Favorit
                </div>
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-black tracking-tight text-zinc-900">Rute Terpopuler</h2>
                <p class="text-zinc-600 text-base sm:text-lg">Pilihan rute yang paling sering dipesan oleh pelanggan kami.</p>
            </div>
            <x-ui.button variant="outline" href="{{ route('routes.index') }}" class="group rounded-xl border-2 border-zinc-300 hover:border-primary-600 hover:bg-primary-50 text-zinc-700 hover:text-primary-700 font-bold px-6">
                Lihat Semua Rute
                <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                </svg>
            </x-ui.button>
        </div>

        {{-- Route Cards --}}
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($popularRoutes as $r)
                <a href="{{ route('routes.show', $r->slug) }}" class="group">
                    <x-ui.card class="h-full p-6 border-2 border-zinc-100 hover:border-primary-300 group-hover:shadow-2xl group-hover:shadow-primary-600/10 transition-all duration-300 overflow-hidden relative rounded-2xl bg-white hover:-translate-y-2">
                        {{-- Category Badge --}}
                        <div class="flex items-center justify-between mb-6">
                            <span class="inline-flex items-center gap-1 text-[10px] font-black uppercase tracking-widest text-primary-600 bg-primary-50 px-3 py-1.5 rounded-lg border border-primary-200">
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                                </svg>
                                {{ $r->category?->name }}
                            </span>
                            <div class="text-zinc-300 group-hover:text-primary-500 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                        
                        {{-- Route Names --}}
                        <div class="space-y-2 mb-8">
                            <div class="text-base font-black text-zinc-900 tracking-wider">{{ $r->cityA?->name }}</div>
                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 text-primary-500 icon icon-tabler icons-tabler-outline icon-tabler-arrows-diff"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M11 16h10" /><path d="M11 16l4 4" /><path d="M11 16l4 -4" /><path d="M13 8h-10" /><path d="M13 8l-4 4" /><path d="M13 8l-4 -4" /></svg>
                                <div class="text-xl font-black text-zinc-900 group-hover:text-primary-700 transition-colors">{{ $r->cityB?->name }}</div>
                            </div>
                        </div>
                        
                        {{-- Price & CTA --}}
                        <div class="flex items-center justify-between pt-6 border-t-2 border-zinc-100">
                            <div>
                                <span class="text-[10px] uppercase font-black tracking-wider text-zinc-400 block mb-1">Mulai Dari</span>
                                <span class="text-primary-700 font-black text-lg">Rp {{ number_format($r->price_regular,0,',','.') }}</span>
                            </div>
                            <div class="h-11 w-11 rounded-xl bg-zinc-50 flex items-center justify-center text-zinc-400 group-hover:bg-primary-600 group-hover:text-white transition-all shadow-sm group-hover:shadow-lg">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/>
                                </svg>
                            </div>
                        </div>
                    </x-ui.card>
                </a>
            @endforeach
        </div>
    </section>

    {{-- HOW IT WORKS - Enhanced --}}
    <section class="py-14 sm:py-20 md:py-32">
        <div class="relative bg-gradient-to-br from-zinc-900 via-zinc-800 to-zinc-900 rounded-[3rem] p-7 sm:p-10 md:p-20 overflow-hidden shadow-2xl border-2 border-zinc-700">
            {{-- Background Effects --}}
            <div class="absolute top-0 right-0 -mt-20 -mr-20 h-80 w-80 rounded-full bg-primary-600/20 blur-[120px] animate-pulse"></div>
            <div class="absolute bottom-0 left-0 -mb-20 -ml-20 h-80 w-80 rounded-full bg-secondary-600/20 blur-[120px] animate-pulse" style="animation-delay: 1s;"></div>
            
            {{-- Content --}}
            <div class="relative z-10">
                {{-- Header --}}
                <div class="text-center mb-16 space-y-4">
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/10 border border-white/20 text-white text-sm font-bold mb-2">
                        <svg class="w-5 h-5 text-secondary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                        Cara Kerja
                    </div>
                    <h2 class="text-2xl sm:text-3xl md:text-5xl font-black text-white mb-4">Hanya 4 Langkah Mudah</h2>
                    <p class="text-zinc-300 text-lg max-w-2xl mx-auto">Proses booking yang simpel dan cepat untuk kemudahan Anda</p>
                </div>

                {{-- Steps --}}
                <div class="grid md:grid-cols-4 gap-8 md:gap-12 relative">
                    {{-- Decorative Connecting Line --}}
                    <div class="hidden md:block absolute top-12 left-[12%] right-[12%] h-1 bg-gradient-to-r from-transparent via-zinc-700 to-transparent"></div>

                    @php
                        $steps = [
                            [
                                'title' => 'Cari Rute', 
                                'desc' => 'Tentukan kota asal dan tujuan Anda.',
                                'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>'
                            ],
                            [
                                'title' => 'Pilih Layanan', 
                                'desc' => 'Reguler, Carter, atau Paket Kilat.',
                                'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>'
                            ],
                            [
                                'title' => 'Isi Data', 
                                'desc' => 'Nama, alamat jemput & tujuan.',
                                'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>'
                            ],
                            [
                                'title' => 'WhatsApp', 
                                'desc' => 'Konfirmasi & terima E-Ticket QR.',
                                'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>'
                            ],
                        ];
                    @endphp

                    @foreach($steps as $i => $step)
                    <div class="relative flex flex-col items-center text-center group">
                        {{-- Step Number Circle --}}
                        <div class="relative h-20 w-20 sm:h-24 sm:w-24 rounded-2xl bg-gradient-to-br from-zinc-800 to-zinc-900 border-2 border-zinc-700 flex items-center justify-center mb-6 group-hover:from-secondary-500 group-hover:to-secondary-600 group-hover:border-secondary-400 group-hover:scale-110 transition-all duration-300 shadow-xl group-hover:shadow-2xl group-hover:shadow-secondary-500/30 z-10">
                            <svg class="w-8 h-8 sm:w-10 sm:h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                {!! $step['icon'] !!}
                            </svg>
                            <div class="absolute -top-3 -right-3 h-8 w-8 rounded-full bg-secondary-400 text-secondary-950 font-black text-sm flex items-center justify-center border-2 border-zinc-900 shadow-lg">
                                {{ $i + 1 }}
                            </div>
                        </div>
                        
                        {{-- Step Content --}}
                        <h3 class="text-lg sm:text-xl font-black text-white mb-2 group-hover:text-secondary-400 transition-colors">
                            {{ $step['title'] }}
                        </h3>
                        <p class="text-sm text-zinc-400 leading-relaxed font-medium">
                            {{ $step['desc'] }}
                        </p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- FAQ SECTION - Enhanced --}}
    <section id="faq" class="py-14 sm:py-20 md:py-32 max-w-4xl mx-auto">
        {{-- Section Header --}}
        <header class="text-center mb-16 space-y-4">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-primary-50 border border-primary-200 text-primary-700 text-sm font-bold mb-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                FAQ
            </div>
            <h2 class="text-2xl sm:text-3xl md:text-5xl font-black tracking-tight text-zinc-900">Pertanyaan Umum</h2>
            <p class="text-zinc-600 text-base sm:text-lg">Informasi yang mungkin Anda butuhkan sebelum memesan.</p>
        </header>

        {{-- FAQ Accordion --}}
        <div class="space-y-4" x-data="{ open: 1 }">
            @php
                $faqs = [
                    ['q' => 'Apakah bisa pilih arah berangkat dari kota tujuan?', 'a' => 'Bisa. Di halaman detail rute, kamu bisa pilih berangkat dari kota A atau kota B sesuai kebutuhan.'],
                    ['q' => 'Apakah travel reguler bisa PP (Pulang Pergi)?', 'a' => 'Bisa. Kamu bisa pilih Drop atau PP. Jika PP, subtotal akan dihitung 2x dari harga sekali jalan.'],
                    ['q' => 'Bagaimana cara pembayaran?', 'a' => 'Bisa cash ke driver, transfer bank, atau QRIS (sesuai yang admin aktifkan di website). Konfirmasi metode pembayaran melalui admin WhatsApp.'],
                    ['q' => 'Jika saya bawa barang banyak apakah bisa?', 'a' => 'Bisa, namun mungkin ada penyesuaian biaya bagasi. Konfirmasi detail barang melalui WhatsApp admin setelah booking untuk mendapatkan informasi lebih lanjut.'],
                    ['q' => 'Bagaimana jika ingin batal / ubah jadwal?', 'a' => 'Silakan hubungi admin melalui WhatsApp sesegera mungkin. Ketentuan pembatalan / perubahan jadwal akan ditampilkan di detail rute dan disesuaikan dengan kebijakan GT Trans.'],
                ];
            @endphp
            
            @foreach($faqs as $i => $f)
                <div class="group border-2 border-zinc-100 rounded-2xl bg-white hover:border-primary-200 hover:shadow-xl transition-all overflow-hidden">
                    <button 
                        type="button" 
                        class="w-full flex items-start justify-between gap-4 p-4 sm:p-6 text-left"
                        @click="open = (open === {{ $i+1 }} ? 0 : {{ $i+1 }})">
                        <span class="font-bold text-zinc-900 group-hover:text-primary-700 transition-colors pr-4 flex-1">
                            {{ $f['q'] }}
                        </span>
                        <div class="flex-shrink-0 h-9 w-9 sm:h-10 sm:w-10 rounded-xl bg-zinc-50 flex items-center justify-center text-zinc-400 group-hover:bg-primary-100 group-hover:text-primary-600 transition-all">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6 transition-transform duration-300" :class="open === {{ $i+1 }} ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </div>
                    </button>
                    <div 
                        class="overflow-hidden transition-all duration-300"
                        x-show="open === {{ $i+1 }}" 
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 -translate-y-2"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100 translate-y-0"
                        x-transition:leave-end="opacity-0 -translate-y-2"
                        style="display:none;">
                        <div class="px-4 pb-4 sm:px-6 sm:pb-6">
                            <p class="text-zinc-600 leading-relaxed font-medium bg-zinc-50 p-3 sm:p-4 rounded-xl border border-zinc-100">
                                {{ $f['a'] }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- CTA SECTION - Enhanced --}}
    <section class="py-14 sm:py-20 md:py-32">
        <div class="relative bg-gradient-to-br from-primary-600 via-primary-700 to-secondary-500 rounded-[3rem] p-7 sm:p-10 md:p-20 overflow-hidden shadow-2xl shadow-primary-600/40 text-center">
            {{-- Background Pattern --}}
            <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/diagonal-stripes.png')] opacity-10"></div>
            <div class="absolute top-0 left-0 -mt-32 -ml-32 h-96 w-96 rounded-full bg-white/10 blur-[100px]"></div>
            <div class="absolute bottom-0 right-0 -mb-32 -mr-32 h-96 w-96 rounded-full bg-secondary-300/20 blur-[100px]"></div>
            
            {{-- Content --}}
            <div class="relative z-10 max-w-4xl mx-auto space-y-8">
                {{-- Badge --}}
                <div class="inline-flex items-center gap-2 px-5 py-2 rounded-full bg-white/20 border border-white/30 text-white text-sm font-bold backdrop-blur-sm">
                    <svg class="w-5 h-5 animate-pulse" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"/>
                    </svg>
                    Ayo Mulai Perjalanan Anda
                </div>

                {{-- Heading --}}
                <h2 class="text-3xl sm:text-4xl md:text-6xl font-black tracking-tight text-white leading-tight">
                    Siap Meluncur Sekarang?
                </h2>
                
                {{-- Description --}}
                <p class="text-base sm:text-xl md:text-2xl text-primary-100 leading-relaxed max-w-3xl mx-auto font-medium">
                    Jangan biarkan rencana perjalanan Anda terhambat. Booking kursi Anda dalam hitungan detik dan nikmati perjalanan yang aman dan nyaman.
                </p>
                
                {{-- CTA Buttons --}}
                <div class="flex flex-col sm:flex-row gap-4 justify-center pt-4">
                    <x-ui.button size="lg" href="{{ route('routes.index') }}" class="group bg-white text-primary-700 hover:bg-primary-50 hover:text-white border-none px-6 py-3 text-base sm:px-10 sm:py-5 sm:text-lg font-black shadow-2xl hover:shadow-3xl hover:scale-105 transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6 mr-2 group-hover:rotate-12 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        Cek Jadwal & Rute
                    </x-ui.button>
                    <x-ui.button size="lg" variant="outline" href="{{ route('contact') }}" class="group border-2 border-white/40 text-white hover:bg-white/10 hover:border-white px-6 py-3 text-base sm:px-10 sm:py-5 sm:text-lg font-bold backdrop-blur-sm transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                        </svg>
                        Tanya Admin
                    </x-ui.button>
                </div>

                {{-- Trust Indicators --}}
                <div class="flex flex-wrap justify-center gap-5 sm:gap-8 pt-8 text-white/90">
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span class="font-bold">Terpercaya</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5 2a1 1 0 011 1v1h1a1 1 0 010 2H6v1a1 1 0 01-2 0V6H3a1 1 0 010-2h1V3a1 1 0 011-1zm0 10a1 1 0 011 1v1h1a1 1 0 110 2H6v1a1 1 0 11-2 0v-1H3a1 1 0 110-2h1v-1a1 1 0 011-1zM12 2a1 1 0 01.967.744L14.146 7.2 17.5 9.134a1 1 0 010 1.732l-3.354 1.935-1.18 4.455a1 1 0 01-1.933 0L9.854 12.8 6.5 10.866a1 1 0 010-1.732l3.354-1.935 1.18-4.455A1 1 0 0112 2z" clip-rule="evenodd"/>
                        </svg>
                        <span class="font-bold">Proses Cepat</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z"/>
                        </svg>
                        <span class="font-bold">Harga Terbaik</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection