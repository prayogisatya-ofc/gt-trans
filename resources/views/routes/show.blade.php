@extends('layouts.app')

@section('title', ($route->meta_title ?: "Travel {$route->cityA->name} - {$route->cityB->name}"))
@section('meta_description', ($route->meta_description ?: "Booking travel {$route->cityA->name} - {$route->cityB->name}. Reguler, Carter, Paket Kilat. Harga mulai Rp " . number_format($route->price_regular,0,',','.') . "."))

@section('content')
    {{-- POPUP ANNOUNCEMENT --}}
    @if(!empty($popup))
        <div
            x-data="gtAnnouncement('{{ $popup->id }}')"
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
                                        {{ $popup->title }}
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
                                    {!! $popup->content !!}
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

    @php
        // map seat_count untuk kalkulator Alpine
        $vehicleSeatMap = $vehicles->mapWithKeys(fn($v) => [(string)$v->id => (int)$v->seat_count])->toArray();
    @endphp

    {{-- BREADCRUMB --}}
    <nav class="mb-4 sm:mb-6" aria-label="Breadcrumb">
        <ol class="flex items-center gap-2 text-sm">
            <li>
                <a href="{{ route('home') }}" class="text-zinc-500 hover:text-primary-600 font-medium transition-colors">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
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
            <li class="text-zinc-900 font-bold">{{ $route->cityA->name }} - {{ $route->cityB->name }}</li>
        </ol>
    </nav>

    {{-- HEADER SECTION --}}
    <section class="mb-8 sm:mb-8 sm:mb-12">
        <div class="flex flex-col lg:flex-row items-start lg:items-center justify-between gap-4 sm:gap-6 pb-6 sm:pb-8 border-b-2 border-zinc-100">
            <div class="flex-1">
                <div class="flex items-center gap-3 mb-3 sm:mb-4">
                    <x-ui.badge variant="success" size="lg">
                        {{ $route->category?->name ?? 'Travel' }}
                    </x-ui.badge>
                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-secondary-50 text-secondary-700 text-xs font-bold border border-secondary-200">
                        <svg class="w-4 h-4 animate-pulse" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        Tersedia Hari Ini
                    </span>
                </div>
                
                <h1 class="text-2xl sm:text-2xl sm:text-3xl md:text-5xl font-black leading-tight text-zinc-900 tracking-tight mb-3 sm:mb-4">
                    {{ $route->cityA->name }} 
                    <span class="inline-flex items-center mx-2">
                        <svg class="w-5 sm:w-6 h-5 sm:h-6 sm:w-8 sm:h-8 md:w-9 sm:w-10 md:h-9 sm:h-10 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/>
                        </svg>
                    </span>
                    {{ $route->cityB->name }}
                </h1>
                
                <div class="flex flex-wrap items-center gap-4">
                    <div class="flex items-baseline gap-2">
                        <span class="text-sm font-bold text-zinc-500 uppercase tracking-wider">Harga Mulai</span>
                        <span class="text-2xl sm:text-2xl sm:text-3xl font-black text-primary-600">
                            Rp {{ number_format($route->price_regular,0,',','.') }}
                        </span>
                        <span class="text-sm font-bold text-zinc-500">/orang</span>
                    </div>
                </div>
            </div>

            <div class="flex-shrink-0">
                <x-ui.button size="lg" href="{{ route('routes.index') }}" variant="outline" class="group">
                    <svg class="w-5 h-5 mr-2 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Kembali ke Daftar Rute
                </x-ui.button>
            </div>
        </div>
    </section>

    {{-- MAIN CONTENT LAYOUT --}}
    <div
        class="grid lg:grid-cols-3 gap-4 sm:gap-6 sm:gap-8"
        x-data="{
            // MODAL STATE
            showBookingModal: false,
            hasReadRules: false,
            
            // TAB
            tab: 'regular',

            // ROUTE DIRECTION
            direction: 'AtoB',

            // TRIP
            tripType: 'drop',
            departure: '',
            ret: '',

            // CUSTOMER
            customerName: '',
            customerWhatsapp: '',

            // ADDRESS
            pickupAddress: '',
            destinationAddress: '',
            baggage: '',

            // REGULAR
            passengers: 1,

            // CHARTER
            vehicleId: '',
            pickupTimeRequest: '',
            returnTimeRequest: '',

            // EXPRESS
            receiverName: '',
            receiverWhatsapp: '',
            packageType: '',
            packageWeightKg: '',
            packageLengthCm: '',
            packageWidthCm: '',
            packageHeightCm: '',
            packageContent: '',

            // DATA SERVER
            basePrice: {{ (int)$route->price_regular }},
            vehicleSeats: @js($vehicleSeatMap),

            fromA: @js((string)$route->cityA->id),
            toB: @js((string)$route->cityB->id),

            // DERIVED city ids
            get fromCityId() { return this.direction === 'AtoB' ? this.fromA : this.toB },
            get toCityId() { return this.direction === 'AtoB' ? this.toB : this.fromA },

            get qtyUsed() {
                if (this.tab === 'regular') return Math.max(parseInt(this.passengers || 1), 1);
                if (this.tab === 'charter') {
                    const seats = this.vehicleSeats[this.vehicleId] || 0;
                    return Math.max(parseInt(seats || 0), 0);
                }
                return 1; // express
            },

            get multiplier() {
                if (this.tab === 'express') return 1;
                return this.tripType === 'pp' ? 2 : 1;
            },

            get subtotal() {
                return this.basePrice * this.qtyUsed * this.multiplier;
            },

            rupiah(n) {
                try { return new Intl.NumberFormat('id-ID').format(n || 0); }
                catch(e) { return n; }
            },

            get serviceLabel() {
                if (this.tab === 'regular') return 'Reguler';
                if (this.tab === 'charter') return 'Carter (Private)';
                return 'Paket Kilat';
            },

            get routeLabel() {
                return this.direction === 'AtoB'
                    ? '{{ $route->cityA->name }} → {{ $route->cityB->name }}'
                    : '{{ $route->cityB->name }} → {{ $route->cityA->name }}';
            },

            get formulaText() {
                if (this.tab === 'regular') return `Rp ${this.rupiah(this.basePrice)} x ${this.qtyUsed} penumpang x ${this.multiplier} jalan`;
                if (this.tab === 'charter') return `Rp ${this.rupiah(this.basePrice)} x ${this.qtyUsed} seat x ${this.multiplier} jalan`;
                return `Rp ${this.rupiah(this.basePrice)} x 1 paket`;
            },

            // VALIDATIONS
            get canSubmit() {
                if (!this.departure) return false;
                if (!this.customerName) return false;
                if (!this.customerWhatsapp) return false;
                if (!this.pickupAddress) return false;
                if (!this.destinationAddress) return false;

                if (this.tab === 'regular' && (!this.passengers || this.passengers < 1)) return false;
                if (this.tab === 'charter' && !this.vehicleId) return false;

                if (this.tab !== 'express' && this.tripType === 'pp' && !this.ret) return false;

                if (this.tab === 'express' && (!this.receiverName || !this.receiverWhatsapp)) return false;

                return true;
            },

            // RESET ketika pindah tab
            resetAll() {
                this.direction = 'AtoB';
                this.tripType = 'drop';
                this.departure = '';
                this.ret = '';
                this.customerName = '';
                this.customerWhatsapp = '';
                this.pickupAddress = '';
                this.destinationAddress = '';
                this.baggage = '';
                this.passengers = 1;
                this.vehicleId = '';
                this.pickupTimeRequest = '';
                this.returnTimeRequest = '';
                this.receiverName = '';
                this.receiverWhatsapp = '';
                this.packageType = '';
                this.packageWeightKg = '';
                this.packageLengthCm = '';
                this.packageWidthCm = '';
                this.packageHeightCm = '';
                this.packageContent = '';
            },

            setTab(nextTab) {
                this.resetAll();
                this.tab = nextTab;
                if (nextTab === 'express') {
                    this.tripType = 'drop';
                    this.ret = '';
                }
            },

            onTripTypeChange() {
                if (this.tripType !== 'pp') {
                    this.ret = '';
                    this.returnTimeRequest = '';
                }
            },
            
            openBookingModal() {
                if (!this.hasReadRules) {
                    alert('⚠️ Harap baca dan centang persetujuan peraturan terlebih dahulu!');
                    // Scroll to rules section
                    document.getElementById('rules-section').scrollIntoView({ behavior: 'smooth', block: 'center' });
                    return;
                }
                this.showBookingModal = true;
            },
        }"
    >
        {{-- LEFT COLUMN: Route Details & Rules --}}
        <div class="lg:col-span-2 space-y-6 sm:space-y-8">
            {{-- ROUTE DETAILS CARD --}}
            <x-ui.card :padding="false" class="overflow-hidden">
                <div class="relative p-5 sm:p-8 bg-gradient-to-br from-primary-50 via-white to-white">
                    <div class="absolute top-0 right-0 -mt-10 -mr-10 h-40 w-40 rounded-full bg-primary-200/40 blur-3xl"></div>
                    
                    <div class="relative">
                        <div class="flex items-center gap-3 mb-5 sm:mb-6">
                            <div class="h-10 w-10 sm:h-12 sm:w-12 rounded-xl bg-primary-600 flex items-center justify-center text-white shadow-lg shadow-primary-600/30">
                                <svg class="w-6 h-6 sm:w-7 sm:h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <h2 class="text-xl sm:text-2xl font-black text-zinc-900">Detail Rute</h2>
                        </div>

                        {{-- Default Description --}}
                        <div class="prose prose-sm max-w-none mb-5 sm:mb-6">
                            <p class="text-zinc-700 leading-relaxed font-medium">
                                Layanan travel {{ $route->cityA->name }} - {{ $route->cityB->name }} tersedia setiap hari dengan armada yang nyaman dan driver berpengalaman. Kami menyediakan tiga pilihan layanan: <strong class="text-primary-700">Travel Reguler</strong> (sistem per kursi), <strong class="text-secondary-700">Carter Private</strong> (sewa 1 mobil penuh), dan <strong class="text-primary-700">Paket Kilat</strong> (pengiriman barang same day).
                            </p>
                        </div>

                        {{-- Additional Notes (if exists) --}}
                        @if($route->notes)
                            <div class="mb-5 sm:mb-5 sm:mb-6 p-4 sm:p-4 sm:p-5 rounded-2xl bg-secondary-50 border-2 border-secondary-200">
                                <div class="flex items-start gap-3">
                                    <svg class="w-5 h-5 sm:w-6 sm:h-6 text-secondary-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                    </svg>
                                    <div class="flex-1">
                                        <div class="text-sm font-black text-secondary-800 uppercase tracking-wider mb-2">Catatan Tambahan</div>
                                        <div class="text-sm text-secondary-900 leading-relaxed font-medium">
                                            {!! $route->notes !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        {{-- DEFAULT FACILITIES --}}
                        <div>
                            <div class="text-sm font-black text-zinc-900 uppercase tracking-wider mb-3 sm:mb-4">Fasilitas Standar</div>
                            <div class="grid sm:grid-cols-3 gap-4">
                                {{-- Facility 1 --}}
                                <div class="flex items-start gap-3 p-3 sm:p-4 rounded-xl bg-white border-2 border-zinc-100 hover:border-primary-200 hover:shadow-lg transition-all">
                                    <div class="h-9 w-9 sm:h-10 sm:w-10 rounded-lg bg-blue-100 flex items-center justify-center flex-shrink-0">
                                        <svg class="w-5 h-5 sm:w-6 sm:h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                                        </svg>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <div class="text-sm font-bold text-zinc-900">Air Mineral</div>
                                        <div class="text-xs text-zinc-600 mt-0.5">Gratis setiap penumpang</div>
                                    </div>
                                </div>

                                {{-- Facility 2 --}}
                                <div class="flex items-start gap-3 p-3 sm:p-4 rounded-xl bg-white border-2 border-zinc-100 hover:border-primary-200 hover:shadow-lg transition-all">
                                    <div class="h-9 w-9 sm:h-10 sm:w-10 rounded-lg bg-emerald-100 flex items-center justify-center flex-shrink-0">
                                        <svg class="w-5 h-5 sm:w-6 sm:h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <div class="text-sm font-bold text-zinc-900">Makan 1x</div>
                                        <div class="text-xs text-zinc-600 mt-0.5">Prasmanan di rest area</div>
                                    </div>
                                </div>

                                {{-- Facility 3 --}}
                                <div class="flex items-start gap-3 p-3 sm:p-4 rounded-xl bg-white border-2 border-zinc-100 hover:border-primary-200 hover:shadow-lg transition-all">
                                    <div class="h-9 w-9 sm:h-10 sm:w-10 rounded-lg bg-purple-100 flex items-center justify-center flex-shrink-0">
                                        <svg class="w-5 h-5 sm:w-6 sm:h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                                        </svg>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <div class="text-sm font-bold text-zinc-900">Door to Door</div>
                                        <div class="text-xs text-zinc-600 mt-0.5">Antar jemput alamat</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </x-ui.card>

            {{-- IMPORTANT RULES SECTION (MUST READ) --}}
            <div id="rules-section">
                <x-ui.card :padding="false" class="overflow-hidden border-2 border-red-200">
                    <div class="bg-gradient-to-r from-red-50 to-orange-50 px-5 sm:px-8 py-4 sm:py-6 border-b-2 border-red-200">
                        <div class="flex items-center gap-3">
                            <div class="h-10 w-10 sm:h-12 sm:w-12 rounded-xl bg-red-600 flex items-center justify-center text-white shadow-lg shadow-red-600/30 animate-pulse">
                                <svg class="w-6 h-6 sm:w-7 sm:h-7" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h2 class="text-xl sm:text-2xl font-black text-red-900">Peraturan Wajib Dibaca</h2>
                                <p class="text-sm text-red-700 font-bold mt-1">Harap baca dengan teliti sebelum melakukan pemesanan</p>
                            </div>
                        </div>
                    </div>

                    <div class="p-5 sm:p-8 space-y-6 sm:space-y-8">
                        {{-- Important Notes --}}
                        <article>
                            <div class="flex items-center gap-3 mb-3 sm:mb-4">
                                <div class="h-9 w-9 sm:h-10 sm:w-10 rounded-lg bg-red-100 flex items-center justify-center">
                                    <span class="text-red-600 font-black text-base sm:text-lg">1</span>
                                </div>
                                <h3 class="text-lg sm:text-xl font-black text-zinc-900">Catatan Penting</h3>
                            </div>
                            <div class="ml-13 prose prose-sm max-w-none text-zinc-700 leading-relaxed" id="important-note-content">
                                {!! $routeInfo['important_note'] !!}
                            </div>
                        </article>

                        <div class="border-t-2 border-zinc-100"></div>

                        {{-- Booking Guide --}}
                        <article>
                            <div class="flex items-center gap-3 mb-3 sm:mb-4">
                                <div class="h-9 w-9 sm:h-10 sm:w-10 rounded-lg bg-blue-100 flex items-center justify-center">
                                    <span class="text-blue-600 font-black text-base sm:text-lg">2</span>
                                </div>
                                <h3 class="text-lg sm:text-xl font-black text-zinc-900">Cara Pemesanan</h3>
                            </div>
                            <div class="ml-13 prose prose-sm max-w-none text-zinc-700 leading-relaxed" id="booking-guide-content">
                                {!! $routeInfo['booking_guide'] !!}
                            </div>
                        </article>

                        <div class="border-t-2 border-zinc-100"></div>

                        {{-- Cancellation Policy --}}
                        <article>
                            <div class="flex items-center gap-3 mb-3 sm:mb-4">
                                <div class="h-9 w-9 sm:h-10 sm:w-10 rounded-lg bg-orange-100 flex items-center justify-center">
                                    <span class="text-orange-600 font-black text-base sm:text-lg">3</span>
                                </div>
                                <h3 class="text-lg sm:text-xl font-black text-zinc-900">Ketentuan Pembatalan & Perubahan</h3>
                            </div>
                            <div class="ml-13 prose prose-sm max-w-none text-zinc-700 leading-relaxed" id="cancellation-policy-content">
                                {!! $routeInfo['cancellation_policy'] !!}
                            </div>
                        </article>

                        {{-- Agreement Checkbox --}}
                        <div class="mt-8 p-4 sm:p-4 sm:p-6 rounded-2xl bg-gradient-to-br from-primary-50 to-emerald-50 border-2 border-primary-200">
                            <label class="flex items-start gap-4 cursor-pointer group">
                                <div class="inline-flex items-center">
                                    <label class="flex items-center cursor-pointer relative">
                                        <input type="checkbox" x-model="hasReadRules" class="peer h-5 w-5 cursor-pointer transition-all appearance-none rounded border border-primary-500 checked:bg-primary-600 checked:border-primary-600" id="check" />
                                        <span class="absolute text-white opacity-0 peer-checked:opacity-100 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 20 20" fill="currentColor" stroke="currentColor" stroke-width="1">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                            </svg>
                                        </span>
                                    </label> 
                                </div> 
                                <div class="flex-1">
                                    <div class="text-sm sm:text-base font-black text-primary-900 group-hover:text-primary-700 transition-colors">
                                        Saya telah membaca dan menyetujui semua peraturan di atas
                                    </div>
                                    <div class="text-xs sm:text-sm text-primary-800 mt-1 font-medium">
                                        Dengan mencentang kotak ini, Anda menyatakan telah memahami dan menyetujui seluruh ketentuan yang berlaku.
                                    </div>
                                </div>
                            </label>
                        </div>
                    </div>
                </x-ui.card>
            </div>

            {{-- CTA BOOKING BUTTON --}}
            <div class="sticky bottom-4 sm:bottom-6 z-30">
                <div class="rounded-2xl bg-gradient-to-r from-primary-600 to-primary-700 p-4 sm:p-6 shadow-2xl shadow-primary-600/40 border-2 border-primary-500">
                    <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                        <div class="text-center sm:text-left">
                            <div class="text-white text-lg sm:text-xl font-black mb-1">Siap Untuk Booking?</div>
                            <div class="text-primary-100 text-sm font-medium">
                                <span x-show="!hasReadRules">Centang persetujuan peraturan terlebih dahulu</span>
                                <span x-show="hasReadRules" class="flex items-center gap-2">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    Anda sudah menyetujui peraturan
                                </span>
                            </div>
                        </div>
                        <button 
                            @click="openBookingModal()"
                            :disabled="!hasReadRules"
                            :class="hasReadRules ? 'bg-white text-primary-700 hover:bg-primary-50 shadow-xl hover:scale-105 cursor-pointer' : 'bg-white/20 text-white/50 cursor-not-allowed'"
                            class="group px-6 py-3 sm:px-8 sm:py-4 rounded-xl font-black text-base sm:text-lg transition-all duration-300 flex items-center gap-2 whitespace-nowrap">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6" :class="hasReadRules ? 'group-hover:scale-110' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                            </svg>
                            <span x-text="hasReadRules ? 'Lanjut Booking' : 'Baca Peraturan Dulu'"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- RIGHT SIDEBAR: Payment Methods & Price Summary --}}
        <div class="lg:col-span-1 space-y-5 sm:space-y-6">
            {{-- PRICE SUMMARY (Sticky) --}}
            <div class="lg:sticky lg:top-24 space-y-5 sm:space-y-6">
                {{-- Realtime Price Summary --}}
                <x-ui.card class="relative overflow-hidden border-2 border-primary-200">
                    <div class="absolute -top-14 -right-14 h-40 w-40 rounded-full bg-primary-200/60 blur-3xl animate-pulse"></div>

                    <div class="relative">
                        <div class="flex items-center justify-between gap-3 mb-5 sm:mb-6">
                            <h3 class="text-base sm:text-lg font-black text-zinc-900">Ringkasan Harga</h3>
                            <x-ui.badge variant="success" dot>Realtime</x-ui.badge>
                        </div>

                        <div class="space-y-4">
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-zinc-600 font-medium">Layanan</span>
                                <span class="font-bold text-zinc-900" x-text="serviceLabel"></span>
                            </div>

                            <div class="flex items-center justify-between text-sm">
                                <span class="text-zinc-600 font-medium">Arah Rute</span>
                                <span class="font-bold text-zinc-900 text-right text-xs" x-text="routeLabel"></span>
                            </div>

                            <div class="flex items-center justify-between text-sm" x-show="tab !== 'express'">
                                <span class="text-zinc-600 font-medium">Tipe Trip</span>
                                <span class="font-bold text-zinc-900" x-text="tripType.toUpperCase()"></span>
                            </div>

                            <div class="border-t-2 border-zinc-100 pt-4">
                                <div class="p-3 sm:p-4 rounded-xl bg-gradient-to-br from-primary-50 to-emerald-50 border border-primary-200">
                                    <div class="text-xs text-primary-700 font-bold uppercase tracking-wider mb-1">Harga Dasar</div>
                                    <div class="text-base sm:text-lg font-black text-primary-900">
                                        Rp {{ number_format($route->price_regular,0,',','.') }}
                                    </div>
                                </div>
                            </div>

                            <div class="p-4 sm:p-5 rounded-2xl bg-zinc-50 border-2 border-zinc-200">
                                <div class="text-xs text-zinc-500 font-bold mb-2">Rumus Perhitungan:</div>
                                <div class="text-sm font-semibold text-zinc-800 mb-4" x-text="formulaText"></div>

                                <div class="flex items-baseline justify-between">
                                    <span class="text-sm text-zinc-600 font-bold">Subtotal Estimasi</span>
                                    <div class="text-right">
                                        <div class="text-xl sm:text-2xl font-black text-primary-600">
                                            Rp <span x-text="rupiah(subtotal)"></span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="mt-3 text-xs text-zinc-500 leading-relaxed">
                                    *Harga dapat berubah jika ada permintaan khusus atau barang tambahan.
                                </div>
                            </div>

                            <div class="grid grid-cols-2 gap-3">
                                <div class="p-3 rounded-xl bg-white border border-zinc-200 text-center">
                                    <div class="text-xs text-zinc-500 font-bold">Tiket</div>
                                    <div class="text-sm font-black text-zinc-900 mt-1">QR Code</div>
                                </div>
                                <div class="p-3 rounded-xl bg-white border border-zinc-200 text-center">
                                    <div class="text-xs text-zinc-500 font-bold">E-Ticket</div>
                                    <div class="text-sm font-black text-zinc-900 mt-1">Instan</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </x-ui.card>

                {{-- PAYMENT METHODS --}}
                <x-ui.card>
                    <div class="flex items-center gap-3 mb-5">
                        <div class="h-9 w-9 sm:h-10 sm:w-10 rounded-lg bg-secondary-100 flex items-center justify-center">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-base sm:text-lg font-black text-zinc-900">Metode Pembayaran</h3>
                            <p class="text-xs text-zinc-500 font-medium">Pilihan pembayaran tersedia</p>
                        </div>
                    </div>

                    <div class="space-y-3">
                        @forelse($paymentMethods as $pm)
                            <div class="p-3 sm:p-4 rounded-xl border-2 border-zinc-100 bg-white hover:border-primary-200 hover:shadow-md transition-all">
                                <div class="flex items-start justify-between gap-3 mb-2">
                                    <div class="font-bold text-zinc-900 text-sm flex-1">{{ $pm->name }}</div>
                                    <x-ui.badge variant="{{ $pm->type === 'qris' ? 'warning' : 'default' }}" size="sm">
                                        {{ strtoupper(str_replace('_', ' ', $pm->type)) }}
                                    </x-ui.badge>
                                </div>

                                @if($pm->description)
                                    <div class="text-xs text-zinc-600 mb-2">{{ $pm->description }}</div>
                                @endif

                                @if($pm->type === 'bank_transfer')
                                    <div class="mt-2 p-3 rounded-lg bg-zinc-50 text-xs space-y-1">
                                        <div class="flex justify-between">
                                            <span class="text-zinc-500">Bank:</span>
                                            <span class="font-bold text-zinc-900">{{ $pm->bank_name }}</span>
                                        </div>
                                        <div class="flex justify-between">
                                            <span class="text-zinc-500">No Rek:</span>
                                            <span class="font-bold text-zinc-900">{{ $pm->account_number }}</span>
                                        </div>
                                        <div class="flex justify-between">
                                            <span class="text-zinc-500">a.n:</span>
                                            <span class="font-bold text-zinc-900">{{ $pm->account_name }}</span>
                                        </div>
                                    </div>
                                @endif

                                @if($pm->type === 'qris' && $pm->qris_image_path)
                                    <div class="mt-3">
                                        <img class="rounded-lg border-2 border-zinc-200 w-full" 
                                             src="{{ asset('storage/'.$pm->qris_image_path) }}" 
                                             alt="QRIS {{ $pm->name }}">
                                    </div>
                                @endif
                            </div>
                        @empty
                            <div class="p-4 text-center text-sm text-zinc-500 italic rounded-xl bg-zinc-50 border border-dashed border-zinc-200">
                                Metode pembayaran belum diatur
                            </div>
                        @endforelse
                    </div>
                </x-ui.card>
            </div>
        </div>
        
        {{-- BOOKING MODAL (Form) --}}
        <div
            x-show="showBookingModal"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-50 flex items-center justify-center p-4"
            x-cloak
            @keydown.escape.window="showBookingModal = false"
        >
            {{-- Backdrop --}}
            <div class="absolute inset-0 bg-zinc-900/70 backdrop-blur-sm" @click="showBookingModal = false"></div>
    
            {{-- Modal Content --}}
            <div 
                class="relative w-full max-w-5xl max-h-[92vh] sm:max-h-[90vh] overflow-y-auto rounded-2xl sm:rounded-3xl bg-white shadow-2xl border-2 border-zinc-100"
                @click.stop
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-95 -translate-y-4"
                x-transition:enter-end="opacity-100 scale-100 translate-y-0">
                
                {{-- Modal Header --}}
                <div class="sticky top-0 z-10 bg-gradient-to-r from-primary-600 to-primary-700 px-5 sm:px-8 py-4 sm:py-6 border-b-2 border-primary-500">
                    <div class="flex items-start justify-between gap-4">
                        <div class="flex-1">
                            <h2 class="text-xl sm:text-2xl font-black text-white mb-1">Form Booking Travel</h2>
                            <p class="text-primary-100 text-sm font-medium">
                                Isi data lengkap. Setelah submit, Anda akan diarahkan ke WhatsApp admin untuk konfirmasi.
                            </p>
                        </div>
                        <button 
                            type="button"
                            @click="showBookingModal = false"
                            class="flex-shrink-0 rounded-xl p-2 text-white hover:bg-white/20 transition-all focus:outline-none focus:ring-4 focus:ring-white/30">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                </div>
    
                {{-- Modal Body --}}
                <div class="p-5 sm:p-8">
                    {{-- Service Tabs --}}
                    <div class="flex flex-wrap gap-2 sm:gap-3 mb-6 sm:mb-6 sm:mb-8 p-1 bg-zinc-100 rounded-2xl">
                        <button type="button"
                            class="flex-1 px-4 py-2.5 sm:px-4 sm:px-6 sm:py-2.5 sm:py-3 rounded-xl text-sm font-black transition-all"
                            :class="tab==='regular' ? 'bg-primary-600 text-white shadow-lg shadow-primary-600/30' : 'bg-transparent text-zinc-700 hover:bg-white'"
                            @click="setTab('regular')">
                            <svg class="w-5 h-5 mx-auto mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                            Travel Reguler
                        </button>
    
                        <button type="button"
                            class="flex-1 px-4 py-2.5 sm:px-4 sm:px-6 sm:py-2.5 sm:py-3 rounded-xl text-sm font-black transition-all"
                            :class="tab==='charter' ? 'bg-secondary-400 text-secondary-950 shadow-lg shadow-secondary-400/30' : 'bg-transparent text-zinc-700 hover:bg-white'"
                            @click="setTab('charter')">
                            <svg class="w-5 h-5 mx-auto mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"/>
                            </svg>
                            Carter Private
                        </button>
    
                        <button type="button"
                            class="flex-1 px-4 py-2.5 sm:px-4 sm:px-6 sm:py-2.5 sm:py-3 rounded-xl text-sm font-black transition-all"
                            :class="tab==='express' ? 'bg-primary-600 text-white shadow-lg shadow-primary-600/30' : 'bg-transparent text-zinc-700 hover:bg-white'"
                            @click="setTab('express')">
                            <svg class="w-5 h-5 mx-auto mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                            </svg>
                            Paket Kilat
                        </button>
                    </div>
    
                    {{-- BOOKING FORM --}}
                    <form action="{{ route('booking.store') }}" method="POST" class="space-y-5 sm:space-y-6">
                        @csrf
                        <input type="hidden" name="route_id" value="{{ $route->id }}">
                        <input type="hidden" name="service_type" :value="tab">
                        <input type="hidden" name="from_city_id" :value="fromCityId">
                        <input type="hidden" name="to_city_id" :value="toCityId">
    
                        {{-- Direction & Preview --}}
                        <div class="grid md:grid-cols-2 gap-4 sm:gap-6">
                            <x-ui.select
                                label="Arah Perjalanan"
                                name="direction"
                                x-model="direction"
                                required
                                helperText="Pilih dari kota mana Anda berangkat"
                            >
                                <option value="AtoB">{{ $route->cityA->name }} → {{ $route->cityB->name }}</option>
                                <option value="BtoA">{{ $route->cityB->name }} → {{ $route->cityA->name }}</option>
                            </x-ui.select>
    
                            <div class="p-4 sm:p-5 rounded-2xl bg-gradient-to-br from-zinc-50 to-zinc-100 border-2 border-zinc-200">
                                <div class="text-xs text-zinc-500 font-bold uppercase tracking-wider mb-2">Preview Rute Anda</div>
                                <div class="text-base sm:text-lg font-black text-zinc-900" x-text="routeLabel"></div>
                                <div class="text-xs text-zinc-500 mt-1">Dua arah rute dianggap sama</div>
                            </div>
                        </div>
    
                        {{-- Dates --}}
                        <div class="grid md:grid-cols-2 gap-4 sm:gap-6">
                            <x-ui.input
                                name="departure_date"
                                type="date"
                                label="Tanggal Berangkat"
                                x-model="departure"
                                required
                            />
    
                            <div x-show="tab !== 'express'" x-transition>
                                <x-ui.select
                                    name="trip_type"
                                    label="Tipe Perjalanan"
                                    x-model="tripType"
                                    @change="onTripTypeChange()"
                                >
                                    <option value="drop">Drop (Sekali Jalan)</option>
                                    <option value="pp">PP (Pulang Pergi)</option>
                                </x-ui.select>
                            </div>
                        </div>
    
                        {{-- Return Date (PP only) --}}
                        <div x-show="tab !== 'express' && tripType === 'pp'" x-transition class="grid md:grid-cols-2 gap-4 sm:gap-6">
                            <x-ui.input
                                name="return_date"
                                type="date"
                                label="Tanggal Pulang"
                                x-model="ret"
                            />
                            <div class="p-3 sm:p-4 rounded-xl bg-primary-50 border-2 border-primary-200">
                                <div class="flex items-start gap-2">
                                    <svg class="w-5 h-5 text-primary-600 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                    </svg>
                                    <div class="text-xs text-primary-800 font-medium">
                                        Jika memilih PP, subtotal otomatis dikali 2
                                    </div>
                                </div>
                            </div>
                        </div>
    
                        {{-- Customer Data --}}
                        <div class="grid md:grid-cols-2 gap-4 sm:gap-6">
                            <x-ui.input
                                name="customer_name"
                                label="Nama Lengkap Pemesan"
                                placeholder="Sesuai KTP/Identitas"
                                x-model="customerName"
                                required
                            />
                            <x-ui.input
                                name="customer_whatsapp"
                                label="No WhatsApp Pemesan"
                                placeholder="628123456789"
                                helperText="Format: 62xxx (tanpa +, tanpa spasi)"
                                x-model="customerWhatsapp"
                                required
                            />
                        </div>
    
                        {{-- REGULER SPECIFIC --}}
                        <div x-show="tab === 'regular'" x-transition class="p-4 sm:p-4 sm:p-6 rounded-2xl bg-primary-50 border-2 border-primary-200 space-y-4">
                            <div class="flex items-center gap-3 mb-3 sm:mb-4">
                                <div class="h-9 w-9 sm:h-10 sm:w-10 rounded-lg bg-primary-600 flex items-center justify-center text-white">
                                    <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                    </svg>
                                </div>
                                <h4 class="text-base sm:text-lg font-black text-primary-900">Travel Reguler</h4>
                            </div>
                            
                            <div class="grid md:grid-cols-2 gap-4">
                                <x-ui.input
                                    name="passenger_count"
                                    type="number"
                                    min="1"
                                    label="Jumlah Penumpang"
                                    placeholder="contoh: 2"
                                    x-model="passengers"
                                />
    
                                <div class="p-3 sm:p-4 rounded-xl bg-white border border-primary-200">
                                    <div class="text-xs text-zinc-500 font-bold mb-1">⏰ Catatan Penting</div>
                                    <div class="text-sm text-zinc-700 font-medium">
                                        Jam jemput mengikuti rute driver karena ada penumpang lain.
                                    </div>
                                </div>
                            </div>
                        </div>
    
                        {{-- CHARTER SPECIFIC --}}
                        <div x-show="tab === 'charter'" x-transition class="p-4 sm:p-4 sm:p-6 rounded-2xl bg-secondary-50 border-2 border-secondary-200 space-y-4">
                            <div class="flex items-center gap-3 mb-3 sm:mb-4">
                                <div class="h-9 w-9 sm:h-10 sm:w-10 rounded-lg bg-secondary-400 flex items-center justify-center text-secondary-950">
                                    <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"/>
                                    </svg>
                                </div>
                                <h4 class="text-base sm:text-lg font-black text-secondary-900">Carter Private</h4>
                            </div>
    
                            <div class="grid md:grid-cols-2 gap-4">
                                <x-ui.select
                                    name="vehicle_id"
                                    label="Pilih Unit Mobil"
                                    x-model="vehicleId"
                                    helperText="Harga = base price x jumlah seat"
                                >
                                    <option value="">-- Pilih Unit Mobil --</option>
                                    @foreach($vehicles as $v)
                                        <option value="{{ $v->id }}">{{ $v->name }} ({{ $v->seat_count }} seat)</option>
                                    @endforeach
                                </x-ui.select>
    
                                <div class="p-3 sm:p-4 rounded-xl bg-white border border-secondary-200">
                                    <div class="text-xs text-zinc-500 font-bold mb-1">💡 Info Charter</div>
                                    <div class="text-sm text-zinc-700 font-medium">
                                        Bayar penuh sesuai seat, berapa pun jumlah penumpang.
                                    </div>
                                </div>
                            </div>
    
                            <div class="grid md:grid-cols-2 gap-4">
                                <x-ui.input
                                    name="pickup_time_request"
                                    label="Request Jam Jemput"
                                    placeholder="contoh: 08:00"
                                    x-model="pickupTimeRequest"
                                    helperText="Jam yang diinginkan (tidak mengikat)"
                                />
    
                                <div x-show="tripType === 'pp'" x-transition>
                                    <x-ui.input
                                        name="return_time_request"
                                        label="Request Jam Pulang (jika PP)"
                                        placeholder="contoh: 17:00"
                                        x-model="returnTimeRequest"
                                    />
                                </div>
                            </div>
                        </div>
    
                        {{-- EXPRESS SPECIFIC --}}
                        <div x-show="tab === 'express'" x-transition class="p-4 sm:p-4 sm:p-6 rounded-2xl bg-primary-50 border-2 border-primary-200 space-y-4">
                            <div class="flex items-center gap-3 mb-3 sm:mb-4">
                                <div class="h-9 w-9 sm:h-10 sm:w-10 rounded-lg bg-primary-600 flex items-center justify-center text-white">
                                    <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-base sm:text-lg font-black text-primary-900">Paket Kilat (Same Day)</h4>
                                    <p class="text-xs sm:text-sm text-primary-800 font-medium">Harga sama dengan travel 1 orang sekali jalan</p>
                                </div>
                            </div>
    
                            <div class="grid md:grid-cols-2 gap-4">
                                <x-ui.input
                                    name="receiver_name"
                                    label="Nama Penerima"
                                    placeholder="Nama penerima barang"
                                    x-model="receiverName"
                                />
                                <x-ui.input
                                    name="receiver_whatsapp"
                                    label="No WhatsApp Penerima"
                                    placeholder="628123456789"
                                    x-model="receiverWhatsapp"
                                />
                            </div>
    
                            <div class="grid md:grid-cols-2 gap-4">
                                <x-ui.input
                                    name="package_type"
                                    label="Jenis Barang"
                                    placeholder="Dokumen, Elektronik, dll"
                                    x-model="packageType"
                                />
                                <x-ui.input
                                    name="package_weight_kg"
                                    type="number"
                                    step="0.1"
                                    label="Berat Paket (kg)"
                                    placeholder="contoh: 2.5"
                                    x-model="packageWeightKg"
                                />
                            </div>
    
                            <div class="grid md:grid-cols-3 gap-3 sm:gap-4">
                                <x-ui.input name="package_length_cm" type="number" step="0.1" label="Panjang (cm)" placeholder="50" x-model="packageLengthCm" />
                                <x-ui.input name="package_width_cm" type="number" step="0.1" label="Lebar (cm)" placeholder="30" x-model="packageWidthCm" />
                                <x-ui.input name="package_height_cm" type="number" step="0.1" label="Tinggi (cm)" placeholder="20" x-model="packageHeightCm" />
                            </div>
    
                            <x-ui.textarea
                                name="package_content"
                                label="Isi Paket (Detail)"
                                rows="2"
                                placeholder="contoh: 2 pcs baju, charger HP, dokumen penting"
                                x-model="packageContent"
                            />
                        </div>
    
                        {{-- Addresses --}}
                        <div class="grid md:grid-cols-2 gap-4 sm:gap-6">
                            <x-ui.textarea
                                name="pickup_address"
                                label="Alamat Penjemputan"
                                rows="3"
                                placeholder="Jalan, RT/RW, Kelurahan, Kecamatan, Kota"
                                x-model="pickupAddress"
                                required
                                helperText="Alamat lengkap untuk memudahkan driver"
                            />
                            <x-ui.textarea
                                name="destination_address"
                                label="Alamat Tujuan"
                                rows="3"
                                placeholder="Jalan, RT/RW, Kelurahan, Kecamatan, Kota"
                                x-model="destinationAddress"
                                required
                                helperText="Alamat lengkap tujuan pengantaran"
                            />
                        </div>
    
                        <x-ui.textarea
                            name="baggage"
                            label="Barang Bawaan (Opsional)"
                            rows="2"
                            placeholder="contoh: koper 1 buah, tas ransel, kardus 1"
                            x-model="baggage"
                            helperText="Bantu driver mempersiapkan ruang bagasi"
                        />
    
                        {{-- PREVIEW SUMMARY --}}
                        <div class="p-4 sm:p-4 sm:p-6 rounded-2xl bg-gradient-to-br from-primary-50 to-emerald-50 border-2 border-primary-200">
                            <div class="flex items-center justify-between mb-5">
                                <h4 class="text-lg sm:text-xl font-black text-primary-900">Preview Pesanan</h4>
                                <x-ui.badge variant="success" dot>Realtime</x-ui.badge>
                            </div>
    
                            <div class="grid md:grid-cols-2 gap-4 mb-3 sm:mb-4">
                                <div class="p-3 sm:p-4 rounded-xl bg-white border border-primary-200">
                                    <div class="text-xs text-zinc-500 font-bold mb-2">Layanan & Rute</div>
                                    <div class="font-black text-zinc-900 mb-1" x-text="serviceLabel"></div>
                                    <div class="text-sm font-semibold text-zinc-700" x-text="routeLabel"></div>
                                    <div class="mt-2 flex gap-2" x-show="tab !== 'express'">
                                        <span class="px-2 py-1 rounded-md bg-zinc-100 text-zinc-700 text-xs font-bold" x-text="tripType.toUpperCase()"></span>
                                        <span class="px-2 py-1 rounded-md bg-zinc-100 text-zinc-700 text-xs font-bold" x-text="departure || '-'"></span>
                                    </div>
                                </div>
    
                                <div class="p-3 sm:p-4 rounded-xl bg-white border border-primary-200">
                                    <div class="text-xs text-zinc-500 font-bold mb-2">Data Pemesan</div>
                                    <div class="font-black text-zinc-900" x-text="customerName || '-'"></div>
                                    <div class="text-sm text-zinc-600" x-text="customerWhatsapp || '-'"></div>
                                    
                                    <div class="mt-2" x-show="tab === 'regular'" x-transition>
                                        <span class="text-xs text-zinc-500">Penumpang: </span>
                                        <span class="font-bold text-zinc-900" x-text="qtyUsed + ' orang'"></span>
                                    </div>
                                    
                                    <div class="mt-2" x-show="tab === 'charter'" x-transition>
                                        <span class="text-xs text-zinc-500">Unit: </span>
                                        <span class="font-bold text-zinc-900" x-text="vehicleId ? (qtyUsed + ' seat') : '-'"></span>
                                    </div>
                                </div>
                            </div>
    
                            <div class="p-5 rounded-xl bg-white border-2 border-primary-300">
                                <div class="flex items-baseline justify-between">
                                    <div>
                                        <div class="text-xs text-zinc-500 font-bold uppercase tracking-wider mb-1">Subtotal Estimasi</div>
                                        <div class="text-2xl sm:text-2xl sm:text-3xl font-black text-primary-700">
                                            Rp <span x-text="rupiah(subtotal)"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-xs text-zinc-500 mt-2" x-text="formulaText"></div>
                            </div>
                        </div>
    
                        {{-- Submit Button --}}
                        <div class="flex flex-col sm:flex-row gap-4 pt-5 sm:pt-6 border-t-2 border-zinc-100">
                            <x-ui.button
                                type="button"
                                variant="outline"
                                size="lg"
                                class="sm:w-auto"
                                @click="showBookingModal = false"
                            >
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                                Batal
                            </x-ui.button>
                            
                            <x-ui.button
                                type="submit"
                                size="lg"
                                class="flex-1 group text-white"
                                x-bind:disabled="!canSubmit"
                                x-bind:class="!canSubmit ? 'opacity-60 cursor-not-allowed' : ''"
                            >
                                <svg class="w-5 h-5 sm:w-6 sm:h-6 mr-2 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                                </svg>
                                Submit Pemesanan
                            </x-ui.button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection