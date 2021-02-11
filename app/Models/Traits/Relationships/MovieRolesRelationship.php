<?php

namespace App\Models\Traits\Relationships;

use App\Models\Actor;
use App\Models\Movie;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait MovieRolesRelationship
{
    public function movies(): BelongsToMany
    {
        return $this->belongsToMany(Movie::class, 'movie_has_roles', 'movie_id', 'role_id');
    }

    public function actors()
    {
        return $this->belongsToMany(Actor::class, 'role_has_actors', 'actor_id', 'role_id');
    }
}
