<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Animal extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'animal_species_id',
        'animal_breed_id',
        'name',
        'gender',
        'birth_date',
        'weight',
        'special_signs',
        'bio',
        'location',
        'latitude',
        'longitude',
        'is_certified',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'birth_date' => 'date',
        'weight' => 'decimal:2',
        'is_certified' => 'boolean',
        'latitude' => 'decimal:8,6',
        'longitude' => 'decimal:8,6',
    ];

    /**
     * Get the user that owns the animal.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the species of the animal.
     */
    public function species(): BelongsTo
    {
        return $this->belongsTo(Specie::class, 'species_id');
    }

    /**
     * Get the breed of the animal.
     */
    public function breed(): BelongsTo
    {
        return $this->belongsTo(AnimalBreed::class, 'animal_breed_id');
    }

    /**
     * Register media collections for the model.
     */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('animal_photos')
            ->useDisk('public')
            ->singleFile();

        $this->addMediaCollection('animal_gallery')
            ->useDisk('public');
    }

    /**
     * Get the animal's age in years.
     *
     * @return int|null
     */
    public function getAgeAttribute(): ?int
    {
        return $this->birth_date?->age;
    }
}
