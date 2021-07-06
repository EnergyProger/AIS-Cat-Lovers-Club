<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
//use Illuminate\Foundation\Auth\User as Authenticatable;
//use Illuminate\Database\Eloquent\Model;

class Client extends Authenticatable
{
    use Notifiable;

    protected $table = 'clients';

    protected $fillable = [
        'email', 
        'password',
        'last_name',
        'first_name',
        'father_name',
        'birthday',
        'sex_id',
        'status_id',
        'accepted',
        'quit',
        'club_id',
        'employee_id',
        'city',
        'instagram',
        'twitter',
        'facebook',

    ];

    protected $hidden = [
        'password',
        
    ];
}