<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ruolo extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ruoli';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'icona',
        'role',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        // Add any necessary casts here
    ];
}
