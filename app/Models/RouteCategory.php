<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class RouteCategory extends Model
{
    use HasUuids;

    protected $guarded = ['id'];

    protected $fillable = [
        'name',
        'slug',
        'sort_order',
        'is_active',
        'is_favorite',
    ];
}
