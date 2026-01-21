<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class TravelRoute extends Model
{
    use HasUuids;

    protected $table = 'routes';

    protected $guarded = ['id'];

    protected $fillable = [
        'route_category_id',
        'city_a_id',
        'city_b_id',
        'price_regular',
        'slug',
        'notes',
        'is_active',
        'is_favorite',
    ];

    protected static function booted(): void
    {
        static::saving(function (TravelRoute $route) {
            if ($route->city_a_id && $route->city_b_id) {
                if (strcmp((string) $route->city_a_id, (string) $route->city_b_id) > 0) {
                    [$route->city_a_id, $route->city_b_id] = [$route->city_b_id, $route->city_a_id];
                }
            }
        });
    }

    public function category() 
    {
        return $this->belongsTo(RouteCategory::class, 'route_category_id'); 
    }

    public function cityA() 
    { 
        return $this->belongsTo(City::class, 'city_a_id'); 
    }

    public function cityB() 
    { 
        return $this->belongsTo(City::class, 'city_b_id'); 
    }
}
