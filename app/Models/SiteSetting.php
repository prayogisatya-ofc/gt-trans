<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasUuids;

    protected $fillable = [
        'key',
        'value',
        'type',
        'group',
        'is_public',
    ];

    protected $casts = [
        'is_public' => 'boolean',
    ];

    public static function getByKey(string $key, $default = null)
    {
        return static::query()->where('key', $key)->value('value') ?? $default;
    }

    public static function getRouteInfo(): array
    {
        return [
            'important_note' => static::getByKey('route_important_note'),
            'booking_guide' => static::getByKey('route_booking_guide'),
            'cancellation_policy' => static::getByKey('route_cancellation_policy'),
        ];
    }
}
