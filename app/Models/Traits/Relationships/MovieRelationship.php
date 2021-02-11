<?php

namespace App\Models\Traits\Relationships;

use App\Models\Genre;
use App\Models\Movie;
use App\Models\MovieRoles;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait MovieRelationship
{
    public function roles()
    {
        return $this->belongsToMany(MovieRoles::class, 'movie_has_roles', 'role_id', 'movie_id');
    }

    public function genres(): HasMany
    {
        return $this->hasMany(Genre::class, 'genre_id');
    }
}
