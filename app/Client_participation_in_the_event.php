<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client_participation_in_the_event extends Model
{
    protected $fillable = [
        'event_id',
        'client_id',
        'dutie_id'
 
     ];  
}
