<?php

namespace App\Services;

use App\Models\TravelRoute;
use App\Models\Vehicle;

class BookingPriceService
{
    public function calculate(array $data, TravelRoute $route, ?Vehicle $vehicle = null): array
    {
        $priceBase = (int) $route->price_regular;
        $isRoundTrip = ($data['trip_type'] ?? null) === 'pp';

        if ($data['service_type'] === 'regular') {
            $qty = (int) $data['passenger_count'];
            $subtotal = $priceBase * $qty;
            if ($isRoundTrip) $subtotal *= 2;

            return compact('priceBase', 'qty', 'isRoundTrip', 'subtotal');
        }

        if ($data['service_type'] === 'charter') {
            $qty = (int) $vehicle->seat_count; // bayar seat
            $subtotal = $priceBase * $qty;
            if ($isRoundTrip) $subtotal *= 2;

            return compact('priceBase', 'qty', 'isRoundTrip', 'subtotal');
        }

        // express
        $qty = 1;
        $subtotal = $priceBase * 1;

        return compact('priceBase', 'qty', 'isRoundTrip', 'subtotal');
    }
}
