<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DriverScanController extends Controller
{
    public function show(string $qrToken)
    {
        $booking = Booking::where('qr_token', $qrToken)
            ->orWhere('booking_code', $qrToken)
            ->firstOrFail();

        if ($booking->status === 'cancelled') {
            return response()->json([
                'status' => 'cancelled',
                'message' => 'Booking dibatalkan oleh admin.',
            ], 403);
        }

        return response()->json([
            'status' => 'OK',
            'booking' => [
                'booking_code' => $booking->booking_code,
                'service_type' => $booking->service_type,
                'trip_type' => $booking->trip_type,
                'departure_date' => Carbon::parse($booking->departure_date)->format('d M Y'),
                'return_date' => Carbon::parse($booking->return_date)->format('d M Y'),
                'customer_name' => $booking->customer_name,
                'customer_whatsapp' => $booking->customer_whatsapp,
                'pickup_address' => $booking->pickup_address,
                'destination_address' => $booking->destination_address,
                'subtotal' => $booking->subtotal,
                'status' => $booking->status,
                'from_city' => $booking->fromCity->name,
                'to_city' => $booking->toCity->name,
                'pickup_time_request' => $booking->pickup_time_request,
                'return_time_request' => $booking->return_time_request,
                'baggage' => $booking->baggage,
                'passenger_count' => $booking->passenger_count,
                'vehicle' => $booking->vehicle?->name,
                'receiver_name' => $booking->receiver_name,
                'receiver_whatsapp' => $booking->receiver_whatsapp,
                'package_type' => $booking->package_type,
                'package_weight_kg' => $booking->package_weight_kg,
                'package_length_cm' => $booking->package_length_cm,
                'package_width_cm' => $booking->package_width_cm,
                'package_height_cm' => $booking->package_height_cm,
                'package_content' => $booking->package_content,
                'cancel_reason' => $booking->cancel_reason,
            ]
        ]);
    }

    public function confirm(Request $request, string $qrToken)
    {
        $request->validate([
            'leg' => ['required', 'in:depart,return'],
        ]);

        $booking = Booking::where('qr_token', $qrToken)
            ->orWhere('booking_code', $qrToken)
            ->firstOrFail();

        if ($booking->status === 'cancelled') {
            return response()->json(['message' => 'Booking dibatalkan.'], 403);
        }

        if ($request->leg === 'depart') {
            $booking->status = 'departed1';
            $booking->save();
            return response()->json([
                'message' => 'Keberangkatan berhasil dikonfirmasi.',
            ]);
        }

        if ($request->leg === 'return') {
            if (($booking->trip_type ?? 'drop') !== 'pp') {
                return response()->json(['message' => 'Booking ini bukan PP.'], 422);
            }
            $booking->status = 'departed2';
            $booking->save();
            return response()->json([
                'message' => 'Kepulangan berhasil dikonfirmasi.',
            ]);
        }
    }
}
