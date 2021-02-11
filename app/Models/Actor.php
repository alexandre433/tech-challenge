<?php

namespace App\Models;

use App\Models\Traits\Relationships\ActorRelationship;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    use ActorRelationship;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'actors';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'born_at'
    ];

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];
}
