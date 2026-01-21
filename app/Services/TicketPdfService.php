<?php

namespace App\Services;

use App\Models\Booking;
use Barryvdh\DomPDF\Facade\Pdf;

class TicketPdfService
{
    public function download(Booking $booking)
    {
        $pdf = Pdf::loadView('booking.ticket-pdf', [
            'booking' => $booking,
        ])
        ->setPaper('a4', 'portrait')
        ->setOption('isRemoteEnabled', true)
        ->setOption('isHtml5ParserEnabled', true);;

        return $pdf->download("E-Ticket-{$booking->booking_code}.pdf");
    }
}
