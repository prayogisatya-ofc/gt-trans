<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class City extends Model
{
    use HasUuids;

    protected $guarded = ['id'];

    protected $fillable = [
        'name',
        'province',
        'slug'
    ];

    protected static function booted(): void
    {
        static::creating(function (City $city) {
            if (blank($city->slug)) {
                $city->slug = Str::slug($city->name);
            }
        });

        static::updating(function (City $city) {
            $city->slug = Str::slug($city->name);
        });
    }
}
