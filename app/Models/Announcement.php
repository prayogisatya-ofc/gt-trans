<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasUuids;

    protected $fillable = [
        'title',
        'content',
        'is_popup',
        'show_on_route_detail',
        'start_at',
        'end_at',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_popup' => 'boolean',
        'show_on_route_detail' => 'boolean',
        'is_active' => 'boolean',
        'start_at' => 'datetime',
        'end_at' => 'datetime',
    ];

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    public function scopeVisibleNow(Builder $query): Builder
    {
        return $query
            ->where(function ($q) {
                $q->whereNull('start_at')->orWhere('start_at', '<=', now());
            })
            ->where(function ($q) {
                $q->whereNull('end_at')->orWhere('end_at', '>=', now());
            });
    }

    public function scopeForRouteDetailPopup(Builder $query): Builder
    {
        return $query
            ->active()
            ->visibleNow()
            ->where('is_popup', true)
            ->where('show_on_route_detail', true)
            ->orderBy('sort_order')
            ->latest();
    }

    public function scopeForGlobalPopup(Builder $query): Builder
    {
        return $query
            ->active()
            ->visibleNow()
            ->where('is_popup', true)
            ->orderBy('sort_order')
            ->latest();
    }

}
