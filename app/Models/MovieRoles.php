<?php

namespace App\Models;

use App\Models\Traits\Relationships\MovieRolesRelationship;
use Illuminate\Database\Eloquent\Model;

class MovieRoles extends Model
{
    use MovieRolesRelationship;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'movie_roles';

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];
}
