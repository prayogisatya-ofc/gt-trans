<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\SiteSetting;
use App\Models\TravelRoute;
use App\Models\Vehicle;
use App\Services\BookingPriceService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BookingController extends Controller
{
    public function store(Request $request, BookingPriceService $pricing)
    {
        $data = $request->validate([
            'service_type' => 'required|in:regular,charter,express',
            'route_id' => 'required|exists:routes,id',

            'from_city_id' => 'required|exists:cities,id',
            'to_city_id' => 'required|exists:cities,id',

            'trip_type' => 'nullable|in:drop,pp',
            'departure_date' => 'required|date',
            'return_date' => 'nullable|date',

            'customer_name' => 'required|string|max:100',
            'customer_whatsapp' => 'required|string|max:20',

            'passenger_count' => 'nullable|integer|min:1',
            'vehicle_id' => 'nullable|exists:vehicles,id',

            'pickup_address' => 'required|string',
            'destination_address' => 'required|string',
            'baggage' => 'nullable|string',

            'pickup_time_request' => 'nullable|string|max:20',
            'return_time_request' => 'nullable|string|max:20',

            'receiver_name' => 'nullable|string|max:100',
            'receiver_whatsapp' => 'nullable|string|max:20',
            'package_type' => 'nullable|string|max:100',
            'package_weight_kg' => 'nullable|numeric|min:0',
            'package_length_cm' => 'nullable|numeric|min:0',
            'package_width_cm' => 'nullable|numeric|min:0',
            'package_height_cm' => 'nullable|numeric|min:0',
            'package_content' => 'nullable|string',
        ]);

        $route = TravelRoute::with(['cityA', 'cityB'])->findOrFail($data['route_id']);

        // ✅ validasi arah harus cocok dengan rute A↔B
        $validDirection =
            ($data['from_city_id'] === $route->city_a_id && $data['to_city_id'] === $route->city_b_id) ||
            ($data['from_city_id'] === $route->city_b_id && $data['to_city_id'] === $route->city_a_id);

        abort_unless($validDirection, 422, 'Arah kota berangkat/tujuan tidak sesuai rute.');

        // rules per layanan
        if ($data['service_type'] === 'regular') {
            abort_unless(!empty($data['passenger_count']), 422, 'Jumlah penumpang wajib diisi.');
        }

        $vehicle = null;
        if ($data['service_type'] === 'charter') {
            abort_unless(!empty($data['vehicle_id']), 422, 'Pilih unit mobil wajib.');
            $vehicle = Vehicle::findOrFail($data['vehicle_id']);
        }

        if ($data['service_type'] === 'express') {
            abort_unless(!empty($data['receiver_name']) && !empty($data['receiver_whatsapp']), 422, 'Data penerima wajib.');
            $data['trip_type'] = null;
        }

        $calc = $pricing->calculate($data, $route, $vehicle);

        $bookingCode = 'GT-' . now()->format('Ymd') . '-' . str_pad((string) random_int(1, 999999), 6, '0', STR_PAD_LEFT);

        $booking = Booking::create([
            ...$data,
            'booking_code' => $bookingCode,
            'price_base' => $calc['priceBase'],
            'seat_or_qty_used' => $calc['qty'],
            'is_round_trip' => $calc['isRoundTrip'],
            'subtotal' => $calc['subtotal'],
            'view_token' => Str::random(32),
            'qr_token' => Str::random(48),
            'status' => 'new',
        ]);

        $adminWa = SiteSetting::getByKey('admin_whatsapp');
        $detailUrl = url("/booking/{$booking->booking_code}?token={$booking->view_token}");

        $waText = $this->buildWhatsappMessage($booking, $route, $vehicle, $detailUrl);

        $waUrl = "https://wa.me/{$adminWa}?text=" . urlencode($waText);

        return redirect()->away($waUrl);
    }

    private function buildWhatsappMessage(Booking $b, TravelRoute $route, ?Vehicle $vehicle, string $detailUrl): string
    {
        $service = match ($b->service_type) {
            'regular' => 'Reguler (Umum)',
            'charter' => 'Carter (Private)',
            'express' => 'Paket Kilat',
            default => $b->service_type,
        };

        $trip = $b->trip_type === 'pp' ? 'PP (Pulang Pergi)' : 'Drop (Sekali Jalan)';

        $lines = [];
        $lines[] = "-----------------------------------------";
        $lines[] = "*PEMESANAN BARU GT TRANS*";
        $lines[] = "-----------------------------------------";
        $lines[] = "*Kode Booking*: {$b->booking_code}";
        $lines[] = "*Rute*: {$b->fromCity->name} ke {$b->toCity->name}";
        $lines[] = "*Tipe Pemesanan*: {$service}";
        $lines[] = "*Tipe Perjalanan*: {$trip}";
        $lines[] = "-----------------------------------------";
        $lines[] = "*Tanggal Berangkat*: " . date('d M Y', strtotime($b->departure_date));
        if ($b->trip_type === 'pp' && $b->return_date) {
            $lines[] = "*Tanggal Pulang*: " . date('d M Y', strtotime($b->return_date));
        }

        $lines[] = "*Nama Pemesan*: {$b->customer_name}";
        $lines[] = "*WA Pemesan*: {$b->customer_whatsapp}";

        if ($b->service_type === 'regular') {
            $lines[] = "*Penumpang*: {$b->passenger_count} orang";
        }

        if ($b->service_type === 'charter' && $vehicle) {
            $lines[] = "*Unit*: {$vehicle->name} ({$vehicle->seat_count} seat)";
            if ($b->pickup_time_request) $lines[] = "*Jam Jemput*: {$b->pickup_time_request}";
            if ($b->trip_type === 'pp' && $b->return_time_request) $lines[] = "*Jam Pulang*: {$b->return_time_request}";
        }

        
        if ($b->service_type === 'express') {
            $lines[] = "-----------------------------------------";
            $lines[] = "*Nama Penerima*: {$b->receiver_name} ({$b->receiver_whatsapp})";
            $lines[] = "*Jenis Barang*: {$b->package_type}";
            $lines[] = "*Berat*: {$b->package_weight_kg} kg";
            $lines[] = "*Dimensi (cm)*: {$b->package_length_cm}x{$b->package_width_cm}x{$b->package_height_cm}";
            $lines[] = "*Isi Paket*: {$b->package_content}";
        }

        $lines[] = "-----------------------------------------";

        $lines[] = "*Alamat Jemput*: {$b->pickup_address}";
        $lines[] = "*Alamat Tujuan*: {$b->destination_address}";
        if ($b->baggage) $lines[] = "*Barang Bawaan*: {$b->baggage}";

        $lines[] = "-----------------------------------------";

        $lines[] = "*Subtotal Estimasi: Rp " . number_format($b->subtotal, 0, ',', '.') . "*";
        $lines[] = "";
        $lines[] = "Link Detail: {$detailUrl}";

        $lines[] = "-----------------------------------------";
        $lines[] = "*GT TRANS - Keselamatan Dan Kenyamanan Perjalanan Anda Prioritas Kami*";

        return implode("\n", $lines);
    }
}
