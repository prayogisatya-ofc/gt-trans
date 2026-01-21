@extends('layouts.app')

@section('title', 'Kontak GT Trans')
@section('meta_description', 'Kontak GT Trans. Hubungi admin via WhatsApp untuk booking, tanya rute, pembayaran, perubahan jadwal, dan informasi lainnya. Customer support 24/7.')

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
            <li class="text-zinc-900 font-bold">Kontak</li>
        </ol>
    </nav>

    {{-- HEADER SECTION --}}
    <section class="mb-12 sm:mb-16">
        <div class="grid lg:grid-cols-2 gap-8 sm:gap-12 items-center">
            {{-- Left Content --}}
            <div class="space-y-5 sm:space-y-6">
                <div>
                    <div class="inline-flex items-center gap-2 px-3 py-1.5 sm:px-4 sm:py-2 rounded-full bg-gradient-to-r from-primary-50 to-emerald-50 border border-primary-200 text-primary-700 text-sm font-bold mb-4 shadow-sm">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                        </svg>
                        Customer Support 24/7
                    </div>
                    
                    <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-black leading-[1.1] text-zinc-900 tracking-tight">
                        Hubungi Admin <br>
                        <span class="bg-clip-text text-transparent bg-gradient-to-r from-primary-600 to-primary-500">GT Trans</span>
                    </h1>
                </div>
                
                <p class="text-base sm:text-lg text-zinc-600 leading-relaxed max-w-xl">
                    Butuh bantuan booking, tanya rute, atau request layanan khusus? Tim customer support kami siap membantu Anda via WhatsApp dengan respon cepat dan informatif.
                </p>

                {{-- Stats --}}
                <div class="flex flex-wrap gap-4 sm:gap-6 pt-4">
                    <div class="flex items-center gap-3">
                        <div class="h-10 w-10 sm:h-12 sm:w-12 rounded-xl bg-emerald-100 flex items-center justify-center">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6 text-emerald-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div>
                            <div class="text-xl sm:text-2xl font-black text-zinc-900">&lt;5 Min</div>
                            <div class="text-xs font-bold text-zinc-500 uppercase tracking-wider">Avg. Response</div>
                        </div>
                    </div>
                    
                    <div class="flex items-center gap-3">
                        <div class="h-10 w-10 sm:h-12 sm:w-12 rounded-xl bg-primary-100 flex items-center justify-center">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6 text-primary-600" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z"/>
                                <path d="M15 7v2a4 4 0 01-4 4H9.828l-1.766 1.767c.28.149.599.233.938.233h2l3 3v-3h2a2 2 0 002-2V9a2 2 0 00-2-2h-1z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="text-xl sm:text-2xl font-black text-zinc-900">24/7</div>
                            <div class="text-xs font-bold text-zinc-500 uppercase tracking-wider">Available</div>
                        </div>
                    </div>
                </div>

                @php
                    $wa = $setting->getByKey('admin_whatsapp') ?? '628xxxxxxxxxx';
                    $waLink = 'https://wa.me/' . preg_replace('/[^0-9]/', '', $wa) . '?text=Halo%20GT%20Trans,%20saya%20ingin%20bertanya%20tentang%20';
                @endphp

                {{-- CTA Buttons --}}
                <div class="flex flex-col sm:flex-row flex-wrap gap-3 sm:gap-4 pt-4">
                    <x-ui.button size="lg" href="{{ $waLink }}" target="_blank" class="group text-white bg-gradient-to-r from-emerald-500 to-emerald-600 hover:from-emerald-600 hover:to-emerald-700 border-none shadow-xl shadow-emerald-600/30">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6 mr-2 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                        </svg>
                        Chat WhatsApp Admin
                    </x-ui.button>
                    <x-ui.button size="lg" variant="outline" href="{{ route('routes.index') }}" class="group">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6 mr-2 group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>
                        </svg>
                        Cari Rute Travel
                    </x-ui.button>
                </div>
            </div>

            {{-- Right Visual: Contact Card --}}
            <div class="relative">
                <div class="absolute -inset-4 bg-gradient-to-tr from-emerald-200/60 via-primary-200/40 to-blue-200/60 blur-3xl rounded-[3rem] opacity-60 animate-pulse"></div>
                
                <x-ui.card class="relative p-6 sm:p-8 border-none shadow-2xl shadow-zinc-300/50 rounded-[2rem] bg-white/95 backdrop-blur-md">
                    <div class="space-y-6">
                        {{-- WhatsApp Contact --}}
                        <div class="p-5 sm:p-6 rounded-2xl bg-gradient-to-br from-emerald-50 to-emerald-100 border-2 border-emerald-200">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="h-10 w-10 sm:h-12 sm:w-12 rounded-xl bg-emerald-600 flex items-center justify-center text-white shadow-lg shadow-emerald-600/30">
                                    <svg class="w-6 h-6 sm:w-7 sm:h-7" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <div class="text-sm font-bold text-emerald-800 uppercase tracking-wider">WhatsApp Admin</div>
                                    <div class="text-lg sm:text-xl font-black text-emerald-900">{{ $wa }}</div>
                                </div>
                            </div>
                            <a href="{{ $waLink }}" target="_blank" class="block w-full">
                                <x-ui.button class="w-full text-white bg-emerald-600 hover:bg-emerald-700 border-none shadow-lg group">
                                    Klik untuk Chat
                                    <svg class="w-4 h-4 sm:w-5 sm:h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                    </svg>
                                </x-ui.button>
                            </a>
                        </div>

                        {{-- Operating Hours --}}
                        <div class="p-5 sm:p-6 rounded-2xl bg-gradient-to-br from-primary-50 to-primary-100 border-2 border-primary-200">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="h-9 w-9 sm:h-10 sm:w-10 rounded-lg bg-primary-600 flex items-center justify-center text-white">
                                    <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <div class="text-sm font-bold text-primary-900">Jam Operasional</div>
                                </div>
                            </div>
                            <div class="space-y-2 text-sm">
                                <div class="flex items-center justify-between p-3 rounded-lg bg-white">
                                    <span class="text-zinc-600 font-medium">Senin - Minggu</span>
                                    <span class="text-primary-900 font-black">08:00 - 22:00</span>
                                </div>
                                <div class="text-xs text-primary-800 font-medium px-3">
                                    *Respon lebih cepat pada jam operasional
                                </div>
                            </div>
                        </div>

                        {{-- Quick Note --}}
                        <div class="p-4 sm:p-5 rounded-xl bg-secondary-50 border border-secondary-200">
                            <div class="flex items-start gap-3">
                                <svg class="w-4 h-4 sm:w-5 sm:h-5 text-secondary-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                </svg>
                                <div class="flex-1">
                                    <div class="text-sm font-bold text-secondary-900 mb-1">Auto Redirect</div>
                                    <div class="text-xs text-secondary-800 leading-relaxed">
                                        Setelah submit form booking, Anda akan otomatis diarahkan ke WhatsApp dengan detail pesanan lengkap.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </x-ui.card>
            </div>
        </div>
    </section>

    {{-- CONTACT REASONS SECTION --}}
    <section class="mb-12 sm:mb-16">
        <div class="text-center max-w-3xl mx-auto mb-10 sm:mb-12">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-primary-50 border border-primary-200 text-primary-700 text-sm font-bold mb-4">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                </svg>
                Topik Bantuan
            </div>
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-black tracking-tight text-zinc-900">
                Yang Bisa Kami Bantu
            </h2>
            <p class="text-zinc-600 text-base sm:text-lg mt-4">Hubungi kami untuk berbagai kebutuhan perjalanan Anda</p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
            {{-- Reason 1 --}}
            <a href="{{ $waLink }}booking" target="_blank" class="group">
                <x-ui.card class="h-full p-5 sm:p-6 border-2 border-zinc-100 hover:border-primary-300 hover:shadow-xl transition-all hover:-translate-y-1">
                    <div class="h-12 w-12 sm:h-14 sm:w-14 rounded-2xl bg-gradient-to-br from-primary-50 to-primary-100 flex items-center justify-center text-primary-600 mb-4 group-hover:from-primary-600 group-hover:to-primary-700 group-hover:text-white transition-all shadow-lg">
                        <svg class="w-6 h-6 sm:w-7 sm:h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                        </svg>
                    </div>
                    <h3 class="text-base sm:text-lg font-black text-zinc-900 mb-2 group-hover:text-primary-700 transition-colors">
                        Booking & Reservasi
                    </h3>
                    <p class="text-sm text-zinc-600 leading-relaxed font-medium mb-3">
                        Bantuan booking tiket, pilih rute, dan konfirmasi keberangkatan
                    </p>
                    <div class="flex items-center gap-2 text-primary-600 font-bold text-sm group-hover:gap-3 transition-all">
                        Chat Sekarang
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>
                    </div>
                </x-ui.card>
            </a>

            {{-- Reason 2 --}}
            <a href="{{ $waLink }}jadwal%20dan%20rute" target="_blank" class="group">
                <x-ui.card class="h-full p-5 sm:p-6 border-2 border-zinc-100 hover:border-secondary-300 hover:shadow-xl transition-all hover:-translate-y-1">
                    <div class="h-12 w-12 sm:h-14 sm:w-14 rounded-2xl bg-gradient-to-br from-secondary-50 to-secondary-100 flex items-center justify-center text-secondary-600 mb-4 group-hover:from-secondary-400 group-hover:to-secondary-500 group-hover:text-secondary-950 transition-all shadow-lg">
                        <svg class="w-6 h-6 sm:w-7 sm:h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>
                        </svg>
                    </div>
                    <h3 class="text-base sm:text-lg font-black text-zinc-900 mb-2 group-hover:text-secondary-700 transition-colors">
                        Jadwal & Rute
                    </h3>
                    <p class="text-sm text-zinc-600 leading-relaxed font-medium mb-3">
                        Tanya ketersediaan jadwal, rute baru, dan estimasi waktu tempuh
                    </p>
                    <div class="flex items-center gap-2 text-secondary-600 font-bold text-sm group-hover:gap-3 transition-all">
                        Chat Sekarang
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>
                    </div>
                </x-ui.card>
            </a>

            {{-- Reason 3 --}}
            <a href="{{ $waLink }}pembayaran" target="_blank" class="group">
                <x-ui.card class="h-full p-5 sm:p-6 border-2 border-zinc-100 hover:border-blue-300 hover:shadow-xl transition-all hover:-translate-y-1">
                    <div class="h-12 w-12 sm:h-14 sm:w-14 rounded-2xl bg-gradient-to-br from-blue-50 to-blue-100 flex items-center justify-center text-blue-600 mb-4 group-hover:from-blue-600 group-hover:to-blue-700 group-hover:text-white transition-all shadow-lg">
                        <svg class="w-6 h-6 sm:w-7 sm:h-7" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <h3 class="text-base sm:text-lg font-black text-zinc-900 mb-2 group-hover:text-blue-700 transition-colors">
                        Pembayaran
                    </h3>
                    <p class="text-sm text-zinc-600 leading-relaxed font-medium mb-3">
                        Konfirmasi transfer, QRIS, atau metode pembayaran lainnya
                    </p>
                    <div class="flex items-center gap-2 text-blue-600 font-bold text-sm group-hover:gap-3 transition-all">
                        Chat Sekarang
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>
                    </div>
                </x-ui.card>
            </a>

            {{-- Reason 4 --}}
            <a href="{{ $waLink }}perubahan%20atau%20pembatalan" target="_blank" class="group">
                <x-ui.card class="h-full p-5 sm:p-6 border-2 border-zinc-100 hover:border-red-300 hover:shadow-xl transition-all hover:-translate-y-1">
                    <div class="h-12 w-12 sm:h-14 sm:w-14 rounded-2xl bg-gradient-to-br from-red-50 to-red-100 flex items-center justify-center text-red-600 mb-4 group-hover:from-red-600 group-hover:to-red-700 group-hover:text-white transition-all shadow-lg">
                        <svg class="w-6 h-6 sm:w-7 sm:h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/>
                        </svg>
                    </div>
                    <h3 class="text-base sm:text-lg font-black text-zinc-900 mb-2 group-hover:text-red-700 transition-colors">
                        Ubah/Batal Tiket
                    </h3>
                    <p class="text-sm text-zinc-600 leading-relaxed font-medium mb-3">
                        Request perubahan jadwal atau pembatalan tiket sesuai ketentuan
                    </p>
                    <div class="flex items-center gap-2 text-red-600 font-bold text-sm group-hover:gap-3 transition-all">
                        Chat Sekarang
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>
                    </div>
                </x-ui.card>
            </a>
        </div>
    </section>

    {{-- SOCIAL MEDIA SECTION --}}
    <section class="mb-12 sm:mb-16">
        <div class="text-center max-w-3xl mx-auto mb-10 sm:mb-12">
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-black tracking-tight text-zinc-900 mb-4">
                Ikuti Sosial Media Kami
            </h2>
            <p class="text-zinc-600 text-base sm:text-lg">Dapatkan update promo, rute baru, dan tips perjalanan</p>
        </div>

        <x-ui.card class="p-6 sm:p-8 text-center">
            @if($socialLinks->count() > 0)
                <div class="flex flex-wrap justify-center gap-4">
                    @foreach($socialLinks as $s)
                        <a href="{{ $s->url }}" target="_blank" class="group">
                            <div class="px-4 py-3 sm:px-6 sm:py-4 rounded-2xl border-2 border-zinc-200 bg-zinc-50 hover:bg-primary-50 hover:border-primary-300 hover:shadow-lg transition-all hover:-translate-y-1 min-w-[130px] sm:min-w-[150px]">
                                <div class="text-base sm:text-lg font-black text-zinc-900 group-hover:text-primary-700 transition-colors mb-1">
                                    {{ ucfirst($s->platform) }}
                                </div>
                                <div class="text-xs text-zinc-500 font-medium">Ikuti kami</div>
                            </div>
                        </a>
                    @endforeach
                </div>
            @else
                <div class="py-12">
                    <div class="h-20 w-20 rounded-2xl bg-zinc-100 flex items-center justify-center text-zinc-400 mx-auto mb-4">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"/>
                        </svg>
                    </div>
                    <p class="text-zinc-500 font-medium">Sosial media sedang dalam pengembangan</p>
                </div>
            @endif
        </x-ui.card>
    </section>

    {{-- FAQ CTA SECTION --}}
    <section>
        <div class="relative bg-gradient-to-br from-primary-600 via-primary-700 to-secondary-500 rounded-[3rem] p-8 sm:p-10 md:p-16 overflow-hidden shadow-2xl shadow-primary-600/40">
            {{-- Background Pattern --}}
            <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/diagonal-stripes.png')] opacity-10"></div>
            <div class="absolute top-0 left-0 -mt-32 -ml-32 h-96 w-96 rounded-full bg-white/10 blur-[100px]"></div>
            <div class="absolute bottom-0 right-0 -mb-32 -mr-32 h-96 w-96 rounded-full bg-secondary-300/20 blur-[100px]"></div>
            
            {{-- Content --}}
            <div class="relative z-10 max-w-4xl mx-auto text-center">
                <div class="inline-flex items-center gap-2 px-4 py-1.5 sm:px-5 sm:py-2 rounded-full bg-white/20 border border-white/30 text-white text-sm font-bold backdrop-blur-sm mb-6">
                    <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Pertanyaan Umum
                </div>

                <h2 class="text-2xl sm:text-3xl md:text-4xl font-black text-white mb-4 leading-tight">
                    Cek FAQ Dulu, Yuk!
                </h2>
                
                <p class="text-base sm:text-lg text-primary-100 leading-relaxed font-medium mb-8 max-w-2xl mx-auto">
                    Mungkin pertanyaan Anda sudah terjawab di halaman FAQ kami. Cek dulu sebelum chat admin untuk info pembayaran, PP/drop, e-ticket, dan ketentuan pembatalan.
                </p>
                
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <x-ui.button href="{{ route('faq') }}" size="lg" class="bg-white text-primary-700 hover:text-white hover:bg-primary-50 border-none font-black shadow-2xl hover:scale-105 transition-all group">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6 mr-2 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        Buka Halaman FAQ
                    </x-ui.button>
                    
                    <x-ui.button href="{{ $waLink }}" target="_blank" variant="outline" size="lg" class="border-2 border-white/40 text-white hover:bg-white/10 hover:border-white font-bold backdrop-blur-sm transition-all">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6 mr-2" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                        </svg>
                        Langsung Chat Admin
                    </x-ui.button>
                </div>
            </div>
        </div>
    </section>
@endsection