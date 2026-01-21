<?php

namespace App\Filament\Widgets;

use App\Models\Booking;
use Filament\Widgets\ChartWidget;

class BookingStatusChart extends ChartWidget
{
    protected ?string $heading = 'Status Booking (Bulan Ini)';

    protected function getData(): array
    {
        $query = Booking::query()
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year);

        $new = (clone $query)->where('status', 'new')->count();
        $cancel = (clone $query)->where('status', 'cancelled')->count();
        $departed = (clone $query)->where('status', 'departed1')->orWhere('status', 'departed2')->count();

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah',
                    'data' => [$new, $departed, $cancel],
                ],
            ],
            'labels' => ['Baru', 'Sampai', 'Cancelled'],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
