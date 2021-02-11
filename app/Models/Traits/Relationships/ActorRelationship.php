<?php

namespace App\Models\Traits\Relationships;

use App\Models\Movie;
use App\Models\MovieRoles;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait ActorRelationship
{
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(MovieRoles::class, 'role_has_actors', 'actor_id', 'role_id');
    }
}
