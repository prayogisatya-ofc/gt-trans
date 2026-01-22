<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>@yield('title') | {{ config('app.name') }}</title>
        <meta name="description" content="@yield('meta_description', 'GT Trans melayani travel reguler, carter, dan paket kilat antar kota di Indonesia.')">
        <meta name="keywords" content="travel antar kota, carter mobil, paket kilat, booking travel online">
        <meta name="robots" content="index,follow">
        <meta name="author" content="GT Trans">
        
        {{-- Open Graph / Facebook --}}
        <meta property="og:type" content="website">
        <meta property="og:title" content="@yield('title') | {{ config('app.name') }}">
        <meta property="og:description" content="@yield('meta_description', 'GT Trans melayani travel reguler, carter, dan paket kilat antar kota di Indonesia.')">
        <meta property="og:image" content="@yield('meta_image', asset('assets/img/og-image.jpg'))">
        
        {{-- Canonical URL --}}
        <link rel="canonical" href="{{ url()->current() }}">
        
        <link rel="shortcut icon" href="{{ asset('assets/img/favicon.ico') }}" type="image/x-icon">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">

        <style>
            .glass { 
                backdrop-filter: blur(16px) saturate(180%);
                background: rgba(255, 255, 255, 0.85);
                -webkit-backdrop-filter: blur(16px) saturate(180%);
            }
            
            @media (prefers-reduced-motion: reduce) {
                *, *::before, *::after {
                    animation-duration: 0.01ms !important;
                    animation-iteration-count: 1 !important;
                    transition-duration: 0.01ms !important;
                }
            }
        </style>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.15.4/dist/cdn.min.js"></script>
    </head>
    <body class="bg-gradient-to-b from-zinc-50 to-white text-zinc-900 antialiased selection:bg-primary-100 selection:text-primary-900">
        
        {{-- Background Decorative Elements --}}
        <div class="fixed inset-0 -z-10 overflow-hidden pointer-events-none">
            <div class="absolute -top-[15%] -left-[10%] h-[500px] w-[500px] rounded-full bg-gradient-to-br from-primary-100 to-primary-50 opacity-40 blur-[120px] animate-pulse"></div>
            <div class="absolute top-[30%] -right-[10%] h-[400px] w-[400px] rounded-full bg-gradient-to-br from-secondary-100 to-secondary-50 opacity-40 blur-[100px] animate-pulse" style="animation-delay: 2s"></div>
            <div class="absolute bottom-[10%] left-[20%] h-[350px] w-[350px] rounded-full bg-gradient-to-br from-primary-100/30 to-transparent opacity-30 blur-[90px]"></div>
        </div>

        {{-- NAVBAR - Improved --}}
        @php
            $navBase = 'px-3 sm:px-4 py-2 rounded-xl text-sm font-semibold transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-primary-500';
            $navInactive = 'text-zinc-700 hover:text-primary-600 hover:bg-primary-50/50';
            $navActive = 'text-primary-700 bg-primary-50 ring-1 ring-primary-200';

            $navMobileBase = 'px-4 py-2.5 rounded-xl text-sm font-semibold transition-all focus:outline-none focus:ring-2 focus:ring-primary-500';
            $navMobileInactive = 'text-zinc-700 hover:bg-primary-50 hover:text-primary-700';
            $navMobileActive = 'text-primary-700 bg-primary-50 ring-1 ring-primary-200';
        @endphp
        <header class="sticky top-0 z-50 glass border-b border-zinc-200/60 shadow-sm" x-data="{ open: false, scrolled: false }" 
                @scroll.window="scrolled = window.pageYOffset > 20">
            <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" aria-label="Main navigation">
                <div class="flex items-center justify-between h-16 sm:h-20">
                    {{-- Logo --}}
                    <a href="{{ route('home') }}" class="flex items-center gap-3 group flex-shrink-0 focus:outline-none focus:ring-2 focus:ring-primary-500 rounded-lg" aria-label="GT Trans Homepage">
                        <div class="relative">
                            <img src="{{ asset('assets/img/logo-color.svg') }}" alt="Logo GT Trans" class="h-10 sm:h-12 w-auto transition-transform duration-300 group-hover:scale-105">
                        </div>
                    </a>

                    {{-- Desktop Navigation --}}
                    <nav class="hidden lg:flex items-center gap-1" aria-label="Primary">
                        <a href="{{ route('home') }}" class="{{ $navBase }} {{ request()->routeIs('home') ? $navActive : $navInactive }}">
                            Beranda
                        </a>
                        <a href="{{ route('routes.index') }}" class="{{ $navBase }} {{ request()->routeIs('routes.*') ? $navActive : $navInactive }}">
                            Rute & Jadwal
                        </a>
                        <a href="{{ route('services') }}" class="{{ $navBase }} {{ request()->routeIs('services') ? $navActive : $navInactive }}">
                            Layanan
                        </a>
                        <a href="{{ route('faq') }}" class="{{ $navBase }} {{ request()->routeIs('faq') ? $navActive : $navInactive }}">
                            FAQ
                        </a>
                        <a href="{{ route('contact') }}" class="{{ $navBase }} {{ request()->routeIs('contact') ? $navActive : $navInactive }}">
                            Kontak
                        </a>
                    </nav>

                    {{-- Desktop CTA Buttons --}}
                    <div class="hidden lg:flex items-center gap-3">
                        <x-ui.button variant="outline" href="{{ route('routes.index') }}" class="border-zinc-300 bg-white hover:bg-zinc-50 text-zinc-700 shadow-sm font-semibold">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                            Cari Rute
                        </x-ui.button>
                        <x-ui.button href="{{ route('routes.index') }}" class="bg-primary-600 hover:bg-primary-700 text-white shadow-lg shadow-primary-600/30 font-bold">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                            Booking Sekarang
                        </x-ui.button>
                    </div>

                    {{-- Mobile Menu Toggle --}}
                    <button 
                        @click="open = !open" 
                        class="lg:hidden p-2 rounded-xl border border-zinc-300 bg-white hover:bg-zinc-50 transition-colors focus:outline-none focus:ring-2 focus:ring-primary-500" 
                        aria-label="Toggle menu"
                        :aria-expanded="open">
                        <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6 text-zinc-700" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" /></svg>
                        <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6 text-zinc-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="display:none;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                    </button>
                </div>

                {{-- Mobile Menu --}}
                <div 
                    x-show="open" 
                    x-transition:enter="transition ease-out duration-200" 
                    x-transition:enter-start="opacity-0 -translate-y-4" 
                    x-transition:enter-end="opacity-100 translate-y-0"
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100 translate-y-0"
                    x-transition:leave-end="opacity-0 -translate-y-4"
                    class="lg:hidden pb-5 pt-3"
                    style="display:none;">
                    <div class="flex flex-col gap-1.5">
                        <a href="{{ route('home') }}" class="{{ $navMobileBase }} {{ request()->routeIs('home') ? $navMobileActive : $navMobileInactive }}">Beranda</a>
                        <a href="{{ route('routes.index') }}" class="{{ $navMobileBase }} {{ request()->routeIs('routes.*') ? $navMobileActive : $navMobileInactive }}">Rute & Jadwal</a>
                        <a href="{{ route('services') }}" class="{{ $navMobileBase }} {{ request()->routeIs('services') ? $navMobileActive : $navMobileInactive }}">Layanan</a>
                        <a href="{{ route('faq') }}" class="{{ $navMobileBase }} {{ request()->routeIs('faq') ? $navMobileActive : $navMobileInactive }}">FAQ</a>
                        <a href="{{ route('contact') }}" class="{{ $navMobileBase }} {{ request()->routeIs('contact') ? $navMobileActive : $navMobileInactive }}">Kontak</a>
                    </div>
                    <div class="mt-6 flex flex-col gap-3">
                        <x-ui.button variant="outline" href="{{ route('routes.index') }}" class="w-full justify-center border-zinc-300 bg-white">
                            Cari Rute
                        </x-ui.button>
                        <x-ui.button href="{{ route('routes.index') }}" class="text-white w-full justify-center bg-primary-600 hover:bg-primary-700 shadow-lg">
                            Booking Sekarang
                        </x-ui.button>
                    </div>
                </div>
            </nav>
        </header>

        {{-- MAIN CONTENT --}}
        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 md:py-12 lg:py-16">
            @yield('content')
        </main>

        {{-- FOOTER - Improved & Professional --}}
        <footer id="kontak" class="bg-gradient-to-b from-white via-zinc-50 to-zinc-100 border-t border-zinc-200 mt-16 sm:mt-24">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                {{-- Main Footer Content --}}
                <div class="py-12 sm:py-16 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-8 sm:gap-12">
                    {{-- Company Info --}}
                    <div class="lg:col-span-5">
                        <div class="flex items-center gap-3 mb-6">
                            <img src="{{ asset('assets/img/logo-color.svg') }}" alt="Logo GT Trans" class="h-10 sm:h-12 w-auto transition-transform duration-300 group-hover:scale-105">
                        </div>
                        <p class="text-zinc-600 leading-relaxed max-w-md mb-6">
                            Solusi transportasi terpercaya untuk perjalanan antar kota di Indonesia. Nikmati layanan premium dengan harga terjangkau, keamanan terjamin, dan kenyamanan maksimal.
                        </p>
                        
                        {{-- Trust Badges --}}
                        <div class="flex flex-wrap gap-2 mb-8">
                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 text-[11px] sm:text-xs font-bold">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                Aman & Terpercaya
                            </span>
                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-blue-50 border border-blue-200 text-blue-700 text-[11px] sm:text-xs font-bold">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/><path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/></svg>
                                E-Ticket QR
                            </span>
                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-amber-50 border border-amber-200 text-amber-700 text-[11px] sm:text-xs font-bold">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/></svg>
                                24/7 Service
                            </span>
                        </div>
                    </div>

                    {{-- Quick Links --}}
                    <div class="lg:col-span-2">
                        <h4 class="font-bold text-zinc-900 mb-5 text-sm uppercase tracking-wider">Navigasi</h4>
                        <ul class="space-y-3 text-sm">
                            <li><a href="{{ route('home') }}" class="text-zinc-600 hover:text-primary-600 transition-colors font-medium inline-flex items-center gap-2 group">
                                <svg class="w-4 h-4 opacity-0 -ml-6 group-hover:opacity-100 group-hover:ml-0 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                Beranda
                            </a></li>
                            <li><a href="{{ route('routes.index') }}" class="text-zinc-600 hover:text-primary-600 transition-colors font-medium inline-flex items-center gap-2 group">
                                <svg class="w-4 h-4 opacity-0 -ml-6 group-hover:opacity-100 group-hover:ml-0 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                Cari Rute Travel
                            </a></li>
                            <li><a href="{{ route('services') }}" class="text-zinc-600 hover:text-primary-600 transition-colors font-medium inline-flex items-center gap-2 group">
                                <svg class="w-4 h-4 opacity-0 -ml-6 group-hover:opacity-100 group-hover:ml-0 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                Layanan Kami
                            </a></li>
                            <li><a href="{{ route('faq') }}" class="text-zinc-600 hover:text-primary-600 transition-colors font-medium inline-flex items-center gap-2 group">
                                <svg class="w-4 h-4 opacity-0 -ml-6 group-hover:opacity-100 group-hover:ml-0 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                FAQ
                            </a></li>
                            <li><a href="{{ route('contact') }}" class="text-zinc-600 hover:text-primary-600 transition-colors font-medium inline-flex items-center gap-2 group">
                                <svg class="w-4 h-4 opacity-0 -ml-6 group-hover:opacity-100 group-hover:ml-0 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                Kontak Kami
                            </a></li>
                        </ul>
                    </div>

                    {{-- Services --}}
                    <div class="lg:col-span-2">
                        <h4 class="font-bold text-zinc-900 mb-5 text-sm uppercase tracking-wider">Layanan</h4>
                        <ul class="space-y-3 text-sm">
                            <li class="text-zinc-600 font-medium flex items-start gap-2">
                                <svg class="w-5 h-5 text-primary-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                Travel Reguler
                            </li>
                            <li class="text-zinc-600 font-medium flex items-start gap-2">
                                <svg class="w-5 h-5 text-primary-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                Carter Private
                            </li>
                            <li class="text-zinc-600 font-medium flex items-start gap-2">
                                <svg class="w-5 h-5 text-primary-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                Paket Kilat
                            </li>
                        </ul>
                    </div>

                    {{-- Contact & Social --}}
                    <div class="lg:col-span-3">
                        <h4 class="font-bold text-zinc-900 mb-5 text-sm uppercase tracking-wider">Hubungi Kami</h4>
                        <div class="space-y-4 mb-6">
                            <p class="text-sm text-zinc-600 leading-relaxed">
                                <strong class="text-zinc-900 block mb-1">Customer Service</strong>
                                Senin - Minggu, 24 jam<br>
                                Via WhatsApp
                            </p>
                        </div>
                        
                        {{-- Social Media Icons --}}
                        <div class="flex flex-wrap gap-2">
                            @php($socialLinks = \App\Models\SocialLink::active()->get())
                            @forelse($socialLinks as $s)
                                <a href="{{ $s->url }}" target="_blank" rel="noopener noreferrer"
                                   class="group flex items-center justify-center h-10 w-10 sm:h-11 sm:w-11 rounded-xl border-2 border-zinc-200 bg-white hover:bg-primary-600 hover:border-primary-600 transition-all duration-300 text-zinc-600 hover:text-white shadow-sm hover:shadow-lg hover:shadow-primary-600/20 hover:-translate-y-1">
                                    <span class="sr-only">{{ $s->platform }}</span>
                                    @if ($s->platform === 'facebook')
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 2C6.477 2 2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12c0-5.523-4.477-10-10-10z"/>
                                        </svg>
                                    @elseif ($s->platform === 'twitter')
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-brand-x"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 4l11.733 16h4.267l-11.733 -16l-4.267 0" /><path d="M4 20l6.768 -6.768m2.46 -2.46l6.772 -6.772" /></svg>
                                    @elseif ($s->platform === 'instagram')
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-brand-instagram"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 8a4 4 0 0 1 4 -4h8a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4l0 -8" /><path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" /><path d="M16.5 7.5v.01" /></svg>
                                    @elseif ($s->platform === 'tiktok')
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-brand-tiktok"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M21 7.917v4.034a9.948 9.948 0 0 1 -5 -1.951v4.5a6.5 6.5 0 1 1 -8 -6.326v4.326a2.5 2.5 0 1 0 4 2v-11.5h4.083a6.005 6.005 0 0 0 4.917 4.917" /></svg>
                                    @elseif ($s->platform === 'youtube')
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-brand-youtube"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M2 8a4 4 0 0 1 4 -4h12a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-12a4 4 0 0 1 -4 -4v-8" /><path d="M10 9l5 3l-5 3l0 -6" /></svg>
                                    @elseif ($s->platform === 'whatsapp')
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-brand-whatsapp"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 21l1.65 -3.8a9 9 0 1 1 3.4 2.9l-5.05 .9" /><path d="M9 10a.5 .5 0 0 0 1 0v-1a.5 .5 0 0 0 -1 0v1a5 5 0 0 0 5 5h1a.5 .5 0 0 0 0 -1h-1a.5 .5 0 0 0 0 1" /></svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-world"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" /><path d="M3.6 9h16.8" /><path d="M3.6 15h16.8" /><path d="M11.5 3a17 17 0 0 0 0 18" /><path d="M12.5 3a17 17 0 0 1 0 18" /></svg>
                                    @endif
                                </a>
                            @empty
                                <span class="text-sm text-zinc-400 italic">Segera hadir</span>
                            @endforelse
                        </div>
                    </div>
                </div>

                {{-- Bottom Footer --}}
                <div class="py-8 border-t border-zinc-200">
                    <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                        <p class="text-sm text-zinc-500 font-medium text-center md:text-left">
                            © {{ date('Y') }} <strong class="text-zinc-700">GT Trans</strong>. All rights reserved.
                        </p>
                        <div class="flex flex-wrap justify-center gap-6 text-sm font-medium text-zinc-500">
                            <a href="#" class="hover:text-primary-600 transition-colors">Syarat & Ketentuan</a>
                            <span class="text-zinc-300">|</span>
                            <a href="#" class="hover:text-primary-600 transition-colors">Kebijakan Privasi</a>
                            <span class="text-zinc-300">|</span>
                            <a href="#" class="hover:text-primary-600 transition-colors">Bantuan</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        {{-- Scroll to Top Button --}}
        <button 
            x-data="{ show: false }"
            @scroll.window="show = window.pageYOffset > 300"
            x-show="show"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4"
            x-transition:enter-end="opacity-100 translate-y-0"
            @click="window.scrollTo({ top: 0, behavior: 'smooth' })"
            class="fixed bottom-8 cursor-pointer right-8 z-40 p-3 rounded-full bg-primary-600 text-white shadow-2xl shadow-primary-600/40 hover:bg-primary-700 transition-all duration-300 hover:scale-110 focus:outline-none focus:ring-4 focus:ring-primary-300"
            style="display:none;"
            aria-label="Scroll to top">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 10l7-7m0 0l7 7m-7-7v18" />
            </svg>
        </button>
    </body>
</html>