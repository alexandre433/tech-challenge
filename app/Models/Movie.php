<?php

namespace App\Models;

use App\Models\Traits\Relationships\MovieRelationship;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use MovieRelationship;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'movies';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'released_at'
    ];

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];
}
