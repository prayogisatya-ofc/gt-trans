<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasUuids;

    protected $guarded = ['id'];

    protected $fillable = [
        'name',
        'seat_count',
        'is_active',
    ];
}
