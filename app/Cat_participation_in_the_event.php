<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cat_participation_in_the_event extends Model
{
    protected $fillable = [
        'event_id',
        'cat_id',
        'role_id'
 
     ];  
}
