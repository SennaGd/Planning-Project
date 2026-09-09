<?php

namespace App\Models;

use App\Models\SchoolClass;
use App\Events\ActivityCreated;
use Database\Factories\ActivityFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Activity extends Model
{
    /** @use HasFactory<ActivityFactory> */
    use HasFactory;

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
        'attendee',
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

    public function attachSchoolClasses(iterable $classIds): void
    {
        $this->schoolClasses()->attach($classIds);
        $this->unsetRelation('schoolClasses');

        ActivityCreated::dispatch($this->load('schoolClasses'));
    }

    protected static function booted(): void
    {
        static::created(function (Activity $activity): void {
            ActivityCreated::dispatch($activity);
        });
    }
}
