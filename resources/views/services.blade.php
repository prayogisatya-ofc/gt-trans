@extends('layouts.app')

@section('title', 'Layanan GT Trans')
@section('meta_description', 'Kenali layanan GT Trans: Reguler (sistem per kursi), Carter Private (sewa 1 mobil penuh), dan Paket Kilat (pengiriman same day). Pilih layanan sesuai kebutuhan perjalanan Anda.')

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
            <li class="text-zinc-900 font-bold">Layanan</li>
        </ol>
    </nav>

    {{-- HEADER SECTION --}}
    <section class="mb-10 sm:mb-16">
        <div class="grid lg:grid-cols-2 gap-8 sm:gap-12 items-center">
            {{-- Left Content --}}
            <div class="space-y-5 sm:space-y-6">
                <div>
                    <div class="inline-flex items-center gap-2 px-3 py-1.5 sm:px-4 sm:py-2 rounded-full bg-gradient-to-r from-primary-50 to-emerald-50 border border-primary-200 text-primary-700 text-xs sm:text-sm font-bold mb-4 shadow-sm">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                        </svg>
                        Layanan GT Trans
                    </div>
                    
                    <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-black leading-[1.1] text-zinc-900 tracking-tight">
                        Pilih Layanan <br>
                        <span class="bg-clip-text text-transparent bg-gradient-to-r from-primary-600 to-primary-500">Sesuai Kebutuhan</span>
                    </h1>
                </div>
                
                <p class="text-base sm:text-lg text-zinc-600 leading-relaxed max-w-xl">
                    GT Trans melayani perjalanan antar kota untuk penumpang maupun pengiriman paket ekspres. Proses booking cepat, harga transparan, dan konfirmasi detail via WhatsApp admin.
                </p>

                {{-- CTA Buttons --}}
                <div class="flex flex-col sm:flex-row flex-wrap gap-3 sm:gap-4 pt-3 sm:pt-4">
                    <x-ui.button size="lg" href="{{ route('routes.index') }}" class="group text-white">
                        <svg class="w-4 h-4 sm:w-6 sm:h-6 mr-2 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        Cari Rute & Booking
                    </x-ui.button>
                    <x-ui.button size="lg" variant="outline" href="{{ route('contact') }}" class="group">
                        <svg class="w-4 h-4 sm:w-6 sm:h-6 mr-2 group-hover:rotate-12 transition-transform" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                        </svg>
                        Kontak Admin
                    </x-ui.button>
                </div>
            </div>

            {{-- Right Visual/Stats --}}
            <div class="relative">
                <div class="absolute -inset-4 bg-gradient-to-tr from-primary-200/60 via-secondary-200/40 to-blue-200/60 blur-3xl rounded-[3rem] opacity-60 animate-pulse"></div>
                
                <x-ui.card class="relative p-6 sm:p-8 border-none shadow-2xl shadow-zinc-300/50 rounded-[2rem] bg-white/95 backdrop-blur-md">
                    <div class="space-y-5 sm:space-y-6">
                        <div class="flex items-center gap-3">
                            <div class="h-9 w-9 sm:h-10 sm:w-10 sm:h-12 sm:w-12 rounded-xl bg-primary-600 flex items-center justify-center text-white shadow-lg shadow-primary-600/30">
                                <svg class="w-4 h-4 sm:w-6 sm:h-6 sm:w-7 sm:h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <div class="text-sm font-bold text-zinc-500 uppercase tracking-wider">Keunggulan Kami</div>
                                <div class="text-lg sm:text-xl font-black text-zinc-900">3 Layanan Utama</div>
                            </div>
                        </div>

                        <div class="space-y-4">
                            <div class="flex items-start gap-4 p-3 sm:p-4 rounded-xl bg-gradient-to-br from-primary-50 to-emerald-50 border border-primary-200">
                                <div class="h-9 w-9 sm:h-10 sm:w-10 rounded-lg bg-primary-600 flex items-center justify-center text-white flex-shrink-0 shadow-lg">
                                    <svg class="w-4 h-4 sm:w-6 sm:h-6" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="text-sm font-bold text-primary-900">Booking Cepat</div>
                                    <div class="text-xs text-primary-800 mt-0.5">Isi form, langsung ke WhatsApp</div>
                                </div>
                            </div>

                            <div class="flex items-start gap-4 p-3 sm:p-4 rounded-xl bg-gradient-to-br from-secondary-50 to-orange-50 border border-secondary-200">
                                <div class="h-9 w-9 sm:h-10 sm:w-10 rounded-lg bg-secondary-400 flex items-center justify-center text-secondary-950 flex-shrink-0 shadow-lg">
                                    <svg class="w-4 h-4 sm:w-6 sm:h-6" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                                        <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="text-sm font-bold text-secondary-900">E-Ticket QR</div>
                                    <div class="text-xs text-secondary-800 mt-0.5">Tiket digital instan</div>
                                </div>
                            </div>

                            <div class="flex items-start gap-4 p-3 sm:p-4 rounded-xl bg-gradient-to-br from-blue-50 to-indigo-50 border border-blue-200">
                                <div class="h-9 w-9 sm:h-10 sm:w-10 rounded-lg bg-blue-600 flex items-center justify-center text-white flex-shrink-0 shadow-lg">
                                    <svg class="w-4 h-4 sm:w-6 sm:h-6" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="text-sm font-bold text-blue-900">Harga Transparan</div>
                                    <div class="text-xs text-blue-800 mt-0.5">Kalkulasi otomatis & jelas</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </x-ui.card>
            </div>
        </div>
    </section>

    {{-- MAIN SERVICES SECTION --}}
    <section class="mb-14 sm:mb-20">
        <div class="text-center max-w-3xl mx-auto mb-10 sm:mb-12">
            <div class="inline-flex items-center gap-2 px-3 py-1.5 sm:px-4 sm:py-2 rounded-full bg-primary-50 border border-primary-200 text-primary-700 text-xs sm:text-sm font-bold mb-4">
                <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                </svg>
                Layanan Unggulan
            </div>
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-black tracking-tight text-zinc-900">
                Tiga Pilihan Layanan Kami
            </h2>
            <p class="text-zinc-600 text-base sm:text-lg mt-4">Sesuaikan dengan kebutuhan perjalanan atau pengiriman Anda</p>
        </div>

        <div class="grid lg:grid-cols-3 gap-8">
            {{-- SERVICE 1: REGULER --}}
            <article class="group relative">
                <x-ui.card class="relative h-full flex flex-col p-6 sm:p-8 rounded-[2rem] border-2 border-zinc-100 hover:border-primary-300 group-hover:shadow-2xl group-hover:shadow-primary-600/10 transition-all duration-300 hover:-translate-y-2 overflow-hidden">
                    {{-- Background Accent --}}
                    <div class="absolute -top-16 -right-16 h-40 w-40 rounded-full bg-gradient-to-br from-primary-50 to-primary-100 group-hover:from-primary-100 group-hover:to-primary-200 transition-all duration-300 opacity-50"></div>

                    {{-- Icon --}}
                    <div class="relative mb-5 sm:mb-6 h-12 w-12 sm:h-16 sm:w-16 rounded-2xl bg-gradient-to-br from-primary-50 to-primary-100 flex items-center justify-center text-primary-600 group-hover:from-primary-600 group-hover:to-primary-700 group-hover:text-white transition-all duration-300 shadow-lg group-hover:shadow-xl group-hover:shadow-primary-600/30">
                        <svg class="w-7 h-7 sm:w-8 sm:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>

                    {{-- Badge --}}
                    <div class="relative mb-4">
                        <x-ui.badge variant="success" size="lg">Reguler</x-ui.badge>
                    </div>

                    {{-- Title & Description --}}
                    <div class="relative flex-grow space-y-4 mb-6">
                        <h3 class="text-xl sm:text-2xl font-black text-zinc-900 group-hover:text-primary-700 transition-colors">
                            Reguler (Umum)
                        </h3>
                        <p class="text-zinc-600 leading-relaxed font-medium">
                            Cocok untuk perjalanan hemat. Harga dihitung per orang sekali jalan, tersedia opsi Drop atau Pulang-Pergi (PP).
                        </p>

                        {{-- Features List --}}
                        <ul class="space-y-3">
                            <li class="flex items-start gap-3">
                                <div class="flex-shrink-0 w-6 h-6 rounded-full bg-emerald-100 flex items-center justify-center mt-0.5">
                                    <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <div class="text-sm font-bold text-zinc-900">Harga Per Orang</div>
                                    <div class="text-xs text-zinc-600 mt-0.5">Bayar sesuai jumlah penumpang</div>
                                </div>
                            </li>
                            <li class="flex items-start gap-3">
                                <div class="flex-shrink-0 w-6 h-6 rounded-full bg-emerald-100 flex items-center justify-center mt-0.5">
                                    <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <div class="text-sm font-bold text-zinc-900">Drop atau PP</div>
                                    <div class="text-xs text-zinc-600 mt-0.5">Sekali jalan atau pulang pergi</div>
                                </div>
                            </li>
                            <li class="flex items-start gap-3">
                                <div class="flex-shrink-0 w-6 h-6 rounded-full bg-emerald-100 flex items-center justify-center mt-0.5">
                                    <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <div class="text-sm font-bold text-zinc-900">Jam Mengikuti Rute</div>
                                    <div class="text-xs text-zinc-600 mt-0.5">Driver atur jadwal optimal</div>
                                </div>
                            </li>
                            <li class="flex items-start gap-3">
                                <div class="flex-shrink-0 w-6 h-6 rounded-full bg-emerald-100 flex items-center justify-center mt-0.5">
                                    <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <div class="text-sm font-bold text-zinc-900">Door to Door</div>
                                    <div class="text-xs text-zinc-600 mt-0.5">Antar jemput alamat</div>
                                </div>
                            </li>
                        </ul>
                    </div>

                    {{-- CTA Button --}}
                    <div class="relative">
                        <x-ui.button href="{{ route('routes.index') }}" class="text-white w-full py-2.5 sm:py-3 group-hover:shadow-xl transition-all">
                            Cari Rute Reguler
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                            </svg>
                        </x-ui.button>
                    </div>
                </x-ui.card>
            </article>

            {{-- SERVICE 2: CARTER (HIGHLIGHT) --}}
            <article class="group relative lg:-mt-4 lg:mb-4">
                <x-ui.card class="relative h-full flex flex-col p-6 sm:p-8 rounded-[2rem] bg-gradient-to-br from-zinc-900 via-zinc-800 to-zinc-900 text-white shadow-2xl shadow-zinc-900/40 hover:shadow-3xl transition-all duration-300 hover:-translate-y-2 border-2 border-zinc-700">
                    {{-- Popular Badge --}}
                    <div class="absolute -top-4 left-1/2 -translate-x-1/2">
                        <span class="px-5 py-2 bg-gradient-to-r from-secondary-400 to-secondary-500 text-secondary-950 text-xs font-black uppercase tracking-widest rounded-full shadow-lg">
                            ⚡ Paling Privat
                        </span>
                    </div>

                    {{-- Background Accent --}}
                    <div class="absolute -bottom-16 -left-16 h-40 w-40 rounded-full bg-secondary-400/20 blur-3xl"></div>

                    {{-- Icon --}}
                    <div class="relative mb-5 sm:mb-6 h-12 w-12 sm:h-16 sm:w-16 rounded-2xl bg-gradient-to-br from-secondary-400/20 to-secondary-500/20 flex items-center justify-center text-secondary-400 border-2 border-secondary-400/30 shadow-lg mt-4">
                        <svg class="w-7 h-7 sm:w-8 sm:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"/>
                        </svg>
                    </div>

                    {{-- Badge --}}
                    <div class="relative mb-4">
                        <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-secondary-400/20 text-secondary-400 text-xs font-black uppercase tracking-wider border border-secondary-400/30">
                            Carter
                        </span>
                    </div>

                    {{-- Title & Description --}}
                    <div class="relative flex-grow space-y-4 mb-6">
                        <h3 class="text-xl sm:text-2xl font-black text-white">
                            Carter (Private)
                        </h3>
                        <p class="text-zinc-300 leading-relaxed font-medium">
                            Lebih privat dan fleksibel. Harga dihitung berdasarkan jumlah seat unit mobil yang Anda pilih, berapa pun jumlah penumpangnya.
                        </p>

                        {{-- Features List --}}
                        <ul class="space-y-3">
                            <li class="flex items-start gap-3">
                                <div class="flex-shrink-0 w-6 h-6 rounded-full bg-secondary-400/20 flex items-center justify-center mt-0.5">
                                    <svg class="w-4 h-4 text-secondary-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <div class="text-sm font-bold text-white">Harga Base x Seat</div>
                                    <div class="text-xs text-zinc-400 mt-0.5">Misal 6 seat = 6x harga reguler</div>
                                </div>
                            </li>
                            <li class="flex items-start gap-3">
                                <div class="flex-shrink-0 w-6 h-6 rounded-full bg-secondary-400/20 flex items-center justify-center mt-0.5">
                                    <svg class="w-4 h-4 text-secondary-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <div class="text-sm font-bold text-white">Mobil Full Unit</div>
                                    <div class="text-xs text-zinc-400 mt-0.5">1 unit untuk grup/keluarga</div>
                                </div>
                            </li>
                            <li class="flex items-start gap-3">
                                <div class="flex-shrink-0 w-6 h-6 rounded-full bg-secondary-400/20 flex items-center justify-center mt-0.5">
                                    <svg class="w-4 h-4 text-secondary-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <div class="text-sm font-bold text-white">Request Jam Jemput</div>
                                    <div class="text-xs text-zinc-400 mt-0.5">Lebih fleksibel waktu</div>
                                </div>
                            </li>
                            <li class="flex items-start gap-3">
                                <div class="flex-shrink-0 w-6 h-6 rounded-full bg-secondary-400/20 flex items-center justify-center mt-0.5">
                                    <svg class="w-4 h-4 text-secondary-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <div class="text-sm font-bold text-white">Drop atau PP</div>
                                    <div class="text-xs text-zinc-400 mt-0.5">Sekali jalan atau pulang pergi</div>
                                </div>
                            </li>
                        </ul>
                    </div>

                    {{-- CTA Button --}}
                    <div class="relative">
                        <x-ui.button href="{{ route('routes.index') }}" class="w-full py-2.5 sm:py-3 bg-gradient-to-r from-secondary-400 to-secondary-500 hover:from-secondary-500 hover:to-secondary-600 text-secondary-950 border-none font-black shadow-lg shadow-secondary-500/30">
                            Booking Carter Sekarang
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                            </svg>
                        </x-ui.button>
                    </div>
                </x-ui.card>
            </article>

            {{-- SERVICE 3: PAKET KILAT --}}
            <article class="group relative">
                <x-ui.card class="relative h-full flex flex-col p-6 sm:p-8 rounded-[2rem] border-2 border-zinc-100 hover:border-primary-300 group-hover:shadow-2xl group-hover:shadow-primary-600/10 transition-all duration-300 hover:-translate-y-2 overflow-hidden">
                    {{-- Background Accent --}}
                    <div class="absolute -top-16 -right-16 h-40 w-40 rounded-full bg-gradient-to-br from-primary-50 to-primary-100 group-hover:from-primary-100 group-hover:to-primary-200 transition-all duration-300 opacity-50"></div>

                    {{-- Icon --}}
                    <div class="relative mb-5 sm:mb-6 h-12 w-12 sm:h-16 sm:w-16 rounded-2xl bg-gradient-to-br from-primary-50 to-primary-100 flex items-center justify-center text-primary-600 group-hover:from-primary-600 group-hover:to-primary-700 group-hover:text-white transition-all duration-300 shadow-lg group-hover:shadow-xl group-hover:shadow-primary-600/30">
                        <svg class="w-7 h-7 sm:w-8 sm:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                    </div>

                    {{-- Badge --}}
                    <div class="relative mb-4">
                        <x-ui.badge variant="success" size="lg">Paket Kilat</x-ui.badge>
                    </div>

                    {{-- Title & Description --}}
                    <div class="relative flex-grow space-y-4 mb-6">
                        <h3 class="text-xl sm:text-2xl font-black text-zinc-900 group-hover:text-primary-700 transition-colors">
                            Paket Kilat
                        </h3>
                        <p class="text-zinc-600 leading-relaxed font-medium">
                            Kirim barang atau dokumen antar kota lebih cepat dengan layanan same day delivery. Harga setara 1 orang sekali jalan.
                        </p>

                        {{-- Features List --}}
                        <ul class="space-y-3">
                            <li class="flex items-start gap-3">
                                <div class="flex-shrink-0 w-6 h-6 rounded-full bg-emerald-100 flex items-center justify-center mt-0.5">
                                    <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <div class="text-sm font-bold text-zinc-900">Same Day Delivery</div>
                                    <div class="text-xs text-zinc-600 mt-0.5">Kirim pagi, sampai sore</div>
                                </div>
                            </li>
                            <li class="flex items-start gap-3">
                                <div class="flex-shrink-0 w-6 h-6 rounded-full bg-emerald-100 flex items-center justify-center mt-0.5">
                                    <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <div class="text-sm font-bold text-zinc-900">Data Lengkap</div>
                                    <div class="text-xs text-zinc-600 mt-0.5">Pengirim & penerima jelas</div>
                                </div>
                            </li>
                            <li class="flex items-start gap-3">
                                <div class="flex-shrink-0 w-6 h-6 rounded-full bg-emerald-100 flex items-center justify-center mt-0.5">
                                    <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <div class="text-sm font-bold text-zinc-900">Tracking Real-time</div>
                                    <div class="text-xs text-zinc-600 mt-0.5">Monitor via WhatsApp</div>
                                </div>
                            </li>
                            <li class="flex items-start gap-3">
                                <div class="flex-shrink-0 w-6 h-6 rounded-full bg-emerald-100 flex items-center justify-center mt-0.5">
                                    <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <div class="text-sm font-bold text-zinc-900">Aman Terpercaya</div>
                                    <div class="text-xs text-zinc-600 mt-0.5">Penanganan profesional</div>
                                </div>
                            </li>
                        </ul>
                    </div>

                    {{-- CTA Button --}}
                    <div class="relative">
                        <x-ui.button href="{{ route('routes.index') }}" class="text-white w-full py-2.5 sm:py-3 group-hover:shadow-xl transition-all">
                            Kirim Paket Sekarang
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                            </svg>
                        </x-ui.button>
                    </div>
                </x-ui.card>
            </article>
        </div>
    </section>

    {{-- COMPARISON TABLE --}}
    <section class="mb-14 sm:mb-20">
        <div class="text-center max-w-3xl mx-auto mb-10 sm:mb-12">
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-black tracking-tight text-zinc-900 mb-4">
                Perbandingan Layanan
            </h2>
            <p class="text-zinc-600 text-base sm:text-lg">Pilih yang paling sesuai dengan kebutuhan Anda</p>
        </div>

        <x-ui.card class="overflow-x-auto">
            <table class="w-full text-xs sm:text-sm">
                <thead>
                    <tr class="border-b-2 border-zinc-100">
                        <th class="text-left py-3 px-3 sm:py-4 sm:px-4 font-black text-zinc-900">Fitur</th>
                        <th class="text-center py-3 px-3 sm:py-4 sm:px-4 font-black text-primary-700">Reguler</th>
                        <th class="text-center py-3 px-3 sm:py-4 sm:px-4 font-black text-secondary-700">Carter</th>
                        <th class="text-center py-3 px-3 sm:py-4 sm:px-4 font-black text-primary-700">Paket Kilat</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-zinc-100">
                    <tr class="hover:bg-zinc-50 transition-colors">
                        <td class="py-3 px-3 sm:py-4 sm:px-4 font-bold text-zinc-900">Sistem Harga</td>
                        <td class="py-3 px-3 sm:py-4 sm:px-4 text-center text-zinc-700">Per orang</td>
                        <td class="py-3 px-3 sm:py-4 sm:px-4 text-center text-zinc-700">Per seat mobil</td>
                        <td class="py-3 px-3 sm:py-4 sm:px-4 text-center text-zinc-700">Flat rate</td>
                    </tr>
                    <tr class="hover:bg-zinc-50 transition-colors">
                        <td class="py-3 px-3 sm:py-4 sm:px-4 font-bold text-zinc-900">Privasi</td>
                        <td class="py-3 px-3 sm:py-4 sm:px-4 text-center text-zinc-700">Berbagi</td>
                        <td class="py-3 px-3 sm:py-4 sm:px-4 text-center text-zinc-700">Privat penuh</td>
                        <td class="py-3 px-3 sm:py-4 sm:px-4 text-center text-zinc-700">N/A</td>
                    </tr>
                    <tr class="hover:bg-zinc-50 transition-colors">
                        <td class="py-3 px-3 sm:py-4 sm:px-4 font-bold text-zinc-900">Atur Jam</td>
                        <td class="py-3 px-3 sm:py-4 sm:px-4 text-center">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 text-red-500 mx-auto" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                            </svg>
                        </td>
                        <td class="py-3 px-3 sm:py-4 sm:px-4 text-center">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 text-emerald-500 mx-auto" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                        </td>
                        <td class="py-3 px-3 sm:py-4 sm:px-4 text-center">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 text-red-500 mx-auto" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                            </svg>
                        </td>
                    </tr>
                    <tr class="hover:bg-zinc-50 transition-colors">
                        <td class="py-3 px-3 sm:py-4 sm:px-4 font-bold text-zinc-900">Drop/PP</td>
                        <td class="py-3 px-3 sm:py-4 sm:px-4 text-center">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 text-emerald-500 mx-auto" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                        </td>
                        <td class="py-3 px-3 sm:py-4 sm:px-4 text-center">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 text-emerald-500 mx-auto" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                        </td>
                        <td class="py-3 px-3 sm:py-4 sm:px-4 text-center text-zinc-700">Drop only</td>
                    </tr>
                    <tr class="hover:bg-zinc-50 transition-colors">
                        <td class="py-3 px-3 sm:py-4 sm:px-4 font-bold text-zinc-900">Cocok Untuk</td>
                        <td class="py-3 px-3 sm:py-4 sm:px-4 text-center text-zinc-700">Solo/duo</td>
                        <td class="py-3 px-3 sm:py-4 sm:px-4 text-center text-zinc-700">Grup/keluarga</td>
                        <td class="py-3 px-3 sm:py-4 sm:px-4 text-center text-zinc-700">Barang/dokumen</td>
                    </tr>
                </tbody>
            </table>
        </x-ui.card>
    </section>

    {{-- WHY CHOOSE US --}}
    <section class="mb-14 sm:mb-20">
        <div class="text-center max-w-3xl mx-auto mb-10 sm:mb-12">
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-black tracking-tight text-zinc-900 mb-4">
                Kenapa Pilih GT Trans?
            </h2>
            <p class="text-zinc-600 text-base sm:text-lg">
                Kami fokus pada kenyamanan, keamanan, dan kemudahan proses booking untuk setiap pelanggan.
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-5 sm:gap-6">
            <x-ui.card class="p-6 sm:p-8 border-2 border-zinc-100 hover:border-primary-200 hover:shadow-xl transition-all group">
                <div class="h-12 w-12 sm:h-14 sm:w-14 rounded-2xl bg-gradient-to-br from-primary-50 to-primary-100 flex items-center justify-center text-primary-600 mb-6 group-hover:from-primary-600 group-hover:to-primary-700 group-hover:text-white transition-all shadow-lg">
                    <svg class="w-4 h-4 sm:w-6 sm:h-6 sm:w-7 sm:h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <h3 class="text-lg sm:text-xl font-black text-zinc-900 mb-3 group-hover:text-primary-700 transition-colors">
                    Booking Super Cepat
                </h3>
                <p class="text-zinc-600 leading-relaxed font-medium">
                    Isi form booking online, data tersimpan otomatis, lalu langsung diarahkan ke chat WhatsApp admin untuk konfirmasi final.
                </p>
            </x-ui.card>

            <x-ui.card class="p-6 sm:p-8 border-2 border-zinc-100 hover:border-secondary-200 hover:shadow-xl transition-all group">
                <div class="h-12 w-12 sm:h-14 sm:w-14 rounded-2xl bg-gradient-to-br from-secondary-50 to-secondary-100 flex items-center justify-center text-secondary-600 mb-6 group-hover:from-secondary-400 group-hover:to-secondary-500 group-hover:text-secondary-950 transition-all shadow-lg">
                    <svg class="w-4 h-4 sm:w-6 sm:h-6 sm:w-7 sm:h-7" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                        <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <h3 class="text-lg sm:text-xl font-black text-zinc-900 mb-3 group-hover:text-secondary-700 transition-colors">
                    E-Ticket QR Digital
                </h3>
                <p class="text-zinc-600 leading-relaxed font-medium">
                    Dapatkan e-ticket dengan QR code yang dapat di-scan saat penjemputan. Lebih praktis, aman, dan modern tanpa perlu tiket fisik.
                </p>
            </x-ui.card>

            <x-ui.card class="p-6 sm:p-8 border-2 border-zinc-100 hover:border-primary-200 hover:shadow-xl transition-all group">
                <div class="h-12 w-12 sm:h-14 sm:w-14 rounded-2xl bg-gradient-to-br from-blue-50 to-blue-100 flex items-center justify-center text-blue-600 mb-6 group-hover:from-blue-600 group-hover:to-blue-700 group-hover:text-white transition-all shadow-lg">
                    <svg class="w-4 h-4 sm:w-6 sm:h-6 sm:w-7 sm:h-7" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <h3 class="text-lg sm:text-xl font-black text-zinc-900 mb-3 group-hover:text-blue-700 transition-colors">
                    Harga Transparan
                </h3>
                <p class="text-zinc-600 leading-relaxed font-medium">
                    Kalkulator otomatis menghitung subtotal real-time sesuai layanan, jumlah penumpang/seat, dan tipe perjalanan yang Anda pilih.
                </p>
            </x-ui.card>
        </div>
    </section>

    {{-- CTA SECTION --}}
    <section>
        <div class="relative bg-gradient-to-br from-primary-600 via-primary-700 to-secondary-500 rounded-[3rem] p-8 sm:p-10 md:p-20 overflow-hidden shadow-2xl shadow-primary-600/40 text-center">
            {{-- Background Pattern --}}
            <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/diagonal-stripes.png')] opacity-10"></div>
            <div class="absolute top-0 left-0 -mt-32 -ml-32 h-96 w-96 rounded-full bg-white/10 blur-[100px]"></div>
            <div class="absolute bottom-0 right-0 -mb-32 -mr-32 h-96 w-96 rounded-full bg-secondary-300/20 blur-[100px]"></div>
            
            {{-- Content --}}
            <div class="relative z-10 max-w-4xl mx-auto space-y-8">
                {{-- Badge --}}
                <div class="inline-flex items-center gap-2 px-4 py-1.5 sm:px-5 sm:py-2 rounded-full bg-white/20 border border-white/30 text-white text-xs sm:text-sm font-bold backdrop-blur-sm">
                    <svg class="w-4 h-4 sm:w-5 sm:h-5 animate-pulse" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"/>
                    </svg>
                    Siap Berangkat?
                </div>

                {{-- Heading --}}
                <h2 class="text-3xl sm:text-4xl md:text-5xl font-black tracking-tight text-white leading-tight">
                    Mulai Perjalanan Anda Sekarang
                </h2>
                
                {{-- Description --}}
                <p class="text-base sm:text-xl md:text-2xl text-primary-100 leading-relaxed max-w-3xl mx-auto font-medium">
                    Pilih rute, booking dalam hitungan menit, dan nikmati perjalanan yang aman & nyaman bersama GT Trans.
                </p>
                
                {{-- CTA Buttons --}}
                <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 justify-center pt-3 sm:pt-4">
                    <x-ui.button size="lg" href="{{ route('routes.index') }}" class="group bg-white text-primary-700 hover:bg-primary-50 border-none px-6 py-3 text-base sm:px-10 sm:py-5 sm:text-lg font-black shadow-2xl hover:shadow-3xl hover:scale-105 transition-all">
                        <svg class="w-4 h-4 sm:w-6 sm:h-6 mr-2 group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        Cari Rute & Booking
                    </x-ui.button>
                    <x-ui.button size="lg" variant="outline" href="{{ route('contact') }}" class="group border-2 border-white/40 text-white hover:bg-white/10 hover:border-white px-6 py-3 text-base sm:px-10 sm:py-5 sm:text-lg font-bold backdrop-blur-sm transition-all">
                        <svg class="w-4 h-4 sm:w-6 sm:h-6 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                        </svg>
                        Hubungi Admin
                    </x-ui.button>
                </div>
            </div>
        </div>
    </section>
@endsection