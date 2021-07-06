<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee_participation_in_the_event extends Model
{
    protected $fillable = [
        'event_id',
        'employee_id',
        'dutie_id'
 
     ];  
}
