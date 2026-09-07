<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class SchoolClass extends Model
{
    protected $table = 'school_classes';
    protected $fillable = ['classname'];

    public function activities(): BelongsToMany
    {
        return $this->belongsToMany(
            Activity::class,
            'activitiesToClasses',
            'class_id',
            'activity_id'
        );
    }
}
