<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Specie extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'icon',
        'description',
        'sort_order',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'sort_order' => 'integer',
    ];

    /**
     * Get the breeds for the species.
     */
    public function breeds(): HasMany
    {
        return $this->hasMany(AnimalBreed::class, 'species_id');
    }

    /**
     * Get the animals that belong to this species.
     */
    public function animals(): HasMany
    {
        return $this->hasMany(Animal::class, 'species_id');
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
