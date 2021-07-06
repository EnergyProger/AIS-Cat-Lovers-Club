<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    protected $fillable = [
        'name_cat', 
        'age',
        'sex_id',
        'breed_id',
        'color_id',
        'client_id',
        'date_of_death',
        'employee_id'
    ];
}
