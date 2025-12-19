<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AnimalBreed extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'species_id',
        'name',
        'slug',
        'category_group',
        'standard_description',
    ];

    /**
     * Get the species that owns the breed.
     */
    public function species(): BelongsTo
    {
        return $this->belongsTo(Specie::class, 'species_id');
    }

    /**
     * Get the animals of this breed.
     */
    public function animals(): HasMany
    {
        return $this->hasMany(Animal::class, 'animal_breed_id');
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
