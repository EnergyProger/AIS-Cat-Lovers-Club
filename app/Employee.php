<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
//use Illuminate\Foundation\Auth\User as Authenticatable;
//use Illuminate\Database\Eloquent\Model;

class Employee extends Authenticatable
{
    use Notifiable;

    protected $table = 'employees';
    protected $guard = 'employee';

    protected $fillable = [
        'email_admin', 
        'password_admin',
        'last_name',
        'first_name',
        'father_name',
        'birthday',
        'sex_id',
        'position_id',
        'accept',
        'quit',
        'club_id',

    ];

    protected $hidden = [
        'password_admin',
        
    ];
}