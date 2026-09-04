<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class SchoolClass extends Model
{
    public function activities(): BelongsToMany
    {
        return $this->belongsToMany(Activity::class);
    }
}
