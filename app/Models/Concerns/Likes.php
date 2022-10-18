<?php

namespace App\Models\Concerns;

use App\Models\like;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait Likes
{
    public function likes(): MorphMany
    {
        return $this->morphMany(like::class, 'like');
    }
}