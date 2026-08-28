<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class activities extends Model
{
    protected $fillable = [
        'dt_strat',
        'dt_end',
        'summary',
        'description',
        'status',
        'text',
        'attendee',
        'prod_id',
        'uid',
        'dt_stamp',
        'version',
    ];

    // fillable is what should be entered through the form
//    protected $guarded = [
//
//    ];

    // guarded is what should be entered through the backend.

}
