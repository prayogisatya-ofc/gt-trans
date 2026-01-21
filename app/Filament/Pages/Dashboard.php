<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\BookingServiceChart;
use App\Filament\Widgets\BookingStats;
use App\Filament\Widgets\BookingStatusChart;
use App\Filament\Widgets\BookingTrendChart;
use App\Filament\Widgets\LatestBookings;
use App\Filament\Widgets\TodayDepartures;
use Filament\Pages\Page;
use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    public function getWidgets(): array
    {
        return [
            BookingStats::class,
            BookingTrendChart::class,
            BookingServiceChart::class,
            BookingStatusChart::class,
            LatestBookings::class,
            TodayDepartures::class,
        ];
    }
}
