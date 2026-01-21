<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class DriverApp extends Model
{
    use HasUuids, HasApiTokens;

    protected $fillable = ['name'];
}
