<?php

namespace App\Models;

use App\Models\Traits\PrimaryAsUuid;
use App\Models\Traits\Relationships\GenreRelationship;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use PrimaryAsUuid;
    use GenreRelationship;

    public $incrementing = false;

    protected $primaryKey = 'id';

    protected $keyType = 'string';

    protected $fillable = ['name'];
}
