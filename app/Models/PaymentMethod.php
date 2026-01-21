<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasUuids;

    protected $fillable = [
        'name',
        'type',
        'description',
        'bank_name',
        'account_name',
        'account_number',
        'qris_image_path',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true)->orderBy('sort_order');
    }

    public function isCash(): bool
    {
        return $this->type === 'cash';
    }

    public function isBankTransfer(): bool
    {
        return $this->type === 'bank_transfer';
    }

    public function isQris(): bool
    {
        return $this->type === 'qris';
    }
}
