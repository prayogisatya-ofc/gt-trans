<?php

namespace App\Filament\Widgets;

use App\Models\Booking;
use Filament\Widgets\ChartWidget;

class BookingServiceChart extends ChartWidget
{
    protected ?string $heading = 'Komposisi Layanan (Bulan Ini)';

    protected function getData(): array
    {
        $query = Booking::query()
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year);

        $regular = (clone $query)->where('service_type', 'regular')->count();
        $charter = (clone $query)->where('service_type', 'charter')->count();
        $express = (clone $query)->where('service_type', 'express')->count();

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah',
                    'data' => [$regular, $charter, $express],
                ],
            ],
            'labels' => ['Reguler', 'Carter', 'Paket Kilat'],
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
