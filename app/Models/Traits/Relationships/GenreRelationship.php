<?php

namespace App\Models\Traits\Relationships;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait GenreRelationship
{
    public function movies(): BelongsToMany
    {
        return $this->belongsToMany(Movie::class, 'movie_has_genres', 'genre_id', 'movie_id');
    }
}
