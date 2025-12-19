<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Profile extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'phone',
        'stage_name',
        'slug',
        'birth_date',
        'gender',
        'city',
        'country',
        'province',
        'height_cm',
        'weight_kg',
        'appearance',
        'measurements',
        'capabilities',
        'socials',
        'is_visible',
        'scene_nudo',
        'consenso_privacy',
        'is_represented',
        'agency_name',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'birth_date' => 'date',
        'appearance' => 'array',
        'measurements' => 'array',
        'capabilities' => 'array',
        'socials' => 'array',
        'is_visible' => 'boolean',
        'consenso_privacy' => 'boolean',
        'is_represented' => 'boolean',
        'height_cm' => 'integer',
        'weight_kg' => 'integer',
    ];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'country' => 'IT',
        'is_visible' => true,
        'scene_nudo' => 'no',
        'consenso_privacy' => false,
        'is_represented' => false,
    ];

    /**
     * Get the user that owns the profile.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the route key name for URL generation.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }


    public function registerMediaConversions(?Media $media = null): void
    {
        // Genera una miniatura quadrata di 200x200px
        $this->addMediaConversion('thumb')
            ->width(200)
            ->height(200)
            ->sharpen(10)
            ->nonQueued(); // Esegue la conversione subito (senza code)

        // Genera una versione ottimizzata per il web
        $this->addMediaConversion('preview')
            ->width(1200)
            ->format('webp') // Converte in WebP per risparmiare spazio
            ->quality(80);
    }
}
