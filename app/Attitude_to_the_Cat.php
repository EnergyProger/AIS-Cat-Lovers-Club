<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attitude_to_the_Cat extends Model
{
    protected $fillable = [
        'client_id',
        'cat_id',
        'employee_id',
        'start_date',
        'finish_date'
    ];
}
