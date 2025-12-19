<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'stripe_product_id',
        'stripe_price_id',
        'amount',
        'currency',
        'interval',
        'role',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'amount' => 'integer',
    ];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'currency' => 'eur',
    ];

    /**
     * Get the formatted price attribute.
     *
     * @return string
     */
    public function getFormattedPriceAttribute(): string
    {
        return number_format($this->amount / 100, 2, ',', '.') . ' ' . strtoupper($this->currency);
    }

    /**
     * Get the billing interval in a readable format.
     *
     * @return string
     */
    public function getBillingIntervalAttribute(): string
    {
        return $this->interval === 'month' ? 'monthly' : 'yearly';
    }

    /**
     * Scope a query to only include products with a specific role.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string  $role
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeForRole($query, string $role)
    {
        return $query->where('role', $role);
    }
}
