@extends('layouts.app')

@section('title', 'E-Ticket ' . $booking->booking_code . ' | GT Trans')
@section('meta_description', 'Unduh e-ticket GT Trans dalam bentuk gambar PNG. Tunjukkan saat penjemputan.')

@section('content')
    {{-- BREADCRUMB --}}
    <nav class="mb-8" aria-label="Breadcrumb">
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
                <a href="{{ route('public.booking.show', $booking->booking_code) }}?token={{ request('token') }}" class="text-zinc-500 hover:text-primary-600 font-medium transition-colors">
                    Booking
                </a>
            </li>
            <li class="text-zinc-300">/</li>
            <li class="text-zinc-900 font-bold">E-Ticket</li>
        </ol>
    </nav>

    {{-- HEADER SECTION --}}
    <section class="mb-8">
        <div class="text-center max-w-xl mx-auto">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-gradient-to-r from-primary-50 to-emerald-50 border border-primary-200 text-primary-700 text-sm font-bold mb-4">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                    <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/>
                </svg>
                E-Ticket Digital
            </div>
            
            <h1 class="text-3xl md:text-4xl font-black leading-tight text-zinc-900 mb-3">
                Download E-Ticket
            </h1>
            
            <p class="text-base text-zinc-600 leading-relaxed mb-6">
                Klik <span class="font-black text-primary-700">Download PNG</span> untuk menyimpan tiket. Tunjukkan QR code kepada driver saat penjemputan.
            </p>

            <button
                id="btnDownload"
                type="button"
                class="group inline-flex items-center justify-center gap-2 px-8 py-4 rounded-2xl bg-gradient-to-r from-primary-600 to-emerald-600 text-white font-black text-lg shadow-xl shadow-primary-600/30 hover:from-primary-700 hover:to-emerald-700 hover:shadow-2xl hover:scale-105 transition-all disabled:opacity-60 disabled:cursor-not-allowed"
            >
                <svg class="w-6 h-6 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                </svg>
                <span id="btnText">Download PNG</span>
            </button>
        </div>
    </section>

    {{-- CANCELLATION ALERT --}}
    @if($booking->status === 'cancelled')
        <div class="max-w-sm mx-auto mb-6">
            <x-ui.card class="border-2 border-red-300 bg-red-50 text-center">
                <div class="text-4xl mb-3">⚠️</div>
                <div class="text-lg font-black text-red-900 mb-2">Booking Dibatalkan</div>
                <p class="text-sm text-red-800 leading-relaxed">
                    E-ticket ini tidak valid untuk digunakan
                </p>
            </x-ui.card>
        </div>
    @endif

    {{-- TICKET AREA - SIMPLE CINEMA STYLE --}}
    <div class="flex justify-center mb-8">
        <div
            id="ticket"
            style="width: 350px; background: #f8f9fa;"
        >
            {{-- HEADER: Dark with Booking ID --}}
            <div style="background: #1a202c; padding: 20px; position: relative; overflow: hidden;">
                {{-- Background decoration --}}
                <div style="position: absolute; top: -30px; right: -30px; width: 100px; height: 100px; background: rgba(255,255,255,0.05); border-radius: 50%;"></div>
                
                <div style="display: flex; justify-content: space-between; align-items: flex-start; position: relative; z-index: 1;">
                    <div>
                        <div style="color: #9ca3af; font-size: 10px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 4px;">BOOKING ID</div>
                        <div style="color: #fbbf24; font-size: 18px; font-weight: 900; letter-spacing: 0.5px;">{{ $booking->booking_code }}</div>
                    </div>
                    <div style="background: #10b981; color: white; padding: 6px 12px; border-radius: 20px; font-size: 9px; font-weight: 900; text-transform: uppercase; letter-spacing: 0.5px; box-shadow: 0 2px 8px rgba(16, 185, 129, 0.3);">
                        @if($booking->trip_type === 'pp')
                            PP
                        @else
                            DROP
                        @endif
                    </div>
                </div>
            </div>

            {{-- BODY: White background --}}
            <div style="background: white; padding: 24px 20px;">
                {{-- Passenger Name --}}
                <div style="margin-bottom: 20px;">
                    <div style="color: #9ca3af; font-size: 10px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 6px;">NAMA PENUMPANG</div>
                    <div style="color: #1f2937; font-size: 20px; font-weight: 900; line-height: 1.2;">{{ strtoupper($booking->customer_name) }}</div>
                </div>

                {{-- Route --}}
                <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 24px;">
                    <div style="flex: 1;">
                        <div style="color: #9ca3af; font-size: 10px; font-weight: 700; text-transform: uppercase; margin-bottom: 4px;">DARI</div>
                        <div style="color: #1f2937; font-size: 16px; font-weight: 900;">{{ $booking->fromCity->name ?? 'Jakarta' }}</div>
                    </div>
                    
                    <div style="margin: 0 12px;">
                        <svg style="width: 24px; height: 24px; color: #10b981;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>
                    </div>
                    
                    <div style="flex: 1; text-align: right;">
                        <div style="color: #9ca3af; font-size: 10px; font-weight: 700; text-transform: uppercase; margin-bottom: 4px;">KE</div>
                        <div style="color: #1f2937; font-size: 16px; font-weight: 900;">{{ $booking->toCity->name ?? 'Bogor' }}</div>
                    </div>
                </div>

                {{-- Divider Line --}}
                <div style="border-top: 2px solid #10b981; margin-bottom: 24px; position: relative;">
                    <div style="position: absolute; top: -8px; left: -20px; width: 16px; height: 16px; background: #f8f9fa; border-radius: 50%;"></div>
                    <div style="position: absolute; top: -8px; right: -20px; width: 16px; height: 16px; background: #f8f9fa; border-radius: 50%;"></div>
                </div>

                {{-- QR Code --}}
                <div style="text-align: center; margin-bottom: 24px;">
                    <div style="display: inline-block; padding: 16px; background: white; border: 3px solid #e5e7eb; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05);">
                        <div style="width: 180px; height: 180px;">
                            {!! QrCode::format('svg')->size(180)->margin(0)->generate($booking->qr_token) !!}
                        </div>
                    </div>
                </div>

                {{-- Total Price --}}
                <div style="text-align: center; margin-bottom: 20px;">
                    <div style="color: #9ca3af; font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 6px;">TOTAL BIAYA</div>
                    <div style="color: #10b981; font-size: 28px; font-weight: 900; line-height: 1;">Rp {{ number_format($booking->subtotal ?? 0, 0, ',', '.') }}</div>
                    <div style="color: #6b7280; font-size: 10px; margin-top: 6px; font-weight: 600;">Simpan tiket ini sebagai bukti pembayaran yang sah.</div>
                </div>

                {{-- Additional Info --}}
                <div style="background: #f3f4f6; border-radius: 12px; padding: 12px; margin-bottom: 16px;">
                    <div style="display: flex; justify-content: space-between; margin-bottom: 8px; padding-bottom: 8px; border-bottom: 1px solid #e5e7eb;">
                        <span style="color: #6b7280; font-size: 11px; font-weight: 600;">Tanggal:</span>
                        <span style="color: #1f2937; font-size: 11px; font-weight: 900;">{{ \Carbon\Carbon::parse($booking->departure_date)->format('d M Y') }}</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; margin-bottom: 8px; padding-bottom: 8px; border-bottom: 1px solid #e5e7eb;">
                        <span style="color: #6b7280; font-size: 11px; font-weight: 600;">Layanan:</span>
                        <span style="color: #1f2937; font-size: 11px; font-weight: 900;">{{ strtoupper($booking->service_type ?? 'REGULAR') }}</span>
                    </div>
                    <div style="display: flex; justify-content: space-between;">
                        <span style="color: #6b7280; font-size: 11px; font-weight: 600;">WhatsApp:</span>
                        <span style="color: #1f2937; font-size: 11px; font-weight: 900;">{{ $booking->customer_whatsapp }}</span>
                    </div>
                </div>

                {{-- Status Badge --}}
                <div style="text-align: center; margin-bottom: 16px;">
                    @if($booking->status === 'confirmed')
                        <div style="display: inline-flex; align-items: center; gap: 6px; background: #d1fae5; color: #065f46; padding: 8px 16px; border-radius: 20px; font-size: 11px; font-weight: 900; text-transform: uppercase;">
                            <svg style="width: 14px; height: 14px;" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            AKTIF
                        </div>
                    @elseif($booking->status === 'cancelled')
                        <div style="display: inline-flex; align-items: center; gap: 6px; background: #fee2e2; color: #991b1b; padding: 8px 16px; border-radius: 20px; font-size: 11px; font-weight: 900; text-transform: uppercase;">
                            <svg style="width: 14px; height: 14px;" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                            </svg>
                            DIBATALKAN
                        </div>
                    @endif
                </div>

                {{-- Tips Box --}}
                <div style="background: linear-gradient(135deg, #ecfdf5 0%, #d1fae5 100%); border: 2px solid #10b981; border-radius: 12px; padding: 12px; margin-bottom: 16px;">
                    <div style="display: flex; align-items: start; gap: 8px;">
                        <div style="flex-shrink: 0; width: 20px; height: 20px; background: #10b981; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                            <svg style="width: 12px; height: 12px; color: white;" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div style="flex: 1;">
                            <div style="color: #065f46; font-size: 11px; font-weight: 900; margin-bottom: 4px;">TUNJUKKAN QR CODE SAAT BOARDING</div>
                            <div style="color: #047857; font-size: 9px; line-height: 1.4; font-weight: 600;">Pastikan HP memiliki baterai cukup dan QR code terlihat jelas</div>
                        </div>
                    </div>
                </div>

                {{-- Footer --}}
                <div style="text-align: center; padding-top: 12px; border-top: 1px dashed #d1d5db;">
                    <div style="color: #6b7280; font-size: 9px; font-weight: 700; margin-bottom: 4px;">© {{ date('Y') }} GT TRANS</div>
                    <div style="color: #9ca3af; font-size: 8px; font-weight: 600;">Generated: {{ now()->format('d M Y H:i') }} WIB</div>
                </div>
            </div>

            {{-- Bottom Gradient Strip --}}
            <div style="height: 8px; background: linear-gradient(90deg, #10b981 0%, #fbbf24 100%);"></div>
        </div>
    </div>

    {{-- Info Section --}}
    <div class="max-w-md mx-auto">
        <x-ui.card class="text-center border-2 border-primary-200 bg-gradient-to-br from-primary-50 to-emerald-50">
            <div class="mb-4">
                <div class="text-4xl mb-2">📱</div>
                <div class="text-lg font-black text-zinc-900 mb-2">Cara Menggunakan</div>
            </div>
            <div class="space-y-2 text-sm text-zinc-700 text-left">
                <div class="flex items-start gap-3">
                    <div class="flex-shrink-0 w-6 h-6 rounded-full bg-primary-600 text-white flex items-center justify-center text-xs font-black">1</div>
                    <p class="flex-1 leading-relaxed"><strong>Download</strong> tiket sebagai gambar PNG</p>
                </div>
                <div class="flex items-start gap-3">
                    <div class="flex-shrink-0 w-6 h-6 rounded-full bg-primary-600 text-white flex items-center justify-center text-xs font-black">2</div>
                    <p class="flex-1 leading-relaxed"><strong>Simpan</strong> di galeri atau folder downloads HP</p>
                </div>
                <div class="flex items-start gap-3">
                    <div class="flex-shrink-0 w-6 h-6 rounded-full bg-primary-600 text-white flex items-center justify-center text-xs font-black">3</div>
                    <p class="flex-1 leading-relaxed"><strong>Tunjukkan</strong> QR code ke driver saat penjemputan</p>
                </div>
            </div>
        </x-ui.card>

        <div class="mt-6 text-center">
            <x-ui.button href="{{ route('public.booking.show', $booking->booking_code) }}?token={{ request('token') }}" variant="outline" size="lg">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Kembali ke Detail Booking
            </x-ui.button>
        </div>
    </div>

    {{-- JavaScript untuk Download PNG --}}
    <script src="https://cdn.jsdelivr.net/npm/html-to-image@1.11.11/dist/html-to-image.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const btn = document.getElementById('btnDownload');
            const btnText = document.getElementById('btnText');
            const ticketNode = document.getElementById('ticket');

            btn.addEventListener('click', async () => {
                btn.disabled = true;
                btnText.textContent = 'Memproses...';

                try {
                    // Wait for everything to load
                    await new Promise(resolve => setTimeout(resolve, 300));

                    // Convert to PNG with high quality
                    const dataUrl = await htmlToImage.toPng(ticketNode, {
                        cacheBust: true,
                        pixelRatio: 3, // High quality
                        backgroundColor: '#f8f9fa',
                        width: 350,
                        height: ticketNode.offsetHeight,
                    });

                    // Create download link
                    const link = document.createElement('a');
                    link.download = 'GT-Trans-Ticket-{{ $booking->booking_code }}.png';
                    link.href = dataUrl;
                    link.click();

                    // Success feedback
                    btnText.innerHTML = '✓ Berhasil Download!';
                    setTimeout(() => {
                        btnText.textContent = 'Download PNG';
                        btn.disabled = false;
                    }, 2000);

                } catch (error) {
                    console.error('Error:', error);
                    alert('❌ Gagal membuat PNG. Silakan coba lagi.');
                    btnText.textContent = 'Download PNG';
                    btn.disabled = false;
                }
            });
        });
    </script>
@endsection
