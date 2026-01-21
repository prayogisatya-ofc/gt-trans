<?php

namespace App\Filament\Widgets;

use App\Models\Booking;
use Filament\Widgets\ChartWidget;

class BookingTrendChart extends ChartWidget
{
    protected ?string $heading = 'Trend Booking (14 Hari Terakhir)';

    protected function getData(): array
    {
        $days = 14;

        $labels = [];
        $data = [];

        for ($i = $days - 1; $i >= 0; $i--) {
            $date = now()->subDays($i);
            $labels[] = $date->format('d M');

            $data[] = Booking::query()
                ->whereDate('created_at', $date->toDateString())
                ->count();
        }

        return [
            'datasets' => [
                [
                    'label' => 'Booking',
                    'data' => $data,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
