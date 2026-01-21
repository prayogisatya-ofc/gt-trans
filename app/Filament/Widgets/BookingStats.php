<?php

namespace App\Filament\Widgets;

use App\Models\Booking;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class BookingStats extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $today = now()->toDateString();

        $todayCount = Booking::query()
            ->whereDate('created_at', $today)
            ->count();

        $monthCount = Booking::query()
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();

        $monthRevenue = Booking::query()
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->whereIn('status', ['departed1', 'departed2'])
            ->sum('subtotal');

        $unpaidCount = Booking::query()
            ->whereIn('status', ['new'])
            ->count();

        return [
            Stat::make('Booking Hari Ini', $todayCount)
                ->description('Total booking masuk hari ini')
                ->icon('heroicon-o-ticket'),

            Stat::make('Booking Bulan Ini', $monthCount)
                ->description('Total booking di bulan berjalan')
                ->icon('heroicon-o-calendar-days'),

            Stat::make('Estimasi Omset Bulan Ini', 'Rp ' . number_format($monthRevenue, 0, ',', '.'))
                ->description('Dari booking yang sudah berangkat')
                ->icon('heroicon-o-banknotes'),

            Stat::make('Booking Baru', $unpaidCount)
                ->description('Status booking masih baru')
                ->icon('heroicon-o-exclamation-triangle'),
        ];
    }
}
