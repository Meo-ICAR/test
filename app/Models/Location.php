<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'address',
        'city',
        'province',
        'postal_code',
        'country',
        'latitude',
        'longitude',
        'contact_person',
        'contact_phone',
        'contact_email',
        'features',
        'notes',
        'accessibility_camion',
        'parking_camion',
        'potenza_elettrica',
        'website',
        'is_water',
        'is_consent_work',
        'is_active',
        'created_by',
        'company_id',
    ];

    protected $casts = [
        'features' => 'array',
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8',
        'is_water' => 'boolean',
        'is_consent_work' => 'boolean',
        'is_active' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    protected $attributes = [
        'country' => 'IT',
        'is_active' => true,
    ];

    /**
     * Get the company that owns the location.
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Get the user who created the location.
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
