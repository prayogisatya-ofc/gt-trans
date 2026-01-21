<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Services\TicketPdfService;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PublicBookingController extends Controller
{
    public function show(Request $request, string $code)
    {
        $token = (string) $request->query('token');

        $booking = Booking::query()
            ->where('booking_code', $code)
            ->firstOrFail();

        // validasi view_token
        abort_if(!$token || !hash_equals($booking->view_token, $token), 403, 'Token tidak valid.');

        return view('booking.show', compact('booking'));
    }

    public function downloadTicket(Request $request, string $code)
    {
        $token = (string) $request->query('token');

        $booking = Booking::query()
            ->where('booking_code', $code)
            ->firstOrFail();

        abort_if(!$token || !hash_equals($booking->view_token, $token), 403, 'Token tidak valid.');

        return view('booking.ticket', compact('booking'));
    }
}
