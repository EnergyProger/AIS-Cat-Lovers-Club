<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'event_name',
        'place_id',
        'typeofevent_id',
        'event_description',
        'club_id',
        'employee_id',
        'start_date_event',
        'finish_date_event'
 
     ];
}
