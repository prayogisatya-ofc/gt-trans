<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasUuids;

    protected $guarded = ['id'];

    protected $fillable = [
        'booking_code',
        'service_type',
        'route_id',
        'from_city_id',
        'to_city_id',
        'trip_type',
        'departure_date',
        'return_date',
        'pickup_time_request',
        'return_time_request',
        'customer_name',
        'customer_whatsapp',
        'pickup_address',
        'destination_address',
        'baggage',
        'passenger_count',
        'vehicle_id',
        'receiver_name',
        'receiver_whatsapp',
        'package_type',
        'package_weight_kg',
        'package_length_cm',
        'package_width_cm',
        'package_height_cm',
        'package_content',
        'price_base',
        'seat_or_qty_used',
        'is_round_trip',
        'subtotal',
        'status',
        'cancel_reason',
        'view_token',
        'qr_token',
    ];

    public function route() 
    { 
        return $this->belongsTo(TravelRoute::class, 'route_id'); 
    }

    public function fromCity() 
    { 
        return $this->belongsTo(City::class, 'from_city_id'); 
    }

    public function toCity() 
    { 
        return $this->belongsTo(City::class, 'to_city_id'); 
    }

    public function vehicle() 
    { 
        return $this->belongsTo(Vehicle::class); 
    }
}
