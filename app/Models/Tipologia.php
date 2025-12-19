<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tipologia extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tipologias';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'role',
        'icon',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        // Add any necessary casts here
    ];

    /**
     * Get the profiles associated with this tipologia.
     */
    public function profiles(): HasMany
    {
        return $this->hasMany(Profile::class, 'tipologia_id');
    }
}
