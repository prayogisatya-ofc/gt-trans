@extends('layouts.app')

@section('title', 'FAQ GT Trans')
@section('meta_description', 'FAQ GT Trans. Temukan jawaban tentang layanan reguler, carter, paket kilat, pembayaran, e-ticket, pembatalan, dan perubahan jadwal travel antar kota.')

@section('content')
    {{-- BREADCRUMB --}}
    <nav class="mb-6 sm:mb-8" aria-label="Breadcrumb">
        <ol class="flex items-center gap-2 text-sm">
            <li>
                <a href="{{ route('home') }}" class="text-zinc-500 hover:text-primary-600 font-medium transition-colors">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                    </svg>
                </a>
            </li>
            <li class="text-zinc-300">/</li>
            <li class="text-zinc-900 font-bold">FAQ</li>
        </ol>
    </nav>

    {{-- HEADER SECTION --}}
    <section class="mb-12 sm:mb-16">
        <div class="grid lg:grid-cols-2 gap-8 sm:gap-12 items-center">
            {{-- Left Content --}}
            <div class="space-y-5 sm:space-y-6">
                <div>
                    <div class="inline-flex items-center gap-2 px-3 sm:px-4 py-1.5 sm:py-2 rounded-full bg-gradient-to-r from-primary-50 to-emerald-50 border border-primary-200 text-primary-700 text-sm font-bold mb-3 sm:mb-4 shadow-sm">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Frequently Asked Questions
                    </div>
                    
                    <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-black leading-[1.1] text-zinc-900 tracking-tight">
                        Pertanyaan yang <br>
                        <span class="bg-clip-text text-transparent bg-gradient-to-r from-primary-600 to-primary-500">Sering Ditanyakan</span>
                    </h1>
                </div>
                
                <p class="text-base sm:text-lg text-zinc-600 leading-relaxed max-w-xl">
                    Temukan jawaban untuk pertanyaan umum seputar layanan GT Trans. Kalau masih bingung, langsung hubungi admin via WhatsApp ya!
                </p>

                {{-- Stats --}}
                <div class="flex flex-wrap gap-4 sm:gap-6 pt-4">
                    <div class="flex items-center gap-2 sm:gap-3">
                        <div class="h-10 w-10 sm:h-12 sm:w-12 rounded-xl bg-primary-100 flex items-center justify-center">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="text-xl sm:text-2xl font-black text-zinc-900">{{ count($faqs) }}+</div>
                            <div class="text-xs font-bold text-zinc-500 uppercase tracking-wider">FAQ Tersedia</div>
                        </div>
                    </div>
                    
                    <div class="flex items-center gap-2 sm:gap-3">
                        <div class="h-10 w-10 sm:h-12 sm:w-12 rounded-xl bg-secondary-100 flex items-center justify-center">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6 text-secondary-600" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="text-xl sm:text-2xl font-black text-zinc-900">24/7</div>
                            <div class="text-xs font-bold text-zinc-500 uppercase tracking-wider">Customer Support</div>
                        </div>
                    </div>
                </div>

                {{-- CTA Buttons --}}
                <div class="flex flex-col sm:flex-row flex-wrap gap-4 pt-4">
                    <x-ui.button size="lg" href="{{ route('routes.index') }}" class="group text-white">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6 mr-2 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        Cari Rute & Booking
                    </x-ui.button>
                    <x-ui.button size="lg" variant="outline" href="{{ route('contact') }}" class="group">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6 mr-2 group-hover:rotate-12 transition-transform" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                        </svg>
                        Kontak Admin
                    </x-ui.button>
                </div>
            </div>

            {{-- Right Visual --}}
            <div class="relative">
                <div class="absolute -inset-4 bg-gradient-to-tr from-primary-200/60 via-secondary-200/40 to-blue-200/60 blur-3xl rounded-[3rem] opacity-60 animate-pulse"></div>
                
                <x-ui.card class="relative p-6 sm:p-8 border-none shadow-2xl shadow-zinc-300/50 rounded-[2rem] bg-white/95 backdrop-blur-md">
                    <div class="space-y-5 sm:space-y-6">
                        <div class="flex items-center gap-2 sm:gap-3">
                            <div class="h-10 w-10 sm:h-12 sm:w-12 rounded-xl bg-primary-600 flex items-center justify-center text-white shadow-lg shadow-primary-600/30">
                                <svg class="w-6 h-6 sm:w-7 sm:h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <div class="text-sm font-bold text-zinc-500 uppercase tracking-wider">Bantuan Cepat</div>
                                <div class="text-lg sm:text-xl font-black text-zinc-900">Topik Populer</div>
                            </div>
                        </div>

                        <div class="space-y-3">
                            <a href="#faq-1" class="flex items-center gap-3 p-3 sm:p-4 rounded-xl bg-gradient-to-br from-primary-50 to-emerald-50 border border-primary-200 hover:shadow-lg hover:scale-105 transition-all group">
                                <div class="h-9 w-9 sm:h-10 sm:w-10 rounded-lg bg-primary-600 flex items-center justify-center text-white flex-shrink-0 shadow-lg">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                                        <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="text-sm font-bold text-primary-900 group-hover:text-primary-700 transition-colors">Cara Booking</div>
                                    <div class="text-xs text-primary-800">Panduan lengkap pemesanan</div>
                                </div>
                                <svg class="w-5 h-5 text-primary-600 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>

                            <a href="#faq-2" class="flex items-center gap-3 p-3 sm:p-4 rounded-xl bg-gradient-to-br from-secondary-50 to-orange-50 border border-secondary-200 hover:shadow-lg hover:scale-105 transition-all group">
                                <div class="h-9 w-9 sm:h-10 sm:w-10 rounded-lg bg-secondary-400 flex items-center justify-center text-secondary-950 flex-shrink-0 shadow-lg">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="text-sm font-bold text-secondary-900 group-hover:text-secondary-700 transition-colors">Metode Pembayaran</div>
                                    <div class="text-xs text-secondary-800">Transfer, QRIS, Cash</div>
                                </div>
                                <svg class="w-5 h-5 text-secondary-600 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>

                            <a href="#faq-3" class="flex items-center gap-3 p-3 sm:p-4 rounded-xl bg-gradient-to-br from-blue-50 to-indigo-50 border border-blue-200 hover:shadow-lg hover:scale-105 transition-all group">
                                <div class="h-9 w-9 sm:h-10 sm:w-10 rounded-lg bg-blue-600 flex items-center justify-center text-white flex-shrink-0 shadow-lg">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="text-sm font-bold text-blue-900 group-hover:text-blue-700 transition-colors">Pembatalan Tiket</div>
                                    <div class="text-xs text-blue-800">Syarat & ketentuan</div>
                                </div>
                                <svg class="w-5 h-5 text-blue-600 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </x-ui.card>
            </div>
        </div>
    </section>

    {{-- FAQ ACCORDION SECTION --}}
    <section class="mb-12 sm:mb-16" x-data="{ open: 1 }">
        <div class="text-center max-w-3xl mx-auto mb-12">
            <div class="inline-flex items-center gap-2 px-3 sm:px-4 py-1.5 sm:py-2 rounded-full bg-primary-50 border border-primary-200 text-primary-700 text-sm font-bold mb-4">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                Semua Pertanyaan
            </div>
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-black tracking-tight text-zinc-900">
                Daftar Lengkap FAQ
            </h2>
            <p class="text-zinc-600 text-base sm:text-lg mt-4">Klik pertanyaan untuk melihat jawaban lengkapnya</p>
        </div>

        <div class="max-w-4xl mx-auto space-y-3 sm:space-y-4">
            @foreach($faqs as $i => $f)
                <article 
                    id="faq-{{ $i+1 }}"
                    class="group"
                    x-data="{ isOpen: {{ $i === 0 ? 'true' : 'false' }} }"
                >
                    <x-ui.card class="relative overflow-hidden border-2 transition-all duration-300"
                        x-bind:class="isOpen ? 'border-primary-300 shadow-lg shadow-primary-600/10 bg-gradient-to-br from-primary-50/50 to-white' : 'border-zinc-100 hover:border-zinc-200 hover:shadow-md'">
                        
                        {{-- Accent Line --}}
                        <div class="absolute left-0 top-0 bottom-0 w-1 bg-gradient-to-b from-primary-600 to-primary-400 transition-all duration-300"
                            :class="isOpen ? 'opacity-100' : 'opacity-0'">
                        </div>

                        <button 
                            type="button"
                            class="w-full px-4 sm:px-6 py-4 sm:py-5 flex items-start justify-between gap-4 text-left"
                            @click="isOpen = !isOpen; open = {{ $i+1 }}"
                        >
                            <div class="flex-1 min-w-0">
                                <div class="flex items-start gap-2 sm:gap-3">
                                    <div class="flex-shrink-0 h-7 w-7 sm:h-8 sm:w-8 rounded-lg flex items-center justify-center font-black text-sm transition-all duration-300"
                                        :class="isOpen ? 'bg-primary-600 text-white shadow-lg shadow-primary-600/30' : 'bg-zinc-100 text-zinc-600 group-hover:bg-zinc-200'">
                                        {{ $i+1 }}
                                    </div>
                                    <div class="flex-1 pt-0.5">
                                        <h3 class="text-sm sm:text-base md:text-lg font-black text-zinc-900 transition-colors leading-snug"
                                            :class="isOpen ? 'text-primary-900' : 'group-hover:text-primary-700'">
                                            {{ $f['q'] }}
                                        </h3>
                                    </div>
                                </div>
                            </div>

                            <div class="flex-shrink-0">
                                <div class="h-9 w-9 sm:h-10 sm:w-10 rounded-xl flex items-center justify-center transition-all duration-300"
                                    :class="isOpen ? 'bg-primary-600 text-white shadow-lg shadow-primary-600/30 rotate-180' : 'bg-zinc-100 text-zinc-700 group-hover:bg-primary-50 group-hover:text-primary-700'">
                                    <svg class="w-5 h-5 sm:w-6 sm:h-6 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
                                    </svg>
                                </div>
                            </div>
                        </button>

                        <div 
                            x-show="isOpen"
                            x-collapse
                            x-cloak
                        >
                            <div class="px-4 sm:px-6 pb-5 sm:pb-6 pt-2">
                                <div class="ml-10 sm:ml-11 p-4 sm:p-5 rounded-2xl bg-white border-2 border-primary-100">
                                    <div class="flex items-start gap-2 sm:gap-3">
                                        <div class="flex-shrink-0 h-5 w-5 sm:h-6 sm:w-6 rounded-full bg-primary-100 flex items-center justify-center mt-0.5">
                                            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-primary-600" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                        <div class="flex-1 text-sm sm:text-base text-zinc-700 leading-relaxed font-medium">
                                            {{ $f['a'] }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </x-ui.card>
                </article>
            @endforeach
        </div>
    </section>

    {{-- HELP CENTER CTA --}}
    <section class="mb-12 sm:mb-16">
        <div class="relative bg-gradient-to-br from-primary-600 via-primary-700 to-secondary-500 rounded-[3rem] p-8 sm:p-10 md:p-16 overflow-hidden shadow-2xl shadow-primary-600/40">
            {{-- Background Pattern --}}
            <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/diagonal-stripes.png')] opacity-10"></div>
            <div class="absolute top-0 left-0 -mt-32 -ml-32 h-72 w-72 sm:h-96 sm:w-96 rounded-full bg-white/10 blur-[100px]"></div>
            <div class="absolute bottom-0 right-0 -mb-32 -mr-32 h-72 w-72 sm:h-96 sm:w-96 rounded-full bg-secondary-300/20 blur-[100px]"></div>
            
            {{-- Content --}}
            <div class="relative z-10 max-w-4xl mx-auto">
                <div class="grid md:grid-cols-2 gap-8 items-center">
                    {{-- Left Content --}}
                    <div class="text-center md:text-left">
                        <div class="inline-flex items-center gap-2 px-3 sm:px-4 py-1.5 sm:py-2 rounded-full bg-white/20 border border-white/30 text-white text-sm font-bold backdrop-blur-sm mb-4">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-2 0c0 .993-.241 1.929-.668 2.754l-1.524-1.525a3.997 3.997 0 00.078-2.183l1.562-1.562C15.802 8.249 16 9.1 16 10zm-5.165 3.913l1.58 1.58A5.98 5.98 0 0110 16a5.976 5.976 0 01-2.516-.552l1.562-1.562a4.006 4.006 0 001.789.027zm-4.677-2.796a4.002 4.002 0 01-.041-2.08l-.08.08-1.53-1.533A5.98 5.98 0 004 10c0 .954.223 1.856.619 2.657l1.54-1.54zm1.088-6.45A5.974 5.974 0 0110 4c.954 0 1.856.223 2.657.619l-1.54 1.54a4.002 4.002 0 00-2.346.033L7.246 4.668zM12 10a2 2 0 11-4 0 2 2 0 014 0z" clip-rule="evenodd"/>
                            </svg>
                            Butuh Bantuan?
                        </div>
                        
                        <h2 class="text-2xl sm:text-3xl md:text-4xl font-black text-white mb-4 leading-tight">
                            Masih Ada Pertanyaan?
                        </h2>
                        
                        <p class="text-base sm:text-lg text-primary-100 leading-relaxed font-medium mb-6">
                            Tim customer support GT Trans siap membantu Anda 24/7 via WhatsApp untuk konsultasi rute, jadwal, dan kebutuhan khusus lainnya.
                        </p>
                        
                        <div class="flex flex-col sm:flex-row gap-2 sm:gap-3">
                            <x-ui.button href="{{ route('contact') }}" size="lg" class="bg-white text-primary-700 hover:text-white hover:bg-primary-50 border-none font-black shadow-xl hover:scale-105 transition-all group">
                                <svg class="w-5 h-5 sm:w-6 sm:h-6 mr-2 group-hover:rotate-12 transition-transform" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                                </svg>
                                Hubungi Admin
                            </x-ui.button>
                            
                            <x-ui.button href="{{ route('routes.index') }}" variant="outline" size="lg" class="border-2 border-white/40 text-white hover:bg-white/10 hover:border-white font-bold backdrop-blur-sm transition-all">
                                Cari Rute Travel
                            </x-ui.button>
                        </div>
                    </div>

                    {{-- Right Stats --}}
                    <div class="grid grid-cols-2 gap-3 sm:gap-4">
                        <div class="p-4 sm:p-4 sm:p-6 rounded-2xl bg-white/10 backdrop-blur-md border border-white/20 text-center">
                            <div class="text-3xl sm:text-4xl font-black text-white mb-2">{{ count($faqs) }}+</div>
                            <div class="text-sm font-bold text-primary-100 uppercase tracking-wider">FAQ</div>
                        </div>
                        
                        <div class="p-4 sm:p-4 sm:p-6 rounded-2xl bg-white/10 backdrop-blur-md border border-white/20 text-center">
                            <div class="text-3xl sm:text-4xl font-black text-white mb-2">24/7</div>
                            <div class="text-sm font-bold text-primary-100 uppercase tracking-wider">Support</div>
                        </div>
                        
                        <div class="p-4 sm:p-4 sm:p-6 rounded-2xl bg-white/10 backdrop-blur-md border border-white/20 text-center">
                            <div class="text-3xl sm:text-4xl font-black text-white mb-2">&lt;5</div>
                            <div class="text-sm font-bold text-primary-100 uppercase tracking-wider">Min Respon</div>
                        </div>
                        
                        <div class="p-4 sm:p-4 sm:p-6 rounded-2xl bg-white/10 backdrop-blur-md border border-white/20 text-center">
                            <div class="text-3xl sm:text-4xl font-black text-white mb-2">100%</div>
                            <div class="text-sm font-bold text-primary-100 uppercase tracking-wider">Terjawab</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- QUICK LINKS --}}
    <section>
        <div class="text-center max-w-3xl mx-auto mb-12">
            <h2 class="text-2xl sm:text-2xl sm:text-3xl md:text-4xl font-black tracking-tight text-zinc-900 mb-3 sm:mb-4">
                Link Cepat
            </h2>
            <p class="text-zinc-600 text-base sm:text-lg">Akses halaman penting lainnya</p>
        </div>

        <div class="grid md:grid-cols-3 gap-4 sm:gap-6">
            <a href="{{ route('services') }}" class="group">
                <x-ui.card class="h-full p-6 sm:p-8 border-2 border-zinc-100 hover:border-primary-300 hover:shadow-xl transition-all hover:-translate-y-1">
                    <div class="h-12 w-12 sm:h-14 sm:w-14 rounded-2xl bg-gradient-to-br from-primary-50 to-primary-100 flex items-center justify-center text-primary-600 mb-5 sm:mb-6 group-hover:from-primary-600 group-hover:to-primary-700 group-hover:text-white transition-all shadow-lg">
                        <svg class="w-6 h-6 sm:w-7 sm:h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                        </svg>
                    </div>
                    <h3 class="text-lg sm:text-xl font-black text-zinc-900 mb-3 group-hover:text-primary-700 transition-colors">
                        Layanan Kami
                    </h3>
                    <p class="text-zinc-600 leading-relaxed font-medium mb-4">
                        Pelajari layanan Reguler, Carter, dan Paket Kilat
                    </p>
                    <div class="flex items-center gap-2 text-primary-600 font-bold text-sm group-hover:gap-3 transition-all">
                        Lihat Layanan
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>
                    </div>
                </x-ui.card>
            </a>

            <a href="{{ route('routes.index') }}" class="group">
                <x-ui.card class="h-full p-6 sm:p-8 border-2 border-zinc-100 hover:border-secondary-300 hover:shadow-xl transition-all hover:-translate-y-1">
                    <div class="h-12 w-12 sm:h-14 sm:w-14 rounded-2xl bg-gradient-to-br from-secondary-50 to-secondary-100 flex items-center justify-center text-secondary-600 mb-5 sm:mb-6 group-hover:from-secondary-400 group-hover:to-secondary-500 group-hover:text-secondary-950 transition-all shadow-lg">
                        <svg class="w-6 h-6 sm:w-7 sm:h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>
                        </svg>
                    </div>
                    <h3 class="text-lg sm:text-xl font-black text-zinc-900 mb-3 group-hover:text-secondary-700 transition-colors">
                        Cari Rute
                    </h3>
                    <p class="text-zinc-600 leading-relaxed font-medium mb-4">
                        Temukan jadwal travel untuk rute tujuan Anda
                    </p>
                    <div class="flex items-center gap-2 text-secondary-600 font-bold text-sm group-hover:gap-3 transition-all">
                        Cari Sekarang
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>
                    </div>
                </x-ui.card>
            </a>

            <a href="{{ route('contact') }}" class="group">
                <x-ui.card class="h-full p-6 sm:p-8 border-2 border-zinc-100 hover:border-primary-300 hover:shadow-xl transition-all hover:-translate-y-1">
                    <div class="h-12 w-12 sm:h-14 sm:w-14 rounded-2xl bg-gradient-to-br from-blue-50 to-blue-100 flex items-center justify-center text-blue-600 mb-5 sm:mb-6 group-hover:from-blue-600 group-hover:to-blue-700 group-hover:text-white transition-all shadow-lg">
                        <svg class="w-6 h-6 sm:w-7 sm:h-7" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg sm:text-xl font-black text-zinc-900 mb-3 group-hover:text-blue-700 transition-colors">
                        Hubungi Kami
                    </h3>
                    <p class="text-zinc-600 leading-relaxed font-medium mb-4">
                        Butuh bantuan? Chat langsung dengan admin
                    </p>
                    <div class="flex items-center gap-2 text-blue-600 font-bold text-sm group-hover:gap-3 transition-all">
                        Chat Sekarang
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>
                    </div>
                </x-ui.card>
            </a>
        </div>
    </section>
@endsection