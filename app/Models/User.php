<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'last_name',
        'role',
        'email',
        'password',
        'company_id',
        'privacy_policy_accepted_at',
        'terms_accepted_at',
        'marketing_consent',
        'newsletter_subscription',
        'data_processing_consent',
        'data_processing_consent_at',
        'data_erasure_requested_at',
        'data_anonymized_at',
        'ip_address',
        'user_agent',
        'expires_at',
        'activated_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'marketing_consent' => 'boolean',
            'newsletter_subscription' => 'boolean',
            'data_processing_consent' => 'boolean',
            'data_processing_consent_at' => 'datetime',
            'data_erasure_requested_at' => 'datetime',
            'data_anonymized_at' => 'datetime',
            'privacy_policy_accepted_at' => 'datetime',
            'terms_accepted_at' => 'datetime',
            'expires_at' => 'datetime',
            'activated_at' => 'datetime',
            'deleted_at' => 'datetime',
        ];
    }

    /**
     * The model's default values for attributes.
     *
     * @var array<string, mixed>
     */
    protected $attributes = [
        'role' => 'actor',
        'marketing_consent' => false,
        'newsletter_subscription' => false,
        'data_processing_consent' => false,
    ];

    /**
     * Get the company that the user belongs to.
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
