<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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

    protected static function booted(): void
    {
        static::creating(function (RouteCategory $category) {
            if (blank($category->slug)) {
                $category->slug = Str::slug($category->name);
            }

            $category->sort_order = RouteCategory::max('sort_order') + 1;

            $category->is_active = $category->is_active ?? true;
            $category->is_favorite = $category->is_favorite ?? false;
        });

        static::updating(function (RouteCategory $category) {
            $category->slug = Str::slug($category->name);
        });
    }
}
