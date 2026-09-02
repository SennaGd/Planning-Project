<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;

#[Table('activities')]
class Activity extends Model
{
    protected $fillable = [
        'dt_strat',
        'dt_end',
        'summary',
        'description',
        'status',
        'text',
        'attendee',
        'location',
        'prod_id',
        'uid',
        'dt_stamp',
        'version'
    ]; // fillable is what should be entered through the form
    protected $guarded = [
        'dt_start',
        'dt_end',
        'summary'
    ]; // guarded is what should be entered through the backend.
}
