@extends('layouts.app')

@section('title', "Detail Booking #{$booking->booking_code}")
@section('meta_description', "Detail booking travel {$booking->fromCity->name} ke {$booking->toCity->name}. Cek status, jadwal, dan informasi pembayaran.")

@section('content')
    {{-- BREADCRUMB --}}
    <nav class="mb-6 sm:mb-8" aria-label="Breadcrumb">
        <ol class="flex items-center gap-1.5 sm:gap-2 text-xs sm:text-sm">
            <li>
                <a href="{{ route('home') }}" class="text-zinc-500 hover:text-primary-600 font-medium transition-colors">
                    <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                    </svg>
                </a>
            </li>
            <li class="text-zinc-300">/</li>
            <li>
                <a href="{{ route('routes.index') }}" class="text-zinc-500 hover:text-primary-600 font-medium transition-colors">
                    Rute
                </a>
            </li>
            <li class="text-zinc-300">/</li>
            <li class="text-zinc-900 font-bold">Booking #{{ $booking->booking_code }}</li>
        </ol>
    </nav>

    {{-- HEADER SECTION --}}
    <section class="mb-8 sm:mb-12">
        <div class="flex flex-col lg:flex-row items-start lg:items-center justify-between gap-4 sm:gap-6 pb-6 sm:pb-8 border-b-2 border-zinc-100">
            <div class="flex-1">
                <div class="flex items-center gap-3 mb-4">
                    @php
                        $statusColors = [
                            'new' => 'warning',
                            'departed1' => 'success',
                            'departed2' => 'success',
                            'cancelled' => 'danger',
                        ];
                        $statusLabels = [
                            'new' => 'Baru',
                            'departed1' => 'Berangkat',
                            'departed2' => 'Pulang',
                            'cancelled' => 'Dibatalkan',
                        ];
                    @endphp
                    <x-ui.badge variant="{{ $statusColors[$booking->status] ?? 'default' }}" size="lg">
                        {{ $statusLabels[$booking->status] ?? ucfirst($booking->status) }}
                    </x-ui.badge>
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 sm:px-3 sm:py-1.5 rounded-lg bg-primary-50 text-primary-700 text-xs font-bold border border-primary-200">
                        <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                        {{ $booking->service_type === 'regular' ? 'Reguler (Umum)' : ($booking->service_type === 'charter' ? 'Carter (Private)' : 'Paket Kilat') }}
                    </span>
                </div>
                
                <h1 class="text-2xl sm:text-3xl md:text-4xl font-black leading-tight text-zinc-900 tracking-tight mb-4">
                    Booking #{{ $booking->booking_code }}
                </h1>
                
                <div class="flex flex-wrap items-center gap-4">
                    <div class="flex items-center gap-2 text-zinc-600">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <span class="font-bold">{{ $booking->fromCity->name }}</span>
                    </div>
                    <svg class="w-5 h-5 sm:w-6 sm:h-6 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                    <div class="flex items-center gap-2 text-zinc-600">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <span class="font-bold">{{ $booking->toCity->name }}</span>
                    </div>
                </div>
            </div>

            <div class="flex-shrink-0 flex flex-wrap md:flex-nowrap gap-3">
                <x-ui.button size="lg" href="{{ route('routes.index') }}" variant="outline" class="group text-sm sm:text-base w-full md:w-auto">
                    <svg class="w-5 h-5 mr-2 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Kembali ke Rute
                </x-ui.button>
                
                <x-ui.button size="lg" class="text-white bg-emerald-600 hover:bg-emerald-700 border-none text-sm sm:text-base w-full md:w-auto group"
                    href="{{ route('public.booking.ticket', $booking->booking_code) }}?token={{ request('token') }}"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 mr-2 group-hover:-translate-x-1 transition-transform icon icon-tabler icons-tabler-outline icon-tabler-ticket"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 5l0 2" /><path d="M15 11l0 2" /><path d="M15 17l0 2" /><path d="M5 5h14a2 2 0 0 1 2 2v3a2 2 0 0 0 0 4v3a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-3a2 2 0 0 0 0 -4v-3a2 2 0 0 1 2 -2" /></svg>
                    Download E-ticket
                </x-ui.button>
            </div>
        </div>
    </section>

    {{-- MAIN CONTENT --}}
    <div class="grid lg:grid-cols-3 gap-8">
        {{-- LEFT COLUMN: Booking Details --}}
        <div class="lg:col-span-2 space-y-6">
            {{-- BOOKING INFORMATION --}}
            <x-ui.card :padding="false" class="overflow-hidden border-2 border-zinc-100">
                <div class="bg-gradient-to-r from-primary-50 to-emerald-50 px-4 py-4 sm:px-6 sm:py-5 border-b-2 border-primary-100">
                    <div class="flex items-center gap-3">
                        <div class="h-9 w-9 sm:h-10 sm:w-10 rounded-xl bg-primary-600 flex items-center justify-center text-white shadow-lg shadow-primary-600/30">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <h2 class="text-lg sm:text-xl font-black text-zinc-900">Detail Pemesanan</h2>
                    </div>
                </div>

                <div class="p-4 sm:p-6 space-y-5 sm:space-y-6">
                    {{-- Travel Info --}}
                    <div>
                        <h3 class="text-sm font-bold text-zinc-500 uppercase tracking-wider mb-4">Informasi Perjalanan</h3>
                        <div class="grid md:grid-cols-2 gap-4">
                            <div class="p-3 sm:p-4 rounded-xl bg-zinc-50 border border-zinc-200">
                                <div class="text-xs text-zinc-500 font-bold mb-1">Tanggal Berangkat</div>
                                <div class="text-base sm:text-lg font-black text-zinc-900">
                                    {{ \Carbon\Carbon::parse($booking->departure_date)->format('d M Y') }}
                                </div>
                            </div>
                            
                            @if($booking->return_date)
                                <div class="p-3 sm:p-4 rounded-xl bg-zinc-50 border border-zinc-200">
                                    <div class="text-xs text-zinc-500 font-bold mb-1">Tanggal Pulang</div>
                                    <div class="text-base sm:text-lg font-black text-zinc-900">
                                        {{ \Carbon\Carbon::parse($booking->return_date)->format('d M Y') }}
                                    </div>
                                </div>
                            @endif

                            @if($booking->service_type === 'charter' && $booking->pickup_time_request)
                                <div class="p-3 sm:p-4 rounded-xl bg-zinc-50 border border-zinc-200">
                                    <div class="text-xs text-zinc-500 font-bold mb-1">Jam Berangkat</div>
                                    <div class="text-base sm:text-lg font-black text-zinc-900">
                                        {{ $booking->pickup_time_request }}
                                    </div>
                                </div>
                            @endif

                            @if($booking->service_type === 'charter' && $booking->trip_type === 'pp' && $booking->return_time_request)
                                <div class="p-3 sm:p-4 rounded-xl bg-zinc-50 border border-zinc-200">
                                    <div class="text-xs text-zinc-500 font-bold mb-1">Jam Pulang</div>
                                    <div class="text-base sm:text-lg font-black text-zinc-900">
                                        {{ $booking->return_time_request }}
                                    </div>
                                </div>
                            @endif
                            
                            <div class="p-3 sm:p-4 rounded-xl bg-zinc-50 border border-zinc-200">
                                <div class="text-xs text-zinc-500 font-bold mb-1">Tipe Perjalanan</div>
                                <div class="text-sm sm:text-base font-bold text-zinc-900">
                                    {{ $booking->trip_type === 'pp' ? 'Pulang Pergi (PP)' : 'Sekali Jalan (Drop)' }}
                                </div>
                            </div>
                            
                            @if($booking->service_type === 'regular')
                                <div class="p-3 sm:p-4 rounded-xl bg-primary-50 border border-primary-200">
                                    <div class="text-xs text-primary-700 font-bold mb-1">Jumlah Penumpang</div>
                                    <div class="text-base sm:text-lg font-black text-primary-900">
                                        {{ $booking->passenger_count }} Orang
                                    </div>
                                </div>
                            @endif
                            
                            @if($booking->service_type === 'charter' && $booking->vehicle)
                                <div class="p-3 sm:p-4 rounded-xl bg-secondary-50 border border-secondary-200">
                                    <div class="text-xs text-secondary-700 font-bold mb-1">Unit Mobil</div>
                                    <div class="text-sm sm:text-base font-black text-secondary-900">
                                        {{ $booking->vehicle->name }}
                                    </div>
                                    <div class="text-xs text-secondary-700 mt-1">
                                        {{ $booking->vehicle->seat_count }} seat
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="border-t-2 border-zinc-100"></div>

                    {{-- Customer Info --}}
                    <div>
                        <h3 class="text-sm font-bold text-zinc-500 uppercase tracking-wider mb-4">Data Pemesan</h3>
                        <div class="grid md:grid-cols-2 gap-4">
                            <div class="p-3 sm:p-4 rounded-xl bg-zinc-50 border border-zinc-200">
                                <div class="text-xs text-zinc-500 font-bold mb-1">Nama Lengkap</div>
                                <div class="text-sm sm:text-base font-bold text-zinc-900">{{ $booking->customer_name }}</div>
                            </div>
                            <div class="p-3 sm:p-4 rounded-xl bg-zinc-50 border border-zinc-200">
                                <div class="text-xs text-zinc-500 font-bold mb-1">No WhatsApp</div>
                                <div class="text-sm sm:text-base font-bold text-zinc-900">{{ $booking->customer_whatsapp }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="border-t-2 border-zinc-100"></div>

                    {{-- Address Info --}}
                    <div>
                        <h3 class="text-sm font-bold text-zinc-500 uppercase tracking-wider mb-4">Alamat</h3>
                        <div class="grid md:grid-cols-2 gap-4">
                            <div class="p-3 sm:p-4 rounded-xl bg-blue-50 border border-blue-200">
                                <div class="flex items-center gap-2 mb-2">
                                    <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                    </svg>
                                    <div class="text-xs text-blue-700 font-bold">Alamat Penjemputan</div>
                                </div>
                                <div class="text-sm text-blue-900 leading-relaxed">{{ $booking->pickup_address }}</div>
                            </div>
                            <div class="p-3 sm:p-4 rounded-xl bg-emerald-50 border border-emerald-200">
                                <div class="flex items-center gap-2 mb-2">
                                    <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                    <div class="text-xs text-emerald-700 font-bold">Alamat Tujuan</div>
                                </div>
                                <div class="text-sm text-emerald-900 leading-relaxed">{{ $booking->destination_address }}</div>
                            </div>
                        </div>
                    </div>

                    @if($booking->baggage)
                        <div class="border-t-2 border-zinc-100"></div>
                        <div>
                            <h3 class="text-sm font-bold text-zinc-500 uppercase tracking-wider mb-3">Barang Bawaan</h3>
                            <div class="p-3 sm:p-4 rounded-xl bg-zinc-50 border border-zinc-200">
                                <div class="text-sm text-zinc-700">{{ $booking->baggage }}</div>
                            </div>
                        </div>
                    @endif

                    {{-- Express Package Details --}}
                    @if($booking->service_type === 'express')
                        <div class="border-t-2 border-zinc-100"></div>
                        <div>
                            <h3 class="text-sm font-bold text-zinc-500 uppercase tracking-wider mb-4">Detail Paket</h3>
                            <div class="space-y-3">
                                <div class="grid md:grid-cols-2 gap-4">
                                    <div class="p-3 sm:p-4 rounded-xl bg-zinc-50 border border-zinc-200">
                                        <div class="text-xs text-zinc-500 font-bold mb-1">Nama Penerima</div>
                                        <div class="text-sm sm:text-base font-bold text-zinc-900">{{ $booking->receiver_name }}</div>
                                    </div>
                                    <div class="p-3 sm:p-4 rounded-xl bg-zinc-50 border border-zinc-200">
                                        <div class="text-xs text-zinc-500 font-bold mb-1">WA Penerima</div>
                                        <div class="text-sm sm:text-base font-bold text-zinc-900">{{ $booking->receiver_whatsapp }}</div>
                                    </div>
                                </div>
                                @if($booking->package_type || $booking->package_weight_kg)
                                    <div class="grid md:grid-cols-2 gap-4">
                                        @if($booking->package_type)
                                            <div class="p-3 sm:p-4 rounded-xl bg-zinc-50 border border-zinc-200">
                                                <div class="text-xs text-zinc-500 font-bold mb-1">Jenis Barang</div>
                                                <div class="text-sm sm:text-base font-bold text-zinc-900">{{ $booking->package_type }}</div>
                                            </div>
                                        @endif
                                        @if($booking->package_weight_kg)
                                            <div class="p-3 sm:p-4 rounded-xl bg-zinc-50 border border-zinc-200">
                                                <div class="text-xs text-zinc-500 font-bold mb-1">Berat</div>
                                                <div class="text-sm sm:text-base font-bold text-zinc-900">{{ $booking->package_weight_kg }} kg</div>
                                            </div>
                                        @endif
                                        @if($booking->package_length_cm)
                                            <div class="p-3 sm:p-4 rounded-xl bg-zinc-50 border border-zinc-200">
                                                <div class="text-xs text-zinc-500 font-bold mb-1">Panjang</div>
                                                <div class="text-sm sm:text-base font-bold text-zinc-900">{{ $booking->package_length_cm }} cm</div>
                                            </div>
                                        @endif
                                        @if($booking->package_width_cm)
                                            <div class="p-3 sm:p-4 rounded-xl bg-zinc-50 border border-zinc-200">
                                                <div class="text-xs text-zinc-500 font-bold mb-1">Lebar</div>
                                                <div class="text-sm sm:text-base font-bold text-zinc-900">{{ $booking->package_width_cm }} cm</div>
                                            </div>
                                        @endif
                                        @if($booking->package_height_cm)
                                            <div class="p-3 sm:p-4 rounded-xl bg-zinc-50 border border-zinc-200">
                                                <div class="text-xs text-zinc-500 font-bold mb-1">Tinggi</div>
                                                <div class="text-sm sm:text-base font-bold text-zinc-900">{{ $booking->package_height_cm }} cm</div>
                                            </div>
                                        @endif
                                        @if($booking->package_content)
                                            <div class="p-3 sm:p-4 rounded-xl bg-zinc-50 border border-zinc-200">
                                                <div class="text-xs text-zinc-500 font-bold mb-1">Isi Paket</div>
                                                <div class="text-sm sm:text-base font-bold text-zinc-900">{{ $booking->package_content }}</div>
                                            </div>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif
                </div>
            </x-ui.card>

            {{-- TIMELINE / STATUS HISTORY --}}
            <x-ui.card>
                <div class="flex items-center gap-3 mb-6">
                    <div class="h-9 w-9 sm:h-10 sm:w-10 rounded-xl bg-secondary-100 flex items-center justify-center">
                        <svg class="w-6 h-6 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h2 class="text-lg sm:text-xl font-black text-zinc-900">Timeline Booking</h2>
                </div>

                <div class="space-y-3 sm:space-y-4">
                    <div class="flex gap-3 sm:gap-4">
                        <div class="flex flex-col items-center">
                            <div class="h-9 w-9 sm:h-10 sm:w-10 aspect-square shrink-0 rounded-full bg-emerald-100 flex items-center justify-center">
                                <svg class="w-5 h-5 text-emerald-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            @if($booking->status !== 'new')
                                <div class="w-0.5 flex-1 bg-zinc-200 mt-2"></div>
                            @endif
                        </div>
                        <div class="flex-1 pb-6">
                            <div class="text-sm font-black text-zinc-900">Booking Dibuat</div>
                            <div class="text-xs text-zinc-500 mt-1">
                                {{ $booking->created_at->format('d M Y, H:i') }} WIB
                            </div>
                        </div>
                    </div>

                    @if($booking->status === 'departed1' || $booking->status === 'departed2')
                        <div class="flex gap-3 sm:gap-4">
                            <div class="flex flex-col items-center">
                                <div class="h-9 w-9 sm:h-10 sm:w-10 aspect-square shrink-0 rounded-full bg-blue-100 flex items-center justify-center">
                                    <svg class="w-5 h-5 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                @if($booking->status === 'departed2')
                                    <div class="w-0.5 flex-1 bg-zinc-200 mt-2"></div>
                                @endif
                            </div>
                            <div class="flex-1 pb-6">
                                <div class="text-sm font-black text-zinc-900">Perjalanan Pertama Selesai</div>
                                <div class="text-xs text-zinc-500 mt-1">Terima kasih telah menggunakan GT Trans</div>
                            </div>
                        </div>
                    @endif

                    @if($booking->status === 'departed2')
                        <div class="flex gap-3 sm:gap-4">
                            <div class="flex flex-col items-center">
                                <div class="h-9 w-9 sm:h-10 sm:w-10 rounded-full bg-blue-100 flex items-center justify-center">
                                    <svg class="w-5 h-5 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="flex-1">
                                <div class="text-sm font-black text-zinc-900">Perjalanan Kedua Selesai</div>
                                <div class="text-xs text-zinc-500 mt-1">Terima kasih telah menggunakan GT Trans</div>
                            </div>
                        </div>
                    @endif

                    @if($booking->status === 'cancelled')
                        <div class="flex gap-3 sm:gap-4">
                            <div class="flex flex-col items-center">
                                <div class="h-9 w-9 sm:h-10 sm:w-10 rounded-full bg-red-100 flex items-center justify-center">
                                    <svg class="w-5 h-5 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="flex-1">
                                <div class="text-sm font-black text-zinc-900">Booking Dibatalkan</div>
                                <div class="text-xs text-zinc-500 mt-1">Booking telah dibatalkan</div>
                            </div>
                        </div>
                    @endif
                </div>
            </x-ui.card>
        </div>

        {{-- RIGHT SIDEBAR --}}
        <div class="lg:col-span-1 space-y-6">
            {{-- PRICE SUMMARY (Sticky) --}}
            <div class="lg:sticky lg:top-24 space-y-6">
                {{-- Total Price --}}
                <x-ui.card class="border-2 border-primary-200 bg-gradient-to-br from-primary-50 to-white">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="h-9 w-9 sm:h-10 sm:w-10 rounded-xl bg-primary-600 flex items-center justify-center text-white">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <h3 class="text-base sm:text-base sm:text-lg font-black text-zinc-900">Total Pembayaran</h3>
                    </div>

                    <div class="p-5 rounded-2xl bg-white border-2 border-primary-200">
                        <div class="text-xs text-zinc-500 font-bold uppercase tracking-wider mb-2">Total Tagihan</div>
                        <div class="text-3xl sm:text-4xl font-black text-primary-700 mb-3">
                            Rp {{ number_format($booking->subtotal, 0, ',', '.') }}
                        </div>
                        <div class="text-xs text-zinc-500">
                            *Harga final akan dikonfirmasi admin via WhatsApp
                        </div>
                    </div>

                    <div class="mt-4 text-xs text-zinc-600 leading-relaxed font-medium">
                        <strong>Note:</strong> Harga dapat berubah jika ada permintaan tambahan atau barang bawaan ekstra.
                    </div>
                </x-ui.card>

                {{-- QR Code / E-Ticket --}}
                @if($booking->status === 'confirmed' && $booking->qr_code_path)
                    <x-ui.card class="text-center border-2 border-secondary-200">
                        <div class="flex items-center justify-center gap-3 mb-4">
                            <div class="h-9 w-9 sm:h-10 sm:w-10 rounded-xl bg-secondary-400 flex items-center justify-center text-secondary-950">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"/>
                                </svg>
                            </div>
                            <h3 class="text-base sm:text-lg font-black text-zinc-900">E-Ticket QR</h3>
                        </div>

                        <div class="p-4 sm:p-6 rounded-2xl bg-white border-2 border-zinc-200 inline-block">
                            <img src="{{ asset('storage/' . $booking->qr_code_path) }}" 
                                 alt="QR Code Booking #{{ $booking->id }}" 
                                 class="w-40 h-40 sm:w-48 sm:h-48 mx-auto">
                        </div>

                        <div class="mt-4 p-3 sm:p-4 rounded-xl bg-secondary-50 border border-secondary-200">
                            <div class="text-xs text-secondary-800 font-medium leading-relaxed">
                                Tunjukkan QR code ini kepada driver saat penjemputan
                            </div>
                        </div>
                    </x-ui.card>
                @endif

                {{-- Action Buttons --}}
                <x-ui.card class="text-center">
                    <h3 class="text-base sm:text-lg font-black text-zinc-900 mb-4">Butuh Bantuan?</h3>
                    
                    @if($booking->status === 'pending')
                        <x-ui.button href="{{ $booking->whatsapp_url }}" target="_blank" class="w-full mb-3 bg-emerald-600 hover:bg-emerald-700 border-none">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                            </svg>
                            Konfirmasi Pembayaran
                        </x-ui.button>
                    @endif

                    <x-ui.button href="{{ route('contact') }}" variant="outline" class="w-full">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                        </svg>
                        Hubungi Customer Service
                    </x-ui.button>

                    <div class="mt-4 p-3 sm:p-4 rounded-xl bg-zinc-50 border border-zinc-200 text-left">
                        <div class="text-xs text-zinc-500 font-bold mb-2">Informasi Penting</div>
                        <ul class="text-xs text-zinc-600 space-y-1">
                            <li>• Simpan booking ID Anda</li>
                            <li>• Konfirmasi pembayaran via WhatsApp</li>
                            <li>• Tunjukkan QR code saat penjemputan</li>
                        </ul>
                    </div>
                </x-ui.card>
            </div>
        </div>
    </div>
@endsection