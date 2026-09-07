<?php

namespace App\Models;

use App\Models\SchoolClass;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Activity extends Model
{
    protected $fillable = [
        'uid',
        'dt_stamp',
        'dt_start',
        'dt_end',
        'summary',
        'description',
        'location',
        'status',
        'text',
        'version',
        'attendee'
    ];

    protected $casts = [
        'dt_stamp' => 'datetime',
        'dt_start' => 'datetime',
        'dt_end' => 'datetime',
    ];

    public function schoolClasses(): BelongsToMany
    {
        return $this->belongsToMany(
            SchoolClass::class,
            'activitiesToClasses',
            'activity_id',
            'class_id'
        );
    }
}
